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
exports.useReferenceManyFieldController = void 0;
var react_1 = require("react");
var get_1 = __importDefault(require("lodash/get"));
var isEqual_1 = __importDefault(require("lodash/isEqual"));
var debounce_1 = __importDefault(require("lodash/debounce"));
var util_1 = require("../../util");
var dataProvider_1 = require("../../dataProvider");
var notification_1 = require("../../notification");
var usePaginationState_1 = __importDefault(require("../usePaginationState"));
var useRecordSelection_1 = require("../list/useRecordSelection");
var useSortState_1 = __importDefault(require("../useSortState"));
var core_1 = require("../../core");
/**
 * Fetch reference records, and return them when available
 *
 * Uses dataProvider.getManyReference() internally.
 *
 * @example // fetch the comments related to the current post
 * const { isPending, data } = useReferenceManyFieldController({
 *     reference: 'comments',
 *     target: 'post_id',
 *     record: { id: 123, title: 'hello, world' },
 *     resource: 'posts',
 * });
 *
 * @param {Object} props
 * @param {string} props.reference The linked resource name. Required.
 * @param {string} props.target The target resource key. Required.
 * @param {Object} props.filter The filter applied on the recorded records list
 * @param {number} props.page the page number
 * @param {number} props.perPage the number of item per page
 * @param {Object} props.record The current resource record
 * @param {string} props.resource The current resource name
 * @param {Object} props.sort the sort to apply to the referenced records
 * @param {string} props.source The key of the linked resource identifier
 * @param {UseQuery Options} props.queryOptions `react-query` options`
 *
 * @returns {ListControllerResult} The reference many props
 */
var useReferenceManyFieldController = function (props) {
    var _a;
    var _b = props.debounce, debounce = _b === void 0 ? 500 : _b, reference = props.reference, record = props.record, target = props.target, _c = props.filter, filter = _c === void 0 ? defaultFilter : _c, _d = props.source, source = _d === void 0 ? 'id' : _d, initialPage = props.page, initialPerPage = props.perPage, _e = props.sort, initialSort = _e === void 0 ? { field: 'id', order: 'DESC' } : _e, _f = props.queryOptions, queryOptions = _f === void 0 ? {} : _f;
    var notify = (0, notification_1.useNotify)();
    var resource = (0, core_1.useResourceContext)(props);
    var storeKey = (_a = props.storeKey) !== null && _a !== void 0 ? _a : "".concat(resource, ".").concat(record === null || record === void 0 ? void 0 : record.id, ".").concat(reference);
    var meta = queryOptions.meta, otherQueryOptions = __rest(queryOptions, ["meta"]);
    // pagination logic
    var _g = (0, usePaginationState_1.default)({
        page: initialPage,
        perPage: initialPerPage,
    }), page = _g.page, setPage = _g.setPage, perPage = _g.perPage, setPerPage = _g.setPerPage;
    // sort logic
    var _h = (0, useSortState_1.default)(initialSort), sort = _h.sort, setSortState = _h.setSort;
    var setSort = (0, react_1.useCallback)(function (sort) {
        setSortState(sort);
        setPage(1);
    }, [setPage, setSortState]);
    // selection logic
    var _j = (0, useRecordSelection_1.useRecordSelection)({
        resource: storeKey,
    }), selectedIds = _j[0], selectionModifiers = _j[1];
    // filter logic
    var filterRef = (0, react_1.useRef)(filter);
    var _k = (0, react_1.useState)({}), displayedFilters = _k[0], setDisplayedFilters = _k[1];
    var _l = (0, react_1.useState)(filter), filterValues = _l[0], setFilterValues = _l[1];
    var hideFilter = (0, react_1.useCallback)(function (filterName) {
        setDisplayedFilters(function (previousState) {
            var _a = previousState, _b = filterName, _ = _a[_b], newState = __rest(_a, [typeof _b === "symbol" ? _b : _b + ""]);
            return newState;
        });
        setFilterValues(function (previousState) {
            var _a = previousState, _b = filterName, _ = _a[_b], newState = __rest(_a, [typeof _b === "symbol" ? _b : _b + ""]);
            return newState;
        });
    }, [setDisplayedFilters, setFilterValues]);
    var showFilter = (0, react_1.useCallback)(function (filterName, defaultValue) {
        setDisplayedFilters(function (previousState) {
            var _a;
            return (__assign(__assign({}, previousState), (_a = {}, _a[filterName] = true, _a)));
        });
        setFilterValues(function (previousState) {
            var _a;
            return (__assign(__assign({}, previousState), (_a = {}, _a[filterName] = defaultValue, _a)));
        });
    }, [setDisplayedFilters, setFilterValues]);
    // eslint-disable-next-line react-hooks/exhaustive-deps
    var debouncedSetFilters = (0, react_1.useCallback)((0, debounce_1.default)(function (filters, displayedFilters) {
        setFilterValues((0, util_1.removeEmpty)(filters));
        setDisplayedFilters(displayedFilters);
        setPage(1);
    }, debounce), [setDisplayedFilters, setFilterValues, setPage]);
    var setFilters = (0, react_1.useCallback)(function (filters, displayedFilters, debounce) {
        if (debounce === void 0) { debounce = false; }
        if (debounce) {
            debouncedSetFilters(filters, displayedFilters);
        }
        else {
            setFilterValues((0, util_1.removeEmpty)(filters));
            setDisplayedFilters(displayedFilters);
            setPage(1);
        }
    }, [setDisplayedFilters, setFilterValues, setPage, debouncedSetFilters]);
    // handle filter prop change
    (0, react_1.useEffect)(function () {
        if (!(0, isEqual_1.default)(filter, filterRef.current)) {
            filterRef.current = filter;
            setFilterValues(filter);
        }
    }, [filter]);
    var _m = (0, dataProvider_1.useGetManyReference)(reference, {
        target: target,
        id: (0, get_1.default)(record, source),
        pagination: { page: page, perPage: perPage },
        sort: sort,
        filter: filterValues,
        meta: meta,
    }, __assign({ enabled: (0, get_1.default)(record, source) != null, placeholderData: function (previousData) { return previousData; }, onError: function (error) {
            return notify(typeof error === 'string'
                ? error
                : error.message || 'ra.notification.http_error', {
                type: 'error',
                messageArgs: {
                    _: typeof error === 'string'
                        ? error
                        : error && error.message
                            ? error.message
                            : undefined,
                },
            });
        } }, otherQueryOptions)), data = _m.data, total = _m.total, responseMeta = _m.meta, pageInfo = _m.pageInfo, error = _m.error, isFetching = _m.isFetching, isLoading = _m.isLoading, isPending = _m.isPending, refetch = _m.refetch;
    return {
        sort: sort,
        data: data,
        meta: responseMeta,
        defaultTitle: undefined,
        displayedFilters: displayedFilters,
        error: error,
        filterValues: filterValues,
        hideFilter: hideFilter,
        isFetching: isFetching,
        isLoading: isLoading,
        isPending: isPending,
        onSelect: selectionModifiers.select,
        onToggleItem: selectionModifiers.toggle,
        onUnselectItems: selectionModifiers.clearSelection,
        page: page,
        perPage: perPage,
        refetch: refetch,
        resource: reference,
        selectedIds: selectedIds,
        setFilters: setFilters,
        setPage: setPage,
        setPerPage: setPerPage,
        hasNextPage: pageInfo
            ? pageInfo.hasNextPage
            : total != null
                ? page * perPage < total
                : undefined,
        hasPreviousPage: pageInfo ? pageInfo.hasPreviousPage : page > 1,
        setSort: setSort,
        showFilter: showFilter,
        total: total,
    };
};
exports.useReferenceManyFieldController = useReferenceManyFieldController;
var defaultFilter = {};
//# sourceMappingURL=useReferenceManyFieldController.js.map