import { useCallback } from 'react';
import { useQueryClient } from '@tanstack/react-query';
const useUpdateCache = () => {
    const queryClient = useQueryClient();
    // From https://github.com/marmelab/react-admin/blob/next/packages/ra-core/src/dataProvider/useUpdate.ts
    return useCallback(({ resource, id, data, }) => {
        const updateColl = (old) => {
            const index = old.findIndex(
            // eslint-disable-next-line eqeqeq
            (record) => record.id == id);
            if (index === -1) {
                return old;
            }
            return [
                ...old.slice(0, index),
                Object.assign(Object.assign({}, old[index]), data),
                ...old.slice(index + 1),
            ];
        };
        queryClient.setQueryData([resource, 'getOne', { id: String(id) }], (record) => (Object.assign(Object.assign({}, record), data)));
        queryClient.setQueriesData({ queryKey: [resource, 'getList'] }, (res) => (res === null || res === void 0 ? void 0 : res.data)
            ? { data: updateColl(res.data), total: res.total }
            : { data: [data] });
        queryClient.setQueriesData({ queryKey: [resource, 'getMany'] }, (coll) => coll && coll.length > 0 ? updateColl(coll) : [data]);
        queryClient.setQueriesData({ queryKey: [resource, 'getManyReference'] }, (res) => (res === null || res === void 0 ? void 0 : res.data)
            ? { data: updateColl(res.data), total: res.total }
            : { data: [data] });
    }, [queryClient]);
};
export default useUpdateCache;
//# sourceMappingURL=useUpdateCache.js.map