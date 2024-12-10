"use strict";
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
var __createBinding = (this && this.__createBinding) || (Object.create ? (function(o, m, k, k2) {
    if (k2 === undefined) k2 = k;
    var desc = Object.getOwnPropertyDescriptor(m, k);
    if (!desc || ("get" in desc ? !m.__esModule : desc.writable || desc.configurable)) {
      desc = { enumerable: true, get: function() { return m[k]; } };
    }
    Object.defineProperty(o, k2, desc);
}) : (function(o, m, k, k2) {
    if (k2 === undefined) k2 = k;
    o[k2] = m[k];
}));
var __setModuleDefault = (this && this.__setModuleDefault) || (Object.create ? (function(o, v) {
    Object.defineProperty(o, "default", { enumerable: true, value: v });
}) : function(o, v) {
    o["default"] = v;
});
var __importStar = (this && this.__importStar) || function (mod) {
    if (mod && mod.__esModule) return mod;
    var result = {};
    if (mod != null) for (var k in mod) if (k !== "default" && Object.prototype.hasOwnProperty.call(mod, k)) __createBinding(result, mod, k);
    __setModuleDefault(result, mod);
    return result;
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
var __importDefault = (this && this.__importDefault) || function (mod) {
    return (mod && mod.__esModule) ? mod : { "default": mod };
};
Object.defineProperty(exports, "__esModule", { value: true });
exports.BulkDeleteWithConfirmButton = void 0;
var React = __importStar(require("react"));
var react_1 = require("react");
var Delete_1 = __importDefault(require("@mui/icons-material/Delete"));
var styles_1 = require("@mui/material/styles");
var ra_core_1 = require("ra-core");
var layout_1 = require("../layout");
var Button_1 = require("./Button");
var inflection_1 = require("inflection");
var BulkDeleteWithConfirmButton = function (props) {
    var _a = props.confirmTitle, confirmTitle = _a === void 0 ? 'ra.message.bulk_delete_title' : _a, _b = props.confirmContent, confirmContent = _b === void 0 ? 'ra.message.bulk_delete_content' : _b, _c = props.confirmColor, confirmColor = _c === void 0 ? 'primary' : _c, _d = props.icon, icon = _d === void 0 ? defaultIcon : _d, _e = props.label, label = _e === void 0 ? 'ra.action.delete' : _e, _f = props.mutationMode, mutationMode = _f === void 0 ? 'pessimistic' : _f, _g = props.mutationOptions, mutationOptions = _g === void 0 ? {} : _g, successMessage = props.successMessage, onClick = props.onClick, rest = __rest(props, ["confirmTitle", "confirmContent", "confirmColor", "icon", "label", "mutationMode", "mutationOptions", "successMessage", "onClick"]);
    var mutationMeta = mutationOptions.meta, otherMutationOptions = __rest(mutationOptions, ["meta"]);
    var _h = (0, ra_core_1.useListContext)(), selectedIds = _h.selectedIds, onUnselectItems = _h.onUnselectItems;
    var _j = (0, react_1.useState)(false), isOpen = _j[0], setOpen = _j[1];
    var notify = (0, ra_core_1.useNotify)();
    var resource = (0, ra_core_1.useResourceContext)(props);
    var refresh = (0, ra_core_1.useRefresh)();
    var translate = (0, ra_core_1.useTranslate)();
    var _k = (0, ra_core_1.useDeleteMany)(resource, { ids: selectedIds, meta: mutationMeta }, __assign({ onSuccess: function () {
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
    return (React.createElement(react_1.Fragment, null,
        React.createElement(StyledButton, __assign({ onClick: handleClick, label: label }, sanitizeRestProps(rest)), icon),
        React.createElement(layout_1.Confirm, { isOpen: isOpen, loading: isPending, title: confirmTitle, content: confirmContent, confirmColor: confirmColor, translateOptions: {
                smart_count: selectedIds.length,
                name: translate("resources.".concat(resource, ".forcedCaseName"), {
                    smart_count: selectedIds.length,
                    _: (0, inflection_1.humanize)(translate("resources.".concat(resource, ".name"), {
                        smart_count: selectedIds.length,
                        _: resource
                            ? (0, inflection_1.inflect)(resource, selectedIds.length)
                            : undefined,
                    }), true),
                }),
            }, onConfirm: handleDelete, onClose: handleDialogClose })));
};
exports.BulkDeleteWithConfirmButton = BulkDeleteWithConfirmButton;
var sanitizeRestProps = function (_a) {
    var classes = _a.classes, label = _a.label, rest = __rest(_a, ["classes", "label"]);
    return rest;
};
var PREFIX = 'RaBulkDeleteWithConfirmButton';
var StyledButton = (0, styles_1.styled)(Button_1.Button, {
    name: PREFIX,
    overridesResolver: function (props, styles) { return styles.root; },
})(function (_a) {
    var theme = _a.theme;
    return ({
        color: theme.palette.error.main,
        '&:hover': {
            backgroundColor: (0, styles_1.alpha)(theme.palette.error.main, 0.12),
            // Reset on mouse devices
            '@media (hover: none)': {
                backgroundColor: 'transparent',
            },
        },
    });
});
var defaultIcon = React.createElement(Delete_1.default, null);
//# sourceMappingURL=BulkDeleteWithConfirmButton.js.map