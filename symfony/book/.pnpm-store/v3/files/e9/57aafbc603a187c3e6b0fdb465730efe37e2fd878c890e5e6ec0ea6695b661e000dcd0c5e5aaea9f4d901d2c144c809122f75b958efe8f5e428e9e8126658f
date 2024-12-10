import { ReactElement } from 'react';
import { RaRecord } from '../../types';
import { ListControllerResult } from './useListController';
/**
 * Render prop version of useListContext
 *
 * @example
 * const BookList = () => (
 *    <List>
 *       <WithListContext render={({ data }) => (
 *          <ul>
 *            {data && data.map(record => (
 *              <li key={record.id}>{record.title}</li>
 *            ))}
 *          </ul>
 *       )} />
 *   </List>
 * );
 */
export declare const WithListContext: <RecordType extends RaRecord<import("../../types").Identifier>>({ render, }: WithListContextProps<RecordType>) => ReactElement<any, string | import("react").JSXElementConstructor<any>> | null;
export interface WithListContextProps<RecordType extends RaRecord> {
    render: (context: ListControllerResult<RecordType>) => ReactElement | false | null;
    label?: string;
}
//# sourceMappingURL=WithListContext.d.ts.map