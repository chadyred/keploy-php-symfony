var __assign = (this && this.__assign) || function () {
    __assign = Object.assign || function(t) {
        for (var s, i = 1, n = arguments.length; i < n; i++) {
            s = arguments[i];
            for (var p in s) if (Object.prototype.hasOwnProperty.call(s, p))
                t[p] = s[p];
        }
        return t;
    };
    return __assign.apply(this, arguments);
};
var __rest = (this && this.__rest) || function (s, e) {
    var t = {};
    for (var p in s) if (Object.prototype.hasOwnProperty.call(s, p) && e.indexOf(p) < 0)
        t[p] = s[p];
    if (s != null && typeof Object.getOwnPropertySymbols === "function")
        for (var i = 0, p = Object.getOwnPropertySymbols(s); i < p.length; i++) {
            if (e.indexOf(p[i]) < 0 && Object.prototype.propertyIsEnumerable.call(s, p[i]))
                t[p[i]] = s[p[i]];
        }
    return t;
};
import * as React from 'react';
import { BulkUpdateWithConfirmButton, } from './BulkUpdateWithConfirmButton';
import { BulkUpdateWithUndoButton, } from './BulkUpdateWithUndoButton';
/**
 * Updates the selected rows.
 *
 * To be used inside the <Datagrid bulkActionButtons> prop (where it's enabled by default).
 *
 * @example // basic usage
 * import { BulkUpdateButton, BulkExportButton, List, Datagrid } from 'react-admin';
 *
 * const PostBulkActionButtons = () => (
 *     <>
 *         <BulkExportButton />
 *         <BulkUpdateButton label="Reset Views" data={{ views: 0 }} />
 *     </>
 * );
 *
 * export const PostList = () => (
 *     <List>
 *        <Datagrid bulkActionButtons={<PostBulkActionButtons />}>
 *          ...
 *        </Datagrid>
 *     </List>
 * );
 */
export var BulkUpdateButton = function (props) {
    var _a = props.mutationMode, mutationMode = _a === void 0 ? 'undoable' : _a, _b = props.data, data = _b === void 0 ? defaultData : _b, rest = __rest(props, ["mutationMode", "data"]);
    return mutationMode === 'undoable' ? (React.createElement(BulkUpdateWithUndoButton, __assign({ data: data }, rest))) : (React.createElement(BulkUpdateWithConfirmButton, __assign({ mutationMode: mutationMode, data: data }, rest)));
};
var defaultData = [];
//# sourceMappingURL=BulkUpdateButton.js.map