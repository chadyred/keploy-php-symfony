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
import * as React from 'react';
import { useCallback } from 'react';
import clsx from 'clsx';
import FormControlLabel from '@mui/material/FormControlLabel';
import FormHelperText from '@mui/material/FormHelperText';
import FormGroup from '@mui/material/FormGroup';
import Switch from '@mui/material/Switch';
import { FieldTitle, useInput } from 'ra-core';
import { sanitizeInputRestProps } from './sanitizeInputRestProps';
import { InputHelperText } from './InputHelperText';
export var BooleanInput = function (props) {
    var className = props.className, _a = props.row, row = _a === void 0 ? false : _a, _b = props.defaultValue, defaultValue = _b === void 0 ? false : _b, format = props.format, label = props.label, fullWidth = props.fullWidth, helperText = props.helperText, onBlur = props.onBlur, onChange = props.onChange, onFocus = props.onFocus, readOnly = props.readOnly, disabled = props.disabled, parse = props.parse, resource = props.resource, source = props.source, validate = props.validate, _c = props.options, options = _c === void 0 ? defaultOptions : _c, sx = props.sx, rest = __rest(props, ["className", "row", "defaultValue", "format", "label", "fullWidth", "helperText", "onBlur", "onChange", "onFocus", "readOnly", "disabled", "parse", "resource", "source", "validate", "options", "sx"]);
    var _d = useInput(__assign({ defaultValue: defaultValue, format: format, parse: parse, resource: resource, source: source, onBlur: onBlur, onChange: onChange, type: 'checkbox', validate: validate, disabled: disabled, readOnly: readOnly }, rest)), id = _d.id, field = _d.field, isRequired = _d.isRequired, _e = _d.fieldState, error = _e.error, invalid = _e.invalid;
    var handleChange = useCallback(function (event) {
        field.onChange(event);
        // Ensure field is considered as touched
        field.onBlur();
    }, [field]);
    var renderHelperText = helperText !== false || invalid;
    return (React.createElement(FormGroup, { className: clsx('ra-input', "ra-input-".concat(source), className), row: row, sx: sx },
        React.createElement(FormControlLabel, { inputRef: field.ref, control: React.createElement(Switch, __assign({ id: id, name: field.name, onChange: handleChange, onFocus: onFocus, checked: Boolean(field.value) }, sanitizeInputRestProps(rest), options, { disabled: disabled || readOnly, readOnly: readOnly })), label: React.createElement(FieldTitle, { label: label, source: source, resource: resource, isRequired: isRequired }) }),
        renderHelperText ? (React.createElement(FormHelperText, { error: invalid },
            React.createElement(InputHelperText, { error: error === null || error === void 0 ? void 0 : error.message, helperText: helperText }))) : null));
};
var defaultOptions = {};
//# sourceMappingURL=BooleanInput.js.map