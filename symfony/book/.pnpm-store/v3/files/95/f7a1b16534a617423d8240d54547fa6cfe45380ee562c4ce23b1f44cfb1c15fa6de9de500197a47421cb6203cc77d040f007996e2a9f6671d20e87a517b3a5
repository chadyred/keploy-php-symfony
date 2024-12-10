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
import React from 'react';
import { Title, useDefaultTitle, useResetErrorBoundaryOnLocationChange, useTranslate, } from 'react-admin';
import { Accordion, AccordionDetails, AccordionSummary, Box, Button, Typography, styled, } from '@mui/material';
import ExpandMoreIcon from '@mui/icons-material/ExpandMore.js'; // eslint-disable-line import/extensions
import HistoryIcon from '@mui/icons-material/History.js'; // eslint-disable-line import/extensions
import RefreshIcon from '@mui/icons-material/Refresh.js'; // eslint-disable-line import/extensions
import LogoError from './LogoError.js';
const PREFIX = 'RaError';
export const ErrorClasses = {
    container: `${PREFIX}-container`,
    title: `${PREFIX}-title`,
    logo: `${PREFIX}-logo`,
    panel: `${PREFIX}-panel`,
    panelSummary: `${PREFIX}-panelSummary`,
    panelDetails: `${PREFIX}-panelDetails`,
    toolbar: `${PREFIX}-toolbar`,
    advice: `${PREFIX}-advice`,
};
// eslint-disable-next-line tree-shaking/no-side-effects-in-initialization
const Root = styled('div', {
    name: PREFIX,
    overridesResolver: (_, styles) => styles.root,
})(({ theme }) => ({
    display: 'flex',
    flexDirection: 'column',
    alignItems: 'center',
    justifyContent: 'center',
    [theme.breakpoints.down('md')]: {
        padding: '1em',
    },
    fontFamily: 'Roboto, sans-serif',
    opacity: 0.5,
    [`& .${ErrorClasses.title}`]: {
        display: 'flex',
        alignItems: 'center',
    },
    [`& .${ErrorClasses.logo}`]: {
        margin: '0.5em',
    },
    [`& .${ErrorClasses.panel}`]: {
        marginTop: '1em',
        maxWidth: '60em',
    },
    [`& .${ErrorClasses.panelSummary}`]: {
        userSelect: 'all',
    },
    [`& .${ErrorClasses.panelDetails}`]: {
        whiteSpace: 'pre-wrap',
    },
    [`& .${ErrorClasses.toolbar}`]: {
        marginTop: '2em',
    },
    [`& .${ErrorClasses.advice}`]: {
        marginTop: '2em',
    },
}));
const goBack = () => {
    window.history.go(-1);
};
const Error = (_a) => {
    var { error, errorComponent: ErrorComponent, errorInfo, resetErrorBoundary, className } = _a, rest = __rest(_a, ["error", "errorComponent", "errorInfo", "resetErrorBoundary", "className"]);
    const translate = useTranslate();
    const title = useDefaultTitle();
    useResetErrorBoundaryOnLocationChange(resetErrorBoundary);
    if (ErrorComponent) {
        return React.createElement(ErrorComponent, { error: error, errorInfo: errorInfo, title: title });
    }
    return (React.createElement(React.Fragment, null,
        title && React.createElement(Title, { title: title }),
        React.createElement(Root, Object.assign({ className: className }, rest),
            React.createElement("h1", { className: ErrorClasses.title, role: "alert" },
                React.createElement(Box, { className: ErrorClasses.logo },
                    React.createElement(LogoError, null)),
                translate('ra.page.error')),
            React.createElement("div", null, translate('ra.message.error')),
            process.env.NODE_ENV !== 'production' && (React.createElement(React.Fragment, null,
                React.createElement(Accordion, { className: ErrorClasses.panel },
                    React.createElement(AccordionSummary, { expandIcon: React.createElement(ExpandMoreIcon, null), className: ErrorClasses.panelSummary }, translate(error.message, {
                        _: error.message,
                    })),
                    React.createElement(AccordionDetails, { className: ErrorClasses.panelDetails },
                        React.createElement("p", null, translate(error.message, {
                            _: error.message,
                        })),
                        React.createElement("p", null, errorInfo === null || errorInfo === void 0 ? void 0 : errorInfo.componentStack))),
                React.createElement("div", { className: ErrorClasses.advice },
                    React.createElement(Typography, { align: "center" }, "Need help with this error? Try the following:"),
                    React.createElement(Typography, { component: "div" },
                        React.createElement("ul", null,
                            React.createElement("li", null,
                                "Check the",
                                ' ',
                                React.createElement("a", { href: "https://api-platform.com/docs/admin/" }, "API Platform Admin"),
                                ' ',
                                "and the",
                                ' ',
                                React.createElement("a", { href: "https://marmelab.com/react-admin/Readme.html" }, "react-admin documentation")),
                            React.createElement("li", null,
                                "Search on StackOverflow (",
                                React.createElement("a", { href: "https://stackoverflow.com/questions/tagged/react-admin" }, "react-admin"),
                                ' ',
                                "/",
                                ' ',
                                React.createElement("a", { href: "https://stackoverflow.com/questions/tagged/api-platform.com" }, "API Platform"),
                                ") for community answers"),
                            React.createElement("li", null,
                                "Get help from the maintainers of API Platform via",
                                ' ',
                                React.createElement("a", { href: "https://les-tilleuls.coop/" }, "Les-Tilleuls.coop"),
                                ' ',
                                "or from the react-admin core team via",
                                ' ',
                                React.createElement("a", { href: "https://marmelab.com/ra-enterprise/#fromsww" }, "react-admin Enterprise Edition"))))))),
            React.createElement("div", { className: ErrorClasses.toolbar }, resetErrorBoundary ? (React.createElement(Button, { variant: "contained", startIcon: React.createElement(RefreshIcon, null), onClick: () => {
                    resetErrorBoundary();
                } }, translate('ra.action.refresh'))) : (React.createElement(Button, { variant: "contained", startIcon: React.createElement(HistoryIcon, null), onClick: goBack }, translate('ra.action.back')))))));
};
export default Error;
//# sourceMappingURL=Error.js.map