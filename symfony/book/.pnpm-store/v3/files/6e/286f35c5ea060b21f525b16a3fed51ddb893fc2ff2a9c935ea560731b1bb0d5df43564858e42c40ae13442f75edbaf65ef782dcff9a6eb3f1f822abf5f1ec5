import * as React from 'react';
import { ReactElement } from 'react';
import { Link } from 'react-router-dom';
import { RaRecord } from 'ra-core';
import { ButtonProps } from './Button';
interface Props<RecordType extends RaRecord = any> {
    icon?: ReactElement;
    label?: string;
    record?: RecordType;
    resource?: string;
    scrollToTop?: boolean;
}
export type ShowButtonProps<RecordType extends RaRecord = any> = Props<RecordType> & Omit<ButtonProps<typeof Link>, 'to'>;
declare const PureShowButton: React.MemoExoticComponent<(<RecordType extends RaRecord<import("ra-core").Identifier> = any>(props: ShowButtonProps<RecordType>) => React.JSX.Element | null)>;
export default PureShowButton;
//# sourceMappingURL=ShowButton.d.ts.map