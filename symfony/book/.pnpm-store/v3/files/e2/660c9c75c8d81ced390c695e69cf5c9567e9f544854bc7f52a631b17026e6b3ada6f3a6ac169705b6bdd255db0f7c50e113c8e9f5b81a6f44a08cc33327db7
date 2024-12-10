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
import * as React from 'react';
import { Typography } from '@mui/material';
import { styled } from '@mui/material/styles';
import ErrorIcon from '@mui/icons-material/Error';
import { useGetRecordRepresentation, useTranslate, ReferenceFieldBase, useReferenceFieldContext, useFieldValue, } from 'ra-core';
import clsx from 'clsx';
import { LinearProgress } from '../layout';
import { Link } from '../Link';
import { genericMemo } from './genericMemo';
/**
 * Fetch reference record, and render its representation, or delegate rendering to child component.
 *
 * The reference prop should be the name of one of the <Resource> components
 * added as <Admin> child.
 *
 * @example // using recordRepresentation
 * <ReferenceField label="User" source="userId" reference="users" />
 *
 * @example // using a Field component to represent the record
 * <ReferenceField label="User" source="userId" reference="users">
 *     <TextField source="name" />
 * </ReferenceField>
 *
 * @example // By default, includes a link to the <Edit> page of the related record
 * // (`/users/:userId` in the previous example).
 * // Set the `link` prop to "show" to link to the <Show> page instead.
 * <ReferenceField label="User" source="userId" reference="users" link="show" />
 *
 * @example // You can also prevent `<ReferenceField>` from adding link to children
 * // by setting `link` to false.
 * <ReferenceField label="User" source="userId" reference="users" link={false} />
 *
 * @example // Alternatively, you can also pass a custom function to `link`.
 * // It must take reference and record as arguments and return a string
 * <ReferenceField label="User" source="userId" reference="users" link={(record, reference) => "/path/to/${reference}/${record}"} />
 *
 * @default
 * In previous versions of React-Admin, the prop `linkType` was used. It is now deprecated and replaced with `link`. However
 * backward-compatibility is still kept
 */
export var ReferenceField = function (props) {
    var emptyText = props.emptyText;
    var translate = useTranslate();
    var id = useFieldValue(props);
    if (id == null) {
        return emptyText ? (React.createElement(Typography, { component: "span", variant: "body2" }, emptyText && translate(emptyText, { _: emptyText }))) : null;
    }
    return (React.createElement(ReferenceFieldBase, __assign({}, props),
        React.createElement(PureReferenceFieldView, __assign({}, props))));
};
// useful to prevent click bubbling in a datagrid with rowClick
var stopPropagation = function (e) { return e.stopPropagation(); };
export var ReferenceFieldView = function (props) {
    var children = props.children, className = props.className, emptyText = props.emptyText, reference = props.reference, sx = props.sx;
    var _a = useReferenceFieldContext(), error = _a.error, link = _a.link, isLoading = _a.isLoading, referenceRecord = _a.referenceRecord;
    var getRecordRepresentation = useGetRecordRepresentation(reference);
    var translate = useTranslate();
    if (error) {
        return (
        /* eslint-disable jsx-a11y/role-supports-aria-props */
        React.createElement(ErrorIcon, { "aria-errormessage": error.message ? error.message : error, role: "presentation", color: "error", fontSize: "small" })
        /* eslint-enable */
        );
    }
    // We explicitly check isLoading here as the record may not have an id for the reference,
    // in which case, the query will not be enabled and isPending will be true
    // isLoading checks that we are actually loading the reference record
    if (isLoading) {
        return React.createElement(LinearProgress, null);
    }
    if (!referenceRecord) {
        return emptyText ? (React.createElement(Typography, { component: "span", variant: "body2" }, emptyText && translate(emptyText, { _: emptyText }))) : null;
    }
    var child = children || (React.createElement(Typography, { component: "span", variant: "body2" }, getRecordRepresentation(referenceRecord)));
    if (link) {
        return (React.createElement(Root, { className: clsx(ReferenceFieldClasses.root, className), sx: sx },
            React.createElement(Link, { to: link, className: ReferenceFieldClasses.link, onClick: stopPropagation, state: { _scrollToTop: true } }, child)));
    }
    return (React.createElement(Root, { className: clsx(ReferenceFieldClasses.root, className), sx: sx }, child));
};
var PureReferenceFieldView = genericMemo(ReferenceFieldView);
var PREFIX = 'RaReferenceField';
export var ReferenceFieldClasses = {
    root: "".concat(PREFIX, "-root"),
    link: "".concat(PREFIX, "-link"),
};
var Root = styled('span', {
    name: PREFIX,
    overridesResolver: function (props, styles) { return styles.root; },
})(function (_a) {
    var _b;
    var theme = _a.theme;
    return (_b = {
            lineHeight: 'initial'
        },
        _b["& .".concat(ReferenceFieldClasses.link)] = {
            '& > *': {
                color: theme.palette.primary.main,
            },
        },
        _b);
});
//# sourceMappingURL=ReferenceField.js.map