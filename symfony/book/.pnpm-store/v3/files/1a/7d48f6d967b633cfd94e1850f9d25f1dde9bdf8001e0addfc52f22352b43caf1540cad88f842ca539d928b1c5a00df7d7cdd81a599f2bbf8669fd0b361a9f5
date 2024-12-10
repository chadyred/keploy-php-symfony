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
exports.SimpleFormIterator = void 0;
var React = __importStar(require("react"));
var react_1 = require("react");
var material_1 = require("@mui/material");
var clsx_1 = __importDefault(require("clsx"));
var get_1 = __importDefault(require("lodash/get"));
var ra_core_1 = require("ra-core");
var react_hook_form_1 = require("react-hook-form");
var useArrayInput_1 = require("./useArrayInput");
var useSimpleFormIteratorStyles_1 = require("./useSimpleFormIteratorStyles");
var SimpleFormIteratorContext_1 = require("./SimpleFormIteratorContext");
var SimpleFormIteratorItem_1 = require("./SimpleFormIteratorItem");
var AddItemButton_1 = require("./AddItemButton");
var ClearArrayButton_1 = require("./ClearArrayButton");
var layout_1 = require("../../layout");
var SimpleFormIterator = function (inProps) {
    var props = (0, material_1.useThemeProps)({
        props: inProps,
        name: 'RaSimpleFormIterator',
    });
    var _a = props.addButton, addButton = _a === void 0 ? React.createElement(AddItemButton_1.AddItemButton, null) : _a, removeButton = props.removeButton, reOrderButtons = props.reOrderButtons, children = props.children, className = props.className, resource = props.resource, disabled = props.disabled, _b = props.disableAdd, disableAdd = _b === void 0 ? false : _b, disableClear = props.disableClear, _c = props.disableRemove, disableRemove = _c === void 0 ? false : _c, disableReordering = props.disableReordering, inline = props.inline, _d = props.getItemLabel, getItemLabel = _d === void 0 ? false : _d, fullWidth = props.fullWidth, sx = props.sx;
    var finalSource = (0, ra_core_1.useWrappedSource)('');
    if (!finalSource) {
        throw new Error('SimpleFormIterator can only be called within an iterator input like ArrayInput');
    }
    var _e = (0, react_1.useState)(false), confirmIsOpen = _e[0], setConfirmIsOpen = _e[1];
    var _f = (0, useArrayInput_1.useArrayInput)(props), append = _f.append, fields = _f.fields, move = _f.move, remove = _f.remove, replace = _f.replace;
    var _g = (0, react_hook_form_1.useFormContext)(), resetField = _g.resetField, trigger = _g.trigger, getValues = _g.getValues;
    var translate = (0, ra_core_1.useTranslate)();
    var record = (0, ra_core_1.useRecordContext)(props);
    var initialDefaultValue = (0, react_1.useRef)({});
    var removeField = (0, react_1.useCallback)(function (index) {
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
    var addField = (0, react_1.useCallback)(function (item) {
        if (item === void 0) { item = undefined; }
        var defaultValue = item;
        if (item == null) {
            defaultValue = initialDefaultValue.current;
            if (react_1.Children.count(children) === 1 &&
                React.isValidElement(react_1.Children.only(children)) &&
                // @ts-ignore
                !react_1.Children.only(children).props.source &&
                // Make sure it's not a FormDataConsumer
                // @ts-ignore
                !react_1.Children.only(children).type !== ra_core_1.FormDataConsumer) {
                // ArrayInput used for an array of scalar values
                // (e.g. tags: ['foo', 'bar'])
                defaultValue = '';
            }
            else {
                // ArrayInput used for an array of objects
                // (e.g. authors: [{ firstName: 'John', lastName: 'Doe' }, { firstName: 'Jane', lastName: 'Doe' }])
                defaultValue =
                    defaultValue || {};
                react_1.Children.forEach(children, function (input) {
                    var _a;
                    if (React.isValidElement(input) &&
                        input.type !== ra_core_1.FormDataConsumer &&
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
    var handleReorder = (0, react_1.useCallback)(function (origin, destination) {
        move(origin, destination);
    }, [move]);
    var handleArrayClear = (0, react_1.useCallback)(function () {
        replace([]);
        setConfirmIsOpen(false);
    }, [replace]);
    var records = (0, get_1.default)(record, finalSource);
    var context = (0, react_1.useMemo)(function () { return ({
        total: fields.length,
        add: addField,
        remove: removeField,
        reOrder: handleReorder,
        source: finalSource,
    }); }, [addField, fields.length, handleReorder, removeField, finalSource]);
    return fields ? (React.createElement(SimpleFormIteratorContext_1.SimpleFormIteratorContext.Provider, { value: context },
        React.createElement(Root, { className: (0, clsx_1.default)(className, fullWidth && 'fullwidth', disabled && 'disabled'), sx: sx },
            React.createElement("ul", { className: useSimpleFormIteratorStyles_1.SimpleFormIteratorClasses.list }, fields.map(function (member, index) { return (React.createElement(SimpleFormIteratorItem_1.SimpleFormIteratorItem, { key: member.id, disabled: disabled, disableRemove: disableRemove, disableReordering: disableReordering, fields: fields, getItemLabel: getItemLabel, index: index, onRemoveField: removeField, onReorder: handleReorder, record: (records && records[index]) || {}, removeButton: removeButton, reOrderButtons: reOrderButtons, resource: resource, inline: inline }, children)); })),
            !disabled &&
                !(disableAdd && (disableClear || disableRemove)) && (React.createElement("div", { className: useSimpleFormIteratorStyles_1.SimpleFormIteratorClasses.buttons },
                !disableAdd && (React.createElement("div", { className: useSimpleFormIteratorStyles_1.SimpleFormIteratorClasses.add }, addButton)),
                fields.length > 0 &&
                    !disableClear &&
                    !disableRemove && (React.createElement("div", { className: useSimpleFormIteratorStyles_1.SimpleFormIteratorClasses.clear },
                    React.createElement(layout_1.Confirm, { isOpen: confirmIsOpen, title: translate('ra.action.clear_array_input'), content: translate('ra.message.clear_array_input'), onConfirm: handleArrayClear, onClose: function () {
                            return setConfirmIsOpen(false);
                        } }),
                    React.createElement(ClearArrayButton_1.ClearArrayButton, { onClick: function () {
                            return setConfirmIsOpen(true);
                        } })))))))) : null;
};
exports.SimpleFormIterator = SimpleFormIterator;
var Root = (0, material_1.styled)('div', {
    name: useSimpleFormIteratorStyles_1.SimpleFormIteratorPrefix,
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
        _b["& .".concat(useSimpleFormIteratorStyles_1.SimpleFormIteratorClasses.line)] = (_c = {
                display: 'flex',
                listStyleType: 'none',
                borderBottom: "solid 1px ".concat(theme.palette.divider)
            },
            _c[theme.breakpoints.down('sm')] = { display: 'block' },
            _c),
        _b["& .".concat(useSimpleFormIteratorStyles_1.SimpleFormIteratorClasses.index)] = (_d = {
                display: 'flex',
                alignItems: 'top',
                marginRight: theme.spacing(1),
                marginTop: theme.spacing(1)
            },
            _d[theme.breakpoints.down('md')] = { display: 'none' },
            _d),
        _b["& .".concat(useSimpleFormIteratorStyles_1.SimpleFormIteratorClasses.form)] = {},
        _b["&.fullwidth > ul > li > .".concat(useSimpleFormIteratorStyles_1.SimpleFormIteratorClasses.form)] = {
            flex: 2,
        },
        _b["& .".concat(useSimpleFormIteratorStyles_1.SimpleFormIteratorClasses.inline)] = {
            flexDirection: 'row',
            columnGap: '1em',
        },
        _b["& .".concat(useSimpleFormIteratorStyles_1.SimpleFormIteratorClasses.action)] = {
            marginTop: theme.spacing(0.5),
            visibility: 'hidden',
            '@media(hover:none)': {
                visibility: 'visible',
            },
        },
        _b["& .".concat(useSimpleFormIteratorStyles_1.SimpleFormIteratorClasses.buttons)] = {
            display: 'flex',
        },
        _b["& .".concat(useSimpleFormIteratorStyles_1.SimpleFormIteratorClasses.add)] = {
            borderBottom: 'none',
        },
        _b["& .".concat(useSimpleFormIteratorStyles_1.SimpleFormIteratorClasses.clear)] = {
            borderBottom: 'none',
        },
        _b["& .".concat(useSimpleFormIteratorStyles_1.SimpleFormIteratorClasses.line, ":hover > .").concat(useSimpleFormIteratorStyles_1.SimpleFormIteratorClasses.action)] = {
            visibility: 'visible',
        },
        _b);
});
//# sourceMappingURL=SimpleFormIterator.js.map