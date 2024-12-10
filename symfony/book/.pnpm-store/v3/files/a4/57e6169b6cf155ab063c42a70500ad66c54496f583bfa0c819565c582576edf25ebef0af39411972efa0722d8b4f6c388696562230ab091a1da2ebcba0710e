import { getFiltersParametersFromSchema, getOrderParametersFromSchema, } from '../introspection/schemaAnalyzer.js';
/**
 * @param schema The schema of a resource
 *
 * @returns The name of the reference field
 */
const getFieldNameFromSchema = (schema) => {
    var _a;
    if (!((_a = schema.fields) === null || _a === void 0 ? void 0 : _a[0])) {
        return '';
    }
    if (schema.fields.find((schemaField) => schemaField.name === 'id')) {
        return 'id';
    }
    return schema.fields[0].name;
};
/**
 * @returns The type of the field
 */
const getFieldType = (field) => {
    switch (field.type) {
        case 'array':
            return 'array';
        case 'string':
        case 'byte':
        case 'binary':
        case 'hexBinary':
        case 'base64Binary':
        case 'uuid':
        case 'password':
            return 'text';
        case 'integer':
        case 'negativeInteger':
        case 'nonNegativeInteger':
        case 'positiveInteger':
        case 'nonPositiveInteger':
            return 'integer';
        case 'number':
        case 'decimal':
        case 'double':
        case 'float':
            return 'float';
        case 'boolean':
            return 'boolean';
        case 'date':
            return 'date';
        case 'dateTime':
        case 'duration':
        case 'time':
            return 'dateTime';
        case 'email':
            return 'email';
        case 'url':
            return 'url';
        default:
            return 'text';
    }
};
const getSubmissionErrors = () => null;
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