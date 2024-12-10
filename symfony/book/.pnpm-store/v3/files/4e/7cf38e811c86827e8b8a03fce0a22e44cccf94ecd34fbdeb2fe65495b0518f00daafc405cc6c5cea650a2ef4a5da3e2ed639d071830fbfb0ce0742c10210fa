import { Api } from "../Api.js";
import handleJson, { removeTrailingSlash } from "./handleJson.js";
export default function parseSwaggerDocumentation(entrypointUrl) {
    entrypointUrl = removeTrailingSlash(entrypointUrl);
    return fetch(entrypointUrl)
        .then((res) => Promise.all([res, res.json()]))
        .then(([res, response]) => {
        const title = response.info.title;
        const resources = handleJson(response, entrypointUrl);
        return Promise.resolve({
            api: new Api(entrypointUrl, { title, resources }),
            response,
            status: res.status,
        });
    }, ([res, response]) => Promise.reject({
        api: new Api(entrypointUrl, { resources: [] }),
        response,
        status: res.status,
    }));
}
//# sourceMappingURL=parseSwaggerDocumentation.js.map