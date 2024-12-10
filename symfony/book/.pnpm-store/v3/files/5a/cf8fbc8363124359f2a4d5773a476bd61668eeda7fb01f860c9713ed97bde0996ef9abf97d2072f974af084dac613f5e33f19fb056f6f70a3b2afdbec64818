"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.usePreference = void 0;
var useStore_1 = require("../store/useStore");
var PreferenceKeyContext_1 = require("./PreferenceKeyContext");
/**
 * Get a preference value from the store
 *
 * Relies on the store, using a key namespaced with the preference key from the PreferenceKeyContext
 * @example
 *
 * // when used inside a PreferenceKeyContext of value 'my-app'
 * const [theme, setTheme] = usePreference('theme', 'light');
 * // this is equivalent to
 * const [theme, setTheme] = useStore('my-app.theme', 'light');
 */
var usePreference = function (key, defaultValue) {
    var preferenceKey = (0, PreferenceKeyContext_1.usePreferenceKey)();
    if (!preferenceKey) {
        throw new Error("usePreference cannot be used outside of a Configurable component. Did you forget to wrap your component with <Configurable>? If you don't want to use Configurable, you can use the useStore hook instead.");
    }
    return (0, useStore_1.useStore)(preferenceKey && key ? "".concat(preferenceKey, ".").concat(key) : preferenceKey !== null && preferenceKey !== void 0 ? preferenceKey : key, defaultValue);
};
exports.usePreference = usePreference;
//# sourceMappingURL=usePreference.js.map