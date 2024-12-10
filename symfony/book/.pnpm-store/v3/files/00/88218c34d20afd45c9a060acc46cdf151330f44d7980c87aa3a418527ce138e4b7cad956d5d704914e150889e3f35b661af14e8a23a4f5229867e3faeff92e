import { getFiltersParametersFromSchema, getOrderParametersFromSchema, } from '../introspection/schemaAnalyzer.js';
const withHttpScheme = (value) => (value === null || value === void 0 ? void 0 : value.startsWith('https://')) ? value.replace(/^https/, 'http') : value;
/**
 * @param schema The schema of a resource
 *
 * @returns The name of the reference field
 */
const getFieldNameFromSchema = (schema) => {
    if (!schema.fields) {
        return '';
    }
    const field = schema.fields.find((schemaField) => withHttpScheme(schemaField.id) === 'http://schema.org/name');
    return field ? field.name : 'id';
};
/**
 * @returns The type of the field
 */
const getFieldType = (field) => {
    switch (withHttpScheme(field.id)) {
        case 'http://schema.org/identifier':
            return withHttpScheme(field.range) ===
                'http://www.w3.org/2001/XMLSchema#integer'
                ? 'integer_id'
                : 'id';
        case 'http://schema.org/email':
            return 'email';
        case 'http://schema.org/url':
            return 'url';
        default:
    }
    if (field.embedded !== null && field.maxCardinality !== 1) {
        return 'array';
    }
    switch (withHttpScheme(field.range)) {
        case 'http://www.w3.org/2001/XMLSchema#array':
            return 'array';
        case 'http://www.w3.org/2001/XMLSchema#integer':
            return 'integer';
        case 'http://www.w3.org/2001/XMLSchema#decimal':
        case 'http://www.w3.org/2001/XMLSchema#float':
            return 'float';
        case 'http://www.w3.org/2001/XMLSchema#boolean':
            return 'boolean';
        case 'http://www.w3.org/2001/XMLSchema#date':
            return 'date';
        case 'http://www.w3.org/2001/XMLSchema#dateTime':
            return 'dateTime';
        default:
            return 'text';
    }
};
const getSubmissionErrors = (error) => {
    var _a;
    if (!((_a = error.body) === null || _a === void 0 ? void 0 : _a[0])) {
        return null;
    }
    const content = error.body[0];
    const violationKey = Object.keys(content).find((key) => key.includes('violations'));
    if (!violationKey) {
        return null;
    }
    const base = violationKey.substring(0, violationKey.indexOf('#'));
    const violations = content[violationKey].reduce((previousViolations, violation) => {
        var _a, _b;
        return !violation[`${base}#propertyPath`] || !violation[`${base}#message`]
            ? previousViolations
            : Object.assign(Object.assign({}, previousViolations), { [(_a = violation[`${base}#propertyPath`][0]) === null || _a === void 0 ? void 0 : _a['@value']]: (_b = violation[`${base}#message`][0]) === null || _b === void 0 ? void 0 : _b['@value'] });
    }, {});
    if (Object.keys(violations).length === 0) {
        return null;
    }
    return violations;
};
export default function schemaAnalyzer() {
    return {
        getFieldNameFromSchema,
        getOrderParametersFromSchema,
        getFiltersParametersFromSchema,
        getFieldType,
        getSubmissionErrors,
    };
}
//# sourceMappingURL=schemaAnalyzer.js.map