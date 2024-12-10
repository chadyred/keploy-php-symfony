import * as React from 'react';
import { ReactNode } from 'react';
import { CreateControllerProps } from './useCreateController';
import { Identifier, RaRecord } from '../../types';
/**
 * Call useCreateController and put the value in a CreateContext
 *
 * Base class for <Create> components, without UI.
 *
 * Accepts any props accepted by useCreateController:
 * - id: The record identifier
 * - resource: The resource
 *
 * @example // Custom edit layout
 *
 * const PostCreate = () => (
 *     <CreateBase>
 *         <Grid container>
 *             <Grid item xs={8}>
 *                 <SimpleForm>
 *                     ...
 *                 </SimpleForm>
 *             </Grid>
 *             <Grid item xs={4}>
 *                 Create instructions...
 *             </Grid>
 *         </Grid>
 *         <div>
 *             Post related links...
 *         </div>
 *     </CreateBase>
 * );
 */
export declare const CreateBase: <RecordType extends Omit<RaRecord<Identifier>, "id"> = any, ResultRecordType extends RaRecord<Identifier> = RecordType & {
    id: Identifier;
}, MutationOptionsError = Error>({ children, loading, ...props }: CreateBaseProps<RecordType, ResultRecordType, MutationOptionsError>) => string | number | boolean | Iterable<React.ReactNode> | React.JSX.Element | null;
export interface CreateBaseProps<RecordType extends Omit<RaRecord, 'id'> = any, ResultRecordType extends RaRecord = RecordType & {
    id: Identifier;
}, MutationOptionsError = Error> extends CreateControllerProps<RecordType, MutationOptionsError, ResultRecordType> {
    children: ReactNode;
    loading?: ReactNode;
}
//# sourceMappingURL=CreateBase.d.ts.map