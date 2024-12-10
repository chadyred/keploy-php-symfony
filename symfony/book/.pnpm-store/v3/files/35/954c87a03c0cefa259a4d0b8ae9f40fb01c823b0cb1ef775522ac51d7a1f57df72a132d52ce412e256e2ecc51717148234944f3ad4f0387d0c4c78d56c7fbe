import * as React from 'react';
import { MouseEventHandler, ComponentType } from 'react';
import { DialogProps } from '@mui/material/Dialog';
/**
 * Confirmation dialog
 *
 * @example
 * <Confirm
 *     isOpen={true}
 *     title="Delete Item"
 *     content="Are you sure you want to delete this item?"
 *     confirm="Yes"
 *     confirmColor="primary"
 *     ConfirmIcon=ActionCheck
 *     CancelIcon=AlertError
 *     cancel="Cancel"
 *     onConfirm={() => { // do something }}
 *     onClose={() => { // do something }}
 * />
 */
export declare const Confirm: (props: ConfirmProps) => React.JSX.Element;
export interface ConfirmProps extends Omit<DialogProps, 'open' | 'onClose' | 'title' | 'content'> {
    cancel?: string;
    className?: string;
    confirm?: string;
    confirmColor?: 'primary' | 'warning';
    ConfirmIcon?: ComponentType;
    CancelIcon?: ComponentType;
    content: React.ReactNode;
    isOpen?: boolean;
    loading?: boolean;
    onClose: MouseEventHandler;
    onConfirm: MouseEventHandler;
    title: React.ReactNode;
    translateOptions?: object;
}
export declare const ConfirmClasses: {
    confirmPrimary: string;
    confirmWarning: string;
};
//# sourceMappingURL=Confirm.d.ts.map