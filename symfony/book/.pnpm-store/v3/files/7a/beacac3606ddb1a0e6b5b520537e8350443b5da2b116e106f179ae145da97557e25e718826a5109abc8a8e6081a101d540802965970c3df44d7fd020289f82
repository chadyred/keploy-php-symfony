import { RaRecord, SortPayload } from '../../types';
import { ListControllerResult } from '../list';
import { UseQueryOptions } from '@tanstack/react-query';
export interface UseReferenceArrayFieldControllerParams<RecordType extends RaRecord = RaRecord, ReferenceRecordType extends RaRecord = RaRecord> {
    filter?: any;
    page?: number;
    perPage?: number;
    record?: RecordType;
    reference: string;
    resource?: string;
    sort?: SortPayload;
    source: string;
    queryOptions?: Omit<UseQueryOptions<ReferenceRecordType[]>, 'queryFn' | 'queryKey'>;
}
/**
 * Hook that fetches records from another resource specified
 * by an array of *ids* in current record.
 *
 * @example
 *
 * const { data, error, isFetching, isPending } = useReferenceArrayFieldController({
 *      record: { referenceIds: ['id1', 'id2']};
 *      reference: 'reference';
 *      resource: 'resource';
 *      source: 'referenceIds';
 * });
 *
 * @param {Object} props
 * @param {Object} props.record The current resource record
 * @param {string} props.reference The linked resource name
 * @param {string} props.resource The current resource name
 * @param {string} props.source The key of the linked resource identifier
 *
 * @param {Props} props
 *
 * @returns {ListControllerResult} The reference props
 */
export declare const useReferenceArrayFieldController: <RecordType extends RaRecord<import("../../types").Identifier> = RaRecord<import("../../types").Identifier>, ReferenceRecordType extends RaRecord<import("../../types").Identifier> = RaRecord<import("../../types").Identifier>>(props: UseReferenceArrayFieldControllerParams<RecordType, ReferenceRecordType>) => ListControllerResult;
//# sourceMappingURL=useReferenceArrayFieldController.d.ts.map