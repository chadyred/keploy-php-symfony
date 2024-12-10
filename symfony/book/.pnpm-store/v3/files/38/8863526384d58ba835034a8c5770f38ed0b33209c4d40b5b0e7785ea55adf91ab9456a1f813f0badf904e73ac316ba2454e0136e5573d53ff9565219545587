import * as React from 'react';
import type { SxProps } from '@mui/material';
import { ReactNode, ReactElement } from 'react';
import { ListProps } from '@mui/material';
import { Identifier, RaRecord } from 'ra-core';
/**
 * The <SimpleList> component renders a list of records as a Material UI <List>.
 * It is usually used as a child of react-admin's <List> and <ReferenceManyField> components.
 *
 * Also widely used on Mobile.
 *
 * Props:
 * - primaryText: function returning a React element (or some text) based on the record
 * - secondaryText: same
 * - tertiaryText: same
 * - leftAvatar: function returning a React element based on the record
 * - leftIcon: same
 * - rightAvatar: same
 * - rightIcon: same
 * - linkType: 'edit' or 'show', or a function returning 'edit' or 'show' based on the record
 * - rowStyle: function returning a style object based on (record, index)
 * - rowSx: function returning a sx object based on (record, index)
 *
 * @example // Display all posts as a List
 * const postRowSx = (record, index) => ({
 *     backgroundColor: record.views >= 500 ? '#efe' : 'white',
 * });
 * export const PostList = () => (
 *     <List>
 *         <SimpleList
 *             primaryText={record => record.title}
 *             secondaryText={record => `${record.views} views`}
 *             tertiaryText={record =>
 *                 new Date(record.published_at).toLocaleDateString()
 *             }
 *             rowSx={postRowSx}
 *          />
 *     </List>
 * );
 */
export declare const SimpleList: <RecordType extends RaRecord<Identifier> = any>(props: SimpleListProps<RecordType>) => React.JSX.Element | null;
export type FunctionToElement<RecordType extends RaRecord = any> = (record: RecordType, id: Identifier) => ReactNode;
export interface SimpleListProps<RecordType extends RaRecord = any> extends Omit<ListProps, 'classes'> {
    className?: string;
    empty?: ReactElement;
    hasBulkActions?: boolean;
    leftAvatar?: FunctionToElement<RecordType>;
    leftIcon?: FunctionToElement<RecordType>;
    primaryText?: FunctionToElement<RecordType> | ReactElement | string;
    linkType?: string | FunctionLinkType | false;
    rightAvatar?: FunctionToElement<RecordType>;
    rightIcon?: FunctionToElement<RecordType>;
    secondaryText?: FunctionToElement<RecordType> | ReactElement | string;
    tertiaryText?: FunctionToElement<RecordType> | ReactElement | string;
    rowSx?: (record: RecordType, index: number) => SxProps;
    rowStyle?: (record: RecordType, index: number) => any;
    resource?: string;
    data?: RecordType[];
    isLoading?: boolean;
    isPending?: boolean;
    isLoaded?: boolean;
    total?: number;
}
export type FunctionLinkType = (record: RaRecord, id: Identifier) => string;
export interface LinkOrNotProps {
    linkType: string | FunctionLinkType | false;
    resource?: string;
    id: Identifier;
    record: RaRecord;
    children: ReactNode;
}
export declare const SimpleListClasses: {
    tertiary: string;
};
//# sourceMappingURL=SimpleList.d.ts.map