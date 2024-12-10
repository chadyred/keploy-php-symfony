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
import { ArrayField, BooleanField, ChipField, DateField, EmailField, NumberField, ReferenceArrayField, ReferenceField, SimpleList, SingleFieldList, TextField, UrlField, useResourceContext, } from 'react-admin';
import Introspecter from '../introspection/Introspecter.js';
import EnumField from './EnumField.js';
const isFieldSortable = (field, schema) => !!schema.parameters &&
    schema.parameters.filter((parameter) => parameter.variable === field.name)
        .length > 0 &&
    schema.parameters.filter((parameter) => parameter.variable === `order[${field.name}]`).length > 0;
const renderField = (field, schemaAnalyzer, props) => {
    if (field.reference !== null && typeof field.reference === 'object') {
        if (field.maxCardinality === 1) {
            return (React.createElement(ReferenceField, Object.assign({}, props, { reference: field.reference.name }),
                React.createElement(ChipField, { source: schemaAnalyzer.getFieldNameFromSchema(field.reference) })));
        }
        const fieldName = schemaAnalyzer.getFieldNameFromSchema(field.reference);
        const _a = props, { linkType } = _a, rest = __rest(_a, ["linkType"]);
        return (React.createElement(ReferenceArrayField, Object.assign({}, rest, { reference: field.reference.name }),
            React.createElement(SingleFieldList, { linkType: linkType },
                React.createElement(ChipField, { source: fieldName, key: fieldName }))));
    }
    if (field.embedded !== null && field.maxCardinality !== 1) {
        return (React.createElement(ArrayField, Object.assign({}, props),
            React.createElement(SimpleList, { primaryText: (record) => JSON.stringify(record), linkType: false, 
                // Workaround for forcing the list to display underlying data.
                total: 2 })));
    }
    if (field.enum) {
        return (React.createElement(EnumField, Object.assign({ transformEnum: (value) => {
                var _a, _b, _c;
                return (_c = (_b = Object.entries((_a = field.enum) !== null && _a !== void 0 ? _a : {}).find(([, v]) => v === value)) === null || _b === void 0 ? void 0 : _b[0]) !== null && _c !== void 0 ? _c : value;
            } }, props)));
    }
    const fieldType = schemaAnalyzer.getFieldType(field);
    switch (fieldType) {
        case 'email':
            return React.createElement(EmailField, Object.assign({}, props));
        case 'url':
            return React.createElement(UrlField, Object.assign({}, props));
        case 'integer':
        case 'integer_id':
        case 'float':
            return React.createElement(NumberField, Object.assign({}, props));
        case 'boolean':
            return React.createElement(BooleanField, Object.assign({}, props));
        case 'date':
        case 'dateTime':
            return React.createElement(DateField, Object.assign({}, props));
        default:
            return React.createElement(TextField, Object.assign({}, props));
    }
};
export const IntrospectedFieldGuesser = (_a) => {
    var { fields, readableFields, writableFields, schema, schemaAnalyzer } = _a, props = __rest(_a, ["fields", "readableFields", "writableFields", "schema", "schemaAnalyzer"]);
    if (!props.source) {
        // eslint-disable-next-line no-console
        console.error('FieldGuesser: missing source property.');
        return null;
    }
    const field = fields.find((f) => f.name === props.source);
    if (!field) {
        // eslint-disable-next-line no-console
        console.error(`Field "${props.source}" not present inside API description for the resource "${props.resource}"`);
        return null;
    }
    return renderField(field, schemaAnalyzer, Object.assign(Object.assign({ sortable: isFieldSortable(field, schema) }, props), { source: props.source }));
};
const FieldGuesser = (props) => {
    const resource = useResourceContext(props);
    if (!resource) {
        throw new Error('FieldGuesser must be used with a resource');
    }
    return (React.createElement(Introspecter, Object.assign({ component: IntrospectedFieldGuesser, resource: resource, includeDeprecated: true }, props)));
};
export default FieldGuesser;
//# sourceMappingURL=FieldGuesser.js.map