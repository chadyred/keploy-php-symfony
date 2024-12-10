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
Object.defineProperty(exports, "__esModule", { value: true });
exports.UpdateButton = void 0;
var React = __importStar(require("react"));
var UpdateWithConfirmButton_1 = require("./UpdateWithConfirmButton");
var UpdateWithUndoButton_1 = require("./UpdateWithUndoButton");
/**
 * Updates the current record.
 *
 * To be used inside the <Edit actions> prop or <Show actions> prop.
 *
 * @example // basic usage
 * import * as React from 'react';
 * import { Edit, TopToolbar, UpdateButton } from 'react-admin';
 *
 * const PostEditActions = () => (
 *     <TopToolbar>
 *         <UpdateButton label="Reset Views" data={{ views: 0 }} />
 *     </TopToolbar>
 * );
 *
 * export const PostEdit = () => (
 *     <Edit actions={<PostEditActions />}>
 *         ...
 *     </Edit>
 * );
 */
var UpdateButton = function (props) {
    var _a = props.mutationMode, mutationMode = _a === void 0 ? 'undoable' : _a, rest = __rest(props, ["mutationMode"]);
    return mutationMode === 'undoable' ? (React.createElement(UpdateWithUndoButton_1.UpdateWithUndoButton, __assign({}, rest))) : (React.createElement(UpdateWithConfirmButton_1.UpdateWithConfirmButton, __assign({ mutationMode: mutationMode }, rest)));
};
exports.UpdateButton = UpdateButton;
//# sourceMappingURL=UpdateButton.js.map