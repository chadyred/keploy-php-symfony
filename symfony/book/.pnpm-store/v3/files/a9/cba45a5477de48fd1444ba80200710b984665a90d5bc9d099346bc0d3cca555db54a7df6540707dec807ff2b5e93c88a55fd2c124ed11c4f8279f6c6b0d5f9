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
import React, { useEffect, useState } from 'react';
import { Filter, useResourceContext } from 'react-admin';
import InputGuesser from '../input/InputGuesser.js';
import Introspecter from '../introspection/Introspecter.js';
/**
 * Adds filters based on the #ApiFilters attribute
 *
 * @see https://api-platform.com/docs/core/filters/
 */
export const IntrospectedFilterGuesser = (_a) => {
    var { fields, readableFields, writableFields, schema, schemaAnalyzer } = _a, rest = __rest(_a, ["fields", "readableFields", "writableFields", "schema", "schemaAnalyzer"]);
    const [filtersParameters, setFiltersParameters] = useState([]);
    useEffect(() => {
        if (schema) {
            schemaAnalyzer
                .getFiltersParametersFromSchema(schema)
                .then((parameters) => {
                setFiltersParameters(parameters);
            });
        }
    }, [schema, schemaAnalyzer]);
    if (!filtersParameters.length) {
        return null;
    }
    return (React.createElement(Filter, Object.assign({}, rest), filtersParameters.map((filter) => (React.createElement(InputGuesser, { key: filter.name, source: filter.name, alwaysOn: filter.isRequired })))));
};
const FilterGuesser = (props) => {
    const resource = useResourceContext(props);
    if (!resource) {
        throw new Error('FilterGuesser must be used with a resource');
    }
    return (React.createElement(Introspecter, Object.assign({ component: IntrospectedFilterGuesser, resource: resource }, props)));
};
export default FilterGuesser;
//# sourceMappingURL=FilterGuesser.js.map