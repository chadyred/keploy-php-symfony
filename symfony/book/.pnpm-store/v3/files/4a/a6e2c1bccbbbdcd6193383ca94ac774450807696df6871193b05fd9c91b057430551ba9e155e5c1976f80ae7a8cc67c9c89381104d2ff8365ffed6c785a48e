var __assign = (this && this.__assign) || function () {
    __assign = Object.assign || function(t) {
        for (var s, i = 1, n = arguments.length; i < n; i++) {
            s = arguments[i];
            for (var p in s) if (Object.prototype.hasOwnProperty.call(s, p))
                t[p] = s[p];
        }
        return t;
    };
    return __assign.apply(this, arguments);
};
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
import * as React from 'react';
import { sanitizeFieldRestProps } from './sanitizeFieldRestProps';
import { Typography, Link } from '@mui/material';
import { useFieldValue, useTranslate } from 'ra-core';
import { genericMemo } from './genericMemo';
var UrlFieldImpl = function (props) {
    var className = props.className, emptyText = props.emptyText, content = props.content, rest = __rest(props, ["className", "emptyText", "content"]);
    var value = useFieldValue(props);
    var translate = useTranslate();
    if (value == null) {
        return (React.createElement(Typography, __assign({ component: "span", variant: "body2", className: className }, sanitizeFieldRestProps(rest)), emptyText && translate(emptyText, { _: emptyText })));
    }
    return (React.createElement(Link, __assign({ className: className, href: value, onClick: stopPropagation, variant: "body2" }, sanitizeFieldRestProps(rest)), content !== null && content !== void 0 ? content : value));
};
UrlFieldImpl.displayName = 'UrlFieldImpl';
export var UrlField = genericMemo(UrlFieldImpl);
// useful to prevent click bubbling in a Datagrid with rowClick
var stopPropagation = function (e) { return e.stopPropagation(); };
//# sourceMappingURL=UrlField.js.map