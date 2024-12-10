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
var _a;
import * as React from 'react';
import { Card, CardContent, styled } from '@mui/material';
import clsx from 'clsx';
import { useEditContext, useResourceDefinition } from 'ra-core';
import { EditActions } from './EditActions';
import { Title } from '../layout';
var defaultActions = React.createElement(EditActions, null);
export var EditView = function (props) {
    var _a;
    var actions = props.actions, aside = props.aside, children = props.children, className = props.className, _b = props.component, Content = _b === void 0 ? Card : _b, _c = props.emptyWhileLoading, emptyWhileLoading = _c === void 0 ? false : _c, title = props.title, rest = __rest(props, ["actions", "aside", "children", "className", "component", "emptyWhileLoading", "title"]);
    var hasShow = useResourceDefinition().hasShow;
    var _d = useEditContext(), resource = _d.resource, defaultTitle = _d.defaultTitle, record = _d.record, isPending = _d.isPending;
    var finalActions = typeof actions === 'undefined' && hasShow ? defaultActions : actions;
    if (!children || (!record && isPending && emptyWhileLoading)) {
        return null;
    }
    return (React.createElement(Root, __assign({ className: clsx('edit-page', className) }, rest),
        title !== false && (React.createElement(Title, { title: title, defaultTitle: defaultTitle, preferenceKey: "".concat(resource, ".edit.title") })),
        finalActions,
        React.createElement("div", { className: clsx(EditClasses.main, (_a = {},
                _a[EditClasses.noActions] = !finalActions,
                _a)) },
            React.createElement(Content, { className: EditClasses.card }, record ? children : React.createElement(CardContent, null, "\u00A0")),
            aside)));
};
var PREFIX = 'RaEdit';
export var EditClasses = {
    main: "".concat(PREFIX, "-main"),
    noActions: "".concat(PREFIX, "-noActions"),
    card: "".concat(PREFIX, "-card"),
};
var Root = styled('div', {
    name: PREFIX,
    overridesResolver: function (props, styles) { return styles.root; },
})((_a = {},
    _a["& .".concat(EditClasses.main)] = {
        display: 'flex',
        alignItems: 'flex-start',
    },
    _a["& .".concat(EditClasses.noActions)] = {
        marginTop: '1em',
    },
    _a["& .".concat(EditClasses.card)] = {
        flex: '1 1 auto',
    },
    _a));
//# sourceMappingURL=EditView.js.map