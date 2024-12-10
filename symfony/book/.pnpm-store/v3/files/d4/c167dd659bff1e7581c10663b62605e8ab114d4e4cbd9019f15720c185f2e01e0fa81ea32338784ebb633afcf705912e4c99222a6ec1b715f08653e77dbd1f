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
exports.WithRecord = void 0;
var React = __importStar(require("react"));
var useRecordContext_1 = require("./useRecordContext");
/**
 * Render prop version of useRecordContext
 *
 * @example
 * const BookShow = () => (
 *    <Show>
 *       <SimpleShowLayout>
 *          <WithRecord render={record => <span>{record.title}</span>} />
 *      </SimpleShowLayout>
 *   </Show>
 * );
 */
var WithRecord = function (_a) {
    var render = _a.render;
    var record = (0, useRecordContext_1.useRecordContext)();
    return record ? React.createElement(React.Fragment, null, render(record)) : null;
};
exports.WithRecord = WithRecord;
//# sourceMappingURL=WithRecord.js.map