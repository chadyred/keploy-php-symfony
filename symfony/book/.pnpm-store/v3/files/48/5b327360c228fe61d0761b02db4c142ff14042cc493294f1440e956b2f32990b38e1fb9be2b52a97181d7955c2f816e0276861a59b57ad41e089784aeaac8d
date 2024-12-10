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
import * as React from 'react';
import { createTheme, ThemeProvider } from '@mui/material/styles';
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
export var ThemeTestWrapper = function (_a) {
    var _b = _a.mode, mode = _b === void 0 ? 'light' : _b, children = _a.children;
    var theme = createTheme();
    var ssrMatchMedia = function (query) { return ({
        matches: mode === 'dark' && query === '(prefers-color-scheme: dark)'
            ? true
            : false,
        addListener: function () { },
        removeListener: function () { },
    }); };
    return (React.createElement(ThemeProvider, { theme: __assign(__assign({}, theme), { components: {
                MuiUseMediaQuery: {
                    defaultProps: {
                        ssrMatchMedia: ssrMatchMedia,
                        matchMedia: ssrMatchMedia,
                    },
                },
            } }) }, children));
};
//# sourceMappingURL=ThemeTestWrapper.js.map