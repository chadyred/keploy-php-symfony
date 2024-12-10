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
import React from 'react';
import { AppBar as RaAppBAr, TitlePortal, useAuthProvider } from 'react-admin';
import { Box, useMediaQuery } from '@mui/material';
import Logo from './Logo.js';
const AppBar = (_a) => {
    var { classes, userMenu } = _a, props = __rest(_a, ["classes", "userMenu"]);
    const authProvider = useAuthProvider();
    const isLargeEnough = useMediaQuery((theme) => theme.breakpoints.up('sm'));
    return (React.createElement(RaAppBAr, Object.assign({ userMenu: userMenu !== null && userMenu !== void 0 ? userMenu : !!authProvider }, props),
        React.createElement(TitlePortal, null),
        isLargeEnough && React.createElement(Logo, null),
        isLargeEnough && React.createElement(Box, { component: "span", sx: { flex: 1 } })));
};
export default AppBar;
//# sourceMappingURL=AppBar.js.map