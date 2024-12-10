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
import /* tree-shaking no-side-effects-when-called */ schemaAnalyzer from './schemaAnalyzer.js';
import AdminGuesser from '../core/AdminGuesser.js';
const hydraSchemaAnalyzer = schemaAnalyzer();
const HydraAdmin = (_a) => {
    var { entrypoint, mercure, dataProvider = dataProviderFactory({
        entrypoint,
        mercure: mercure !== null && mercure !== void 0 ? mercure : true,
    }), schemaAnalyzer: adminSchemaAnalyzer = hydraSchemaAnalyzer } = _a, props = __rest(_a, ["entrypoint", "mercure", "dataProvider", "schemaAnalyzer"]);
    return (React.createElement(AdminGuesser, Object.assign({ dataProvider: dataProvider, schemaAnalyzer: adminSchemaAnalyzer }, props)));
};
export default HydraAdmin;
//# sourceMappingURL=HydraAdmin.js.map