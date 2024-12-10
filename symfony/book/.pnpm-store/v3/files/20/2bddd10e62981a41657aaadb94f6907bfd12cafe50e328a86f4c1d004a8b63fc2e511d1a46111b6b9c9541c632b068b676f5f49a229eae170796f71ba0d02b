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
var __importDefault = (this && this.__importDefault) || function (mod) {
    return (mod && mod.__esModule) ? mod : { "default": mod };
};
Object.defineProperty(exports, "__esModule", { value: true });
exports.SimpleFormIteratorItem = void 0;
var React = __importStar(require("react"));
var react_1 = require("react");
var material_1 = require("@mui/material");
var clsx_1 = __importDefault(require("clsx"));
var ra_core_1 = require("ra-core");
var useSimpleFormIteratorStyles_1 = require("./useSimpleFormIteratorStyles");
var useSimpleFormIterator_1 = require("./useSimpleFormIterator");
var SimpleFormIteratorItemContext_1 = require("./SimpleFormIteratorItemContext");
var RemoveItemButton_1 = require("./RemoveItemButton");
var ReOrderButtons_1 = require("./ReOrderButtons");
exports.SimpleFormIteratorItem = React.forwardRef(function (props, ref) {
    var children = props.children, disabled = props.disabled, disableReordering = props.disableReordering, disableRemove = props.disableRemove, getItemLabel = props.getItemLabel, index = props.index, inline = props.inline, record = props.record, _a = props.removeButton, removeButton = _a === void 0 ? React.createElement(RemoveItemButton_1.RemoveItemButton, null) : _a, _b = props.reOrderButtons, reOrderButtons = _b === void 0 ? React.createElement(ReOrderButtons_1.ReOrderButtons, null) : _b;
    var resource = (0, ra_core_1.useResourceContext)(props);
    if (!resource) {
        throw new Error('SimpleFormIteratorItem must be used in a ResourceContextProvider or be passed a resource prop.');
    }
    var _c = (0, useSimpleFormIterator_1.useSimpleFormIterator)(), total = _c.total, reOrder = _c.reOrder, remove = _c.remove;
    // Returns a boolean to indicate whether to disable the remove button for certain fields.
    // If disableRemove is a function, then call the function with the current record to
    // determining if the button should be disabled. Otherwise, use a boolean property that
    // enables or disables the button for all of the fields.
    var disableRemoveField = function (record) {
        if (typeof disableRemove === 'boolean') {
            return disableRemove;
        }
        return disableRemove && disableRemove(record);
    };
    var context = (0, react_1.useMemo)(function () { return ({
        index: index,
        total: total,
        reOrder: function (newIndex) { return reOrder(index, newIndex); },
        remove: function () { return remove(index); },
    }); }, [index, total, reOrder, remove]);
    var label = typeof getItemLabel === 'function'
        ? getItemLabel(index)
        : getItemLabel;
    var parentSourceContext = (0, ra_core_1.useSourceContext)();
    var sourceContext = (0, react_1.useMemo)(function () { return ({
        getSource: function (source) {
            if (!source) {
                // source can be empty for scalar values, e.g.
                // <ArrayInput source="tags" /> => SourceContext is "tags"
                //   <SimpleFormIterator> => SourceContext is "tags.0"
                //      <TextInput /> => use its parent's getSource so finalSource = "tags.0"
                //   </SimpleFormIterator>
                // </ArrayInput>
                return parentSourceContext.getSource("".concat(index));
            }
            else {
                // Normal input with source, e.g.
                // <ArrayInput source="orders" /> => SourceContext is "orders"
                //   <SimpleFormIterator> => SourceContext is "orders.0"
                //      <DateInput source="date" /> => use its parent's getSource so finalSource = "orders.0.date"
                //   </SimpleFormIterator>
                // </ArrayInput>
                return parentSourceContext.getSource("".concat(index, ".").concat(source));
            }
        },
        getLabel: function (source) {
            // <ArrayInput source="orders" /> => LabelContext is "orders"
            //   <SimpleFormIterator> => LabelContext is ALSO "orders"
            //      <DateInput source="date" /> => use its parent's getLabel so finalLabel = "orders.date"
            //   </SimpleFormIterator>
            // </ArrayInput>
            //
            // we don't prefix with the index to avoid that translation keys contain it
            return parentSourceContext.getLabel(source);
        },
    }); }, [index, parentSourceContext]);
    return (React.createElement(SimpleFormIteratorItemContext_1.SimpleFormIteratorItemContext.Provider, { value: context },
        React.createElement("li", { className: useSimpleFormIteratorStyles_1.SimpleFormIteratorClasses.line, ref: ref },
            label != null && label !== false && (React.createElement(material_1.Typography, { variant: "body2", className: useSimpleFormIteratorStyles_1.SimpleFormIteratorClasses.index }, label)),
            React.createElement(ra_core_1.SourceContextProvider, { value: sourceContext },
                React.createElement(ra_core_1.RecordContextProvider, { value: record },
                    React.createElement(material_1.Stack, { className: (0, clsx_1.default)(useSimpleFormIteratorStyles_1.SimpleFormIteratorClasses.form), direction: inline
                            ? { xs: 'column', sm: 'row' }
                            : 'column', gap: inline ? 2 : 0 }, children))),
            !disabled && (React.createElement("span", { className: useSimpleFormIteratorStyles_1.SimpleFormIteratorClasses.action },
                !disableReordering && reOrderButtons,
                !disableRemoveField(record) && removeButton)))));
});
//# sourceMappingURL=SimpleFormIteratorItem.js.map