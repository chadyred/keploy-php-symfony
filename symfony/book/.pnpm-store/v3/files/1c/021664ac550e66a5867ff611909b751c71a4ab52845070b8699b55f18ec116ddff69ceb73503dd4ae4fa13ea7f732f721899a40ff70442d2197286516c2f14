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
import { Children, useCallback, useMemo, useRef, useState, } from 'react';
import { styled, useThemeProps } from '@mui/material';
import clsx from 'clsx';
import get from 'lodash/get';
import { FormDataConsumer, useRecordContext, useTranslate, useWrappedSource, } from 'ra-core';
import { useFormContext } from 'react-hook-form';
import { useArrayInput } from './useArrayInput';
import { SimpleFormIteratorClasses, SimpleFormIteratorPrefix, } from './useSimpleFormIteratorStyles';
import { SimpleFormIteratorContext } from './SimpleFormIteratorContext';
import { SimpleFormIteratorItem, } from './SimpleFormIteratorItem';
import { AddItemButton as DefaultAddItemButton } from './AddItemButton';
import { ClearArrayButton } from './ClearArrayButton';
import { Confirm } from '../../layout';
export var SimpleFormIterator = function (inProps) {
    var props = useThemeProps({
        props: inProps,
        name: 'RaSimpleFormIterator',
    });
    var _a = props.addButton, addButton = _a === void 0 ? React.createElement(DefaultAddItemButton, null) : _a, removeButton = props.removeButton, reOrderButtons = props.reOrderButtons, children = props.children, className = props.className, resource = props.resource, disabled = props.disabled, _b = props.disableAdd, disableAdd = _b === void 0 ? false : _b, disableClear = props.disableClear, _c = props.disableRemove, disableRemove = _c === void 0 ? false : _c, disableReordering = props.disableReordering, inline = props.inline, _d = props.getItemLabel, getItemLabel = _d === void 0 ? false : _d, fullWidth = props.fullWidth, sx = props.sx;
    var finalSource = useWrappedSource('');
    if (!finalSource) {
        throw new Error('SimpleFormIterator can only be called within an iterator input like ArrayInput');
    }
    var _e = useState(false), confirmIsOpen = _e[0], setConfirmIsOpen = _e[1];
    var _f = useArrayInput(props), append = _f.append, fields = _f.fields, move = _f.move, remove = _f.remove, replace = _f.replace;
    var _g = useFormContext(), resetField = _g.resetField, trigger = _g.trigger, getValues = _g.getValues;
    var translate = useTranslate();
    var record = useRecordContext(props);
    var initialDefaultValue = useRef({});
    var removeField = useCallback(function (index) {
        remove(index);
        var isScalarArray = getValues(finalSource).every(function (value) { return typeof value !== 'object'; });
        if (isScalarArray) {
            // Trigger validation on the Array to avoid ghost errors.
            // Otherwise, validation errors on removed fields might still be displayed
            trigger(finalSource);
        }
    }, [remove, trigger, finalSource, getValues]);
    if (fields.length > 0) {
        var _h = fields[0], id = _h.id, rest = __rest(_h, ["id"]);
        initialDefaultValue.current = rest;
        for (var k in initialDefaultValue.current)
            initialDefaultValue.current[k] = null;
    }
    var addField = useCallback(function (item) {
        if (item === void 0) { item = undefined; }
        var defaultValue = item;
        if (item == null) {
            defaultValue = initialDefaultValue.current;
            if (Children.count(children) === 1 &&
                React.isValidElement(Children.only(children)) &&
                // @ts-ignore
                !Children.only(children).props.source &&
                // Make sure it's not a FormDataConsumer
                // @ts-ignore
                !Children.only(children).type !== FormDataConsumer) {
                // ArrayInput used for an array of scalar values
                // (e.g. tags: ['foo', 'bar'])
                defaultValue = '';
            }
            else {
                // ArrayInput used for an array of objects
                // (e.g. authors: [{ firstName: 'John', lastName: 'Doe' }, { firstName: 'Jane', lastName: 'Doe' }])
                defaultValue =
                    defaultValue || {};
                Children.forEach(children, function (input) {
                    var _a;
                    if (React.isValidElement(input) &&
                        input.type !== FormDataConsumer &&
                        input.props.source) {
                        defaultValue[input.props.source] =
                            (_a = input.props.defaultValue) !== null && _a !== void 0 ? _a : null;
                    }
                });
            }
        }
        append(defaultValue);
        // Make sure the newly added inputs are not considered dirty by react-hook-form
        resetField("".concat(finalSource, ".").concat(fields.length), { defaultValue: defaultValue });
    }, [append, children, resetField, finalSource, fields.length]);
    var handleReorder = useCallback(function (origin, destination) {
        move(origin, destination);
    }, [move]);
    var handleArrayClear = useCallback(function () {
        replace([]);
        setConfirmIsOpen(false);
    }, [replace]);
    var records = get(record, finalSource);
    var context = useMemo(function () { return ({
        total: fields.length,
        add: addField,
        remove: removeField,
        reOrder: handleReorder,
        source: finalSource,
    }); }, [addField, fields.length, handleReorder, removeField, finalSource]);
    return fields ? (React.createElement(SimpleFormIteratorContext.Provider, { value: context },
        React.createElement(Root, { className: clsx(className, fullWidth && 'fullwidth', disabled && 'disabled'), sx: sx },
            React.createElement("ul", { className: SimpleFormIteratorClasses.list }, fields.map(function (member, index) { return (React.createElement(SimpleFormIteratorItem, { key: member.id, disabled: disabled, disableRemove: disableRemove, disableReordering: disableReordering, fields: fields, getItemLabel: getItemLabel, index: index, onRemoveField: removeField, onReorder: handleReorder, record: (records && records[index]) || {}, removeButton: removeButton, reOrderButtons: reOrderButtons, resource: resource, inline: inline }, children)); })),
            !disabled &&
                !(disableAdd && (disableClear || disableRemove)) && (React.createElement("div", { className: SimpleFormIteratorClasses.buttons },
                !disableAdd && (React.createElement("div", { className: SimpleFormIteratorClasses.add }, addButton)),
                fields.length > 0 &&
                    !disableClear &&
                    !disableRemove && (React.createElement("div", { className: SimpleFormIteratorClasses.clear },
                    React.createElement(Confirm, { isOpen: confirmIsOpen, title: translate('ra.action.clear_array_input'), content: translate('ra.message.clear_array_input'), onConfirm: handleArrayClear, onClose: function () {
                            return setConfirmIsOpen(false);
                        } }),
                    React.createElement(ClearArrayButton, { onClick: function () {
                            return setConfirmIsOpen(true);
                        } })))))))) : null;
};
var Root = styled('div', {
    name: SimpleFormIteratorPrefix,
    overridesResolver: function (props, styles) { return styles.root; },
})(function (_a) {
    var _b, _c, _d;
    var theme = _a.theme;
    return (_b = {
            '& > ul': {
                padding: 0,
                marginTop: 0,
                marginBottom: 0,
            },
            '& > ul > li:last-child': {
                // hide the last separator
                borderBottom: 'none',
            }
        },
        _b["& .".concat(SimpleFormIteratorClasses.line)] = (_c = {
                display: 'flex',
                listStyleType: 'none',
                borderBottom: "solid 1px ".concat(theme.palette.divider)
            },
            _c[theme.breakpoints.down('sm')] = { display: 'block' },
            _c),
        _b["& .".concat(SimpleFormIteratorClasses.index)] = (_d = {
                display: 'flex',
                alignItems: 'top',
                marginRight: theme.spacing(1),
                marginTop: theme.spacing(1)
            },
            _d[theme.breakpoints.down('md')] = { display: 'none' },
            _d),
        _b["& .".concat(SimpleFormIteratorClasses.form)] = {},
        _b["&.fullwidth > ul > li > .".concat(SimpleFormIteratorClasses.form)] = {
            flex: 2,
        },
        _b["& .".concat(SimpleFormIteratorClasses.inline)] = {
            flexDirection: 'row',
            columnGap: '1em',
        },
        _b["& .".concat(SimpleFormIteratorClasses.action)] = {
            marginTop: theme.spacing(0.5),
            visibility: 'hidden',
            '@media(hover:none)': {
                visibility: 'visible',
            },
        },
        _b["& .".concat(SimpleFormIteratorClasses.buttons)] = {
            display: 'flex',
        },
        _b["& .".concat(SimpleFormIteratorClasses.add)] = {
            borderBottom: 'none',
        },
        _b["& .".concat(SimpleFormIteratorClasses.clear)] = {
            borderBottom: 'none',
        },
        _b["& .".concat(SimpleFormIteratorClasses.line, ":hover > .").concat(SimpleFormIteratorClasses.action)] = {
            visibility: 'visible',
        },
        _b);
});
//# sourceMappingURL=SimpleFormIterator.js.map