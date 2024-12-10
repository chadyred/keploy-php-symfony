import React from 'react';
import { Tooltip, IconButton, useMediaQuery } from '@mui/material';
import Brightness4Icon from '@mui/icons-material/Brightness4';
import Brightness7Icon from '@mui/icons-material/Brightness7';
import { useTranslate } from 'ra-core';
import { useThemesContext, useTheme } from '../theme';
/**
 * Button toggling the theme (light or dark).
 *
 * Enabled by default in the <AppBar> when the <Admin> component has a darkMode.
 *
 * @example
 * import { AppBar, ToggleThemeButton } from 'react-admin';
 *
 * const MyAppBar = () => (
 *     <AppBar toolbar={<ToggleThemeButton />} />
 * );
 *
 * const MyLayout = ({ children }) => (
 *     <Layout appBar={MyAppBar}>
 *         {children}
 *     </Layout>
 * );
 */
export var ToggleThemeButton = function () {
    var translate = useTranslate();
    var _a = useThemesContext(), darkTheme = _a.darkTheme, defaultTheme = _a.defaultTheme;
    var prefersDarkMode = useMediaQuery('(prefers-color-scheme: dark)', {
        noSsr: true,
    });
    var _b = useTheme(defaultTheme || (prefersDarkMode && darkTheme ? 'dark' : 'light')), theme = _b[0], setTheme = _b[1];
    var handleTogglePaletteType = function () {
        setTheme(theme === 'dark' ? 'light' : 'dark');
    };
    var toggleThemeTitle = translate('ra.action.toggle_theme', {
        _: 'Toggle Theme',
    });
    return (React.createElement(Tooltip, { title: toggleThemeTitle, enterDelay: 300 },
        React.createElement(IconButton, { color: "inherit", onClick: handleTogglePaletteType, "aria-label": toggleThemeTitle }, theme === 'dark' ? React.createElement(Brightness7Icon, null) : React.createElement(Brightness4Icon, null))));
};
//# sourceMappingURL=ToggleThemeButton.js.map