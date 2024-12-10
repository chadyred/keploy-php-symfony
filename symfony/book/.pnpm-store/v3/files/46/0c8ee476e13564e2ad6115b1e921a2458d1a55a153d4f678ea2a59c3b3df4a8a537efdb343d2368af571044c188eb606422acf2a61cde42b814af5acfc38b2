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
import { Edit, FormTab, SimpleForm, TabbedForm, useResourceContext, } from 'react-admin';
import { useParams } from 'react-router-dom';
import InputGuesser from '../input/InputGuesser.js';
import Introspecter from '../introspection/Introspecter.js';
import useMercureSubscription from '../mercure/useMercureSubscription.js';
import useDisplayOverrideCode from '../useDisplayOverrideCode.js';
import useOnSubmit from '../useOnSubmit.js';
const getOverrideCode = (schema, fields) => {
    let code = `If you want to override at least one input, create a ${schema.title}Edit component with this content:\n`;
    code += `\n`;
    code += `import { EditGuesser, InputGuesser } from "@api-platform/admin";\n`;
    code += `\n`;
    code += `export const ${schema.title}Edit = () => (\n`;
    code += `    <EditGuesser>\n`;
    fields.forEach((field) => {
        code += `        <InputGuesser source="${field.name}" />\n`;
    });
    code += `    </EditGuesser>\n`;
    code += `);\n`;
    code += `\n`;
    code += `Then, update your main admin component:\n`;
    code += `\n`;
    code += `import { HydraAdmin, ResourceGuesser } from "@api-platform/admin";\n`;
    code += `import { ${schema.title}Edit } from './${schema.title}Edit';\n`;
    code += `\n`;
    code += `const App = () => (\n`;
    code += `    <HydraAdmin entrypoint={...}>\n`;
    code += `        <ResourceGuesser name="${schema.name}" edit={${schema.title}Edit} />\n`;
    code += `        {/* ... */}\n`;
    code += `    </HydraAdmin>\n`;
    code += `);\n`;
    return code;
};
export const IntrospectedEditGuesser = (_a) => {
    var { fields, readableFields, writableFields, schema, schemaAnalyzer, resource, mutationMode = 'pessimistic', mutationOptions, redirect: redirectTo = 'list', mode, defaultValues, validate, transform, toolbar, warnWhenUnsavedChanges, formComponent, viewComponent, sanitizeEmptyValues = true, children } = _a, props = __rest(_a, ["fields", "readableFields", "writableFields", "schema", "schemaAnalyzer", "resource", "mutationMode", "mutationOptions", "redirect", "mode", "defaultValues", "validate", "transform", "toolbar", "warnWhenUnsavedChanges", "formComponent", "viewComponent", "sanitizeEmptyValues", "children"]);
    const { id: routeId } = useParams();
    const id = decodeURIComponent(routeId !== null && routeId !== void 0 ? routeId : '');
    const save = useOnSubmit({
        resource,
        schemaAnalyzer,
        fields,
        mutationOptions,
        transform,
        redirectTo,
        children: [],
    });
    useMercureSubscription(resource, id);
    const displayOverrideCode = useDisplayOverrideCode();
    let inputChildren = React.Children.toArray(children);
    if (inputChildren.length === 0) {
        inputChildren = writableFields.map((field) => (React.createElement(InputGuesser, { key: field.name, source: field.name })));
        displayOverrideCode(getOverrideCode(schema, writableFields));
    }
    const hasFormTab = inputChildren.some((child) => typeof child === 'object' && 'type' in child && child.type === FormTab);
    const FormType = hasFormTab ? TabbedForm : SimpleForm;
    return (React.createElement(Edit, Object.assign({ resource: resource, id: id, mutationMode: mutationMode, redirect: redirectTo, component: viewComponent }, props),
        React.createElement(FormType, { onSubmit: mutationMode !== 'pessimistic' ? undefined : save, mode: mode, defaultValues: defaultValues, validate: validate, toolbar: toolbar, warnWhenUnsavedChanges: warnWhenUnsavedChanges, sanitizeEmptyValues: sanitizeEmptyValues, component: formComponent }, inputChildren)));
};
const EditGuesser = (props) => {
    const resource = useResourceContext(props);
    if (!resource) {
        throw new Error('EditGuesser must be used with a resource');
    }
    return (React.createElement(Introspecter, Object.assign({ component: IntrospectedEditGuesser, resource: resource }, props)));
};
export default EditGuesser;
//# sourceMappingURL=EditGuesser.js.map