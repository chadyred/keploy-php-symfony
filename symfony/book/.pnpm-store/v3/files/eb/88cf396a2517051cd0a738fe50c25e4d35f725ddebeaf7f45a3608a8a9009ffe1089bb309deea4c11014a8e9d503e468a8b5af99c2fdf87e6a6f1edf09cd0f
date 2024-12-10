import { ReactElement } from 'react';
import { ListBaseProps, RaRecord } from 'ra-core';
import { ListViewProps } from './ListView';
/**
 * List page component
 *
 * The <List> component renders the list layout (title, buttons, filters, pagination),
 * and fetches the list of records from the REST API.
 *
 * It then delegates the rendering of the list of records to its child component.
 * Usually, it's a <Datagrid>, responsible for displaying a table with one row for each post.
 *
 * The <List> component accepts the following props:
 *
 * - actions
 * - aside: Side Component
 * - children: List Layout
 * - component
 * - disableAuthentication
 * - disableSyncWithLocation
 * - empty: Empty Page Component
 * - emptyWhileLoading
 * - exporter
 * - filters: Filter Inputs
 * - filter: Permanent Filter
 * - filterDefaultValues
 * - pagination: Pagination Component
 * - perPage: Pagination Size
 * - queryOptions
 * - sort: Default Sort Field & Order
 * - title
 * - sx: CSS API
 *
 * @example
 * const postFilters = [
 *     <TextInput label="Search" source="q" alwaysOn />,
 *     <TextInput label="Title" source="title" />
 * ];
 * export const PostList = () => (
 *     <List
 *         title="List of posts"
 *         sort={{ field: 'published_at' }}
 *         filter={{ is_published: true }}
 *         filters={postFilters}
 *     >
 *         <Datagrid>
 *             <TextField source="id" />
 *             <TextField source="title" />
 *             <EditButton />
 *         </Datagrid>
 *     </List>
 * );
 */
export declare const List: <RecordType extends RaRecord<import("ra-core").Identifier> = any>({ debounce, disableAuthentication, disableSyncWithLocation, exporter, filter, filterDefaultValues, loading, perPage, queryOptions, resource, sort, storeKey, ...rest }: ListProps<RecordType>) => ReactElement;
export interface ListProps<RecordType extends RaRecord = any> extends ListBaseProps<RecordType>, ListViewProps {
}
//# sourceMappingURL=List.d.ts.map