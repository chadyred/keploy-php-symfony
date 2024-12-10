import React, { FC, ReactElement } from 'react';
import { TableRowProps } from '@mui/material';
import { Identifier, RaRecord } from 'ra-core';
declare const DatagridRow: React.ForwardRefExoticComponent<Omit<DatagridRowProps, 'ref'> & React.RefAttributes<HTMLTableRowElement>>;
export interface DatagridRowProps extends Omit<TableRowProps, 'id' | 'classes'> {
    className?: string;
    expand?: ReactElement | FC<{
        id: Identifier;
        record: RaRecord;
        resource: string;
    }>;
    hasBulkActions?: boolean;
    hover?: boolean;
    id?: Identifier;
    onToggleItem?: (id: Identifier, event: React.TouchEvent | React.MouseEvent) => void;
    record?: RaRecord;
    resource?: string;
    rowClick?: RowClickFunction | string | false;
    selected?: boolean;
    style?: any;
    selectable?: boolean;
}
export type RowClickFunction = (id: Identifier, resource: string, record: RaRecord) => string | false | Promise<string | false>;
export declare const PureDatagridRow: React.MemoExoticComponent<React.ForwardRefExoticComponent<Omit<DatagridRowProps, "ref"> & React.RefAttributes<HTMLTableRowElement>>>;
export default DatagridRow;
//# sourceMappingURL=DatagridRow.d.ts.map