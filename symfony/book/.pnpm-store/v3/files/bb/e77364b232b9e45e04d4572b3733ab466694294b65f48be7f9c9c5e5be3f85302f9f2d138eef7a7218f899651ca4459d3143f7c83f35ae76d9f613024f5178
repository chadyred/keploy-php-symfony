import React from 'react';
import { SortPayload, RaRecord } from 'ra-core';
import { TypographyProps } from '@mui/material';
import { FieldProps } from './types';
/**
 * Fetch and render the number of records related to the current one
 *
 * Relies on dataProvider.getManyReference() returning a total property
 *
 * @example // Display the number of comments for the current post
 * <ReferenceManyCount reference="comments" target="post_id" />
 *
 * @example // Display the number of published comments for the current post
 * <ReferenceManyCount reference="comments" target="post_id" filter={{ is_published: true }} />
 *
 * @example // Display the number of comments for the current post, with a custom Typography variant
 * <ReferenceManyCount reference="comments" target="post_id" variant="h1" />
 */
export declare const ReferenceManyCount: {
    <RecordType extends RaRecord<import("ra-core").Identifier> = RaRecord<import("ra-core").Identifier>>(props: ReferenceManyCountProps<RecordType>): React.JSX.Element;
    textAlign: string;
};
export interface ReferenceManyCountProps<RecordType extends RaRecord = RaRecord> extends Omit<FieldProps<RecordType>, 'source'>, Omit<TypographyProps, 'textAlign'> {
    reference: string;
    source?: string;
    target: string;
    sort?: SortPayload;
    filter?: any;
    link?: boolean;
    timeout?: number;
}
//# sourceMappingURL=ReferenceManyCount.d.ts.map