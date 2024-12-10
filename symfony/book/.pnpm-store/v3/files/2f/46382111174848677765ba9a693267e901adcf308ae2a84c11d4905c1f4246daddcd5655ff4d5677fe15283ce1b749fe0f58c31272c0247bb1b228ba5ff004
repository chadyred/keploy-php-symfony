import type { Document, RemoteDocument } from "jsonld/jsonld-spec";
import type { RequestInitExtended } from "./types.js";
export type RejectedResponseDocument = {
    response: Response;
};
export type EmptyResponseDocument = {
    response: Response;
};
export interface ResponseDocument extends RemoteDocument {
    response: Response;
    body: Document;
}
/**
 * Sends a JSON-LD request to the API.
 */
export default function fetchJsonLd(url: string, options?: RequestInitExtended): Promise<ResponseDocument | EmptyResponseDocument>;
//# sourceMappingURL=fetchJsonLd.d.ts.map