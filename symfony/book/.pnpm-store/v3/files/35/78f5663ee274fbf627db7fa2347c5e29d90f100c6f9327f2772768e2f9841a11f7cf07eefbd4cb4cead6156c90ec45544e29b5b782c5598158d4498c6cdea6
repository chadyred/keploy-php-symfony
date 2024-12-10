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
import { Show, SimpleShowLayout, Tab, TabbedShowLayout, useResourceContext, } from 'react-admin';
import { useParams } from 'react-router-dom';
import FieldGuesser from '../field/FieldGuesser.js';
import Introspecter from '../introspection/Introspecter.js';
import useMercureSubscription from '../mercure/useMercureSubscription.js';
import useDisplayOverrideCode from '../useDisplayOverrideCode.js';
const getOverrideCode = (schema, fields) => {
    let code = `If you want to override at least one field, create a ${schema.title}Show component with this content:\n`;
    code += `\n`;
    code += `import { ShowGuesser, FieldGuesser } from "@api-platform/admin";\n`;
    code += `\n`;
    code += `export const ${schema.title}Show = () => (\n`;
    code += `    <ShowGuesser>\n`;
    fields.forEach((field) => {
        code += `        <FieldGuesser source="${field.name}" />\n`;
    });
    code += `    </ShowGuesser>\n`;
    code += `);\n`;
    code += `\n`;
    code += `Then, update your main admin component:\n`;
    code += `\n`;
    code += `import { HydraAdmin, ResourceGuesser } from "@api-platform/admin";\n`;
    code += `import { ${schema.title}Show } from './${schema.title}Show';\n`;
    code += `\n`;
    code += `const App = () => (\n`;
    code += `    <HydraAdmin entrypoint={...}>\n`;
    code += `        <ResourceGuesser name="${schema.name}" show={${schema.title}Show} />\n`;
    code += `        {/* ... */}\n`;
    code += `    </HydraAdmin>\n`;
    code += `);\n`;
    return code;
};
export const IntrospectedShowGuesser = (_a) => {
    var { fields, readableFields, writableFields, schema, schemaAnalyzer, viewComponent, children } = _a, props = __rest(_a, ["fields", "readableFields", "writableFields", "schema", "schemaAnalyzer", "viewComponent", "children"]);
    const { id: routeId } = useParams();
    const id = decodeURIComponent(routeId !== null && routeId !== void 0 ? routeId : '');
    useMercureSubscription(props.resource, id);
    const displayOverrideCode = useDisplayOverrideCode();
    let fieldChildren = children;
    if (!fieldChildren) {
        fieldChildren = readableFields.map((field) => (React.createElement(FieldGuesser, { key: field.name, source: field.name })));
        displayOverrideCode(getOverrideCode(schema, readableFields));
    }
    const hasTab = Array.isArray(fieldChildren) &&
        fieldChildren.some((child) => typeof child === 'object' && 'type' in child && child.type === Tab);
    const ShowLayout = hasTab ? TabbedShowLayout : SimpleShowLayout;
    return (React.createElement(Show, Object.assign({ component: viewComponent }, props),
        React.createElement(ShowLayout, null, fieldChildren)));
};
const ShowGuesser = (props) => {
    const resource = useResourceContext(props);
    if (!resource) {
        throw new Error('ShowGuesser must be used with a resource');
    }
    return (React.createElement(Introspecter, Object.assign({ component: IntrospectedShowGuesser, resource: resource }, props)));
};
export default ShowGuesser;
//# sourceMappingURL=ShowGuesser.js.map