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
exports.CreateButtonClasses = void 0;
var React = __importStar(require("react"));
var Add_1 = __importDefault(require("@mui/icons-material/Add"));
var material_1 = require("@mui/material");
var styles_1 = require("@mui/material/styles");
var clsx_1 = __importDefault(require("clsx"));
var isEqual_1 = __importDefault(require("lodash/isEqual"));
var merge_1 = __importDefault(require("lodash/merge"));
var ra_core_1 = require("ra-core");
var react_router_dom_1 = require("react-router-dom");
var Button_1 = require("./Button");
/**
 * Opens the Create view of a given resource
 *
 * Renders as a regular button on desktop, and a Floating Action Button
 * on mobile.
 *
 * @example // basic usage
 * import { CreateButton } from 'react-admin';
 *
 * const CommentCreateButton = () => (
 *     <CreateButton label="Create comment" />
 * );
 */
var CreateButton = function (props) {
    var className = props.className, _a = props.icon, icon = _a === void 0 ? defaultIcon : _a, _b = props.label, label = _b === void 0 ? 'ra.action.create' : _b, resourceProp = props.resource, _c = props.scrollToTop, scrollToTop = _c === void 0 ? true : _c, variant = props.variant, locationDescriptor = props.to, _d = props.state, initialState = _d === void 0 ? {} : _d, rest = __rest(props, ["className", "icon", "label", "resource", "scrollToTop", "variant", "to", "state"]);
    var resource = (0, ra_core_1.useResourceContext)(props);
    if (!resource) {
        throw new Error('<CreateButton> components should be used inside a <Resource> component or provided the resource prop.');
    }
    var _e = (0, ra_core_1.useCanAccess)({
        action: 'create',
        resource: resource,
    }), canAccess = _e.canAccess, isPending = _e.isPending;
    var createPath = (0, ra_core_1.useCreatePath)();
    var translate = (0, ra_core_1.useTranslate)();
    var isSmall = (0, material_1.useMediaQuery)(function (theme) {
        return theme.breakpoints.down('md');
    });
    var state = (0, merge_1.default)({}, scrollStates.get(String(scrollToTop)), initialState);
    // Duplicated behavior of Button component (legacy use) which will be removed in v5.
    var linkParams = getLinkParams(locationDescriptor);
    if (!canAccess || isPending) {
        return null;
    }
    return isSmall ? (React.createElement(StyledFab, __assign({ component: react_router_dom_1.Link, to: createPath({ resource: resource, type: 'create' }), state: state, 
        // @ts-ignore FabProps ships its own runtime palette `FabPropsColorOverrides` provoking an overlap error with `ButtonProps`
        color: "primary", className: (0, clsx_1.default)(exports.CreateButtonClasses.floating, className), "aria-label": label && translate(label) }, rest, linkParams), icon)) : (React.createElement(StyledButton, __assign({ component: react_router_dom_1.Link, to: createPath({ resource: resource, type: 'create' }), state: state, className: (0, clsx_1.default)(exports.CreateButtonClasses.root, className), label: label, variant: variant }, rest, linkParams), icon));
};
// avoids using useMemo to get a constant value for the link state
var scrollStates = new Map([
    ['true', { _scrollToTop: true }],
    ['false', {}],
]);
var defaultIcon = React.createElement(Add_1.default, null);
var PREFIX = 'RaCreateButton';
exports.CreateButtonClasses = {
    root: "".concat(PREFIX, "-root"),
    floating: "".concat(PREFIX, "-floating"),
};
var StyledFab = (0, styles_1.styled)(material_1.Fab, {
    name: PREFIX,
    overridesResolver: function (_props, styles) { return styles.root; },
})(function (_a) {
    var _b;
    var theme = _a.theme;
    return (_b = {},
        _b["&.".concat(exports.CreateButtonClasses.floating)] = {
            color: theme.palette.getContrastText(theme.palette.primary.main),
            margin: 0,
            top: 'auto',
            right: 20,
            bottom: 60,
            left: 'auto',
            position: 'fixed',
            zIndex: 1000,
        },
        _b);
});
var StyledButton = (0, styles_1.styled)(Button_1.Button, {
    name: PREFIX,
    overridesResolver: function (_props, styles) { return styles.root; },
})({});
exports.default = React.memo(CreateButton, function (prevProps, nextProps) {
    return (prevProps.resource === nextProps.resource &&
        prevProps.label === nextProps.label &&
        prevProps.translate === nextProps.translate &&
        prevProps.disabled === nextProps.disabled &&
        (0, isEqual_1.default)(prevProps.to, nextProps.to) &&
        (0, isEqual_1.default)(prevProps.state, nextProps.state));
});
var getLinkParams = function (locationDescriptor) {
    // eslint-disable-next-line
    if (locationDescriptor == undefined) {
        return undefined;
    }
    if (typeof locationDescriptor === 'string') {
        return { to: locationDescriptor };
    }
    var redirect = locationDescriptor.redirect, replace = locationDescriptor.replace, state = locationDescriptor.state, to = __rest(locationDescriptor, ["redirect", "replace", "state"]);
    return {
        to: to,
        redirect: redirect,
        replace: replace,
        state: state,
    };
};
//# sourceMappingURL=CreateButton.js.map