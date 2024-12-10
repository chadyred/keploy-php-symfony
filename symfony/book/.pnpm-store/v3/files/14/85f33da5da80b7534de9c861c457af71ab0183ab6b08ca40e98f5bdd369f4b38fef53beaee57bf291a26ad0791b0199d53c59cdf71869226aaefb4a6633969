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
import isEqual from 'lodash/isEqual';
import cloneDeep from 'lodash/cloneDeep';
import get from 'lodash/get';
import unset from 'lodash/unset';
import { useEffect } from 'react';
import { FormProvider, useForm } from 'react-hook-form';
import { SourceContextProvider, useResourceContext, } from '../core';
import { FormGroupsProvider, getSimpleValidationResolver, } from '.';
import { useDebouncedEvent } from '../util';
import { useListContext } from '../controller/list/useListContext';
/**
 * This component offers a convenient way to create a form that automatically
 * updates the filters when the user changes its child input values.
 *
 * It fits nicely alongside a `<FilterList>` component, but you can also use it
 * at other places to create your own filter UI.
 *
 * @example
 * import MailIcon from '@mui/icons-material/MailOutline';
 * import TitleIcon from '@mui/icons-material/Title';
 * import { Card, CardContent } from '@mui/material';
 * import * as React from 'react';
 * import {
 *     FilterLiveForm,
 *     FilterList,
 *     FilterListItem,
 *     FilterListSection,
 *     TextInput,
 * } from 'react-admin';
 *
 * export const BookListAside = () => (
 *     <Card sx={{ order: -1, mr: 2, mt: 6, width: 250, height: 'fit-content' }}>
 *         <CardContent>
 *             <FilterList label="Subscribed to newsletter" icon={<MailIcon />}>
 *                 <FilterListItem label="Yes" value={{ has_newsletter: true }} />
 *                 <FilterListItem label="No" value={{ has_newsletter: false }} />
 *             </FilterList>
 *             <FilterListSection label="Title" icon={<TitleIcon />}>
 *                 <FilterLiveForm>
 *                     <TextInput source="title" resettable helperText={false} />
 *                 </FilterLiveForm>
 *             </FilterListSection>
 *         </CardContent>
 *     </Card>
 * );
 */
export var FilterLiveForm = function (props) {
    var _a = useListContext(), filterValues = _a.filterValues, setFilters = _a.setFilters;
    var resource = useResourceContext(props);
    var _b = props.debounce, debounce = _b === void 0 ? 500 : _b, resolver = props.resolver, validate = props.validate, children = props.children, _c = props.formComponent, Component = _c === void 0 ? HTMLForm : _c, rest = __rest(props, ["debounce", "resolver", "validate", "children", "formComponent"]);
    var finalResolver = resolver
        ? resolver
        : validate
            ? getSimpleValidationResolver(validate)
            : undefined;
    var formContext = useForm(__assign({ mode: 'onChange', defaultValues: filterValues, resolver: finalResolver }, rest));
    var handleSubmit = formContext.handleSubmit, getValues = formContext.getValues, reset = formContext.reset, watch = formContext.watch, formState = formContext.formState;
    var isValid = formState.isValid;
    // Ref tracking if there are internal changes pending, i.e. changes that
    // should not trigger a reset
    var formChangesPending = React.useRef(false);
    // Reapply filterValues when they change externally
    useEffect(function () {
        var newValues = getFilterFormValues(getValues(), filterValues);
        var previousValues = getValues();
        if (formChangesPending.current) {
            // The effect was triggered by a form change (i.e. internal change),
            // so we don't need to reset the form
            formChangesPending.current = false;
            return;
        }
        if (!isEqual(newValues, previousValues)) {
            reset(newValues);
        }
        // The reference to the filterValues object is not updated when it changes,
        // so we must stringify it to compare it by value.
        // eslint-disable-next-line react-hooks/exhaustive-deps
    }, [JSON.stringify(filterValues), getValues, reset]);
    var onSubmit = function (values) {
        // Do not call setFilters if the form is invalid
        if (!isValid) {
            return;
        }
        formChangesPending.current = true;
        setFilters(__assign(__assign({}, filterValues), values));
    };
    var debouncedOnSubmit = useDebouncedEvent(onSubmit, debounce || 0);
    // Submit the form on values change
    useEffect(function () {
        var unsubscribe = watch(function (values, _a) {
            var name = _a.name;
            // Check that the name is present to avoid setting filters when
            // watch was triggered by a reset
            if (name) {
                if (get(values, name) === '') {
                    var newValues = cloneDeep(values);
                    unset(newValues, name);
                    debouncedOnSubmit(newValues);
                }
                else {
                    debouncedOnSubmit(values);
                }
            }
        }).unsubscribe;
        return function () { return unsubscribe(); };
    }, [watch, debouncedOnSubmit]);
    var sourceContext = React.useMemo(function () { return ({
        getSource: function (source) { return source; },
        getLabel: function (source) {
            return "resources.".concat(resource, ".fields.").concat(source);
        },
    }); }, [resource]);
    return (React.createElement(FormProvider, __assign({}, formContext),
        React.createElement(FormGroupsProvider, null,
            React.createElement(SourceContextProvider, { value: sourceContext },
                React.createElement(Component, { onSubmit: handleSubmit(onSubmit) }, children)))));
};
var HTMLForm = function (props) { return (React.createElement("form", __assign({}, props))); };
/**
 * Because we are using controlled inputs with react-hook-form, we must provide a default value
 * for each input when resetting the form. (see https://react-hook-form.com/docs/useform/reset).
 * To ensure we don't provide undefined which will result to the current input value being reapplied
 * and due to the dynamic nature of the filter form, we rebuild the filter form values from its current
 * values and make sure to pass at least an empty string for each input.
 */
export var getFilterFormValues = function (formValues, filterValues) {
    var _a;
    return Object.keys(formValues).reduce(function (acc, key) {
        acc[key] = getInputValue(formValues, key, filterValues);
        return acc;
    }, (_a = cloneDeep(filterValues)) !== null && _a !== void 0 ? _a : {});
};
var getInputValue = function (formValues, key, filterValues) {
    if (formValues[key] === undefined || formValues[key] === null) {
        return get(filterValues, key, '');
    }
    if (Array.isArray(formValues[key])) {
        return get(filterValues, key, '');
    }
    if (formValues[key] instanceof Date) {
        return get(filterValues, key, '');
    }
    if (typeof formValues[key] === 'object') {
        var inputValues = Object.keys(formValues[key]).reduce(function (acc, innerKey) {
            var _a;
            var nestedInputValue = getInputValue(formValues[key], innerKey, (_a = (filterValues || {})[key]) !== null && _a !== void 0 ? _a : {});
            acc[innerKey] = nestedInputValue;
            return acc;
        }, {});
        if (!Object.keys(inputValues).length)
            return '';
        return inputValues;
    }
    return get(filterValues, key, '');
};
//# sourceMappingURL=FilterLiveForm.js.map