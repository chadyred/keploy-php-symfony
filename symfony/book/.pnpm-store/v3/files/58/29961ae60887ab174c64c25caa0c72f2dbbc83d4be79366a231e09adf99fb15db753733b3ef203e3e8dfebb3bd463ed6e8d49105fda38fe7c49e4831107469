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
import React, { useMemo } from 'react';
import { Typography } from '@mui/material';
import { useReferenceOneFieldController, useRecordContext, ResourceContextProvider, useGetPathForRecord, useTranslate, RecordContextProvider, ReferenceFieldContextProvider, } from 'ra-core';
import { ReferenceFieldView } from './ReferenceField';
/**
 * Render the related record in a one-to-one relationship
 *
 * Expects a single field as child
 *
 * @example // display the bio of the current author
 * <ReferenceOneField reference="bios" target="author_id">
 *     <TextField source="body" />
 * </ReferenceOneField>
 */
export var ReferenceOneField = function (props) {
    var children = props.children, reference = props.reference, _a = props.source, source = _a === void 0 ? 'id' : _a, target = props.target, emptyText = props.emptyText, sort = props.sort, filter = props.filter, link = props.link, queryOptions = props.queryOptions;
    var record = useRecordContext(props);
    var translate = useTranslate();
    var controllerProps = useReferenceOneFieldController({
        record: record,
        reference: reference,
        source: source,
        target: target,
        sort: sort,
        filter: filter,
        queryOptions: queryOptions,
    });
    var path = useGetPathForRecord({
        record: controllerProps.referenceRecord,
        resource: reference,
        link: link,
    });
    var context = useMemo(function () { return (__assign(__assign({}, controllerProps), { link: path })); }, [controllerProps, path]);
    return !record ||
        (!controllerProps.isPending &&
            controllerProps.referenceRecord == null) ? (emptyText ? (React.createElement(Typography, { component: "span", variant: "body2" }, emptyText && translate(emptyText, { _: emptyText }))) : null) : (React.createElement(ResourceContextProvider, { value: reference },
        React.createElement(ReferenceFieldContextProvider, { value: context },
            React.createElement(RecordContextProvider, { value: context.referenceRecord },
                React.createElement(ReferenceFieldView, { reference: reference, source: source }, children)))));
};
// disable sorting on this field by default as its default source prop ('id')
// will match the default sort ({ field: 'id', order: 'DESC'})
// leading to an incorrect sort indicator in a datagrid header
ReferenceOneField.sortable = false;
//# sourceMappingURL=ReferenceOneField.js.map