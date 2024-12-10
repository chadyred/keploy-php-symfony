var __create = Object.create;
var __defProp = Object.defineProperty;
var __getOwnPropDesc = Object.getOwnPropertyDescriptor;
var __getOwnPropNames = Object.getOwnPropertyNames;
var __getProtoOf = Object.getPrototypeOf;
var __hasOwnProp = Object.prototype.hasOwnProperty;
var __commonJS = (cb, mod) => function __require() {
  return mod || (0, cb[__getOwnPropNames(cb)[0]])((mod = { exports: {} }).exports, mod), mod.exports;
};
var __copyProps = (to, from, except, desc) => {
  if (from && typeof from === "object" || typeof from === "function") {
    for (let key of __getOwnPropNames(from))
      if (!__hasOwnProp.call(to, key) && key !== except)
        __defProp(to, key, { get: () => from[key], enumerable: !(desc = __getOwnPropDesc(from, key)) || desc.enumerable });
  }
  return to;
};
var __toESM = (mod, isNodeMode, target) => (target = mod != null ? __create(__getProtoOf(mod)) : {}, __copyProps(
  // If the importer is in node compatibility mode or this is not an ESM
  // file that has been converted to a CommonJS file using a Babel-
  // compatible transform (i.e. "__esModule" has not been set), then set
  // "default" to the CommonJS "module.exports" for node compatibility.
  isNodeMode || !mod || !mod.__esModule ? __defProp(target, "default", { value: mod, enumerable: true }) : target,
  mod
));

// node_modules/@jridgewell/sourcemap-codec/dist/sourcemap-codec.umd.js
var require_sourcemap_codec_umd = __commonJS({
  "node_modules/@jridgewell/sourcemap-codec/dist/sourcemap-codec.umd.js"(exports, module) {
    (function(global, factory) {
      typeof exports === "object" && typeof module !== "undefined" ? factory(exports) : typeof define === "function" && define.amd ? define(["exports"], factory) : (global = typeof globalThis !== "undefined" ? globalThis : global || self, factory(global.sourcemapCodec = {}));
    })(exports, function(exports2) {
      "use strict";
      const chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/";
      const intToChar = new Uint8Array(64);
      const charToInt = new Uint8Array(128);
      for (let i = 0; i < chars.length; i++) {
        const c = chars.charCodeAt(i);
        intToChar[i] = c;
        charToInt[c] = i;
      }
      const comma = ",".charCodeAt(0);
      const semicolon = ";".charCodeAt(0);
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
          value = -2147483648 | -value;
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
          value = -2147483648 | -value;
        }
        posOut = pos;
        return relative + value;
      }
      function encodeInteger(buf, pos, num, relative) {
        let delta = num - relative;
        delta = delta < 0 ? -delta << 1 | 1 : delta << 1;
        do {
          let clamped = delta & 31;
          delta >>>= 5;
          if (delta > 0)
            clamped |= 32;
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
      const td = typeof TextDecoder !== "undefined" ? /* @__PURE__ */ new TextDecoder() : typeof Buffer !== "undefined" ? {
        decode(buf) {
          const out = Buffer.from(buf.buffer, buf.byteOffset, buf.byteLength);
          return out.toString();
        }
      } : {
        decode(buf) {
          let out = "";
          for (let i = 0; i < buf.length; i++) {
            out += String.fromCharCode(buf[i]);
          }
          return out;
        }
      };
      const NO_NAME2 = -1;
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
          const name = fields & 1 ? decodeInteger(input, posOut, 0) : NO_NAME2;
          const scope = name === NO_NAME2 ? [line, column, 0, 0, kind] : [line, column, 0, 0, kind, name];
          scopes.push(scope);
          stack.push(scope);
          const index = indexOf(input, ",", posOut);
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
        let out = "";
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
          const name = scope.length === 6 ? scope[5] : NO_NAME2;
          const vars = "vars" in scope ? scope.vars : [];
          out = maybeFlush(out, buf, posOut, buf, bufLength);
          if (i > 0)
            write(buf, posOut, comma);
          while (startLine > lastEndLine || startLine === lastEndLine && startColumn >= lastEndColumn) {
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
          const fields = name === NO_NAME2 ? 0 : 1;
          encodeInteger(buf, posOut, fields, 0);
          if (name !== NO_NAME2)
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
          const semi = indexOf(input, ";", index);
          genColumn = 0;
          for (let i = index; i < semi; i = posOut + 1) {
            genColumn = decodeInteger(input, i, genColumn);
            if (hasMoreVlq(input, posOut, semi)) {
              const fields = decodeInteger(input, posOut, 0);
              let defSourcesIndex = NO_SOURCE;
              let defScopeIndex = NO_SOURCE;
              if (fields & 1) {
                defSourcesIndex = decodeInteger(input, posOut, definitionSourcesIndex);
                if (definitionSourcesIndex !== defSourcesIndex) {
                  definitionScopeIndex = 0;
                  definitionSourcesIndex = defSourcesIndex;
                }
                defScopeIndex = definitionScopeIndex = decodeInteger(input, posOut, definitionScopeIndex);
              }
              const range = [genLine, genColumn, 0, 0, defSourcesIndex, defScopeIndex];
              if (fields & 2) {
                const callSourcesIndex = decodeInteger(input, posOut, callsiteSourcesIndex);
                const sameSource = callSourcesIndex === callsiteSourcesIndex;
                const callLine = decodeInteger(input, posOut, sameSource ? callsiteLine : 0);
                const sameLine = sameSource && callLine === callsiteLine;
                callsiteColumn = decodeInteger(input, posOut, sameLine ? callsiteColumn : 0);
                callsiteSourcesIndex = callSourcesIndex;
                callsiteLine = callLine;
                range.callsite = [callsiteSourcesIndex, callsiteLine, callsiteColumn];
              }
              if (fields & 4) {
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
                    for (let i2 = -1; i2 > expressionsCount; i2--) {
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
            } else {
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
        let out = "";
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
          const { 0: startLine, 1: startColumn, 2: endLine, 3: endColumn, 4: defSourcesIndex, 5: defScopeIndex } = range;
          const isScope = "isScope" in range && range.isScope;
          const hasCallsite = "callsite" in range;
          const hasBindings = "bindings" in range;
          while (startLine > lastEndLine || startLine === lastEndLine && startColumn >= lastEndColumn) {
            if (line < lastEndLine) {
              out = catchupLine(out, buf, bufLength, line, lastEndLine);
              line = lastEndLine;
              genColumn = 0;
            } else {
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
          } else if (i > 0) {
            out = maybeFlush(out, buf, posOut, buf, bufLength);
            write(buf, posOut, comma);
          }
          out = maybeFlush(out, sub, posOut, buf, subLength);
          genColumn = encodeInteger(buf, posOut, range[1], genColumn);
          endStack.push(lastEndLine);
          endStack.push(lastEndColumn);
          lastEndLine = endLine;
          lastEndColumn = endColumn;
          const fields = (defSourcesIndex === NO_SOURCE ? 0 : 1) | (hasCallsite ? 2 : 0) | (isScope ? 4 : 0);
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
            } else if (callLine !== callsiteLine) {
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
                for (let i2 = 1; i2 < binding.length; i2++) {
                  out = maybeFlush(out, sub, posOut, buf, subLength);
                  const expression = binding[i2];
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
          } else {
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
          const semi = indexOf(mappings, ";", index);
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
              } else {
                seg = [genColumn, sourcesIndex, sourceLine, sourceColumn];
              }
            } else {
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
      function encode2(decoded) {
        const bufLength = 1024 * 16;
        const subLength = bufLength - (7 * 5 + 1);
        const buf = new Uint8Array(bufLength);
        const sub = buf.subarray(0, subLength);
        resetPos();
        let out = "";
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
      exports2.decode = decode;
      exports2.decodeGeneratedRanges = decodeGeneratedRanges;
      exports2.decodeOriginalScopes = decodeOriginalScopes;
      exports2.encode = encode2;
      exports2.encodeGeneratedRanges = encodeGeneratedRanges;
      exports2.encodeOriginalScopes = encodeOriginalScopes;
      Object.defineProperty(exports2, "__esModule", { value: true });
    });
  }
});

// ../trace-mapping/dist/trace-mapping.umd.js
var require_trace_mapping_umd = __commonJS({
  "../trace-mapping/dist/trace-mapping.umd.js"(exports, module) {
    "use strict";
    (function(g, f) {
      if (typeof exports == "object" && typeof module < "u") {
        module.exports = f();
      } else if ("function" == typeof define && define.amd) {
        define("sourcemapCodec", f);
      } else {
        g["sourcemapCodec"] = f();
      }
    })(typeof globalThis < "u" ? globalThis : typeof self < "u" ? self : exports, function() {
      var exports2 = {};
      var __exports = exports2;
      var module2 = { exports: exports2 };
      "use strict";
      var __create2 = Object.create;
      var __defProp2 = Object.defineProperty;
      var __getOwnPropDesc2 = Object.getOwnPropertyDescriptor;
      var __getOwnPropNames2 = Object.getOwnPropertyNames;
      var __getProtoOf2 = Object.getPrototypeOf;
      var __hasOwnProp2 = Object.prototype.hasOwnProperty;
      var __commonJS2 = (cb, mod) => function __require() {
        return mod || (0, cb[__getOwnPropNames2(cb)[0]])((mod = { exports: {} }).exports, mod), mod.exports;
      };
      var __export = (target, all) => {
        for (var name in all)
          __defProp2(target, name, { get: all[name], enumerable: true });
      };
      var __copyProps2 = (to, from, except, desc) => {
        if (from && typeof from === "object" || typeof from === "function") {
          for (let key of __getOwnPropNames2(from))
            if (!__hasOwnProp2.call(to, key) && key !== except)
              __defProp2(to, key, { get: () => from[key], enumerable: !(desc = __getOwnPropDesc2(from, key)) || desc.enumerable });
        }
        return to;
      };
      var __toESM2 = (mod, isNodeMode, target) => (target = mod != null ? __create2(__getProtoOf2(mod)) : {}, __copyProps2(
        // If the importer is in node compatibility mode or this is not an ESM
        // file that has been converted to a CommonJS file using a Babel-
        // compatible transform (i.e. "__esModule" has not been set), then set
        // "default" to the CommonJS "module.exports" for node compatibility.
        isNodeMode || !mod || !mod.__esModule ? __defProp2(target, "default", { value: mod, enumerable: true }) : target,
        mod
      ));
      var __toCommonJS = (mod) => __copyProps2(__defProp2({}, "__esModule", { value: true }), mod);
      var require_sourcemap_codec_umd2 = __commonJS2({
        "../sourcemap-codec/dist/sourcemap-codec.umd.js"(exports3, module22) {
          "use strict";
          (function(g, f) {
            if (typeof exports3 == "object" && typeof module22 < "u") {
              module22.exports = f();
            } else if ("function" == typeof define && define.amd) {
              define("sourcemapCodec", f);
            } else {
              g["sourcemapCodec"] = f();
            }
          })(typeof globalThis < "u" ? globalThis : typeof self < "u" ? self : exports3, function() {
            var exports22 = {};
            var __exports2 = exports22;
            var module3 = { exports: exports22 };
            "use strict";
            var __defProp22 = Object.defineProperty;
            var __getOwnPropDesc22 = Object.getOwnPropertyDescriptor;
            var __getOwnPropNames22 = Object.getOwnPropertyNames;
            var __hasOwnProp22 = Object.prototype.hasOwnProperty;
            var __export2 = (target, all) => {
              for (var name in all)
                __defProp22(target, name, { get: all[name], enumerable: true });
            };
            var __copyProps22 = (to, from, except, desc) => {
              if (from && typeof from === "object" || typeof from === "function") {
                for (let key of __getOwnPropNames22(from))
                  if (!__hasOwnProp22.call(to, key) && key !== except)
                    __defProp22(to, key, { get: () => from[key], enumerable: !(desc = __getOwnPropDesc22(from, key)) || desc.enumerable });
              }
              return to;
            };
            var __toCommonJS2 = (mod) => __copyProps22(__defProp22({}, "__esModule", { value: true }), mod);
            var sourcemap_codec_exports = {};
            __export2(sourcemap_codec_exports, {
              decode: () => decode2,
              decodeGeneratedRanges: () => decodeGeneratedRanges,
              decodeOriginalScopes: () => decodeOriginalScopes,
              encode: () => encode2,
              encodeGeneratedRanges: () => encodeGeneratedRanges,
              encodeOriginalScopes: () => encodeOriginalScopes
            });
            module3.exports = __toCommonJS2(sourcemap_codec_exports);
            var comma = ",".charCodeAt(0);
            var semicolon = ";".charCodeAt(0);
            var chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/";
            var intToChar = new Uint8Array(64);
            var charToInt = new Uint8Array(128);
            for (let i = 0; i < chars.length; i++) {
              const c = chars.charCodeAt(i);
              intToChar[i] = c;
              charToInt[c] = i;
            }
            function decodeInteger(reader, relative) {
              let value = 0;
              let shift = 0;
              let integer = 0;
              do {
                const c = reader.next();
                integer = charToInt[c];
                value |= (integer & 31) << shift;
                shift += 5;
              } while (integer & 32);
              const shouldNegate = value & 1;
              value >>>= 1;
              if (shouldNegate) {
                value = -2147483648 | -value;
              }
              return relative + value;
            }
            function encodeInteger(builder, num, relative) {
              let delta = num - relative;
              delta = delta < 0 ? -delta << 1 | 1 : delta << 1;
              do {
                let clamped = delta & 31;
                delta >>>= 5;
                if (delta > 0) clamped |= 32;
                builder.write(intToChar[clamped]);
              } while (delta > 0);
              return num;
            }
            function hasMoreVlq(reader, max) {
              if (reader.pos >= max) return false;
              return reader.peek() !== comma;
            }
            var bufLength = 1024 * 16;
            var td = typeof TextDecoder !== "undefined" ? /* @__PURE__ */ new TextDecoder() : typeof Buffer !== "undefined" ? {
              decode(buf) {
                const out = Buffer.from(buf.buffer, buf.byteOffset, buf.byteLength);
                return out.toString();
              }
            } : {
              decode(buf) {
                let out = "";
                for (let i = 0; i < buf.length; i++) {
                  out += String.fromCharCode(buf[i]);
                }
                return out;
              }
            };
            var StringWriter = class {
              constructor() {
                this.pos = 0;
                this.out = "";
                this.buffer = new Uint8Array(bufLength);
              }
              write(v) {
                const { buffer } = this;
                buffer[this.pos++] = v;
                if (this.pos === bufLength) {
                  this.out += td.decode(buffer);
                  this.pos = 0;
                }
              }
              flush() {
                const { buffer, out, pos } = this;
                return pos > 0 ? out + td.decode(buffer.subarray(0, pos)) : out;
              }
            };
            var StringReader = class {
              constructor(buffer) {
                this.pos = 0;
                this.buffer = buffer;
              }
              next() {
                return this.buffer.charCodeAt(this.pos++);
              }
              peek() {
                return this.buffer.charCodeAt(this.pos);
              }
              indexOf(char) {
                const { buffer, pos } = this;
                const idx = buffer.indexOf(char, pos);
                return idx === -1 ? buffer.length : idx;
              }
            };
            var EMPTY = [];
            function decodeOriginalScopes(input) {
              const { length } = input;
              const reader = new StringReader(input);
              const scopes = [];
              const stack = [];
              let line = 0;
              for (; reader.pos < length; reader.pos++) {
                line = decodeInteger(reader, line);
                const column = decodeInteger(reader, 0);
                if (!hasMoreVlq(reader, length)) {
                  const last = stack.pop();
                  last[2] = line;
                  last[3] = column;
                  continue;
                }
                const kind = decodeInteger(reader, 0);
                const fields = decodeInteger(reader, 0);
                const hasName = fields & 1;
                const scope = hasName ? [line, column, 0, 0, kind, decodeInteger(reader, 0)] : [line, column, 0, 0, kind];
                let vars = EMPTY;
                if (hasMoreVlq(reader, length)) {
                  vars = [];
                  do {
                    const varsIndex = decodeInteger(reader, 0);
                    vars.push(varsIndex);
                  } while (hasMoreVlq(reader, length));
                }
                scope.vars = vars;
                scopes.push(scope);
                stack.push(scope);
              }
              return scopes;
            }
            function encodeOriginalScopes(scopes) {
              const writer = new StringWriter();
              for (let i = 0; i < scopes.length; ) {
                i = _encodeOriginalScopes(scopes, i, writer, [0]);
              }
              return writer.flush();
            }
            function _encodeOriginalScopes(scopes, index, writer, state) {
              const scope = scopes[index];
              const { 0: startLine, 1: startColumn, 2: endLine, 3: endColumn, 4: kind, vars } = scope;
              if (index > 0) writer.write(comma);
              state[0] = encodeInteger(writer, startLine, state[0]);
              encodeInteger(writer, startColumn, 0);
              encodeInteger(writer, kind, 0);
              const fields = scope.length === 6 ? 1 : 0;
              encodeInteger(writer, fields, 0);
              if (scope.length === 6) encodeInteger(writer, scope[5], 0);
              for (const v of vars) {
                encodeInteger(writer, v, 0);
              }
              for (index++; index < scopes.length; ) {
                const next = scopes[index];
                const { 0: l, 1: c } = next;
                if (l > endLine || l === endLine && c >= endColumn) {
                  break;
                }
                index = _encodeOriginalScopes(scopes, index, writer, state);
              }
              writer.write(comma);
              state[0] = encodeInteger(writer, endLine, state[0]);
              encodeInteger(writer, endColumn, 0);
              return index;
            }
            function decodeGeneratedRanges(input) {
              const { length } = input;
              const reader = new StringReader(input);
              const ranges = [];
              const stack = [];
              let genLine = 0;
              let definitionSourcesIndex = 0;
              let definitionScopeIndex = 0;
              let callsiteSourcesIndex = 0;
              let callsiteLine = 0;
              let callsiteColumn = 0;
              let bindingLine = 0;
              let bindingColumn = 0;
              do {
                const semi = reader.indexOf(";");
                let genColumn = 0;
                for (; reader.pos < semi; reader.pos++) {
                  genColumn = decodeInteger(reader, genColumn);
                  if (!hasMoreVlq(reader, semi)) {
                    const last = stack.pop();
                    last[2] = genLine;
                    last[3] = genColumn;
                    continue;
                  }
                  const fields = decodeInteger(reader, 0);
                  const hasDefinition = fields & 1;
                  const hasCallsite = fields & 2;
                  const hasScope = fields & 4;
                  let callsite = null;
                  let bindings = EMPTY;
                  let range;
                  if (hasDefinition) {
                    const defSourcesIndex = decodeInteger(reader, definitionSourcesIndex);
                    definitionScopeIndex = decodeInteger(
                      reader,
                      definitionSourcesIndex === defSourcesIndex ? definitionScopeIndex : 0
                    );
                    definitionSourcesIndex = defSourcesIndex;
                    range = [genLine, genColumn, 0, 0, defSourcesIndex, definitionScopeIndex];
                  } else {
                    range = [genLine, genColumn, 0, 0];
                  }
                  range.isScope = !!hasScope;
                  if (hasCallsite) {
                    const prevCsi = callsiteSourcesIndex;
                    const prevLine = callsiteLine;
                    callsiteSourcesIndex = decodeInteger(reader, callsiteSourcesIndex);
                    const sameSource = prevCsi === callsiteSourcesIndex;
                    callsiteLine = decodeInteger(reader, sameSource ? callsiteLine : 0);
                    callsiteColumn = decodeInteger(
                      reader,
                      sameSource && prevLine === callsiteLine ? callsiteColumn : 0
                    );
                    callsite = [callsiteSourcesIndex, callsiteLine, callsiteColumn];
                  }
                  range.callsite = callsite;
                  if (hasMoreVlq(reader, semi)) {
                    bindings = [];
                    do {
                      bindingLine = genLine;
                      bindingColumn = genColumn;
                      const expressionsCount = decodeInteger(reader, 0);
                      let expressionRanges;
                      if (expressionsCount < -1) {
                        expressionRanges = [[decodeInteger(reader, 0)]];
                        for (let i = -1; i > expressionsCount; i--) {
                          const prevBl = bindingLine;
                          bindingLine = decodeInteger(reader, bindingLine);
                          bindingColumn = decodeInteger(reader, bindingLine === prevBl ? bindingColumn : 0);
                          const expression = decodeInteger(reader, 0);
                          expressionRanges.push([expression, bindingLine, bindingColumn]);
                        }
                      } else {
                        expressionRanges = [[expressionsCount]];
                      }
                      bindings.push(expressionRanges);
                    } while (hasMoreVlq(reader, semi));
                  }
                  range.bindings = bindings;
                  ranges.push(range);
                  stack.push(range);
                }
                genLine++;
                reader.pos = semi + 1;
              } while (reader.pos < length);
              return ranges;
            }
            function encodeGeneratedRanges(ranges) {
              if (ranges.length === 0) return "";
              const writer = new StringWriter();
              for (let i = 0; i < ranges.length; ) {
                i = _encodeGeneratedRanges(ranges, i, writer, [0, 0, 0, 0, 0, 0, 0]);
              }
              return writer.flush();
            }
            function _encodeGeneratedRanges(ranges, index, writer, state) {
              const range = ranges[index];
              const {
                0: startLine,
                1: startColumn,
                2: endLine,
                3: endColumn,
                isScope,
                callsite,
                bindings
              } = range;
              if (state[0] < startLine) {
                catchupLine(writer, state[0], startLine);
                state[0] = startLine;
                state[1] = 0;
              } else if (index > 0) {
                writer.write(comma);
              }
              state[1] = encodeInteger(writer, range[1], state[1]);
              const fields = (range.length === 6 ? 1 : 0) | (callsite ? 2 : 0) | (isScope ? 4 : 0);
              encodeInteger(writer, fields, 0);
              if (range.length === 6) {
                const { 4: sourcesIndex, 5: scopesIndex } = range;
                if (sourcesIndex !== state[2]) {
                  state[3] = 0;
                }
                state[2] = encodeInteger(writer, sourcesIndex, state[2]);
                state[3] = encodeInteger(writer, scopesIndex, state[3]);
              }
              if (callsite) {
                const { 0: sourcesIndex, 1: callLine, 2: callColumn } = range.callsite;
                if (sourcesIndex !== state[4]) {
                  state[5] = 0;
                  state[6] = 0;
                } else if (callLine !== state[5]) {
                  state[6] = 0;
                }
                state[4] = encodeInteger(writer, sourcesIndex, state[4]);
                state[5] = encodeInteger(writer, callLine, state[5]);
                state[6] = encodeInteger(writer, callColumn, state[6]);
              }
              if (bindings) {
                for (const binding of bindings) {
                  if (binding.length > 1) encodeInteger(writer, -binding.length, 0);
                  const expression = binding[0][0];
                  encodeInteger(writer, expression, 0);
                  let bindingStartLine = startLine;
                  let bindingStartColumn = startColumn;
                  for (let i = 1; i < binding.length; i++) {
                    const expRange = binding[i];
                    bindingStartLine = encodeInteger(writer, expRange[1], bindingStartLine);
                    bindingStartColumn = encodeInteger(writer, expRange[2], bindingStartColumn);
                    encodeInteger(writer, expRange[0], 0);
                  }
                }
              }
              for (index++; index < ranges.length; ) {
                const next = ranges[index];
                const { 0: l, 1: c } = next;
                if (l > endLine || l === endLine && c >= endColumn) {
                  break;
                }
                index = _encodeGeneratedRanges(ranges, index, writer, state);
              }
              if (state[0] < endLine) {
                catchupLine(writer, state[0], endLine);
                state[0] = endLine;
                state[1] = 0;
              } else {
                writer.write(comma);
              }
              state[1] = encodeInteger(writer, endColumn, state[1]);
              return index;
            }
            function catchupLine(writer, lastLine, line) {
              do {
                writer.write(semicolon);
              } while (++lastLine < line);
            }
            function decode2(mappings) {
              const { length } = mappings;
              const reader = new StringReader(mappings);
              const decoded = [];
              let genColumn = 0;
              let sourcesIndex = 0;
              let sourceLine = 0;
              let sourceColumn = 0;
              let namesIndex = 0;
              do {
                const semi = reader.indexOf(";");
                const line = [];
                let sorted = true;
                let lastCol = 0;
                genColumn = 0;
                while (reader.pos < semi) {
                  let seg;
                  genColumn = decodeInteger(reader, genColumn);
                  if (genColumn < lastCol) sorted = false;
                  lastCol = genColumn;
                  if (hasMoreVlq(reader, semi)) {
                    sourcesIndex = decodeInteger(reader, sourcesIndex);
                    sourceLine = decodeInteger(reader, sourceLine);
                    sourceColumn = decodeInteger(reader, sourceColumn);
                    if (hasMoreVlq(reader, semi)) {
                      namesIndex = decodeInteger(reader, namesIndex);
                      seg = [genColumn, sourcesIndex, sourceLine, sourceColumn, namesIndex];
                    } else {
                      seg = [genColumn, sourcesIndex, sourceLine, sourceColumn];
                    }
                  } else {
                    seg = [genColumn];
                  }
                  line.push(seg);
                  reader.pos++;
                }
                if (!sorted) sort(line);
                decoded.push(line);
                reader.pos = semi + 1;
              } while (reader.pos <= length);
              return decoded;
            }
            function sort(line) {
              line.sort(sortComparator2);
            }
            function sortComparator2(a, b) {
              return a[0] - b[0];
            }
            function encode2(decoded) {
              const writer = new StringWriter();
              let sourcesIndex = 0;
              let sourceLine = 0;
              let sourceColumn = 0;
              let namesIndex = 0;
              for (let i = 0; i < decoded.length; i++) {
                const line = decoded[i];
                if (i > 0) writer.write(semicolon);
                if (line.length === 0) continue;
                let genColumn = 0;
                for (let j = 0; j < line.length; j++) {
                  const segment = line[j];
                  if (j > 0) writer.write(comma);
                  genColumn = encodeInteger(writer, segment[0], genColumn);
                  if (segment.length === 1) continue;
                  sourcesIndex = encodeInteger(writer, segment[1], sourcesIndex);
                  sourceLine = encodeInteger(writer, segment[2], sourceLine);
                  sourceColumn = encodeInteger(writer, segment[3], sourceColumn);
                  if (segment.length === 4) continue;
                  namesIndex = encodeInteger(writer, segment[4], namesIndex);
                }
              }
              return writer.flush();
            }
            if (__exports2 != exports22) module3.exports = exports22;
            return module3.exports;
          });
        }
      });
      var require_resolve_uri_umd = __commonJS2({
        "../../node_modules/@jridgewell/resolve-uri/dist/resolve-uri.umd.js"(exports3, module22) {
          (function(global, factory) {
            typeof exports3 === "object" && typeof module22 !== "undefined" ? module22.exports = factory() : typeof define === "function" && define.amd ? define(factory) : (global = typeof globalThis !== "undefined" ? globalThis : global || self, global.resolveURI = factory());
          })(exports3, function() {
            "use strict";
            const schemeRegex = /^[\w+.-]+:\/\//;
            const urlRegex = /^([\w+.-]+:)\/\/([^@/#?]*@)?([^:/#?]*)(:\d+)?(\/[^#?]*)?(\?[^#]*)?(#.*)?/;
            const fileRegex = /^file:(?:\/\/((?![a-z]:)[^/#?]*)?)?(\/?[^#?]*)(\?[^#]*)?(#.*)?/i;
            function isAbsoluteUrl(input) {
              return schemeRegex.test(input);
            }
            function isSchemeRelativeUrl(input) {
              return input.startsWith("//");
            }
            function isAbsolutePath(input) {
              return input.startsWith("/");
            }
            function isFileUrl(input) {
              return input.startsWith("file:");
            }
            function isRelative(input) {
              return /^[.?#]/.test(input);
            }
            function parseAbsoluteUrl(input) {
              const match = urlRegex.exec(input);
              return makeUrl(match[1], match[2] || "", match[3], match[4] || "", match[5] || "/", match[6] || "", match[7] || "");
            }
            function parseFileUrl(input) {
              const match = fileRegex.exec(input);
              const path = match[2];
              return makeUrl("file:", "", match[1] || "", "", isAbsolutePath(path) ? path : "/" + path, match[3] || "", match[4] || "");
            }
            function makeUrl(scheme, user, host, port, path, query, hash) {
              return {
                scheme,
                user,
                host,
                port,
                path,
                query,
                hash,
                type: 7
              };
            }
            function parseUrl(input) {
              if (isSchemeRelativeUrl(input)) {
                const url2 = parseAbsoluteUrl("http:" + input);
                url2.scheme = "";
                url2.type = 6;
                return url2;
              }
              if (isAbsolutePath(input)) {
                const url2 = parseAbsoluteUrl("http://foo.com" + input);
                url2.scheme = "";
                url2.host = "";
                url2.type = 5;
                return url2;
              }
              if (isFileUrl(input))
                return parseFileUrl(input);
              if (isAbsoluteUrl(input))
                return parseAbsoluteUrl(input);
              const url = parseAbsoluteUrl("http://foo.com/" + input);
              url.scheme = "";
              url.host = "";
              url.type = input ? input.startsWith("?") ? 3 : input.startsWith("#") ? 2 : 4 : 1;
              return url;
            }
            function stripPathFilename(path) {
              if (path.endsWith("/.."))
                return path;
              const index = path.lastIndexOf("/");
              return path.slice(0, index + 1);
            }
            function mergePaths(url, base) {
              normalizePath(base, base.type);
              if (url.path === "/") {
                url.path = base.path;
              } else {
                url.path = stripPathFilename(base.path) + url.path;
              }
            }
            function normalizePath(url, type) {
              const rel = type <= 4;
              const pieces = url.path.split("/");
              let pointer = 1;
              let positive = 0;
              let addTrailingSlash = false;
              for (let i = 1; i < pieces.length; i++) {
                const piece = pieces[i];
                if (!piece) {
                  addTrailingSlash = true;
                  continue;
                }
                addTrailingSlash = false;
                if (piece === ".")
                  continue;
                if (piece === "..") {
                  if (positive) {
                    addTrailingSlash = true;
                    positive--;
                    pointer--;
                  } else if (rel) {
                    pieces[pointer++] = piece;
                  }
                  continue;
                }
                pieces[pointer++] = piece;
                positive++;
              }
              let path = "";
              for (let i = 1; i < pointer; i++) {
                path += "/" + pieces[i];
              }
              if (!path || addTrailingSlash && !path.endsWith("/..")) {
                path += "/";
              }
              url.path = path;
            }
            function resolve(input, base) {
              if (!input && !base)
                return "";
              const url = parseUrl(input);
              let inputType = url.type;
              if (base && inputType !== 7) {
                const baseUrl = parseUrl(base);
                const baseType = baseUrl.type;
                switch (inputType) {
                  case 1:
                    url.hash = baseUrl.hash;
                  // fall through
                  case 2:
                    url.query = baseUrl.query;
                  // fall through
                  case 3:
                  case 4:
                    mergePaths(url, baseUrl);
                  // fall through
                  case 5:
                    url.user = baseUrl.user;
                    url.host = baseUrl.host;
                    url.port = baseUrl.port;
                  // fall through
                  case 6:
                    url.scheme = baseUrl.scheme;
                }
                if (baseType > inputType)
                  inputType = baseType;
              }
              normalizePath(url, inputType);
              const queryHash = url.query + url.hash;
              switch (inputType) {
                // This is impossible, because of the empty checks at the start of the function.
                // case UrlType.Empty:
                case 2:
                case 3:
                  return queryHash;
                case 4: {
                  const path = url.path.slice(1);
                  if (!path)
                    return queryHash || ".";
                  if (isRelative(base || input) && !isRelative(path)) {
                    return "./" + path + queryHash;
                  }
                  return path + queryHash;
                }
                case 5:
                  return url.path + queryHash;
                default:
                  return url.scheme + "//" + url.user + url.host + url.port + url.path + queryHash;
              }
            }
            return resolve;
          });
        }
      });
      var trace_mapping_exports = {};
      __export(trace_mapping_exports, {
        AnyMap: () => FlattenMap,
        FlattenMap: () => FlattenMap,
        GREATEST_LOWER_BOUND: () => GREATEST_LOWER_BOUND,
        LEAST_UPPER_BOUND: () => LEAST_UPPER_BOUND,
        TraceMap: () => TraceMap2,
        allGeneratedPositionsFor: () => allGeneratedPositionsFor,
        decodedMap: () => decodedMap,
        decodedMappings: () => decodedMappings2,
        eachMapping: () => eachMapping,
        encodedMap: () => encodedMap,
        encodedMappings: () => encodedMappings,
        generatedPositionFor: () => generatedPositionFor,
        isIgnored: () => isIgnored,
        originalPositionFor: () => originalPositionFor,
        presortedDecodedMap: () => presortedDecodedMap,
        sourceContentFor: () => sourceContentFor,
        traceSegment: () => traceSegment
      });
      module2.exports = __toCommonJS(trace_mapping_exports);
      var import_sourcemap_codec2 = __toESM2(require_sourcemap_codec_umd2());
      var import_resolve_uri = __toESM2(require_resolve_uri_umd());
      function stripFilename(path) {
        if (!path) return "";
        const index = path.lastIndexOf("/");
        return path.slice(0, index + 1);
      }
      function resolver(mapUrl, sourceRoot) {
        const from = stripFilename(mapUrl);
        const prefix = sourceRoot ? sourceRoot + "/" : "";
        return (source) => (0, import_resolve_uri.default)(prefix + (source || ""), from);
      }
      var COLUMN2 = 0;
      var SOURCES_INDEX2 = 1;
      var SOURCE_LINE2 = 2;
      var SOURCE_COLUMN2 = 3;
      var NAMES_INDEX2 = 4;
      var REV_GENERATED_LINE = 1;
      var REV_GENERATED_COLUMN = 2;
      function maybeSort(mappings, owned) {
        const unsortedIndex = nextUnsortedSegmentLine(mappings, 0);
        if (unsortedIndex === mappings.length) return mappings;
        if (!owned) mappings = mappings.slice();
        for (let i = unsortedIndex; i < mappings.length; i = nextUnsortedSegmentLine(mappings, i + 1)) {
          mappings[i] = sortSegments(mappings[i], owned);
        }
        return mappings;
      }
      function nextUnsortedSegmentLine(mappings, start) {
        for (let i = start; i < mappings.length; i++) {
          if (!isSorted(mappings[i])) return i;
        }
        return mappings.length;
      }
      function isSorted(line) {
        for (let j = 1; j < line.length; j++) {
          if (line[j][COLUMN2] < line[j - 1][COLUMN2]) {
            return false;
          }
        }
        return true;
      }
      function sortSegments(line, owned) {
        if (!owned) line = line.slice();
        return line.sort(sortComparator);
      }
      function sortComparator(a, b) {
        return a[COLUMN2] - b[COLUMN2];
      }
      var found = false;
      function binarySearch(haystack, needle, low, high) {
        while (low <= high) {
          const mid = low + (high - low >> 1);
          const cmp = haystack[mid][COLUMN2] - needle;
          if (cmp === 0) {
            found = true;
            return mid;
          }
          if (cmp < 0) {
            low = mid + 1;
          } else {
            high = mid - 1;
          }
        }
        found = false;
        return low - 1;
      }
      function upperBound(haystack, needle, index) {
        for (let i = index + 1; i < haystack.length; index = i++) {
          if (haystack[i][COLUMN2] !== needle) break;
        }
        return index;
      }
      function lowerBound(haystack, needle, index) {
        for (let i = index - 1; i >= 0; index = i--) {
          if (haystack[i][COLUMN2] !== needle) break;
        }
        return index;
      }
      function memoizedState() {
        return {
          lastKey: -1,
          lastNeedle: -1,
          lastIndex: -1
        };
      }
      function memoizedBinarySearch(haystack, needle, state, key) {
        const { lastKey, lastNeedle, lastIndex } = state;
        let low = 0;
        let high = haystack.length - 1;
        if (key === lastKey) {
          if (needle === lastNeedle) {
            found = lastIndex !== -1 && haystack[lastIndex][COLUMN2] === needle;
            return lastIndex;
          }
          if (needle >= lastNeedle) {
            low = lastIndex === -1 ? 0 : lastIndex;
          } else {
            high = lastIndex;
          }
        }
        state.lastKey = key;
        state.lastNeedle = needle;
        return state.lastIndex = binarySearch(haystack, needle, low, high);
      }
      function buildBySources(decoded, memos) {
        const sources = memos.map(buildNullArray);
        for (let i = 0; i < decoded.length; i++) {
          const line = decoded[i];
          for (let j = 0; j < line.length; j++) {
            const seg = line[j];
            if (seg.length === 1) continue;
            const sourceIndex2 = seg[SOURCES_INDEX2];
            const sourceLine = seg[SOURCE_LINE2];
            const sourceColumn = seg[SOURCE_COLUMN2];
            const originalSource = sources[sourceIndex2];
            const originalLine = originalSource[sourceLine] ||= [];
            const memo = memos[sourceIndex2];
            let index = upperBound(
              originalLine,
              sourceColumn,
              memoizedBinarySearch(originalLine, sourceColumn, memo, sourceLine)
            );
            memo.lastIndex = ++index;
            insert2(originalLine, index, [sourceColumn, i, seg[COLUMN2]]);
          }
        }
        return sources;
      }
      function insert2(array, index, value) {
        for (let i = array.length; i > index; i--) {
          array[i] = array[i - 1];
        }
        array[index] = value;
      }
      function buildNullArray() {
        return { __proto__: null };
      }
      function parse(map) {
        return typeof map === "string" ? JSON.parse(map) : map;
      }
      var FlattenMap = function(map, mapUrl) {
        const parsed = parse(map);
        if (!("sections" in parsed)) {
          return new TraceMap2(parsed, mapUrl);
        }
        const mappings = [];
        const sources = [];
        const sourcesContent = [];
        const names = [];
        const ignoreList = [];
        recurse(
          parsed,
          mapUrl,
          mappings,
          sources,
          sourcesContent,
          names,
          ignoreList,
          0,
          0,
          Infinity,
          Infinity
        );
        const joined = {
          version: 3,
          file: parsed.file,
          names,
          sources,
          sourcesContent,
          mappings,
          ignoreList
        };
        return presortedDecodedMap(joined);
      };
      function recurse(input, mapUrl, mappings, sources, sourcesContent, names, ignoreList, lineOffset, columnOffset, stopLine, stopColumn) {
        const { sections } = input;
        for (let i = 0; i < sections.length; i++) {
          const { map, offset } = sections[i];
          let sl = stopLine;
          let sc = stopColumn;
          if (i + 1 < sections.length) {
            const nextOffset = sections[i + 1].offset;
            sl = Math.min(stopLine, lineOffset + nextOffset.line);
            if (sl === stopLine) {
              sc = Math.min(stopColumn, columnOffset + nextOffset.column);
            } else if (sl < stopLine) {
              sc = columnOffset + nextOffset.column;
            }
          }
          addSection(
            map,
            mapUrl,
            mappings,
            sources,
            sourcesContent,
            names,
            ignoreList,
            lineOffset + offset.line,
            columnOffset + offset.column,
            sl,
            sc
          );
        }
      }
      function addSection(input, mapUrl, mappings, sources, sourcesContent, names, ignoreList, lineOffset, columnOffset, stopLine, stopColumn) {
        const parsed = parse(input);
        if ("sections" in parsed) return recurse(...arguments);
        const map = new TraceMap2(parsed, mapUrl);
        const sourcesOffset = sources.length;
        const namesOffset = names.length;
        const decoded = decodedMappings2(map);
        const { resolvedSources, sourcesContent: contents, ignoreList: ignores } = map;
        append(sources, resolvedSources);
        append(names, map.names);
        if (contents) append(sourcesContent, contents);
        else for (let i = 0; i < resolvedSources.length; i++) sourcesContent.push(null);
        if (ignores) for (let i = 0; i < ignores.length; i++) ignoreList.push(ignores[i] + sourcesOffset);
        for (let i = 0; i < decoded.length; i++) {
          const lineI = lineOffset + i;
          if (lineI > stopLine) return;
          const out = getLine(mappings, lineI);
          const cOffset = i === 0 ? columnOffset : 0;
          const line = decoded[i];
          for (let j = 0; j < line.length; j++) {
            const seg = line[j];
            const column = cOffset + seg[COLUMN2];
            if (lineI === stopLine && column >= stopColumn) return;
            if (seg.length === 1) {
              out.push([column]);
              continue;
            }
            const sourcesIndex = sourcesOffset + seg[SOURCES_INDEX2];
            const sourceLine = seg[SOURCE_LINE2];
            const sourceColumn = seg[SOURCE_COLUMN2];
            out.push(
              seg.length === 4 ? [column, sourcesIndex, sourceLine, sourceColumn] : [column, sourcesIndex, sourceLine, sourceColumn, namesOffset + seg[NAMES_INDEX2]]
            );
          }
        }
      }
      function append(arr, other) {
        for (let i = 0; i < other.length; i++) arr.push(other[i]);
      }
      function getLine(arr, index) {
        for (let i = arr.length; i <= index; i++) arr[i] = [];
        return arr[index];
      }
      var LINE_GTR_ZERO = "`line` must be greater than 0 (lines start at line 1)";
      var COL_GTR_EQ_ZERO = "`column` must be greater than or equal to 0 (columns start at column 0)";
      var LEAST_UPPER_BOUND = -1;
      var GREATEST_LOWER_BOUND = 1;
      var TraceMap2 = class {
        constructor(map, mapUrl) {
          const isString = typeof map === "string";
          if (!isString && map._decodedMemo) return map;
          const parsed = parse(map);
          const { version, file, names, sourceRoot, sources, sourcesContent } = parsed;
          this.version = version;
          this.file = file;
          this.names = names || [];
          this.sourceRoot = sourceRoot;
          this.sources = sources;
          this.sourcesContent = sourcesContent;
          this.ignoreList = parsed.ignoreList || parsed.x_google_ignoreList || void 0;
          const resolve = resolver(mapUrl, sourceRoot);
          this.resolvedSources = sources.map(resolve);
          const { mappings } = parsed;
          if (typeof mappings === "string") {
            this._encoded = mappings;
            this._decoded = void 0;
          } else if (Array.isArray(mappings)) {
            this._encoded = void 0;
            this._decoded = maybeSort(mappings, isString);
          } else if (parsed.sections) {
            throw new Error(`TraceMap passed sectioned source map, please use AnyMap export instead`);
          } else {
            throw new Error(`invalid source map: ${JSON.stringify(parsed)}`);
          }
          this._decodedMemo = memoizedState();
          this._bySources = void 0;
          this._bySourceMemos = void 0;
        }
      };
      function cast3(map) {
        return map;
      }
      function encodedMappings(map) {
        return cast3(map)._encoded ??= (0, import_sourcemap_codec2.encode)(cast3(map)._decoded);
      }
      function decodedMappings2(map) {
        return cast3(map)._decoded ||= (0, import_sourcemap_codec2.decode)(cast3(map)._encoded);
      }
      function traceSegment(map, line, column) {
        const decoded = decodedMappings2(map);
        if (line >= decoded.length) return null;
        const segments = decoded[line];
        const index = traceSegmentInternal(
          segments,
          cast3(map)._decodedMemo,
          line,
          column,
          GREATEST_LOWER_BOUND
        );
        return index === -1 ? null : segments[index];
      }
      function originalPositionFor(map, needle) {
        let { line, column, bias } = needle;
        line--;
        if (line < 0) throw new Error(LINE_GTR_ZERO);
        if (column < 0) throw new Error(COL_GTR_EQ_ZERO);
        const decoded = decodedMappings2(map);
        if (line >= decoded.length) return OMapping(null, null, null, null);
        const segments = decoded[line];
        const index = traceSegmentInternal(
          segments,
          cast3(map)._decodedMemo,
          line,
          column,
          bias || GREATEST_LOWER_BOUND
        );
        if (index === -1) return OMapping(null, null, null, null);
        const segment = segments[index];
        if (segment.length === 1) return OMapping(null, null, null, null);
        const { names, resolvedSources } = map;
        return OMapping(
          resolvedSources[segment[SOURCES_INDEX2]],
          segment[SOURCE_LINE2] + 1,
          segment[SOURCE_COLUMN2],
          segment.length === 5 ? names[segment[NAMES_INDEX2]] : null
        );
      }
      function generatedPositionFor(map, needle) {
        const { source, line, column, bias } = needle;
        return generatedPosition(map, source, line, column, bias || GREATEST_LOWER_BOUND, false);
      }
      function allGeneratedPositionsFor(map, needle) {
        const { source, line, column, bias } = needle;
        return generatedPosition(map, source, line, column, bias || LEAST_UPPER_BOUND, true);
      }
      function eachMapping(map, cb) {
        const decoded = decodedMappings2(map);
        const { names, resolvedSources } = map;
        for (let i = 0; i < decoded.length; i++) {
          const line = decoded[i];
          for (let j = 0; j < line.length; j++) {
            const seg = line[j];
            const generatedLine = i + 1;
            const generatedColumn = seg[0];
            let source = null;
            let originalLine = null;
            let originalColumn = null;
            let name = null;
            if (seg.length !== 1) {
              source = resolvedSources[seg[1]];
              originalLine = seg[2] + 1;
              originalColumn = seg[3];
            }
            if (seg.length === 5) name = names[seg[4]];
            cb({
              generatedLine,
              generatedColumn,
              source,
              originalLine,
              originalColumn,
              name
            });
          }
        }
      }
      function sourceIndex(map, source) {
        const { sources, resolvedSources } = map;
        let index = sources.indexOf(source);
        if (index === -1) index = resolvedSources.indexOf(source);
        return index;
      }
      function sourceContentFor(map, source) {
        const { sourcesContent } = map;
        if (sourcesContent == null) return null;
        const index = sourceIndex(map, source);
        return index === -1 ? null : sourcesContent[index];
      }
      function isIgnored(map, source) {
        const { ignoreList } = map;
        if (ignoreList == null) return false;
        const index = sourceIndex(map, source);
        return index === -1 ? false : ignoreList.includes(index);
      }
      function presortedDecodedMap(map, mapUrl) {
        const tracer = new TraceMap2(clone(map, []), mapUrl);
        cast3(tracer)._decoded = map.mappings;
        return tracer;
      }
      function decodedMap(map) {
        return clone(map, decodedMappings2(map));
      }
      function encodedMap(map) {
        return clone(map, encodedMappings(map));
      }
      function clone(map, mappings) {
        return {
          version: map.version,
          file: map.file,
          names: map.names,
          sourceRoot: map.sourceRoot,
          sources: map.sources,
          sourcesContent: map.sourcesContent,
          mappings,
          ignoreList: map.ignoreList || map.x_google_ignoreList
        };
      }
      function OMapping(source, line, column, name) {
        return { source, line, column, name };
      }
      function GMapping(line, column) {
        return { line, column };
      }
      function traceSegmentInternal(segments, memo, line, column, bias) {
        let index = memoizedBinarySearch(segments, column, memo, line);
        if (found) {
          index = (bias === LEAST_UPPER_BOUND ? upperBound : lowerBound)(segments, column, index);
        } else if (bias === LEAST_UPPER_BOUND) index++;
        if (index === -1 || index === segments.length) return -1;
        return index;
      }
      function sliceGeneratedPositions(segments, memo, line, column, bias) {
        let min = traceSegmentInternal(segments, memo, line, column, GREATEST_LOWER_BOUND);
        if (!found && bias === LEAST_UPPER_BOUND) min++;
        if (min === -1 || min === segments.length) return [];
        const matchedColumn = found ? column : segments[min][COLUMN2];
        if (!found) min = lowerBound(segments, matchedColumn, min);
        const max = upperBound(segments, matchedColumn, min);
        const result = [];
        for (; min <= max; min++) {
          const segment = segments[min];
          result.push(GMapping(segment[REV_GENERATED_LINE] + 1, segment[REV_GENERATED_COLUMN]));
        }
        return result;
      }
      function generatedPosition(map, source, line, column, bias, all) {
        line--;
        if (line < 0) throw new Error(LINE_GTR_ZERO);
        if (column < 0) throw new Error(COL_GTR_EQ_ZERO);
        const { sources, resolvedSources } = map;
        let sourceIndex2 = sources.indexOf(source);
        if (sourceIndex2 === -1) sourceIndex2 = resolvedSources.indexOf(source);
        if (sourceIndex2 === -1) return all ? [] : GMapping(null, null);
        const generated = cast3(map)._bySources ||= buildBySources(
          decodedMappings2(map),
          cast3(map)._bySourceMemos = sources.map(memoizedState)
        );
        const segments = generated[sourceIndex2][line];
        if (segments == null) return all ? [] : GMapping(null, null);
        const memo = cast3(map)._bySourceMemos[sourceIndex2];
        if (all) return sliceGeneratedPositions(segments, memo, line, column, bias);
        const index = traceSegmentInternal(segments, memo, line, column, bias);
        if (index === -1) return GMapping(null, null);
        const segment = segments[index];
        return GMapping(segment[REV_GENERATED_LINE] + 1, segment[REV_GENERATED_COLUMN]);
      }
      if (__exports != exports2) module2.exports = exports2;
      return module2.exports;
    });
  }
});

// src/set-array.ts
var SetArray = class {
  constructor() {
    this._indexes = { __proto__: null };
    this.array = [];
  }
};
function cast(set) {
  return set;
}
function get(setarr, key) {
  return cast(setarr)._indexes[key];
}
function put(setarr, key) {
  const index = get(setarr, key);
  if (index !== void 0) return index;
  const { array, _indexes: indexes } = cast(setarr);
  const length = array.push(key);
  return indexes[key] = length - 1;
}
function remove(setarr, key) {
  const index = get(setarr, key);
  if (index === void 0) return;
  const { array, _indexes: indexes } = cast(setarr);
  for (let i = index + 1; i < array.length; i++) {
    const k = array[i];
    array[i - 1] = k;
    indexes[k]--;
  }
  indexes[key] = void 0;
  array.pop();
}

// src/gen-mapping.ts
var import_sourcemap_codec = __toESM(require_sourcemap_codec_umd());
var import_trace_mapping = __toESM(require_trace_mapping_umd());

// src/sourcemap-segment.ts
var COLUMN = 0;
var SOURCES_INDEX = 1;
var SOURCE_LINE = 2;
var SOURCE_COLUMN = 3;
var NAMES_INDEX = 4;

// src/gen-mapping.ts
var NO_NAME = -1;
var GenMapping = class {
  constructor({ file, sourceRoot } = {}) {
    this._names = new SetArray();
    this._sources = new SetArray();
    this._sourcesContent = [];
    this._mappings = [];
    this.file = file;
    this.sourceRoot = sourceRoot;
    this._ignoreList = new SetArray();
  }
};
function cast2(map) {
  return map;
}
function addSegment(map, genLine, genColumn, source, sourceLine, sourceColumn, name, content) {
  return addSegmentInternal(
    false,
    map,
    genLine,
    genColumn,
    source,
    sourceLine,
    sourceColumn,
    name,
    content
  );
}
function addMapping(map, mapping) {
  return addMappingInternal(false, map, mapping);
}
var maybeAddSegment = (map, genLine, genColumn, source, sourceLine, sourceColumn, name, content) => {
  return addSegmentInternal(
    true,
    map,
    genLine,
    genColumn,
    source,
    sourceLine,
    sourceColumn,
    name,
    content
  );
};
var maybeAddMapping = (map, mapping) => {
  return addMappingInternal(true, map, mapping);
};
function setSourceContent(map, source, content) {
  const {
    _sources: sources,
    _sourcesContent: sourcesContent
    // _originalScopes: originalScopes,
  } = cast2(map);
  const index = put(sources, source);
  sourcesContent[index] = content;
}
function setIgnore(map, source, ignore = true) {
  const {
    _sources: sources,
    _sourcesContent: sourcesContent,
    _ignoreList: ignoreList
    // _originalScopes: originalScopes,
  } = cast2(map);
  const index = put(sources, source);
  if (index === sourcesContent.length) sourcesContent[index] = null;
  if (ignore) put(ignoreList, index);
  else remove(ignoreList, index);
}
function toDecodedMap(map) {
  const {
    _mappings: mappings,
    _sources: sources,
    _sourcesContent: sourcesContent,
    _names: names,
    _ignoreList: ignoreList
    // _originalScopes: originalScopes,
    // _generatedRanges: generatedRanges,
  } = cast2(map);
  removeEmptyFinalLines(mappings);
  return {
    version: 3,
    file: map.file || void 0,
    names: names.array,
    sourceRoot: map.sourceRoot || void 0,
    sources: sources.array,
    sourcesContent,
    mappings,
    // originalScopes,
    // generatedRanges,
    ignoreList: ignoreList.array
  };
}
function toEncodedMap(map) {
  const decoded = toDecodedMap(map);
  return {
    ...decoded,
    // originalScopes: decoded.originalScopes.map((os) => encodeOriginalScopes(os)),
    // generatedRanges: encodeGeneratedRanges(decoded.generatedRanges as GeneratedRange[]),
    mappings: (0, import_sourcemap_codec.encode)(decoded.mappings)
  };
}
function fromMap(input) {
  const map = new import_trace_mapping.TraceMap(input);
  const gen = new GenMapping({ file: map.file, sourceRoot: map.sourceRoot });
  putAll(cast2(gen)._names, map.names);
  putAll(cast2(gen)._sources, map.sources);
  cast2(gen)._sourcesContent = map.sourcesContent || map.sources.map(() => null);
  cast2(gen)._mappings = (0, import_trace_mapping.decodedMappings)(map);
  if (map.ignoreList) putAll(cast2(gen)._ignoreList, map.ignoreList);
  return gen;
}
function allMappings(map) {
  const out = [];
  const { _mappings: mappings, _sources: sources, _names: names } = cast2(map);
  for (let i = 0; i < mappings.length; i++) {
    const line = mappings[i];
    for (let j = 0; j < line.length; j++) {
      const seg = line[j];
      const generated = { line: i + 1, column: seg[COLUMN] };
      let source = void 0;
      let original = void 0;
      let name = void 0;
      if (seg.length !== 1) {
        source = sources.array[seg[SOURCES_INDEX]];
        original = { line: seg[SOURCE_LINE] + 1, column: seg[SOURCE_COLUMN] };
        if (seg.length === 5) name = names.array[seg[NAMES_INDEX]];
      }
      out.push({ generated, source, original, name });
    }
  }
  return out;
}
function addSegmentInternal(skipable, map, genLine, genColumn, source, sourceLine, sourceColumn, name, content) {
  const {
    _mappings: mappings,
    _sources: sources,
    _sourcesContent: sourcesContent,
    _names: names
    // _originalScopes: originalScopes,
  } = cast2(map);
  const line = getIndex(mappings, genLine);
  const index = getColumnIndex(line, genColumn);
  if (!source) {
    if (skipable && skipSourceless(line, index)) return;
    return insert(line, index, [genColumn]);
  }
  assert(sourceLine);
  assert(sourceColumn);
  const sourcesIndex = put(sources, source);
  const namesIndex = name ? put(names, name) : NO_NAME;
  if (sourcesIndex === sourcesContent.length) sourcesContent[sourcesIndex] = content ?? null;
  if (skipable && skipSource(line, index, sourcesIndex, sourceLine, sourceColumn, namesIndex)) {
    return;
  }
  return insert(
    line,
    index,
    name ? [genColumn, sourcesIndex, sourceLine, sourceColumn, namesIndex] : [genColumn, sourcesIndex, sourceLine, sourceColumn]
  );
}
function assert(_val) {
}
function getIndex(arr, index) {
  for (let i = arr.length; i <= index; i++) {
    arr[i] = [];
  }
  return arr[index];
}
function getColumnIndex(line, genColumn) {
  let index = line.length;
  for (let i = index - 1; i >= 0; index = i--) {
    const current = line[i];
    if (genColumn >= current[COLUMN]) break;
  }
  return index;
}
function insert(array, index, value) {
  for (let i = array.length; i > index; i--) {
    array[i] = array[i - 1];
  }
  array[index] = value;
}
function removeEmptyFinalLines(mappings) {
  const { length } = mappings;
  let len = length;
  for (let i = len - 1; i >= 0; len = i, i--) {
    if (mappings[i].length > 0) break;
  }
  if (len < length) mappings.length = len;
}
function putAll(setarr, array) {
  for (let i = 0; i < array.length; i++) put(setarr, array[i]);
}
function skipSourceless(line, index) {
  if (index === 0) return true;
  const prev = line[index - 1];
  return prev.length === 1;
}
function skipSource(line, index, sourcesIndex, sourceLine, sourceColumn, namesIndex) {
  if (index === 0) return false;
  const prev = line[index - 1];
  if (prev.length === 1) return false;
  return sourcesIndex === prev[SOURCES_INDEX] && sourceLine === prev[SOURCE_LINE] && sourceColumn === prev[SOURCE_COLUMN] && namesIndex === (prev.length === 5 ? prev[NAMES_INDEX] : NO_NAME);
}
function addMappingInternal(skipable, map, mapping) {
  const { generated, source, original, name, content } = mapping;
  if (!source) {
    return addSegmentInternal(
      skipable,
      map,
      generated.line - 1,
      generated.column,
      null,
      null,
      null,
      null,
      null
    );
  }
  assert(original);
  return addSegmentInternal(
    skipable,
    map,
    generated.line - 1,
    generated.column,
    source,
    original.line - 1,
    original.column,
    name,
    content
  );
}
export {
  GenMapping,
  addMapping,
  addSegment,
  allMappings,
  fromMap,
  maybeAddMapping,
  maybeAddSegment,
  setIgnore,
  setSourceContent,
  toDecodedMap,
  toEncodedMap
};
//# sourceMappingURL=gen-mapping.mjs.map
