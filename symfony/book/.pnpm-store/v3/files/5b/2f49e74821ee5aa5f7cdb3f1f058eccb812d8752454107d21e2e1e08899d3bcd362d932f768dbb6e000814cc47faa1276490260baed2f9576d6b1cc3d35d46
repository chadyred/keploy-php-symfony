import * as React from 'react';
import { useRecordContext } from './useRecordContext';
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
export var WithRecord = function (_a) {
    var render = _a.render;
    var record = useRecordContext();
    return record ? React.createElement(React.Fragment, null, render(record)) : null;
};
//# sourceMappingURL=WithRecord.js.map