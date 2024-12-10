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
import { styled } from '@mui/material/styles';
import Card from '@mui/material/Card';
import clsx from 'clsx';
import { useListContext } from 'ra-core';
import { Title } from '../layout/Title';
import { ListToolbar } from './ListToolbar';
import { Pagination as DefaultPagination } from './pagination';
import { ListActions as DefaultActions } from './ListActions';
import { Empty } from './Empty';
var defaultActions = React.createElement(DefaultActions, null);
var defaultPagination = React.createElement(DefaultPagination, null);
var defaultEmpty = React.createElement(Empty, null);
var DefaultComponent = Card;
export var ListView = function (props) {
    var _a = props.actions, actions = _a === void 0 ? defaultActions : _a, aside = props.aside, filters = props.filters, emptyWhileLoading = props.emptyWhileLoading, _b = props.pagination, pagination = _b === void 0 ? defaultPagination : _b, children = props.children, className = props.className, _c = props.component, Content = _c === void 0 ? DefaultComponent : _c, title = props.title, _d = props.empty, empty = _d === void 0 ? defaultEmpty : _d, rest = __rest(props, ["actions", "aside", "filters", "emptyWhileLoading", "pagination", "children", "className", "component", "title", "empty"]);
    var _e = useListContext(), defaultTitle = _e.defaultTitle, data = _e.data, error = _e.error, isPending = _e.isPending, filterValues = _e.filterValues, resource = _e.resource, total = _e.total, hasNextPage = _e.hasNextPage, hasPreviousPage = _e.hasPreviousPage;
    if (!children || (!data && isPending && emptyWhileLoading)) {
        return null;
    }
    var renderList = function () { return (React.createElement("div", { className: ListClasses.main },
        (filters || actions) && (React.createElement(ListToolbar, { className: ListClasses.actions, filters: filters, actions: actions })),
        React.createElement(Content, { className: ListClasses.content }, children),
        !error && pagination !== false && pagination)); };
    var renderEmpty = function () {
        return empty !== false && React.createElement("div", { className: ListClasses.noResults }, empty);
    };
    var shouldRenderEmptyPage = !error &&
        // the list is not loading data for the first time
        !isPending &&
        // the API returned no data (using either normal or partial pagination)
        (total === 0 ||
            (total == null &&
                hasPreviousPage === false &&
                hasNextPage === false &&
                // @ts-ignore FIXME total may be undefined when using partial pagination but the ListControllerResult type is wrong about it
                data.length === 0)) &&
        // the user didn't set any filters
        !Object.keys(filterValues).length &&
        // there is an empty page component
        empty !== false;
    return (React.createElement(Root, __assign({ className: clsx('list-page', className) }, rest),
        title !== false && (React.createElement(Title, { title: title, defaultTitle: defaultTitle, preferenceKey: "".concat(resource, ".list.title") })),
        shouldRenderEmptyPage ? renderEmpty() : renderList(),
        aside));
};
var PREFIX = 'RaList';
export var ListClasses = {
    main: "".concat(PREFIX, "-main"),
    content: "".concat(PREFIX, "-content"),
    actions: "".concat(PREFIX, "-actions"),
    noResults: "".concat(PREFIX, "-noResults"),
};
var Root = styled('div', {
    name: PREFIX,
    overridesResolver: function (props, styles) { return styles.root; },
})(function (_a) {
    var _b, _c;
    var theme = _a.theme;
    return (_b = {
            display: 'flex'
        },
        _b["& .".concat(ListClasses.main)] = {
            flex: '1 1 auto',
            display: 'flex',
            flexDirection: 'column',
        },
        _b["& .".concat(ListClasses.content)] = (_c = {
                position: 'relative'
            },
            _c[theme.breakpoints.down('sm')] = {
                boxShadow: 'none',
            },
            _c.overflow = 'inherit',
            _c),
        _b["& .".concat(ListClasses.actions)] = {},
        _b["& .".concat(ListClasses.noResults)] = {
            flex: 1,
        },
        _b);
});
//# sourceMappingURL=ListView.js.map