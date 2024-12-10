"use strict";
var __createBinding = (this && this.__createBinding) || (Object.create ? (function(o, m, k, k2) {
    if (k2 === undefined) k2 = k;
    var desc = Object.getOwnPropertyDescriptor(m, k);
    if (!desc || ("get" in desc ? !m.__esModule : desc.writable || desc.configurable)) {
      desc = { enumerable: true, get: function() { return m[k]; } };
    }
    Object.defineProperty(o, k2, desc);
}) : (function(o, m, k, k2) {
    if (k2 === undefined) k2 = k;
    o[k2] = m[k];
}));
var __setModuleDefault = (this && this.__setModuleDefault) || (Object.create ? (function(o, v) {
    Object.defineProperty(o, "default", { enumerable: true, value: v });
}) : function(o, v) {
    o["default"] = v;
});
var __importStar = (this && this.__importStar) || function (mod) {
    if (mod && mod.__esModule) return mod;
    var result = {};
    if (mod != null) for (var k in mod) if (k !== "default" && Object.prototype.hasOwnProperty.call(mod, k)) __createBinding(result, mod, k);
    __setModuleDefault(result, mod);
    return result;
};
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
Object.defineProperty(exports, "__esModule", { value: true });
exports.InfiniteListBase = void 0;
var React = __importStar(require("react"));
var useInfiniteListController_1 = require("./useInfiniteListController");
var core_1 = require("../../core");
var ListContextProvider_1 = require("./ListContextProvider");
var InfinitePaginationContext_1 = require("./InfinitePaginationContext");
var auth_1 = require("../../auth");
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
var InfiniteListBase = function (_a) {
    var children = _a.children, _b = _a.loading, loading = _b === void 0 ? null : _b, props = __rest(_a, ["children", "loading"]);
    var controllerProps = (0, useInfiniteListController_1.useInfiniteListController)(props);
    var isAuthPending = (0, auth_1.useIsAuthPending)({
        resource: controllerProps.resource,
        action: 'list',
    });
    if (isAuthPending && !props.disableAuthentication) {
        return loading;
    }
    return (
    // We pass props.resource here as we don't need to create a new ResourceContext if the props is not provided
    React.createElement(core_1.OptionalResourceContextProvider, { value: props.resource },
        React.createElement(ListContextProvider_1.ListContextProvider, { value: controllerProps },
            React.createElement(InfinitePaginationContext_1.InfinitePaginationContext.Provider, { value: {
                    hasNextPage: controllerProps.hasNextPage,
                    fetchNextPage: controllerProps.fetchNextPage,
                    isFetchingNextPage: controllerProps.isFetchingNextPage,
                    hasPreviousPage: controllerProps.hasPreviousPage,
                    fetchPreviousPage: controllerProps.fetchPreviousPage,
                    isFetchingPreviousPage: controllerProps.isFetchingPreviousPage,
                } }, children))));
};
exports.InfiniteListBase = InfiniteListBase;
//# sourceMappingURL=InfiniteListBase.js.map