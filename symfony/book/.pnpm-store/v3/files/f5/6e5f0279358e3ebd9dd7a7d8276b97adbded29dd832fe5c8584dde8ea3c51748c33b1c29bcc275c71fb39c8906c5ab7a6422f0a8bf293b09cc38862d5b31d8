import { useListContext } from './useListContext';
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
export var WithListContext = function (_a) {
    var render = _a.render;
    return render(useListContext()) || null;
};
//# sourceMappingURL=WithListContext.js.map