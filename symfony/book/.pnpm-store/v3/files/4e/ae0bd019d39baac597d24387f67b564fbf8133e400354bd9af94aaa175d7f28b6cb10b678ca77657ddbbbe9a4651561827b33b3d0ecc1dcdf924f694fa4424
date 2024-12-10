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
var __awaiter = (this && this.__awaiter) || function (thisArg, _arguments, P, generator) {
    function adopt(value) { return value instanceof P ? value : new P(function (resolve) { resolve(value); }); }
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) { try { step(generator.next(value)); } catch (e) { reject(e); } }
        function rejected(value) { try { step(generator["throw"](value)); } catch (e) { reject(e); } }
        function step(result) { result.done ? resolve(result.value) : adopt(result.value).then(fulfilled, rejected); }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
};
var __generator = (this && this.__generator) || function (thisArg, body) {
    var _ = { label: 0, sent: function() { if (t[0] & 1) throw t[1]; return t[1]; }, trys: [], ops: [] }, f, y, t, g;
    return g = { next: verb(0), "throw": verb(1), "return": verb(2) }, typeof Symbol === "function" && (g[Symbol.iterator] = function() { return this; }), g;
    function verb(n) { return function (v) { return step([n, v]); }; }
    function step(op) {
        if (f) throw new TypeError("Generator is already executing.");
        while (g && (g = 0, op[0] && (_ = 0)), _) try {
            if (f = 1, y && (t = op[0] & 2 ? y["return"] : op[0] ? y["throw"] || ((t = y["return"]) && t.call(y), 0) : y.next) && !(t = t.call(y, op[1])).done) return t;
            if (y = 0, t) op = [op[0] & 2, t.value];
            switch (op[0]) {
                case 0: case 1: t = op; break;
                case 4: _.label++; return { value: op[1], done: false };
                case 5: _.label++; y = op[1]; op = [0]; continue;
                case 7: op = _.ops.pop(); _.trys.pop(); continue;
                default:
                    if (!(t = _.trys, t = t.length > 0 && t[t.length - 1]) && (op[0] === 6 || op[0] === 2)) { _ = 0; continue; }
                    if (op[0] === 3 && (!t || (op[1] > t[0] && op[1] < t[3]))) { _.label = op[1]; break; }
                    if (op[0] === 6 && _.label < t[1]) { _.label = t[1]; t = op; break; }
                    if (t && _.label < t[2]) { _.label = t[2]; _.ops.push(op); break; }
                    if (t[2]) _.ops.pop();
                    _.trys.pop(); continue;
            }
            op = body.call(thisArg, _);
        } catch (e) { op = [6, e]; y = 0; } finally { f = t = 0; }
        if (op[0] & 5) throw op[1]; return { value: op[0] ? op[1] : void 0, done: true };
    }
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
exports.useUpdate = void 0;
var react_1 = require("react");
var react_query_1 = require("@tanstack/react-query");
var useDataProvider_1 = require("./useDataProvider");
var useAddUndoableMutation_1 = require("./undo/useAddUndoableMutation");
var util_1 = require("../util");
/**
 * Get a callback to call the dataProvider.update() method, the result and the loading state.
 *
 * @param {string} resource
 * @param {Params} params The update parameters { id, data, previousData, meta }
 * @param {Object} options Options object to pass to the queryClient.
 * May include side effects to be executed upon success or failure, e.g. { onSuccess: () => { refresh(); } }
 * May include a mutation mode (optimistic/pessimistic/undoable), e.g. { mutationMode: 'undoable' }
 *
 * @typedef Params
 * @prop params.id The resource identifier, e.g. 123
 * @prop params.data The updates to merge into the record, e.g. { views: 10 }
 * @prop params.previousData The record before the update is applied
 * @prop params.meta Optional meta data
 *
 * @returns The current mutation state. Destructure as [update, { data, error, isPending }].
 *
 * The return value updates according to the request state:
 *
 * - initial: [update, { isPending: false, isIdle: true }]
 * - start:   [update, { isPending: true }]
 * - success: [update, { data: [data from response], isPending: false, isSuccess: true }]
 * - error:   [update, { error: [error from response], isPending: false, isError: true }]
 *
 * The update() function must be called with a resource and a parameter object: update(resource, { id, data, previousData }, options)
 *
 * This hook uses react-query useMutation under the hood.
 * This means the state object contains mutate, isIdle, reset and other react-query methods.
 *
 * @see https://react-query-v3.tanstack.com/reference/useMutation
 *
 * @example // set params when calling the update callback
 *
 * import { useUpdate, useRecordContext } from 'react-admin';
 *
 * const IncreaseLikeButton = () => {
 *     const record = useRecordContext();
 *     const diff = { likes: record.likes + 1 };
 *     const [update, { isPending, error }] = useUpdate();
 *     const handleClick = () => {
 *         update('likes', { id: record.id, data: diff, previousData: record })
 *     }
 *     if (error) { return <p>ERROR</p>; }
 *     return <button disabled={isPending} onClick={handleClick}>Like</div>;
 * };
 *
 * @example // set params when calling the hook
 *
 * import { useUpdate, useRecordContext } from 'react-admin';
 *
 * const IncreaseLikeButton = () => {
 *     const record = useRecordContext();
 *     const diff = { likes: record.likes + 1 };
 *     const [update, { isPending, error }] = useUpdate('likes', { id: record.id, data: diff, previousData: record });
 *     if (error) { return <p>ERROR</p>; }
 *     return <button disabled={isPending} onClick={() => update()}>Like</button>;
 * };
 *
 * @example // TypeScript
 * const [update, { data }] = useUpdate<Product>('products', { id, data: diff, previousData: product });
 *                    \-- data is Product
 */
var useUpdate = function (resource, params, options) {
    if (params === void 0) { params = {}; }
    if (options === void 0) { options = {}; }
    var dataProvider = (0, useDataProvider_1.useDataProvider)();
    var queryClient = (0, react_query_1.useQueryClient)();
    var addUndoableMutation = (0, useAddUndoableMutation_1.useAddUndoableMutation)();
    var id = params.id, data = params.data, meta = params.meta;
    var _a = options.mutationMode, mutationMode = _a === void 0 ? 'pessimistic' : _a, getMutateWithMiddlewares = options.getMutateWithMiddlewares, mutationOptions = __rest(options, ["mutationMode", "getMutateWithMiddlewares"]);
    var mode = (0, react_1.useRef)(mutationMode);
    var paramsRef = (0, react_1.useRef)(params);
    var snapshot = (0, react_1.useRef)([]);
    // Ref that stores the mutation with middlewares to avoid losing them if the calling component is unmounted
    var mutateWithMiddlewares = (0, react_1.useRef)(dataProvider.update);
    // We need to store the call-time onError and onSettled in refs to be able to call them in the useMutation hook even
    // when the calling component is unmounted
    var callTimeOnError = (0, react_1.useRef)();
    var callTimeOnSettled = (0, react_1.useRef)();
    // We don't need to keep a ref on the onSuccess callback as we call it ourselves for optimistic and
    // undoable mutations. There is a limitation though: if one of the side effects applied by the onSuccess callback
    // unmounts the component that called the useUpdate hook (redirect for instance), it must be the last one applied,
    // otherwise the other side effects may not applied.
    var hasCallTimeOnSuccess = (0, react_1.useRef)(false);
    var updateCache = function (_a) {
        var resource = _a.resource, id = _a.id, data = _a.data, meta = _a.meta;
        // hack: only way to tell react-query not to fetch this query for the next 5 seconds
        // because setQueryData doesn't accept a stale time option
        var now = Date.now();
        var updatedAt = mode.current === 'undoable' ? now + 5 * 1000 : now;
        // Stringify and parse the data to remove undefined values.
        // If we don't do this, an update with { id: undefined } as payload
        // would remove the id from the record, which no real data provider does.
        var clonedData = JSON.parse(JSON.stringify(data));
        var updateColl = function (old) {
            if (!old)
                return old;
            var index = old.findIndex(
            // eslint-disable-next-line eqeqeq
            function (record) { return record.id == id; });
            if (index === -1) {
                return old;
            }
            return __spreadArray(__spreadArray(__spreadArray([], old.slice(0, index), true), [
                __assign(__assign({}, old[index]), clonedData)
            ], false), old.slice(index + 1), true);
        };
        queryClient.setQueryData([resource, 'getOne', { id: String(id), meta: meta }], function (record) { return (__assign(__assign({}, record), clonedData)); }, { updatedAt: updatedAt });
        queryClient.setQueriesData({ queryKey: [resource, 'getList'] }, function (res) {
            return res && res.data ? __assign(__assign({}, res), { data: updateColl(res.data) }) : res;
        }, { updatedAt: updatedAt });
        queryClient.setQueriesData({ queryKey: [resource, 'getInfiniteList'] }, function (res) {
            return res && res.pages
                ? __assign(__assign({}, res), { pages: res.pages.map(function (page) { return (__assign(__assign({}, page), { data: updateColl(page.data) })); }) }) : res;
        }, { updatedAt: updatedAt });
        queryClient.setQueriesData({ queryKey: [resource, 'getMany'] }, function (coll) {
            return coll && coll.length > 0 ? updateColl(coll) : coll;
        }, { updatedAt: updatedAt });
        queryClient.setQueriesData({ queryKey: [resource, 'getManyReference'] }, function (res) {
            return res && res.data
                ? { data: updateColl(res.data), total: res.total }
                : res;
        }, { updatedAt: updatedAt });
    };
    var mutation = (0, react_query_1.useMutation)(__assign(__assign({ mutationFn: function (_a) {
            var _b = _a === void 0 ? {} : _a, _c = _b.resource, callTimeResource = _c === void 0 ? resource : _c, _d = _b.id, callTimeId = _d === void 0 ? paramsRef.current.id : _d, _e = _b.data, callTimeData = _e === void 0 ? paramsRef.current.data : _e, _f = _b.meta, callTimeMeta = _f === void 0 ? paramsRef.current.meta : _f, _g = _b.previousData, callTimePreviousData = _g === void 0 ? paramsRef.current.previousData : _g;
            if (!callTimeResource) {
                throw new Error('useUpdate mutation requires a non-empty resource');
            }
            if (callTimeId == null) {
                throw new Error('useUpdate mutation requires a non-empty id');
            }
            if (!callTimeData) {
                throw new Error('useUpdate mutation requires a non-empty data object');
            }
            return mutateWithMiddlewares
                .current(callTimeResource, {
                id: callTimeId,
                data: callTimeData,
                previousData: callTimePreviousData,
                meta: callTimeMeta,
            })
                .then(function (_a) {
                var data = _a.data;
                return data;
            });
        } }, mutationOptions), { onMutate: function (variables) { return __awaiter(void 0, void 0, void 0, function () {
            var userContext;
            return __generator(this, function (_a) {
                switch (_a.label) {
                    case 0:
                        if (!mutationOptions.onMutate) return [3 /*break*/, 2];
                        return [4 /*yield*/, mutationOptions.onMutate(variables)];
                    case 1:
                        userContext = (_a.sent()) || {};
                        return [2 /*return*/, __assign({ snapshot: snapshot.current }, userContext)];
                    case 2: 
                    // Return a context object with the snapshot value
                    return [2 /*return*/, { snapshot: snapshot.current }];
                }
            });
        }); }, onError: function (error, variables, context) {
            if (variables === void 0) { variables = {}; }
            if (mode.current === 'optimistic' || mode.current === 'undoable') {
                // If the mutation fails, use the context returned from onMutate to rollback
                context.snapshot.forEach(function (_a) {
                    var key = _a[0], value = _a[1];
                    queryClient.setQueryData(key, value);
                });
            }
            if (callTimeOnError.current) {
                return callTimeOnError.current(error, variables, context);
            }
            if (mutationOptions.onError) {
                return mutationOptions.onError(error, variables, context);
            }
            // call-time error callback is executed by react-query
        }, onSuccess: function (data, variables, context) {
            var _a;
            if (variables === void 0) { variables = {}; }
            if (mode.current === 'pessimistic') {
                // update the getOne and getList query cache with the new result
                var _b = variables.resource, callTimeResource = _b === void 0 ? resource : _b, _c = variables.id, callTimeId = _c === void 0 ? id : _c;
                updateCache({
                    resource: callTimeResource,
                    id: callTimeId,
                    data: data,
                    meta: (_a = mutationOptions.meta) !== null && _a !== void 0 ? _a : paramsRef.current.meta,
                });
                if (mutationOptions.onSuccess &&
                    !hasCallTimeOnSuccess.current) {
                    mutationOptions.onSuccess(data, variables, context);
                }
            }
        }, onSettled: function (data, error, variables, context) {
            if (variables === void 0) { variables = {}; }
            if (mode.current === 'optimistic' || mode.current === 'undoable') {
                // Always refetch after error or success:
                context.snapshot.forEach(function (_a) {
                    var queryKey = _a[0];
                    queryClient.invalidateQueries({ queryKey: queryKey });
                });
            }
            if (callTimeOnSettled.current) {
                return callTimeOnSettled.current(data, error, variables, context);
            }
            if (mutationOptions.onSettled) {
                return mutationOptions.onSettled(data, error, variables, context);
            }
        } }));
    var update = function (callTimeResource, callTimeParams, callTimeOptions) {
        if (callTimeResource === void 0) { callTimeResource = resource; }
        if (callTimeParams === void 0) { callTimeParams = {}; }
        if (callTimeOptions === void 0) { callTimeOptions = {}; }
        return __awaiter(void 0, void 0, void 0, function () {
            var mutationMode, _a, returnPromise, onError, onSettled, onSuccess, otherCallTimeOptions, _b, callTimeId, _c, callTimeData, _d, callTimeMeta, previousRecord, queryKeys;
            return __generator(this, function (_e) {
                switch (_e.label) {
                    case 0:
                        mutationMode = callTimeOptions.mutationMode, _a = callTimeOptions.returnPromise, returnPromise = _a === void 0 ? mutationOptions.returnPromise : _a, onError = callTimeOptions.onError, onSettled = callTimeOptions.onSettled, onSuccess = callTimeOptions.onSuccess, otherCallTimeOptions = __rest(callTimeOptions, ["mutationMode", "returnPromise", "onError", "onSettled", "onSuccess"]);
                        // Store the mutation with middlewares to avoid losing them if the calling component is unmounted
                        if (getMutateWithMiddlewares) {
                            mutateWithMiddlewares.current = getMutateWithMiddlewares(dataProvider.update.bind(dataProvider));
                        }
                        else {
                            mutateWithMiddlewares.current = dataProvider.update;
                        }
                        // We need to keep the onSuccess callback here and not in the useMutation for undoable mutations
                        hasCallTimeOnSuccess.current = !!onSuccess;
                        // We need to store the onError and onSettled callbacks here to be able to call them in the useMutation hook
                        // so that they are called even when the calling component is unmounted
                        callTimeOnError.current = onError;
                        callTimeOnSettled.current = onSettled;
                        // store the hook time params *at the moment of the call*
                        // because they may change afterwards, which would break the undoable mode
                        // as the previousData would be overwritten by the optimistic update
                        paramsRef.current = params;
                        if (mutationMode) {
                            mode.current = mutationMode;
                        }
                        if (returnPromise && mode.current !== 'pessimistic') {
                            console.warn('The returnPromise parameter can only be used if the mutationMode is set to pessimistic');
                        }
                        if (mode.current === 'pessimistic') {
                            if (returnPromise) {
                                return [2 /*return*/, mutation.mutateAsync(__assign({ resource: callTimeResource }, callTimeParams), __assign({ onSuccess: onSuccess }, otherCallTimeOptions))];
                            }
                            return [2 /*return*/, mutation.mutate(__assign({ resource: callTimeResource }, callTimeParams), __assign({ onSuccess: onSuccess }, otherCallTimeOptions))];
                        }
                        _b = callTimeParams.id, callTimeId = _b === void 0 ? id : _b, _c = callTimeParams.data, callTimeData = _c === void 0 ? data : _c, _d = callTimeParams.meta, callTimeMeta = _d === void 0 ? meta : _d;
                        previousRecord = queryClient.getQueryData([
                            callTimeResource,
                            'getOne',
                            { id: String(callTimeId), meta: callTimeMeta },
                        ]);
                        queryKeys = [
                            [
                                callTimeResource,
                                'getOne',
                                { id: String(callTimeId), meta: callTimeMeta },
                            ],
                            [callTimeResource, 'getList'],
                            [callTimeResource, 'getInfiniteList'],
                            [callTimeResource, 'getMany'],
                            [callTimeResource, 'getManyReference'],
                        ];
                        /**
                         * Snapshot the previous values via queryClient.getQueriesData()
                         *
                         * The snapshotData ref will contain an array of tuples [query key, associated data]
                         *
                         * @example
                         * [
                         *   [['posts', 'getOne', { id: '1' }], { id: 1, title: 'Hello' }],
                         *   [['posts', 'getList'], { data: [{ id: 1, title: 'Hello' }], total: 1 }],
                         *   [['posts', 'getMany'], [{ id: 1, title: 'Hello' }]],
                         * ]
                         *
                         * @see https://react-query-v3.tanstack.com/reference/QueryClient#queryclientgetqueriesdata
                         */
                        snapshot.current = queryKeys.reduce(function (prev, queryKey) {
                            return prev.concat(queryClient.getQueriesData({ queryKey: queryKey }));
                        }, []);
                        // Cancel any outgoing re-fetches (so they don't overwrite our optimistic update)
                        return [4 /*yield*/, Promise.all(snapshot.current.map(function (_a) {
                                var queryKey = _a[0];
                                return queryClient.cancelQueries({ queryKey: queryKey });
                            }))];
                    case 1:
                        // Cancel any outgoing re-fetches (so they don't overwrite our optimistic update)
                        _e.sent();
                        // Optimistically update to the new value
                        updateCache({
                            resource: callTimeResource,
                            id: callTimeId,
                            data: callTimeData,
                            meta: callTimeMeta,
                        });
                        // run the success callbacks during the next tick
                        setTimeout(function () {
                            if (onSuccess) {
                                onSuccess(__assign(__assign({}, previousRecord), callTimeData), __assign({ resource: callTimeResource }, callTimeParams), { snapshot: snapshot.current });
                            }
                            else if (mutationOptions.onSuccess &&
                                !hasCallTimeOnSuccess.current) {
                                mutationOptions.onSuccess(__assign(__assign({}, previousRecord), callTimeData), __assign({ resource: callTimeResource }, callTimeParams), { snapshot: snapshot.current });
                            }
                        }, 0);
                        if (mode.current === 'optimistic') {
                            // call the mutate method without success side effects
                            return [2 /*return*/, mutation.mutate(__assign({ resource: callTimeResource }, callTimeParams))];
                        }
                        else {
                            // Undoable mutation: add the mutation to the undoable queue.
                            // The Notification component will dequeue it when the user confirms or cancels the message.
                            addUndoableMutation(function (_a) {
                                var isUndo = _a.isUndo;
                                if (isUndo) {
                                    // rollback
                                    snapshot.current.forEach(function (_a) {
                                        var key = _a[0], value = _a[1];
                                        queryClient.setQueryData(key, value);
                                    });
                                }
                                else {
                                    // call the mutate method without success side effects
                                    mutation.mutate(__assign({ resource: callTimeResource }, callTimeParams));
                                }
                            });
                        }
                        return [2 /*return*/];
                }
            });
        });
    };
    var mutationResult = (0, react_1.useMemo)(function () { return (__assign({ isLoading: mutation.isPending }, mutation)); }, [mutation]);
    return [(0, util_1.useEvent)(update), mutationResult];
};
exports.useUpdate = useUpdate;
//# sourceMappingURL=useUpdate.js.map