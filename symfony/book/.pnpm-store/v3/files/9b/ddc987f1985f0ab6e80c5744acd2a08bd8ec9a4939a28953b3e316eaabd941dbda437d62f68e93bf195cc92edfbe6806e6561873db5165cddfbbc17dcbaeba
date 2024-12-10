import React, { ComponentType, ErrorInfo } from 'react';
import { SxProps } from '@mui/material/styles';
import { AppBarProps } from './AppBar';
import { SidebarProps } from './Sidebar';
import { MenuProps } from './Menu';
import { ErrorProps } from './Error';
export declare const Layout: (props: LayoutProps) => React.JSX.Element;
export interface LayoutProps {
    appBar?: ComponentType<AppBarProps>;
    appBarAlwaysOn?: boolean;
    className?: string;
    children: React.ReactNode;
    error?: ComponentType<ErrorProps>;
    menu?: ComponentType<MenuProps>;
    sidebar?: ComponentType<SidebarProps>;
    sx?: SxProps;
}
export interface LayoutState {
    hasError: boolean;
    error?: Error;
    errorInfo?: ErrorInfo;
}
export declare const LayoutClasses: {
    appFrame: string;
    contentWithSidebar: string;
    content: string;
};
//# sourceMappingURL=Layout.d.ts.map