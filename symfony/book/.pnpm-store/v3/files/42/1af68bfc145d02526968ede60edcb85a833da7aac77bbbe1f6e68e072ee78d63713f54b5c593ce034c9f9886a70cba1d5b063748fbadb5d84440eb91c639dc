import { deepmerge } from '@mui/utils';
var defaultThemeInvariants = {
    typography: {
        h6: {
            fontWeight: 400,
        },
    },
    sidebar: {
        width: 240,
        closedWidth: 50,
    },
    components: {
        MuiAutocomplete: {
            defaultProps: {
                fullWidth: true,
            },
            variants: [
                {
                    props: {},
                    style: function (_a) {
                        var _b;
                        var theme = _a.theme;
                        return (_b = {},
                            _b[theme.breakpoints.down('sm')] = { width: '100%' },
                            _b);
                    },
                },
            ],
        },
        MuiTextField: {
            defaultProps: {
                variant: 'filled',
                margin: 'dense',
                size: 'small',
                fullWidth: true,
            },
            variants: [
                {
                    props: {},
                    style: function (_a) {
                        var _b;
                        var theme = _a.theme;
                        return (_b = {},
                            _b[theme.breakpoints.down('sm')] = { width: '100%' },
                            _b);
                    },
                },
            ],
        },
        MuiFormControl: {
            defaultProps: {
                variant: 'filled',
                margin: 'dense',
                size: 'small',
                fullWidth: true,
            },
        },
        RaSimpleFormIterator: {
            defaultProps: {
                fullWidth: true,
            },
        },
        RaTranslatableInputs: {
            defaultProps: {
                fullWidth: true,
            },
        },
    },
};
export var defaultLightTheme = deepmerge(defaultThemeInvariants, {
    palette: {
        background: {
            default: '#fafafb',
        },
        secondary: {
            light: '#6ec6ff',
            main: '#2196f3',
            dark: '#0069c0',
            contrastText: '#fff',
        },
    },
    components: {
        MuiFilledInput: {
            styleOverrides: {
                root: {
                    backgroundColor: 'rgba(0, 0, 0, 0.04)',
                    '&$disabled': {
                        backgroundColor: 'rgba(0, 0, 0, 0.04)',
                    },
                },
            },
        },
    },
});
export var defaultDarkTheme = deepmerge(defaultThemeInvariants, {
    palette: {
        mode: 'dark',
        primary: {
            main: '#90caf9',
        },
        background: {
            default: '#313131',
        },
    },
});
export var defaultTheme = defaultLightTheme;
//# sourceMappingURL=defaultTheme.js.map