import { Parameter } from "../Parameter.js";
import fetchResource from "./fetchResource.js";
export default (resource, options = {}) => fetchResource(resource.url, options).then(({ parameters = [] }) => {
    const resourceParameters = [];
    parameters.forEach(({ property = null, required, variable }) => {
        if (null === property) {
            return;
        }
        const { range = null } = resource.fields
            ? resource.fields.find(({ name }) => property === name) || {}
            : {};
        resourceParameters.push(new Parameter(variable, range, required, ""));
    });
    resource.parameters = resourceParameters;
    return resourceParameters;
});
//# sourceMappingURL=getParameters.js.map