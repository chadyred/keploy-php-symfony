var __rest = (this && this.__rest) || function (s, e) {
    var t = {};
    for (var p in s) if (Object.prototype.hasOwnProperty.call(s, p) && e.indexOf(p) < 0)
        t[p] = s[p];
    if (s != null && typeof Object.getOwnPropertySymbols === "function")
        for (var i = 0, p = Object.getOwnPropertySymbols(s); i < p.length; i++) {
            if (e.indexOf(p[i]) < 0 && Object.prototype.propertyIsEnumerable.call(s, p[i]))
                t[p[i]] = s[p[i]];
        }
    return t;
};
import React from 'react';
import { AdminUI, Loading } from 'react-admin';
import ResourceGuesser from './ResourceGuesser.js';
import getRoutesAndResourcesFromNodes, { isSingleChildFunction, } from '../introspection/getRoutesAndResourcesFromNodes.js';
import useDisplayOverrideCode from '../useDisplayOverrideCode.js';
const getOverrideCode = (resources) => {
    let code = 'If you want to override at least one resource, paste this content in the <AdminGuesser> component of your app:\n\n';
    resources.forEach((r) => {
        code += `<ResourceGuesser name="${r.name}" />\n`;
    });
    return code;
};
/**
 * AdminResourcesGuesser automatically renders an `<AdminUI>` component
 * for resources exposed by a web API documented with Hydra, OpenAPI
 * or any other format supported by `@api-platform/api-doc-parser`.
 *
 * If child components are passed (usually `<ResourceGuesser>` or `<Resource>`
 * components, but it can be any other React component), they are rendered in
 * the given order.
 * If no children are passed, a `<ResourceGuesser>` component is created for
 * each resource type exposed by the API, in the order they are specified in
 * the API documentation.
 */
export const AdminResourcesGuesser = (_a) => {
    var { 
    // Admin props
    loadingPage: LoadingPage = Loading, admin: AdminEl = AdminUI, 
    // Props
    children, includeDeprecated, resources, loading } = _a, rest = __rest(_a, ["loadingPage", "admin", "children", "includeDeprecated", "resources", "loading"]);
    const displayOverrideCode = useDisplayOverrideCode();
    if (loading) {
        return React.createElement(LoadingPage, null);
    }
    let adminChildren = children;
    const { resources: resourceChildren, customRoutes } = getRoutesAndResourcesFromNodes(children);
    if (!isSingleChildFunction(adminChildren) &&
        resourceChildren.length === 0 &&
        resources) {
        const guessedResources = includeDeprecated
            ? resources
            : resources.filter((r) => !r.deprecated);
        adminChildren = [
            ...customRoutes,
            ...guessedResources.map((r) => (React.createElement(ResourceGuesser, { name: r.name, key: r.name }))),
        ];
        displayOverrideCode(getOverrideCode(guessedResources));
    }
    return (React.createElement(AdminEl, Object.assign({ loading: LoadingPage }, rest), adminChildren));
};
//# sourceMappingURL=AdminResourcesGuesser.js.map