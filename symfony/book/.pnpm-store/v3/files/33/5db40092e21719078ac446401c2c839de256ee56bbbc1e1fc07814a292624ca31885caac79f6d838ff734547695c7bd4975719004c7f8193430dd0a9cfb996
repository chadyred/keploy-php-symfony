import { UseQueryOptions } from '@tanstack/react-query';
import { FilterPayload, Identifier, RaRecord, SortPayload } from '../../types';
import { ListControllerResult } from '../list';
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
export declare const useReferenceManyFieldController: <RecordType extends RaRecord<Identifier> = RaRecord<Identifier>, ReferenceRecordType extends RaRecord<Identifier> = RaRecord<Identifier>>(props: UseReferenceManyFieldControllerParams<RecordType, ReferenceRecordType>) => ListControllerResult<ReferenceRecordType>;
export interface UseReferenceManyFieldControllerParams<RecordType extends Record<string, any> = Record<string, any>, ReferenceRecordType extends Record<string, any> = Record<string, any>> {
    debounce?: number;
    filter?: FilterPayload;
    page?: number;
    perPage?: number;
    record?: RecordType;
    reference: string;
    resource?: string;
    sort?: SortPayload;
    source?: string;
    storeKey?: string;
    target: string;
    queryOptions?: Omit<UseQueryOptions<{
        data: ReferenceRecordType[];
        total: number;
    }, Error>, 'queryKey' | 'queryFn'>;
}
//# sourceMappingURL=useReferenceManyFieldController.d.ts.map