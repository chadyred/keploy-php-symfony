import * as React from 'react';
import { useInRouterContext, createHashRouter, RouterProvider, } from 'react-router-dom';
import { BasenameContextProvider } from './BasenameContextProvider';
/**
 * Creates a react-router Router unless the app is already inside existing router.
 * Also creates a BasenameContext with the basename prop
 */
export var AdminRouter = function (_a) {
    var _b = _a.basename, basename = _b === void 0 ? '' : _b, children = _a.children;
    var isInRouter = useInRouterContext();
    var Router = isInRouter ? DummyRouter : InternalRouter;
    return (React.createElement(BasenameContextProvider, { basename: isInRouter ? basename : '' },
        React.createElement(Router, { basename: basename }, children)));
};
var DummyRouter = function (_a) {
    var children = _a.children;
    return React.createElement(React.Fragment, null, children);
};
var InternalRouter = function (_a) {
    var children = _a.children, basename = _a.basename;
    var router = createHashRouter([{ path: '*', element: React.createElement(React.Fragment, null, children) }], {
        basename: basename,
    });
    return React.createElement(RouterProvider, { router: router });
};
//# sourceMappingURL=AdminRouter.js.map