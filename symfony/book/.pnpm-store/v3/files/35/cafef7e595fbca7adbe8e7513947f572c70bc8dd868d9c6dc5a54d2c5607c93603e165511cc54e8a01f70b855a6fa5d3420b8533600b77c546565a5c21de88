"use strict";
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
Object.defineProperty(exports, "__esModule", { value: true });
exports.FormInspector = void 0;
var React = __importStar(require("react"));
var react_hook_form_1 = require("react-hook-form");
var FormInspector = function (_a) {
    var _b = _a.name, name = _b === void 0 ? 'title' : _b;
    var value = (0, react_hook_form_1.useWatch)({ name: name });
    return (React.createElement("div", { style: { backgroundColor: 'lightgrey' } },
        name,
        " value in form:\u00A0",
        React.createElement("code", null,
            JSON.stringify(value),
            " (",
            typeof value,
            ")")));
};
exports.FormInspector = FormInspector;
//# sourceMappingURL=common.js.map