import * as React from 'react';
import { useEffect, useRef } from 'react';
import { useInfinitePaginationContext, useListContext, useEvent, } from 'ra-core';
import { Box, CircularProgress } from '@mui/material';
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
export var InfinitePagination = function (_a) {
    var _b = _a.options, options = _b === void 0 ? defaultOptions : _b, sx = _a.sx;
    var isPending = useListContext().isPending;
    var _c = useInfinitePaginationContext(), fetchNextPage = _c.fetchNextPage, hasNextPage = _c.hasNextPage, isFetchingNextPage = _c.isFetchingNextPage;
    if (!fetchNextPage) {
        throw new Error('InfinitePagination must be used inside an InfinitePaginationContext, usually created by <InfiniteList>. You cannot use it as child of a <List> component.');
    }
    var observerElem = useRef(null);
    var handleObserver = useEvent(function (entries) {
        var target = entries[0];
        if (target.isIntersecting && hasNextPage && !isFetchingNextPage) {
            fetchNextPage();
        }
    });
    useEffect(function () {
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
    return (React.createElement(Box, { ref: observerElem, py: 2, textAlign: "center", sx: sx }, isFetchingNextPage && hasNextPage && (React.createElement(CircularProgress, { size: "1.5em" }))));
};
var defaultOptions = { threshold: 0 };
//# sourceMappingURL=InfinitePagination.js.map