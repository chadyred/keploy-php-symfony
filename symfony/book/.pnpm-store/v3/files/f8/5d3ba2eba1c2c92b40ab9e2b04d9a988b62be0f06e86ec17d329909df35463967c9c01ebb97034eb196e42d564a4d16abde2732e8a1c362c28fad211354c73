import * as React from 'react';
import { ReactNode } from 'react';
import { InfiniteListControllerProps } from './useInfiniteListController';
import { RaRecord } from '../../types';
/**
 * Call useInfiniteListController and put the value in a ListContext
 *
 * Base class for <InfiniteList> components, without UI.
 *
 * Accepts any props accepted by useInfiniteListController:
 * - filter: permanent filter applied to the list
 * - filters: Filter element, to display the filters
 * - filterDefaultValues: object;
 * - perPage: Number of results per page
 * - sort: Default sort
 * - exporter: exported function
 *
 * @example // Custom list layout
 *
 * const PostList = () => (
 *     <InfiniteListBase perPage={10}>
 *         <div>
 *              List metrics...
 *         </div>
 *         <Grid container>
 *             <Grid item xs={8}>
 *                 <SimpleList primaryText={record => record.title} />
 *             </Grid>
 *             <Grid item xs={4}>
 *                 List instructions...
 *             </Grid>
 *         </Grid>
 *         <div>
 *             Post related links...
 *         </div>
 *     </ListBase>
 * );
 */
export declare const InfiniteListBase: <RecordType extends RaRecord<import("../../types").Identifier> = any>({ children, loading, ...props }: InfiniteListBaseProps<RecordType>) => string | number | boolean | Iterable<React.ReactNode> | React.JSX.Element | null;
export interface InfiniteListBaseProps<RecordType extends RaRecord = any> extends InfiniteListControllerProps<RecordType> {
    children: ReactNode;
    loading?: ReactNode;
}
//# sourceMappingURL=InfiniteListBase.d.ts.map