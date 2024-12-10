import { __awaiter } from "tslib";
import jsonld from "jsonld";
import get from "lodash.get";
import { Api } from "../Api.js";
import { Field } from "../Field.js";
import { Resource } from "../Resource.js";
import { Operation } from "../Operation.js";
import fetchJsonLd from "./fetchJsonLd.js";
import getParameters from "./getParameters.js";
import getType from "./getType.js";
/**
 * Extracts the short name of a resource.
 */
function guessNameFromUrl(url, entrypointUrl) {
    return url.substr(entrypointUrl.length + 1);
}
/**
 * Finds the description of the class with the given id.
 */
function findSupportedClass(docs, classToFind) {
    const supportedClasses = get(docs, '[0]["http://www.w3.org/ns/hydra/core#supportedClass"]');
    if (!Array.isArray(supportedClasses)) {
        throw new Error('The API documentation has no "http://www.w3.org/ns/hydra/core#supportedClass" key or its value is not an array.');
    }
    for (const supportedClass of supportedClasses) {
        if (supportedClass["@id"] === classToFind) {
            return supportedClass;
        }
    }
    throw new Error(`The class "${classToFind}" is not defined in the API documentation.`);
}
export function getDocumentationUrlFromHeaders(headers) {
    const linkHeader = headers.get("Link");
    if (!linkHeader) {
        throw new Error('The response has no "Link" HTTP header.');
    }
    const matches = /<([^<]+)>; rel="http:\/\/www.w3.org\/ns\/hydra\/core#apiDocumentation"/.exec(linkHeader);
    if (matches === null) {
        throw new Error('The "Link" HTTP header is not of the type "http://www.w3.org/ns/hydra/core#apiDocumentation".');
    }
    return matches[1];
}
/**
 * Retrieves Hydra's entrypoint and API docs.
 */
function fetchEntrypointAndDocs(entrypointUrl, options = {}) {
    return __awaiter(this, void 0, void 0, function* () {
        const d = yield fetchJsonLd(entrypointUrl, options);
        if (!("body" in d)) {
            throw new Error("An empty response was received for the entrypoint URL.");
        }
        const entrypointJsonLd = d.body;
        const docsUrl = getDocumentationUrlFromHeaders(d.response.headers);
        const documentLoader = (input) => fetchJsonLd(input, options).then((response) => {
            if (!("body" in response)) {
                throw new Error("An empty response was received when expanding documentation or entrypoint JSON-LD documents.");
            }
            return response;
        });
        const docsResponse = yield fetchJsonLd(docsUrl, options);
        if (!("body" in docsResponse)) {
            throw new Error("An empty response was received for the documentation URL.");
        }
        const docsJsonLd = docsResponse.body;
        const [docs, entrypoint] = (yield Promise.all([
            jsonld.expand(docsJsonLd, {
                base: docsUrl,
                documentLoader,
            }),
            jsonld.expand(entrypointJsonLd, {
                base: entrypointUrl,
                documentLoader,
            }),
        ]));
        return {
            entrypointUrl,
            docsUrl,
            entrypoint,
            response: d.response,
            docs,
        };
    });
}
function removeTrailingSlash(url) {
    if (url.endsWith("/")) {
        url = url.slice(0, -1);
    }
    return url;
}
function findRelatedClass(docs, property) {
    // Use the entrypoint property's owl:equivalentClass if available
    if (Array.isArray(property["http://www.w3.org/2000/01/rdf-schema#range"])) {
        for (const range of property["http://www.w3.org/2000/01/rdf-schema#range"]) {
            const onProperty = get(range, '["http://www.w3.org/2002/07/owl#equivalentClass"][0]["http://www.w3.org/2002/07/owl#onProperty"][0]["@id"]');
            const allValuesFrom = get(range, '["http://www.w3.org/2002/07/owl#equivalentClass"][0]["http://www.w3.org/2002/07/owl#allValuesFrom"][0]["@id"]');
            if (allValuesFrom &&
                "http://www.w3.org/ns/hydra/core#member" === onProperty) {
                return findSupportedClass(docs, allValuesFrom);
            }
        }
    }
    // As a fallback, find an operation available on the property of the entrypoint returning the searched type (usually POST)
    for (const entrypointSupportedOperation of property["http://www.w3.org/ns/hydra/core#supportedOperation"] || []) {
        if (!entrypointSupportedOperation["http://www.w3.org/ns/hydra/core#returns"]) {
            continue;
        }
        const returns = get(entrypointSupportedOperation, '["http://www.w3.org/ns/hydra/core#returns"][0]["@id"]');
        if ("string" === typeof returns &&
            0 !== returns.indexOf("http://www.w3.org/ns/hydra/core")) {
            return findSupportedClass(docs, returns);
        }
    }
    throw new Error(`Cannot find the class related to ${property["@id"]}.`);
}
/**
 * Parses Hydra documentation and converts it to an intermediate representation.
 */
export default function parseHydraDocumentation(entrypointUrl, options = {}) {
    entrypointUrl = removeTrailingSlash(entrypointUrl);
    return fetchEntrypointAndDocs(entrypointUrl, options).then(({ entrypoint, docs, response }) => {
        const resources = [], fields = [], operations = [];
        const title = get(docs, '[0]["http://www.w3.org/ns/hydra/core#title"][0]["@value"]', "API Platform");
        const entrypointType = get(entrypoint, '[0]["@type"][0]');
        if (!entrypointType) {
            throw new Error('The API entrypoint has no "@type" key.');
        }
        const entrypointClass = findSupportedClass(docs, entrypointType);
        if (!Array.isArray(entrypointClass["http://www.w3.org/ns/hydra/core#supportedProperty"])) {
            throw new Error('The entrypoint definition has no "http://www.w3.org/ns/hydra/core#supportedProperty" key or it is not an array.');
        }
        // Add resources
        for (const properties of entrypointClass["http://www.w3.org/ns/hydra/core#supportedProperty"]) {
            const readableFields = [], resourceFields = [], writableFields = [], resourceOperations = [];
            const property = get(properties, '["http://www.w3.org/ns/hydra/core#property"][0]');
            if (!property) {
                continue;
            }
            const url = get(entrypoint, `[0]["${property["@id"]}"][0]["@id"]`);
            if (!url) {
                console.error(new Error(`Unable to find the URL for "${property["@id"]}" in the entrypoint, make sure your API resource has at least one GET collection operation declared.`));
                continue;
            }
            // Add fields
            const relatedClass = findRelatedClass(docs, property);
            for (const supportedProperties of relatedClass["http://www.w3.org/ns/hydra/core#supportedProperty"]) {
                const supportedProperty = get(supportedProperties, '["http://www.w3.org/ns/hydra/core#property"][0]');
                const id = supportedProperty["@id"];
                const range = get(supportedProperty, '["http://www.w3.org/2000/01/rdf-schema#range"][0]["@id"]', null);
                const field = new Field(supportedProperty["http://www.w3.org/2000/01/rdf-schema#label"][0]["@value"], {
                    id,
                    range,
                    type: getType(id, range),
                    reference: "http://www.w3.org/ns/hydra/core#Link" ===
                        get(supportedProperty, '["@type"][0]')
                        ? range // Will be updated in a subsequent pass
                        : null,
                    embedded: "http://www.w3.org/ns/hydra/core#Link" !==
                        get(supportedProperty, '["@type"][0]')
                        ? range // Will be updated in a subsequent pass
                        : null,
                    required: get(supportedProperties, '["http://www.w3.org/ns/hydra/core#required"][0]["@value"]', false),
                    description: get(supportedProperties, '["http://www.w3.org/ns/hydra/core#description"][0]["@value"]', ""),
                    maxCardinality: get(supportedProperty, '["http://www.w3.org/2002/07/owl#maxCardinality"][0]["@value"]', null),
                    deprecated: get(supportedProperties, '["http://www.w3.org/2002/07/owl#deprecated"][0]["@value"]', false),
                });
                fields.push(field);
                resourceFields.push(field);
                if (get(supportedProperties, '["http://www.w3.org/ns/hydra/core#readable"][0]["@value"]')) {
                    readableFields.push(field);
                }
                if (get(supportedProperties, '["http://www.w3.org/ns/hydra/core#writeable"][0]["@value"]') ||
                    get(supportedProperties, '["http://www.w3.org/ns/hydra/core#writable"][0]["@value"]')) {
                    writableFields.push(field);
                }
            }
            // parse entrypoint's operations (a.k.a. collection operations)
            if (property["http://www.w3.org/ns/hydra/core#supportedOperation"]) {
                for (const entrypointOperation of property["http://www.w3.org/ns/hydra/core#supportedOperation"]) {
                    if (!entrypointOperation["http://www.w3.org/ns/hydra/core#returns"]) {
                        continue;
                    }
                    const range = entrypointOperation["http://www.w3.org/ns/hydra/core#returns"][0]["@id"];
                    const method = entrypointOperation["http://www.w3.org/ns/hydra/core#method"][0]["@value"];
                    let type = "list";
                    if (method === "POST") {
                        type = "create";
                    }
                    const operation = new Operation(entrypointOperation["http://www.w3.org/2000/01/rdf-schema#label"][0]["@value"], type, {
                        method,
                        expects: entrypointOperation["http://www.w3.org/ns/hydra/core#expects"] &&
                            entrypointOperation["http://www.w3.org/ns/hydra/core#expects"][0]["@id"],
                        returns: range,
                        types: entrypointOperation["@type"],
                        deprecated: get(entrypointOperation, '["http://www.w3.org/2002/07/owl#deprecated"][0]["@value"]', false),
                    });
                    resourceOperations.push(operation);
                    operations.push(operation);
                }
            }
            // parse resource operations (a.k.a. item operations)
            for (const supportedOperation of relatedClass["http://www.w3.org/ns/hydra/core#supportedOperation"] || []) {
                if (!supportedOperation["http://www.w3.org/ns/hydra/core#returns"]) {
                    continue;
                }
                const range = supportedOperation["http://www.w3.org/ns/hydra/core#returns"][0]["@id"];
                const method = supportedOperation["http://www.w3.org/ns/hydra/core#method"][0]["@value"];
                let type = "show";
                if (method === "POST") {
                    type = "create";
                }
                if (method === "PUT" || method === "PATCH") {
                    type = "edit";
                }
                if (method === "DELETE") {
                    type = "delete";
                }
                const operation = new Operation(supportedOperation["http://www.w3.org/2000/01/rdf-schema#label"][0]["@value"], type, {
                    method,
                    expects: supportedOperation["http://www.w3.org/ns/hydra/core#expects"] &&
                        supportedOperation["http://www.w3.org/ns/hydra/core#expects"][0]["@id"],
                    returns: range,
                    types: supportedOperation["@type"],
                    deprecated: get(supportedOperation, '["http://www.w3.org/2002/07/owl#deprecated"][0]["@value"]', false),
                });
                resourceOperations.push(operation);
                operations.push(operation);
            }
            const resource = new Resource(guessNameFromUrl(url, entrypointUrl), url, {
                id: relatedClass["@id"],
                title: get(relatedClass, '["http://www.w3.org/ns/hydra/core#title"][0]["@value"]', ""),
                fields: resourceFields,
                readableFields,
                writableFields,
                operations: resourceOperations,
                deprecated: get(relatedClass, '["http://www.w3.org/2002/07/owl#deprecated"][0]["@value"]', false),
            });
            resource.parameters = [];
            resource.getParameters = () => getParameters(resource, options);
            resources.push(resource);
        }
        // Resolve references and embedded
        for (const field of fields) {
            if (null !== field.reference) {
                field.reference =
                    resources.find((resource) => resource.id === field.reference) ||
                        null;
            }
            if (null !== field.embedded) {
                field.embedded =
                    resources.find((resource) => resource.id === field.embedded) ||
                        null;
            }
        }
        return {
            api: new Api(entrypointUrl, { title, resources }),
            response,
            status: response.status,
        };
    }, (data) => Promise.reject({
        api: new Api(entrypointUrl, { resources: [] }),
        error: data,
        response: data.response,
        status: get(data.response, "status"),
    }));
}
//# sourceMappingURL=parseHydraDocumentation.js.map