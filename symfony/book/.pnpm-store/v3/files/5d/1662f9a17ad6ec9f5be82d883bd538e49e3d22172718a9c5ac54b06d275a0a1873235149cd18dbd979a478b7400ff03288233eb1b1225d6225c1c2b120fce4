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
import React, { useContext, useEffect, useMemo } from 'react';
import { useLogoutIfAccessDenied } from 'react-admin';
import SchemaAnalyzerContext from './SchemaAnalyzerContext.js';
import useIntrospect from './useIntrospect.js';
import ResourcesIntrospecter from './ResourcesIntrospecter.js';
const Introspecter = (_a) => {
    var { component, includeDeprecated = false, resource } = _a, rest = __rest(_a, ["component", "includeDeprecated", "resource"]);
    const logoutIfAccessDenied = useLogoutIfAccessDenied();
    const schemaAnalyzer = useContext(SchemaAnalyzerContext);
    const schemaAnalyzerProxy = useMemo(() => {
        if (!schemaAnalyzer) {
            return null;
        }
        return new Proxy(schemaAnalyzer, {
            get: (target, key) => {
                if (typeof target[key] !== 'function') {
                    return target[key];
                }
                return (...args) => {
                    // eslint-disable-next-line prefer-spread,@typescript-eslint/ban-types
                    const result = target[key].apply(target, args);
                    if (result && typeof result.then === 'function') {
                        return result.catch((e) => {
                            logoutIfAccessDenied(e).then((loggedOut) => {
                                if (loggedOut) {
                                    return;
                                }
                                throw e;
                            });
                        });
                    }
                    return result;
                };
            },
        });
    }, [schemaAnalyzer, logoutIfAccessDenied]);
    const { refetch, data, isPending, error } = useIntrospect();
    const resources = data ? data.data.resources : null;
    useEffect(() => {
        if (!error && !resources) {
            refetch();
        }
    }, [refetch, error, resources]);
    if (!schemaAnalyzerProxy) {
        return null;
    }
    return (React.createElement(ResourcesIntrospecter, Object.assign({}, rest, { component: component, schemaAnalyzer: schemaAnalyzerProxy, includeDeprecated: includeDeprecated, resource: resource, resources: resources !== null && resources !== void 0 ? resources : [], loading: isPending, error: error })));
};
export default Introspecter;
//# sourceMappingURL=Introspecter.js.map