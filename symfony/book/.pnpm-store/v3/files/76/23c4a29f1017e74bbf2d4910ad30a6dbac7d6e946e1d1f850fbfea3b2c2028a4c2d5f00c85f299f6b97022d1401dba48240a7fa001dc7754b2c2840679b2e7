import * as React from 'react';
import { ReactNode } from 'react';
/**
 * Render prop version of useRecordContext
 *
 * @example
 * const BookShow = () => (
 *    <Show>
 *       <SimpleShowLayout>
 *          <WithRecord render={record => <span>{record.title}</span>} />
 *      </SimpleShowLayout>
 *   </Show>
 * );
 */
export declare const WithRecord: <RecordType extends Record<string, any> = any>({ render, }: WithRecordProps<RecordType>) => React.JSX.Element | null;
export interface WithRecordProps<RecordType extends Record<string, any> = any> {
    render: (record: RecordType) => ReactNode;
    label?: string;
}
//# sourceMappingURL=WithRecord.d.ts.map