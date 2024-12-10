import { UseQueryOptions } from '@tanstack/react-query';
import { RaRecord } from '../../types';
import { LinkToType } from '../../routing';
import { UseReferenceResult } from '../useReference';
export declare const useReferenceFieldController: <ReferenceRecordType extends RaRecord<import("../../types").Identifier> = RaRecord<import("../../types").Identifier>>(options: UseReferenceFieldControllerOptions<ReferenceRecordType>) => UseReferenceFieldControllerResult<ReferenceRecordType>;
export interface UseReferenceFieldControllerOptions<ReferenceRecordType extends RaRecord = RaRecord> {
    source: string;
    queryOptions?: Omit<UseQueryOptions<ReferenceRecordType[], Error>, 'queryFn' | 'queryKey'>;
    reference: string;
    link?: LinkToType<ReferenceRecordType>;
}
export interface UseReferenceFieldControllerResult<ReferenceRecordType extends RaRecord = RaRecord> extends UseReferenceResult<ReferenceRecordType> {
    link?: string | false;
}
//# sourceMappingURL=useReferenceFieldController.d.ts.map