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
import React, { Fragment } from 'react';
import ActionDelete from '@mui/icons-material/Delete';
import clsx from 'clsx';
import { useDeleteWithConfirmController, useRecordContext, useResourceContext, useTranslate, } from 'ra-core';
import { Confirm } from '../layout';
import { Button } from './Button';
import { humanize, singularize } from 'inflection';
export var DeleteWithConfirmButton = function (props) {
    var className = props.className, _a = props.confirmTitle, confirmTitle = _a === void 0 ? 'ra.message.delete_title' : _a, _b = props.confirmContent, confirmContent = _b === void 0 ? 'ra.message.delete_content' : _b, _c = props.confirmColor, confirmColor = _c === void 0 ? 'primary' : _c, _d = props.icon, icon = _d === void 0 ? defaultIcon : _d, _e = props.label, label = _e === void 0 ? 'ra.action.delete' : _e, _f = props.mutationMode, mutationMode = _f === void 0 ? 'pessimistic' : _f, onClick = props.onClick, _g = props.redirect, redirect = _g === void 0 ? 'list' : _g, _h = props.translateOptions, translateOptions = _h === void 0 ? {} : _h, mutationOptions = props.mutationOptions, _j = props.color, color = _j === void 0 ? 'error' : _j, successMessage = props.successMessage, rest = __rest(props, ["className", "confirmTitle", "confirmContent", "confirmColor", "icon", "label", "mutationMode", "onClick", "redirect", "translateOptions", "mutationOptions", "color", "successMessage"]);
    var translate = useTranslate();
    var record = useRecordContext(props);
    var resource = useResourceContext(props);
    var _k = useDeleteWithConfirmController({
        record: record,
        redirect: redirect,
        mutationMode: mutationMode,
        onClick: onClick,
        mutationOptions: mutationOptions,
        resource: resource,
        successMessage: successMessage,
    }), open = _k.open, isPending = _k.isPending, handleDialogOpen = _k.handleDialogOpen, handleDialogClose = _k.handleDialogClose, handleDelete = _k.handleDelete;
    return (React.createElement(Fragment, null,
        React.createElement(Button, __assign({ onClick: handleDialogOpen, label: label, className: clsx('ra-delete-button', className), key: "button", color: color }, rest), icon),
        React.createElement(Confirm, { isOpen: open, loading: isPending, title: confirmTitle, content: confirmContent, confirmColor: confirmColor, translateOptions: __assign({ name: translate("resources.".concat(resource, ".forcedCaseName"), {
                    smart_count: 1,
                    _: humanize(translate("resources.".concat(resource, ".name"), {
                        smart_count: 1,
                        _: resource ? singularize(resource) : undefined,
                    }), true),
                }), id: record === null || record === void 0 ? void 0 : record.id }, translateOptions), onConfirm: handleDelete, onClose: handleDialogClose })));
};
var defaultIcon = React.createElement(ActionDelete, null);
//# sourceMappingURL=DeleteWithConfirmButton.js.map