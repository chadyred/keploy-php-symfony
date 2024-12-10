import * as React from 'react';
import { useWatch } from 'react-hook-form';
export var FormInspector = function (_a) {
    var _b = _a.name, name = _b === void 0 ? 'title' : _b;
    var value = useWatch({ name: name });
    return (React.createElement("div", { style: { backgroundColor: 'lightgrey' } },
        name,
        " value in form:\u00A0",
        React.createElement("code", null,
            JSON.stringify(value),
            " (",
            typeof value,
            ")")));
};
//# sourceMappingURL=common.js.map