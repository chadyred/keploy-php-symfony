"use strict";
var __importDefault = (this && this.__importDefault) || function (mod) {
    return (mod && mod.__esModule) ? mod : { "default": mod };
};
Object.defineProperty(exports, "__esModule", { value: true });
exports.ReferenceManyField = void 0;
var react_1 = __importDefault(require("react"));
var ra_core_1 = require("ra-core");
/**
 * Render related records to the current one.
 *
 * You must define the fields to be passed to the iterator component as children.
 *
 * @example Display all the comments of the current post as a datagrid
 * <ReferenceManyField reference="comments" target="post_id">
 *     <Datagrid>
 *         <TextField source="id" />
 *         <TextField source="body" />
 *         <DateField source="created_at" />
 *         <EditButton />
 *     </Datagrid>
 * </ReferenceManyField>
 *
 * @example Display all the books by the current author, only the title
 * <ReferenceManyField reference="books" target="author_id">
 *     <SingleFieldList>
 *         <ChipField source="title" />
 *     </SingleFieldList>
 * </ReferenceManyField>
 *
 * By default, restricts the displayed values to 25. You can extend this limit
 * by setting the `perPage` prop.
 *
 * @example
 * <ReferenceManyField perPage={10} reference="comments" target="post_id">
 *    ...
 * </ReferenceManyField>
 *
 * By default, orders the possible values by id desc. You can change this order
 * by setting the `sort` prop (an object with `field` and `order` properties).
 *
 * @example
 * <ReferenceManyField sort={{ field: 'created_at', order: 'DESC' }} reference="comments" target="post_id">
 *    ...
 * </ReferenceManyField>
 *
 * Also, you can filter the query used to populate the possible values. Use the
 * `filter` prop for that.
 *
 * @example
 * <ReferenceManyField filter={{ is_published: true }} reference="comments" target="post_id">
 *    ...
 * </ReferenceManyField>
 */
var ReferenceManyField = function (props) {
    var children = props.children, debounce = props.debounce, _a = props.filter, filter = _a === void 0 ? defaultFilter : _a, _b = props.page, page = _b === void 0 ? 1 : _b, _c = props.pagination, pagination = _c === void 0 ? null : _c, _d = props.perPage, perPage = _d === void 0 ? 25 : _d, reference = props.reference, resource = props.resource, _e = props.sort, sort = _e === void 0 ? defaultSort : _e, _f = props.source, source = _f === void 0 ? 'id' : _f, storeKey = props.storeKey, target = props.target, queryOptions = props.queryOptions;
    var record = (0, ra_core_1.useRecordContext)(props);
    var controllerProps = (0, ra_core_1.useReferenceManyFieldController)({
        debounce: debounce,
        filter: filter,
        page: page,
        perPage: perPage,
        record: record,
        reference: reference,
        resource: resource,
        sort: sort,
        source: source,
        storeKey: storeKey,
        target: target,
        queryOptions: queryOptions,
    });
    return (react_1.default.createElement(ra_core_1.ResourceContextProvider, { value: reference },
        react_1.default.createElement(ra_core_1.ListContextProvider, { value: controllerProps },
            children,
            pagination)));
};
exports.ReferenceManyField = ReferenceManyField;
var defaultFilter = {};
var defaultSort = { field: 'id', order: 'DESC' };
//# sourceMappingURL=ReferenceManyField.js.map