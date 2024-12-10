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
import { useShowController } from './useShowController';
import { ShowContextProvider } from './ShowContextProvider';
import { OptionalResourceContextProvider } from '../../core';
import { useIsAuthPending } from '../../auth';
/**
 * Call useShowController and put the value in a ShowContext
 *
 * Base class for <Show> components, without UI.
 *
 * Accepts any props accepted by useShowController:
 * - id: The record identifier
 * - resource: The resource
 *
 * @example // Custom show layout
 *
 * const PostShow = () => (
 *     <ShowBase resource="posts">
 *         <Grid container>
 *             <Grid item xs={8}>
 *                 <SimpleForm>
 *                     ...
 *                 </SimpleForm>
 *             </Grid>
 *             <Grid item xs={4}>
 *                 Show instructions...
 *             </Grid>
 *         </Grid>
 *         <div>
 *             Post related links...
 *         </div>
 *     </ShowBase>
 * );
 */
export var ShowBase = function (_a) {
    var children = _a.children, _b = _a.loading, loading = _b === void 0 ? null : _b, props = __rest(_a, ["children", "loading"]);
    var controllerProps = useShowController(props);
    var isAuthPending = useIsAuthPending({
        resource: controllerProps.resource,
        action: 'show',
    });
    if (isAuthPending && !props.disableAuthentication) {
        return loading;
    }
    return (
    // We pass props.resource here as we don't need to create a new ResourceContext if the props is not provided
    React.createElement(OptionalResourceContextProvider, { value: props.resource },
        React.createElement(ShowContextProvider, { value: controllerProps }, children)));
};
//# sourceMappingURL=ShowBase.js.map