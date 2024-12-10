import { ReactElement } from 'react';
import { ControllerFieldState, ControllerRenderProps, UseControllerProps, UseControllerReturn, UseFormStateReturn } from 'react-hook-form';
import { Validator } from './validation';
export declare const useInput: <ValueType = any>(props: InputProps<ValueType>) => UseInputValue;
export type InputProps<ValueType = any> = Omit<UseControllerProps, 'name' | 'defaultValue' | 'rules'> & Partial<UseControllerReturn> & {
    alwaysOn?: any;
    defaultValue?: any;
    format?: (value: ValueType) => any;
    id?: string;
    isRequired?: boolean;
    label?: string | ReactElement | false;
    helperText?: string | ReactElement | false;
    name?: string;
    onBlur?: (...event: any[]) => void;
    onChange?: (...event: any[]) => void;
    parse?: (value: any) => ValueType;
    type?: string;
    resource?: string;
    source: string;
    validate?: Validator | Validator[];
    readOnly?: boolean;
    disabled?: boolean;
};
export type UseInputValue = {
    id: string;
    isRequired: boolean;
    field: ControllerRenderProps;
    formState: UseFormStateReturn<Record<string, string>>;
    fieldState: ControllerFieldState;
};
//# sourceMappingURL=useInput.d.ts.map