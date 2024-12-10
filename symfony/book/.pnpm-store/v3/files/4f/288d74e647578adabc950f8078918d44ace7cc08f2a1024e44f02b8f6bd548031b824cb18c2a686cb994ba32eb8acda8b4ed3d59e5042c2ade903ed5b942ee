import { parseOpenApi3Documentation } from '@api-platform/api-doc-parser';
import { fetchUtils } from 'react-admin';
import { adminDataProvider } from '../dataProvider/index.js';
const fetchJson = (url, options = {}) => {
    let { headers } = options;
    if (!headers) {
        headers = {};
    }
    headers = typeof headers === 'function' ? headers() : headers;
    headers = new Headers(headers);
    return fetchUtils.fetchJson(url, Object.assign(Object.assign({}, options), { headers }));
};
const defaultParams = {
    httpClient: fetchJson,
    apiDocumentationParser: parseOpenApi3Documentation,
    mercure: false,
};
function dataProvider(factoryParams) {
    var _a;
    const { dataProvider: { getList, getOne, getMany, getManyReference, update, updateMany, create, delete: deleteFn, deleteMany, }, entrypoint, docEntrypoint, httpClient, apiDocumentationParser, } = Object.assign(Object.assign({}, defaultParams), factoryParams);
    const entrypointUrl = new URL(entrypoint, window.location.href);
    const mercure = factoryParams.mercure
        ? Object.assign({ hub: null, jwt: null, topicUrl: entrypointUrl }, (factoryParams.mercure === true ? {} : factoryParams.mercure)) : null;
    const { introspect, subscribe, unsubscribe } = adminDataProvider({
        entrypoint,
        docEntrypoint,
        httpClient,
        apiDocumentationParser,
        mercure: (_a = factoryParams.mercure) !== null && _a !== void 0 ? _a : false,
    });
    return {
        getList,
        getOne,
        getMany,
        getManyReference,
        update,
        updateMany,
        create,
        delete: deleteFn,
        deleteMany,
        introspect,
        subscribe: (resourceIds, callback) => {
            if ((mercure === null || mercure === void 0 ? void 0 : mercure.hub) === null) {
                return Promise.resolve({ data: null });
            }
            return subscribe(resourceIds, callback);
        },
        unsubscribe,
    };
}
export default dataProvider;
//# sourceMappingURL=dataProvider.js.map