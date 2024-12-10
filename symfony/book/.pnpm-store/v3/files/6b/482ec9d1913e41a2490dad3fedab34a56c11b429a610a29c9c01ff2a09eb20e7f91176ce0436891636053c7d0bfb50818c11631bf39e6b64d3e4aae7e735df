import React from 'react';
import type { AdminGuesserProps } from '../core/AdminGuesser.js';
import type { MercureOptions } from '../types.js';
type AdminGuesserPartialProps = Omit<AdminGuesserProps, 'dataProvider' | 'schemaAnalyzer'> & Partial<Pick<AdminGuesserProps, 'dataProvider' | 'schemaAnalyzer'>>;
export interface OpenApiAdminProps extends AdminGuesserPartialProps {
    entrypoint: string;
    docEntrypoint: string;
    mercure?: MercureOptions | false;
}
declare const OpenApiAdmin: ({ entrypoint, docEntrypoint, mercure, dataProvider, schemaAnalyzer: adminSchemaAnalyzer, ...props }: OpenApiAdminProps) => React.JSX.Element;
export default OpenApiAdmin;
//# sourceMappingURL=OpenApiAdmin.d.ts.map