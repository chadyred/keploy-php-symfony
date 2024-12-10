const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/';
const intToChar = new Uint8Array(64); // 64 possible chars.
const charToInt = new Uint8Array(128); // z is 122 in ASCII
for (let i = 0; i < chars.length; i++) {
    const c = chars.charCodeAt(i);
    intToChar[i] = c;
    charToInt[c] = i;
}
const comma = ','.charCodeAt(0);
const semicolon = ';'.charCodeAt(0);
function hasMoreVlq(mappings, i, length) {
    if (i >= length)
        return false;
    return mappings.charCodeAt(i) !== comma;
}
function indexOf(mappings, char, index) {
    const idx = mappings.indexOf(char, index);
    return idx === -1 ? mappings.length : idx;
}
let posOut = 0;
function resetPos() {
    posOut = 0;
}
function decodeFirstOctet(mappings, pos) {
    const c = mappings.charCodeAt(pos);
    let value = charToInt[c];
    const shouldNegate = value & 1;
    value >>>= 1;
    if (shouldNegate) {
        value = -0x80000000 | -value;
    }
    return value;
}
function decodeInteger(mappings, pos, relative) {
    let value = 0;
    let shift = 0;
    let integer = 0;
    do {
        const c = mappings.charCodeAt(pos++);
        integer = charToInt[c];
        value |= (integer & 31) << shift;
        shift += 5;
    } while (integer & 32);
    const shouldNegate = value & 1;
    value >>>= 1;
    if (shouldNegate) {
        value = -0x80000000 | -value;
    }
    posOut = pos;
    return relative + value;
}
function encodeInteger(buf, pos, num, relative) {
    let delta = num - relative;
    delta = delta < 0 ? (-delta << 1) | 1 : delta << 1;
    do {
        let clamped = delta & 0b011111;
        delta >>>= 5;
        if (delta > 0)
            clamped |= 0b100000;
        buf[pos++] = intToChar[clamped];
    } while (delta > 0);
    posOut = pos;
    return num;
}
function maybeFlush(build, buf, pos, copy, length) {
    if (pos < length) {
        posOut = pos;
        return build;
    }
    const out = td.decode(buf);
    copy.copyWithin(0, length, pos);
    posOut = pos - length;
    return build + out;
}
function write(buf, pos, value) {
    buf[pos] = value;
    posOut = pos + 1;
}
// Provide a fallback for older environments.
const td = typeof TextDecoder !== 'undefined'
    ? /* #__PURE__ */ new TextDecoder()
    : typeof Buffer !== 'undefined'
        ? {
            decode(buf) {
                const out = Buffer.from(buf.buffer, buf.byteOffset, buf.byteLength);
                return out.toString();
            },
        }
        : {
            decode(buf) {
                let out = '';
                for (let i = 0; i < buf.length; i++) {
                    out += String.fromCharCode(buf[i]);
                }
                return out;
            },
        };

const NO_NAME = -1;
const NO_SOURCE = -1;
function decodeOriginalScopes(input) {
    let line = 0;
    const scopes = [];
    const stack = [];
    for (let i = 0; i < input.length; i = posOut + 1) {
        line = decodeInteger(input, i, line);
        const column = decodeInteger(input, posOut, 0);
        if (!hasMoreVlq(input, posOut, input.length)) {
            const last = stack.pop();
            last[2] = line;
            last[3] = column;
            continue;
        }
        const kind = decodeInteger(input, posOut, 0);
        const fields = decodeInteger(input, posOut, 0);
        const name = fields & 0b0001 ? decodeInteger(input, posOut, 0) : NO_NAME;
        const scope = name === NO_NAME ? [line, column, 0, 0, kind] : [line, column, 0, 0, kind, name];
        scopes.push(scope);
        stack.push(scope);
        const index = indexOf(input, ',', posOut);
        if (posOut < index) {
            const vars = [];
            scope.vars = vars;
            while (posOut < index) {
                const varsIndex = decodeInteger(input, posOut, 0);
                vars.push(varsIndex);
            }
        }
    }
    return scopes;
}
function encodeOriginalScopes(scopes) {
    let out = '';
    if (scopes.length === 0)
        return out;
    const bufLength = 1024 * 16;
    const subLength = bufLength - (7 * 6 + 1);
    const buf = new Uint8Array(bufLength);
    const sub = buf.subarray(0, subLength);
    resetPos();
    const endStack = [];
    let lastEndLine = scopes[0][2] + 1;
    let lastEndColumn = scopes[0][3];
    let line = 0;
    for (let i = 0; i < scopes.length; i++) {
        const scope = scopes[i];
        const { 0: startLine, 1: startColumn, 2: endLine, 3: endColumn, 4: kind } = scope;
        const name = scope.length === 6 ? scope[5] : NO_NAME;
        const vars = 'vars' in scope ? scope.vars : [];
        out = maybeFlush(out, buf, posOut, buf, bufLength);
        if (i > 0)
            write(buf, posOut, comma);
        while (startLine > lastEndLine || (startLine === lastEndLine && startColumn >= lastEndColumn)) {
            out = maybeFlush(out, sub, posOut, buf, subLength);
            line = encodeInteger(buf, posOut, lastEndLine, line);
            encodeInteger(buf, posOut, lastEndColumn, 0);
            write(buf, posOut, comma);
            lastEndColumn = endStack.pop();
            lastEndLine = endStack.pop();
        }
        line = encodeInteger(buf, posOut, startLine, line);
        encodeInteger(buf, posOut, startColumn, 0);
        endStack.push(lastEndLine);
        endStack.push(lastEndColumn);
        lastEndLine = endLine;
        lastEndColumn = endColumn;
        encodeInteger(buf, posOut, kind, 0);
        const fields = name === NO_NAME ? 0 : 1;
        encodeInteger(buf, posOut, fields, 0);
        if (name !== NO_NAME)
            encodeInteger(buf, posOut, name, 0);
        for (const v of vars) {
            out = maybeFlush(out, sub, posOut, buf, subLength);
            encodeInteger(buf, posOut, v, 0);
        }
    }
    while (endStack.length > 0) {
        out = maybeFlush(out, sub, posOut, buf, subLength);
        write(buf, posOut, comma);
        line = encodeInteger(buf, posOut, lastEndLine, line);
        encodeInteger(buf, posOut, lastEndColumn, 0);
        lastEndColumn = endStack.pop();
        lastEndLine = endStack.pop();
    }
    return out + td.decode(buf.subarray(0, posOut));
}
function decodeGeneratedRanges(input) {
    let genLine = 0;
    let genColumn = 0;
    let definitionSourcesIndex = 0;
    let definitionScopeIndex = 0;
    let callsiteSourcesIndex = 0;
    let callsiteLine = 0;
    let callsiteColumn = 0;
    let bindingLine = 0;
    let bindingColumn = 0;
    const ranges = [];
    const stack = [];
    let index = 0;
    do {
        const semi = indexOf(input, ';', index);
        genColumn = 0;
        for (let i = index; i < semi; i = posOut + 1) {
            genColumn = decodeInteger(input, i, genColumn);
            if (hasMoreVlq(input, posOut, semi)) {
                const fields = decodeInteger(input, posOut, 0);
                let defSourcesIndex = NO_SOURCE;
                let defScopeIndex = NO_SOURCE;
                if (fields & 0b0001) {
                    defSourcesIndex = decodeInteger(input, posOut, definitionSourcesIndex);
                    if (definitionSourcesIndex !== defSourcesIndex) {
                        definitionScopeIndex = 0;
                        definitionSourcesIndex = defSourcesIndex;
                    }
                    defScopeIndex = definitionScopeIndex = decodeInteger(input, posOut, definitionScopeIndex);
                }
                const range = [genLine, genColumn, 0, 0, defSourcesIndex, defScopeIndex];
                if (fields & 0b0010) {
                    const callSourcesIndex = decodeInteger(input, posOut, callsiteSourcesIndex);
                    const sameSource = callSourcesIndex === callsiteSourcesIndex;
                    const callLine = decodeInteger(input, posOut, sameSource ? callsiteLine : 0);
                    const sameLine = sameSource && callLine === callsiteLine;
                    callsiteColumn = decodeInteger(input, posOut, sameLine ? callsiteColumn : 0);
                    callsiteSourcesIndex = callSourcesIndex;
                    callsiteLine = callLine;
                    range.callsite = [callsiteSourcesIndex, callsiteLine, callsiteColumn];
                }
                if (fields & 0b0100) {
                    range.isScope = true;
                }
                if (hasMoreVlq(input, posOut, semi)) {
                    const bindings = [];
                    range.bindings = bindings;
                    do {
                        bindingLine = genLine;
                        bindingColumn = genColumn;
                        let name = decodeInteger(input, posOut, 0);
                        const hasExpressions = decodeFirstOctet(input, posOut);
                        const binding = [[name]];
                        bindings.push(binding);
                        if (hasExpressions < -1) {
                            const expressionsCount = decodeInteger(input, posOut, 0);
                            for (let i = -1; i > expressionsCount; i--) {
                                const prevBindingLine = bindingLine;
                                bindingLine = decodeInteger(input, posOut, bindingLine);
                                bindingColumn = decodeInteger(input, posOut, bindingLine === prevBindingLine ? bindingColumn : 0);
                                name = decodeInteger(input, posOut, 0);
                            }
                            binding.push([name, bindingLine, bindingColumn]);
                        }
                    } while (hasMoreVlq(input, posOut, semi));
                }
                ranges.push(range);
                stack.push(range);
            }
            else {
                const range = stack.pop();
                range[2] = genLine;
                range[3] = genColumn;
            }
        }
        genLine++;
        index = semi + 1;
    } while (index <= input.length);
    return ranges;
}
function encodeGeneratedRanges(ranges) {
    let out = '';
    if (ranges.length === 0)
        return out;
    const bufLength = 1024 * 16;
    const subLength = bufLength - (7 * 7 + 1);
    const buf = new Uint8Array(bufLength);
    const sub = buf.subarray(0, subLength);
    resetPos();
    const endStack = [];
    let lastEndLine = ranges[0][2] + 1;
    let lastEndColumn = ranges[0][3];
    let line = 0;
    let genColumn = 0;
    let definitionSourcesIndex = 0;
    let definitionScopeIndex = 0;
    let callsiteSourcesIndex = 0;
    let callsiteLine = 0;
    let callsiteColumn = 0;
    for (let i = 0; i < ranges.length; i++) {
        const range = ranges[i];
        const { 0: startLine, 1: startColumn, 2: endLine, 3: endColumn, 4: defSourcesIndex, 5: defScopeIndex, } = range;
        const isScope = 'isScope' in range && range.isScope;
        const hasCallsite = 'callsite' in range;
        const hasBindings = 'bindings' in range;
        while (startLine > lastEndLine || (startLine === lastEndLine && startColumn >= lastEndColumn)) {
            if (line < lastEndLine) {
                out = catchupLine(out, buf, bufLength, line, lastEndLine);
                line = lastEndLine;
                genColumn = 0;
            }
            else {
                out = maybeFlush(out, buf, posOut, buf, bufLength);
                write(buf, posOut, comma);
            }
            out = maybeFlush(out, sub, posOut, buf, subLength);
            genColumn = encodeInteger(buf, posOut, lastEndColumn, genColumn);
            lastEndColumn = endStack.pop();
            lastEndLine = endStack.pop();
        }
        if (line < startLine) {
            out = catchupLine(out, buf, bufLength, line, startLine);
            line = startLine;
            genColumn = 0;
        }
        else if (i > 0) {
            out = maybeFlush(out, buf, posOut, buf, bufLength);
            write(buf, posOut, comma);
        }
        out = maybeFlush(out, sub, posOut, buf, subLength);
        genColumn = encodeInteger(buf, posOut, range[1], genColumn);
        endStack.push(lastEndLine);
        endStack.push(lastEndColumn);
        lastEndLine = endLine;
        lastEndColumn = endColumn;
        const fields = (defSourcesIndex === NO_SOURCE ? 0 : 0b0001) |
            (hasCallsite ? 0b0010 : 0) |
            (isScope ? 0b0100 : 0);
        encodeInteger(buf, posOut, fields, 0);
        if (defSourcesIndex !== NO_SOURCE) {
            if (defSourcesIndex !== definitionSourcesIndex)
                definitionScopeIndex = 0;
            definitionSourcesIndex = encodeInteger(buf, posOut, defSourcesIndex, definitionSourcesIndex);
            definitionScopeIndex = encodeInteger(buf, posOut, defScopeIndex, definitionScopeIndex);
        }
        if (hasCallsite) {
            const { 0: callSourcesIndex, 1: callLine, 2: callColumn } = range.callsite;
            if (callSourcesIndex !== callsiteSourcesIndex) {
                callsiteLine = 0;
                callsiteColumn = 0;
            }
            else if (callLine !== callsiteLine) {
                callsiteColumn = 0;
            }
            callsiteSourcesIndex = encodeInteger(buf, posOut, callSourcesIndex, callsiteSourcesIndex);
            callsiteLine = encodeInteger(buf, posOut, callLine, callsiteLine);
            callsiteColumn = encodeInteger(buf, posOut, callColumn, callsiteColumn);
        }
        if (hasBindings) {
            for (const binding of range.bindings) {
                out = maybeFlush(out, sub, posOut, buf, subLength);
                encodeInteger(buf, posOut, binding[0][0], 0);
                if (binding.length > 1) {
                    encodeInteger(buf, posOut, -binding.length, 0);
                    let bindingStartLine = startLine;
                    let bindingStartColumn = startColumn;
                    for (let i = 1; i < binding.length; i++) {
                        out = maybeFlush(out, sub, posOut, buf, subLength);
                        const expression = binding[i];
                        bindingStartLine = encodeInteger(buf, posOut, expression[1], bindingStartLine);
                        bindingStartColumn = encodeInteger(buf, posOut, expression[2], bindingStartColumn);
                        encodeInteger(buf, posOut, expression[0], 0);
                    }
                }
            }
        }
    }
    while (endStack.length > 0) {
        if (line < lastEndLine) {
            out = catchupLine(out, buf, bufLength, line, lastEndLine);
            line = lastEndLine;
            genColumn = 0;
        }
        else {
            out = maybeFlush(out, buf, posOut, buf, bufLength);
            write(buf, posOut, comma);
        }
        out = maybeFlush(out, sub, posOut, buf, subLength);
        genColumn = encodeInteger(buf, posOut, lastEndColumn, genColumn);
        lastEndColumn = endStack.pop();
        lastEndLine = endStack.pop();
    }
    return out + td.decode(buf.subarray(0, posOut));
}
function catchupLine(build, buf, bufLength, lastLine, line) {
    do {
        build = maybeFlush(build, buf, posOut, buf, bufLength);
        write(buf, posOut, semicolon);
    } while (++lastLine < line);
    return build;
}

function decode(mappings) {
    const decoded = [];
    let genColumn = 0;
    let sourcesIndex = 0;
    let sourceLine = 0;
    let sourceColumn = 0;
    let namesIndex = 0;
    let index = 0;
    do {
        const semi = indexOf(mappings, ';', index);
        const line = [];
        let sorted = true;
        let lastCol = 0;
        genColumn = 0;
        for (let i = index; i < semi; i = posOut + 1) {
            let seg;
            genColumn = decodeInteger(mappings, i, genColumn);
            if (genColumn < lastCol)
                sorted = false;
            lastCol = genColumn;
            if (hasMoreVlq(mappings, posOut, semi)) {
                sourcesIndex = decodeInteger(mappings, posOut, sourcesIndex);
                sourceLine = decodeInteger(mappings, posOut, sourceLine);
                sourceColumn = decodeInteger(mappings, posOut, sourceColumn);
                if (hasMoreVlq(mappings, posOut, semi)) {
                    namesIndex = decodeInteger(mappings, posOut, namesIndex);
                    seg = [genColumn, sourcesIndex, sourceLine, sourceColumn, namesIndex];
                }
                else {
                    seg = [genColumn, sourcesIndex, sourceLine, sourceColumn];
                }
            }
            else {
                seg = [genColumn];
            }
            line.push(seg);
        }
        if (!sorted)
            sort(line);
        decoded.push(line);
        index = semi + 1;
    } while (index <= mappings.length);
    return decoded;
}
function sort(line) {
    line.sort(sortComparator);
}
function sortComparator(a, b) {
    return a[0] - b[0];
}
function encode(decoded) {
    const bufLength = 1024 * 16;
    // We can push up to 5 ints, each int can take at most 7 chars, and we
    // may push a comma.
    const subLength = bufLength - (7 * 5 + 1);
    const buf = new Uint8Array(bufLength);
    const sub = buf.subarray(0, subLength);
    resetPos();
    let out = '';
    let genColumn = 0;
    let sourcesIndex = 0;
    let sourceLine = 0;
    let sourceColumn = 0;
    let namesIndex = 0;
    for (let i = 0; i < decoded.length; i++) {
        const line = decoded[i];
        out = maybeFlush(out, buf, posOut, buf, bufLength);
        if (i > 0)
            write(buf, posOut, semicolon);
        if (line.length === 0)
            continue;
        genColumn = 0;
        for (let j = 0; j < line.length; j++) {
            const segment = line[j];
            out = maybeFlush(out, sub, posOut, buf, subLength);
            if (j > 0)
                write(buf, posOut, comma);
            genColumn = encodeInteger(buf, posOut, segment[0], genColumn);
            if (segment.length === 1)
                continue;
            sourcesIndex = encodeInteger(buf, posOut, segment[1], sourcesIndex);
            sourceLine = encodeInteger(buf, posOut, segment[2], sourceLine);
            sourceColumn = encodeInteger(buf, posOut, segment[3], sourceColumn);
            if (segment.length === 4)
                continue;
            namesIndex = encodeInteger(buf, posOut, segment[4], namesIndex);
        }
    }
    return out + td.decode(buf.subarray(0, posOut));
}

export { decode, decodeGeneratedRanges, decodeOriginalScopes, encode, encodeGeneratedRanges, encodeOriginalScopes };
//# sourceMappingURL=sourcemap-codec.mjs.map
