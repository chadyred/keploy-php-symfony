import * as React from 'react';
import { ReactElement, ReactEventHandler } from 'react';
import { UseMutationOptions } from '@tanstack/react-query';
import { RaRecord, DeleteParams, RedirectionSideEffect } from 'ra-core';
import { ButtonProps } from './Button';
export declare const DeleteWithUndoButton: <RecordType extends RaRecord<import("ra-core").Identifier> = any>(props: DeleteWithUndoButtonProps<RecordType, unknown>) => React.JSX.Element;
export interface DeleteWithUndoButtonProps<RecordType extends RaRecord = any, MutationOptionsError = unknown> extends ButtonProps {
    icon?: ReactElement;
    onClick?: ReactEventHandler<any>;
    mutationOptions?: UseMutationOptions<RecordType, MutationOptionsError, DeleteParams<RecordType>>;
    record?: RecordType;
    redirect?: RedirectionSideEffect;
    resource?: string;
    successMessage?: string;
}
//# sourceMappingURL=DeleteWithUndoButton.d.ts.map