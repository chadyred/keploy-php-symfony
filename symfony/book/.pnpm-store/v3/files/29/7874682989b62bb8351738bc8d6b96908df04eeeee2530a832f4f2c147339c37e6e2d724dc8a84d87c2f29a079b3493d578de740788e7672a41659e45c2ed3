import get from "lodash.get";
import fetchJsonLd from "./fetchJsonLd.js";
export default (resourceUrl, options = {}) => {
    return fetchJsonLd(resourceUrl, Object.assign({ itemsPerPage: 0 }, options)).then((d) => {
        let hasPrefix = true;
        if (d.body) {
            hasPrefix = "hydra:search" in d.body;
        }
        return {
            parameters: get(d, hasPrefix ? "body.hydra:search.hydra:mapping" : "body.search.mapping"),
        };
    });
};
//# sourceMappingURL=fetchResource.js.map