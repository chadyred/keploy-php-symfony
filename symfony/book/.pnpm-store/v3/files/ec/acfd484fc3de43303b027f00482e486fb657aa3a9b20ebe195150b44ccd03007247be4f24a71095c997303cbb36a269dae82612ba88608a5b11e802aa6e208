import React from 'react';
import type { ComponentType } from 'react';
import type { AdminProps } from 'react-admin';
import type { Resource } from '@api-platform/api-doc-parser';
import type { ApiPlatformAdminDataProvider, SchemaAnalyzer } from '../types.js';
export interface AdminGuesserProps extends AdminProps {
    admin?: ComponentType<AdminProps>;
    dataProvider: ApiPlatformAdminDataProvider;
    schemaAnalyzer: SchemaAnalyzer;
    includeDeprecated?: boolean;
}
interface AdminResourcesGuesserProps extends Omit<AdminProps, 'loading'> {
    admin?: ComponentType<AdminProps>;
    includeDeprecated: boolean;
    loading: boolean;
    loadingPage?: ComponentType;
    resources: Resource[];
}
/**
 * AdminResourcesGuesser automatically renders an `<AdminUI>` component
 * for resources exposed by a web API documented with Hydra, OpenAPI
 * or any other format supported by `@api-platform/api-doc-parser`.
 *
 * If child components are passed (usually `<ResourceGuesser>` or `<Resource>`
 * components, but it can be any other React component), they are rendered in
 * the given order.
 * If no children are passed, a `<ResourceGuesser>` component is created for
 * each resource type exposed by the API, in the order they are specified in
 * the API documentation.
 */
export declare const AdminResourcesGuesser: ({ loadingPage: LoadingPage, admin: AdminEl, children, includeDeprecated, resources, loading, ...rest }: AdminResourcesGuesserProps) => React.JSX.Element;
export {};
//# sourceMappingURL=AdminResourcesGuesser.d.ts.map