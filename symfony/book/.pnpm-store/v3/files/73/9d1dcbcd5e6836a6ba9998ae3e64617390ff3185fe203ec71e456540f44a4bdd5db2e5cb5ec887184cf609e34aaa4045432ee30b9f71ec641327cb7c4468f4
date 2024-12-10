import * as React from 'react';
import { ReactNode } from 'react';
import { SxProps } from '@mui/material';
import { LinkToType, RaRecord } from 'ra-core';
import { UseQueryOptions } from '@tanstack/react-query';
import { FieldProps } from './types';
/**
 * Fetch reference record, and render its representation, or delegate rendering to child component.
 *
 * The reference prop should be the name of one of the <Resource> components
 * added as <Admin> child.
 *
 * @example // using recordRepresentation
 * <ReferenceField label="User" source="userId" reference="users" />
 *
 * @example // using a Field component to represent the record
 * <ReferenceField label="User" source="userId" reference="users">
 *     <TextField source="name" />
 * </ReferenceField>
 *
 * @example // By default, includes a link to the <Edit> page of the related record
 * // (`/users/:userId` in the previous example).
 * // Set the `link` prop to "show" to link to the <Show> page instead.
 * <ReferenceField label="User" source="userId" reference="users" link="show" />
 *
 * @example // You can also prevent `<ReferenceField>` from adding link to children
 * // by setting `link` to false.
 * <ReferenceField label="User" source="userId" reference="users" link={false} />
 *
 * @example // Alternatively, you can also pass a custom function to `link`.
 * // It must take reference and record as arguments and return a string
 * <ReferenceField label="User" source="userId" reference="users" link={(record, reference) => "/path/to/${reference}/${record}"} />
 *
 * @default
 * In previous versions of React-Admin, the prop `linkType` was used. It is now deprecated and replaced with `link`. However
 * backward-compatibility is still kept
 */
export declare const ReferenceField: <RecordType extends Record<string, any> = Record<string, any>, ReferenceRecordType extends RaRecord<import("ra-core").Identifier> = RaRecord<import("ra-core").Identifier>>(props: ReferenceFieldProps<RecordType, ReferenceRecordType>) => React.JSX.Element | null;
export interface ReferenceFieldProps<RecordType extends Record<string, any> = Record<string, any>, ReferenceRecordType extends RaRecord = RaRecord> extends FieldProps<RecordType> {
    children?: ReactNode;
    queryOptions?: Omit<UseQueryOptions<ReferenceRecordType[], Error>, 'queryFn' | 'queryKey'>;
    reference: string;
    translateChoice?: Function | boolean;
    link?: LinkToType<ReferenceRecordType>;
    sx?: SxProps;
}
export declare const ReferenceFieldView: <RecordType extends Record<string, any> = Record<string, any>, ReferenceRecordType extends RaRecord<import("ra-core").Identifier> = RaRecord<import("ra-core").Identifier>>(props: ReferenceFieldViewProps<RecordType, ReferenceRecordType>) => React.JSX.Element | null;
export interface ReferenceFieldViewProps<RecordType extends Record<string, any> = Record<string, any>, ReferenceRecordType extends RaRecord = RaRecord> extends FieldProps<RecordType>, Omit<ReferenceFieldProps<RecordType, ReferenceRecordType>, 'link'> {
    children?: ReactNode;
    reference: string;
    resource?: string;
    translateChoice?: Function | boolean;
    sx?: SxProps;
}
export declare const ReferenceFieldClasses: {
    root: string;
    link: string;
};
//# sourceMappingURL=ReferenceField.d.ts.map