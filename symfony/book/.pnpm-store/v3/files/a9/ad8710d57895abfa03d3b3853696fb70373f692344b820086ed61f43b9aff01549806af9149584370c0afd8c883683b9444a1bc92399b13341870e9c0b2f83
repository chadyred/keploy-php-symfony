import * as React from 'react';
import { ComponentType, ErrorInfo, HtmlHTMLAttributes } from 'react';
import { FallbackProps } from 'react-error-boundary';
import type { TitleComponent } from 'ra-core';
export declare const Error: (props: InternalErrorProps & {
    errorComponent?: ComponentType<ErrorProps>;
}) => React.JSX.Element;
interface InternalErrorProps extends Omit<HtmlHTMLAttributes<HTMLDivElement>, 'title'>, FallbackProps {
    className?: string;
    errorInfo?: ErrorInfo;
}
export interface ErrorProps extends Pick<FallbackProps, 'error'> {
    errorInfo?: ErrorInfo;
    title?: TitleComponent;
}
export declare const ErrorClasses: {
    container: string;
    title: string;
    icon: string;
    panel: string;
    panelSumary: string;
    panelDetails: string;
    toolbar: string;
    advice: string;
};
export {};
//# sourceMappingURL=Error.d.ts.map