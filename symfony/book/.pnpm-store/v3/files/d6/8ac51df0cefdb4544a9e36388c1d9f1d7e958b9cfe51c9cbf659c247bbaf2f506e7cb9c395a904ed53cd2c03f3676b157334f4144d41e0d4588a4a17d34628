import { useQuery } from '@tanstack/react-query';
import { useDataProvider } from 'react-admin';
const useIntrospect = (options) => {
    const dataProvider = useDataProvider();
    return useQuery(Object.assign({ queryKey: ['introspect'], queryFn: () => dataProvider.introspect(), enabled: false }, options));
};
export default useIntrospect;
//# sourceMappingURL=useIntrospect.js.map