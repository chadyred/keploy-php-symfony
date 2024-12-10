var __assign = (this && this.__assign) || function () {
    __assign = Object.assign || function(t) {
        for (var s, i = 1, n = arguments.length; i < n; i++) {
            s = arguments[i];
            for (var p in s) if (Object.prototype.hasOwnProperty.call(s, p))
                t[p] = s[p];
        }
        return t;
    };
    return __assign.apply(this, arguments);
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
import * as React from 'react';
import { CreateBase, useCheckMinimumRequiredProps, } from 'ra-core';
import { CreateView } from './CreateView';
import { Loading } from '../layout';
/**
 * Page component for the Create view
 *
 * The `<Create>` component renders the page title and actions.
 * It is not responsible for rendering the actual form -
 * that's the job of its child component (usually `<SimpleForm>`),
 * to which it passes the `record` as prop.
 *
 * The <Create> component accepts the following props:
 *
 * - actions
 * - aside
 * - component
 * - mutationOptions
 * - title
 *
 * @example
 *
 * // in src/posts.js
 * import * as React from "react";
 * import { Create, SimpleForm, TextInput } from 'react-admin';
 *
 * export const PostCreate = () => (
 *     <Create>
 *         <SimpleForm>
 *             <TextInput source="title" />
 *         </SimpleForm>
 *     </Create>
 * );
 *
 * // in src/App.js
 * import * as React from "react";
 * import { Admin, Resource } from 'react-admin';
 *
 * import { PostCreate } from './posts';
 *
 * const App = () => (
 *     <Admin dataProvider={...}>
 *         <Resource name="posts" create={PostCreate} />
 *     </Admin>
 * );
 * export default App;
 */
export var Create = function (props) {
    useCheckMinimumRequiredProps('Create', ['children'], props);
    var resource = props.resource, record = props.record, redirect = props.redirect, transform = props.transform, mutationOptions = props.mutationOptions, disableAuthentication = props.disableAuthentication, hasEdit = props.hasEdit, hasShow = props.hasShow, _a = props.loading, loading = _a === void 0 ? defaultLoading : _a, rest = __rest(props, ["resource", "record", "redirect", "transform", "mutationOptions", "disableAuthentication", "hasEdit", "hasShow", "loading"]);
    return (React.createElement(CreateBase, { resource: resource, record: record, redirect: redirect, transform: transform, mutationOptions: mutationOptions, disableAuthentication: disableAuthentication, hasEdit: hasEdit, hasShow: hasShow, loading: loading },
        React.createElement(CreateView, __assign({}, rest))));
};
var defaultLoading = React.createElement(Loading, null);
//# sourceMappingURL=Create.js.map