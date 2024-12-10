import { RaRecord, MutationMode, TransformData } from '../../types';
import { RedirectionSideEffect } from '../../routing';
import { UseGetOneHookValue, UseGetOneOptions, UseUpdateOptions } from '../../dataProvider';
import { SaveContextValue } from '../saveContext';
/**
 * Prepare data for the Edit view.
 *
 * useEditController does a few things:
 * - it grabs the id from the URL and the resource name from the ResourceContext,
 * - it fetches the record via useGetOne,
 * - it prepares the page title.
 *
 * @param {Object} props The props passed to the Edit component.
 *
 * @return {Object} controllerProps Fetched data and callbacks for the Edit view
 *
 * @example
 *
 * import { useEditController } from 'react-admin';
 * import EditView from './EditView';
 *
 * const MyEdit = () => {
 *     const controllerProps = useEditController({ resource: 'posts', id: 123 });
 *     return <EditView {...controllerProps} {...props} />;
 * }
 */
export declare const useEditController: <RecordType extends RaRecord<import("../../types").Identifier> = any, ErrorType = Error>(props?: EditControllerProps<RecordType, ErrorType>) => EditControllerResult<RecordType>;
export interface EditControllerProps<RecordType extends RaRecord = any, ErrorType = Error> {
    disableAuthentication?: boolean;
    id?: RecordType['id'];
    mutationMode?: MutationMode;
    mutationOptions?: UseUpdateOptions<RecordType, ErrorType>;
    queryOptions?: UseGetOneOptions<RecordType>;
    redirect?: RedirectionSideEffect;
    resource?: string;
    transform?: TransformData;
    [key: string]: any;
}
export interface EditControllerBaseResult<RecordType extends RaRecord = any> extends SaveContextValue<RecordType> {
    defaultTitle?: string;
    isFetching: boolean;
    isLoading: boolean;
    refetch: UseGetOneHookValue<RecordType>['refetch'];
    redirect: RedirectionSideEffect;
    resource: string;
    saving: boolean;
}
export interface EditControllerLoadingResult<RecordType extends RaRecord = any> extends EditControllerBaseResult<RecordType> {
    record: undefined;
    error: null;
    isPending: true;
}
export interface EditControllerLoadingErrorResult<RecordType extends RaRecord = any, TError = Error> extends EditControllerBaseResult<RecordType> {
    record: undefined;
    error: TError;
    isPending: false;
}
export interface EditControllerRefetchErrorResult<RecordType extends RaRecord = any, TError = Error> extends EditControllerBaseResult<RecordType> {
    record: RecordType;
    error: TError;
    isPending: false;
}
export interface EditControllerSuccessResult<RecordType extends RaRecord = any> extends EditControllerBaseResult<RecordType> {
    record: RecordType;
    error: null;
    isPending: false;
}
export type EditControllerResult<RecordType extends RaRecord = any> = EditControllerLoadingResult<RecordType> | EditControllerLoadingErrorResult<RecordType> | EditControllerRefetchErrorResult<RecordType> | EditControllerSuccessResult<RecordType>;
//# sourceMappingURL=useEditController.d.ts.map