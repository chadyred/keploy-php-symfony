import * as React from 'react';
import { ReactElement } from 'react';
import { MutationMode, RaRecord, UpdateManyParams } from 'ra-core';
import { ButtonProps } from './Button';
import { UseMutationOptions } from '@tanstack/react-query';
export declare const BulkUpdateWithConfirmButton: (props: BulkUpdateWithConfirmButtonProps) => React.JSX.Element;
export interface BulkUpdateWithConfirmButtonProps<RecordType extends RaRecord = any, MutationOptionsError = unknown> extends ButtonProps {
    confirmContent?: React.ReactNode;
    confirmTitle?: React.ReactNode;
    icon?: ReactElement;
    data: any;
    onSuccess?: () => void;
    onError?: (error: any) => void;
    mutationMode?: MutationMode;
    mutationOptions?: UseMutationOptions<RecordType, MutationOptionsError, UpdateManyParams<RecordType>> & {
        meta?: any;
    };
}
//# sourceMappingURL=BulkUpdateWithConfirmButton.d.ts.map