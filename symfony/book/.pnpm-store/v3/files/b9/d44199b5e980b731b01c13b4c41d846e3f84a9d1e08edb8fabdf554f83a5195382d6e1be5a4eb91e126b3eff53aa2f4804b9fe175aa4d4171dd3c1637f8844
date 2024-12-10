import { __awaiter } from "tslib";
const jsonLdMimeType = "application/ld+json";
const jsonProblemMimeType = "application/problem+json";
/**
 * Sends a JSON-LD request to the API.
 */
export default function fetchJsonLd(url, options = {}) {
    return __awaiter(this, void 0, void 0, function* () {
        const response = yield fetch(url, setHeaders(options));
        const { headers, status } = response;
        const contentType = headers.get("Content-Type");
        if (204 === status) {
            return Promise.resolve({ response });
        }
        if (500 <= status ||
            !contentType ||
            (!contentType.includes(jsonLdMimeType) &&
                !contentType.includes(jsonProblemMimeType))) {
            const reason = { response };
            return Promise.reject(reason);
        }
        return response.json().then((body) => ({
            response,
            body,
            document: body,
            documentUrl: url,
        }));
    });
}
function setHeaders(options) {
    if (!options.headers) {
        return Object.assign(Object.assign({}, options), { headers: {} });
    }
    let headers = typeof options.headers === "function" ? options.headers() : options.headers;
    headers = new Headers(headers);
    if (null === headers.get("Accept")) {
        headers.set("Accept", jsonLdMimeType);
    }
    const result = Object.assign(Object.assign({}, options), { headers });
    if ("undefined" !== result.body &&
        !(typeof FormData !== "undefined" && result.body instanceof FormData) &&
        null === result.headers.get("Content-Type")) {
        result.headers.set("Content-Type", jsonLdMimeType);
    }
    return result;
}
//# sourceMappingURL=fetchJsonLd.js.map