import { __awaiter } from "tslib";
import { parse as dereference } from "jsonref";
import get from "lodash.get";
import inflection from "inflection";
import { Field } from "../Field.js";
import { Operation } from "../Operation.js";
import { Parameter } from "../Parameter.js";
import { Resource } from "../Resource.js";
import getResourcePaths from "../utils/getResources.js";
import getType from "./getType.js";
const isRef = (maybeRef) => !("$ref" in maybeRef);
export const removeTrailingSlash = (url) => {
    if (url.endsWith("/")) {
        url = url.slice(0, -1);
    }
    return url;
};
const mergeResources = (resourceA, resourceB) => {
    var _a, _b, _c;
    (_a = resourceB.fields) === null || _a === void 0 ? void 0 : _a.forEach((fieldB) => {
        var _a, _b;
        if (!((_a = resourceA.fields) === null || _a === void 0 ? void 0 : _a.some((fieldA) => fieldA.name === fieldB.name))) {
            (_b = resourceA.fields) === null || _b === void 0 ? void 0 : _b.push(fieldB);
        }
    });
    (_b = resourceB.readableFields) === null || _b === void 0 ? void 0 : _b.forEach((fieldB) => {
        var _a, _b;
        if (!((_a = resourceA.readableFields) === null || _a === void 0 ? void 0 : _a.some((fieldA) => fieldA.name === fieldB.name))) {
            (_b = resourceA.readableFields) === null || _b === void 0 ? void 0 : _b.push(fieldB);
        }
    });
    (_c = resourceB.writableFields) === null || _c === void 0 ? void 0 : _c.forEach((fieldB) => {
        var _a, _b;
        if (!((_a = resourceA.writableFields) === null || _a === void 0 ? void 0 : _a.some((fieldA) => fieldA.name === fieldB.name))) {
            (_b = resourceA.writableFields) === null || _b === void 0 ? void 0 : _b.push(fieldB);
        }
    });
    return resourceA;
};
const buildResourceFromSchema = (schema, name, title, url) => {
    const description = schema.description;
    const properties = schema.properties || {};
    const fieldNames = Object.keys(properties);
    const requiredFields = schema.required || [];
    const readableFields = [];
    const writableFields = [];
    const fields = fieldNames.map((fieldName) => {
        const property = properties[fieldName];
        const type = getType(property.type || "string", property.format);
        const field = new Field(fieldName, {
            id: null,
            range: null,
            type,
            arrayType: type === "array" && "items" in property
                ? getType(property.items.type || "string", property.items.format)
                : null,
            enum: property.enum
                ? Object.fromEntries(
                // Object.values is used because the array is annotated: it contains the __meta symbol used by jsonref.
                Object.values(property.enum).map((enumValue) => [
                    typeof enumValue === "string"
                        ? inflection.humanize(enumValue)
                        : enumValue,
                    enumValue,
                ]))
                : null,
            reference: null,
            embedded: null,
            nullable: property.nullable || false,
            required: !!requiredFields.find((value) => value === fieldName),
            description: property.description || "",
        });
        if (!property.writeOnly) {
            readableFields.push(field);
        }
        if (!property.readOnly) {
            writableFields.push(field);
        }
        return field;
    });
    return new Resource(name, url, {
        id: null,
        title,
        description,
        fields,
        readableFields,
        writableFields,
        parameters: [],
        getParameters: () => Promise.resolve([]),
    });
};
const buildOperationFromPathItem = (httpMethod, operationType, pathItem) => {
    return new Operation(pathItem.summary || operationType, operationType, {
        method: httpMethod.toUpperCase(),
        deprecated: !!pathItem.deprecated,
    });
};
/*
  Assumptions:
  RESTful APIs typically have two paths per resources: a `/noun` path and a
  `/noun/{id}` path. `getResources` strips out the former, allowing us to focus
  on the latter.

  In OpenAPI 3, the `/noun/{id}` path will typically have a `get` action, that
  probably accepts parameters and would respond with an object.
*/
export default function (response, entrypointUrl) {
    return __awaiter(this, void 0, void 0, function* () {
        const document = (yield dereference(response, {
            scope: entrypointUrl,
        }));
        const paths = getResourcePaths(document.paths);
        let serverUrlOrRelative = "/";
        if (document.servers) {
            serverUrlOrRelative = document.servers[0].url;
        }
        const serverUrl = new URL(serverUrlOrRelative, entrypointUrl).href;
        const resources = [];
        paths.forEach((path) => {
            const splittedPath = removeTrailingSlash(path).split("/");
            const name = inflection.pluralize(splittedPath[splittedPath.length - 2]);
            const url = `${removeTrailingSlash(serverUrl)}/${name}`;
            const pathItem = document.paths[path];
            if (!pathItem) {
                throw new Error();
            }
            const title = inflection.classify(splittedPath[splittedPath.length - 2]);
            const showOperation = pathItem.get;
            const editOperation = pathItem.put || pathItem.patch;
            if (!showOperation && !editOperation)
                return;
            const showSchema = showOperation
                ? get(showOperation, "responses.200.content.application/json.schema", get(document, `components.schemas[${title}]`))
                : null;
            const editSchema = editOperation
                ? get(editOperation, "requestBody.content.application/json.schema")
                : null;
            if (!showSchema && !editSchema)
                return;
            const showResource = showSchema
                ? buildResourceFromSchema(showSchema, name, title, url)
                : null;
            const editResource = editSchema
                ? buildResourceFromSchema(editSchema, name, title, url)
                : null;
            let resource = showResource !== null && showResource !== void 0 ? showResource : editResource;
            if (!resource)
                return;
            if (showResource && editResource) {
                resource = mergeResources(showResource, editResource);
            }
            const putOperation = pathItem.put;
            const patchOperation = pathItem.patch;
            const deleteOperation = pathItem.delete;
            const pathCollection = document.paths[`/${name}`];
            const listOperation = pathCollection && pathCollection.get;
            const createOperation = pathCollection && pathCollection.post;
            resource.operations = [
                ...(showOperation
                    ? [buildOperationFromPathItem("get", "show", showOperation)]
                    : []),
                ...(putOperation
                    ? [buildOperationFromPathItem("put", "edit", putOperation)]
                    : []),
                ...(patchOperation
                    ? [buildOperationFromPathItem("patch", "edit", patchOperation)]
                    : []),
                ...(deleteOperation
                    ? [buildOperationFromPathItem("delete", "delete", deleteOperation)]
                    : []),
                ...(listOperation
                    ? [buildOperationFromPathItem("get", "list", listOperation)]
                    : []),
                ...(createOperation
                    ? [buildOperationFromPathItem("post", "create", createOperation)]
                    : []),
            ];
            if (listOperation && listOperation.parameters) {
                resource.parameters = listOperation.parameters
                    .filter(isRef)
                    .map((parameter) => new Parameter(parameter.name, parameter.schema && isRef(parameter.schema)
                    ? parameter.schema.type
                        ? getType(parameter.schema.type)
                        : null
                    : null, parameter.required || false, parameter.description || "", parameter.deprecated));
            }
            resources.push(resource);
        });
        // Guess embeddeds and references from property names
        resources.forEach((resource) => {
            var _a;
            (_a = resource.fields) === null || _a === void 0 ? void 0 : _a.forEach((field) => {
                const name = inflection.camelize(field.name).replace(/Ids?$/, "");
                const guessedResource = resources.find((res) => res.title === inflection.classify(name));
                if (!guessedResource) {
                    return;
                }
                field.maxCardinality = field.type === "array" ? null : 1;
                if (field.type === "object" || field.arrayType === "object") {
                    field.embedded = guessedResource;
                }
                else {
                    field.reference = guessedResource;
                }
            });
        });
        return resources;
    });
}
//# sourceMappingURL=handleJson.js.map