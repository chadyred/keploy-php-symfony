import * as React from 'react';
import { ExtractRecordPaths, HintedString } from 'ra-core';
import { FieldProps } from './types';
import { SxProps } from '@mui/system';
/**
 * Render a link to a file based on a path contained in a record field
 *
 * @example
 * import { FileField } from 'react-admin';
 *
 * <FileField source="url" title="title" />
 *
 * // renders the record { id: 123, url: 'doc.pdf', title: 'Presentation' } as
 * <div>
 *     <a href="doc.pdf" title="Presentation">Presentation</a>
 * </div>
 */
export declare const FileField: <RecordType extends Record<string, any> = Record<string, any>>(props: FileFieldProps<RecordType>) => React.JSX.Element;
export interface FileFieldProps<RecordType extends Record<string, any> = Record<string, any>> extends FieldProps<RecordType> {
    src?: string;
    title?: HintedString<ExtractRecordPaths<RecordType>>;
    target?: string;
    download?: boolean | string;
    ping?: string;
    rel?: string;
    sx?: SxProps;
}
//# sourceMappingURL=FileField.d.ts.map