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
import * as React from 'react';
import { useInfiniteListController, } from './useInfiniteListController';
import { OptionalResourceContextProvider } from '../../core';
import { ListContextProvider } from './ListContextProvider';
import { InfinitePaginationContext } from './InfinitePaginationContext';
import { useIsAuthPending } from '../../auth';
/**
 * Call useInfiniteListController and put the value in a ListContext
 *
 * Base class for <InfiniteList> components, without UI.
 *
 * Accepts any props accepted by useInfiniteListController:
 * - filter: permanent filter applied to the list
 * - filters: Filter element, to display the filters
 * - filterDefaultValues: object;
 * - perPage: Number of results per page
 * - sort: Default sort
 * - exporter: exported function
 *
 * @example // Custom list layout
 *
 * const PostList = () => (
 *     <InfiniteListBase perPage={10}>
 *         <div>
 *              List metrics...
 *         </div>
 *         <Grid container>
 *             <Grid item xs={8}>
 *                 <SimpleList primaryText={record => record.title} />
 *             </Grid>
 *             <Grid item xs={4}>
 *                 List instructions...
 *             </Grid>
 *         </Grid>
 *         <div>
 *             Post related links...
 *         </div>
 *     </ListBase>
 * );
 */
export var InfiniteListBase = function (_a) {
    var children = _a.children, _b = _a.loading, loading = _b === void 0 ? null : _b, props = __rest(_a, ["children", "loading"]);
    var controllerProps = useInfiniteListController(props);
    var isAuthPending = useIsAuthPending({
        resource: controllerProps.resource,
        action: 'list',
    });
    if (isAuthPending && !props.disableAuthentication) {
        return loading;
    }
    return (
    // We pass props.resource here as we don't need to create a new ResourceContext if the props is not provided
    React.createElement(OptionalResourceContextProvider, { value: props.resource },
        React.createElement(ListContextProvider, { value: controllerProps },
            React.createElement(InfinitePaginationContext.Provider, { value: {
                    hasNextPage: controllerProps.hasNextPage,
                    fetchNextPage: controllerProps.fetchNextPage,
                    isFetchingNextPage: controllerProps.isFetchingNextPage,
                    hasPreviousPage: controllerProps.hasPreviousPage,
                    fetchPreviousPage: controllerProps.fetchPreviousPage,
                    isFetchingPreviousPage: controllerProps.isFetchingPreviousPage,
                } }, children))));
};
//# sourceMappingURL=InfiniteListBase.js.map