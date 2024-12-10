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
import { useCallback, useEffect, useRef, useState } from 'react';
import get from 'lodash/get';
import isEqual from 'lodash/isEqual';
import { removeEmpty } from '../../util';
import { useResourceContext } from '../../core';
import usePaginationState from '../usePaginationState';
import useSortState from '../useSortState';
import { useRecordSelection } from './useRecordSelection';
import { flattenObject } from '../../dataProvider/fetch';
var refetch = function () {
    throw new Error('refetch is not available for a ListContext built from useList based on local data');
};
/**
 * Handle filtering, sorting and pagination on local data.
 *
 * Returns the data and callbacks expected by <ListContext>.
 *
 * @example
 * const data = [
 *     { id: 1, name: 'Arnold' },
 *     { id: 2, name: 'Sylvester' },
 *     { id: 3, name: 'Jean-Claude' },
 * ]
 *
 * const MyComponent = () => {
 *     const listContext = useList({ data });
 *     return (
 *         <ListContextProvider value={listContext}>
 *             <Datagrid>
 *                 <TextField source="id" />
 *                 <TextField source="name" />
 *             </Datagrid>
 *         </ListContextProvider>
 *     );
 * };
 *
 * @param {UseListOptions} props
 * @param {RaRecord[]} props.data An array of records
 * @param {Boolean} props.isFetching: Optional. A boolean indicating whether the data is being loaded
 * @param {Boolean} props.isLoading: Optional. A boolean indicating whether the data has been loaded at least once
 * @param {Error | String} props.error: Optional. The error if any occurred while loading the data
 * @param {Object} props.filter: Optional. An object containing the filters applied on the data
 * @param {Number} props.page: Optional. The initial page index
 * @param {Number} props.perPage: Optional. The initial page size
 * @param {SortPayload} props.sort: Optional. The initial sort (field and order)
 * @param {filterCallback} prop.filterCallback Optional. A function that allows you to make a custom filter
 */
export var useList = function (props) {
    var _a;
    var data = props.data, error = props.error, _b = props.filter, filter = _b === void 0 ? defaultFilter : _b, _c = props.isFetching, isFetching = _c === void 0 ? false : _c, _d = props.isLoading, isLoading = _d === void 0 ? false : _d, _e = props.isPending, isPending = _e === void 0 ? false : _e, _f = props.page, initialPage = _f === void 0 ? 1 : _f, _g = props.perPage, initialPerPage = _g === void 0 ? 1000 : _g, initialSort = props.sort, _h = props.filterCallback, filterCallback = _h === void 0 ? function (record) { return Boolean(record); } : _h;
    var resource = useResourceContext(props);
    var _j = useState(isFetching), fetchingState = _j[0], setFetchingState = _j[1];
    var _k = useState(isLoading), loadingState = _k[0], setLoadingState = _k[1];
    var _l = useState(isPending), pendingState = _l[0], setPendingState = _l[1];
    var _m = useState(function () { return ({
        data: data,
        total: data ? data.length : undefined,
    }); }), finalItems = _m[0], setFinalItems = _m[1];
    // pagination logic
    var _o = usePaginationState({
        page: initialPage,
        perPage: initialPerPage,
    }), page = _o.page, setPage = _o.setPage, perPage = _o.perPage, setPerPage = _o.setPerPage;
    // sort logic
    var _p = useSortState(initialSort), sort = _p.sort, setSortState = _p.setSort;
    var setSort = useCallback(function (sort) {
        setSortState(sort);
        setPage(1);
    }, [setPage, setSortState]);
    // selection logic
    var _q = useRecordSelection(resource
        ? {
            resource: resource,
        }
        : { disableSyncWithStore: true }), selectedIds = _q[0], selectionModifiers = _q[1];
    // filter logic
    var filterRef = useRef(filter);
    var _r = useState({}), displayedFilters = _r[0], setDisplayedFilters = _r[1];
    var _s = useState(filter), filterValues = _s[0], setFilterValues = _s[1];
    var hideFilter = useCallback(function (filterName) {
        setDisplayedFilters(function (previousState) {
            var _a = previousState, _b = filterName, _ = _a[_b], newState = __rest(_a, [typeof _b === "symbol" ? _b : _b + ""]);
            return newState;
        });
        setFilterValues(function (previousState) {
            var _a = previousState, _b = filterName, _ = _a[_b], newState = __rest(_a, [typeof _b === "symbol" ? _b : _b + ""]);
            return newState;
        });
    }, [setDisplayedFilters, setFilterValues]);
    var showFilter = useCallback(function (filterName, defaultValue) {
        setDisplayedFilters(function (previousState) {
            var _a;
            return (__assign(__assign({}, previousState), (_a = {}, _a[filterName] = true, _a)));
        });
        setFilterValues(function (previousState) {
            var _a;
            return removeEmpty(__assign(__assign({}, previousState), (_a = {}, _a[filterName] = defaultValue, _a)));
        });
    }, [setDisplayedFilters, setFilterValues]);
    var setFilters = useCallback(function (filters, displayedFilters) {
        if (displayedFilters === void 0) { displayedFilters = undefined; }
        setFilterValues(removeEmpty(filters));
        if (displayedFilters) {
            setDisplayedFilters(displayedFilters);
        }
        setPage(1);
    }, [setDisplayedFilters, setFilterValues, setPage]);
    // handle filter prop change
    useEffect(function () {
        if (!isEqual(filter, filterRef.current)) {
            filterRef.current = filter;
            setFilterValues(filter);
        }
    }, [filter]);
    // We do all the data processing (filtering, sorting, paginating) client-side
    useEffect(function () {
        if (isPending || !data)
            return;
        var tempData = data;
        // 1. filter
        if (filterValues) {
            var flattenFilterValues_1 = flattenObject(filterValues);
            tempData = data
                .filter(function (record) {
                return Object.entries(flattenFilterValues_1).every(function (_a) {
                    var filterName = _a[0], filterValue = _a[1];
                    var recordValue = get(record, filterName);
                    var result = Array.isArray(recordValue)
                        ? Array.isArray(filterValue)
                            ? recordValue.some(function (item) {
                                return filterValue.includes(item);
                            })
                            : recordValue.includes(filterValue)
                        : Array.isArray(filterValue)
                            ? filterValue.includes(recordValue)
                            : filterName === 'q' // special full-text filter
                                ? Object.keys(record).some(function (key) {
                                    return typeof record[key] ===
                                        'string' &&
                                        record[key]
                                            .toLowerCase()
                                            .includes(filterValue.toLowerCase());
                                })
                                : filterValue == recordValue; // eslint-disable-line eqeqeq
                    return result;
                });
            })
                .filter(filterCallback);
        }
        var filteredLength = tempData.length;
        // 2. sort
        if (sort.field) {
            tempData = tempData.sort(function (a, b) {
                if (get(a, sort.field) > get(b, sort.field)) {
                    return sort.order === 'ASC' ? 1 : -1;
                }
                if (get(a, sort.field) < get(b, sort.field)) {
                    return sort.order === 'ASC' ? -1 : 1;
                }
                return 0;
            });
        }
        // 3. paginate
        tempData = tempData.slice((page - 1) * perPage, page * perPage);
        setFinalItems({
            data: tempData,
            total: filteredLength,
        });
    }, // eslint-disable-next-line react-hooks/exhaustive-deps
    [
        // eslint-disable-next-line react-hooks/exhaustive-deps
        JSON.stringify(data),
        filterValues,
        isPending,
        page,
        perPage,
        setFinalItems,
        sort.field,
        sort.order,
    ]);
    useEffect(function () {
        if (isFetching !== fetchingState) {
            setFetchingState(isFetching);
        }
    }, [isFetching, fetchingState, setFetchingState]);
    useEffect(function () {
        if (isLoading !== loadingState) {
            setLoadingState(isLoading);
        }
    }, [isLoading, loadingState, setLoadingState]);
    useEffect(function () {
        if (isPending !== pendingState) {
            setPendingState(isPending);
        }
    }, [isPending, pendingState, setPendingState]);
    return {
        sort: sort,
        data: pendingState ? undefined : (_a = finalItems === null || finalItems === void 0 ? void 0 : finalItems.data) !== null && _a !== void 0 ? _a : [],
        defaultTitle: '',
        error: error !== null && error !== void 0 ? error : null,
        displayedFilters: displayedFilters,
        filterValues: filterValues,
        hasNextPage: (finalItems === null || finalItems === void 0 ? void 0 : finalItems.total) == null
            ? false
            : page * perPage < finalItems.total,
        hasPreviousPage: page > 1,
        hideFilter: hideFilter,
        isFetching: fetchingState,
        isLoading: loadingState,
        isPending: pendingState,
        onSelect: selectionModifiers.select,
        onToggleItem: selectionModifiers.toggle,
        onUnselectItems: selectionModifiers.clearSelection,
        page: page,
        perPage: perPage,
        resource: '',
        refetch: refetch,
        selectedIds: selectedIds,
        setFilters: setFilters,
        setPage: setPage,
        setPerPage: setPerPage,
        setSort: setSort,
        showFilter: showFilter,
        total: finalItems === null || finalItems === void 0 ? void 0 : finalItems.total,
    };
};
var defaultFilter = {};
//# sourceMappingURL=useList.js.map