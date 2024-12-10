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
import { useCreateController, } from './useCreateController';
import { CreateContextProvider } from './CreateContextProvider';
import { OptionalResourceContextProvider } from '../../core';
import { useIsAuthPending } from '../../auth';
/**
 * Call useCreateController and put the value in a CreateContext
 *
 * Base class for <Create> components, without UI.
 *
 * Accepts any props accepted by useCreateController:
 * - id: The record identifier
 * - resource: The resource
 *
 * @example // Custom edit layout
 *
 * const PostCreate = () => (
 *     <CreateBase>
 *         <Grid container>
 *             <Grid item xs={8}>
 *                 <SimpleForm>
 *                     ...
 *                 </SimpleForm>
 *             </Grid>
 *             <Grid item xs={4}>
 *                 Create instructions...
 *             </Grid>
 *         </Grid>
 *         <div>
 *             Post related links...
 *         </div>
 *     </CreateBase>
 * );
 */
export var CreateBase = function (_a) {
    var children = _a.children, _b = _a.loading, loading = _b === void 0 ? null : _b, props = __rest(_a, ["children", "loading"]);
    var controllerProps = useCreateController(props);
    var isAuthPending = useIsAuthPending({
        resource: controllerProps.resource,
        action: 'create',
    });
    if (isAuthPending && !props.disableAuthentication) {
        return loading;
    }
    return (
    // We pass props.resource here as we don't need to create a new ResourceContext if the props is not provided
    React.createElement(OptionalResourceContextProvider, { value: props.resource },
        React.createElement(CreateContextProvider, { value: controllerProps }, children)));
};
//# sourceMappingURL=CreateBase.js.map