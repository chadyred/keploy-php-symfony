import * as React from 'react';
import { TypographyProps } from '@mui/material/Typography';
import purify from 'dompurify';
import { FieldProps } from './types';
export declare const RichTextField: {
    <RecordType extends Record<string, any> = Record<string, any>>(props: RichTextFieldProps<RecordType>): React.JSX.Element;
    displayName: string;
};
export type PurifyOptions = purify.Config & {
    RETURN_DOM_FRAGMENT?: false | undefined;
    RETURN_DOM?: false | undefined;
};
export interface RichTextFieldProps<RecordType extends Record<string, any> = Record<string, any>> extends FieldProps<RecordType>, Omit<TypographyProps, 'textAlign'> {
    stripTags?: boolean;
    purifyOptions?: PurifyOptions;
}
export declare const removeTags: (input: string) => string;
//# sourceMappingURL=RichTextField.d.ts.map