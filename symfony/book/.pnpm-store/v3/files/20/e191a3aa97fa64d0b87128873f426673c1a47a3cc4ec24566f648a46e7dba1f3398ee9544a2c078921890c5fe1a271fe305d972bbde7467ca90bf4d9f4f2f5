import { ReactElement } from 'react';
import { CreateBaseProps, Identifier, RaRecord } from 'ra-core';
import { CreateViewProps } from './CreateView';
/**
 * Page component for the Create view
 *
 * The `<Create>` component renders the page title and actions.
 * It is not responsible for rendering the actual form -
 * that's the job of its child component (usually `<SimpleForm>`),
 * to which it passes the `record` as prop.
 *
 * The <Create> component accepts the following props:
 *
 * - actions
 * - aside
 * - component
 * - mutationOptions
 * - title
 *
 * @example
 *
 * // in src/posts.js
 * import * as React from "react";
 * import { Create, SimpleForm, TextInput } from 'react-admin';
 *
 * export const PostCreate = () => (
 *     <Create>
 *         <SimpleForm>
 *             <TextInput source="title" />
 *         </SimpleForm>
 *     </Create>
 * );
 *
 * // in src/App.js
 * import * as React from "react";
 * import { Admin, Resource } from 'react-admin';
 *
 * import { PostCreate } from './posts';
 *
 * const App = () => (
 *     <Admin dataProvider={...}>
 *         <Resource name="posts" create={PostCreate} />
 *     </Admin>
 * );
 * export default App;
 */
export declare const Create: <RecordType extends Omit<RaRecord<Identifier>, "id"> = any, ResultRecordType extends RaRecord<Identifier> = RecordType & {
    id: Identifier;
}>(props: CreateProps<RecordType, Error, ResultRecordType>) => ReactElement;
export interface CreateProps<RecordType extends Omit<RaRecord, 'id'> = any, MutationOptionsError = Error, ResultRecordType extends RaRecord = RecordType & {
    id: Identifier;
}> extends CreateBaseProps<RecordType, ResultRecordType, MutationOptionsError>, Omit<CreateViewProps, 'children'> {
}
//# sourceMappingURL=Create.d.ts.map