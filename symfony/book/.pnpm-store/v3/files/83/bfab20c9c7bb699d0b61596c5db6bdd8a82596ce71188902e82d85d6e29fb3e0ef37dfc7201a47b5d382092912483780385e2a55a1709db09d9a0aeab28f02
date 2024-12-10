import { HttpError } from 'react-admin';
import { fetchJsonLd, getDocumentationUrlFromHeaders, } from '@api-platform/api-doc-parser';
import jsonld from 'jsonld';
/**
 * Sends HTTP requests to a Hydra API.
 */
function fetchHydra(url, options = {}) {
    var _a;
    let requestHeaders = (_a = options.headers) !== null && _a !== void 0 ? _a : new Headers();
    if (typeof requestHeaders !== 'function' &&
        options.user &&
        options.user.authenticated &&
        options.user.token) {
        requestHeaders = new Headers(requestHeaders);
        requestHeaders.set('Authorization', options.user.token);
    }
    const authOptions = Object.assign(Object.assign({}, options), { headers: requestHeaders });
    return fetchJsonLd(url.href, authOptions).then((data) => {
        const { status, statusText, headers } = data.response;
        const body = 'body' in data ? data.body : undefined;
        if (status < 200 || status >= 300) {
            if (!body) {
                return Promise.reject(new HttpError(statusText, status));
            }
            delete body.trace;
            const documentLoader = (input) => {
                const loaderOptions = authOptions;
                loaderOptions.method = 'GET';
                delete loaderOptions.body;
                return fetchJsonLd(input, loaderOptions).then((response) => {
                    if (!('body' in response)) {
                        throw new Error('An empty response was received when expanding JSON-LD error document.');
                    }
                    return response;
                });
            };
            const base = getDocumentationUrlFromHeaders(headers);
            return ('@context' in body
                ? jsonld.expand(body, {
                    base,
                    documentLoader,
                })
                : documentLoader(base).then((response) => jsonld.expand(body, {
                    expandContext: response.document,
                })))
                .then((json) => {
                var _a, _b, _c;
                return Promise.reject(new HttpError((_c = (_b = (_a = json[0]) === null || _a === void 0 ? void 0 : _a['http://www.w3.org/ns/hydra/core#description']) === null || _b === void 0 ? void 0 : _b[0]) === null || _c === void 0 ? void 0 : _c['@value'], status, json));
            })
                .catch((e) => {
                if ('body' in e) {
                    return Promise.reject(e);
                }
                return Promise.reject(new HttpError(statusText, status));
            });
        }
        if (Array.isArray(body)) {
            return Promise.reject(new Error('Hydra response should not be an array.'));
        }
        if (body && !('@id' in body)) {
            return Promise.reject(new Error('Hydra response needs to have an @id member.'));
        }
        return {
            status,
            headers,
            json: body,
        };
    });
}
export default fetchHydra;
//# sourceMappingURL=fetchHydra.js.map