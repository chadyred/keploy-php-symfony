import { useEffect } from 'react';
import { useFormContext, } from 'react-hook-form';
import get from 'lodash/get';
import { useRecordContext } from '../controller';
import { useWrappedSource } from '../core';
/*
 * This hook updates the input with the default value if default value is present
 * and field input is not already populated or dirty
 */
export var useApplyInputDefaultValues = function (_a) {
    var inputProps = _a.inputProps, isArrayInput = _a.isArrayInput, fieldArrayInputControl = _a.fieldArrayInputControl;
    var defaultValue = inputProps.defaultValue, source = inputProps.source;
    var finalSource = useWrappedSource(source);
    var record = useRecordContext(inputProps);
    var _b = useFormContext(), getValues = _b.getValues, resetField = _b.resetField, formState = _b.formState, reset = _b.reset;
    var recordValue = get(record, finalSource);
    var formValue = get(getValues(), finalSource);
    var dirtyFields = formState.dirtyFields;
    var isDirty = Object.keys(dirtyFields).includes(finalSource);
    useEffect(function () {
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
            var parentValue = get(getValues(), parentPath);
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
var numericRegex = /^\d+$/;
//# sourceMappingURL=useApplyInputDefaultValues.js.map