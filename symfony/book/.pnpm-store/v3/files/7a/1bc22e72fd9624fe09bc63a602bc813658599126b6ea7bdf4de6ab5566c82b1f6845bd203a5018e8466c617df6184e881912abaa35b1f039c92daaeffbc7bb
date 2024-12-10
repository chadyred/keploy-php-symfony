import inflection from "inflection";
const getType = (openApiType, format) => {
    if (format) {
        switch (format) {
            case "int32":
            case "int64":
                return "integer";
            default:
                return inflection.camelize(format.replace("-", "_"), true);
        }
    }
    return openApiType;
};
export default getType;
//# sourceMappingURL=getType.js.map