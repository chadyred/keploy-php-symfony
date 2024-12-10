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
exports.NavigateToFirstResource = void 0;
var React = __importStar(require("react"));
var react_router_1 = require("react-router");
var useFirstResourceWithListAccess_1 = require("./useFirstResourceWithListAccess");
var routing_1 = require("../routing");
/**
 * This component will inspect the registered resources and navigate to the first one for which users have access to the list page.
 * @param props
 * @param props.loading The component to display while the component is loading.
 */
var NavigateToFirstResource = function (_a) {
    var LoadingPage = _a.loading;
    var _b = (0, useFirstResourceWithListAccess_1.useFirstResourceWithListAccess)(), resource = _b.resource, isPending = _b.isPending;
    var createPath = (0, routing_1.useCreatePath)();
    if (isPending) {
        return React.createElement(LoadingPage, null);
    }
    if (resource) {
        return (React.createElement(react_router_1.Navigate, { to: createPath({
                resource: resource,
                type: 'list',
            }), replace: true }));
    }
};
exports.NavigateToFirstResource = NavigateToFirstResource;
//# sourceMappingURL=NavigateToFirstResource.js.map