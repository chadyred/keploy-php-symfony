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
import { ArrayField, SingleFieldList, TextField, useRecordContext, } from 'react-admin';
const EnumField = (_a) => {
    var { transformEnum, source } = _a, props = __rest(_a, ["transformEnum", "source"]);
    const record = useRecordContext();
    if (!record || typeof source === 'undefined') {
        return null;
    }
    const value = record[source];
    const enumRecord = {
        [source]: (Array.isArray(value) ? value : [value]).map((v) => ({
            value: transformEnum ? transformEnum(v) : v,
        })),
    };
    return (React.createElement(ArrayField, { source: source, record: enumRecord },
        React.createElement(SingleFieldList, { linkType: false },
            React.createElement(TextField, Object.assign({}, props, { source: "value" })))));
};
EnumField.displayName = 'EnumField';
export default EnumField;
//# sourceMappingURL=EnumField.js.map