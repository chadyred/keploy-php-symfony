var __awaiter = (this && this.__awaiter) || function (thisArg, _arguments, P, generator) {
    function adopt(value) { return value instanceof P ? value : new P(function (resolve) { resolve(value); }); }
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) { try { step(generator.next(value)); } catch (e) { reject(e); } }
        function rejected(value) { try { step(generator["throw"](value)); } catch (e) { reject(e); } }
        function step(result) { result.done ? resolve(result.value) : adopt(result.value).then(fulfilled, rejected); }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
};
import { stringify } from 'query-string';
import { fetchUtils } from 'react-admin';
import { removeTrailingSlash } from '../removeTrailingSlash.js';
// Based on https://github.com/marmelab/react-admin/blob/master/packages/ra-data-simple-rest/src/index.ts
export default (entrypoint, httpClient = fetchUtils.fetchJson) => {
    const apiUrl = new URL(entrypoint, window.location.href);
    return {
        getList: (resource, params) => __awaiter(void 0, void 0, void 0, function* () {
            var _a, _b;
            const { page, perPage } = (_a = params.pagination) !== null && _a !== void 0 ? _a : { page: 1, perPage: 25 };
            const { field, order } = (_b = params.sort) !== null && _b !== void 0 ? _b : { field: 'id', order: 'DESC' };
            const rangeStart = (page - 1) * perPage;
            const rangeEnd = page * perPage - 1;
            const query = {
                sort: JSON.stringify([field, order]),
                range: JSON.stringify([rangeStart, rangeEnd]),
                filter: JSON.stringify(params.filter),
            };
            const url = `${removeTrailingSlash(apiUrl.toString())}/${resource}?${stringify(query)}`;
            const { json } = yield httpClient(url);
            return {
                data: json,
                pageInfo: {
                    hasNextPage: true,
                    hasPreviousPage: page > 1,
                },
            };
        }),
        getOne: (resource, params) => __awaiter(void 0, void 0, void 0, function* () {
            const url = `${removeTrailingSlash(apiUrl.toString())}/${resource}/${params.id}`;
            const { json } = yield httpClient(url);
            return {
                data: json,
            };
        }),
        getMany: (resource, params) => __awaiter(void 0, void 0, void 0, function* () {
            const query = {
                filter: JSON.stringify({ id: params.ids }),
            };
            const url = `${removeTrailingSlash(apiUrl.toString())}/${resource}?${stringify(query)}`;
            const { json } = yield httpClient(url);
            return {
                data: json,
            };
        }),
        getManyReference: (resource, params) => __awaiter(void 0, void 0, void 0, function* () {
            const { page, perPage } = params.pagination;
            const { field, order } = params.sort;
            const rangeStart = (page - 1) * perPage;
            const rangeEnd = page * perPage - 1;
            const query = {
                sort: JSON.stringify([field, order]),
                range: JSON.stringify([rangeStart, rangeEnd]),
                filter: JSON.stringify(Object.assign(Object.assign({}, params.filter), { [params.target]: params.id })),
            };
            const url = `${removeTrailingSlash(apiUrl.toString())}/${resource}?${stringify(query)}`;
            const { json } = yield httpClient(url);
            return {
                data: json,
                pageInfo: {
                    hasNextPage: true,
                    hasPreviousPage: page > 1,
                },
            };
        }),
        update: (resource, params) => __awaiter(void 0, void 0, void 0, function* () {
            const url = `${removeTrailingSlash(apiUrl.toString())}/${resource}/${params.id}`;
            const { json } = yield httpClient(url, {
                method: 'PUT',
                body: JSON.stringify(params.data),
            });
            return {
                data: json,
            };
        }),
        updateMany: (resource, params) => __awaiter(void 0, void 0, void 0, function* () {
            const responses = yield Promise.all(params.ids.map((id) => {
                const url = `${removeTrailingSlash(apiUrl.toString())}/${resource}/${id}`;
                return httpClient(url, {
                    method: 'PUT',
                    body: JSON.stringify(params.data),
                });
            }));
            return { data: responses.map(({ json }) => json.id) };
        }),
        create: (resource, params) => __awaiter(void 0, void 0, void 0, function* () {
            const url = `${removeTrailingSlash(apiUrl.toString())}/${resource}`;
            const { json } = yield httpClient(url, {
                method: 'POST',
                body: JSON.stringify(params.data),
            });
            return {
                data: json,
            };
        }),
        delete: (resource, params) => __awaiter(void 0, void 0, void 0, function* () {
            const url = `${removeTrailingSlash(apiUrl.toString())}/${resource}/${params.id}`;
            const { json } = yield httpClient(url, {
                method: 'DELETE',
            });
            return {
                data: json,
            };
        }),
        deleteMany: (resource, params) => __awaiter(void 0, void 0, void 0, function* () {
            const responses = yield Promise.all(params.ids.map((id) => {
                const url = `${removeTrailingSlash(apiUrl.toString())}/${resource}/${id}`;
                return httpClient(url, {
                    method: 'DELETE',
                });
            }));
            return {
                data: responses.map(({ json }) => json.id),
            };
        }),
    };
};
//# sourceMappingURL=restDataProvider.js.map