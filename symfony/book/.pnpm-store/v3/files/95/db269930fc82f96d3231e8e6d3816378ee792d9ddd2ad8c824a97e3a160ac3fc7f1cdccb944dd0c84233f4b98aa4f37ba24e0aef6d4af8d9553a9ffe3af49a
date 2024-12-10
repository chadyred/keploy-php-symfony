import { Location } from 'react-router-dom';
import { UseMutationOptions } from '@tanstack/react-query';
import { UseCreateMutateParams } from '../../dataProvider';
import { RedirectionSideEffect } from '../../routing';
import { SaveContextValue } from '../saveContext';
import { Identifier, RaRecord, TransformData } from '../../types';
/**
 * Prepare data for the Create view
 *
 * @param {Object} props The props passed to the Create component.
 *
 * @return {Object} controllerProps Fetched data and callbacks for the Create view
 *
 * @example
 *
 * import { useCreateController } from 'react-admin';
 * import CreateView from './CreateView';
 *
 * const MyCreate = props => {
 *     const controllerProps = useCreateController(props);
 *     return <CreateView {...controllerProps} {...props} />;
 * }
 */
export declare const useCreateController: <RecordType extends Omit<RaRecord<Identifier>, "id"> = any, MutationOptionsError = Error, ResultRecordType extends RaRecord<Identifier> = RecordType & {
    id: Identifier;
}>(props?: CreateControllerProps<RecordType, MutationOptionsError, ResultRecordType>) => CreateControllerResult<RecordType>;
export interface CreateControllerProps<RecordType extends Omit<RaRecord, 'id'> = any, MutationOptionsError = Error, ResultRecordType extends RaRecord = RecordType & {
    id: Identifier;
}> {
    disableAuthentication?: boolean;
    hasEdit?: boolean;
    hasShow?: boolean;
    record?: Partial<RecordType>;
    redirect?: RedirectionSideEffect;
    resource?: string;
    mutationOptions?: UseMutationOptions<ResultRecordType, MutationOptionsError, UseCreateMutateParams<RecordType>> & {
        meta?: any;
    };
    transform?: TransformData;
}
export interface CreateControllerResult<RecordType extends Omit<RaRecord, 'id'> = any> extends SaveContextValue {
    defaultTitle?: string;
    isFetching: boolean;
    isPending: boolean;
    isLoading: boolean;
    record?: Partial<RecordType>;
    redirect: RedirectionSideEffect;
    resource: string;
    saving: boolean;
}
/**
 * Get the initial record from the location, whether it comes from the location
 * state or is serialized in the url search part.
 */
export declare const getRecordFromLocation: ({ state, search }: Location) => any;
//# sourceMappingURL=useCreateController.d.ts.map