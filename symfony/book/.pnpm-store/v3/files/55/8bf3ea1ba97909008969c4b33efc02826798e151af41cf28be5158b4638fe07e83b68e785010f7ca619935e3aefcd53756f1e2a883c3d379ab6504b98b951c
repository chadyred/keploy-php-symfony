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
import clsx from 'clsx';
import { Link as RRLink } from 'react-router-dom';
import { styled, Link as MuiLink, } from '@mui/material';
export var Link = function (props) {
    var to = props.to, children = props.children, className = props.className, rest = __rest(props, ["to", "children", "className"]);
    return (React.createElement(StyledMuiLink, __assign({ component: RRLink, to: to, className: clsx(LinkClasses.link, className) }, rest), children));
};
var PREFIX = 'RaLink';
export var LinkClasses = {
    link: "".concat(PREFIX, "-link"),
};
var StyledMuiLink = styled(MuiLink)({}); // @see https://mui.com/material-ui/guides/typescript/#complications-with-the-component-prop
//# sourceMappingURL=Link.js.map