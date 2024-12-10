import * as React from 'react';
import { ReactElement, ReactNode } from 'react';
import { SxProps } from '@mui/material';
import { RaRecord } from 'ra-core';
import { UseFieldArrayReturn } from 'react-hook-form';
import { DisableRemoveFunction } from './SimpleFormIteratorItem';
export declare const SimpleFormIterator: (inProps: SimpleFormIteratorProps) => React.JSX.Element | null;
type GetItemLabelFunc = (index: number) => string | ReactElement;
export interface SimpleFormIteratorProps extends Partial<UseFieldArrayReturn> {
    addButton?: ReactElement;
    children?: ReactNode;
    className?: string;
    readOnly?: boolean;
    disabled?: boolean;
    disableAdd?: boolean;
    disableClear?: boolean;
    disableRemove?: boolean | DisableRemoveFunction;
    disableReordering?: boolean;
    fullWidth?: boolean;
    getItemLabel?: boolean | GetItemLabelFunc;
    inline?: boolean;
    meta?: {
        error?: any;
        submitFailed?: boolean;
    };
    record?: RaRecord;
    removeButton?: ReactElement;
    reOrderButtons?: ReactElement;
    resource?: string;
    source?: string;
    sx?: SxProps;
}
export {};
//# sourceMappingURL=SimpleFormIterator.d.ts.map