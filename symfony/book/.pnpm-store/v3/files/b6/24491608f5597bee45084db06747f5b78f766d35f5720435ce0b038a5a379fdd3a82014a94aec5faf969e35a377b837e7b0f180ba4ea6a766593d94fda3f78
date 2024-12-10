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
import React, { useEffect, useMemo, useState } from 'react';
import { AdminContext, defaultI18nProvider, 
/* tree-shaking no-side-effects-when-called */ localStorageStore, } from 'react-admin';
import { AdminResourcesGuesser } from './AdminResourcesGuesser.js';
import IntrospectionContext from '../introspection/IntrospectionContext.js';
import SchemaAnalyzerContext from '../introspection/SchemaAnalyzerContext.js';
import { Error as DefaultError, Layout, LoginPage, darkTheme as defaultDarkTheme, lightTheme as defaultLightTheme, } from '../layout/index.js';
const defaultStore = localStorageStore();
const AdminGuesser = (_a) => {
    var { 
    // Props for SchemaAnalyzerContext
    schemaAnalyzer, 
    // Props for AdminResourcesGuesser
    includeDeprecated = false, 
    // Admin props
    basename, 
    // eslint-disable-next-line @typescript-eslint/no-explicit-any
    error = DefaultError, store = defaultStore, dataProvider, i18nProvider = defaultI18nProvider, authProvider, queryClient, defaultTheme, layout = Layout, loginPage = LoginPage, loading: loadingPage, theme = defaultLightTheme, darkTheme = defaultDarkTheme, 
    // Other props
    children } = _a, rest = __rest(_a, ["schemaAnalyzer", "includeDeprecated", "basename", "error", "store", "dataProvider", "i18nProvider", "authProvider", "queryClient", "defaultTheme", "layout", "loginPage", "loading", "theme", "darkTheme", "children"]);
    const [resources, setResources] = useState([]);
    const [loading, setLoading] = useState(true);
    const [, setError] = useState();
    const [introspect, setIntrospect] = useState(true);
    useEffect(() => {
        if (typeof dataProvider.introspect !== 'function') {
            throw new Error('The given dataProvider needs to expose an "introspect" function returning a parsed API documentation from api-doc-parser');
        }
        if (!introspect) {
            return;
        }
        dataProvider
            .introspect()
            .then(({ data }) => {
            var _a;
            setResources((_a = data.resources) !== null && _a !== void 0 ? _a : []);
            setIntrospect(false);
            setLoading(false);
        })
            .catch((err) => {
            // Allow err to be caught by the error boundary
            setError(() => {
                throw err;
            });
        });
    }, [introspect, dataProvider]);
    const introspectionContext = useMemo(() => ({
        introspect: () => {
            setLoading(true);
            setIntrospect(true);
        },
    }), [setLoading, setIntrospect]);
    return (React.createElement(AdminContext, { i18nProvider: i18nProvider, dataProvider: dataProvider, basename: basename, authProvider: authProvider, store: store, queryClient: queryClient, theme: theme, darkTheme: darkTheme, defaultTheme: defaultTheme },
        React.createElement(IntrospectionContext.Provider, { value: introspectionContext },
            React.createElement(SchemaAnalyzerContext.Provider, { value: schemaAnalyzer },
                React.createElement(AdminResourcesGuesser, Object.assign({ includeDeprecated: includeDeprecated, resources: resources, loading: loading, dataProvider: dataProvider, layout: layout, loginPage: loginPage, loadingPage: loadingPage, theme: theme, error: error }, rest), children)))));
};
export default AdminGuesser;
//# sourceMappingURL=AdminGuesser.js.map