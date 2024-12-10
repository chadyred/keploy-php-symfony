import React, { ReactNode } from 'react';
import { UseQueryOptions } from '@tanstack/react-query';
import { LinkToType, SortPayload, RaRecord } from 'ra-core';
import { FieldProps } from './types';
/**
 * Render the related record in a one-to-one relationship
 *
 * Expects a single field as child
 *
 * @example // display the bio of the current author
 * <ReferenceOneField reference="bios" target="author_id">
 *     <TextField source="body" />
 * </ReferenceOneField>
 */
export declare const ReferenceOneField: {
    <RecordType extends RaRecord<import("ra-core").Identifier> = RaRecord<import("ra-core").Identifier>, ReferenceRecordType extends RaRecord<import("ra-core").Identifier> = RaRecord<import("ra-core").Identifier>>(props: ReferenceOneFieldProps<RecordType, ReferenceRecordType>): React.JSX.Element | null;
    sortable: boolean;
};
export interface ReferenceOneFieldProps<RecordType extends RaRecord = RaRecord, ReferenceRecordType extends RaRecord = RaRecord> extends Omit<FieldProps<RecordType>, 'source'> {
    children?: ReactNode;
    reference: string;
    target: string;
    sort?: SortPayload;
    source?: string;
    filter?: any;
    link?: LinkToType<ReferenceRecordType>;
    queryOptions?: Omit<UseQueryOptions<{
        data: ReferenceRecordType[];
        total: number;
    }>, 'queryKey'> & {
        meta?: any;
    };
}
//# sourceMappingURL=ReferenceOneField.d.ts.map