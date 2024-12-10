import * as React from 'react';
import { ReactNode } from 'react';
import { RaRecord } from '../../types';
import { EditControllerProps } from './useEditController';
/**
 * Call useEditController and put the value in a EditContext
 *
 * Base class for <Edit> components, without UI.
 *
 * Accepts any props accepted by useEditController:
 * - id: The record identifier
 * - resource: The resource
 *
 * @example // Custom edit layout
 *
 * const PostEdit = () => (
 *     <EditBase resource="posts">
 *         <Grid container>
 *             <Grid item xs={8}>
 *                 <SimpleForm>
 *                     ...
 *                 </SimpleForm>
 *             </Grid>
 *             <Grid item xs={4}>
 *                 Edit instructions...
 *             </Grid>
 *         </Grid>
 *         <div>
 *             Post related links...
 *         </div>
 *     </EditBase>
 * );
 */
export declare const EditBase: <RecordType extends RaRecord<import("../../types").Identifier> = any, ErrorType = Error>({ children, loading, ...props }: EditBaseProps<RecordType, ErrorType>) => string | number | boolean | Iterable<React.ReactNode> | React.JSX.Element | null;
export interface EditBaseProps<RecordType extends RaRecord = RaRecord, ErrorType = Error> extends EditControllerProps<RecordType, ErrorType> {
    children: ReactNode;
    loading?: ReactNode;
}
//# sourceMappingURL=EditBase.d.ts.map