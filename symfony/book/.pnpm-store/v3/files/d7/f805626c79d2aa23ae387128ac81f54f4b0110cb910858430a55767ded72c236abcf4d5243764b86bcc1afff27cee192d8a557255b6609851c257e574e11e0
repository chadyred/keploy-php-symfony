import React, { ReactEventHandler, ReactElement } from 'react';
import { UseMutationOptions } from '@tanstack/react-query';
import { MutationMode, RaRecord, DeleteParams, RedirectionSideEffect } from 'ra-core';
import { ButtonProps } from './Button';
export declare const DeleteWithConfirmButton: <RecordType extends RaRecord<import("ra-core").Identifier> = any>(props: DeleteWithConfirmButtonProps<RecordType, unknown>) => React.JSX.Element;
export interface DeleteWithConfirmButtonProps<RecordType extends RaRecord = any, MutationOptionsError = unknown> extends ButtonProps {
    confirmTitle?: React.ReactNode;
    confirmContent?: React.ReactNode;
    confirmColor?: 'primary' | 'warning';
    icon?: ReactElement;
    mutationMode?: MutationMode;
    onClick?: ReactEventHandler<any>;
    translateOptions?: object;
    mutationOptions?: UseMutationOptions<RecordType, MutationOptionsError, DeleteParams<RecordType>>;
    record?: RecordType;
    redirect?: RedirectionSideEffect;
    resource?: string;
    successMessage?: string;
}
//# sourceMappingURL=DeleteWithConfirmButton.d.ts.map