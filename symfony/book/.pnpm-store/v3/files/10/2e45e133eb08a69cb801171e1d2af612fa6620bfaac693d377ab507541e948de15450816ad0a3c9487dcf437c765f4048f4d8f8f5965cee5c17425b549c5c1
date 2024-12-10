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
import dataProviderFactory from './dataProvider.js';
import { restDataProvider } from '../dataProvider/index.js';
import /* tree-shaking no-side-effects-when-called */ schemaAnalyzer from './schemaAnalyzer.js';
import AdminGuesser from '../core/AdminGuesser.js';
const openApiSchemaAnalyzer = schemaAnalyzer();
const OpenApiAdmin = (_a) => {
    var { entrypoint, docEntrypoint, mercure, dataProvider = dataProviderFactory({
        dataProvider: restDataProvider(entrypoint),
        entrypoint,
        docEntrypoint,
        mercure: mercure !== null && mercure !== void 0 ? mercure : false,
    }), schemaAnalyzer: adminSchemaAnalyzer = openApiSchemaAnalyzer } = _a, props = __rest(_a, ["entrypoint", "docEntrypoint", "mercure", "dataProvider", "schemaAnalyzer"]);
    return (React.createElement(AdminGuesser, Object.assign({ dataProvider: dataProvider, schemaAnalyzer: adminSchemaAnalyzer }, props)));
};
export default OpenApiAdmin;
//# sourceMappingURL=OpenApiAdmin.js.map