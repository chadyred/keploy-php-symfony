"use strict";
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
Object.defineProperty(exports, "__esModule", { value: true });
exports.useChoicesContext = void 0;
var react_1 = require("react");
var controller_1 = require("../../controller");
var ChoicesContext_1 = require("./ChoicesContext");
var useChoicesContext = function (options) {
    var _a, _b, _c;
    if (options === void 0) { options = {}; }
    var context = (0, react_1.useContext)(ChoicesContext_1.ChoicesContext);
    var choices = options.choices && isArrayOfStrings(options.choices)
        ? convertOptionsToChoices(options.choices)
        : options.choices;
    // @ts-ignore cannot satisfy the type of useList because of ability to pass partial options
    var _d = (0, controller_1.useList)({
        data: choices,
        isLoading: (_a = options.isLoading) !== null && _a !== void 0 ? _a : false,
        isPending: (_b = options.isPending) !== null && _b !== void 0 ? _b : false,
        isFetching: (_c = options.isFetching) !== null && _c !== void 0 ? _c : false,
        error: options.error,
        // When not in a ChoicesContext, paginating does not make sense (e.g. AutocompleteInput).
        perPage: Infinity,
    }), data = _d.data, list = __rest(_d, ["data"]);
    var result = (0, react_1.useMemo)(function () {
        var _a, _b, _c, _d, _e, _f, _g, _h, _j, _k, _l, _m, _o, _p, _q, _r, _s, _t, _u, _v, _w, _x;
        // Props take precedence over context.
        if (options.choices || !context) {
            return {
                allChoices: data,
                availableChoices: (_a = options.availableChoices) !== null && _a !== void 0 ? _a : data,
                selectedChoices: (_b = options.selectedChoices) !== null && _b !== void 0 ? _b : data,
                displayedFilters: (_c = options.selectedChoices) !== null && _c !== void 0 ? _c : list.displayedFilters,
                error: options.error,
                filter: (_d = options.filter) !== null && _d !== void 0 ? _d : list.filter,
                filterValues: (_e = options.filterValues) !== null && _e !== void 0 ? _e : list.filterValues,
                hasNextPage: (_f = options.hasNextPage) !== null && _f !== void 0 ? _f : list.hasNextPage,
                hasPreviousPage: (_g = options.hasPreviousPage) !== null && _g !== void 0 ? _g : list.hasPreviousPage,
                hideFilter: (_h = options.hideFilter) !== null && _h !== void 0 ? _h : list.hideFilter,
                isLoading: (_j = list.isLoading) !== null && _j !== void 0 ? _j : false,
                isPending: (_k = list.isPending) !== null && _k !== void 0 ? _k : false,
                isFetching: (_l = list.isFetching) !== null && _l !== void 0 ? _l : false,
                page: (_m = options.page) !== null && _m !== void 0 ? _m : list.page,
                perPage: (_o = options.perPage) !== null && _o !== void 0 ? _o : list.perPage,
                refetch: (_p = options.refetch) !== null && _p !== void 0 ? _p : list.refetch,
                resource: (_q = options.resource) !== null && _q !== void 0 ? _q : list.resource,
                setFilters: (_r = options.setFilters) !== null && _r !== void 0 ? _r : list.setFilters,
                setPage: (_s = options.setPage) !== null && _s !== void 0 ? _s : list.setPage,
                setPerPage: (_t = options.setPerPage) !== null && _t !== void 0 ? _t : list.setPerPage,
                setSort: (_u = options.setSort) !== null && _u !== void 0 ? _u : list.setSort,
                showFilter: (_v = options.showFilter) !== null && _v !== void 0 ? _v : list.showFilter,
                sort: (_w = options.sort) !== null && _w !== void 0 ? _w : list.sort,
                source: options.source,
                total: (_x = options.total) !== null && _x !== void 0 ? _x : list.total,
                isFromReference: false,
            };
        }
        return context;
    }, [context, data, list, options]);
    return result;
};
exports.useChoicesContext = useChoicesContext;
var isArrayOfStrings = function (choices) {
    return Array.isArray(choices) &&
        choices.every(function (choice) { return typeof choice === 'string'; });
};
var convertOptionsToChoices = function (options) {
    return options.map(function (choice) { return ({
        id: choice,
        name: choice,
    }); });
};
//# sourceMappingURL=useChoicesContext.js.map