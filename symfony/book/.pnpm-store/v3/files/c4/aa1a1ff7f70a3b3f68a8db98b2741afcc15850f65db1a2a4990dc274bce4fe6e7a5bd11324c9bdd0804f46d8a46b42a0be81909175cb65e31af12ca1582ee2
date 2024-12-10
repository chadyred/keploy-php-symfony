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
import { ArrayInput, BooleanInput, DateInput, DateTimeInput, NumberInput, ReferenceArrayInput, ReferenceInput, SelectArrayInput, SelectInput, SimpleFormIterator, TextInput, required, useResourceContext, } from 'react-admin';
import isPlainObject from 'lodash.isplainobject';
import Introspecter from '../introspection/Introspecter.js';
import getIdentifierValue, { isIdentifier } from '../getIdentifierValue.js';
export const IntrospectedInputGuesser = (_a) => {
    var { fields, readableFields, writableFields, schema, schemaAnalyzer, validate, transformEnum } = _a, props = __rest(_a, ["fields", "readableFields", "writableFields", "schema", "schemaAnalyzer", "validate", "transformEnum"]);
    const field = fields.find(({ name }) => name === props.source);
    if (!field) {
        // eslint-disable-next-line no-console
        console.error(`Field ${props.source} not present inside API description for the resource ${props.resource}`);
        return null;
    }
    const guessedValidate = !validate && field.required ? [required()] : validate;
    if (field.reference !== null && typeof field.reference === 'object') {
        if (field.maxCardinality === 1) {
            const _b = props, { filter, page, perPage, sort, enableGetChoices } = _b, rest = __rest(_b, ["filter", "page", "perPage", "sort", "enableGetChoices"]);
            return (React.createElement(ReferenceInput, { key: field.name, reference: field.reference.name, source: field.name, filter: filter, page: page, perPage: perPage, sort: sort, enableGetChoices: enableGetChoices },
                React.createElement(SelectInput, Object.assign({ optionText: schemaAnalyzer.getFieldNameFromSchema(field.reference), validate: guessedValidate }, rest))));
        }
        const _c = props, { filter, page, perPage, sort, enableGetChoices } = _c, rest = __rest(_c, ["filter", "page", "perPage", "sort", "enableGetChoices"]);
        return (React.createElement(ReferenceArrayInput, { key: field.name, reference: field.reference.name, source: field.name, filter: filter, page: page, perPage: perPage, sort: sort, enableGetChoices: enableGetChoices },
            React.createElement(SelectArrayInput, Object.assign({ optionText: schemaAnalyzer.getFieldNameFromSchema(field.reference), validate: guessedValidate }, rest))));
    }
    let format;
    let parse;
    const fieldType = schemaAnalyzer.getFieldType(field);
    if (field.enum) {
        const choices = Object.entries(field.enum).map(([k, v]) => ({
            id: v,
            name: transformEnum ? transformEnum(v) : k,
        }));
        return fieldType === 'array' ? (React.createElement(SelectArrayInput, Object.assign({ validate: guessedValidate, choices: choices }, props))) : (React.createElement(SelectInput, Object.assign({ validate: guessedValidate, choices: choices }, props)));
    }
    if (isIdentifier(field, fieldType)) {
        format = (value) => getIdentifierValue(schemaAnalyzer, props.resource, fields, field.name, value);
    }
    const formatEmbedded = (value) => {
        if (value === null) {
            return '';
        }
        if (typeof value === 'string') {
            return value;
        }
        return JSON.stringify(value);
    };
    const parseEmbedded = (value) => {
        try {
            const parsed = JSON.parse(value);
            if (!isPlainObject(parsed)) {
                return value;
            }
            return parsed;
        }
        catch (e) {
            return value;
        }
    };
    if (field.embedded !== null) {
        format = formatEmbedded;
        parse = parseEmbedded;
    }
    const { format: formatProp, parse: parseProp } = props;
    switch (fieldType) {
        case 'array':
            return (React.createElement(ArrayInput, Object.assign({ key: field.name, validate: guessedValidate }, props, { source: field.name }),
                React.createElement(SimpleFormIterator, null,
                    React.createElement(TextInput, { source: "", label: `resources.${props.resource}.fields.${field.name}`, format: formatProp !== null && formatProp !== void 0 ? formatProp : format, parse: parseProp !== null && parseProp !== void 0 ? parseProp : parse }))));
        case 'integer':
        case 'integer_id':
            return (React.createElement(NumberInput, Object.assign({ key: field.name, validate: guessedValidate }, props, { format: formatProp !== null && formatProp !== void 0 ? formatProp : format, parse: parseProp !== null && parseProp !== void 0 ? parseProp : parse, source: field.name })));
        case 'float':
            return (React.createElement(NumberInput, Object.assign({ key: field.name, step: "0.1", validate: guessedValidate }, props, { format: formatProp !== null && formatProp !== void 0 ? formatProp : format, parse: parseProp !== null && parseProp !== void 0 ? parseProp : parse, source: field.name })));
        case 'boolean':
            return (React.createElement(BooleanInput, Object.assign({ key: field.name, validate: guessedValidate }, props, { format: formatProp !== null && formatProp !== void 0 ? formatProp : format, parse: parseProp !== null && parseProp !== void 0 ? parseProp : parse, source: field.name })));
        case 'date':
            return (React.createElement(DateInput, Object.assign({ key: field.name, validate: guessedValidate }, props, { format: formatProp !== null && formatProp !== void 0 ? formatProp : format, parse: parseProp !== null && parseProp !== void 0 ? parseProp : parse, source: field.name })));
        case 'dateTime':
            return (React.createElement(DateTimeInput, Object.assign({ key: field.name, validate: guessedValidate }, props, { format: formatProp !== null && formatProp !== void 0 ? formatProp : format, parse: parseProp !== null && parseProp !== void 0 ? parseProp : parse, source: field.name })));
        default:
            return (React.createElement(TextInput, Object.assign({ key: field.name, validate: guessedValidate }, props, { format: formatProp !== null && formatProp !== void 0 ? formatProp : format, parse: parseProp !== null && parseProp !== void 0 ? parseProp : parse, source: field.name })));
    }
};
const InputGuesser = (props) => {
    const resource = useResourceContext(props);
    if (!resource) {
        throw new Error('guesser must be used with a resource');
    }
    return (React.createElement(Introspecter, Object.assign({ component: IntrospectedInputGuesser, resource: resource, includeDeprecated: true }, props)));
};
export default InputGuesser;
//# sourceMappingURL=InputGuesser.js.map