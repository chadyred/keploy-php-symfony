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
exports.OptionalResourceContextProvider = void 0;
var React = __importStar(require("react"));
var ResourceContextProvider_1 = require("./ResourceContextProvider");
/**
 * Wrap children with a ResourceContext provider only if the value is defined.
 *
 * Allows a component to work outside of a resource context.
 *
 * @example
 *
 * import { OptionalResourceContextProvider, EditButton } from 'react-admin';
 *
 * const Button = ({ resource }) => (
 *     <OptionalResourceContextProvider value={resource}>
 *         <EditButton />
 *     </OptionalResourceContextProvider>
 * );
 */
var OptionalResourceContextProvider = function (_a) {
    var value = _a.value, children = _a.children;
    return value ? (React.createElement(ResourceContextProvider_1.ResourceContextProvider, { value: value }, children)) : (children);
};
exports.OptionalResourceContextProvider = OptionalResourceContextProvider;
//# sourceMappingURL=OptionalResourceContextProvider.js.map