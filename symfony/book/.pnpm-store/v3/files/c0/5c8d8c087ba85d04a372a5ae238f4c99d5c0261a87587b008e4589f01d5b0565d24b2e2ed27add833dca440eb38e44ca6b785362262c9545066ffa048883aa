import type { JsonLdObj } from 'jsonld/jsonld-spec';
import type { ApiPlatformAdminDataProvider, ApiPlatformAdminRecord, HydraDataProviderFactoryParams } from '../types.js';
/**
 * Transforms a JSON-LD document to a react-admin compatible document.
 */
export declare const transformJsonLdDocumentToReactAdminDocument: (jsonLdDocument: JsonLdObj, clone?: boolean, addToCache?: boolean, useEmbedded?: boolean) => ApiPlatformAdminRecord;
/**
 * Maps react-admin queries to a Hydra powered REST API
 *
 * @see http://www.hydra-cg.com/
 *
 * @example
 * CREATE   => POST http://my.api.url/posts/123
 * DELETE   => DELETE http://my.api.url/posts/123
 * GET_LIST => GET http://my.api.url/posts
 * GET_MANY => GET http://my.api.url/posts/123, GET http://my.api.url/posts/456, GET http://my.api.url/posts/789
 * GET_ONE  => GET http://my.api.url/posts/123
 * UPDATE   => PATCH http://my.api.url/posts/123
 */
declare function dataProvider(factoryParams: HydraDataProviderFactoryParams): ApiPlatformAdminDataProvider;
export default dataProvider;
//# sourceMappingURL=dataProvider.d.ts.map