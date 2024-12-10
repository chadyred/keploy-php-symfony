import * as React from 'react';
import { useMemo } from 'react';
import { Typography, Stack } from '@mui/material';
import clsx from 'clsx';
import { RecordContextProvider, SourceContextProvider, useResourceContext, useSourceContext, } from 'ra-core';
import { SimpleFormIteratorClasses } from './useSimpleFormIteratorStyles';
import { useSimpleFormIterator } from './useSimpleFormIterator';
import { SimpleFormIteratorItemContext, } from './SimpleFormIteratorItemContext';
import { RemoveItemButton as DefaultRemoveItemButton } from './RemoveItemButton';
import { ReOrderButtons as DefaultReOrderButtons } from './ReOrderButtons';
export var SimpleFormIteratorItem = React.forwardRef(function (props, ref) {
    var children = props.children, disabled = props.disabled, disableReordering = props.disableReordering, disableRemove = props.disableRemove, getItemLabel = props.getItemLabel, index = props.index, inline = props.inline, record = props.record, _a = props.removeButton, removeButton = _a === void 0 ? React.createElement(DefaultRemoveItemButton, null) : _a, _b = props.reOrderButtons, reOrderButtons = _b === void 0 ? React.createElement(DefaultReOrderButtons, null) : _b;
    var resource = useResourceContext(props);
    if (!resource) {
        throw new Error('SimpleFormIteratorItem must be used in a ResourceContextProvider or be passed a resource prop.');
    }
    var _c = useSimpleFormIterator(), total = _c.total, reOrder = _c.reOrder, remove = _c.remove;
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
    var context = useMemo(function () { return ({
        index: index,
        total: total,
        reOrder: function (newIndex) { return reOrder(index, newIndex); },
        remove: function () { return remove(index); },
    }); }, [index, total, reOrder, remove]);
    var label = typeof getItemLabel === 'function'
        ? getItemLabel(index)
        : getItemLabel;
    var parentSourceContext = useSourceContext();
    var sourceContext = useMemo(function () { return ({
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
    return (React.createElement(SimpleFormIteratorItemContext.Provider, { value: context },
        React.createElement("li", { className: SimpleFormIteratorClasses.line, ref: ref },
            label != null && label !== false && (React.createElement(Typography, { variant: "body2", className: SimpleFormIteratorClasses.index }, label)),
            React.createElement(SourceContextProvider, { value: sourceContext },
                React.createElement(RecordContextProvider, { value: record },
                    React.createElement(Stack, { className: clsx(SimpleFormIteratorClasses.form), direction: inline
                            ? { xs: 'column', sm: 'row' }
                            : 'column', gap: inline ? 2 : 0 }, children))),
            !disabled && (React.createElement("span", { className: SimpleFormIteratorClasses.action },
                !disableReordering && reOrderButtons,
                !disableRemoveField(record) && removeButton)))));
});
//# sourceMappingURL=SimpleFormIteratorItem.js.map