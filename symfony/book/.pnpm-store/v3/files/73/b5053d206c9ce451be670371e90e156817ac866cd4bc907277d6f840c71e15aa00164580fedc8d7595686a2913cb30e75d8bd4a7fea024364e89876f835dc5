var __awaiter = (this && this.__awaiter) || function (thisArg, _arguments, P, generator) {
    function adopt(value) { return value instanceof P ? value : new P(function (resolve) { resolve(value); }); }
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) { try { step(generator.next(value)); } catch (e) { reject(e); } }
        function rejected(value) { try { step(generator["throw"](value)); } catch (e) { reject(e); } }
        function step(result) { result.done ? resolve(result.value) : adopt(result.value).then(fulfilled, rejected); }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
};
import { useCallback } from 'react';
import { useCreate, useNotify, useRedirect, useUpdate } from 'react-admin';
import { useParams } from 'react-router-dom';
import lodashIsPlainObject from 'lodash.isplainobject';
import getIdentifierValue from './getIdentifierValue.js';
// eslint-disable-next-line @typescript-eslint/no-explicit-any
const findFile = (values) => values.find((value) => Array.isArray(value)
    ? findFile(value)
    : lodashIsPlainObject(value) &&
        Object.values(value).find((val) => val instanceof File));
const useOnSubmit = ({ resource, schemaAnalyzer, fields, mutationOptions, transform, redirectTo = 'list', }) => {
    const { id: routeId } = useParams();
    const id = decodeURIComponent(routeId !== null && routeId !== void 0 ? routeId : '');
    const [create] = useCreate();
    const [update] = useUpdate();
    const notify = useNotify();
    const redirect = useRedirect();
    return useCallback((values) => __awaiter(void 0, void 0, void 0, function* () {
        var _a, _b;
        const isCreate = id === '';
        const data = transform ? transform(values) : values;
        // Identifiers need to be formatted in case they have not been modified in the form.
        if (!isCreate) {
            Object.entries(values).forEach(([key, value]) => {
                const identifierValue = getIdentifierValue(schemaAnalyzer, resource, fields, key, value);
                if (identifierValue !== value) {
                    data[key] = identifierValue;
                }
            });
        }
        try {
            const response = yield (isCreate ? create : update)(resource, Object.assign(Object.assign({}, (isCreate ? {} : { id })), { data, meta: { hasFileField: !!findFile(Object.values(values)) } }), { returnPromise: true });
            const success = (_a = mutationOptions === null || mutationOptions === void 0 ? void 0 : mutationOptions.onSuccess) !== null && _a !== void 0 ? _a : ((record) => {
                notify(isCreate ? 'ra.notification.created' : 'ra.notification.updated', {
                    type: 'info',
                    messageArgs: { smart_count: 1 },
                });
                redirect(redirectTo, resource, record.id, record);
            });
            success(response, Object.assign({ data: response }, (isCreate ? {} : { id, previousData: values })), {});
            return undefined;
        }
        catch (mutateError) {
            const submissionErrors = schemaAnalyzer.getSubmissionErrors(mutateError);
            const failure = (_b = mutationOptions === null || mutationOptions === void 0 ? void 0 : mutationOptions.onError) !== null && _b !== void 0 ? _b : ((error) => {
                let message = 'ra.notification.http_error';
                if (!submissionErrors) {
                    message =
                        typeof error === 'string' ? error : error.message || message;
                }
                let errorMessage;
                if (typeof error === 'string') {
                    errorMessage = error;
                }
                else if (error === null || error === void 0 ? void 0 : error.message) {
                    errorMessage = error.message;
                }
                notify(message, {
                    type: 'warning',
                    messageArgs: { _: errorMessage },
                });
            });
            failure(mutateError, Object.assign({ data: values }, (isCreate ? {} : { id, previousData: values })), {});
            if (submissionErrors) {
                return submissionErrors;
            }
            return {};
        }
    }), [
        fields,
        id,
        mutationOptions,
        notify,
        redirect,
        redirectTo,
        resource,
        schemaAnalyzer,
        transform,
        create,
        update,
    ]);
};
export default useOnSubmit;
//# sourceMappingURL=useOnSubmit.js.map