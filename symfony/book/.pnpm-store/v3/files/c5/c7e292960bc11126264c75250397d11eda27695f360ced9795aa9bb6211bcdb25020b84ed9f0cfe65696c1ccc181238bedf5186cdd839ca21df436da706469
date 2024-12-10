import type { Nullable } from "./types.js";
export type OperationType = "show" | "edit" | "delete" | "list" | "create";
export interface OperationOptions extends Nullable<{
    method?: string;
    expects?: any;
    returns?: string;
    types?: string[];
    deprecated?: boolean;
}> {
}
export interface Operation extends OperationOptions {
}
export declare class Operation {
    name: string;
    type: OperationType;
    constructor(name: string, type: OperationType, options?: OperationOptions);
}
//# sourceMappingURL=Operation.d.ts.map