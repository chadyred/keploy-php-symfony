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
import React, { useEffect } from 'react';
import { Resource, useResourceDefinition, useResourceDefinitionContext, } from 'react-admin';
import ListGuesser from '../list/ListGuesser.js';
import CreateGuesser from '../create/CreateGuesser.js';
import EditGuesser from '../edit/EditGuesser.js';
import ShowGuesser from '../show/ShowGuesser.js';
import Introspecter from '../introspection/Introspecter.js';
export const IntrospectedResourceGuesser = (_a) => {
    var _b;
    var { resource, schema, schemaAnalyzer, list = ListGuesser, edit = EditGuesser, create = CreateGuesser, show = ShowGuesser } = _a, props = __rest(_a, ["resource", "schema", "schemaAnalyzer", "list", "edit", "create", "show"]);
    const { register } = useResourceDefinitionContext();
    const registeredDefinition = useResourceDefinition({ resource });
    let hasList = false;
    let hasEdit = false;
    let hasCreate = false;
    let hasShow = false;
    (_b = schema.operations) === null || _b === void 0 ? void 0 : _b.forEach((operation) => {
        if (operation.type === 'list') {
            hasList = true;
        }
        if (operation.type === 'edit') {
            hasEdit = true;
        }
        if (operation.type === 'create') {
            hasCreate = true;
        }
        if (operation.type === 'show') {
            hasShow = true;
        }
    });
    useEffect(() => {
        if (registeredDefinition.hasList !== hasList ||
            registeredDefinition.hasEdit !== hasEdit ||
            registeredDefinition.hasCreate !== hasCreate ||
            registeredDefinition.hasShow !== hasShow) {
            register({
                name: resource,
                icon: props.icon,
                options: props.options,
                hasList,
                hasEdit,
                hasCreate,
                hasShow,
            });
        }
    }, [
        register,
        resource,
        props.icon,
        props.options,
        hasList,
        hasEdit,
        hasCreate,
        hasShow,
        registeredDefinition,
    ]);
    return (React.createElement(Resource, Object.assign({}, props, { name: resource, create: create, edit: edit, list: list, show: show })));
};
const ResourceGuesser = (_a) => {
    var { name } = _a, props = __rest(_a, ["name"]);
    return (React.createElement(Introspecter, Object.assign({ component: IntrospectedResourceGuesser, resource: name }, props)));
};
ResourceGuesser.raName = 'Resource';
ResourceGuesser.registerResource = (props) => ({
    name: props.name,
    icon: props.icon,
    options: props.options,
    hasList: true,
    hasEdit: true,
    hasCreate: true,
    hasShow: true,
});
export default ResourceGuesser;
//# sourceMappingURL=ResourceGuesser.js.map