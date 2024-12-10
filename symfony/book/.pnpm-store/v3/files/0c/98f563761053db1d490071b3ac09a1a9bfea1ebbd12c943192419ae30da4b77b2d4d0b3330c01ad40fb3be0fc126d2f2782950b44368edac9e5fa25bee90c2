import * as React from 'react';
import { ButtonProps as MuiButtonProps } from '@mui/material';
import { Path, To } from 'react-router';
/**
 * A generic Button with side icon. Only the icon is displayed on small screens.
 *
 * The component translates the label. Pass the icon as child.
 * The icon displays on the left side of the button by default. Set alignIcon prop to 'right' to inverse.
 *
 * @example
 *
 * <Button label="Edit" color="secondary" onClick={doEdit}>
 *   <ContentCreate />
 * </Button>
 *
 */
export declare const Button: <RootComponent extends React.ElementType<any, keyof React.JSX.IntrinsicElements> = "button">(inProps: ButtonProps<RootComponent>) => React.JSX.Element;
interface Props<RootComponent extends React.ElementType> {
    alignIcon?: 'left' | 'right';
    children?: React.ReactElement;
    className?: string;
    component?: RootComponent;
    to?: LocationDescriptor | To;
    disabled?: boolean;
    label?: string;
    size?: 'small' | 'medium' | 'large';
    variant?: string;
}
export type ButtonProps<RootComponent extends React.ElementType = 'button'> = Props<RootComponent> & MuiButtonProps<RootComponent>;
export type LocationDescriptor = Partial<Path> & {
    redirect?: boolean;
    state?: any;
    replace?: boolean;
};
export {};
//# sourceMappingURL=Button.d.ts.map