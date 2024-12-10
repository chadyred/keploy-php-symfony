import React from 'react';
import type { ComponentType, ErrorInfo, HtmlHTMLAttributes } from 'react';
import type { ErrorProps } from 'react-admin';
import type { FallbackProps } from 'react-error-boundary';
export declare const ErrorClasses: {
    container: string;
    title: string;
    logo: string;
    panel: string;
    panelSummary: string;
    panelDetails: string;
    toolbar: string;
    advice: string;
};
interface InternalErrorProps extends Omit<HtmlHTMLAttributes<HTMLDivElement>, 'title'>, FallbackProps {
    className?: string;
    errorInfo?: ErrorInfo;
}
declare const Error: ({ error, errorComponent: ErrorComponent, errorInfo, resetErrorBoundary, className, ...rest }: InternalErrorProps & {
    errorComponent?: ComponentType<ErrorProps>;
}) => React.JSX.Element;
export default Error;
//# sourceMappingURL=Error.d.ts.map