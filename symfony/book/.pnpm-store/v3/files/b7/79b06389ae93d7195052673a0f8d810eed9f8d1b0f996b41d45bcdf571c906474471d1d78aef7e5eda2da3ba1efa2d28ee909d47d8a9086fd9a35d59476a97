var __awaiter = (this && this.__awaiter) || function (thisArg, _arguments, P, generator) {
    function adopt(value) { return value instanceof P ? value : new P(function (resolve) { resolve(value); }); }
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) { try { step(generator.next(value)); } catch (e) { reject(e); } }
        function rejected(value) { try { step(generator["throw"](value)); } catch (e) { reject(e); } }
        function step(result) { result.done ? resolve(result.value) : adopt(result.value).then(fulfilled, rejected); }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
};
import { CREATE, DELETE, GET_LIST, GET_MANY_REFERENCE, GET_ONE, UPDATE, } from 'react-admin';
import lodashIsPlainObject from 'lodash.isplainobject';
import { parseHydraDocumentation } from '@api-platform/api-doc-parser';
import fetchHydra from './fetchHydra.js';
import { resolveSchemaParameters } from '../introspection/schemaAnalyzer.js';
import { adminDataProvider } from '../dataProvider/index.js';
import { mercureManager } from '../mercure/index.js';
import { removeTrailingSlash } from '../removeTrailingSlash.js';
// eslint-disable-next-line @typescript-eslint/no-explicit-any
const isPlainObject = (value) => lodashIsPlainObject(value);
let apiSchema;
class ReactAdminDocument {
    constructor(obj) {
        Object.assign(this, obj);
        if (obj.id) {
            this.originId = obj.id.toString();
        }
        if (!obj['@id']) {
            throw new Error('Document needs to have an @id member.');
        }
        if (Array.isArray(obj['@id'])) {
            throw new Error('Document needs to have a string @id member.');
        }
        this.id = obj['@id'];
    }
    toString() {
        return `[object ${this.id}]`;
    }
}
/**
 * Local cache containing embedded documents.
 * It will be used to prevent useless extra HTTP query if the relation is displayed.
 */
const reactAdminDocumentsCache = new Map();
/**
 * Transforms a JSON-LD document to a react-admin compatible document.
 */
export const transformJsonLdDocumentToReactAdminDocument = (jsonLdDocument, clone = true, addToCache = true, useEmbedded = false) => {
    let clonedDocument = jsonLdDocument;
    if (clone) {
        // deep clone documents
        clonedDocument = JSON.parse(JSON.stringify(clonedDocument));
    }
    const document = new ReactAdminDocument(clonedDocument);
    // Replace embedded objects by their IRIs, and store the object itself in the cache to reuse without issuing new HTTP requests.
    Object.keys(document).forEach((key) => {
        // to-one
        if (isPlainObject(document[key]) && document[key]['@id']) {
            if (addToCache) {
                reactAdminDocumentsCache.set(document[key]['@id'], transformJsonLdDocumentToReactAdminDocument(document[key], false, false));
            }
            document[key] = useEmbedded ? document[key] : document[key]['@id'];
            return;
        }
        // to-many
        if (Array.isArray(document[key]) &&
            document[key].length &&
            isPlainObject(document[key][0]) &&
            document[key][0]['@id']) {
            document[key] = document[key].map((obj) => {
                if (addToCache && obj['@id'] && !Array.isArray(obj['@id'])) {
                    reactAdminDocumentsCache.set(obj['@id'], transformJsonLdDocumentToReactAdminDocument(obj, false, false));
                }
                return useEmbedded ? obj : obj['@id'];
            });
        }
    });
    return document;
};
const extractHubUrl = (response) => {
    const linkHeader = response.headers.get('Link');
    if (!linkHeader) {
        return null;
    }
    const matches = linkHeader.match(/<([^>]+)>;\s+rel=(?:mercure|"[^"]*mercure[^"]*")/);
    return (matches === null || matches === void 0 ? void 0 : matches[1]) ? matches[1] : null;
};
const defaultParams = {
    httpClient: fetchHydra,
    apiDocumentationParser: parseHydraDocumentation,
    mercure: true,
    useEmbedded: true,
    disableCache: false,
};
function normalizeHydraKey(json, key) {
    if (json[`hydra:${key}`]) {
        const copy = JSON.parse(JSON.stringify(json));
        copy[key] = copy[`hydra:${key}`];
        delete copy[`hydra:${key}`];
        return copy;
    }
    return json;
}
/**
 * Maps react-admin queries to a Hydra powered REST API
 *
 * @see http://www.hydra-cg.com/
 *
 * @example
 * CREATE   => POST http://my.api.url/posts/123
 * DELETE   => DELETE http://my.api.url/posts/123
 * GET_LIST => GET http://my.api.url/posts
 * GET_MANY => GET http://my.api.url/posts/123, GET http://my.api.url/posts/456, GET http://my.api.url/posts/789
 * GET_ONE  => GET http://my.api.url/posts/123
 * UPDATE   => PATCH http://my.api.url/posts/123
 */
function dataProvider(factoryParams) {
    var _a;
    const { entrypoint, httpClient, apiDocumentationParser, useEmbedded, disableCache, } = Object.assign(Object.assign({}, defaultParams), factoryParams);
    const entrypointUrl = new URL(entrypoint, window.location.href);
    const mercure = factoryParams.mercure
        ? Object.assign({ hub: null, jwt: null, topicUrl: entrypointUrl }, (factoryParams.mercure === true ? {} : factoryParams.mercure)) : null;
    const convertReactAdminDataToHydraData = (resource, data = {}) => {
        const reactAdminData = data;
        const fieldData = {};
        if (resource.fields) {
            resource.fields.forEach(({ name, reference, normalizeData }) => {
                if (!(name in reactAdminData)) {
                    return;
                }
                if (reference && reactAdminData[name] === '') {
                    reactAdminData[name] = null;
                    return;
                }
                if (undefined === normalizeData) {
                    return;
                }
                fieldData[name] = normalizeData(reactAdminData[name]);
            });
        }
        const fieldDataKeys = Object.keys(fieldData);
        const fieldDataValues = Object.values(fieldData);
        return Promise.all(fieldDataValues).then((normalizedFieldData) => {
            const object = {};
            for (let i = 0; i < fieldDataKeys.length; i += 1) {
                const key = fieldDataKeys[i];
                if (key) {
                    object[key] = normalizedFieldData[i];
                }
            }
            return Object.assign(Object.assign({}, reactAdminData), object);
        });
    };
    const transformReactAdminDataToRequestBody = (apiResource, data, extraInformation) => {
        if (undefined === apiResource) {
            return Promise.resolve(data);
        }
        return convertReactAdminDataToHydraData(apiResource, data).then((hydraData) => {
            const values = Object.values(hydraData);
            const containFile = (element) => Array.isArray(element)
                ? element.length > 0 && element.every((value) => containFile(value))
                : isPlainObject(element) &&
                    Object.values(element).some((value) => value instanceof File);
            const hasToJSON = (element) => !!element &&
                typeof element !== 'string' &&
                typeof element.toJSON === 'function';
            if (!extraInformation.hasFileField &&
                !values.some((value) => containFile(value))) {
                return JSON.stringify(hydraData);
            }
            const body = new FormData();
            Object.entries(hydraData).forEach(([key, value]) => {
                // React-Admin FileInput format is an object containing a file.
                if (containFile(value)) {
                    const findFile = (element) => Object.values(element).find((val) => val instanceof Blob);
                    if (Array.isArray(value)) {
                        value
                            .map((val) => findFile(val))
                            .forEach((file) => {
                            body.append(key.endsWith('[]') ? key : `${key}[]`, file);
                        });
                    }
                    else {
                        body.append(key, findFile(value));
                    }
                    return;
                }
                if (hasToJSON(value)) {
                    body.append(key, value.toJSON());
                    return;
                }
                if (isPlainObject(value) || Array.isArray(value)) {
                    body.append(key, JSON.stringify(value));
                    return;
                }
                body.append(key, value);
            });
            return body;
        });
    };
    const shouldUseItemUrl = (type) => {
        switch (type) {
            case 'GET_ONE':
            case 'UPDATE':
            case 'DELETE':
                return true;
            default:
                return false;
        }
    };
    const convertReactAdminRequestToHydraRequest = (type, resource, dataProviderParams) => {
        var _a, _b, _c, _d, _e;
        const params = dataProviderParams;
        let url;
        if ('id' in params && shouldUseItemUrl(type)) {
            url = new URL(params.id.toString(), entrypointUrl);
        }
        else {
            url = new URL(`${removeTrailingSlash(entrypointUrl.toString())}/${resource}`, entrypointUrl);
        }
        const searchParams = (_a = params.searchParams) !== null && _a !== void 0 ? _a : {};
        const searchParamKeys = Object.keys(searchParams);
        searchParamKeys.forEach((searchParamKey) => {
            const searchParam = searchParams[searchParamKey];
            if (searchParam) {
                url.searchParams.set(searchParamKey, searchParam);
            }
        });
        let extraInformation = {};
        if (typeof params.meta === 'object') {
            extraInformation = params.meta;
        }
        const apiResource = ((_b = apiSchema === null || apiSchema === void 0 ? void 0 : apiSchema.resources) !== null && _b !== void 0 ? _b : []).find(({ name }) => resource === name);
        let updateHttpMethod = 'POST';
        if (!extraInformation.hasFileField) {
            updateHttpMethod =
                (_e = (_d = (_c = apiResource === null || apiResource === void 0 ? void 0 : apiResource.operations) === null || _c === void 0 ? void 0 : _c.find((operation) => operation.type === 'edit')) === null || _d === void 0 ? void 0 : _d.method) !== null && _e !== void 0 ? _e : 'PUT';
        }
        switch (type) {
            case CREATE:
                return transformReactAdminDataToRequestBody(apiResource, params.data, extraInformation).then((body) => ({
                    options: {
                        body,
                        method: 'POST',
                    },
                    url,
                }));
            case DELETE:
                return Promise.resolve({
                    options: {
                        method: 'DELETE',
                    },
                    url,
                });
            case GET_LIST:
            case GET_MANY_REFERENCE: {
                const { pagination, sort, filter } = params;
                const { page, perPage } = pagination !== null && pagination !== void 0 ? pagination : { page: 1, perPage: 25 };
                const { field, order } = sort !== null && sort !== void 0 ? sort : { field: 'id', order: 'DESC' };
                if (order && field) {
                    field.split(',').forEach((fieldName) => {
                        url.searchParams.set(`order[${fieldName.trim()}]`, order);
                    });
                }
                if (page)
                    url.searchParams.set('page', page.toString());
                if (perPage)
                    url.searchParams.set('itemsPerPage', perPage.toString());
                if (filter) {
                    const buildFilterParams = (key, nestedFilter, rootKey) => {
                        const filterValue = nestedFilter[key];
                        if (filterValue === undefined) {
                            return;
                        }
                        if (Array.isArray(filterValue)) {
                            filterValue.forEach((arrayFilterValue, index) => {
                                url.searchParams.set(`${rootKey}[${index}]`, arrayFilterValue);
                            });
                            return;
                        }
                        if (!isPlainObject(filterValue)) {
                            url.searchParams.set(rootKey, filterValue.toString());
                            return;
                        }
                        Object.keys(filterValue).forEach((subKey) => {
                            if (rootKey === 'exists' ||
                                [
                                    'after',
                                    'before',
                                    'strictly_after',
                                    'strictly_before',
                                    'lt',
                                    'gt',
                                    'lte',
                                    'gte',
                                    'between',
                                ].includes(subKey)) {
                                buildFilterParams(subKey, filterValue, `${rootKey}[${subKey}]`);
                                return;
                            }
                            buildFilterParams(subKey, filterValue, `${rootKey}.${subKey}`);
                        });
                    };
                    Object.keys(filter).forEach((key) => {
                        buildFilterParams(key, filter, key);
                    });
                }
                if (type === GET_MANY_REFERENCE) {
                    const { target, id } = params;
                    if (target) {
                        url.searchParams.set(target, id.toString());
                    }
                }
                return Promise.resolve({
                    options: {},
                    url,
                });
            }
            case GET_ONE:
                return Promise.resolve({
                    options: {},
                    url,
                });
            case UPDATE:
                return transformReactAdminDataToRequestBody(apiResource, params.data, extraInformation).then((body) => ({
                    options: {
                        body,
                        method: updateHttpMethod,
                        headers: updateHttpMethod === 'PATCH'
                            ? { 'content-type': 'application/merge-patch+json' }
                            : {},
                    },
                    url,
                }));
            default:
                throw new Error(`Unsupported fetch action type ${type}`);
        }
    };
    const convertHydraDataToReactAdminData = (resource, data) => {
        const apiResource = apiSchema.resources.find(({ name }) => resource === name);
        if (undefined === apiResource) {
            return Promise.resolve(data);
        }
        const fieldData = {};
        if (apiResource.fields) {
            apiResource.fields.forEach(({ name, denormalizeData }) => {
                if (!(name in data) || undefined === denormalizeData) {
                    return;
                }
                fieldData[name] = denormalizeData(data[name]);
            });
        }
        const fieldDataKeys = Object.keys(fieldData);
        const fieldDataValues = Object.values(fieldData);
        return Promise.all(fieldDataValues).then((normalizedFieldData) => {
            const object = {};
            for (let i = 0; i < fieldDataKeys.length; i += 1) {
                const key = fieldDataKeys[i];
                if (key) {
                    object[key] = normalizedFieldData[i];
                }
            }
            return Object.assign(Object.assign({}, data), object);
        });
    };
    const convertHydraResponseToReactAdminResponse = (type, resource, params, response) => {
        if (mercure !== null && mercure.hub === null) {
            const hubUrl = extractHubUrl(response);
            if (hubUrl) {
                mercure.hub = hubUrl;
                mercureManager.setMercureOptions(mercure);
                mercureManager.initSubscriptions();
            }
        }
        switch (type) {
            case GET_LIST:
            case GET_MANY_REFERENCE: {
                if (!response.json) {
                    return Promise.reject(new Error(`An empty response was received for "${type}".`));
                }
                const json = normalizeHydraKey(response.json, 'member');
                if (!json.member) {
                    return Promise.reject(new Error("Response doesn't have a member field."));
                }
                // TODO: support other prefixes than "hydra:"
                let hydraCollection = json;
                return Promise.resolve(hydraCollection.member.map((document) => transformJsonLdDocumentToReactAdminDocument(document, true, !disableCache, useEmbedded)))
                    .then((data) => Promise.all(data.map((hydraData) => convertHydraDataToReactAdminData(resource, hydraData))))
                    .then((data) => {
                    hydraCollection = normalizeHydraKey(hydraCollection, 'totalItems');
                    if (hydraCollection.totalItems !== undefined) {
                        return {
                            data,
                            total: hydraCollection.totalItems,
                        };
                    }
                    hydraCollection = normalizeHydraKey(hydraCollection, 'view');
                    if (hydraCollection.view) {
                        let hydraView = normalizeHydraKey(hydraCollection.view, 'next');
                        hydraView = normalizeHydraKey(hydraView, 'previous');
                        const pageInfo = {
                            hasNextPage: !!hydraView.next,
                            hasPreviousPage: !!hydraView.previous,
                        };
                        return {
                            data,
                            pageInfo,
                        };
                    }
                    return {
                        data,
                    };
                });
            }
            case DELETE:
                return Promise.resolve({ data: { id: params.id } });
            default:
                if (!response.json) {
                    return Promise.reject(new Error(`An empty response was received for "${type}".`));
                }
                return Promise.resolve(transformJsonLdDocumentToReactAdminDocument(response.json, true, !disableCache, useEmbedded))
                    .then((data) => convertHydraDataToReactAdminData(resource, data))
                    .then((data) => ({ data }));
        }
    };
    const fetchApi = (type, resource, params) => 
    // eslint-disable-next-line @typescript-eslint/ban-ts-comment
    // @ts-ignore
    convertReactAdminRequestToHydraRequest(type, resource, params)
        .then(({ url, options }) => httpClient(url, options))
        .then((response) => convertHydraResponseToReactAdminResponse(type, resource, params, response));
    /*
     * The fetchAllPages method allows running as many requests as needed in order to load all pages of a list.
     * This function uses the already transformed react-admin response data and could be improved by using the hydra pagination.
     */
    const fetchAllPages = (type, resource, params, previousResult) => __awaiter(this, void 0, void 0, function* () {
        var _a, _b, _c;
        const pageParams = params;
        const pageResult = (yield fetchApi(type, resource, pageParams));
        const result = previousResult !== null && previousResult !== void 0 ? previousResult : pageResult;
        if (previousResult) {
            result.data.push(...pageResult.data);
            if (pageResult.total && result.total && pageResult.total < result.total) {
                // The total can have changed between 2 requests
                result.total = pageResult.total;
            }
        }
        // Minimalist infinite loop protection
        if (((_a = pageParams.pagination) === null || _a === void 0 ? void 0 : _a.page) &&
            ((_b = pageParams.pagination) === null || _b === void 0 ? void 0 : _b.page) >= result.data.length) {
            return result;
        }
        if (pageResult.data.length > 0 &&
            ((!!result.total && result.data.length < result.total) ||
                ((_c = result.pageInfo) === null || _c === void 0 ? void 0 : _c.hasNextPage))) {
            if (pageParams.pagination) {
                pageParams.pagination.page += 1;
            }
            else {
                pageParams.pagination = { page: 2, perPage: 25 };
            }
            return fetchAllPages(type, resource, pageParams, result);
        }
        return result;
    });
    const hasIdSearchFilter = (resource) => {
        const schema = apiSchema.resources.find((r) => r.name === resource);
        if (!schema) {
            return Promise.resolve(false);
        }
        return resolveSchemaParameters(schema).then((parameters) => parameters.map((filter) => filter.variable).includes('id'));
    };
    const { introspect, subscribe, unsubscribe } = adminDataProvider({
        entrypoint,
        docEntrypoint: entrypoint,
        httpClient,
        apiDocumentationParser,
        mercure: (_a = factoryParams.mercure) !== null && _a !== void 0 ? _a : true,
    });
    mercureManager.setDataTransformer((jsonLdDocument) => transformJsonLdDocumentToReactAdminDocument(jsonLdDocument, true, !disableCache, useEmbedded));
    return {
        getList: (resource, params) => fetchApi(GET_LIST, resource, params),
        getOne: (resource, params) => fetchApi(GET_ONE, resource, params),
        getMany: (resource, params) => 
        // eslint-disable-next-line @typescript-eslint/ban-ts-comment
        // @ts-ignore
        hasIdSearchFilter(resource).then((result) => {
            var _a;
            // Hydra doesn't handle MANY requests but if a search filter for the id is available, it is used.
            if (result) {
                return fetchAllPages(GET_LIST, resource, {
                    pagination: {
                        // Asking for the good amount of items, as we could want to retrieve more items than the default amount sent by the API.
                        perPage: (_a = params.ids) === null || _a === void 0 ? void 0 : _a.length,
                        page: 1,
                    },
                    filter: { id: params.ids },
                    sort: { field: '', order: 'ASC' },
                }).then(({ data }) => ({ data }));
            }
            // Else fallback to calling the ONE request n times instead.
            return Promise.all(params.ids.map((id) => {
                const document = reactAdminDocumentsCache.get(id.toString());
                if (document) {
                    return Promise.resolve({ data: document });
                }
                return fetchApi(GET_ONE, resource, { id });
            })).then((responses) => ({ data: responses.map(({ data }) => data) }));
        }),
        getManyReference: (resource, params) => fetchApi(GET_MANY_REFERENCE, resource, params),
        update: (resource, params) => fetchApi(UPDATE, resource, params),
        updateMany: (resource, params) => Promise.all(params.ids.map((id) => fetchApi(UPDATE, resource, Object.assign(Object.assign({}, params), { id, previousData: { id } })))).then(() => ({ data: [] })),
        create: (resource, params) => fetchApi(CREATE, resource, params),
        delete: (resource, params) => fetchApi(DELETE, resource, params),
        deleteMany: (resource, params) => Promise.all(params.ids.map((id) => fetchApi(DELETE, resource, { id }))).then(() => ({ data: [] })),
        introspect: (_resource = '', _params = {}) => introspect().then(({ data }) => {
            if (data.resources && data.resources.length > 0) {
                apiSchema = Object.assign(Object.assign({}, data), { resources: data.resources });
            }
            return { data };
        }),
        subscribe,
        unsubscribe,
    };
}
export default dataProvider;
//# sourceMappingURL=dataProvider.js.map