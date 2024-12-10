"use strict";
var __spreadArray = (this && this.__spreadArray) || function (to, from, pack) {
    if (pack || arguments.length === 2) for (var i = 0, l = from.length, ar; i < l; i++) {
        if (ar || !(i in from)) {
            if (!ar) ar = Array.prototype.slice.call(from, 0, i);
            ar[i] = from[i];
        }
    }
    return to.concat(ar || Array.prototype.slice.call(from));
};
Object.defineProperty(exports, "__esModule", { value: true });
exports.useRecordSelection = void 0;
var react_1 = require("react");
var store_1 = require("../../store");
/**
 * Get the list of selected items for a resource, and callbacks to change the selection
 *
 * @param args.resource The resource name, e.g. 'posts'
 * @param args.disableSyncWithStore Controls the selection syncronization with the store
 *
 * @returns {Object} Destructure as [selectedIds, { select, toggle, clearSelection }].
 */
var useRecordSelection = function (args) {
    var _a = args.resource, resource = _a === void 0 ? '' : _a, _b = args.disableSyncWithStore, disableSyncWithStore = _b === void 0 ? false : _b;
    var storeKey = "".concat(resource, ".selectedIds");
    var _c = (0, react_1.useState)(defaultSelection), localIds = _c[0], setLocalIds = _c[1];
    // As we can't conditionally call a hook, if the storeKey is false,
    // we'll ignore the params variable later on and won't call setParams either.
    var _d = (0, store_1.useStore)(storeKey, defaultSelection), storeIds = _d[0], setStoreIds = _d[1];
    var resetStore = (0, store_1.useRemoveFromStore)(storeKey);
    var ids = disableSyncWithStore ? localIds : storeIds;
    var setIds = disableSyncWithStore ? setLocalIds : setStoreIds;
    var reset = (0, react_1.useCallback)(function () {
        if (disableSyncWithStore) {
            setLocalIds(defaultSelection);
        }
        else {
            resetStore();
        }
    }, [disableSyncWithStore, resetStore]);
    var selectionModifiers = (0, react_1.useMemo)(function () { return ({
        select: function (idsToAdd) {
            if (!idsToAdd)
                return;
            setIds(__spreadArray([], idsToAdd, true));
        },
        unselect: function (idsToRemove) {
            if (!idsToRemove || idsToRemove.length === 0)
                return;
            setIds(function (ids) {
                if (!Array.isArray(ids))
                    return [];
                return ids.filter(function (id) { return !idsToRemove.includes(id); });
            });
        },
        toggle: function (id) {
            if (typeof id === 'undefined')
                return;
            setIds(function (ids) {
                if (!Array.isArray(ids))
                    return __spreadArray([], ids, true);
                var index = ids.indexOf(id);
                return index > -1
                    ? __spreadArray(__spreadArray([], ids.slice(0, index), true), ids.slice(index + 1), true) : __spreadArray(__spreadArray([], ids, true), [id], false);
            });
        },
        clearSelection: function () {
            reset();
        },
    }); }, [setIds, reset]);
    return [ids, selectionModifiers];
};
exports.useRecordSelection = useRecordSelection;
var defaultSelection = [];
//# sourceMappingURL=useRecordSelection.js.map