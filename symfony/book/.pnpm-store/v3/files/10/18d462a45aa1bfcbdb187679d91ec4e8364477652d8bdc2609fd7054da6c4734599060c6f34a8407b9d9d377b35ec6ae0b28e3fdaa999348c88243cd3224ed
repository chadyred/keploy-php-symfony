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
var react_1 = require("react");
var react_query_1 = require("@tanstack/react-query");
var useAuthProvider_1 = __importStar(require("./useAuthProvider"));
var useLogout_1 = __importDefault(require("./useLogout"));
var routing_1 = require("../routing");
var notification_1 = require("../notification");
var util_1 = require("../util");
var emptyParams = {};
/**
 * Hook for getting the authentication status
 *
 * Calls the authProvider.checkAuth() method asynchronously.
 *
 * The return value updates according to the authProvider request state:
 *
 * - isPending: true just after mount, while the authProvider is being called. false once the authProvider has answered.
 * - authenticated: true while loading. then true or false depending on the authProvider response.
 *
 * To avoid rendering a component and force waiting for the authProvider response, use the useAuthState() hook
 * instead of the useAuthenticated() hook.
 *
 * You can render different content depending on the authenticated status.
 *
 * @see useAuthenticated()
 *
 * @param {Object} params Any params you want to pass to the authProvider
 *
 * @param {Boolean} logoutOnFailure: Optional. Whether the user should be logged out if the authProvider fails to authenticate them. False by default.
 *
 * @returns The current auth check state. Destructure as { authenticated, error, isPending }.
 *
 * @example
 * import { useAuthState, Loading } from 'react-admin';
 *
 * const MyPage = () => {
 *     const { isPending, authenticated } = useAuthState();
 *     if (isPending) {
 *         return <Loading />;
 *     }
 *     if (authenticated) {
 *        return <AuthenticatedContent />;
 *     }
 *     return <AnonymousContent />;
 * };
 */
var useAuthState = function (params, logoutOnFailure, queryOptions) {
    if (params === void 0) { params = emptyParams; }
    if (logoutOnFailure === void 0) { logoutOnFailure = false; }
    if (queryOptions === void 0) { queryOptions = emptyParams; }
    var authProvider = (0, useAuthProvider_1.default)();
    var logout = (0, useLogout_1.default)();
    var basename = (0, routing_1.useBasename)();
    var notify = (0, notification_1.useNotify)();
    var onSuccess = queryOptions.onSuccess, onError = queryOptions.onError, onSettled = queryOptions.onSettled, options = __rest(queryOptions, ["onSuccess", "onError", "onSettled"]);
    var queryResult = (0, react_query_1.useQuery)(__assign({ queryKey: ['auth', 'checkAuth', params], queryFn: function (_a) {
            var signal = _a.signal;
            // The authProvider is optional in react-admin
            if (!authProvider) {
                return true;
            }
            return authProvider
                .checkAuth(__assign(__assign({}, params), { signal: signal }))
                .then(function () { return true; })
                .catch(function (error) {
                // This is necessary because react-query requires the error to be defined
                if (error != null) {
                    throw error;
                }
                throw new Error();
            });
        }, retry: false }, options));
    var onSuccessEvent = (0, util_1.useEvent)(onSuccess !== null && onSuccess !== void 0 ? onSuccess : noop);
    var onSettledEvent = (0, util_1.useEvent)(onSettled !== null && onSettled !== void 0 ? onSettled : noop);
    var onErrorEvent = (0, util_1.useEvent)(onError !== null && onError !== void 0 ? onError : (function (error) {
        if (!logoutOnFailure)
            return;
        var loginUrl = (0, routing_1.removeDoubleSlashes)("".concat(basename, "/").concat(useAuthProvider_1.defaultAuthParams.loginUrl));
        logout({}, error && error.redirectTo != null
            ? error.redirectTo
            : loginUrl);
        var shouldSkipNotify = error && error.message === false;
        !shouldSkipNotify &&
            notify(getErrorMessage(error, 'ra.auth.auth_check_error'), {
                type: 'error',
            });
    }));
    (0, react_1.useEffect)(function () {
        if (queryResult.data === undefined || queryResult.isFetching)
            return;
        if (queryOptions.enabled === false)
            return;
        onSuccessEvent(queryResult.data);
    }, [
        onSuccessEvent,
        queryResult.data,
        queryResult.isFetching,
        queryOptions.enabled,
    ]);
    (0, react_1.useEffect)(function () {
        if (queryResult.error == null || queryResult.isFetching)
            return;
        if (queryOptions.enabled === false)
            return;
        onErrorEvent(queryResult.error);
    }, [
        onErrorEvent,
        queryResult.error,
        queryResult.isFetching,
        queryOptions.enabled,
    ]);
    (0, react_1.useEffect)(function () {
        if (queryResult.status === 'pending' || queryResult.isFetching)
            return;
        if (queryOptions.enabled === false)
            return;
        onSettledEvent(queryResult.data, queryResult.error);
    }, [
        onSettledEvent,
        queryResult.data,
        queryResult.error,
        queryResult.status,
        queryResult.isFetching,
        queryOptions.enabled,
    ]);
    var result = (0, react_1.useMemo)(function () {
        return __assign(__assign({}, queryResult), { authenticated: queryResult.error ? false : queryResult.data });
    }, [queryResult]);
    return authProvider != null
        ? result
        : noAuthProviderQueryResult;
};
exports.default = useAuthState;
var getErrorMessage = function (error, defaultMessage) {
    return typeof error === 'string'
        ? error
        : typeof error === 'undefined' || !error.message
            ? defaultMessage
            : error.message;
};
var noop = function () { };
var noAuthProviderQueryResult = {
    authenticated: true,
    data: true,
    dataUpdatedAt: 0,
    error: null,
    errorUpdatedAt: 0,
    errorUpdateCount: 0,
    failureCount: 0,
    failureReason: null,
    fetchStatus: 'idle',
    isError: false,
    isInitialLoading: false,
    isLoading: false,
    isLoadingError: false,
    isFetched: true,
    isFetchedAfterMount: true,
    isFetching: false,
    isPaused: false,
    isPlaceholderData: false,
    isPending: false,
    isRefetchError: false,
    isRefetching: false,
    isStale: false,
    isSuccess: true,
    status: 'success',
    refetch: function () { return Promise.resolve(noAuthProviderQueryResult); },
};
//# sourceMappingURL=useAuthState.js.map