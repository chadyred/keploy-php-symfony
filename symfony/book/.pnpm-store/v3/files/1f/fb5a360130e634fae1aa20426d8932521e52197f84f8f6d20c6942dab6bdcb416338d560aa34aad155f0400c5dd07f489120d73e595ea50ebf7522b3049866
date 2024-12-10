import { RaRecord } from '../../types';
type UseRecordSelectionWithResourceArgs = {
    resource: string;
    disableSyncWithStore?: false;
};
type UseRecordSelectionWithNoStoreArgs = {
    resource?: string;
    disableSyncWithStore: true;
};
export type UseRecordSelectionArgs = UseRecordSelectionWithResourceArgs | UseRecordSelectionWithNoStoreArgs;
export type UseRecordSelectionResult<RecordType extends RaRecord = any> = [
    RecordType['id'][],
    {
        select: (ids: RecordType['id'][]) => void;
        unselect: (ids: RecordType['id'][]) => void;
        toggle: (id: RecordType['id']) => void;
        clearSelection: () => void;
    }
];
/**
 * Get the list of selected items for a resource, and callbacks to change the selection
 *
 * @param args.resource The resource name, e.g. 'posts'
 * @param args.disableSyncWithStore Controls the selection syncronization with the store
 *
 * @returns {Object} Destructure as [selectedIds, { select, toggle, clearSelection }].
 */
export declare const useRecordSelection: <RecordType extends RaRecord<import("../../types").Identifier> = any>(args: UseRecordSelectionArgs) => UseRecordSelectionResult<RecordType>;
export {};
//# sourceMappingURL=useRecordSelection.d.ts.map