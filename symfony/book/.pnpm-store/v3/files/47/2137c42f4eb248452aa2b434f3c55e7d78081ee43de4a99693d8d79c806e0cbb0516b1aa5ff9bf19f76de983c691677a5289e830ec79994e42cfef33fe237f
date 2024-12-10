import { ReactEventHandler } from 'react';
import { UseMutationOptions } from '@tanstack/react-query';
import { RedirectionSideEffect } from '../../routing';
import { RaRecord, DeleteParams } from '../../types';
/**
 * Prepare callback for a Delete button with undo support
 *
 * @example
 *
 * import React from 'react';
 * import ActionDelete from '@mui/icons-material/Delete';
 * import { Button, useDeleteWithUndoController } from 'react-admin';
 *
 * const DeleteButton = ({
 *     resource,
 *     record,
 *     redirect,
 *     onClick,
 *     ...rest
 * }) => {
 *     const { isPending, handleDelete } = useDeleteWithUndoController({
 *         resource,
 *         record,
 *         redirect,
 *         onClick,
 *     });
 *
 *     return (
 *         <Button
 *             onClick={handleDelete}
 *             disabled={isPending}
 *             label="ra.action.delete"
 *             {...rest}
 *         >
 *             <ActionDelete />
 *         </Button>
 *     );
 * };
 */
declare const useDeleteWithUndoController: <RecordType extends RaRecord<import("../../types").Identifier> = any>(props: UseDeleteWithUndoControllerParams<RecordType, unknown>) => UseDeleteWithUndoControllerReturn;
export interface UseDeleteWithUndoControllerParams<RecordType extends RaRecord = any, MutationOptionsError = unknown> {
    record?: RecordType;
    redirect?: RedirectionSideEffect;
    resource?: string;
    onClick?: ReactEventHandler<any>;
    mutationOptions?: UseMutationOptions<RecordType, MutationOptionsError, DeleteParams<RecordType>>;
    successMessage?: string;
}
export interface UseDeleteWithUndoControllerReturn {
    isPending: boolean;
    isLoading: boolean;
    handleDelete: ReactEventHandler<any>;
}
export default useDeleteWithUndoController;
//# sourceMappingURL=useDeleteWithUndoController.d.ts.map