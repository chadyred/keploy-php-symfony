import { UseQueryOptions, UseQueryResult } from '@tanstack/react-query';
import { RaRecord, GetManyReferenceParams, GetManyReferenceResult } from '../types';
/**
 * Call the dataProvider.getManyReference() method and return the resolved result
 * as well as the loading state.
 *
 * The return value updates according to the request state:
 *
 * - start: { isPending: true, refetch }
 * - success: { data: [data from store], total: [total from response], isPending: false, refetch }
 * - error: { error: [error from response], isPending: false, refetch }
 *
 * This hook will return the cached result when called a second time
 * with the same parameters, until the response arrives.
 *
 * @param {string} resource The resource name, e.g. 'posts'
 * @param {Params} params The getManyReference parameters { target, id, pagination, sort, filter, meta }
 * @param {Object} options Options object to pass to the queryClient.
 * May include side effects to be executed upon success or failure, e.g. { onSuccess: () => { refresh(); } }
 *
 * @typedef Params
 * @prop params.target The target resource key, e.g. 'post_id'
 * @prop params.id The identifier of the record to look for in target, e.g. '123'
 * @prop params.pagination The request pagination { page, perPage }, e.g. { page: 1, perPage: 10 }
 * @prop params.sort The request sort { field, order }, e.g. { field: 'id', order: 'DESC' }
 * @prop params.filter The request filters, e.g. { title: 'hello, world' }
 * @prop params.meta Optional meta parameters
 *
 * @returns The current request state. Destructure as { data, total, error, isPending, refetch }.
 *
 * @example
 *
 * import { useGetManyReference, useRecordContext } from 'react-admin';
 *
 * const PostComments = () => {
 *     const record = useRecordContext();
 *     // fetch all comments related to the current record
 *     const { data, isPending, error } = useGetManyReference(
 *         'comments',
 *         { target: 'post_id', id: record.id, pagination: { page: 1, perPage: 10 }, sort: { field: 'published_at', order: 'DESC' } }
 *     );
 *     if (isPending) { return <Loading />; }
 *     if (error) { return <p>ERROR</p>; }
 *     return <ul>{data.map(comment =>
 *         <li key={comment.id}>{comment.body}</li>
 *     )}</ul>;
 * };
 */
export declare const useGetManyReference: <RecordType extends RaRecord<import("../types").Identifier> = any>(resource: string, params?: Partial<GetManyReferenceParams>, options?: UseGetManyReferenceHookOptions<RecordType>) => UseGetManyReferenceHookValue<RecordType>;
export type UseGetManyReferenceHookOptions<RecordType extends RaRecord = any> = Omit<UseQueryOptions<GetManyReferenceResult<RecordType>>, 'queryKey' | 'queryFn'> & {
    onSuccess?: (data: GetManyReferenceResult<RecordType>) => void;
    onError?: (error: Error) => void;
    onSettled?: (data?: GetManyReferenceResult<RecordType>, error?: Error | null) => void;
};
export type UseGetManyReferenceHookValue<RecordType extends RaRecord = any> = UseQueryResult<RecordType[]> & {
    total?: number;
    pageInfo?: {
        hasNextPage?: boolean;
        hasPreviousPage?: boolean;
    };
    meta?: any;
};
//# sourceMappingURL=useGetManyReference.d.ts.map