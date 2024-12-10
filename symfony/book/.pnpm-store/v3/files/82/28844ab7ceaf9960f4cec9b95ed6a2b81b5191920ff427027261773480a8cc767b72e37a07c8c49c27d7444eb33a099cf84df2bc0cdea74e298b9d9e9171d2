import * as React from 'react';
import { ReactNode } from 'react';
/**
 * Renders a menu with one menu item per resource by default. You can also set menu items by hand.
 *
 * @example
 * import * as React from 'react';
 * import { Menu } from 'react-admin';
 *
 * import BookIcon from '@mui/icons-material/Book';
 * import ChatBubbleIcon from '@mui/icons-material/ChatBubble';
 * import PeopleIcon from '@mui/icons-material/People';
 * import LabelIcon from '@mui/icons-material/Label';
 *
 * export const MyMenu = () => (
 *     <Menu>
 *         <Menu.DashboardItem />
 *         <Menu.Item to="/posts" primaryText="Posts" leftIcon={<BookIcon />}/>
 *         <Menu.Item to="/comments" primaryText="Comments" leftIcon={<ChatBubbleIcon />}/>
 *         <Menu.Item to="/users" primaryText="Users" leftIcon={<PeopleIcon />}/>
 *         <Menu.Item to="/custom-route" primaryText="Miscellaneous" leftIcon={<LabelIcon />}/>
 *     </Menu>
 * );
 */
export declare const Menu: {
    (props: MenuProps): React.JSX.Element;
    Item: React.ForwardRefExoticComponent<Omit<import("./MenuItemLink").MenuItemLinkProps, "ref"> & React.RefAttributes<any>>;
    DashboardItem: (props: import("./DashboardMenuItem").DashboardMenuItemProps) => React.JSX.Element;
    ResourceItem: ({ name }: {
        name: string;
    }) => React.JSX.Element | null;
    ResourceItems: () => React.JSX.Element;
};
export interface MenuProps {
    children?: ReactNode;
    className?: string;
    dense?: boolean;
    [key: string]: any;
}
export declare const MenuClasses: {
    open: string;
    closed: string;
};
//# sourceMappingURL=Menu.d.ts.map