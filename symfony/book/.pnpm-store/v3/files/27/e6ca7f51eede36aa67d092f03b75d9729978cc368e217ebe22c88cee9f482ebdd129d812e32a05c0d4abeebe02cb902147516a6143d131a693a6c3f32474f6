"use strict";
var __createBinding = (this && this.__createBinding) || (Object.create ? (function(o, m, k, k2) {
    if (k2 === undefined) k2 = k;
    var desc = Object.getOwnPropertyDescriptor(m, k);
    if (!desc || ("get" in desc ? !m.__esModule : desc.writable || desc.configurable)) {
      desc = { enumerable: true, get: function() { return m[k]; } };
    }
    Object.defineProperty(o, k2, desc);
}) : (function(o, m, k, k2) {
    if (k2 === undefined) k2 = k;
    o[k2] = m[k];
}));
var __setModuleDefault = (this && this.__setModuleDefault) || (Object.create ? (function(o, v) {
    Object.defineProperty(o, "default", { enumerable: true, value: v });
}) : function(o, v) {
    o["default"] = v;
});
var __importStar = (this && this.__importStar) || function (mod) {
    if (mod && mod.__esModule) return mod;
    var result = {};
    if (mod != null) for (var k in mod) if (k !== "default" && Object.prototype.hasOwnProperty.call(mod, k)) __createBinding(result, mod, k);
    __setModuleDefault(result, mod);
    return result;
};
Object.defineProperty(exports, "__esModule", { value: true });
exports.InfinitePagination = void 0;
var React = __importStar(require("react"));
var react_1 = require("react");
var ra_core_1 = require("ra-core");
var material_1 = require("@mui/material");
/**
 * A pagination component that loads more results when the user scrolls to the bottom of the list.
 *
 * Used as the default pagination component in the <InfiniteList> component.
 *
 * @example
 * import { InfiniteList, InfinitePagination, Datagrid, TextField } from 'react-admin';
 *
 * const PostList = () => (
 *    <InfiniteList pagination={<InfinitePagination sx={{ py: 5 }} />}>
 *       <Datagrid>
 *          <TextField source="id" />
 *         <TextField source="title" />
 *      </Datagrid>
 *   </InfiniteList>
 * );
 */
var InfinitePagination = function (_a) {
    var _b = _a.options, options = _b === void 0 ? defaultOptions : _b, sx = _a.sx;
    var isPending = (0, ra_core_1.useListContext)().isPending;
    var _c = (0, ra_core_1.useInfinitePaginationContext)(), fetchNextPage = _c.fetchNextPage, hasNextPage = _c.hasNextPage, isFetchingNextPage = _c.isFetchingNextPage;
    if (!fetchNextPage) {
        throw new Error('InfinitePagination must be used inside an InfinitePaginationContext, usually created by <InfiniteList>. You cannot use it as child of a <List> component.');
    }
    var observerElem = (0, react_1.useRef)(null);
    var handleObserver = (0, ra_core_1.useEvent)(function (entries) {
        var target = entries[0];
        if (target.isIntersecting && hasNextPage && !isFetchingNextPage) {
            fetchNextPage();
        }
    });
    (0, react_1.useEffect)(function () {
        var element = observerElem.current;
        if (!element)
            return;
        var observer = new IntersectionObserver(handleObserver, options);
        observer.observe(element);
        return function () { return observer.unobserve(element); };
    }, [
        fetchNextPage,
        hasNextPage,
        handleObserver,
        options,
        isPending,
        isFetchingNextPage,
    ]);
    if (isPending)
        return null;
    return (React.createElement(material_1.Box, { ref: observerElem, py: 2, textAlign: "center", sx: sx }, isFetchingNextPage && hasNextPage && (React.createElement(material_1.CircularProgress, { size: "1.5em" }))));
};
exports.InfinitePagination = InfinitePagination;
var defaultOptions = { threshold: 0 };
//# sourceMappingURL=InfinitePagination.js.map