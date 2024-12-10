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
exports.ReferenceFieldBase = void 0;
var React = __importStar(require("react"));
var ReferenceFieldContext_1 = require("./ReferenceFieldContext");
var useReferenceFieldController_1 = require("./useReferenceFieldController");
var core_1 = require("../../core");
var record_1 = require("../record");
/**
 * Fetch reference record, and render its representation, or delegate rendering to child component.
 *
 * The reference prop should be the name of one of the <Resource> components
 * added as <Admin> child.
 *
 * @example // using recordRepresentation
 * <ReferenceFieldBase label="User" source="userId" reference="users" />
 *
 * @example // using a Field component to represent the record
 * <ReferenceFieldBase label="User" source="userId" reference="users">
 *     <TextField source="name" />
 * </ReferenceFieldBase>
 *
 * @example // By default, includes a link to the <Edit> page of the related record
 * // (`/users/:userId` in the previous example).
 * // Set the `link` prop to "show" to link to the <Show> page instead.
 * <ReferenceFieldBase label="User" source="userId" reference="users" link="show" />
 *
 * @example // You can also prevent `<ReferenceFieldBase>` from adding link to children
 * // by setting `link` to false.
 * <ReferenceFieldBase label="User" source="userId" reference="users" link={false} />
 *
 * @example // Alternatively, you can also pass a custom function to `link`.
 * // It must take reference and record as arguments and return a string
 * <ReferenceFieldBase label="User" source="userId" reference="users" link={(record, reference) => "/path/to/${reference}/${record}"} />
 *
 * @default
 * In previous versions of React-Admin, the prop `linkType` was used. It is now deprecated and replaced with `link`. However
 * backward-compatibility is still kept
 */
var ReferenceFieldBase = function (props) {
    var children = props.children;
    var controllerProps = (0, useReferenceFieldController_1.useReferenceFieldController)(props);
    return (React.createElement(core_1.ResourceContextProvider, { value: props.reference },
        React.createElement(ReferenceFieldContext_1.ReferenceFieldContextProvider, { value: controllerProps },
            React.createElement(record_1.RecordContextProvider, { value: controllerProps.referenceRecord }, children))));
};
exports.ReferenceFieldBase = ReferenceFieldBase;
//# sourceMappingURL=ReferenceFieldBase.js.map