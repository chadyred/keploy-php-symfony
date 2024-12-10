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
import { Fragment, useState } from 'react';
import ActionDelete from '@mui/icons-material/Delete';
import { alpha, styled } from '@mui/material/styles';
import { useDeleteMany, useListContext, useNotify, useRefresh, useResourceContext, useTranslate, } from 'ra-core';
import { Confirm } from '../layout';
import { Button } from './Button';
import { humanize, inflect } from 'inflection';
export var BulkDeleteWithConfirmButton = function (props) {
    var _a = props.confirmTitle, confirmTitle = _a === void 0 ? 'ra.message.bulk_delete_title' : _a, _b = props.confirmContent, confirmContent = _b === void 0 ? 'ra.message.bulk_delete_content' : _b, _c = props.confirmColor, confirmColor = _c === void 0 ? 'primary' : _c, _d = props.icon, icon = _d === void 0 ? defaultIcon : _d, _e = props.label, label = _e === void 0 ? 'ra.action.delete' : _e, _f = props.mutationMode, mutationMode = _f === void 0 ? 'pessimistic' : _f, _g = props.mutationOptions, mutationOptions = _g === void 0 ? {} : _g, successMessage = props.successMessage, onClick = props.onClick, rest = __rest(props, ["confirmTitle", "confirmContent", "confirmColor", "icon", "label", "mutationMode", "mutationOptions", "successMessage", "onClick"]);
    var mutationMeta = mutationOptions.meta, otherMutationOptions = __rest(mutationOptions, ["meta"]);
    var _h = useListContext(), selectedIds = _h.selectedIds, onUnselectItems = _h.onUnselectItems;
    var _j = useState(false), isOpen = _j[0], setOpen = _j[1];
    var notify = useNotify();
    var resource = useResourceContext(props);
    var refresh = useRefresh();
    var translate = useTranslate();
    var _k = useDeleteMany(resource, { ids: selectedIds, meta: mutationMeta }, __assign({ onSuccess: function () {
            refresh();
            notify(successMessage !== null && successMessage !== void 0 ? successMessage : "resources.".concat(resource, ".notifications.deleted"), {
                type: 'info',
                messageArgs: {
                    smart_count: selectedIds.length,
                    _: translate('ra.notification.deleted', {
                        smart_count: selectedIds.length,
                    }),
                },
                undoable: mutationMode === 'undoable',
            });
            onUnselectItems();
            setOpen(false);
        }, onError: function (error) {
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
            setOpen(false);
        }, mutationMode: mutationMode }, otherMutationOptions)), deleteMany = _k[0], isPending = _k[1].isPending;
    var handleClick = function (e) {
        setOpen(true);
        e.stopPropagation();
    };
    var handleDialogClose = function () {
        setOpen(false);
    };
    var handleDelete = function (e) {
        deleteMany();
        if (typeof onClick === 'function') {
            onClick(e);
        }
    };
    return (React.createElement(Fragment, null,
        React.createElement(StyledButton, __assign({ onClick: handleClick, label: label }, sanitizeRestProps(rest)), icon),
        React.createElement(Confirm, { isOpen: isOpen, loading: isPending, title: confirmTitle, content: confirmContent, confirmColor: confirmColor, translateOptions: {
                smart_count: selectedIds.length,
                name: translate("resources.".concat(resource, ".forcedCaseName"), {
                    smart_count: selectedIds.length,
                    _: humanize(translate("resources.".concat(resource, ".name"), {
                        smart_count: selectedIds.length,
                        _: resource
                            ? inflect(resource, selectedIds.length)
                            : undefined,
                    }), true),
                }),
            }, onConfirm: handleDelete, onClose: handleDialogClose })));
};
var sanitizeRestProps = function (_a) {
    var classes = _a.classes, label = _a.label, rest = __rest(_a, ["classes", "label"]);
    return rest;
};
var PREFIX = 'RaBulkDeleteWithConfirmButton';
var StyledButton = styled(Button, {
    name: PREFIX,
    overridesResolver: function (props, styles) { return styles.root; },
})(function (_a) {
    var theme = _a.theme;
    return ({
        color: theme.palette.error.main,
        '&:hover': {
            backgroundColor: alpha(theme.palette.error.main, 0.12),
            // Reset on mouse devices
            '@media (hover: none)': {
                backgroundColor: 'transparent',
            },
        },
    });
});
var defaultIcon = React.createElement(ActionDelete, null);
//# sourceMappingURL=BulkDeleteWithConfirmButton.js.map