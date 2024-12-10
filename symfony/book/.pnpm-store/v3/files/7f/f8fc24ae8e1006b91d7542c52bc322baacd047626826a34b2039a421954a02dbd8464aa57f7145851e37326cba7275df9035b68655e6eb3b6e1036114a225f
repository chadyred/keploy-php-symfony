import { InfiniteQueryObserverBaseResult, InfiniteData } from '@tanstack/react-query';
import { UseInfiniteGetListOptions } from '../../dataProvider';
import { RaRecord, SortPayload, FilterPayload, Exporter, GetInfiniteListResult } from '../../types';
import { ListControllerResult } from './useListController';
/**
 * Prepare data for the InfiniteList view
 *
 * @param {Object} props The props passed to the InfiniteList component.
 *
 * @return {Object} controllerProps Fetched and computed data for the List view
 *
 * @example
 *
 * import { useInfiniteListController } from 'react-admin';
 * import ListView from './ListView';
 *
 * const MyList = props => {
 *     const controllerProps = useInfiniteListController(props);
 *     return <ListView {...controllerProps} {...props} />;
 * }
 */
export declare const useInfiniteListController: <RecordType extends RaRecord<import("../../types").Identifier> = any>(props?: InfiniteListControllerProps<RecordType>) => InfiniteListControllerResult<RecordType>;
export interface InfiniteListControllerProps<RecordType extends RaRecord = any> {
    debounce?: number;
    disableAuthentication?: boolean;
    /**
     * Whether to disable the synchronization of the list parameters with the current location (URL search parameters)
     */
    disableSyncWithLocation?: boolean;
    exporter?: Exporter | false;
    filter?: FilterPayload;
    filterDefaultValues?: object;
    perPage?: number;
    queryOptions?: UseInfiniteGetListOptions<RecordType>;
    resource?: string;
    sort?: SortPayload;
    storeKey?: string | false;
}
export type InfiniteListControllerResult<RecordType extends RaRecord = any> = ListControllerResult<RecordType> & {
    fetchNextPage: InfiniteQueryObserverBaseResult<InfiniteData<GetInfiniteListResult<RecordType>>>['fetchNextPage'];
    fetchPreviousPage: InfiniteQueryObserverBaseResult<InfiniteData<GetInfiniteListResult<RecordType>>>['fetchPreviousPage'];
    isFetchingNextPage: InfiniteQueryObserverBaseResult<InfiniteData<GetInfiniteListResult<RecordType>>>['isFetchingNextPage'];
    isFetchingPreviousPage: InfiniteQueryObserverBaseResult<InfiniteData<GetInfiniteListResult<RecordType>>>['isFetchingPreviousPage'];
};
//# sourceMappingURL=useInfiniteListController.d.ts.map