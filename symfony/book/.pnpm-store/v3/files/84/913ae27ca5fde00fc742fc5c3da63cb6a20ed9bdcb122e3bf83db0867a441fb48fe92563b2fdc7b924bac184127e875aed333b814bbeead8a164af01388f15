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
import { alpha, styled } from '@mui/material/styles';
import ActionUpdate from '@mui/icons-material/Update';
import { useRefresh, useNotify, useResourceContext, useRecordContext, useUpdate, useTranslate, } from 'ra-core';
import { Button } from './Button';
export var UpdateWithUndoButton = function (props) {
    var record = useRecordContext(props);
    var notify = useNotify();
    var resource = useResourceContext(props);
    var refresh = useRefresh();
    var translate = useTranslate();
    var data = props.data, _a = props.label, label = _a === void 0 ? 'ra.action.update' : _a, _b = props.icon, icon = _b === void 0 ? defaultIcon : _b, onClick = props.onClick, _c = props.mutationOptions, mutationOptions = _c === void 0 ? {} : _c, rest = __rest(props, ["data", "label", "icon", "onClick", "mutationOptions"]);
    var _d = useUpdate(), updateMany = _d[0], isPending = _d[1].isPending;
    var mutationMeta = mutationOptions.meta, _e = mutationOptions.onSuccess, onSuccess = _e === void 0 ? function () {
        notify("resources.".concat(resource, ".notifications.updated"), {
            type: 'info',
            messageArgs: {
                smart_count: 1,
                _: translate('ra.notification.updated', { smart_count: 1 }),
            },
            undoable: true,
        });
    } : _e, _f = mutationOptions.onError, onError = _f === void 0 ? function (error) {
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
    } : _f, otherMutationOptions = __rest(mutationOptions, ["meta", "onSuccess", "onError"]);
    var handleClick = function (e) {
        if (!record) {
            throw new Error('The UpdateWithUndoButton must be used inside a RecordContext.Provider or must be passed a record prop.');
        }
        updateMany(resource, { id: record.id, data: data, meta: mutationMeta, previousData: record }, __assign({ onSuccess: onSuccess, onError: onError, mutationMode: 'undoable' }, otherMutationOptions));
        if (typeof onClick === 'function') {
            onClick(e);
        }
        e.stopPropagation();
    };
    return (React.createElement(StyledButton, __assign({ onClick: handleClick, label: label, disabled: isPending }, sanitizeRestProps(rest)), icon));
};
var defaultIcon = React.createElement(ActionUpdate, null);
var sanitizeRestProps = function (_a) {
    var label = _a.label, rest = __rest(_a, ["label"]);
    return rest;
};
var PREFIX = 'RaUpdateWithUndoButton';
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
//# sourceMappingURL=UpdateWithUndoButton.js.map