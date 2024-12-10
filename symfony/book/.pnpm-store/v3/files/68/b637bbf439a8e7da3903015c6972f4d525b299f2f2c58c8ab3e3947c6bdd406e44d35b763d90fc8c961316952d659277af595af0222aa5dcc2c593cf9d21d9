import * as React from 'react';
import { StackProps } from '@mui/material';
import { RaRecord } from 'ra-core';
/**
 * Iterator component to be used to display a list of entities, using a single field
 *
 * @example Display all the orders by the current customer as a list of chips
 * <ReferenceManyField reference="orders" target="customer_id">
 *     <SingleFieldList />
 * </ReferenceManyField>

* @example Choose the field to be used as text label
 * <ReferenceManyField reference="orders" target="customer_id">
 *     <SingleFieldList>
 *         <ChipField source="reference" />
 *     </SingleFieldList>
 * </ReferenceManyField>
 *
 * @example Customize the link type
 * // By default, it includes a link to the <Edit> page of the related record
 * // (`/orders/:id` in the previous example).
 * // Set the linkType prop to "show" to link to the <Show> page instead.
 * <ReferenceManyField reference="books" target="author_id">
 *     <SingleFieldList linkType="show">
 *         <ChipField source="title" />
 *     </SingleFieldList>
 * </ReferenceManyField>
 *
 * @example Disable the link
 * // You can also prevent `<SingleFieldList>` from adding link to children by
 * // setting `linkType` to false.
 * <ReferenceManyField reference="books" target="author_id">
 *     <SingleFieldList linkType={false}>
 *         <ChipField source="title" />
 *     </SingleFieldList>
 * </ReferenceManyField>
 */
export declare const SingleFieldList: (props: SingleFieldListProps) => React.JSX.Element | null;
export interface SingleFieldListProps<RecordType extends RaRecord = any> extends StackProps {
    className?: string;
    empty?: React.ReactElement;
    linkType?: string | false;
    children?: React.ReactNode;
    data?: RecordType[];
    total?: number;
    loaded?: boolean;
}
export declare const SingleFieldListClasses: {
    link: string;
};
//# sourceMappingURL=SingleFieldList.d.ts.map