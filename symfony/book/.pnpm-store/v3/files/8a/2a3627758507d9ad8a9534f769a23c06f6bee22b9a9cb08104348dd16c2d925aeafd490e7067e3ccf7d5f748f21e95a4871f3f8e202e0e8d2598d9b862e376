import { __awaiter } from "tslib";
const setOptions = (query, options) => {
    if (!options.method) {
        options.method = "POST";
    }
    if (!(options.headers instanceof Headers)) {
        options.headers = new Headers(options.headers);
    }
    if (null === options.headers.get("Content-Type")) {
        options.headers.set("Content-Type", "application/json");
    }
    if ("GET" !== options.method && !options.body) {
        options.body = JSON.stringify({ query });
    }
    return options;
};
export default (url, query, options = {}) => __awaiter(void 0, void 0, void 0, function* () {
    const response = yield fetch(url, setOptions(query, options));
    const body = (yield response.json());
    if (body === null || body === void 0 ? void 0 : body.errors) {
        return Promise.reject({ response, body });
    }
    return Promise.resolve({ response, body });
});
//# sourceMappingURL=fetchQuery.js.map