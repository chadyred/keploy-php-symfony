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
import ActionDelete from '@mui/icons-material/Delete';
import clsx from 'clsx';
import { useDeleteWithUndoController, useRecordContext, useResourceContext, } from 'ra-core';
import { Button } from './Button';
export var DeleteWithUndoButton = function (props) {
    var _a = props.label, label = _a === void 0 ? 'ra.action.delete' : _a, className = props.className, _b = props.icon, icon = _b === void 0 ? defaultIcon : _b, onClick = props.onClick, _c = props.redirect, redirect = _c === void 0 ? 'list' : _c, mutationOptions = props.mutationOptions, _d = props.color, color = _d === void 0 ? 'error' : _d, successMessage = props.successMessage, rest = __rest(props, ["label", "className", "icon", "onClick", "redirect", "mutationOptions", "color", "successMessage"]);
    var record = useRecordContext(props);
    var resource = useResourceContext(props);
    var _e = useDeleteWithUndoController({
        record: record,
        resource: resource,
        redirect: redirect,
        onClick: onClick,
        mutationOptions: mutationOptions,
        successMessage: successMessage,
    }), isPending = _e.isPending, handleDelete = _e.handleDelete;
    return (React.createElement(Button, __assign({ onClick: handleDelete, disabled: isPending, label: label, className: clsx('ra-delete-button', className), key: "button", color: color }, rest), icon));
};
var defaultIcon = React.createElement(ActionDelete, null);
//# sourceMappingURL=DeleteWithUndoButton.js.map