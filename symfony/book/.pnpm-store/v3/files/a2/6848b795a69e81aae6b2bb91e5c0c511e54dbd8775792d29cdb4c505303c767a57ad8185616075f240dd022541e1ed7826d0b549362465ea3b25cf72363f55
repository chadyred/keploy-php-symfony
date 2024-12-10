const parsedJsonReplacer = (key, value) => {
    if (["reference", "embedded"].includes(key) &&
        typeof value === "object" &&
        value !== null) {
        return `Object ${value.id || value.title}`;
    }
    return value;
};
export default parsedJsonReplacer;
//# sourceMappingURL=parsedJsonReplacer.js.map