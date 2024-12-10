"use strict";
var __assign = (this && this.__assign) || function () {
    __assign = Object.assign || function(t) {
        for (var s, i = 1, n = arguments.length; i < n; i++) {
            s = arguments[i];
            for (var p in s) if (Object.prototype.hasOwnProperty.call(s, p))
                t[p] = s[p];
        }
        return t;
    };
    return __assign.apply(this, arguments);
};
var __rest = (this && this.__rest) || function (s, e) {
    var t = {};
    for (var p in s) if (Object.prototype.hasOwnProperty.call(s, p) && e.indexOf(p) < 0)
        t[p] = s[p];
    if (s != null && typeof Object.getOwnPropertySymbols === "function")
        for (var i = 0, p = Object.getOwnPropertySymbols(s); i < p.length; i++) {
            if (e.indexOf(p[i]) < 0 && Object.prototype.propertyIsEnumerable.call(s, p[i]))
                t[p[i]] = s[p[i]];
        }
    return t;
};
Object.defineProperty(exports, "__esModule", { value: true });
var react_1 = require("react");
var dataProvider_1 = require("../../dataProvider");
var controller_1 = require("../../controller");
var routing_1 = require("../../routing");
var notification_1 = require("../../notification");
var core_1 = require("../../core");
var i18n_1 = require("../../i18n");
/**
 * Prepare callback for a Delete button with undo support
 *
 * @example
 *
 * import React from 'react';
 * import ActionDelete from '@mui/icons-material/Delete';
 * import { Button, useDeleteWithUndoController } from 'react-admin';
 *
 * const DeleteButton = ({
 *     resource,
 *     record,
 *     redirect,
 *     onClick,
 *     ...rest
 * }) => {
 *     const { isPending, handleDelete } = useDeleteWithUndoController({
 *         resource,
 *         record,
 *         redirect,
 *         onClick,
 *     });
 *
 *     return (
 *         <Button
 *             onClick={handleDelete}
 *             disabled={isPending}
 *             label="ra.action.delete"
 *             {...rest}
 *         >
 *             <ActionDelete />
 *         </Button>
 *     );
 * };
 */
var useDeleteWithUndoController = function (props) {
    var record = props.record, _a = props.redirect, redirectTo = _a === void 0 ? 'list' : _a, onClick = props.onClick, _b = props.mutationOptions, mutationOptions = _b === void 0 ? {} : _b, successMessage = props.successMessage;
    var mutationMeta = mutationOptions.meta, otherMutationOptions = __rest(mutationOptions, ["meta"]);
    var resource = (0, core_1.useResourceContext)(props);
    var notify = (0, notification_1.useNotify)();
    var unselect = (0, controller_1.useUnselect)(resource);
    var redirect = (0, routing_1.useRedirect)();
    var translate = (0, i18n_1.useTranslate)();
    var _c = (0, dataProvider_1.useDelete)(resource, undefined, {
        onSuccess: function () {
            notify(successMessage !== null && successMessage !== void 0 ? successMessage : "resources.".concat(resource, ".notifications.deleted"), {
                type: 'info',
                messageArgs: {
                    smart_count: 1,
                    _: translate('ra.notification.deleted', {
                        smart_count: 1,
                    }),
                },
                undoable: true,
            });
            record && unselect([record.id]);
            redirect(redirectTo, resource);
        },
        onError: function (error) {
            notify(typeof error === 'string'
                ? error
                : error.message || 'ra.notification.http_error', {
                type: 'error',
                messageArgs: {
                    _: typeof error === 'string'
                        ? error
                        : error && error.message
                            ? error.message
                            : undefined,
                },
            });
        },
    }), deleteOne = _c[0], isPending = _c[1].isPending;
    var handleDelete = (0, react_1.useCallback)(function (event) {
        event.stopPropagation();
        if (!record) {
            throw new Error('The record cannot be deleted because no record has been passed');
        }
        deleteOne(resource, {
            id: record.id,
            previousData: record,
            meta: mutationMeta,
        }, __assign({ mutationMode: 'undoable' }, otherMutationOptions));
        if (typeof onClick === 'function') {
            onClick(event);
        }
    }, [
        deleteOne,
        mutationMeta,
        otherMutationOptions,
        onClick,
        record,
        resource,
    ]);
    return { isPending: isPending, isLoading: isPending, handleDelete: handleDelete };
};
exports.default = useDeleteWithUndoController;
//# sourceMappingURL=useDeleteWithUndoController.js.map