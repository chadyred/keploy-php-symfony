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
exports.RemoveItemButton = void 0;
var React = __importStar(require("react"));
var RemoveCircleOutline_1 = __importDefault(require("@mui/icons-material/RemoveCircleOutline"));
var clsx_1 = __importDefault(require("clsx"));
var button_1 = require("../../button");
var useSimpleFormIteratorItem_1 = require("./useSimpleFormIteratorItem");
var useSimpleFormIterator_1 = require("./useSimpleFormIterator");
var RemoveItemButton = function (props) {
    var _a = (0, useSimpleFormIteratorItem_1.useSimpleFormIteratorItem)(), remove = _a.remove, index = _a.index;
    var source = (0, useSimpleFormIterator_1.useSimpleFormIterator)().source;
    var className = props.className, rest = __rest(props, ["className"]);
    return (React.createElement(button_1.IconButtonWithTooltip, __assign({ label: "ra.action.remove", size: "small", onClick: function () { return remove(); }, color: "warning", className: (0, clsx_1.default)("button-remove button-remove-".concat(source, "-").concat(index), className) }, rest),
        React.createElement(RemoveCircleOutline_1.default, { fontSize: "small" })));
};
exports.RemoveItemButton = RemoveItemButton;
//# sourceMappingURL=RemoveItemButton.js.map