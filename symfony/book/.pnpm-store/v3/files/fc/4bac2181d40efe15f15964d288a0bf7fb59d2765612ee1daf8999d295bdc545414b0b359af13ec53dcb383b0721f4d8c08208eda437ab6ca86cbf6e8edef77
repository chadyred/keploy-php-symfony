import * as React from 'react';
import { RaRecord } from '../../types';
import { ShowControllerProps } from './useShowController';
/**
 * Call useShowController and put the value in a ShowContext
 *
 * Base class for <Show> components, without UI.
 *
 * Accepts any props accepted by useShowController:
 * - id: The record identifier
 * - resource: The resource
 *
 * @example // Custom show layout
 *
 * const PostShow = () => (
 *     <ShowBase resource="posts">
 *         <Grid container>
 *             <Grid item xs={8}>
 *                 <SimpleForm>
 *                     ...
 *                 </SimpleForm>
 *             </Grid>
 *             <Grid item xs={4}>
 *                 Show instructions...
 *             </Grid>
 *         </Grid>
 *         <div>
 *             Post related links...
 *         </div>
 *     </ShowBase>
 * );
 */
export declare const ShowBase: <RecordType extends RaRecord<import("../../types").Identifier> = any>({ children, loading, ...props }: ShowBaseProps<RecordType>) => string | number | boolean | Iterable<React.ReactNode> | React.JSX.Element | null;
export interface ShowBaseProps<RecordType extends RaRecord = RaRecord> extends ShowControllerProps<RecordType> {
    children: React.ReactNode;
    loading?: React.ReactNode;
}
//# sourceMappingURL=ShowBase.d.ts.map