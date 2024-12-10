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
exports.ListNoResults = void 0;
var React = __importStar(require("react"));
var material_1 = require("@mui/material");
var ra_core_1 = require("ra-core");
var button_1 = require("../button");
var ListNoResults = function () {
    var translate = (0, ra_core_1.useTranslate)();
    var resource = (0, ra_core_1.useResourceContext)();
    var _a = (0, ra_core_1.useListContextWithProps)(), filterValues = _a.filterValues, setFilters = _a.setFilters;
    var getResourceLabel = (0, ra_core_1.useGetResourceLabel)();
    if (!resource) {
        throw new Error('<ListNoResults> must be used inside a <List> component');
    }
    return (React.createElement(material_1.CardContent, null,
        React.createElement(material_1.Typography, { variant: "body2" }, filterValues &&
            setFilters &&
            Object.keys(filterValues).length > 0 ? (React.createElement(React.Fragment, null,
            translate('ra.navigation.no_filtered_results', {
                resource: resource,
                name: getResourceLabel(resource, 0),
                _: 'No results found with the current filters.',
            }),
            ' ',
            React.createElement(button_1.Button, { onClick: function () { return setFilters({}, []); }, label: translate('ra.navigation.clear_filters', {
                    _: 'Clear filters',
                }) }))) : (translate('ra.navigation.no_results', {
            resource: resource,
            name: getResourceLabel(resource, 0),
            _: 'No results found.',
        })))));
};
exports.ListNoResults = ListNoResults;
//# sourceMappingURL=ListNoResults.js.map