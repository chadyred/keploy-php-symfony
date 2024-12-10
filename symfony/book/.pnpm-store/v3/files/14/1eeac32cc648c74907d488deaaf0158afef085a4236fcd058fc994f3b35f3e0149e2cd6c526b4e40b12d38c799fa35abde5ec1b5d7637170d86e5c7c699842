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
import { styled } from '@mui/material/styles';
import { isValidElement } from 'react';
import { Avatar, List, ListItem, ListItemAvatar, ListItemButton, ListItemIcon, ListItemSecondaryAction, ListItemText, } from '@mui/material';
import { Link } from 'react-router-dom';
import { RecordContextProvider, sanitizeListRestProps, useListContextWithProps, useResourceContext, useGetRecordRepresentation, useCreatePath, useTranslate, } from 'ra-core';
import { SimpleListLoading } from './SimpleListLoading';
import { ListNoResults } from '../ListNoResults';
/**
 * The <SimpleList> component renders a list of records as a Material UI <List>.
 * It is usually used as a child of react-admin's <List> and <ReferenceManyField> components.
 *
 * Also widely used on Mobile.
 *
 * Props:
 * - primaryText: function returning a React element (or some text) based on the record
 * - secondaryText: same
 * - tertiaryText: same
 * - leftAvatar: function returning a React element based on the record
 * - leftIcon: same
 * - rightAvatar: same
 * - rightIcon: same
 * - linkType: 'edit' or 'show', or a function returning 'edit' or 'show' based on the record
 * - rowStyle: function returning a style object based on (record, index)
 * - rowSx: function returning a sx object based on (record, index)
 *
 * @example // Display all posts as a List
 * const postRowSx = (record, index) => ({
 *     backgroundColor: record.views >= 500 ? '#efe' : 'white',
 * });
 * export const PostList = () => (
 *     <List>
 *         <SimpleList
 *             primaryText={record => record.title}
 *             secondaryText={record => `${record.views} views`}
 *             tertiaryText={record =>
 *                 new Date(record.published_at).toLocaleDateString()
 *             }
 *             rowSx={postRowSx}
 *          />
 *     </List>
 * );
 */
export var SimpleList = function (props) {
    var className = props.className, _a = props.empty, empty = _a === void 0 ? DefaultEmpty : _a, hasBulkActions = props.hasBulkActions, leftAvatar = props.leftAvatar, leftIcon = props.leftIcon, _b = props.linkType, linkType = _b === void 0 ? 'edit' : _b, primaryText = props.primaryText, rightAvatar = props.rightAvatar, rightIcon = props.rightIcon, secondaryText = props.secondaryText, tertiaryText = props.tertiaryText, rowSx = props.rowSx, rowStyle = props.rowStyle, rest = __rest(props, ["className", "empty", "hasBulkActions", "leftAvatar", "leftIcon", "linkType", "primaryText", "rightAvatar", "rightIcon", "secondaryText", "tertiaryText", "rowSx", "rowStyle"]);
    var _c = useListContextWithProps(props), data = _c.data, isPending = _c.isPending, total = _c.total;
    var resource = useResourceContext(props);
    var getRecordRepresentation = useGetRecordRepresentation(resource);
    var translate = useTranslate();
    if (isPending === true) {
        return (React.createElement(SimpleListLoading, { className: className, hasLeftAvatarOrIcon: !!leftIcon || !!leftAvatar, hasRightAvatarOrIcon: !!rightIcon || !!rightAvatar, hasSecondaryText: !!secondaryText, hasTertiaryText: !!tertiaryText }));
    }
    var renderAvatar = function (record, avatarCallback) {
        var avatarValue = avatarCallback(record, record.id);
        if (typeof avatarValue === 'string' &&
            (avatarValue.startsWith('http') || avatarValue.startsWith('data:'))) {
            return React.createElement(Avatar, { src: avatarValue });
        }
        else {
            return React.createElement(Avatar, null, avatarValue);
        }
    };
    if (data == null || data.length === 0 || total === 0) {
        if (empty) {
            return empty;
        }
        return null;
    }
    return (React.createElement(Root, __assign({ className: className }, sanitizeListRestProps(rest)), data.map(function (record, rowIndex) { return (React.createElement(RecordContextProvider, { key: record.id, value: record },
        React.createElement(ListItem, { disablePadding: true, sx: {
                '.MuiListItem-container': {
                    width: '100%',
                },
            } },
            React.createElement(LinkOrNot, { linkType: linkType, resource: resource, id: record.id, record: record, style: rowStyle
                    ? rowStyle(record, rowIndex)
                    : undefined, sx: rowSx === null || rowSx === void 0 ? void 0 : rowSx(record, rowIndex) },
                leftIcon && (React.createElement(ListItemIcon, null, leftIcon(record, record.id))),
                leftAvatar && (React.createElement(ListItemAvatar, null, renderAvatar(record, leftAvatar))),
                React.createElement(ListItemText, { primary: React.createElement("div", null,
                        primaryText
                            ? typeof primaryText === 'string'
                                ? translate(primaryText, __assign(__assign({}, record), { _: primaryText }))
                                : isValidElement(primaryText)
                                    ? primaryText
                                    : // @ts-ignore
                                        primaryText(record, record.id)
                            : getRecordRepresentation(record),
                        !!tertiaryText &&
                            (isValidElement(tertiaryText) ? (tertiaryText) : (React.createElement("span", { className: SimpleListClasses.tertiary }, typeof tertiaryText ===
                                'string'
                                ? translate(tertiaryText, __assign(__assign({}, record), { _: tertiaryText }))
                                : isValidElement(tertiaryText)
                                    ? tertiaryText
                                    : // @ts-ignore
                                        tertiaryText(record, record.id))))), secondary: !!secondaryText &&
                        (typeof secondaryText === 'string'
                            ? translate(secondaryText, __assign(__assign({}, record), { _: secondaryText }))
                            : isValidElement(secondaryText)
                                ? secondaryText
                                : // @ts-ignore
                                    secondaryText(record, record.id)) }),
                (rightAvatar || rightIcon) && (React.createElement(ListItemSecondaryAction, null,
                    rightAvatar && (React.createElement(Avatar, null, renderAvatar(record, rightAvatar))),
                    rightIcon && (React.createElement(ListItemIcon, null, rightIcon(record, record.id))))))))); })));
};
var LinkOrNot = function (props) {
    var classesOverride = props.classes, linkType = props.linkType, resource = props.resource, id = props.id, children = props.children, record = props.record, rest = __rest(props, ["classes", "linkType", "resource", "id", "children", "record"]);
    var createPath = useCreatePath();
    var type = typeof linkType === 'function' ? linkType(record, id) : linkType;
    if (type === false) {
        return React.createElement(ListItem, __assign({}, rest), children);
    }
    return (
    // @ts-ignore
    React.createElement(ListItemButton, __assign({ component: Link, to: createPath({ resource: resource, id: id, type: type }) }, rest), children));
};
var PREFIX = 'RaSimpleList';
export var SimpleListClasses = {
    tertiary: "".concat(PREFIX, "-tertiary"),
};
var Root = styled(List, {
    name: PREFIX,
    overridesResolver: function (props, styles) { return styles.root; },
})((_a = {},
    _a["& .".concat(SimpleListClasses.tertiary)] = { float: 'right', opacity: 0.541176 },
    _a));
var DefaultEmpty = React.createElement(ListNoResults, null);
//# sourceMappingURL=SimpleList.js.map