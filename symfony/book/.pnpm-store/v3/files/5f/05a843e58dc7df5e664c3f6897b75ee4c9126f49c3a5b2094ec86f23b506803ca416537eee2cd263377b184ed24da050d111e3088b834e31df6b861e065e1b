"use strict";
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
exports.ReferenceFieldClasses = exports.ReferenceFieldView = exports.ReferenceField = void 0;
var React = __importStar(require("react"));
var material_1 = require("@mui/material");
var styles_1 = require("@mui/material/styles");
var Error_1 = __importDefault(require("@mui/icons-material/Error"));
var ra_core_1 = require("ra-core");
var clsx_1 = __importDefault(require("clsx"));
var layout_1 = require("../layout");
var Link_1 = require("../Link");
var genericMemo_1 = require("./genericMemo");
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
var ReferenceField = function (props) {
    var emptyText = props.emptyText;
    var translate = (0, ra_core_1.useTranslate)();
    var id = (0, ra_core_1.useFieldValue)(props);
    if (id == null) {
        return emptyText ? (React.createElement(material_1.Typography, { component: "span", variant: "body2" }, emptyText && translate(emptyText, { _: emptyText }))) : null;
    }
    return (React.createElement(ra_core_1.ReferenceFieldBase, __assign({}, props),
        React.createElement(PureReferenceFieldView, __assign({}, props))));
};
exports.ReferenceField = ReferenceField;
// useful to prevent click bubbling in a datagrid with rowClick
var stopPropagation = function (e) { return e.stopPropagation(); };
var ReferenceFieldView = function (props) {
    var children = props.children, className = props.className, emptyText = props.emptyText, reference = props.reference, sx = props.sx;
    var _a = (0, ra_core_1.useReferenceFieldContext)(), error = _a.error, link = _a.link, isLoading = _a.isLoading, referenceRecord = _a.referenceRecord;
    var getRecordRepresentation = (0, ra_core_1.useGetRecordRepresentation)(reference);
    var translate = (0, ra_core_1.useTranslate)();
    if (error) {
        return (
        /* eslint-disable jsx-a11y/role-supports-aria-props */
        React.createElement(Error_1.default, { "aria-errormessage": error.message ? error.message : error, role: "presentation", color: "error", fontSize: "small" })
        /* eslint-enable */
        );
    }
    // We explicitly check isLoading here as the record may not have an id for the reference,
    // in which case, the query will not be enabled and isPending will be true
    // isLoading checks that we are actually loading the reference record
    if (isLoading) {
        return React.createElement(layout_1.LinearProgress, null);
    }
    if (!referenceRecord) {
        return emptyText ? (React.createElement(material_1.Typography, { component: "span", variant: "body2" }, emptyText && translate(emptyText, { _: emptyText }))) : null;
    }
    var child = children || (React.createElement(material_1.Typography, { component: "span", variant: "body2" }, getRecordRepresentation(referenceRecord)));
    if (link) {
        return (React.createElement(Root, { className: (0, clsx_1.default)(exports.ReferenceFieldClasses.root, className), sx: sx },
            React.createElement(Link_1.Link, { to: link, className: exports.ReferenceFieldClasses.link, onClick: stopPropagation, state: { _scrollToTop: true } }, child)));
    }
    return (React.createElement(Root, { className: (0, clsx_1.default)(exports.ReferenceFieldClasses.root, className), sx: sx }, child));
};
exports.ReferenceFieldView = ReferenceFieldView;
var PureReferenceFieldView = (0, genericMemo_1.genericMemo)(exports.ReferenceFieldView);
var PREFIX = 'RaReferenceField';
exports.ReferenceFieldClasses = {
    root: "".concat(PREFIX, "-root"),
    link: "".concat(PREFIX, "-link"),
};
var Root = (0, styles_1.styled)('span', {
    name: PREFIX,
    overridesResolver: function (props, styles) { return styles.root; },
})(function (_a) {
    var _b;
    var theme = _a.theme;
    return (_b = {
            lineHeight: 'initial'
        },
        _b["& .".concat(exports.ReferenceFieldClasses.link)] = {
            '& > *': {
                color: theme.palette.primary.main,
            },
        },
        _b);
});
//# sourceMappingURL=ReferenceField.js.map