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
import React from 'react';
import { ResourceContextProvider } from '../../core';
import { ChoicesContextProvider } from '../../form';
import { useReferenceInputController, } from './useReferenceInputController';
/**
 * An Input component for choosing a reference record. Useful for foreign keys.
 *
 * This component fetches the possible values in the reference resource
 * (using `dataProvider.getList()`), and renders the child you passed
 * to which it passes the possible choices via a `ChoicesContext`.
 *
 * You must pass a child selection component to customize the way the reference
 * selector is displayed (e.g. using `<SelectInput>` or `<RadioButtonGroupInput>`
 * instead of `<AutocompleteInput>` ).
 *
 * Note that the child component should handle the error and loading cases as this base component does not.
 *
 * @example // using a SelectInput as selector
 * export const CommentEdit = () => (
 *     <Edit>
 *         <SimpleForm>
 *             <ReferenceInputBase label="Post" source="post_id" reference="posts">
 *                 <SelectInput optionText="title" />
 *             </ReferenceInputBase>
 *         </SimpleForm>
 *     </Edit>
 * );
 *
 * By default, restricts the possible values to 25. You can extend this limit
 * by setting the `perPage` prop.
 *
 * @example
 * <ReferenceInputBase source="post_id" reference="posts" perPage={100}/>
 *
 * By default, orders the possible values by id desc. You can change this order
 * by setting the `sort` prop (an object with `field` and `order` properties).
 *
 * @example
 * <ReferenceInputBase
 *      source="post_id"
 *      reference="posts"
 *      sort={{ field: 'title', order: 'ASC' }}
 * >
 *     <SelectInput optionText="title" />
 * </ReferenceInputBase>
 *
 * Also, you can filter the query used to populate the possible values. Use the
 * `filter` prop for that.
 *
 * @example
 * <ReferenceInputBase
 *      source="post_id"
 *      reference="posts"
 *      filter={{ is_published: true }}
 * >
 *      <SelectInput optionText="title" />
 * </ReferenceInputBase>
 *
 * The enclosed component may filter results. ReferenceInputBase create a ChoicesContext which provides
 * a `setFilters` function. You can call this function to filter the results.
 */
export var ReferenceInputBase = function (props) {
    var children = props.children, reference = props.reference, _a = props.sort, sort = _a === void 0 ? { field: 'id', order: 'DESC' } : _a, _b = props.filter, filter = _b === void 0 ? {} : _b;
    var controllerProps = useReferenceInputController(__assign(__assign({}, props), { sort: sort, filter: filter }));
    return (React.createElement(ResourceContextProvider, { value: reference },
        React.createElement(ChoicesContextProvider, { value: controllerProps }, children)));
};
//# sourceMappingURL=ReferenceInputBase.js.map