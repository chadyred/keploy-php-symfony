"use strict";
var __importDefault = (this && this.__importDefault) || function (mod) {
    return (mod && mod.__esModule) ? mod : { "default": mod };
};
Object.defineProperty(exports, "__esModule", { value: true });
exports.useApplyInputDefaultValues = void 0;
var react_1 = require("react");
var react_hook_form_1 = require("react-hook-form");
var get_1 = __importDefault(require("lodash/get"));
var controller_1 = require("../controller");
var core_1 = require("../core");
/*
 * This hook updates the input with the default value if default value is present
 * and field input is not already populated or dirty
 */
var useApplyInputDefaultValues = function (_a) {
    var inputProps = _a.inputProps, isArrayInput = _a.isArrayInput, fieldArrayInputControl = _a.fieldArrayInputControl;
    var defaultValue = inputProps.defaultValue, source = inputProps.source;
    var finalSource = (0, core_1.useWrappedSource)(source);
    var record = (0, controller_1.useRecordContext)(inputProps);
    var _b = (0, react_hook_form_1.useFormContext)(), getValues = _b.getValues, resetField = _b.resetField, formState = _b.formState, reset = _b.reset;
    var recordValue = (0, get_1.default)(record, finalSource);
    var formValue = (0, get_1.default)(getValues(), finalSource);
    var dirtyFields = formState.dirtyFields;
    var isDirty = Object.keys(dirtyFields).includes(finalSource);
    (0, react_1.useEffect)(function () {
        if (defaultValue == null ||
            formValue != null ||
            recordValue != null ||
            isDirty) {
            return;
        }
        // Side note: For Array Input but checked for all to avoid possible regression
        // Since we use get(record, source), if source is like foo.23.bar,
        // this effect will run. However we only want to set the default value
        // for the subfield bar if the record actually has a value for foo.23
        var pathContainsIndex = finalSource
            .split('.')
            .some(function (pathPart) { return numericRegex.test(pathPart); });
        if (pathContainsIndex) {
            var parentPath = finalSource.split('.').slice(0, -1).join('.');
            var parentValue = (0, get_1.default)(getValues(), parentPath);
            if (parentValue == null) {
                // the parent is undefined, so we don't want to set the default value
                return;
            }
        }
        if (isArrayInput) {
            if (!fieldArrayInputControl) {
                throw new Error('useApplyInputDefaultValues: No fieldArrayInputControl passed in props for array input usage');
            }
            // We need to update inputs nested in array using react hook forms
            // own array controller rather then the generic reset to prevent control losing
            // context of the nested inputs
            fieldArrayInputControl.replace(defaultValue);
            // resets the form so that control no longer sees the form as dirty after
            // defaults applied
            reset({}, { keepValues: true });
            return;
        }
        resetField(finalSource, { defaultValue: defaultValue });
    });
};
exports.useApplyInputDefaultValues = useApplyInputDefaultValues;
var numericRegex = /^\d+$/;
//# sourceMappingURL=useApplyInputDefaultValues.js.map