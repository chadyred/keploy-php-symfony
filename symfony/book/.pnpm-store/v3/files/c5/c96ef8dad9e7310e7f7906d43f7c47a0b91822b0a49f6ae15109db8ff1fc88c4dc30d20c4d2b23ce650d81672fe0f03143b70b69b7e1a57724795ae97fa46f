import React, { Children, Fragment } from 'react';
// From https://github.com/marmelab/react-admin/blob/next/packages/ra-core/src/core/useConfigureAdminRouterFromChildren.tsx
export const getSingleChildFunction = (children) => {
    const childrenArray = Array.isArray(children) ? children : [children];
    const functionChildren = childrenArray.filter((child) => typeof child === 'function');
    if (functionChildren.length > 1) {
        throw new Error('You can only provide one function child to AdminRouter');
    }
    if (functionChildren.length === 0) {
        return null;
    }
    return functionChildren[0];
};
export const isSingleChildFunction = (children) => !!getSingleChildFunction(children);
/**
 * Inspect the children and return an object with the following keys:
 * - customRoutes: an array of the custom routes
 * - resources: an array of resources elements
 */
const getRoutesAndResourcesFromNodes = (children) => {
    const customRoutes = [];
    const resources = [];
    if (isSingleChildFunction(children)) {
        return {
            customRoutes,
            resources,
        };
    }
    // @ts-expect-error for some reason, typescript doesn't narrow down the type after calling the isSingleChildFunction type guard
    Children.forEach(children, (element) => {
        if (!React.isValidElement(element)) {
            // Ignore non-elements. This allows people to more easily inline
            // conditionals in their route config.
            return;
        }
        if (element.type === Fragment) {
            const customRoutesFromFragment = getRoutesAndResourcesFromNodes(element.props.children);
            customRoutes.push(...customRoutesFromFragment.customRoutes);
            resources.push(...customRoutesFromFragment.resources);
        }
        if (element.type.raName === 'CustomRoutes') {
            const customRoutesElement = element;
            customRoutes.push(customRoutesElement);
        }
        else if (element.type.raName === 'Resource') {
            resources.push(element);
        }
    });
    return {
        customRoutes,
        resources,
    };
};
export default getRoutesAndResourcesFromNodes;
//# sourceMappingURL=getRoutesAndResourcesFromNodes.js.map