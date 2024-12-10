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
var __awaiter = (this && this.__awaiter) || function (thisArg, _arguments, P, generator) {
    function adopt(value) { return value instanceof P ? value : new P(function (resolve) { resolve(value); }); }
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) { try { step(generator.next(value)); } catch (e) { reject(e); } }
        function rejected(value) { try { step(generator["throw"](value)); } catch (e) { reject(e); } }
        function step(result) { result.done ? resolve(result.value) : adopt(result.value).then(fulfilled, rejected); }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
};
var __generator = (this && this.__generator) || function (thisArg, body) {
    var _ = { label: 0, sent: function() { if (t[0] & 1) throw t[1]; return t[1]; }, trys: [], ops: [] }, f, y, t, g;
    return g = { next: verb(0), "throw": verb(1), "return": verb(2) }, typeof Symbol === "function" && (g[Symbol.iterator] = function() { return this; }), g;
    function verb(n) { return function (v) { return step([n, v]); }; }
    function step(op) {
        if (f) throw new TypeError("Generator is already executing.");
        while (g && (g = 0, op[0] && (_ = 0)), _) try {
            if (f = 1, y && (t = op[0] & 2 ? y["return"] : op[0] ? y["throw"] || ((t = y["return"]) && t.call(y), 0) : y.next) && !(t = t.call(y, op[1])).done) return t;
            if (y = 0, t) op = [op[0] & 2, t.value];
            switch (op[0]) {
                case 0: case 1: t = op; break;
                case 4: _.label++; return { value: op[1], done: false };
                case 5: _.label++; y = op[1]; op = [0]; continue;
                case 7: op = _.ops.pop(); _.trys.pop(); continue;
                default:
                    if (!(t = _.trys, t = t.length > 0 && t[t.length - 1]) && (op[0] === 6 || op[0] === 2)) { _ = 0; continue; }
                    if (op[0] === 3 && (!t || (op[1] > t[0] && op[1] < t[3]))) { _.label = op[1]; break; }
                    if (op[0] === 6 && _.label < t[1]) { _.label = t[1]; t = op; break; }
                    if (t && _.label < t[2]) { _.label = t[2]; _.ops.push(op); break; }
                    if (t[2]) _.ops.pop();
                    _.trys.pop(); continue;
            }
            op = body.call(thisArg, _);
        } catch (e) { op = [6, e]; y = 0; } finally { f = t = 0; }
        if (op[0] & 5) throw op[1]; return { value: op[0] ? op[1] : void 0, done: true };
    }
};
var __spreadArray = (this && this.__spreadArray) || function (to, from, pack) {
    if (pack || arguments.length === 2) for (var i = 0, l = from.length, ar; i < l; i++) {
        if (ar || !(i in from)) {
            if (!ar) ar = Array.prototype.slice.call(from, 0, i);
            ar[i] = from[i];
        }
    }
    return to.concat(ar || Array.prototype.slice.call(from));
};
var __importDefault = (this && this.__importDefault) || function (mod) {
    return (mod && mod.__esModule) ? mod : { "default": mod };
};
Object.defineProperty(exports, "__esModule", { value: true });
exports.AccessControlInSubPath = exports.AccessControl = exports.CustomError = exports.DefaultError = exports.SubPath = exports.InsideRouter = exports.Basic = void 0;
var React = __importStar(require("react"));
var react_router_dom_1 = require("react-router-dom");
var ra_core_1 = require("ra-core");
var ra_ui_materialui_1 = require("ra-ui-materialui");
var material_1 = require("@mui/material");
var ra_data_fakerest_1 = __importDefault(require("ra-data-fakerest"));
var react_query_1 = require("@tanstack/react-query");
var Admin_1 = require("./Admin");
exports.default = {
    title: 'react-admin/Admin',
};
var PostList = function () { return React.createElement("h1", null, "Post List"); };
var CommentList = function () { return React.createElement("h1", null, "Comment List"); };
var Basic = function () { return (React.createElement(Admin_1.Admin, { dataProvider: (0, ra_core_1.testDataProvider)() },
    React.createElement(ra_core_1.Resource, { name: "posts", list: PostList }),
    React.createElement(ra_core_1.Resource, { name: "comments", list: CommentList }))); };
exports.Basic = Basic;
var InsideRouter = function () { return (React.createElement(ra_core_1.TestMemoryRouter, null,
    React.createElement(Admin_1.Admin, { dataProvider: (0, ra_core_1.testDataProvider)() },
        React.createElement(ra_core_1.Resource, { name: "posts", list: PostList }),
        React.createElement(ra_core_1.Resource, { name: "comments", list: CommentList })))); };
exports.InsideRouter = InsideRouter;
var SubPath = function () { return (React.createElement(ra_core_1.TestMemoryRouter, null,
    React.createElement(react_router_dom_1.Routes, null,
        React.createElement(react_router_dom_1.Route, { path: "/", element: React.createElement(React.Fragment, null,
                React.createElement("h1", null, "Main"),
                React.createElement("div", null,
                    React.createElement(react_router_dom_1.Link, { to: "/admin" }, "Go to admin"))) }),
        React.createElement(react_router_dom_1.Route, { path: "/admin/*", element: React.createElement(Admin_1.Admin, { dataProvider: (0, ra_core_1.testDataProvider)(), basename: "/admin" },
                React.createElement(ra_core_1.Resource, { name: "posts", list: PostList }),
                React.createElement(ra_core_1.Resource, { name: "comments", list: CommentList })) })))); };
exports.SubPath = SubPath;
// @ts-ignore
var FailingAppBar = function () {
    throw new Error('AppBar rendering failed');
};
var FailedLayout = function (props) { return React.createElement(ra_ui_materialui_1.Layout, __assign({}, props, { appBar: FailingAppBar })); };
var DefaultError = function () { return (React.createElement(Admin_1.Admin, { layout: FailedLayout },
    React.createElement(ra_core_1.Resource, { name: "posts", list: PostList }))); };
exports.DefaultError = DefaultError;
var ErrorPage = function (_a) {
    var _b, _c, _d;
    var errorInfo = _a.errorInfo;
    return (React.createElement(material_1.Box, { sx: {
            display: 'flex',
            flexDirection: 'column',
            alignItems: 'center',
            minHeight: '100vh',
            backgroundColor: '#f44336',
        } },
        React.createElement(material_1.Typography, { variant: "h1", style: { color: 'white' } },
            React.createElement("b", null, "Error")),
        React.createElement("ul", null, (_d = (_c = (_b = errorInfo === null || errorInfo === void 0 ? void 0 : errorInfo.componentStack) === null || _b === void 0 ? void 0 : _b.split(' at ')) === null || _c === void 0 ? void 0 : _c.slice(1)) === null || _d === void 0 ? void 0 : _d.map(function (line, index) { return React.createElement("li", { key: index },
            "At ",
            line); }))));
};
var CustomError = function () { return (React.createElement(Admin_1.Admin, { layout: FailedLayout, error: ErrorPage },
    React.createElement(ra_core_1.Resource, { name: "posts", list: PostList }))); };
exports.CustomError = CustomError;
var dataProvider = (0, ra_data_fakerest_1.default)({
    books: [
        { id: 1, title: 'War and Peace', author_id: 1 },
        { id: 2, title: 'Pride and Prejudice', author_id: 2 },
        { id: 3, title: 'The Picture of Dorian Gray', author_id: 3 },
    ],
    authors: [
        { id: 1, firstName: 'Leo', lastName: 'Tolstoy' },
        { id: 2, firstName: 'Jane', lastName: 'Austen' },
        { id: 3, firstName: 'Oscar', lastName: 'Wilde' },
    ],
    users: [
        { id: 1, fullName: 'John Appleseed' },
        { id: 2, fullName: 'Jane Doe' },
    ],
});
var AccessControl = function () { return React.createElement(AccessControlAdmin, null); };
exports.AccessControl = AccessControl;
var AccessControlInSubPath = function () { return (React.createElement(ra_core_1.TestMemoryRouter, null,
    React.createElement(react_router_dom_1.Routes, null,
        React.createElement(react_router_dom_1.Route, { path: "/", element: React.createElement(React.Fragment, null,
                React.createElement("h1", null, "Main"),
                React.createElement("div", null,
                    React.createElement(react_router_dom_1.Link, { to: "/admin" }, "Go to admin"))) }),
        React.createElement(react_router_dom_1.Route, { path: "/admin/*", element: React.createElement(AccessControlAdmin, { AdminProps: { basename: '/admin' } }) })))); };
exports.AccessControlInSubPath = AccessControlInSubPath;
var AccessControlAdmin = function (_a) {
    var AdminProps = _a.AdminProps;
    var readerPermissions = [
        { action: 'list', resource: 'books' },
        { action: 'show', resource: 'books' },
        { action: 'list', resource: 'authors' },
        { action: 'show', resource: 'authors' },
    ];
    var editorPermissions = [
        { action: 'list', resource: 'books' },
        { action: 'create', resource: 'books' },
        { action: 'edit', resource: 'books' },
        { action: 'delete', resource: 'books' },
        { action: 'list', resource: 'authors' },
        { action: 'create', resource: 'authors' },
        { action: 'edit', resource: 'authors' },
        { action: 'delete', resource: 'authors' },
    ];
    var adminPermissions = __spreadArray(__spreadArray([], editorPermissions, true), [
        { action: 'list', resource: 'users' },
        { action: 'show', resource: 'users' },
        { action: 'create', resource: 'users' },
        { action: 'edit', resource: 'users' },
        { action: 'delete', resource: 'users' },
    ], false);
    var _b = React.useState(readerPermissions), permissions = _b[0], setPermissions = _b[1];
    var _c = React.useState(false), triggerAccessControlError = _c[0], setTriggerAccessControlError = _c[1];
    var authProvider = {
        // authentication
        login: function () {
            return __awaiter(this, void 0, void 0, function () { return __generator(this, function (_a) {
                return [2 /*return*/];
            }); });
        },
        checkError: function () {
            return __awaiter(this, void 0, void 0, function () { return __generator(this, function (_a) {
                return [2 /*return*/];
            }); });
        },
        checkAuth: function () {
            return __awaiter(this, void 0, void 0, function () { return __generator(this, function (_a) {
                return [2 /*return*/];
            }); });
        },
        logout: function () {
            return __awaiter(this, void 0, void 0, function () { return __generator(this, function (_a) {
                return [2 /*return*/];
            }); });
        },
        getIdentity: function () {
            return __awaiter(this, void 0, void 0, function () {
                return __generator(this, function (_a) {
                    return [2 /*return*/, { id: 'user', fullName: 'John Doe' }];
                });
            });
        },
        handleCallback: function () {
            return __awaiter(this, void 0, void 0, function () { return __generator(this, function (_a) {
                return [2 /*return*/];
            }); });
        },
        // authorization (optional)
        canAccess: function (_a) {
            var resource = _a.resource, action = _a.action;
            return __awaiter(this, void 0, void 0, function () {
                return __generator(this, function (_b) {
                    if (triggerAccessControlError) {
                        throw new Error('Access control error');
                    }
                    return [2 /*return*/, permissions.some(function (p) { return p.resource === resource && p.action === action; })];
                });
            });
        },
        getPermissions: function () {
            return __awaiter(this, void 0, void 0, function () { return __generator(this, function (_a) {
                return [2 /*return*/];
            }); });
        },
    };
    var CustomLayout = function (_a) {
        var children = _a.children;
        var queryClient = (0, react_query_1.useQueryClient)();
        return (React.createElement("div", null,
            React.createElement(material_1.Box, { display: "flex", gap: 2, position: "absolute", bottom: 10, left: "50%", zIndex: 1000, sx: { transform: 'translate(-50%, 0)' } },
                React.createElement(material_1.Button, { variant: "outlined", size: "small", onClick: function () {
                        setPermissions(readerPermissions);
                        queryClient.invalidateQueries({
                            queryKey: ['auth', 'canAccess'],
                        });
                    }, disabled: permissions.length === readerPermissions.length }, "View as reader"),
                React.createElement(material_1.Button, { variant: "outlined", size: "small", onClick: function () {
                        setPermissions(editorPermissions);
                        queryClient.invalidateQueries({
                            queryKey: ['auth', 'canAccess'],
                        });
                    }, disabled: permissions.length === editorPermissions.length }, "View as editor"),
                React.createElement(material_1.Button, { variant: "outlined", size: "small", onClick: function () {
                        setPermissions(adminPermissions);
                        queryClient.invalidateQueries({
                            queryKey: ['auth', 'canAccess'],
                        });
                    }, disabled: permissions.length === adminPermissions.length }, "View as admin"),
                React.createElement(material_1.Button, { variant: "outlined", size: "small", onClick: function () {
                        setTriggerAccessControlError(function (prev) { return !prev; });
                        queryClient.invalidateQueries({
                            queryKey: ['auth', 'canAccess'],
                        });
                    } }, "Toggle Access Control Error")),
            React.createElement(ra_ui_materialui_1.Layout, null, children)));
    };
    return (React.createElement(Admin_1.Admin, __assign({ dataProvider: dataProvider, authProvider: authProvider, layout: CustomLayout, queryClient: new react_query_1.QueryClient({
            defaultOptions: {
                queries: { retry: false },
            },
        }) }, AdminProps),
        React.createElement(ra_core_1.Resource, { name: "books", list: ra_ui_materialui_1.ListGuesser, edit: ra_ui_materialui_1.EditGuesser, show: ra_ui_materialui_1.ShowGuesser, create: React.createElement(React.Fragment, null, "Create view") }),
        React.createElement(ra_core_1.Resource, { name: "authors", list: ra_ui_materialui_1.ListGuesser, edit: ra_ui_materialui_1.EditGuesser, show: ra_ui_materialui_1.ShowGuesser, create: React.createElement(React.Fragment, null, "Create view"), recordRepresentation: function (record) {
                return "".concat(record.firstName, " ").concat(record.lastName);
            } }),
        React.createElement(ra_core_1.Resource, { name: "users", list: ra_ui_materialui_1.ListGuesser, edit: ra_ui_materialui_1.EditGuesser, show: ra_ui_materialui_1.ShowGuesser, create: React.createElement(React.Fragment, null, "Create view") })));
};
//# sourceMappingURL=Admin.stories.js.map