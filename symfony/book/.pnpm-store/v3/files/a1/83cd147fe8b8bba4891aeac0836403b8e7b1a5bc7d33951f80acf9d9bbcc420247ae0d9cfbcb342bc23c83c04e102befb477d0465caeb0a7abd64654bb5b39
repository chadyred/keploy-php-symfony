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
exports.ReferenceOneField = void 0;
var react_1 = __importStar(require("react"));
var material_1 = require("@mui/material");
var ra_core_1 = require("ra-core");
var ReferenceField_1 = require("./ReferenceField");
/**
 * Render the related record in a one-to-one relationship
 *
 * Expects a single field as child
 *
 * @example // display the bio of the current author
 * <ReferenceOneField reference="bios" target="author_id">
 *     <TextField source="body" />
 * </ReferenceOneField>
 */
var ReferenceOneField = function (props) {
    var children = props.children, reference = props.reference, _a = props.source, source = _a === void 0 ? 'id' : _a, target = props.target, emptyText = props.emptyText, sort = props.sort, filter = props.filter, link = props.link, queryOptions = props.queryOptions;
    var record = (0, ra_core_1.useRecordContext)(props);
    var translate = (0, ra_core_1.useTranslate)();
    var controllerProps = (0, ra_core_1.useReferenceOneFieldController)({
        record: record,
        reference: reference,
        source: source,
        target: target,
        sort: sort,
        filter: filter,
        queryOptions: queryOptions,
    });
    var path = (0, ra_core_1.useGetPathForRecord)({
        record: controllerProps.referenceRecord,
        resource: reference,
        link: link,
    });
    var context = (0, react_1.useMemo)(function () { return (__assign(__assign({}, controllerProps), { link: path })); }, [controllerProps, path]);
    return !record ||
        (!controllerProps.isPending &&
            controllerProps.referenceRecord == null) ? (emptyText ? (react_1.default.createElement(material_1.Typography, { component: "span", variant: "body2" }, emptyText && translate(emptyText, { _: emptyText }))) : null) : (react_1.default.createElement(ra_core_1.ResourceContextProvider, { value: reference },
        react_1.default.createElement(ra_core_1.ReferenceFieldContextProvider, { value: context },
            react_1.default.createElement(ra_core_1.RecordContextProvider, { value: context.referenceRecord },
                react_1.default.createElement(ReferenceField_1.ReferenceFieldView, { reference: reference, source: source }, children)))));
};
exports.ReferenceOneField = ReferenceOneField;
// disable sorting on this field by default as its default source prop ('id')
// will match the default sort ({ field: 'id', order: 'DESC'})
// leading to an incorrect sort indicator in a datagrid header
exports.ReferenceOneField.sortable = false;
//# sourceMappingURL=ReferenceOneField.js.map