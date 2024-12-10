import { mercureManager } from '../mercure/index.js';
export default (factoryParams) => {
    const { entrypoint, docEntrypoint, apiDocumentationParser } = factoryParams;
    const entrypointUrl = new URL(entrypoint, window.location.href);
    const docEntrypointUrl = new URL(docEntrypoint, window.location.href);
    const mercure = factoryParams.mercure
        ? Object.assign({ hub: null, jwt: null, topicUrl: entrypointUrl }, (factoryParams.mercure === true ? {} : factoryParams.mercure)) : null;
    mercureManager.setMercureOptions(mercure);
    let apiSchema;
    return {
        introspect: (_resource = '', _params = {}) => apiSchema
            ? Promise.resolve({ data: apiSchema })
            : apiDocumentationParser(docEntrypointUrl.toString())
                .then(({ api }) => {
                if (api.resources && api.resources.length > 0) {
                    apiSchema = Object.assign(Object.assign({}, api), { resources: api.resources });
                }
                return { data: api };
            })
                .catch((err) => {
                const { status, error } = err;
                let { message } = err;
                // Note that the `api-doc-parser` rejects with a non-standard error object hence the check
                if (error === null || error === void 0 ? void 0 : error.message) {
                    message = error.message;
                }
                throw new Error(`Cannot fetch API documentation:\n${message
                    ? `${message}\nHave you verified that CORS is correctly configured in your API?\n`
                    : ''}${status ? `Status: ${status}` : ''}`);
            }),
        subscribe: (resourceIds, callback) => {
            resourceIds.forEach((resourceId) => {
                mercureManager.subscribe(resourceId, resourceId, callback);
            });
            return Promise.resolve({ data: null });
        },
        unsubscribe: (_resource, resourceIds) => {
            resourceIds.forEach((resourceId) => {
                mercureManager.unsubscribe(resourceId);
            });
            return Promise.resolve({ data: null });
        },
    };
};
//# sourceMappingURL=adminDataProvider.js.map