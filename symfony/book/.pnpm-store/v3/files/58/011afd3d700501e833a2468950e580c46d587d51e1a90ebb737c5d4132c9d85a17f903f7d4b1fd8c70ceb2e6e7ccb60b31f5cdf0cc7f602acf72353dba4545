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
exports.DeleteWithConfirmButton = void 0;
var react_1 = __importStar(require("react"));
var Delete_1 = __importDefault(require("@mui/icons-material/Delete"));
var clsx_1 = __importDefault(require("clsx"));
var ra_core_1 = require("ra-core");
var layout_1 = require("../layout");
var Button_1 = require("./Button");
var inflection_1 = require("inflection");
var DeleteWithConfirmButton = function (props) {
    var className = props.className, _a = props.confirmTitle, confirmTitle = _a === void 0 ? 'ra.message.delete_title' : _a, _b = props.confirmContent, confirmContent = _b === void 0 ? 'ra.message.delete_content' : _b, _c = props.confirmColor, confirmColor = _c === void 0 ? 'primary' : _c, _d = props.icon, icon = _d === void 0 ? defaultIcon : _d, _e = props.label, label = _e === void 0 ? 'ra.action.delete' : _e, _f = props.mutationMode, mutationMode = _f === void 0 ? 'pessimistic' : _f, onClick = props.onClick, _g = props.redirect, redirect = _g === void 0 ? 'list' : _g, _h = props.translateOptions, translateOptions = _h === void 0 ? {} : _h, mutationOptions = props.mutationOptions, _j = props.color, color = _j === void 0 ? 'error' : _j, successMessage = props.successMessage, rest = __rest(props, ["className", "confirmTitle", "confirmContent", "confirmColor", "icon", "label", "mutationMode", "onClick", "redirect", "translateOptions", "mutationOptions", "color", "successMessage"]);
    var translate = (0, ra_core_1.useTranslate)();
    var record = (0, ra_core_1.useRecordContext)(props);
    var resource = (0, ra_core_1.useResourceContext)(props);
    var _k = (0, ra_core_1.useDeleteWithConfirmController)({
        record: record,
        redirect: redirect,
        mutationMode: mutationMode,
        onClick: onClick,
        mutationOptions: mutationOptions,
        resource: resource,
        successMessage: successMessage,
    }), open = _k.open, isPending = _k.isPending, handleDialogOpen = _k.handleDialogOpen, handleDialogClose = _k.handleDialogClose, handleDelete = _k.handleDelete;
    return (react_1.default.createElement(react_1.Fragment, null,
        react_1.default.createElement(Button_1.Button, __assign({ onClick: handleDialogOpen, label: label, className: (0, clsx_1.default)('ra-delete-button', className), key: "button", color: color }, rest), icon),
        react_1.default.createElement(layout_1.Confirm, { isOpen: open, loading: isPending, title: confirmTitle, content: confirmContent, confirmColor: confirmColor, translateOptions: __assign({ name: translate("resources.".concat(resource, ".forcedCaseName"), {
                    smart_count: 1,
                    _: (0, inflection_1.humanize)(translate("resources.".concat(resource, ".name"), {
                        smart_count: 1,
                        _: resource ? (0, inflection_1.singularize)(resource) : undefined,
                    }), true),
                }), id: record === null || record === void 0 ? void 0 : record.id }, translateOptions), onConfirm: handleDelete, onClose: handleDialogClose })));
};
exports.DeleteWithConfirmButton = DeleteWithConfirmButton;
var defaultIcon = react_1.default.createElement(Delete_1.default, null);
//# sourceMappingURL=DeleteWithConfirmButton.js.map