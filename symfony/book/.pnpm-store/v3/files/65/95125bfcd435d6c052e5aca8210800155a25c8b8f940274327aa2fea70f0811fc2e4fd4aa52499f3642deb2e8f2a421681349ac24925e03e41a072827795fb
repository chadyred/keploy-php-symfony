import { Api } from "../Api.js";
import handleJson, { removeTrailingSlash } from "./handleJson.js";
export default function parseOpenApi3Documentation(entrypointUrl, options = {}) {
    entrypointUrl = removeTrailingSlash(entrypointUrl);
    let headers = typeof options.headers === "function" ? options.headers() : options.headers;
    headers = new Headers(headers);
    headers.append("Accept", "application/vnd.openapi+json");
    return fetch(entrypointUrl, Object.assign(Object.assign({}, options), { headers: headers }))
        .then((res) => Promise.all([res, res.json()]))
        .then(([res, response]) => {
        const title = response.info.title;
        return handleJson(response, entrypointUrl).then((resources) => ({
            api: new Api(entrypointUrl, { title, resources }),
            response,
            status: res.status,
        }));
    }, ([res, response]) => Promise.reject({
        api: new Api(entrypointUrl, { resources: [] }),
        response,
        status: res.status,
    }));
}
//# sourceMappingURL=parseOpenApi3Documentation.js.map