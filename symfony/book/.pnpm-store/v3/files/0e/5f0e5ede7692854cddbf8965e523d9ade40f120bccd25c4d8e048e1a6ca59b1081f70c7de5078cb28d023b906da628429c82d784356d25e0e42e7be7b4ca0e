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
exports.RecordRepresentation = void 0;
var React = __importStar(require("react"));
var core_1 = require("../../core");
var useRecordContext_1 = require("./useRecordContext");
/**
 * Render the record representation as specified on its parent <Resource>.
 * @param props The component props
 * @param {string} props.resource The resource name
 * @param {RaRecord} props.record The record to render
 */
var RecordRepresentation = function (props) {
    var record = (0, useRecordContext_1.useRecordContext)(props);
    var resource = (0, core_1.useResourceContext)(props);
    var getRecordRepresentation = (0, core_1.useGetRecordRepresentation)(resource);
    return React.createElement(React.Fragment, null, getRecordRepresentation(record));
};
exports.RecordRepresentation = RecordRepresentation;
//# sourceMappingURL=RecordRepresentation.js.map