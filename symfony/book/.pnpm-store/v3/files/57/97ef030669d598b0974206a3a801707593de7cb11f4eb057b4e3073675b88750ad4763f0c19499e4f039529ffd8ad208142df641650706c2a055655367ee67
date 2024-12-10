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
import ActionUpdate from '@mui/icons-material/Update';
import { alpha } from '@mui/material/styles';
import { useUpdateMany, useRefresh, useNotify, useUnselectAll, useResourceContext, useListContext, useTranslate, } from 'ra-core';
import { Button } from './Button';
export var BulkUpdateWithUndoButton = function (props) {
    var selectedIds = useListContext().selectedIds;
    var notify = useNotify();
    var resource = useResourceContext(props);
    var unselectAll = useUnselectAll(resource);
    var refresh = useRefresh();
    var translate = useTranslate();
    var data = props.data, _a = props.label, label = _a === void 0 ? 'ra.action.update' : _a, _b = props.icon, icon = _b === void 0 ? defaultIcon : _b, successMessage = props.successMessage, onClick = props.onClick, _c = props.onSuccess, onSuccess = _c === void 0 ? function () {
        notify(successMessage !== null && successMessage !== void 0 ? successMessage : "resources.".concat(resource, ".notifications.updated"), {
            type: 'info',
            messageArgs: {
                smart_count: selectedIds.length,
                _: translate('ra.notification.updated', {
                    smart_count: selectedIds.length,
                }),
            },
            undoable: true,
        });
        unselectAll();
    } : _c, _d = props.onError, onError = _d === void 0 ? function (error) {
        notify(typeof error === 'string'
            ? error
            : error.message || 'ra.notification.http_error', {
            type: 'error',
            messageArgs: {
                _: typeof error === 'string'
                    ? error
                    : error && error.message
                        ? error.message
                        : undefined,
            },
        });
        refresh();
    } : _d, _e = props.mutationOptions, mutationOptions = _e === void 0 ? {} : _e, rest = __rest(props, ["data", "label", "icon", "successMessage", "onClick", "onSuccess", "onError", "mutationOptions"]);
    var mutationMeta = mutationOptions.meta, otherMutationOptions = __rest(mutationOptions, ["meta"]);
    var _f = useUpdateMany(resource, { ids: selectedIds, data: data, meta: mutationMeta }, __assign({ onSuccess: onSuccess, onError: onError, mutationMode: 'undoable' }, otherMutationOptions)), updateMany = _f[0], isPending = _f[1].isPending;
    var handleClick = function (e) {
        updateMany();
        if (typeof onClick === 'function') {
            onClick(e);
        }
    };
    return (React.createElement(StyledButton, __assign({ onClick: handleClick, label: label, disabled: isPending }, sanitizeRestProps(rest)), icon));
};
var defaultIcon = React.createElement(ActionUpdate, null);
var sanitizeRestProps = function (_a) {
    var label = _a.label, onSuccess = _a.onSuccess, onError = _a.onError, rest = __rest(_a, ["label", "onSuccess", "onError"]);
    return rest;
};
var PREFIX = 'RaBulkUpdateWithUndoButton';
var StyledButton = styled(Button, {
    name: PREFIX,
    overridesResolver: function (props, styles) { return styles.root; },
})(function (_a) {
    var theme = _a.theme;
    return ({
        color: theme.palette.primary.main,
        '&:hover': {
            backgroundColor: alpha(theme.palette.primary.main, 0.12),
            // Reset on mouse devices
            '@media (hover: none)': {
                backgroundColor: 'transparent',
            },
        },
    });
});
//# sourceMappingURL=BulkUpdateWithUndoButton.js.map