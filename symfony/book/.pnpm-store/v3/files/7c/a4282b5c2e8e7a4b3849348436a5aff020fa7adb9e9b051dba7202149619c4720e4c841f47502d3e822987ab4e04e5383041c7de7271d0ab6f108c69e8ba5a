"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.WithListContext = void 0;
var useListContext_1 = require("./useListContext");
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
var WithListContext = function (_a) {
    var render = _a.render;
    return render((0, useListContext_1.useListContext)()) || null;
};
exports.WithListContext = WithListContext;
//# sourceMappingURL=WithListContext.js.map