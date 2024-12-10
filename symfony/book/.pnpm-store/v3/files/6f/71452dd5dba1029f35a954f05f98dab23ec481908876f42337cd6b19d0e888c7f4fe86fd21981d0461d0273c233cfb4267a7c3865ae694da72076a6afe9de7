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
exports.BulkExportButton = void 0;
var React = __importStar(require("react"));
var react_1 = require("react");
var GetApp_1 = __importDefault(require("@mui/icons-material/GetApp"));
var ra_core_1 = require("ra-core");
var Button_1 = require("./Button");
/**
 * Export the selected rows
 *
 * To be used inside the <Datagrid bulkActionButtons> prop.
 *
 * @example // basic usage
 * import { BulkDeleteButton, BulkExportButton, List, Datagrid } from 'react-admin';
 *
 * const PostBulkActionButtons = () => (
 *     <>
 *         <BulkExportButton />
 *         <BulkDeleteButton />
 *     </>
 * );
 *
 * export const PostList = () => (
 *     <List>
 *        <Datagrid bulkActionButtons={<PostBulkActionButtons />}>
 *          ...
 *       </Datagrid>
 *     </List>
 * );
 */
var BulkExportButton = function (props) {
    var onClick = props.onClick, _a = props.label, label = _a === void 0 ? 'ra.action.export' : _a, _b = props.icon, icon = _b === void 0 ? defaultIcon : _b, customExporter = props.exporter, meta = props.meta, rest = __rest(props, ["onClick", "label", "icon", "exporter", "meta"]);
    var resource = (0, ra_core_1.useResourceContext)(props);
    var _c = (0, ra_core_1.useListContext)(), exporterFromContext = _c.exporter, selectedIds = _c.selectedIds;
    var exporter = customExporter || exporterFromContext;
    var dataProvider = (0, ra_core_1.useDataProvider)();
    var notify = (0, ra_core_1.useNotify)();
    var handleClick = (0, react_1.useCallback)(function (event) {
        if (exporter && resource) {
            dataProvider
                .getMany(resource, { ids: selectedIds, meta: meta })
                .then(function (_a) {
                var data = _a.data;
                return exporter(data, (0, ra_core_1.fetchRelatedRecords)(dataProvider), dataProvider, resource);
            })
                .catch(function (error) {
                console.error(error);
                notify('ra.notification.http_error', {
                    type: 'error',
                });
            });
        }
        if (typeof onClick === 'function') {
            onClick(event);
        }
    }, [dataProvider, exporter, notify, onClick, resource, selectedIds, meta]);
    return (React.createElement(Button_1.Button, __assign({ onClick: handleClick, label: label }, sanitizeRestProps(rest)), icon));
};
exports.BulkExportButton = BulkExportButton;
var defaultIcon = React.createElement(GetApp_1.default, null);
var sanitizeRestProps = function (_a) {
    var resource = _a.resource, rest = __rest(_a, ["resource"]);
    return rest;
};
//# sourceMappingURL=BulkExportButton.js.map