const TILDE_RE = /~/g;
const SLASH_RE = /\//g;
const TILDE_0_RE = /~0/g;
const TILDE_1_RE = /~1/g;
export function escape(frag) {
    return frag.replace(TILDE_RE, '~0').replace(SLASH_RE, '~1');
}
export function unescape(frag) {
    return frag.replace(TILDE_1_RE, '/').replace(TILDE_0_RE, '~');
}
//# sourceMappingURL=utils.js.map