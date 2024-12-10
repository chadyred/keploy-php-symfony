import * as React from 'react';
import { ReactElement } from 'react';
import { MutationMode, RaRecord, DeleteManyParams } from 'ra-core';
import { ButtonProps } from './Button';
import { UseMutationOptions } from '@tanstack/react-query';
export declare const BulkDeleteWithConfirmButton: (props: BulkDeleteWithConfirmButtonProps) => React.JSX.Element;
export interface BulkDeleteWithConfirmButtonProps<RecordType extends RaRecord = any, MutationOptionsError = unknown> extends ButtonProps {
    confirmContent?: React.ReactNode;
    confirmTitle?: React.ReactNode;
    confirmColor?: 'primary' | 'warning';
    icon?: ReactElement;
    mutationMode: MutationMode;
    mutationOptions?: UseMutationOptions<RecordType, MutationOptionsError, DeleteManyParams<RecordType>> & {
        meta?: any;
    };
    successMessage?: string;
}
//# sourceMappingURL=BulkDeleteWithConfirmButton.d.ts.map