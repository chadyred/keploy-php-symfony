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
const ResourcesIntrospecter = (_a) => {
    var { component: Component, schemaAnalyzer, includeDeprecated, resource, resources, loading, error } = _a, rest = __rest(_a, ["component", "schemaAnalyzer", "includeDeprecated", "resource", "resources", "loading", "error"]);
    if (loading) {
        return null;
    }
    if (error) {
        if (process.env.NODE_ENV === 'production') {
            // eslint-disable-next-line no-console
            console.error(error);
        }
        throw new Error('API schema is not readable');
    }
    const schema = resources.find((r) => r.name === resource);
    if (!(schema === null || schema === void 0 ? void 0 : schema.fields) || !(schema === null || schema === void 0 ? void 0 : schema.readableFields) || !(schema === null || schema === void 0 ? void 0 : schema.writableFields)) {
        if (process.env.NODE_ENV === 'production') {
            // eslint-disable-next-line no-console
            console.error(`Resource ${resource} not present inside API description`);
        }
        throw new Error(`Resource ${resource} not present inside API description`);
    }
    const fields = includeDeprecated
        ? schema.fields
        : schema.fields.filter(({ deprecated }) => !deprecated);
    const readableFields = includeDeprecated
        ? schema.readableFields
        : schema.readableFields.filter(({ deprecated }) => !deprecated);
    const writableFields = includeDeprecated
        ? schema.writableFields
        : schema.writableFields.filter(({ deprecated }) => !deprecated);
    return (React.createElement(Component, Object.assign({ schemaAnalyzer: schemaAnalyzer, resource: resource, schema: schema, fields: fields, readableFields: readableFields, writableFields: writableFields }, rest)));
};
export default ResourcesIntrospecter;
//# sourceMappingURL=ResourcesIntrospecter.js.map