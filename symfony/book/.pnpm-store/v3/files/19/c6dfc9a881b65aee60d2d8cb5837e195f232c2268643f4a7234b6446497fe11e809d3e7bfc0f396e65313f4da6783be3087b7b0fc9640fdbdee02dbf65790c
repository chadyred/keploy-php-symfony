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
Object.defineProperty(exports, "__esModule", { value: true });
exports.ThemeTestWrapper = void 0;
var React = __importStar(require("react"));
var styles_1 = require("@mui/material/styles");
/**
 * Test utility to simulate a preferred theme mode (light or dark)
 *
 * Do not use inside a browser.
 *
 * @example
 *
 * <ThemeTestWrapper mode="dark">
 *     <MyComponent />
 * <ThemeTestWrapper>
 */
var ThemeTestWrapper = function (_a) {
    var _b = _a.mode, mode = _b === void 0 ? 'light' : _b, children = _a.children;
    var theme = (0, styles_1.createTheme)();
    var ssrMatchMedia = function (query) { return ({
        matches: mode === 'dark' && query === '(prefers-color-scheme: dark)'
            ? true
            : false,
        addListener: function () { },
        removeListener: function () { },
    }); };
    return (React.createElement(styles_1.ThemeProvider, { theme: __assign(__assign({}, theme), { components: {
                MuiUseMediaQuery: {
                    defaultProps: {
                        ssrMatchMedia: ssrMatchMedia,
                        matchMedia: ssrMatchMedia,
                    },
                },
            } }) }, children));
};
exports.ThemeTestWrapper = ThemeTestWrapper;
//# sourceMappingURL=ThemeTestWrapper.js.map