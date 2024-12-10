import { RaRecord } from '../types';
import { UseCanAccessOptions, UseCanAccessResult } from './useCanAccess';
/**
 * A hook that calls the authProvider.canAccess() method for a provided resource and action (and optionally a record).
 * It redirects to the /access-denied page if the user doesn't have the required permissions.
 * It redirects to the /authentication-error page if the authProvider.canAccess throws an error.
 *
 * The return value updates according to the request state:
 *
 * - start: { isPending: true }
 * - success: { isPending: false }
 * - error: { error: [error from provider], isPending: false }
 *
 * Useful to enable or disable features based on users permissions.
 *
 * @param {Object} params Any params you want to pass to the authProvider
 * @param {string} params.resource The resource to check access for
 * @param {string} params.action The action to check access for
 * @param {Object} params.record Optional. The record to check access for
 *
 * @returns Return the react-query result.
 *
 * @example
 *     import { useRequireAccess } from 'react-admin';
 *
 *     const PostDetail = () => {
 *         const { isPending } = useRequireAccess({
 *             resource: 'posts',
 *             action: 'read',
 *         });
 *         if (isPending) {
 *             return null;
 *         }
 *
 *         return <PostEdit />;
 *     };
 */
export declare const useRequireAccess: <RecordType extends RaRecord<import("../types").Identifier> | Omit<RaRecord<import("../types").Identifier>, "id"> = RaRecord<import("../types").Identifier>, ErrorType extends Error = Error>(params: UseRequireAccessOptions<RecordType, ErrorType>) => {
    isError: false;
    isPending: true;
    isLoading: true;
    isLoadingError: false;
    isRefetchError: false;
    isSuccess: false;
    status: "pending";
    dataUpdatedAt: number;
    errorUpdatedAt: number;
    failureCount: number;
    failureReason: ErrorType | null;
    errorUpdateCount: number;
    isFetched: boolean;
    isFetchedAfterMount: boolean;
    isFetching: boolean;
    isInitialLoading: boolean;
    isPaused: boolean;
    isPlaceholderData: boolean;
    isRefetching: boolean;
    isStale: boolean;
    refetch: (options?: import("@tanstack/query-core/build/legacy/hydration-BZ2M_xzi").ac | undefined) => Promise<import("@tanstack/query-core/build/legacy/hydration-BZ2M_xzi").as<boolean, ErrorType>>;
    fetchStatus: import("@tanstack/query-core/build/legacy/hydration-BZ2M_xzi").ak;
} | {
    isError: true;
    isPending: false;
    isLoading: false;
    isLoadingError: true;
    isRefetchError: false;
    isSuccess: false;
    status: "error";
    dataUpdatedAt: number;
    errorUpdatedAt: number;
    failureCount: number;
    failureReason: ErrorType | null;
    errorUpdateCount: number;
    isFetched: boolean;
    isFetchedAfterMount: boolean;
    isFetching: boolean;
    isInitialLoading: boolean;
    isPaused: boolean;
    isPlaceholderData: boolean;
    isRefetching: boolean;
    isStale: boolean;
    refetch: (options?: import("@tanstack/query-core/build/legacy/hydration-BZ2M_xzi").ac | undefined) => Promise<import("@tanstack/query-core/build/legacy/hydration-BZ2M_xzi").as<boolean, ErrorType>>;
    fetchStatus: import("@tanstack/query-core/build/legacy/hydration-BZ2M_xzi").ak;
} | {
    isError: true;
    isPending: false;
    isLoading: false;
    isLoadingError: false;
    isRefetchError: true;
    isSuccess: false;
    status: "error";
    dataUpdatedAt: number;
    errorUpdatedAt: number;
    failureCount: number;
    failureReason: ErrorType | null;
    errorUpdateCount: number;
    isFetched: boolean;
    isFetchedAfterMount: boolean;
    isFetching: boolean;
    isInitialLoading: boolean;
    isPaused: boolean;
    isPlaceholderData: boolean;
    isRefetching: boolean;
    isStale: boolean;
    refetch: (options?: import("@tanstack/query-core/build/legacy/hydration-BZ2M_xzi").ac | undefined) => Promise<import("@tanstack/query-core/build/legacy/hydration-BZ2M_xzi").as<boolean, ErrorType>>;
    fetchStatus: import("@tanstack/query-core/build/legacy/hydration-BZ2M_xzi").ak;
} | {
    isError: false;
    isPending: false;
    isLoading: false;
    isLoadingError: false;
    isRefetchError: false;
    isSuccess: true;
    status: "success";
    dataUpdatedAt: number;
    errorUpdatedAt: number;
    failureCount: number;
    failureReason: ErrorType | null;
    errorUpdateCount: number;
    isFetched: boolean;
    isFetchedAfterMount: boolean;
    isFetching: boolean;
    isInitialLoading: boolean;
    isPaused: boolean;
    isPlaceholderData: boolean;
    isRefetching: boolean;
    isStale: boolean;
    refetch: (options?: import("@tanstack/query-core/build/legacy/hydration-BZ2M_xzi").ac | undefined) => Promise<import("@tanstack/query-core/build/legacy/hydration-BZ2M_xzi").as<boolean, ErrorType>>;
    fetchStatus: import("@tanstack/query-core/build/legacy/hydration-BZ2M_xzi").ak;
};
export type UseRequireAccessOptions<RecordType extends RaRecord | Omit<RaRecord, 'id'> = RaRecord, ErrorType extends Error = Error> = UseCanAccessOptions<RecordType, ErrorType>;
export type UseRequireAccessResult<ErrorType extends Error = Error> = Omit<UseCanAccessResult<ErrorType>, 'canAccess' | 'data'>;
//# sourceMappingURL=useRequireAccess.d.ts.map