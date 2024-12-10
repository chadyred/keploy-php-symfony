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
exports.TestMemoryRouter = void 0;
var React = __importStar(require("react"));
var react_router_dom_1 = require("react-router-dom");
var UseLocation = function (_a) {
    var locationCallback = _a.locationCallback;
    var location = (0, react_router_dom_1.useLocation)();
    locationCallback(location);
    return null;
};
var UseNavigate = function (_a) {
    var navigateCallback = _a.navigateCallback;
    var navigate = (0, react_router_dom_1.useNavigate)();
    navigateCallback(navigate);
    return null;
};
/**
 * Wrapper around react-router's `createMemoryRouter` to be used in test components.
 *
 * It is similar to `MemoryRouter` but it supports
 * [data APIs](https://reactrouter.com/en/main/routers/picking-a-router#data-apis).
 *
 * Additionally, it provides
 * - a `locationCallback` prop to get the location in the test
 * - a `navigateCallback` prop to be able to navigate in the test
 */
var TestMemoryRouter = function (_a) {
    var children = _a.children, locationCallback = _a.locationCallback, navigateCallback = _a.navigateCallback, rest = __rest(_a, ["children", "locationCallback", "navigateCallback"]);
    var router = (0, react_router_dom_1.createMemoryRouter)([
        {
            path: '*',
            element: (React.createElement(React.Fragment, null,
                children,
                locationCallback && (React.createElement(UseLocation, { locationCallback: locationCallback })),
                navigateCallback && (React.createElement(UseNavigate, { navigateCallback: navigateCallback })))),
        },
    ], __assign({}, rest));
    return React.createElement(react_router_dom_1.RouterProvider, { router: router });
};
exports.TestMemoryRouter = TestMemoryRouter;
//# sourceMappingURL=TestMemoryRouter.js.map