export const isIdentifier = (field, fieldType) => ['integer_id', 'id'].includes(fieldType) || field.name === 'id';
const getIdentifierValue = (schemaAnalyzer, resource, fields, fieldName, 
// eslint-disable-next-line @typescript-eslint/no-explicit-any
value) => {
    const prefix = `/${resource}/`;
    if (typeof value === 'string' && value.indexOf(prefix) === 0) {
        const field = fields.find((fieldObj) => fieldObj.name === fieldName);
        if (!field) {
            return value;
        }
        const fieldType = schemaAnalyzer.getFieldType(field);
        if (isIdentifier(field, fieldType)) {
            const id = value.substring(prefix.length);
            if (['integer_id', 'integer'].includes(fieldType)) {
                return parseInt(id, 10);
            }
            return id;
        }
    }
    return value;
};
export default getIdentifierValue;
//# sourceMappingURL=getIdentifierValue.js.map