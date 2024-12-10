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
import { Card, styled } from '@mui/material';
import clsx from 'clsx';
import { useShowContext, useResourceDefinition } from 'ra-core';
import { ShowActions } from './ShowActions';
import { Title } from '../layout';
var defaultActions = React.createElement(ShowActions, null);
export var ShowView = function (props) {
    var _a;
    var actions = props.actions, aside = props.aside, children = props.children, className = props.className, _b = props.component, Content = _b === void 0 ? Card : _b, _c = props.emptyWhileLoading, emptyWhileLoading = _c === void 0 ? false : _c, title = props.title, rest = __rest(props, ["actions", "aside", "children", "className", "component", "emptyWhileLoading", "title"]);
    var _d = useShowContext(), resource = _d.resource, defaultTitle = _d.defaultTitle, record = _d.record;
    var hasEdit = useResourceDefinition().hasEdit;
    var finalActions = typeof actions === 'undefined' && hasEdit ? defaultActions : actions;
    if (!children || (!record && emptyWhileLoading)) {
        return null;
    }
    return (React.createElement(Root, __assign({ className: clsx('show-page', className) }, rest),
        title !== false && (React.createElement(Title, { title: title, defaultTitle: defaultTitle, preferenceKey: "".concat(resource, ".show.title") })),
        finalActions !== false && finalActions,
        React.createElement("div", { className: clsx(ShowClasses.main, (_a = {},
                _a[ShowClasses.noActions] = !finalActions,
                _a)) },
            React.createElement(Content, { className: ShowClasses.card }, children),
            aside)));
};
var PREFIX = 'RaShow';
export var ShowClasses = {
    main: "".concat(PREFIX, "-main"),
    noActions: "".concat(PREFIX, "-noActions"),
    card: "".concat(PREFIX, "-card"),
};
var Root = styled('div', {
    name: PREFIX,
    overridesResolver: function (props, styles) { return styles.root; },
})((_a = {},
    _a["& .".concat(ShowClasses.main)] = {
        display: 'flex',
    },
    _a["& .".concat(ShowClasses.noActions)] = {
        marginTop: '1em',
    },
    _a["& .".concat(ShowClasses.card)] = {
        flex: '1 1 auto',
    },
    _a));
//# sourceMappingURL=ShowView.js.map