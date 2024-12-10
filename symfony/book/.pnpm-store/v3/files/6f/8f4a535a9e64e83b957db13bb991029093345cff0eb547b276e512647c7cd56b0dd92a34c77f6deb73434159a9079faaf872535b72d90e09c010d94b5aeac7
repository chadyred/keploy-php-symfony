import { __awaiter } from "tslib";
import { getIntrospectionQuery } from "graphql/utilities/index.js";
import fetchQuery from "./fetchQuery.js";
import { Api } from "../Api.js";
import { Field } from "../Field.js";
import { Resource } from "../Resource.js";
const getRangeFromGraphQlType = (type) => {
    if (type.kind === "NON_NULL") {
        if (type.ofType.kind === "LIST") {
            return `Array<${getRangeFromGraphQlType(type.ofType.ofType)}>`;
        }
        return type.ofType.name;
    }
    if (type.kind === "LIST") {
        return `Array<${getRangeFromGraphQlType(type.ofType)}>`;
    }
    return type.name;
};
const getReferenceFromGraphQlType = (type) => {
    if (type.kind === "OBJECT" && type.name.endsWith("Connection")) {
        return type.name.slice(0, type.name.lastIndexOf("Connection"));
    }
    return null;
};
export default (entrypointUrl, options = {}) => __awaiter(void 0, void 0, void 0, function* () {
    const introspectionQuery = getIntrospectionQuery();
    const { response, body: { data }, } = yield fetchQuery(entrypointUrl, introspectionQuery, options);
    if (!(data === null || data === void 0 ? void 0 : data.__schema)) {
        throw new Error("Schema has not been retrieved from the introspection query.");
    }
    const schema = data === null || data === void 0 ? void 0 : data.__schema;
    const typeResources = schema.types.filter((type) => {
        var _a, _b;
        return type.kind === "OBJECT" &&
            type.name !== schema.queryType.name &&
            type.name !== ((_a = schema.mutationType) === null || _a === void 0 ? void 0 : _a.name) &&
            type.name !== ((_b = schema.subscriptionType) === null || _b === void 0 ? void 0 : _b.name) &&
            !type.name.startsWith("__") &&
            // mutation
            !type.name.startsWith(type.name[0].toLowerCase()) &&
            !type.name.endsWith("Connection") &&
            !type.name.endsWith("Edge") &&
            !type.name.endsWith("PageInfo");
    });
    const resources = [];
    typeResources.forEach((typeResource) => {
        const fields = [];
        const readableFields = [];
        const writableFields = [];
        typeResource.fields.forEach((resourceFieldType) => {
            const field = new Field(resourceFieldType.name, {
                range: getRangeFromGraphQlType(resourceFieldType.type),
                reference: getReferenceFromGraphQlType(resourceFieldType.type),
                required: resourceFieldType.type.kind === "NON_NULL",
                description: resourceFieldType.description,
                deprecated: resourceFieldType.isDeprecated,
            });
            fields.push(field);
            readableFields.push(field);
            writableFields.push(field);
        });
        resources.push(new Resource(typeResource.name, "", {
            fields,
            readableFields,
            writableFields,
        }));
    });
    resources.forEach((resource) => {
        var _a;
        (_a = resource.fields) === null || _a === void 0 ? void 0 : _a.forEach((field) => {
            if (null !== field.reference) {
                field.reference =
                    resources.find((resource) => resource.name === field.reference) ||
                        null;
            }
            else if (null !== field.range) {
                field.reference =
                    resources.find((resource) => resource.name === field.range) || null;
            }
        });
    });
    return {
        api: new Api(entrypointUrl, { resources }),
        response,
    };
});
//# sourceMappingURL=parseGraphQl.js.map