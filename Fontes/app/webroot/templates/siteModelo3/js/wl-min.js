var WLHost = "http://arquivos.weblibras.com.br/auto";
var WLHttpsHost = "https://weblibras.blob.core.windows.net/auto";
var WLPlayerVersion = "1.9.3";
var WLMaxTranslationSize = 1500;
(function(e, t) {
    function _(e) {
        var t = M[e] = {};
        return v.each(e.split(y), function(e, n) {
            t[n] = !0
        }), t
    }

    function H(e, n, r) {
        if (r === t && e.nodeType === 1) {
            var i = "data-" + n.replace(P, "-$1").toLowerCase();
            r = e.getAttribute(i);
            if (typeof r == "string") {
                try {
                    r = r === "true" ? !0 : r === "false" ? !1 : r === "null" ? null : +r + "" === r ? +r : D.test(r) ? v.parseJSON(r) : r
                } catch (s) {}
                v.data(e, n, r)
            } else {
                r = t
            }
        }
        return r
    }

    function B(e) {
        var t;
        for (t in e) {
            if (t === "data" && v.isEmptyObject(e[t])) {
                continue
            }
            if (t !== "toJSON") {
                return !1
            }
        }
        return !0
    }

    function et() {
        return !1
    }

    function tt() {
        return !0
    }

    function ut(e) {
        return !e || !e.parentNode || e.parentNode.nodeType === 11
    }

    function at(e, t) {
        do {
            e = e[t]
        } while (e && e.nodeType !== 1);
        return e
    }

    function ft(e, t, n) {
        t = t || 0;
        if (v.isFunction(t)) {
            return v.grep(e, function(e, r) {
                var i = !!t.call(e, r, e);
                return i === n
            })
        }
        if (t.nodeType) {
            return v.grep(e, function(e, r) {
                return e === t === n
            })
        }
        if (typeof t == "string") {
            var r = v.grep(e, function(e) {
                return e.nodeType === 1
            });
            if (it.test(t)) {
                return v.filter(t, r, !n)
            }
            t = v.filter(t, r)
        }
        return v.grep(e, function(e, r) {
            return v.inArray(e, t) >= 0 === n
        })
    }

    function lt(e) {
        var t = ct.split("|"),
            n = e.createDocumentFragment();
        if (n.createElement) {
            while (t.length) {
                n.createElement(t.pop())
            }
        }
        return n
    }

    function Lt(e, t) {
        return e.getElementsByTagName(t)[0] || e.appendChild(e.ownerDocument.createElement(t))
    }

    function At(e, t) {
        if (t.nodeType !== 1 || !v.hasData(e)) {
            return
        }
        var n, r, i, s = v._data(e),
            o = v._data(t, s),
            u = s.events;
        if (u) {
            delete o.handle, o.events = {};
            for (n in u) {
                for (r = 0, i = u[n].length; r < i; r++) {
                    v.event.add(t, n, u[n][r])
                }
            }
        }
        o.data && (o.data = v.extend({}, o.data))
    }

    function Ot(e, t) {
        var n;
        if (t.nodeType !== 1) {
            return
        }
        t.clearAttributes && t.clearAttributes(), t.mergeAttributes && t.mergeAttributes(e), n = t.nodeName.toLowerCase(), n === "object" ? (t.parentNode && (t.outerHTML = e.outerHTML), v.support.html5Clone && e.innerHTML && !v.trim(t.innerHTML) && (t.innerHTML = e.innerHTML)) : n === "input" && Et.test(e.type) ? (t.defaultChecked = t.checked = e.checked, t.value !== e.value && (t.value = e.value)) : n === "option" ? t.selected = e.defaultSelected : n === "input" || n === "textarea" ? t.defaultValue = e.defaultValue : n === "script" && t.text !== e.text && (t.text = e.text), t.removeAttribute(v.expando)
    }

    function Mt(e) {
        return typeof e.getElementsByTagName != "undefined" ? e.getElementsByTagName("*") : typeof e.querySelectorAll != "undefined" ? e.querySelectorAll("*") : []
    }

    function _t(e) {
        Et.test(e.type) && (e.defaultChecked = e.checked)
    }

    function Qt(e, t) {
        if (t in e) {
            return t
        }
        var n = t.charAt(0).toUpperCase() + t.slice(1),
            r = t,
            i = Jt.length;
        while (i--) {
            t = Jt[i] + n;
            if (t in e) {
                return t
            }
        }
        return r
    }

    function Gt(e, t) {
        return e = t || e, v.css(e, "display") === "none" || !v.contains(e.ownerDocument, e)
    }

    function Yt(e, t) {
        var n, r, i = [],
            s = 0,
            o = e.length;
        for (; s < o; s++) {
            n = e[s];
            if (!n.style) {
                continue
            }
            i[s] = v._data(n, "olddisplay"), t ? (!i[s] && n.style.display === "none" && (n.style.display = ""), n.style.display === "" && Gt(n) && (i[s] = v._data(n, "olddisplay", nn(n.nodeName)))) : (r = Dt(n, "display"), !i[s] && r !== "none" && v._data(n, "olddisplay", r))
        }
        for (s = 0; s < o; s++) {
            n = e[s];
            if (!n.style) {
                continue
            }
            if (!t || n.style.display === "none" || n.style.display === "") {
                n.style.display = t ? i[s] || "" : "none"
            }
        }
        return e
    }

    function Zt(e, t, n) {
        var r = Rt.exec(t);
        return r ? Math.max(0, r[1] - (n || 0)) + (r[2] || "px") : t
    }

    function en(e, t, n, r) {
        var i = n === (r ? "border" : "content") ? 4 : t === "width" ? 1 : 0,
            s = 0;
        for (; i < 4; i += 2) {
            n === "margin" && (s += v.css(e, n + $t[i], !0)), r ? (n === "content" && (s -= parseFloat(Dt(e, "padding" + $t[i])) || 0), n !== "margin" && (s -= parseFloat(Dt(e, "border" + $t[i] + "Width")) || 0)) : (s += parseFloat(Dt(e, "padding" + $t[i])) || 0, n !== "padding" && (s += parseFloat(Dt(e, "border" + $t[i] + "Width")) || 0))
        }
        return s
    }

    function tn(e, t, n) {
        var r = t === "width" ? e.offsetWidth : e.offsetHeight,
            i = !0,
            s = v.support.boxSizing && v.css(e, "boxSizing") === "border-box";
        if (r <= 0 || r == null) {
            r = Dt(e, t);
            if (r < 0 || r == null) {
                r = e.style[t]
            }
            if (Ut.test(r)) {
                return r
            }
            i = s && (v.support.boxSizingReliable || r === e.style[t]), r = parseFloat(r) || 0
        }
        return r + en(e, t, n || (s ? "border" : "content"), i) + "px"
    }

    function nn(e) {
        if (Wt[e]) {
            return Wt[e]
        }
        var t = v("<" + e + ">").appendTo(i.body),
            n = t.css("display");
        t.remove();
        if (n === "none" || n === "") {
            Pt = i.body.appendChild(Pt || v.extend(i.createElement("iframe"), {
                frameBorder: 0,
                width: 0,
                height: 0
            }));
            if (!Ht || !Pt.createElement) {
                Ht = (Pt.contentWindow || Pt.contentDocument).document, Ht.write("<!doctype html><html><body>"), Ht.close()
            }
            t = Ht.body.appendChild(Ht.createElement(e)), n = Dt(t, "display"), i.body.removeChild(Pt)
        }
        return Wt[e] = n, n
    }

    function fn(e, t, n, r) {
        var i;
        if (v.isArray(t)) {
            v.each(t, function(t, i) {
                n || sn.test(e) ? r(e, i) : fn(e + "[" + (typeof i == "object" ? t : "") + "]", i, n, r)
            })
        } else {
            if (!n && v.type(t) === "object") {
                for (i in t) {
                    fn(e + "[" + i + "]", t[i], n, r)
                }
            } else {
                r(e, t)
            }
        }
    }

    function Cn(e) {
        return function(t, n) {
            typeof t != "string" && (n = t, t = "*");
            var r, i, s, o = t.toLowerCase().split(y),
                u = 0,
                a = o.length;
            if (v.isFunction(n)) {
                for (; u < a; u++) {
                    r = o[u], s = /^\+/.test(r), s && (r = r.substr(1) || "*"), i = e[r] = e[r] || [], i[s ? "unshift" : "push"](n)
                }
            }
        }
    }

    function kn(e, n, r, i, s, o) {
        s = s || n.dataTypes[0], o = o || {}, o[s] = !0;
        var u, a = e[s],
            f = 0,
            l = a ? a.length : 0,
            c = e === Sn;
        for (; f < l && (c || !u); f++) {
            u = a[f](n, r, i), typeof u == "string" && (!c || o[u] ? u = t : (n.dataTypes.unshift(u), u = kn(e, n, r, i, u, o)))
        }
        return (c || !u) && !o["*"] && (u = kn(e, n, r, i, "*", o)), u
    }

    function Ln(e, n) {
        var r, i, s = v.ajaxSettings.flatOptions || {};
        for (r in n) {
            n[r] !== t && ((s[r] ? e : i || (i = {}))[r] = n[r])
        }
        i && v.extend(!0, e, i)
    }

    function An(e, n, r) {
        var i, s, o, u, a = e.contents,
            f = e.dataTypes,
            l = e.responseFields;
        for (s in l) {
            s in r && (n[l[s]] = r[s])
        }
        while (f[0] === "*") {
            f.shift(), i === t && (i = e.mimeType || n.getResponseHeader("content-type"))
        }
        if (i) {
            for (s in a) {
                if (a[s] && a[s].test(i)) {
                    f.unshift(s);
                    break
                }
            }
        }
        if (f[0] in r) {
            o = f[0]
        } else {
            for (s in r) {
                if (!f[0] || e.converters[s + " " + f[0]]) {
                    o = s;
                    break
                }
                u || (u = s)
            }
            o = o || u
        }
        if (o) {
            return o !== f[0] && f.unshift(o), r[o]
        }
    }

    function On(e, t) {
        var n, r, i, s, o = e.dataTypes.slice(),
            u = o[0],
            a = {},
            f = 0;
        e.dataFilter && (t = e.dataFilter(t, e.dataType));
        if (o[1]) {
            for (n in e.converters) {
                a[n.toLowerCase()] = e.converters[n]
            }
        }
        for (; i = o[++f];) {
            if (i !== "*") {
                if (u !== "*" && u !== i) {
                    n = a[u + " " + i] || a["* " + i];
                    if (!n) {
                        for (r in a) {
                            s = r.split(" ");
                            if (s[1] === i) {
                                n = a[u + " " + s[0]] || a["* " + s[0]];
                                if (n) {
                                    n === !0 ? n = a[r] : a[r] !== !0 && (i = s[0], o.splice(f--, 0, i));
                                    break
                                }
                            }
                        }
                    }
                    if (n !== !0) {
                        if (n && e["throws"]) {
                            t = n(t)
                        } else {
                            try {
                                t = n(t)
                            } catch (l) {
                                return {
                                    state: "parsererror",
                                    error: n ? l : "No conversion from " + u + " to " + i
                                }
                            }
                        }
                    }
                }
                u = i
            }
        }
        return {
            state: "success",
            data: t
        }
    }

    function Fn() {
        try {
            return new e.XMLHttpRequest
        } catch (t) {}
    }

    function In() {
        try {
            return new e.ActiveXObject("Microsoft.XMLHTTP")
        } catch (t) {}
    }

    function $n() {
        return setTimeout(function() {
            qn = t
        }, 0), qn = v.now()
    }

    function Jn(e, t) {
        v.each(t, function(t, n) {
            var r = (Vn[t] || []).concat(Vn["*"]),
                i = 0,
                s = r.length;
            for (; i < s; i++) {
                if (r[i].call(e, t, n)) {
                    return
                }
            }
        })
    }

    function Kn(e, t, n) {
        var r, i = 0,
            s = 0,
            o = Xn.length,
            u = v.Deferred().always(function() {
                delete a.elem
            }),
            a = function() {
                var t = qn || $n(),
                    n = Math.max(0, f.startTime + f.duration - t),
                    r = n / f.duration || 0,
                    i = 1 - r,
                    s = 0,
                    o = f.tweens.length;
                for (; s < o; s++) {
                    f.tweens[s].run(i)
                }
                return u.notifyWith(e, [f, i, n]), i < 1 && o ? n : (u.resolveWith(e, [f]), !1)
            },
            f = u.promise({
                elem: e,
                props: v.extend({}, t),
                opts: v.extend(!0, {
                    specialEasing: {}
                }, n),
                originalProperties: t,
                originalOptions: n,
                startTime: qn || $n(),
                duration: n.duration,
                tweens: [],
                createTween: function(t, n, r) {
                    var i = v.Tween(e, f.opts, t, n, f.opts.specialEasing[t] || f.opts.easing);
                    return f.tweens.push(i), i
                },
                stop: function(t) {
                    var n = 0,
                        r = t ? f.tweens.length : 0;
                    for (; n < r; n++) {
                        f.tweens[n].run(1)
                    }
                    return t ? u.resolveWith(e, [f, t]) : u.rejectWith(e, [f, t]), this
                }
            }),
            l = f.props;
        Qn(l, f.opts.specialEasing);
        for (; i < o; i++) {
            r = Xn[i].call(f, e, l, f.opts);
            if (r) {
                return r
            }
        }
        return Jn(f, l), v.isFunction(f.opts.start) && f.opts.start.call(e, f), v.fx.timer(v.extend(a, {
            anim: f,
            queue: f.opts.queue,
            elem: e
        })), f.progress(f.opts.progress).done(f.opts.done, f.opts.complete).fail(f.opts.fail).always(f.opts.always)
    }

    function Qn(e, t) {
        var n, r, i, s, o;
        for (n in e) {
            r = v.camelCase(n), i = t[r], s = e[n], v.isArray(s) && (i = s[1], s = e[n] = s[0]), n !== r && (e[r] = s, delete e[n]), o = v.cssHooks[r];
            if (o && "expand" in o) {
                s = o.expand(s), delete e[r];
                for (n in s) {
                    n in e || (e[n] = s[n], t[n] = i)
                }
            } else {
                t[r] = i
            }
        }
    }

    function Gn(e, t, n) {
        var r, i, s, o, u, a, f, l, c, h = this,
            p = e.style,
            d = {},
            m = [],
            g = e.nodeType && Gt(e);
        n.queue || (l = v._queueHooks(e, "fx"), l.unqueued == null && (l.unqueued = 0, c = l.empty.fire, l.empty.fire = function() {
            l.unqueued || c()
        }), l.unqueued++, h.always(function() {
            h.always(function() {
                l.unqueued--, v.queue(e, "fx").length || l.empty.fire()
            })
        })), e.nodeType === 1 && ("height" in t || "width" in t) && (n.overflow = [p.overflow, p.overflowX, p.overflowY], v.css(e, "display") === "inline" && v.css(e, "float") === "none" && (!v.support.inlineBlockNeedsLayout || nn(e.nodeName) === "inline" ? p.display = "inline-block" : p.zoom = 1)), n.overflow && (p.overflow = "hidden", v.support.shrinkWrapBlocks || h.done(function() {
            p.overflow = n.overflow[0], p.overflowX = n.overflow[1], p.overflowY = n.overflow[2]
        }));
        for (r in t) {
            s = t[r];
            if (Un.exec(s)) {
                delete t[r], a = a || s === "toggle";
                if (s === (g ? "hide" : "show")) {
                    continue
                }
                m.push(r)
            }
        }
        o = m.length;
        if (o) {
            u = v._data(e, "fxshow") || v._data(e, "fxshow", {}), "hidden" in u && (g = u.hidden), a && (u.hidden = !g), g ? v(e).show() : h.done(function() {
                v(e).hide()
            }), h.done(function() {
                var t;
                v.removeData(e, "fxshow", !0);
                for (t in d) {
                    v.style(e, t, d[t])
                }
            });
            for (r = 0; r < o; r++) {
                i = m[r], f = h.createTween(i, g ? u[i] : 0), d[i] = u[i] || v.style(e, i), i in u || (u[i] = f.start, g && (f.end = f.start, f.start = i === "width" || i === "height" ? 1 : 0))
            }
        }
    }

    function Yn(e, t, n, r, i) {
        return new Yn.prototype.init(e, t, n, r, i)
    }

    function Zn(e, t) {
        var n, r = {
                height: e
            },
            i = 0;
        t = t ? 1 : 0;
        for (; i < 4; i += 2 - t) {
            n = $t[i], r["margin" + n] = r["padding" + n] = e
        }
        return t && (r.opacity = r.width = e), r
    }

    function tr(e) {
        return v.isWindow(e) ? e : e.nodeType === 9 ? e.defaultView || e.parentWindow : !1
    }
    var n, r, i = e.document,
        s = e.location,
        o = e.navigator,
        u = e.jQuery,
        a = e.$,
        f = Array.prototype.push,
        l = Array.prototype.slice,
        c = Array.prototype.indexOf,
        h = Object.prototype.toString,
        p = Object.prototype.hasOwnProperty,
        d = String.prototype.trim,
        v = function(e, t) {
            return new v.fn.init(e, t, n)
        },
        m = /[\-+]?(?:\d*\.|)\d+(?:[eE][\-+]?\d+|)/.source,
        g = /\S/,
        y = /\s+/,
        b = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g,
        w = /^(?:[^#<]*(<[\w\W]+>)[^>]*$|#([\w\-]*)$)/,
        E = /^<(\w+)\s*\/?>(?:<\/\1>|)$/,
        S = /^[\],:{}\s]*$/,
        x = /(?:^|:|,)(?:\s*\[)+/g,
        T = /\\(?:["\\\/bfnrt]|u[\da-fA-F]{4})/g,
        N = /"[^"\\\r\n]*"|true|false|null|-?(?:\d\d*\.|)\d+(?:[eE][\-+]?\d+|)/g,
        C = /^-ms-/,
        k = /-([\da-z])/gi,
        L = function(e, t) {
            return (t + "").toUpperCase()
        },
        A = function() {
            i.addEventListener ? (i.removeEventListener("DOMContentLoaded", A, !1), v.ready()) : i.readyState === "complete" && (i.detachEvent("onreadystatechange", A), v.ready())
        },
        O = {};
    v.fn = v.prototype = {
        constructor: v,
        init: function(e, n, r) {
            var s, o, u, a;
            if (!e) {
                return this
            }
            if (e.nodeType) {
                return this.context = this[0] = e, this.length = 1, this
            }
            if (typeof e == "string") {
                e.charAt(0) === "<" && e.charAt(e.length - 1) === ">" && e.length >= 3 ? s = [null, e, null] : s = w.exec(e);
                if (s && (s[1] || !n)) {
                    if (s[1]) {
                        return n = n instanceof v ? n[0] : n, a = n && n.nodeType ? n.ownerDocument || n : i, e = v.parseHTML(s[1], a, !0), E.test(s[1]) && v.isPlainObject(n) && this.attr.call(e, n, !0), v.merge(this, e)
                    }
                    o = i.getElementById(s[2]);
                    if (o && o.parentNode) {
                        if (o.id !== s[2]) {
                            return r.find(e)
                        }
                        this.length = 1, this[0] = o
                    }
                    return this.context = i, this.selector = e, this
                }
                return !n || n.jquery ? (n || r).find(e) : this.constructor(n).find(e)
            }
            return v.isFunction(e) ? r.ready(e) : (e.selector !== t && (this.selector = e.selector, this.context = e.context), v.makeArray(e, this))
        },
        selector: "",
        jquery: "1.8.3",
        length: 0,
        size: function() {
            return this.length
        },
        toArray: function() {
            return l.call(this)
        },
        get: function(e) {
            return e == null ? this.toArray() : e < 0 ? this[this.length + e] : this[e]
        },
        pushStack: function(e, t, n) {
            var r = v.merge(this.constructor(), e);
            return r.prevObject = this, r.context = this.context, t === "find" ? r.selector = this.selector + (this.selector ? " " : "") + n : t && (r.selector = this.selector + "." + t + "(" + n + ")"), r
        },
        each: function(e, t) {
            return v.each(this, e, t)
        },
        ready: function(e) {
            return v.ready.promise().done(e), this
        },
        eq: function(e) {
            return e = +e, e === -1 ? this.slice(e) : this.slice(e, e + 1)
        },
        first: function() {
            return this.eq(0)
        },
        last: function() {
            return this.eq(-1)
        },
        slice: function() {
            return this.pushStack(l.apply(this, arguments), "slice", l.call(arguments).join(","))
        },
        map: function(e) {
            return this.pushStack(v.map(this, function(t, n) {
                return e.call(t, n, t)
            }))
        },
        end: function() {
            return this.prevObject || this.constructor(null)
        },
        push: f,
        sort: [].sort,
        splice: [].splice
    }, v.fn.init.prototype = v.fn, v.extend = v.fn.extend = function() {
        var e, n, r, i, s, o, u = arguments[0] || {},
            a = 1,
            f = arguments.length,
            l = !1;
        typeof u == "boolean" && (l = u, u = arguments[1] || {}, a = 2), typeof u != "object" && !v.isFunction(u) && (u = {}), f === a && (u = this, --a);
        for (; a < f; a++) {
            if ((e = arguments[a]) != null) {
                for (n in e) {
                    r = u[n], i = e[n];
                    if (u === i) {
                        continue
                    }
                    l && i && (v.isPlainObject(i) || (s = v.isArray(i))) ? (s ? (s = !1, o = r && v.isArray(r) ? r : []) : o = r && v.isPlainObject(r) ? r : {}, u[n] = v.extend(l, o, i)) : i !== t && (u[n] = i)
                }
            }
        }
        return u
    }, v.extend({
        noConflict: function(t) {
            return e.$ === v && (e.$ = a), t && e.jQuery === v && (e.jQuery = u), v
        },
        isReady: !1,
        readyWait: 1,
        holdReady: function(e) {
            e ? v.readyWait++ : v.ready(!0)
        },
        ready: function(e) {
            if (e === !0 ? --v.readyWait : v.isReady) {
                return
            }
            if (!i.body) {
                return setTimeout(v.ready, 1)
            }
            v.isReady = !0;
            if (e !== !0 && --v.readyWait > 0) {
                return
            }
            r.resolveWith(i, [v]), v.fn.trigger && v(i).trigger("ready").off("ready")
        },
        isFunction: function(e) {
            return v.type(e) === "function"
        },
        isArray: Array.isArray || function(e) {
            return v.type(e) === "array"
        },
        isWindow: function(e) {
            return e != null && e == e.window
        },
        isNumeric: function(e) {
            return !isNaN(parseFloat(e)) && isFinite(e)
        },
        type: function(e) {
            return e == null ? String(e) : O[h.call(e)] || "object"
        },
        isPlainObject: function(e) {
            if (!e || v.type(e) !== "object" || e.nodeType || v.isWindow(e)) {
                return !1
            }
            try {
                if (e.constructor && !p.call(e, "constructor") && !p.call(e.constructor.prototype, "isPrototypeOf")) {
                    return !1
                }
            } catch (n) {
                return !1
            }
            var r;
            for (r in e) {}
            return r === t || p.call(e, r)
        },
        isEmptyObject: function(e) {
            var t;
            for (t in e) {
                return !1
            }
            return !0
        },
        error: function(e) {
            throw new Error(e)
        },
        parseHTML: function(e, t, n) {
            var r;
            return !e || typeof e != "string" ? null : (typeof t == "boolean" && (n = t, t = 0), t = t || i, (r = E.exec(e)) ? [t.createElement(r[1])] : (r = v.buildFragment([e], t, n ? null : []), v.merge([], (r.cacheable ? v.clone(r.fragment) : r.fragment).childNodes)))
        },
        parseJSON: function(t) {
            if (!t || typeof t != "string") {
                return null
            }
            t = v.trim(t);
            if (e.JSON && e.JSON.parse) {
                return e.JSON.parse(t)
            }
            if (S.test(t.replace(T, "@").replace(N, "]").replace(x, ""))) {
                return (new Function("return " + t))()
            }
            v.error("Invalid JSON: " + t)
        },
        parseXML: function(n) {
            var r, i;
            if (!n || typeof n != "string") {
                return null
            }
            try {
                e.DOMParser ? (i = new DOMParser, r = i.parseFromString(n, "text/xml")) : (r = new ActiveXObject("Microsoft.XMLDOM"), r.async = "false", r.loadXML(n))
            } catch (s) {
                r = t
            }
            return (!r || !r.documentElement || r.getElementsByTagName("parsererror").length) && v.error("Invalid XML: " + n), r
        },
        noop: function() {},
        globalEval: function(t) {
            t && g.test(t) && (e.execScript || function(t) {
                e.eval.call(e, t)
            })(t)
        },
        camelCase: function(e) {
            return e.replace(C, "ms-").replace(k, L)
        },
        nodeName: function(e, t) {
            return e.nodeName && e.nodeName.toLowerCase() === t.toLowerCase()
        },
        each: function(e, n, r) {
            var i, s = 0,
                o = e.length,
                u = o === t || v.isFunction(e);
            if (r) {
                if (u) {
                    for (i in e) {
                        if (n.apply(e[i], r) === !1) {
                            break
                        }
                    }
                } else {
                    for (; s < o;) {
                        if (n.apply(e[s++], r) === !1) {
                            break
                        }
                    }
                }
            } else {
                if (u) {
                    for (i in e) {
                        if (n.call(e[i], i, e[i]) === !1) {
                            break
                        }
                    }
                } else {
                    for (; s < o;) {
                        if (n.call(e[s], s, e[s++]) === !1) {
                            break
                        }
                    }
                }
            }
            return e
        },
        trim: d && !d.call("\ufeff\u00a0") ? function(e) {
            return e == null ? "" : d.call(e)
        } : function(e) {
            return e == null ? "" : (e + "").replace(b, "")
        },
        makeArray: function(e, t) {
            var n, r = t || [];
            return e != null && (n = v.type(e), e.length == null || n === "string" || n === "function" || n === "regexp" || v.isWindow(e) ? f.call(r, e) : v.merge(r, e)), r
        },
        inArray: function(e, t, n) {
            var r;
            if (t) {
                if (c) {
                    return c.call(t, e, n)
                }
                r = t.length, n = n ? n < 0 ? Math.max(0, r + n) : n : 0;
                for (; n < r; n++) {
                    if (n in t && t[n] === e) {
                        return n
                    }
                }
            }
            return -1
        },
        merge: function(e, n) {
            var r = n.length,
                i = e.length,
                s = 0;
            if (typeof r == "number") {
                for (; s < r; s++) {
                    e[i++] = n[s]
                }
            } else {
                while (n[s] !== t) {
                    e[i++] = n[s++]
                }
            }
            return e.length = i, e
        },
        grep: function(e, t, n) {
            var r, i = [],
                s = 0,
                o = e.length;
            n = !!n;
            for (; s < o; s++) {
                r = !!t(e[s], s), n !== r && i.push(e[s])
            }
            return i
        },
        map: function(e, n, r) {
            var i, s, o = [],
                u = 0,
                a = e.length,
                f = e instanceof v || a !== t && typeof a == "number" && (a > 0 && e[0] && e[a - 1] || a === 0 || v.isArray(e));
            if (f) {
                for (; u < a; u++) {
                    i = n(e[u], u, r), i != null && (o[o.length] = i)
                }
            } else {
                for (s in e) {
                    i = n(e[s], s, r), i != null && (o[o.length] = i)
                }
            }
            return o.concat.apply([], o)
        },
        guid: 1,
        proxy: function(e, n) {
            var r, i, s;
            return typeof n == "string" && (r = e[n], n = e, e = r), v.isFunction(e) ? (i = l.call(arguments, 2), s = function() {
                return e.apply(n, i.concat(l.call(arguments)))
            }, s.guid = e.guid = e.guid || v.guid++, s) : t
        },
        access: function(e, n, r, i, s, o, u) {
            var a, f = r == null,
                l = 0,
                c = e.length;
            if (r && typeof r == "object") {
                for (l in r) {
                    v.access(e, n, l, r[l], 1, o, i)
                }
                s = 1
            } else {
                if (i !== t) {
                    a = u === t && v.isFunction(i), f && (a ? (a = n, n = function(e, t, n) {
                        return a.call(v(e), n)
                    }) : (n.call(e, i), n = null));
                    if (n) {
                        for (; l < c; l++) {
                            n(e[l], r, a ? i.call(e[l], l, n(e[l], r)) : i, u)
                        }
                    }
                    s = 1
                }
            }
            return s ? e : f ? n.call(e) : c ? n(e[0], r) : o
        },
        now: function() {
            return (new Date).getTime()
        }
    }), v.ready.promise = function(t) {
        if (!r) {
            r = v.Deferred();
            if (i.readyState === "complete") {
                setTimeout(v.ready, 1)
            } else {
                if (i.addEventListener) {
                    i.addEventListener("DOMContentLoaded", A, !1), e.addEventListener("load", v.ready, !1)
                } else {
                    i.attachEvent("onreadystatechange", A), e.attachEvent("onload", v.ready);
                    var n = !1;
                    try {
                        n = e.frameElement == null && i.documentElement
                    } catch (s) {}
                    n && n.doScroll && function o() {
                        if (!v.isReady) {
                            try {
                                n.doScroll("left")
                            } catch (e) {
                                return setTimeout(o, 50)
                            }
                            v.ready()
                        }
                    }()
                }
            }
        }
        return r.promise(t)
    }, v.each("Boolean Number String Function Array Date RegExp Object".split(" "), function(e, t) {
        O["[object " + t + "]"] = t.toLowerCase()
    }), n = v(i);
    var M = {};
    v.Callbacks = function(e) {
        e = typeof e == "string" ? M[e] || _(e) : v.extend({}, e);
        var n, r, i, s, o, u, a = [],
            f = !e.once && [],
            l = function(t) {
                n = e.memory && t, r = !0, u = s || 0, s = 0, o = a.length, i = !0;
                for (; a && u < o; u++) {
                    if (a[u].apply(t[0], t[1]) === !1 && e.stopOnFalse) {
                        n = !1;
                        break
                    }
                }
                i = !1, a && (f ? f.length && l(f.shift()) : n ? a = [] : c.disable())
            },
            c = {
                add: function() {
                    if (a) {
                        var t = a.length;
                        (function r(t) {
                            v.each(t, function(t, n) {
                                var i = v.type(n);
                                i === "function" ? (!e.unique || !c.has(n)) && a.push(n) : n && n.length && i !== "string" && r(n)
                            })
                        })(arguments), i ? o = a.length : n && (s = t, l(n))
                    }
                    return this
                },
                remove: function() {
                    return a && v.each(arguments, function(e, t) {
                        var n;
                        while ((n = v.inArray(t, a, n)) > -1) {
                            a.splice(n, 1), i && (n <= o && o--, n <= u && u--)
                        }
                    }), this
                },
                has: function(e) {
                    return v.inArray(e, a) > -1
                },
                empty: function() {
                    return a = [], this
                },
                disable: function() {
                    return a = f = n = t, this
                },
                disabled: function() {
                    return !a
                },
                lock: function() {
                    return f = t, n || c.disable(), this
                },
                locked: function() {
                    return !f
                },
                fireWith: function(e, t) {
                    return t = t || [], t = [e, t.slice ? t.slice() : t], a && (!r || f) && (i ? f.push(t) : l(t)), this
                },
                fire: function() {
                    return c.fireWith(this, arguments), this
                },
                fired: function() {
                    return !!r
                }
            };
        return c
    }, v.extend({
        Deferred: function(e) {
            var t = [
                    ["resolve", "done", v.Callbacks("once memory"), "resolved"],
                    ["reject", "fail", v.Callbacks("once memory"), "rejected"],
                    ["notify", "progress", v.Callbacks("memory")]
                ],
                n = "pending",
                r = {
                    state: function() {
                        return n
                    },
                    always: function() {
                        return i.done(arguments).fail(arguments), this
                    },
                    then: function() {
                        var e = arguments;
                        return v.Deferred(function(n) {
                            v.each(t, function(t, r) {
                                var s = r[0],
                                    o = e[t];
                                i[r[1]](v.isFunction(o) ? function() {
                                    var e = o.apply(this, arguments);
                                    e && v.isFunction(e.promise) ? e.promise().done(n.resolve).fail(n.reject).progress(n.notify) : n[s + "With"](this === i ? n : this, [e])
                                } : n[s])
                            }), e = null
                        }).promise()
                    },
                    promise: function(e) {
                        return e != null ? v.extend(e, r) : r
                    }
                },
                i = {};
            return r.pipe = r.then, v.each(t, function(e, s) {
                var o = s[2],
                    u = s[3];
                r[s[1]] = o.add, u && o.add(function() {
                    n = u
                }, t[e ^ 1][2].disable, t[2][2].lock), i[s[0]] = o.fire, i[s[0] + "With"] = o.fireWith
            }), r.promise(i), e && e.call(i, i), i
        },
        when: function(e) {
            var t = 0,
                n = l.call(arguments),
                r = n.length,
                i = r !== 1 || e && v.isFunction(e.promise) ? r : 0,
                s = i === 1 ? e : v.Deferred(),
                o = function(e, t, n) {
                    return function(r) {
                        t[e] = this, n[e] = arguments.length > 1 ? l.call(arguments) : r, n === u ? s.notifyWith(t, n) : --i || s.resolveWith(t, n)
                    }
                },
                u, a, f;
            if (r > 1) {
                u = new Array(r), a = new Array(r), f = new Array(r);
                for (; t < r; t++) {
                    n[t] && v.isFunction(n[t].promise) ? n[t].promise().done(o(t, f, n)).fail(s.reject).progress(o(t, a, u)) : --i
                }
            }
            return i || s.resolveWith(f, n), s.promise()
        }
    }), v.support = function() {
        var t, n, r, s, o, u, a, f, l, c, h, p = i.createElement("div");
        p.setAttribute("className", "t"), p.innerHTML = "  <link/><table></table><a href='/a'>a</a><input type='checkbox'/>", n = p.getElementsByTagName("*"), r = p.getElementsByTagName("a")[0];
        if (!n || !r || !n.length) {
            return {}
        }
        s = i.createElement("select"), o = s.appendChild(i.createElement("option")), u = p.getElementsByTagName("input")[0], r.style.cssText = "top:1px;float:left;opacity:.5", t = {
            leadingWhitespace: p.firstChild.nodeType === 3,
            tbody: !p.getElementsByTagName("tbody").length,
            htmlSerialize: !!p.getElementsByTagName("link").length,
            style: /top/.test(r.getAttribute("style")),
            hrefNormalized: r.getAttribute("href") === "/a",
            opacity: /^0.5/.test(r.style.opacity),
            cssFloat: !!r.style.cssFloat,
            checkOn: u.value === "on",
            optSelected: o.selected,
            getSetAttribute: p.className !== "t",
            enctype: !!i.createElement("form").enctype,
            html5Clone: i.createElement("nav").cloneNode(!0).outerHTML !== "<:nav></:nav>",
            boxModel: i.compatMode === "CSS1Compat",
            submitBubbles: !0,
            changeBubbles: !0,
            focusinBubbles: !1,
            deleteExpando: !0,
            noCloneEvent: !0,
            inlineBlockNeedsLayout: !1,
            shrinkWrapBlocks: !1,
            reliableMarginRight: !0,
            boxSizingReliable: !0,
            pixelPosition: !1
        }, u.checked = !0, t.noCloneChecked = u.cloneNode(!0).checked, s.disabled = !0, t.optDisabled = !o.disabled;
        try {
            delete p.test
        } catch (d) {
            t.deleteExpando = !1
        }!p.addEventListener && p.attachEvent && p.fireEvent && (p.attachEvent("onclick", h = function() {
            t.noCloneEvent = !1
        }), p.cloneNode(!0).fireEvent("onclick"), p.detachEvent("onclick", h)), u = i.createElement("input"), u.value = "t", u.setAttribute("type", "radio"), t.radioValue = u.value === "t", u.setAttribute("checked", "checked"), u.setAttribute("name", "t"), p.appendChild(u), a = i.createDocumentFragment(), a.appendChild(p.lastChild), t.checkClone = a.cloneNode(!0).cloneNode(!0).lastChild.checked, t.appendChecked = u.checked, a.removeChild(u), a.appendChild(p);
        if (p.attachEvent) {
            for (l in {
                    submit: !0,
                    change: !0,
                    focusin: !0
                }) {
                f = "on" + l, c = f in p, c || (p.setAttribute(f, "return;"), c = typeof p[f] == "function"), t[l + "Bubbles"] = c
            }
        }
        return v(function() {
            var n, r, s, o, u = "padding:0;margin:0;border:0;display:block;overflow:hidden;",
                a = i.getElementsByTagName("body")[0];
            if (!a) {
                return
            }
            n = i.createElement("div"), n.style.cssText = "visibility:hidden;border:0;width:0;height:0;position:static;top:0;margin-top:1px", a.insertBefore(n, a.firstChild), r = i.createElement("div"), n.appendChild(r), r.innerHTML = "<table><tr><td></td><td>t</td></tr></table>", s = r.getElementsByTagName("td"), s[0].style.cssText = "padding:0;margin:0;border:0;display:none", c = s[0].offsetHeight === 0, s[0].style.display = "", s[1].style.display = "none", t.reliableHiddenOffsets = c && s[0].offsetHeight === 0, r.innerHTML = "", r.style.cssText = "box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;padding:1px;border:1px;display:block;width:4px;margin-top:1%;position:absolute;top:1%;", t.boxSizing = r.offsetWidth === 4, t.doesNotIncludeMarginInBodyOffset = a.offsetTop !== 1, e.getComputedStyle && (t.pixelPosition = (e.getComputedStyle(r, null) || {}).top !== "1%", t.boxSizingReliable = (e.getComputedStyle(r, null) || {
                width: "4px"
            }).width === "4px", o = i.createElement("div"), o.style.cssText = r.style.cssText = u, o.style.marginRight = o.style.width = "0", r.style.width = "1px", r.appendChild(o), t.reliableMarginRight = !parseFloat((e.getComputedStyle(o, null) || {}).marginRight)), typeof r.style.zoom != "undefined" && (r.innerHTML = "", r.style.cssText = u + "width:1px;padding:1px;display:inline;zoom:1", t.inlineBlockNeedsLayout = r.offsetWidth === 3, r.style.display = "block", r.style.overflow = "visible", r.innerHTML = "<div></div>", r.firstChild.style.width = "5px", t.shrinkWrapBlocks = r.offsetWidth !== 3, n.style.zoom = 1), a.removeChild(n), n = r = s = o = null
        }), a.removeChild(p), n = r = s = o = u = a = p = null, t
    }();
    var D = /(?:\{[\s\S]*\}|\[[\s\S]*\])$/,
        P = /([A-Z])/g;
    v.extend({
        cache: {},
        deletedIds: [],
        uuid: 0,
        expando: "jQuery" + (v.fn.jquery + Math.random()).replace(/\D/g, ""),
        noData: {
            embed: !0,
            object: "clsid:D27CDB6E-AE6D-11cf-96B8-444553540000",
            applet: !0
        },
        hasData: function(e) {
            return e = e.nodeType ? v.cache[e[v.expando]] : e[v.expando], !!e && !B(e)
        },
        data: function(e, n, r, i) {
            if (!v.acceptData(e)) {
                return
            }
            var s, o, u = v.expando,
                a = typeof n == "string",
                f = e.nodeType,
                l = f ? v.cache : e,
                c = f ? e[u] : e[u] && u;
            if ((!c || !l[c] || !i && !l[c].data) && a && r === t) {
                return
            }
            c || (f ? e[u] = c = v.deletedIds.pop() || v.guid++ : c = u), l[c] || (l[c] = {}, f || (l[c].toJSON = v.noop));
            if (typeof n == "object" || typeof n == "function") {
                i ? l[c] = v.extend(l[c], n) : l[c].data = v.extend(l[c].data, n)
            }
            return s = l[c], i || (s.data || (s.data = {}), s = s.data), r !== t && (s[v.camelCase(n)] = r), a ? (o = s[n], o == null && (o = s[v.camelCase(n)])) : o = s, o
        },
        removeData: function(e, t, n) {
            if (!v.acceptData(e)) {
                return
            }
            var r, i, s, o = e.nodeType,
                u = o ? v.cache : e,
                a = o ? e[v.expando] : v.expando;
            if (!u[a]) {
                return
            }
            if (t) {
                r = n ? u[a] : u[a].data;
                if (r) {
                    v.isArray(t) || (t in r ? t = [t] : (t = v.camelCase(t), t in r ? t = [t] : t = t.split(" ")));
                    for (i = 0, s = t.length; i < s; i++) {
                        delete r[t[i]]
                    }
                    if (!(n ? B : v.isEmptyObject)(r)) {
                        return
                    }
                }
            }
            if (!n) {
                delete u[a].data;
                if (!B(u[a])) {
                    return
                }
            }
            o ? v.cleanData([e], !0) : v.support.deleteExpando || u != u.window ? delete u[a] : u[a] = null
        },
        _data: function(e, t, n) {
            return v.data(e, t, n, !0)
        },
        acceptData: function(e) {
            var t = e.nodeName && v.noData[e.nodeName.toLowerCase()];
            return !t || t !== !0 && e.getAttribute("classid") === t
        }
    }), v.fn.extend({
        data: function(e, n) {
            var r, i, s, o, u, a = this[0],
                f = 0,
                l = null;
            if (e === t) {
                if (this.length) {
                    l = v.data(a);
                    if (a.nodeType === 1 && !v._data(a, "parsedAttrs")) {
                        s = a.attributes;
                        for (u = s.length; f < u; f++) {
                            o = s[f].name, o.indexOf("data-") || (o = v.camelCase(o.substring(5)), H(a, o, l[o]))
                        }
                        v._data(a, "parsedAttrs", !0)
                    }
                }
                return l
            }
            return typeof e == "object" ? this.each(function() {
                v.data(this, e)
            }) : (r = e.split(".", 2), r[1] = r[1] ? "." + r[1] : "", i = r[1] + "!", v.access(this, function(n) {
                if (n === t) {
                    return l = this.triggerHandler("getData" + i, [r[0]]), l === t && a && (l = v.data(a, e), l = H(a, e, l)), l === t && r[1] ? this.data(r[0]) : l
                }
                r[1] = n, this.each(function() {
                    var t = v(this);
                    t.triggerHandler("setData" + i, r), v.data(this, e, n), t.triggerHandler("changeData" + i, r)
                })
            }, null, n, arguments.length > 1, null, !1))
        },
        removeData: function(e) {
            return this.each(function() {
                v.removeData(this, e)
            })
        }
    }), v.extend({
        queue: function(e, t, n) {
            var r;
            if (e) {
                return t = (t || "fx") + "queue", r = v._data(e, t), n && (!r || v.isArray(n) ? r = v._data(e, t, v.makeArray(n)) : r.push(n)), r || []
            }
        },
        dequeue: function(e, t) {
            t = t || "fx";
            var n = v.queue(e, t),
                r = n.length,
                i = n.shift(),
                s = v._queueHooks(e, t),
                o = function() {
                    v.dequeue(e, t)
                };
            i === "inprogress" && (i = n.shift(), r--), i && (t === "fx" && n.unshift("inprogress"), delete s.stop, i.call(e, o, s)), !r && s && s.empty.fire()
        },
        _queueHooks: function(e, t) {
            var n = t + "queueHooks";
            return v._data(e, n) || v._data(e, n, {
                empty: v.Callbacks("once memory").add(function() {
                    v.removeData(e, t + "queue", !0), v.removeData(e, n, !0)
                })
            })
        }
    }), v.fn.extend({
        queue: function(e, n) {
            var r = 2;
            return typeof e != "string" && (n = e, e = "fx", r--), arguments.length < r ? v.queue(this[0], e) : n === t ? this : this.each(function() {
                var t = v.queue(this, e, n);
                v._queueHooks(this, e), e === "fx" && t[0] !== "inprogress" && v.dequeue(this, e)
            })
        },
        dequeue: function(e) {
            return this.each(function() {
                v.dequeue(this, e)
            })
        },
        delay: function(e, t) {
            return e = v.fx ? v.fx.speeds[e] || e : e, t = t || "fx", this.queue(t, function(t, n) {
                var r = setTimeout(t, e);
                n.stop = function() {
                    clearTimeout(r)
                }
            })
        },
        clearQueue: function(e) {
            return this.queue(e || "fx", [])
        },
        promise: function(e, n) {
            var r, i = 1,
                s = v.Deferred(),
                o = this,
                u = this.length,
                a = function() {
                    --i || s.resolveWith(o, [o])
                };
            typeof e != "string" && (n = e, e = t), e = e || "fx";
            while (u--) {
                r = v._data(o[u], e + "queueHooks"), r && r.empty && (i++, r.empty.add(a))
            }
            return a(), s.promise(n)
        }
    });
    var j, F, I, q = /[\t\r\n]/g,
        R = /\r/g,
        U = /^(?:button|input)$/i,
        z = /^(?:button|input|object|select|textarea)$/i,
        W = /^a(?:rea|)$/i,
        X = /^(?:autofocus|autoplay|async|checked|controls|defer|disabled|hidden|loop|multiple|open|readonly|required|scoped|selected)$/i,
        V = v.support.getSetAttribute;
    v.fn.extend({
        attr: function(e, t) {
            return v.access(this, v.attr, e, t, arguments.length > 1)
        },
        removeAttr: function(e) {
            return this.each(function() {
                v.removeAttr(this, e)
            })
        },
        prop: function(e, t) {
            return v.access(this, v.prop, e, t, arguments.length > 1)
        },
        removeProp: function(e) {
            return e = v.propFix[e] || e, this.each(function() {
                try {
                    this[e] = t, delete this[e]
                } catch (n) {}
            })
        },
        addClass: function(e) {
            var t, n, r, i, s, o, u;
            if (v.isFunction(e)) {
                return this.each(function(t) {
                    v(this).addClass(e.call(this, t, this.className))
                })
            }
            if (e && typeof e == "string") {
                t = e.split(y);
                for (n = 0, r = this.length; n < r; n++) {
                    i = this[n];
                    if (i.nodeType === 1) {
                        if (!i.className && t.length === 1) {
                            i.className = e
                        } else {
                            s = " " + i.className + " ";
                            for (o = 0, u = t.length; o < u; o++) {
                                s.indexOf(" " + t[o] + " ") < 0 && (s += t[o] + " ")
                            }
                            i.className = v.trim(s)
                        }
                    }
                }
            }
            return this
        },
        removeClass: function(e) {
            var n, r, i, s, o, u, a;
            if (v.isFunction(e)) {
                return this.each(function(t) {
                    v(this).removeClass(e.call(this, t, this.className))
                })
            }
            if (e && typeof e == "string" || e === t) {
                n = (e || "").split(y);
                for (u = 0, a = this.length; u < a; u++) {
                    i = this[u];
                    if (i.nodeType === 1 && i.className) {
                        r = (" " + i.className + " ").replace(q, " ");
                        for (s = 0, o = n.length; s < o; s++) {
                            while (r.indexOf(" " + n[s] + " ") >= 0) {
                                r = r.replace(" " + n[s] + " ", " ")
                            }
                        }
                        i.className = e ? v.trim(r) : ""
                    }
                }
            }
            return this
        },
        toggleClass: function(e, t) {
            var n = typeof e,
                r = typeof t == "boolean";
            return v.isFunction(e) ? this.each(function(n) {
                v(this).toggleClass(e.call(this, n, this.className, t), t)
            }) : this.each(function() {
                if (n === "string") {
                    var i, s = 0,
                        o = v(this),
                        u = t,
                        a = e.split(y);
                    while (i = a[s++]) {
                        u = r ? u : !o.hasClass(i), o[u ? "addClass" : "removeClass"](i)
                    }
                } else {
                    if (n === "undefined" || n === "boolean") {
                        this.className && v._data(this, "__className__", this.className), this.className = this.className || e === !1 ? "" : v._data(this, "__className__") || ""
                    }
                }
            })
        },
        hasClass: function(e) {
            var t = " " + e + " ",
                n = 0,
                r = this.length;
            for (; n < r; n++) {
                if (this[n].nodeType === 1 && (" " + this[n].className + " ").replace(q, " ").indexOf(t) >= 0) {
                    return !0
                }
            }
            return !1
        },
        val: function(e) {
            var n, r, i, s = this[0];
            if (!arguments.length) {
                if (s) {
                    return n = v.valHooks[s.type] || v.valHooks[s.nodeName.toLowerCase()], n && "get" in n && (r = n.get(s, "value")) !== t ? r : (r = s.value, typeof r == "string" ? r.replace(R, "") : r == null ? "" : r)
                }
                return
            }
            return i = v.isFunction(e), this.each(function(r) {
                var s, o = v(this);
                if (this.nodeType !== 1) {
                    return
                }
                i ? s = e.call(this, r, o.val()) : s = e, s == null ? s = "" : typeof s == "number" ? s += "" : v.isArray(s) && (s = v.map(s, function(e) {
                    return e == null ? "" : e + ""
                })), n = v.valHooks[this.type] || v.valHooks[this.nodeName.toLowerCase()];
                if (!n || !("set" in n) || n.set(this, s, "value") === t) {
                    this.value = s
                }
            })
        }
    }), v.extend({
        valHooks: {
            option: {
                get: function(e) {
                    var t = e.attributes.value;
                    return !t || t.specified ? e.value : e.text
                }
            },
            select: {
                get: function(e) {
                    var t, n, r = e.options,
                        i = e.selectedIndex,
                        s = e.type === "select-one" || i < 0,
                        o = s ? null : [],
                        u = s ? i + 1 : r.length,
                        a = i < 0 ? u : s ? i : 0;
                    for (; a < u; a++) {
                        n = r[a];
                        if ((n.selected || a === i) && (v.support.optDisabled ? !n.disabled : n.getAttribute("disabled") === null) && (!n.parentNode.disabled || !v.nodeName(n.parentNode, "optgroup"))) {
                            t = v(n).val();
                            if (s) {
                                return t
                            }
                            o.push(t)
                        }
                    }
                    return o
                },
                set: function(e, t) {
                    var n = v.makeArray(t);
                    return v(e).find("option").each(function() {
                        this.selected = v.inArray(v(this).val(), n) >= 0
                    }), n.length || (e.selectedIndex = -1), n
                }
            }
        },
        attrFn: {},
        attr: function(e, n, r, i) {
            var s, o, u, a = e.nodeType;
            if (!e || a === 3 || a === 8 || a === 2) {
                return
            }
            if (i && v.isFunction(v.fn[n])) {
                return v(e)[n](r)
            }
            if (typeof e.getAttribute == "undefined") {
                return v.prop(e, n, r)
            }
            u = a !== 1 || !v.isXMLDoc(e), u && (n = n.toLowerCase(), o = v.attrHooks[n] || (X.test(n) ? F : j));
            if (r !== t) {
                if (r === null) {
                    v.removeAttr(e, n);
                    return
                }
                return o && "set" in o && u && (s = o.set(e, r, n)) !== t ? s : (e.setAttribute(n, r + ""), r)
            }
            return o && "get" in o && u && (s = o.get(e, n)) !== null ? s : (s = e.getAttribute(n), s === null ? t : s)
        },
        removeAttr: function(e, t) {
            var n, r, i, s, o = 0;
            if (t && e.nodeType === 1) {
                r = t.split(y);
                for (; o < r.length; o++) {
                    i = r[o], i && (n = v.propFix[i] || i, s = X.test(i), s || v.attr(e, i, ""), e.removeAttribute(V ? i : n), s && n in e && (e[n] = !1))
                }
            }
        },
        attrHooks: {
            type: {
                set: function(e, t) {
                    if (U.test(e.nodeName) && e.parentNode) {
                        v.error("type property can't be changed")
                    } else {
                        if (!v.support.radioValue && t === "radio" && v.nodeName(e, "input")) {
                            var n = e.value;
                            return e.setAttribute("type", t), n && (e.value = n), t
                        }
                    }
                }
            },
            value: {
                get: function(e, t) {
                    return j && v.nodeName(e, "button") ? j.get(e, t) : t in e ? e.value : null
                },
                set: function(e, t, n) {
                    if (j && v.nodeName(e, "button")) {
                        return j.set(e, t, n)
                    }
                    e.value = t
                }
            }
        },
        propFix: {
            tabindex: "tabIndex",
            readonly: "readOnly",
            "for": "htmlFor",
            "class": "className",
            maxlength: "maxLength",
            cellspacing: "cellSpacing",
            cellpadding: "cellPadding",
            rowspan: "rowSpan",
            colspan: "colSpan",
            usemap: "useMap",
            frameborder: "frameBorder",
            contenteditable: "contentEditable"
        },
        prop: function(e, n, r) {
            var i, s, o, u = e.nodeType;
            if (!e || u === 3 || u === 8 || u === 2) {
                return
            }
            return o = u !== 1 || !v.isXMLDoc(e), o && (n = v.propFix[n] || n, s = v.propHooks[n]), r !== t ? s && "set" in s && (i = s.set(e, r, n)) !== t ? i : e[n] = r : s && "get" in s && (i = s.get(e, n)) !== null ? i : e[n]
        },
        propHooks: {
            tabIndex: {
                get: function(e) {
                    var n = e.getAttributeNode("tabindex");
                    return n && n.specified ? parseInt(n.value, 10) : z.test(e.nodeName) || W.test(e.nodeName) && e.href ? 0 : t
                }
            }
        }
    }), F = {
        get: function(e, n) {
            var r, i = v.prop(e, n);
            return i === !0 || typeof i != "boolean" && (r = e.getAttributeNode(n)) && r.nodeValue !== !1 ? n.toLowerCase() : t
        },
        set: function(e, t, n) {
            var r;
            return t === !1 ? v.removeAttr(e, n) : (r = v.propFix[n] || n, r in e && (e[r] = !0), e.setAttribute(n, n.toLowerCase())), n
        }
    }, V || (I = {
        name: !0,
        id: !0,
        coords: !0
    }, j = v.valHooks.button = {
        get: function(e, n) {
            var r;
            return r = e.getAttributeNode(n), r && (I[n] ? r.value !== "" : r.specified) ? r.value : t
        },
        set: function(e, t, n) {
            var r = e.getAttributeNode(n);
            return r || (r = i.createAttribute(n), e.setAttributeNode(r)), r.value = t + ""
        }
    }, v.each(["width", "height"], function(e, t) {
        v.attrHooks[t] = v.extend(v.attrHooks[t], {
            set: function(e, n) {
                if (n === "") {
                    return e.setAttribute(t, "auto"), n
                }
            }
        })
    }), v.attrHooks.contenteditable = {
        get: j.get,
        set: function(e, t, n) {
            t === "" && (t = "false"), j.set(e, t, n)
        }
    }), v.support.hrefNormalized || v.each(["href", "src", "width", "height"], function(e, n) {
        v.attrHooks[n] = v.extend(v.attrHooks[n], {
            get: function(e) {
                var r = e.getAttribute(n, 2);
                return r === null ? t : r
            }
        })
    }), v.support.style || (v.attrHooks.style = {
        get: function(e) {
            return e.style.cssText.toLowerCase() || t
        },
        set: function(e, t) {
            return e.style.cssText = t + ""
        }
    }), v.support.optSelected || (v.propHooks.selected = v.extend(v.propHooks.selected, {
        get: function(e) {
            var t = e.parentNode;
            return t && (t.selectedIndex, t.parentNode && t.parentNode.selectedIndex), null
        }
    })), v.support.enctype || (v.propFix.enctype = "encoding"), v.support.checkOn || v.each(["radio", "checkbox"], function() {
        v.valHooks[this] = {
            get: function(e) {
                return e.getAttribute("value") === null ? "on" : e.value
            }
        }
    }), v.each(["radio", "checkbox"], function() {
        v.valHooks[this] = v.extend(v.valHooks[this], {
            set: function(e, t) {
                if (v.isArray(t)) {
                    return e.checked = v.inArray(v(e).val(), t) >= 0
                }
            }
        })
    });
    var $ = /^(?:textarea|input|select)$/i,
        J = /^([^\.]*|)(?:\.(.+)|)$/,
        K = /(?:^|\s)hover(\.\S+|)\b/,
        Q = /^key/,
        G = /^(?:mouse|contextmenu)|click/,
        Y = /^(?:focusinfocus|focusoutblur)$/,
        Z = function(e) {
            return v.event.special.hover ? e : e.replace(K, "mouseenter$1 mouseleave$1")
        };
    v.event = {
            add: function(e, n, r, i, s) {
                var o, u, a, f, l, c, h, p, d, m, g;
                if (e.nodeType === 3 || e.nodeType === 8 || !n || !r || !(o = v._data(e))) {
                    return
                }
                r.handler && (d = r, r = d.handler, s = d.selector), r.guid || (r.guid = v.guid++), a = o.events, a || (o.events = a = {}), u = o.handle, u || (o.handle = u = function(e) {
                    return typeof v == "undefined" || !!e && v.event.triggered === e.type ? t : v.event.dispatch.apply(u.elem, arguments)
                }, u.elem = e), n = v.trim(Z(n)).split(" ");
                for (f = 0; f < n.length; f++) {
                    l = J.exec(n[f]) || [], c = l[1], h = (l[2] || "").split(".").sort(), g = v.event.special[c] || {}, c = (s ? g.delegateType : g.bindType) || c, g = v.event.special[c] || {}, p = v.extend({
                        type: c,
                        origType: l[1],
                        data: i,
                        handler: r,
                        guid: r.guid,
                        selector: s,
                        needsContext: s && v.expr.match.needsContext.test(s),
                        namespace: h.join(".")
                    }, d), m = a[c];
                    if (!m) {
                        m = a[c] = [], m.delegateCount = 0;
                        if (!g.setup || g.setup.call(e, i, h, u) === !1) {
                            e.addEventListener ? e.addEventListener(c, u, !1) : e.attachEvent && e.attachEvent("on" + c, u)
                        }
                    }
                    g.add && (g.add.call(e, p), p.handler.guid || (p.handler.guid = r.guid)), s ? m.splice(m.delegateCount++, 0, p) : m.push(p), v.event.global[c] = !0
                }
                e = null
            },
            global: {},
            remove: function(e, t, n, r, i) {
                var s, o, u, a, f, l, c, h, p, d, m, g = v.hasData(e) && v._data(e);
                if (!g || !(h = g.events)) {
                    return
                }
                t = v.trim(Z(t || "")).split(" ");
                for (s = 0; s < t.length; s++) {
                    o = J.exec(t[s]) || [], u = a = o[1], f = o[2];
                    if (!u) {
                        for (u in h) {
                            v.event.remove(e, u + t[s], n, r, !0)
                        }
                        continue
                    }
                    p = v.event.special[u] || {}, u = (r ? p.delegateType : p.bindType) || u, d = h[u] || [], l = d.length, f = f ? new RegExp("(^|\\.)" + f.split(".").sort().join("\\.(?:.*\\.|)") + "(\\.|$)") : null;
                    for (c = 0; c < d.length; c++) {
                        m = d[c], (i || a === m.origType) && (!n || n.guid === m.guid) && (!f || f.test(m.namespace)) && (!r || r === m.selector || r === "**" && m.selector) && (d.splice(c--, 1), m.selector && d.delegateCount--, p.remove && p.remove.call(e, m))
                    }
                    d.length === 0 && l !== d.length && ((!p.teardown || p.teardown.call(e, f, g.handle) === !1) && v.removeEvent(e, u, g.handle), delete h[u])
                }
                v.isEmptyObject(h) && (delete g.handle, v.removeData(e, "events", !0))
            },
            customEvent: {
                getData: !0,
                setData: !0,
                changeData: !0
            },
            trigger: function(n, r, s, o) {
                if (!s || s.nodeType !== 3 && s.nodeType !== 8) {
                    var u, a, f, l, c, h, p, d, m, g, y = n.type || n,
                        b = [];
                    if (Y.test(y + v.event.triggered)) {
                        return
                    }
                    y.indexOf("!") >= 0 && (y = y.slice(0, -1), a = !0), y.indexOf(".") >= 0 && (b = y.split("."), y = b.shift(), b.sort());
                    if ((!s || v.event.customEvent[y]) && !v.event.global[y]) {
                        return
                    }
                    n = typeof n == "object" ? n[v.expando] ? n : new v.Event(y, n) : new v.Event(y), n.type = y, n.isTrigger = !0, n.exclusive = a, n.namespace = b.join("."), n.namespace_re = n.namespace ? new RegExp("(^|\\.)" + b.join("\\.(?:.*\\.|)") + "(\\.|$)") : null, h = y.indexOf(":") < 0 ? "on" + y : "";
                    if (!s) {
                        u = v.cache;
                        for (f in u) {
                            u[f].events && u[f].events[y] && v.event.trigger(n, r, u[f].handle.elem, !0)
                        }
                        return
                    }
                    n.result = t, n.target || (n.target = s), r = r != null ? v.makeArray(r) : [], r.unshift(n), p = v.event.special[y] || {};
                    if (p.trigger && p.trigger.apply(s, r) === !1) {
                        return
                    }
                    m = [
                        [s, p.bindType || y]
                    ];
                    if (!o && !p.noBubble && !v.isWindow(s)) {
                        g = p.delegateType || y, l = Y.test(g + y) ? s : s.parentNode;
                        for (c = s; l; l = l.parentNode) {
                            m.push([l, g]), c = l
                        }
                        c === (s.ownerDocument || i) && m.push([c.defaultView || c.parentWindow || e, g])
                    }
                    for (f = 0; f < m.length && !n.isPropagationStopped(); f++) {
                        l = m[f][0], n.type = m[f][1], d = (v._data(l, "events") || {})[n.type] && v._data(l, "handle"), d && d.apply(l, r), d = h && l[h], d && v.acceptData(l) && d.apply && d.apply(l, r) === !1 && n.preventDefault()
                    }
                    return n.type = y, !o && !n.isDefaultPrevented() && (!p._default || p._default.apply(s.ownerDocument, r) === !1) && (y !== "click" || !v.nodeName(s, "a")) && v.acceptData(s) && h && s[y] && (y !== "focus" && y !== "blur" || n.target.offsetWidth !== 0) && !v.isWindow(s) && (c = s[h], c && (s[h] = null), v.event.triggered = y, s[y](), v.event.triggered = t, c && (s[h] = c)), n.result
                }
                return
            },
            dispatch: function(n) {
                n = v.event.fix(n || e.event);
                var r, i, s, o, u, a, f, c, h, p, d = (v._data(this, "events") || {})[n.type] || [],
                    m = d.delegateCount,
                    g = l.call(arguments),
                    y = !n.exclusive && !n.namespace,
                    b = v.event.special[n.type] || {},
                    w = [];
                g[0] = n, n.delegateTarget = this;
                if (b.preDispatch && b.preDispatch.call(this, n) === !1) {
                    return
                }
                if (m && (!n.button || n.type !== "click")) {
                    for (s = n.target; s != this; s = s.parentNode || this) {
                        if (s.disabled !== !0 || n.type !== "click") {
                            u = {}, f = [];
                            for (r = 0; r < m; r++) {
                                c = d[r], h = c.selector, u[h] === t && (u[h] = c.needsContext ? v(h, this).index(s) >= 0 : v.find(h, this, null, [s]).length), u[h] && f.push(c)
                            }
                            f.length && w.push({
                                elem: s,
                                matches: f
                            })
                        }
                    }
                }
                d.length > m && w.push({
                    elem: this,
                    matches: d.slice(m)
                });
                for (r = 0; r < w.length && !n.isPropagationStopped(); r++) {
                    a = w[r], n.currentTarget = a.elem;
                    for (i = 0; i < a.matches.length && !n.isImmediatePropagationStopped(); i++) {
                        c = a.matches[i];
                        if (y || !n.namespace && !c.namespace || n.namespace_re && n.namespace_re.test(c.namespace)) {
                            n.data = c.data, n.handleObj = c, o = ((v.event.special[c.origType] || {}).handle || c.handler).apply(a.elem, g), o !== t && (n.result = o, o === !1 && (n.preventDefault(), n.stopPropagation()))
                        }
                    }
                }
                return b.postDispatch && b.postDispatch.call(this, n), n.result
            },
            props: "attrChange attrName relatedNode srcElement altKey bubbles cancelable ctrlKey currentTarget eventPhase metaKey relatedTarget shiftKey target timeStamp view which".split(" "),
            fixHooks: {},
            keyHooks: {
                props: "char charCode key keyCode".split(" "),
                filter: function(e, t) {
                    return e.which == null && (e.which = t.charCode != null ? t.charCode : t.keyCode), e
                }
            },
            mouseHooks: {
                props: "button buttons clientX clientY fromElement offsetX offsetY pageX pageY screenX screenY toElement".split(" "),
                filter: function(e, n) {
                    var r, s, o, u = n.button,
                        a = n.fromElement;
                    return e.pageX == null && n.clientX != null && (r = e.target.ownerDocument || i, s = r.documentElement, o = r.body, e.pageX = n.clientX + (s && s.scrollLeft || o && o.scrollLeft || 0) - (s && s.clientLeft || o && o.clientLeft || 0), e.pageY = n.clientY + (s && s.scrollTop || o && o.scrollTop || 0) - (s && s.clientTop || o && o.clientTop || 0)), !e.relatedTarget && a && (e.relatedTarget = a === e.target ? n.toElement : a), !e.which && u !== t && (e.which = u & 1 ? 1 : u & 2 ? 3 : u & 4 ? 2 : 0), e
                }
            },
            fix: function(e) {
                if (e[v.expando]) {
                    return e
                }
                var t, n, r = e,
                    s = v.event.fixHooks[e.type] || {},
                    o = s.props ? this.props.concat(s.props) : this.props;
                e = v.Event(r);
                for (t = o.length; t;) {
                    n = o[--t], e[n] = r[n]
                }
                return e.target || (e.target = r.srcElement || i), e.target.nodeType === 3 && (e.target = e.target.parentNode), e.metaKey = !!e.metaKey, s.filter ? s.filter(e, r) : e
            },
            special: {
                load: {
                    noBubble: !0
                },
                focus: {
                    delegateType: "focusin"
                },
                blur: {
                    delegateType: "focusout"
                },
                beforeunload: {
                    setup: function(e, t, n) {
                        v.isWindow(this) && (this.onbeforeunload = n)
                    },
                    teardown: function(e, t) {
                        this.onbeforeunload === t && (this.onbeforeunload = null)
                    }
                }
            },
            simulate: function(e, t, n, r) {
                var i = v.extend(new v.Event, n, {
                    type: e,
                    isSimulated: !0,
                    originalEvent: {}
                });
                r ? v.event.trigger(i, null, t) : v.event.dispatch.call(t, i), i.isDefaultPrevented() && n.preventDefault()
            }
        }, v.event.handle = v.event.dispatch, v.removeEvent = i.removeEventListener ? function(e, t, n) {
            e.removeEventListener && e.removeEventListener(t, n, !1)
        } : function(e, t, n) {
            var r = "on" + t;
            e.detachEvent && (typeof e[r] == "undefined" && (e[r] = null), e.detachEvent(r, n))
        }, v.Event = function(e, t) {
            if (!(this instanceof v.Event)) {
                return new v.Event(e, t)
            }
            e && e.type ? (this.originalEvent = e, this.type = e.type, this.isDefaultPrevented = e.defaultPrevented || e.returnValue === !1 || e.getPreventDefault && e.getPreventDefault() ? tt : et) : this.type = e, t && v.extend(this, t), this.timeStamp = e && e.timeStamp || v.now(), this[v.expando] = !0
        }, v.Event.prototype = {
            preventDefault: function() {
                this.isDefaultPrevented = tt;
                var e = this.originalEvent;
                if (!e) {
                    return
                }
                e.preventDefault ? e.preventDefault() : e.returnValue = !1
            },
            stopPropagation: function() {
                this.isPropagationStopped = tt;
                var e = this.originalEvent;
                if (!e) {
                    return
                }
                e.stopPropagation && e.stopPropagation(), e.cancelBubble = !0
            },
            stopImmediatePropagation: function() {
                this.isImmediatePropagationStopped = tt, this.stopPropagation()
            },
            isDefaultPrevented: et,
            isPropagationStopped: et,
            isImmediatePropagationStopped: et
        }, v.each({
            mouseenter: "mouseover",
            mouseleave: "mouseout"
        }, function(e, t) {
            v.event.special[e] = {
                delegateType: t,
                bindType: t,
                handle: function(e) {
                    var n, r = this,
                        i = e.relatedTarget,
                        s = e.handleObj,
                        o = s.selector;
                    if (!i || i !== r && !v.contains(r, i)) {
                        e.type = s.origType, n = s.handler.apply(this, arguments), e.type = t
                    }
                    return n
                }
            }
        }), v.support.submitBubbles || (v.event.special.submit = {
            setup: function() {
                if (v.nodeName(this, "form")) {
                    return !1
                }
                v.event.add(this, "click._submit keypress._submit", function(e) {
                    var n = e.target,
                        r = v.nodeName(n, "input") || v.nodeName(n, "button") ? n.form : t;
                    r && !v._data(r, "_submit_attached") && (v.event.add(r, "submit._submit", function(e) {
                        e._submit_bubble = !0
                    }), v._data(r, "_submit_attached", !0))
                })
            },
            postDispatch: function(e) {
                e._submit_bubble && (delete e._submit_bubble, this.parentNode && !e.isTrigger && v.event.simulate("submit", this.parentNode, e, !0))
            },
            teardown: function() {
                if (v.nodeName(this, "form")) {
                    return !1
                }
                v.event.remove(this, "._submit")
            }
        }), v.support.changeBubbles || (v.event.special.change = {
            setup: function() {
                if ($.test(this.nodeName)) {
                    if (this.type === "checkbox" || this.type === "radio") {
                        v.event.add(this, "propertychange._change", function(e) {
                            e.originalEvent.propertyName === "checked" && (this._just_changed = !0)
                        }), v.event.add(this, "click._change", function(e) {
                            this._just_changed && !e.isTrigger && (this._just_changed = !1), v.event.simulate("change", this, e, !0)
                        })
                    }
                    return !1
                }
                v.event.add(this, "beforeactivate._change", function(e) {
                    var t = e.target;
                    $.test(t.nodeName) && !v._data(t, "_change_attached") && (v.event.add(t, "change._change", function(e) {
                        this.parentNode && !e.isSimulated && !e.isTrigger && v.event.simulate("change", this.parentNode, e, !0)
                    }), v._data(t, "_change_attached", !0))
                })
            },
            handle: function(e) {
                var t = e.target;
                if (this !== t || e.isSimulated || e.isTrigger || t.type !== "radio" && t.type !== "checkbox") {
                    return e.handleObj.handler.apply(this, arguments)
                }
            },
            teardown: function() {
                return v.event.remove(this, "._change"), !$.test(this.nodeName)
            }
        }), v.support.focusinBubbles || v.each({
            focus: "focusin",
            blur: "focusout"
        }, function(e, t) {
            var n = 0,
                r = function(e) {
                    v.event.simulate(t, e.target, v.event.fix(e), !0)
                };
            v.event.special[t] = {
                setup: function() {
                    n++ === 0 && i.addEventListener(e, r, !0)
                },
                teardown: function() {
                    --n === 0 && i.removeEventListener(e, r, !0)
                }
            }
        }), v.fn.extend({
            on: function(e, n, r, i, s) {
                var o, u;
                if (typeof e == "object") {
                    typeof n != "string" && (r = r || n, n = t);
                    for (u in e) {
                        this.on(u, n, r, e[u], s)
                    }
                    return this
                }
                r == null && i == null ? (i = n, r = n = t) : i == null && (typeof n == "string" ? (i = r, r = t) : (i = r, r = n, n = t));
                if (i === !1) {
                    i = et
                } else {
                    if (!i) {
                        return this
                    }
                }
                return s === 1 && (o = i, i = function(e) {
                    return v().off(e), o.apply(this, arguments)
                }, i.guid = o.guid || (o.guid = v.guid++)), this.each(function() {
                    v.event.add(this, e, i, r, n)
                })
            },
            one: function(e, t, n, r) {
                return this.on(e, t, n, r, 1)
            },
            off: function(e, n, r) {
                var i, s;
                if (e && e.preventDefault && e.handleObj) {
                    return i = e.handleObj, v(e.delegateTarget).off(i.namespace ? i.origType + "." + i.namespace : i.origType, i.selector, i.handler), this
                }
                if (typeof e == "object") {
                    for (s in e) {
                        this.off(s, n, e[s])
                    }
                    return this
                }
                if (n === !1 || typeof n == "function") {
                    r = n, n = t
                }
                return r === !1 && (r = et), this.each(function() {
                    v.event.remove(this, e, r, n)
                })
            },
            bind: function(e, t, n) {
                return this.on(e, null, t, n)
            },
            unbind: function(e, t) {
                return this.off(e, null, t)
            },
            live: function(e, t, n) {
                return v(this.context).on(e, this.selector, t, n), this
            },
            die: function(e, t) {
                return v(this.context).off(e, this.selector || "**", t), this
            },
            delegate: function(e, t, n, r) {
                return this.on(t, e, n, r)
            },
            undelegate: function(e, t, n) {
                return arguments.length === 1 ? this.off(e, "**") : this.off(t, e || "**", n)
            },
            trigger: function(e, t) {
                return this.each(function() {
                    v.event.trigger(e, t, this)
                })
            },
            triggerHandler: function(e, t) {
                if (this[0]) {
                    return v.event.trigger(e, t, this[0], !0)
                }
            },
            toggle: function(e) {
                var t = arguments,
                    n = e.guid || v.guid++,
                    r = 0,
                    i = function(n) {
                        var i = (v._data(this, "lastToggle" + e.guid) || 0) % r;
                        return v._data(this, "lastToggle" + e.guid, i + 1), n.preventDefault(), t[i].apply(this, arguments) || !1
                    };
                i.guid = n;
                while (r < t.length) {
                    t[r++].guid = n
                }
                return this.click(i)
            },
            hover: function(e, t) {
                return this.mouseenter(e).mouseleave(t || e)
            }
        }), v.each("blur focus focusin focusout load resize scroll unload click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup error contextmenu".split(" "), function(e, t) {
            v.fn[t] = function(e, n) {
                return n == null && (n = e, e = null), arguments.length > 0 ? this.on(t, null, e, n) : this.trigger(t)
            }, Q.test(t) && (v.event.fixHooks[t] = v.event.keyHooks), G.test(t) && (v.event.fixHooks[t] = v.event.mouseHooks)
        }),
        function(e, t) {
            function nt(e, t, n, r) {
                n = n || [], t = t || g;
                var i, s, a, f, l = t.nodeType;
                if (!e || typeof e != "string") {
                    return n
                }
                if (l !== 1 && l !== 9) {
                    return []
                }
                a = o(t);
                if (!a && !r) {
                    if (i = R.exec(e)) {
                        if (f = i[1]) {
                            if (l === 9) {
                                s = t.getElementById(f);
                                if (!s || !s.parentNode) {
                                    return n
                                }
                                if (s.id === f) {
                                    return n.push(s), n
                                }
                            } else {
                                if (t.ownerDocument && (s = t.ownerDocument.getElementById(f)) && u(t, s) && s.id === f) {
                                    return n.push(s), n
                                }
                            }
                        } else {
                            if (i[2]) {
                                return S.apply(n, x.call(t.getElementsByTagName(e), 0)), n
                            }
                            if ((f = i[3]) && Z && t.getElementsByClassName) {
                                return S.apply(n, x.call(t.getElementsByClassName(f), 0)), n
                            }
                        }
                    }
                }
                return vt(e.replace(j, "$1"), t, n, r, a)
            }

            function rt(e) {
                return function(t) {
                    var n = t.nodeName.toLowerCase();
                    return n === "input" && t.type === e
                }
            }

            function it(e) {
                return function(t) {
                    var n = t.nodeName.toLowerCase();
                    return (n === "input" || n === "button") && t.type === e
                }
            }

            function st(e) {
                return N(function(t) {
                    return t = +t, N(function(n, r) {
                        var i, s = e([], n.length, t),
                            o = s.length;
                        while (o--) {
                            n[i = s[o]] && (n[i] = !(r[i] = n[i]))
                        }
                    })
                })
            }

            function ot(e, t, n) {
                if (e === t) {
                    return n
                }
                var r = e.nextSibling;
                while (r) {
                    if (r === t) {
                        return -1
                    }
                    r = r.nextSibling
                }
                return 1
            }

            function ut(e, t) {
                var n, r, s, o, u, a, f, l = L[d][e + " "];
                if (l) {
                    return t ? 0 : l.slice(0)
                }
                u = e, a = [], f = i.preFilter;
                while (u) {
                    if (!n || (r = F.exec(u))) {
                        r && (u = u.slice(r[0].length) || u), a.push(s = [])
                    }
                    n = !1;
                    if (r = I.exec(u)) {
                        s.push(n = new m(r.shift())), u = u.slice(n.length), n.type = r[0].replace(j, " ")
                    }
                    for (o in i.filter) {
                        (r = J[o].exec(u)) && (!f[o] || (r = f[o](r))) && (s.push(n = new m(r.shift())), u = u.slice(n.length), n.type = o, n.matches = r)
                    }
                    if (!n) {
                        break
                    }
                }
                return t ? u.length : u ? nt.error(e) : L(e, a).slice(0)
            }

            function at(e, t, r) {
                var i = t.dir,
                    s = r && t.dir === "parentNode",
                    o = w++;
                return t.first ? function(t, n, r) {
                    while (t = t[i]) {
                        if (s || t.nodeType === 1) {
                            return e(t, n, r)
                        }
                    }
                } : function(t, r, u) {
                    if (!u) {
                        var a, f = b + " " + o + " ",
                            l = f + n;
                        while (t = t[i]) {
                            if (s || t.nodeType === 1) {
                                if ((a = t[d]) === l) {
                                    return t.sizset
                                }
                                if (typeof a == "string" && a.indexOf(f) === 0) {
                                    if (t.sizset) {
                                        return t
                                    }
                                } else {
                                    t[d] = l;
                                    if (e(t, r, u)) {
                                        return t.sizset = !0, t
                                    }
                                    t.sizset = !1
                                }
                            }
                        }
                    } else {
                        while (t = t[i]) {
                            if (s || t.nodeType === 1) {
                                if (e(t, r, u)) {
                                    return t
                                }
                            }
                        }
                    }
                }
            }

            function ft(e) {
                return e.length > 1 ? function(t, n, r) {
                    var i = e.length;
                    while (i--) {
                        if (!e[i](t, n, r)) {
                            return !1
                        }
                    }
                    return !0
                } : e[0]
            }

            function lt(e, t, n, r, i) {
                var s, o = [],
                    u = 0,
                    a = e.length,
                    f = t != null;
                for (; u < a; u++) {
                    if (s = e[u]) {
                        if (!n || n(s, r, i)) {
                            o.push(s), f && t.push(u)
                        }
                    }
                }
                return o
            }

            function ct(e, t, n, r, i, s) {
                return r && !r[d] && (r = ct(r)), i && !i[d] && (i = ct(i, s)), N(function(s, o, u, a) {
                    var f, l, c, h = [],
                        p = [],
                        d = o.length,
                        v = s || dt(t || "*", u.nodeType ? [u] : u, []),
                        m = e && (s || !t) ? lt(v, h, e, u, a) : v,
                        g = n ? i || (s ? e : d || r) ? [] : o : m;
                    n && n(m, g, u, a);
                    if (r) {
                        f = lt(g, p), r(f, [], u, a), l = f.length;
                        while (l--) {
                            if (c = f[l]) {
                                g[p[l]] = !(m[p[l]] = c)
                            }
                        }
                    }
                    if (s) {
                        if (i || e) {
                            if (i) {
                                f = [], l = g.length;
                                while (l--) {
                                    (c = g[l]) && f.push(m[l] = c)
                                }
                                i(null, g = [], f, a)
                            }
                            l = g.length;
                            while (l--) {
                                (c = g[l]) && (f = i ? T.call(s, c) : h[l]) > -1 && (s[f] = !(o[f] = c))
                            }
                        }
                    } else {
                        g = lt(g === o ? g.splice(d, g.length) : g), i ? i(null, o, g, a) : S.apply(o, g)
                    }
                })
            }

            function ht(e) {
                var t, n, r, s = e.length,
                    o = i.relative[e[0].type],
                    u = o || i.relative[" "],
                    a = o ? 1 : 0,
                    f = at(function(e) {
                        return e === t
                    }, u, !0),
                    l = at(function(e) {
                        return T.call(t, e) > -1
                    }, u, !0),
                    h = [function(e, n, r) {
                        return !o && (r || n !== c) || ((t = n).nodeType ? f(e, n, r) : l(e, n, r))
                    }];
                for (; a < s; a++) {
                    if (n = i.relative[e[a].type]) {
                        h = [at(ft(h), n)]
                    } else {
                        n = i.filter[e[a].type].apply(null, e[a].matches);
                        if (n[d]) {
                            r = ++a;
                            for (; r < s; r++) {
                                if (i.relative[e[r].type]) {
                                    break
                                }
                            }
                            return ct(a > 1 && ft(h), a > 1 && e.slice(0, a - 1).join("").replace(j, "$1"), n, a < r && ht(e.slice(a, r)), r < s && ht(e = e.slice(r)), r < s && e.join(""))
                        }
                        h.push(n)
                    }
                }
                return ft(h)
            }

            function pt(e, t) {
                var r = t.length > 0,
                    s = e.length > 0,
                    o = function(u, a, f, l, h) {
                        var p, d, v, m = [],
                            y = 0,
                            w = "0",
                            x = u && [],
                            T = h != null,
                            N = c,
                            C = u || s && i.find.TAG("*", h && a.parentNode || a),
                            k = b += N == null ? 1 : Math.E;
                        T && (c = a !== g && a, n = o.el);
                        for (;
                            (p = C[w]) != null; w++) {
                            if (s && p) {
                                for (d = 0; v = e[d]; d++) {
                                    if (v(p, a, f)) {
                                        l.push(p);
                                        break
                                    }
                                }
                                T && (b = k, n = ++o.el)
                            }
                            r && ((p = !v && p) && y--, u && x.push(p))
                        }
                        y += w;
                        if (r && w !== y) {
                            for (d = 0; v = t[d]; d++) {
                                v(x, m, a, f)
                            }
                            if (u) {
                                if (y > 0) {
                                    while (w--) {
                                        !x[w] && !m[w] && (m[w] = E.call(l))
                                    }
                                }
                                m = lt(m)
                            }
                            S.apply(l, m), T && !u && m.length > 0 && y + t.length > 1 && nt.uniqueSort(l)
                        }
                        return T && (b = k, c = N), x
                    };
                return o.el = 0, r ? N(o) : o
            }

            function dt(e, t, n) {
                var r = 0,
                    i = t.length;
                for (; r < i; r++) {
                    nt(e, t[r], n)
                }
                return n
            }

            function vt(e, t, n, r, s) {
                var o, u, f, l, c, h = ut(e),
                    p = h.length;
                if (!r && h.length === 1) {
                    u = h[0] = h[0].slice(0);
                    if (u.length > 2 && (f = u[0]).type === "ID" && t.nodeType === 9 && !s && i.relative[u[1].type]) {
                        t = i.find.ID(f.matches[0].replace($, ""), t, s)[0];
                        if (!t) {
                            return n
                        }
                        e = e.slice(u.shift().length)
                    }
                    for (o = J.POS.test(e) ? -1 : u.length - 1; o >= 0; o--) {
                        f = u[o];
                        if (i.relative[l = f.type]) {
                            break
                        }
                        if (c = i.find[l]) {
                            if (r = c(f.matches[0].replace($, ""), z.test(u[0].type) && t.parentNode || t, s)) {
                                u.splice(o, 1), e = r.length && u.join("");
                                if (!e) {
                                    return S.apply(n, x.call(r, 0)), n
                                }
                                break
                            }
                        }
                    }
                }
                return a(e, h)(r, t, s, n, z.test(e)), n
            }

            function mt() {}
            var n, r, i, s, o, u, a, f, l, c, h = !0,
                p = "undefined",
                d = ("sizcache" + Math.random()).replace(".", ""),
                m = String,
                g = e.document,
                y = g.documentElement,
                b = 0,
                w = 0,
                E = [].pop,
                S = [].push,
                x = [].slice,
                T = [].indexOf || function(e) {
                    var t = 0,
                        n = this.length;
                    for (; t < n; t++) {
                        if (this[t] === e) {
                            return t
                        }
                    }
                    return -1
                },
                N = function(e, t) {
                    return e[d] = t == null || t, e
                },
                C = function() {
                    var e = {},
                        t = [];
                    return N(function(n, r) {
                        return t.push(n) > i.cacheLength && delete e[t.shift()], e[n + " "] = r
                    }, e)
                },
                k = C(),
                L = C(),
                A = C(),
                O = "[\\x20\\t\\r\\n\\f]",
                M = "(?:\\\\.|[-\\w]|[^\\x00-\\xa0])+",
                _ = M.replace("w", "w#"),
                D = "([*^$|!~]?=)",
                P = "\\[" + O + "*(" + M + ")" + O + "*(?:" + D + O + "*(?:(['\"])((?:\\\\.|[^\\\\])*?)\\3|(" + _ + ")|)|)" + O + "*\\]",
                H = ":(" + M + ")(?:\\((?:(['\"])((?:\\\\.|[^\\\\])*?)\\2|([^()[\\]]*|(?:(?:" + P + ")|[^:]|\\\\.)*|.*))\\)|)",
                B = ":(even|odd|eq|gt|lt|nth|first|last)(?:\\(" + O + "*((?:-\\d)?\\d*)" + O + "*\\)|)(?=[^-]|$)",
                j = new RegExp("^" + O + "+|((?:^|[^\\\\])(?:\\\\.)*)" + O + "+$", "g"),
                F = new RegExp("^" + O + "*," + O + "*"),
                I = new RegExp("^" + O + "*([\\x20\\t\\r\\n\\f>+~])" + O + "*"),
                q = new RegExp(H),
                R = /^(?:#([\w\-]+)|(\w+)|\.([\w\-]+))$/,
                U = /^:not/,
                z = /[\x20\t\r\n\f]*[+~]/,
                W = /:not\($/,
                X = /h\d/i,
                V = /input|select|textarea|button/i,
                $ = /\\(?!\\)/g,
                J = {
                    ID: new RegExp("^#(" + M + ")"),
                    CLASS: new RegExp("^\\.(" + M + ")"),
                    NAME: new RegExp("^\\[name=['\"]?(" + M + ")['\"]?\\]"),
                    TAG: new RegExp("^(" + M.replace("w", "w*") + ")"),
                    ATTR: new RegExp("^" + P),
                    PSEUDO: new RegExp("^" + H),
                    POS: new RegExp(B, "i"),
                    CHILD: new RegExp("^:(only|nth|first|last)-child(?:\\(" + O + "*(even|odd|(([+-]|)(\\d*)n|)" + O + "*(?:([+-]|)" + O + "*(\\d+)|))" + O + "*\\)|)", "i"),
                    needsContext: new RegExp("^" + O + "*[>+~]|" + B, "i")
                },
                K = function(e) {
                    var t = g.createElement("div");
                    try {
                        return e(t)
                    } catch (n) {
                        return !1
                    } finally {
                        t = null
                    }
                },
                Q = K(function(e) {
                    return e.appendChild(g.createComment("")), !e.getElementsByTagName("*").length
                }),
                G = K(function(e) {
                    return e.innerHTML = "<a href='#'></a>", e.firstChild && typeof e.firstChild.getAttribute !== p && e.firstChild.getAttribute("href") === "#"
                }),
                Y = K(function(e) {
                    e.innerHTML = "<select></select>";
                    var t = typeof e.lastChild.getAttribute("multiple");
                    return t !== "boolean" && t !== "string"
                }),
                Z = K(function(e) {
                    return e.innerHTML = "<div class='hidden e'></div><div class='hidden'></div>", !e.getElementsByClassName || !e.getElementsByClassName("e").length ? !1 : (e.lastChild.className = "e", e.getElementsByClassName("e").length === 2)
                }),
                et = K(function(e) {
                    e.id = d + 0, e.innerHTML = "<a name='" + d + "'></a><div name='" + d + "'></div>", y.insertBefore(e, y.firstChild);
                    var t = g.getElementsByName && g.getElementsByName(d).length === 2 + g.getElementsByName(d + 0).length;
                    return r = !g.getElementById(d), y.removeChild(e), t
                });
            try {
                x.call(y.childNodes, 0)[0].nodeType
            } catch (tt) {
                x = function(e) {
                    var t, n = [];
                    for (; t = this[e]; e++) {
                        n.push(t)
                    }
                    return n
                }
            }
            nt.matches = function(e, t) {
                return nt(e, null, null, t)
            }, nt.matchesSelector = function(e, t) {
                return nt(t, null, null, [e]).length > 0
            }, s = nt.getText = function(e) {
                var t, n = "",
                    r = 0,
                    i = e.nodeType;
                if (i) {
                    if (i === 1 || i === 9 || i === 11) {
                        if (typeof e.textContent == "string") {
                            return e.textContent
                        }
                        for (e = e.firstChild; e; e = e.nextSibling) {
                            n += s(e)
                        }
                    } else {
                        if (i === 3 || i === 4) {
                            return e.nodeValue
                        }
                    }
                } else {
                    for (; t = e[r]; r++) {
                        n += s(t)
                    }
                }
                return n
            }, o = nt.isXML = function(e) {
                var t = e && (e.ownerDocument || e).documentElement;
                return t ? t.nodeName !== "HTML" : !1
            }, u = nt.contains = y.contains ? function(e, t) {
                var n = e.nodeType === 9 ? e.documentElement : e,
                    r = t && t.parentNode;
                return e === r || !!(r && r.nodeType === 1 && n.contains && n.contains(r))
            } : y.compareDocumentPosition ? function(e, t) {
                return t && !!(e.compareDocumentPosition(t) & 16)
            } : function(e, t) {
                while (t = t.parentNode) {
                    if (t === e) {
                        return !0
                    }
                }
                return !1
            }, nt.attr = function(e, t) {
                var n, r = o(e);
                return r || (t = t.toLowerCase()), (n = i.attrHandle[t]) ? n(e) : r || Y ? e.getAttribute(t) : (n = e.getAttributeNode(t), n ? typeof e[t] == "boolean" ? e[t] ? t : null : n.specified ? n.value : null : null)
            }, i = nt.selectors = {
                cacheLength: 50,
                createPseudo: N,
                match: J,
                attrHandle: G ? {} : {
                    href: function(e) {
                        return e.getAttribute("href", 2)
                    },
                    type: function(e) {
                        return e.getAttribute("type")
                    }
                },
                find: {
                    ID: r ? function(e, t, n) {
                        if (typeof t.getElementById !== p && !n) {
                            var r = t.getElementById(e);
                            return r && r.parentNode ? [r] : []
                        }
                    } : function(e, n, r) {
                        if (typeof n.getElementById !== p && !r) {
                            var i = n.getElementById(e);
                            return i ? i.id === e || typeof i.getAttributeNode !== p && i.getAttributeNode("id").value === e ? [i] : t : []
                        }
                    },
                    TAG: Q ? function(e, t) {
                        if (typeof t.getElementsByTagName !== p) {
                            return t.getElementsByTagName(e)
                        }
                    } : function(e, t) {
                        var n = t.getElementsByTagName(e);
                        if (e === "*") {
                            var r, i = [],
                                s = 0;
                            for (; r = n[s]; s++) {
                                r.nodeType === 1 && i.push(r)
                            }
                            return i
                        }
                        return n
                    },
                    NAME: et && function(e, t) {
                        if (typeof t.getElementsByName !== p) {
                            return t.getElementsByName(name)
                        }
                    },
                    CLASS: Z && function(e, t, n) {
                        if (typeof t.getElementsByClassName !== p && !n) {
                            return t.getElementsByClassName(e)
                        }
                    }
                },
                relative: {
                    ">": {
                        dir: "parentNode",
                        first: !0
                    },
                    " ": {
                        dir: "parentNode"
                    },
                    "+": {
                        dir: "previousSibling",
                        first: !0
                    },
                    "~": {
                        dir: "previousSibling"
                    }
                },
                preFilter: {
                    ATTR: function(e) {
                        return e[1] = e[1].replace($, ""), e[3] = (e[4] || e[5] || "").replace($, ""), e[2] === "~=" && (e[3] = " " + e[3] + " "), e.slice(0, 4)
                    },
                    CHILD: function(e) {
                        return e[1] = e[1].toLowerCase(), e[1] === "nth" ? (e[2] || nt.error(e[0]), e[3] = +(e[3] ? e[4] + (e[5] || 1) : 2 * (e[2] === "even" || e[2] === "odd")), e[4] = +(e[6] + e[7] || e[2] === "odd")) : e[2] && nt.error(e[0]), e
                    },
                    PSEUDO: function(e) {
                        var t, n;
                        if (J.CHILD.test(e[0])) {
                            return null
                        }
                        if (e[3]) {
                            e[2] = e[3]
                        } else {
                            if (t = e[4]) {
                                q.test(t) && (n = ut(t, !0)) && (n = t.indexOf(")", t.length - n) - t.length) && (t = t.slice(0, n), e[0] = e[0].slice(0, n)), e[2] = t
                            }
                        }
                        return e.slice(0, 3)
                    }
                },
                filter: {
                    ID: r ? function(e) {
                        return e = e.replace($, ""),
                            function(t) {
                                return t.getAttribute("id") === e
                            }
                    } : function(e) {
                        return e = e.replace($, ""),
                            function(t) {
                                var n = typeof t.getAttributeNode !== p && t.getAttributeNode("id");
                                return n && n.value === e
                            }
                    },
                    TAG: function(e) {
                        return e === "*" ? function() {
                            return !0
                        } : (e = e.replace($, "").toLowerCase(), function(t) {
                            return t.nodeName && t.nodeName.toLowerCase() === e
                        })
                    },
                    CLASS: function(e) {
                        var t = k[d][e + " "];
                        return t || (t = new RegExp("(^|" + O + ")" + e + "(" + O + "|$)")) && k(e, function(e) {
                            return t.test(e.className || typeof e.getAttribute !== p && e.getAttribute("class") || "")
                        })
                    },
                    ATTR: function(e, t, n) {
                        return function(r, i) {
                            var s = nt.attr(r, e);
                            return s == null ? t === "!=" : t ? (s += "", t === "=" ? s === n : t === "!=" ? s !== n : t === "^=" ? n && s.indexOf(n) === 0 : t === "*=" ? n && s.indexOf(n) > -1 : t === "$=" ? n && s.substr(s.length - n.length) === n : t === "~=" ? (" " + s + " ").indexOf(n) > -1 : t === "|=" ? s === n || s.substr(0, n.length + 1) === n + "-" : !1) : !0
                        }
                    },
                    CHILD: function(e, t, n, r) {
                        return e === "nth" ? function(e) {
                            var t, i, s = e.parentNode;
                            if (n === 1 && r === 0) {
                                return !0
                            }
                            if (s) {
                                i = 0;
                                for (t = s.firstChild; t; t = t.nextSibling) {
                                    if (t.nodeType === 1) {
                                        i++;
                                        if (e === t) {
                                            break
                                        }
                                    }
                                }
                            }
                            return i -= r, i === n || i % n === 0 && i / n >= 0
                        } : function(t) {
                            var n = t;
                            switch (e) {
                                case "only":
                                case "first":
                                    while (n = n.previousSibling) {
                                        if (n.nodeType === 1) {
                                            return !1
                                        }
                                    }
                                    if (e === "first") {
                                        return !0
                                    }
                                    n = t;
                                case "last":
                                    while (n = n.nextSibling) {
                                        if (n.nodeType === 1) {
                                            return !1
                                        }
                                    }
                                    return !0
                            }
                        }
                    },
                    PSEUDO: function(e, t) {
                        var n, r = i.pseudos[e] || i.setFilters[e.toLowerCase()] || nt.error("unsupported pseudo: " + e);
                        return r[d] ? r(t) : r.length > 1 ? (n = [e, e, "", t], i.setFilters.hasOwnProperty(e.toLowerCase()) ? N(function(e, n) {
                            var i, s = r(e, t),
                                o = s.length;
                            while (o--) {
                                i = T.call(e, s[o]), e[i] = !(n[i] = s[o])
                            }
                        }) : function(e) {
                            return r(e, 0, n)
                        }) : r
                    }
                },
                pseudos: {
                    not: N(function(e) {
                        var t = [],
                            n = [],
                            r = a(e.replace(j, "$1"));
                        return r[d] ? N(function(e, t, n, i) {
                            var s, o = r(e, null, i, []),
                                u = e.length;
                            while (u--) {
                                if (s = o[u]) {
                                    e[u] = !(t[u] = s)
                                }
                            }
                        }) : function(e, i, s) {
                            return t[0] = e, r(t, null, s, n), !n.pop()
                        }
                    }),
                    has: N(function(e) {
                        return function(t) {
                            return nt(e, t).length > 0
                        }
                    }),
                    contains: N(function(e) {
                        return function(t) {
                            return (t.textContent || t.innerText || s(t)).indexOf(e) > -1
                        }
                    }),
                    enabled: function(e) {
                        return e.disabled === !1
                    },
                    disabled: function(e) {
                        return e.disabled === !0
                    },
                    checked: function(e) {
                        var t = e.nodeName.toLowerCase();
                        return t === "input" && !!e.checked || t === "option" && !!e.selected
                    },
                    selected: function(e) {
                        return e.parentNode && e.parentNode.selectedIndex, e.selected === !0
                    },
                    parent: function(e) {
                        return !i.pseudos.empty(e)
                    },
                    empty: function(e) {
                        var t;
                        e = e.firstChild;
                        while (e) {
                            if (e.nodeName > "@" || (t = e.nodeType) === 3 || t === 4) {
                                return !1
                            }
                            e = e.nextSibling
                        }
                        return !0
                    },
                    header: function(e) {
                        return X.test(e.nodeName)
                    },
                    text: function(e) {
                        var t, n;
                        return e.nodeName.toLowerCase() === "input" && (t = e.type) === "text" && ((n = e.getAttribute("type")) == null || n.toLowerCase() === t)
                    },
                    radio: rt("radio"),
                    checkbox: rt("checkbox"),
                    file: rt("file"),
                    password: rt("password"),
                    image: rt("image"),
                    submit: it("submit"),
                    reset: it("reset"),
                    button: function(e) {
                        var t = e.nodeName.toLowerCase();
                        return t === "input" && e.type === "button" || t === "button"
                    },
                    input: function(e) {
                        return V.test(e.nodeName)
                    },
                    focus: function(e) {
                        var t = e.ownerDocument;
                        return e === t.activeElement && (!t.hasFocus || t.hasFocus()) && !!(e.type || e.href || ~e.tabIndex)
                    },
                    active: function(e) {
                        return e === e.ownerDocument.activeElement
                    },
                    first: st(function() {
                        return [0]
                    }),
                    last: st(function(e, t) {
                        return [t - 1]
                    }),
                    eq: st(function(e, t, n) {
                        return [n < 0 ? n + t : n]
                    }),
                    even: st(function(e, t) {
                        for (var n = 0; n < t; n += 2) {
                            e.push(n)
                        }
                        return e
                    }),
                    odd: st(function(e, t) {
                        for (var n = 1; n < t; n += 2) {
                            e.push(n)
                        }
                        return e
                    }),
                    lt: st(function(e, t, n) {
                        for (var r = n < 0 ? n + t : n; --r >= 0;) {
                            e.push(r)
                        }
                        return e
                    }),
                    gt: st(function(e, t, n) {
                        for (var r = n < 0 ? n + t : n; ++r < t;) {
                            e.push(r)
                        }
                        return e
                    })
                }
            }, f = y.compareDocumentPosition ? function(e, t) {
                return e === t ? (l = !0, 0) : (!e.compareDocumentPosition || !t.compareDocumentPosition ? e.compareDocumentPosition : e.compareDocumentPosition(t) & 4) ? -1 : 1
            } : function(e, t) {
                if (e === t) {
                    return l = !0, 0
                }
                if (e.sourceIndex && t.sourceIndex) {
                    return e.sourceIndex - t.sourceIndex
                }
                var n, r, i = [],
                    s = [],
                    o = e.parentNode,
                    u = t.parentNode,
                    a = o;
                if (o === u) {
                    return ot(e, t)
                }
                if (!o) {
                    return -1
                }
                if (!u) {
                    return 1
                }
                while (a) {
                    i.unshift(a), a = a.parentNode
                }
                a = u;
                while (a) {
                    s.unshift(a), a = a.parentNode
                }
                n = i.length, r = s.length;
                for (var f = 0; f < n && f < r; f++) {
                    if (i[f] !== s[f]) {
                        return ot(i[f], s[f])
                    }
                }
                return f === n ? ot(e, s[f], -1) : ot(i[f], t, 1)
            }, [0, 0].sort(f), h = !l, nt.uniqueSort = function(e) {
                var t, n = [],
                    r = 1,
                    i = 0;
                l = h, e.sort(f);
                if (l) {
                    for (; t = e[r]; r++) {
                        t === e[r - 1] && (i = n.push(r))
                    }
                    while (i--) {
                        e.splice(n[i], 1)
                    }
                }
                return e
            }, nt.error = function(e) {
                throw new Error("Syntax error, unrecognized expression: " + e)
            }, a = nt.compile = function(e, t) {
                var n, r = [],
                    i = [],
                    s = A[d][e + " "];
                if (!s) {
                    t || (t = ut(e)), n = t.length;
                    while (n--) {
                        s = ht(t[n]), s[d] ? r.push(s) : i.push(s)
                    }
                    s = A(e, pt(i, r))
                }
                return s
            }, g.querySelectorAll && function() {
                var e, t = vt,
                    n = /'|\\/g,
                    r = /\=[\x20\t\r\n\f]*([^'"\]]*)[\x20\t\r\n\f]*\]/g,
                    i = [":focus"],
                    s = [":active"],
                    u = y.matchesSelector || y.mozMatchesSelector || y.webkitMatchesSelector || y.oMatchesSelector || y.msMatchesSelector;
                K(function(e) {
                    e.innerHTML = "<select><option selected=''></option></select>", e.querySelectorAll("[selected]").length || i.push("\\[" + O + "*(?:checked|disabled|ismap|multiple|readonly|selected|value)"), e.querySelectorAll(":checked").length || i.push(":checked")
                }), K(function(e) {
                    e.innerHTML = "<p test=''></p>", e.querySelectorAll("[test^='']").length && i.push("[*^$]=" + O + "*(?:\"\"|'')"), e.innerHTML = "<input type='hidden'/>", e.querySelectorAll(":enabled").length || i.push(":enabled", ":disabled")
                }), i = new RegExp(i.join("|")), vt = function(e, r, s, o, u) {
                    if (!o && !u && !i.test(e)) {
                        var a, f, l = !0,
                            c = d,
                            h = r,
                            p = r.nodeType === 9 && e;
                        if (r.nodeType === 1 && r.nodeName.toLowerCase() !== "object") {
                            a = ut(e), (l = r.getAttribute("id")) ? c = l.replace(n, "\\$&") : r.setAttribute("id", c), c = "[id='" + c + "'] ", f = a.length;
                            while (f--) {
                                a[f] = c + a[f].join("")
                            }
                            h = z.test(e) && r.parentNode || r, p = a.join(",")
                        }
                        if (p) {
                            try {
                                return S.apply(s, x.call(h.querySelectorAll(p), 0)), s
                            } catch (v) {} finally {
                                l || r.removeAttribute("id")
                            }
                        }
                    }
                    return t(e, r, s, o, u)
                }, u && (K(function(t) {
                    e = u.call(t, "div");
                    try {
                        u.call(t, "[test!='']:sizzle"), s.push("!=", H)
                    } catch (n) {}
                }), s = new RegExp(s.join("|")), nt.matchesSelector = function(t, n) {
                    n = n.replace(r, "='$1']");
                    if (!o(t) && !s.test(n) && !i.test(n)) {
                        try {
                            var a = u.call(t, n);
                            if (a || e || t.document && t.document.nodeType !== 11) {
                                return a
                            }
                        } catch (f) {}
                    }
                    return nt(n, null, null, [t]).length > 0
                })
            }(), i.pseudos.nth = i.pseudos.eq, i.filters = mt.prototype = i.pseudos, i.setFilters = new mt, nt.attr = v.attr, v.find = nt, v.expr = nt.selectors, v.expr[":"] = v.expr.pseudos, v.unique = nt.uniqueSort, v.text = nt.getText, v.isXMLDoc = nt.isXML, v.contains = nt.contains
        }(e);
    var nt = /Until$/,
        rt = /^(?:parents|prev(?:Until|All))/,
        it = /^.[^:#\[\.,]*$/,
        st = v.expr.match.needsContext,
        ot = {
            children: !0,
            contents: !0,
            next: !0,
            prev: !0
        };
    v.fn.extend({
        find: function(e) {
            var t, n, r, i, s, o, u = this;
            if (typeof e != "string") {
                return v(e).filter(function() {
                    for (t = 0, n = u.length; t < n; t++) {
                        if (v.contains(u[t], this)) {
                            return !0
                        }
                    }
                })
            }
            o = this.pushStack("", "find", e);
            for (t = 0, n = this.length; t < n; t++) {
                r = o.length, v.find(e, this[t], o);
                if (t > 0) {
                    for (i = r; i < o.length; i++) {
                        for (s = 0; s < r; s++) {
                            if (o[s] === o[i]) {
                                o.splice(i--, 1);
                                break
                            }
                        }
                    }
                }
            }
            return o
        },
        has: function(e) {
            var t, n = v(e, this),
                r = n.length;
            return this.filter(function() {
                for (t = 0; t < r; t++) {
                    if (v.contains(this, n[t])) {
                        return !0
                    }
                }
            })
        },
        not: function(e) {
            return this.pushStack(ft(this, e, !1), "not", e)
        },
        filter: function(e) {
            return this.pushStack(ft(this, e, !0), "filter", e)
        },
        is: function(e) {
            return !!e && (typeof e == "string" ? st.test(e) ? v(e, this.context).index(this[0]) >= 0 : v.filter(e, this).length > 0 : this.filter(e).length > 0)
        },
        closest: function(e, t) {
            var n, r = 0,
                i = this.length,
                s = [],
                o = st.test(e) || typeof e != "string" ? v(e, t || this.context) : 0;
            for (; r < i; r++) {
                n = this[r];
                while (n && n.ownerDocument && n !== t && n.nodeType !== 11) {
                    if (o ? o.index(n) > -1 : v.find.matchesSelector(n, e)) {
                        s.push(n);
                        break
                    }
                    n = n.parentNode
                }
            }
            return s = s.length > 1 ? v.unique(s) : s, this.pushStack(s, "closest", e)
        },
        index: function(e) {
            return e ? typeof e == "string" ? v.inArray(this[0], v(e)) : v.inArray(e.jquery ? e[0] : e, this) : this[0] && this[0].parentNode ? this.prevAll().length : -1
        },
        add: function(e, t) {
            var n = typeof e == "string" ? v(e, t) : v.makeArray(e && e.nodeType ? [e] : e),
                r = v.merge(this.get(), n);
            return this.pushStack(ut(n[0]) || ut(r[0]) ? r : v.unique(r))
        },
        addBack: function(e) {
            return this.add(e == null ? this.prevObject : this.prevObject.filter(e))
        }
    }), v.fn.andSelf = v.fn.addBack, v.each({
        parent: function(e) {
            var t = e.parentNode;
            return t && t.nodeType !== 11 ? t : null
        },
        parents: function(e) {
            return v.dir(e, "parentNode")
        },
        parentsUntil: function(e, t, n) {
            return v.dir(e, "parentNode", n)
        },
        next: function(e) {
            return at(e, "nextSibling")
        },
        prev: function(e) {
            return at(e, "previousSibling")
        },
        nextAll: function(e) {
            return v.dir(e, "nextSibling")
        },
        prevAll: function(e) {
            return v.dir(e, "previousSibling")
        },
        nextUntil: function(e, t, n) {
            return v.dir(e, "nextSibling", n)
        },
        prevUntil: function(e, t, n) {
            return v.dir(e, "previousSibling", n)
        },
        siblings: function(e) {
            return v.sibling((e.parentNode || {}).firstChild, e)
        },
        children: function(e) {
            return v.sibling(e.firstChild)
        },
        contents: function(e) {
            return v.nodeName(e, "iframe") ? e.contentDocument || e.contentWindow.document : v.merge([], e.childNodes)
        }
    }, function(e, t) {
        v.fn[e] = function(n, r) {
            var i = v.map(this, t, n);
            return nt.test(e) || (r = n), r && typeof r == "string" && (i = v.filter(r, i)), i = this.length > 1 && !ot[e] ? v.unique(i) : i, this.length > 1 && rt.test(e) && (i = i.reverse()), this.pushStack(i, e, l.call(arguments).join(","))
        }
    }), v.extend({
        filter: function(e, t, n) {
            return n && (e = ":not(" + e + ")"), t.length === 1 ? v.find.matchesSelector(t[0], e) ? [t[0]] : [] : v.find.matches(e, t)
        },
        dir: function(e, n, r) {
            var i = [],
                s = e[n];
            while (s && s.nodeType !== 9 && (r === t || s.nodeType !== 1 || !v(s).is(r))) {
                s.nodeType === 1 && i.push(s), s = s[n]
            }
            return i
        },
        sibling: function(e, t) {
            var n = [];
            for (; e; e = e.nextSibling) {
                e.nodeType === 1 && e !== t && n.push(e)
            }
            return n
        }
    });
    var ct = "abbr|article|aside|audio|bdi|canvas|data|datalist|details|figcaption|figure|footer|header|hgroup|mark|meter|nav|output|progress|section|summary|time|video",
        ht = / jQuery\d+="(?:null|\d+)"/g,
        pt = /^\s+/,
        dt = /<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:]+)[^>]*)\/>/gi,
        vt = /<([\w:]+)/,
        mt = /<tbody/i,
        gt = /<|&#?\w+;/,
        yt = /<(?:script|style|link)/i,
        bt = /<(?:script|object|embed|option|style)/i,
        wt = new RegExp("<(?:" + ct + ")[\\s/>]", "i"),
        Et = /^(?:checkbox|radio)$/,
        St = /checked\s*(?:[^=]|=\s*.checked.)/i,
        xt = /\/(java|ecma)script/i,
        Tt = /^\s*<!(?:\[CDATA\[|\-\-)|[\]\-]{2}>\s*$/g,
        Nt = {
            option: [1, "<select multiple='multiple'>", "</select>"],
            legend: [1, "<fieldset>", "</fieldset>"],
            thead: [1, "<table>", "</table>"],
            tr: [2, "<table><tbody>", "</tbody></table>"],
            td: [3, "<table><tbody><tr>", "</tr></tbody></table>"],
            col: [2, "<table><tbody></tbody><colgroup>", "</colgroup></table>"],
            area: [1, "<map>", "</map>"],
            _default: [0, "", ""]
        },
        Ct = lt(i),
        kt = Ct.appendChild(i.createElement("div"));
    Nt.optgroup = Nt.option, Nt.tbody = Nt.tfoot = Nt.colgroup = Nt.caption = Nt.thead, Nt.th = Nt.td, v.support.htmlSerialize || (Nt._default = [1, "X<div>", "</div>"]), v.fn.extend({
            text: function(e) {
                return v.access(this, function(e) {
                    return e === t ? v.text(this) : this.empty().append((this[0] && this[0].ownerDocument || i).createTextNode(e))
                }, null, e, arguments.length)
            },
            wrapAll: function(e) {
                if (v.isFunction(e)) {
                    return this.each(function(t) {
                        v(this).wrapAll(e.call(this, t))
                    })
                }
                if (this[0]) {
                    var t = v(e, this[0].ownerDocument).eq(0).clone(!0);
                    this[0].parentNode && t.insertBefore(this[0]), t.map(function() {
                        var e = this;
                        while (e.firstChild && e.firstChild.nodeType === 1) {
                            e = e.firstChild
                        }
                        return e
                    }).append(this)
                }
                return this
            },
            wrapInner: function(e) {
                return v.isFunction(e) ? this.each(function(t) {
                    v(this).wrapInner(e.call(this, t))
                }) : this.each(function() {
                    var t = v(this),
                        n = t.contents();
                    n.length ? n.wrapAll(e) : t.append(e)
                })
            },
            wrap: function(e) {
                var t = v.isFunction(e);
                return this.each(function(n) {
                    v(this).wrapAll(t ? e.call(this, n) : e)
                })
            },
            unwrap: function() {
                return this.parent().each(function() {
                    v.nodeName(this, "body") || v(this).replaceWith(this.childNodes)
                }).end()
            },
            append: function() {
                return this.domManip(arguments, !0, function(e) {
                    (this.nodeType === 1 || this.nodeType === 11) && this.appendChild(e)
                })
            },
            prepend: function() {
                return this.domManip(arguments, !0, function(e) {
                    (this.nodeType === 1 || this.nodeType === 11) && this.insertBefore(e, this.firstChild)
                })
            },
            before: function() {
                if (!ut(this[0])) {
                    return this.domManip(arguments, !1, function(e) {
                        this.parentNode.insertBefore(e, this)
                    })
                }
                if (arguments.length) {
                    var e = v.clean(arguments);
                    return this.pushStack(v.merge(e, this), "before", this.selector)
                }
            },
            after: function() {
                if (!ut(this[0])) {
                    return this.domManip(arguments, !1, function(e) {
                        this.parentNode.insertBefore(e, this.nextSibling)
                    })
                }
                if (arguments.length) {
                    var e = v.clean(arguments);
                    return this.pushStack(v.merge(this, e), "after", this.selector)
                }
            },
            remove: function(e, t) {
                var n, r = 0;
                for (;
                    (n = this[r]) != null; r++) {
                    if (!e || v.filter(e, [n]).length) {
                        !t && n.nodeType === 1 && (v.cleanData(n.getElementsByTagName("*")), v.cleanData([n])), n.parentNode && n.parentNode.removeChild(n)
                    }
                }
                return this
            },
            empty: function() {
                var e, t = 0;
                for (;
                    (e = this[t]) != null; t++) {
                    e.nodeType === 1 && v.cleanData(e.getElementsByTagName("*"));
                    while (e.firstChild) {
                        e.removeChild(e.firstChild)
                    }
                }
                return this
            },
            clone: function(e, t) {
                return e = e == null ? !1 : e, t = t == null ? e : t, this.map(function() {
                    return v.clone(this, e, t)
                })
            },
            html: function(e) {
                return v.access(this, function(e) {
                    var n = this[0] || {},
                        r = 0,
                        i = this.length;
                    if (e === t) {
                        return n.nodeType === 1 ? n.innerHTML.replace(ht, "") : t
                    }
                    if (typeof e == "string" && !yt.test(e) && (v.support.htmlSerialize || !wt.test(e)) && (v.support.leadingWhitespace || !pt.test(e)) && !Nt[(vt.exec(e) || ["", ""])[1].toLowerCase()]) {
                        e = e.replace(dt, "<$1></$2>");
                        try {
                            for (; r < i; r++) {
                                n = this[r] || {}, n.nodeType === 1 && (v.cleanData(n.getElementsByTagName("*")), n.innerHTML = e)
                            }
                            n = 0
                        } catch (s) {}
                    }
                    n && this.empty().append(e)
                }, null, e, arguments.length)
            },
            replaceWith: function(e) {
                return ut(this[0]) ? this.length ? this.pushStack(v(v.isFunction(e) ? e() : e), "replaceWith", e) : this : v.isFunction(e) ? this.each(function(t) {
                    var n = v(this),
                        r = n.html();
                    n.replaceWith(e.call(this, t, r))
                }) : (typeof e != "string" && (e = v(e).detach()), this.each(function() {
                    var t = this.nextSibling,
                        n = this.parentNode;
                    v(this).remove(), t ? v(t).before(e) : v(n).append(e)
                }))
            },
            detach: function(e) {
                return this.remove(e, !0)
            },
            domManip: function(e, n, r) {
                e = [].concat.apply([], e);
                var i, s, o, u, a = 0,
                    f = e[0],
                    l = [],
                    c = this.length;
                if (!v.support.checkClone && c > 1 && typeof f == "string" && St.test(f)) {
                    return this.each(function() {
                        v(this).domManip(e, n, r)
                    })
                }
                if (v.isFunction(f)) {
                    return this.each(function(i) {
                        var s = v(this);
                        e[0] = f.call(this, i, n ? s.html() : t), s.domManip(e, n, r)
                    })
                }
                if (this[0]) {
                    i = v.buildFragment(e, this, l), o = i.fragment, s = o.firstChild, o.childNodes.length === 1 && (o = s);
                    if (s) {
                        n = n && v.nodeName(s, "tr");
                        for (u = i.cacheable || c - 1; a < c; a++) {
                            r.call(n && v.nodeName(this[a], "table") ? Lt(this[a], "tbody") : this[a], a === u ? o : v.clone(o, !0, !0))
                        }
                    }
                    o = s = null, l.length && v.each(l, function(e, t) {
                        t.src ? v.ajax ? v.ajax({
                            url: t.src,
                            type: "GET",
                            dataType: "script",
                            async: !1,
                            global: !1,
                            "throws": !0
                        }) : v.error("no ajax") : v.globalEval((t.text || t.textContent || t.innerHTML || "").replace(Tt, "")), t.parentNode && t.parentNode.removeChild(t)
                    })
                }
                return this
            }
        }), v.buildFragment = function(e, n, r) {
            var s, o, u, a = e[0];
            return n = n || i, n = !n.nodeType && n[0] || n, n = n.ownerDocument || n, e.length === 1 && typeof a == "string" && a.length < 512 && n === i && a.charAt(0) === "<" && !bt.test(a) && (v.support.checkClone || !St.test(a)) && (v.support.html5Clone || !wt.test(a)) && (o = !0, s = v.fragments[a], u = s !== t), s || (s = n.createDocumentFragment(), v.clean(e, n, s, r), o && (v.fragments[a] = u && s)), {
                fragment: s,
                cacheable: o
            }
        }, v.fragments = {}, v.each({
            appendTo: "append",
            prependTo: "prepend",
            insertBefore: "before",
            insertAfter: "after",
            replaceAll: "replaceWith"
        }, function(e, t) {
            v.fn[e] = function(n) {
                var r, i = 0,
                    s = [],
                    o = v(n),
                    u = o.length,
                    a = this.length === 1 && this[0].parentNode;
                if ((a == null || a && a.nodeType === 11 && a.childNodes.length === 1) && u === 1) {
                    return o[t](this[0]), this
                }
                for (; i < u; i++) {
                    r = (i > 0 ? this.clone(!0) : this).get(), v(o[i])[t](r), s = s.concat(r)
                }
                return this.pushStack(s, e, o.selector)
            }
        }), v.extend({
            clone: function(e, t, n) {
                var r, i, s, o;
                v.support.html5Clone || v.isXMLDoc(e) || !wt.test("<" + e.nodeName + ">") ? o = e.cloneNode(!0) : (kt.innerHTML = e.outerHTML, kt.removeChild(o = kt.firstChild));
                if ((!v.support.noCloneEvent || !v.support.noCloneChecked) && (e.nodeType === 1 || e.nodeType === 11) && !v.isXMLDoc(e)) {
                    Ot(e, o), r = Mt(e), i = Mt(o);
                    for (s = 0; r[s]; ++s) {
                        i[s] && Ot(r[s], i[s])
                    }
                }
                if (t) {
                    At(e, o);
                    if (n) {
                        r = Mt(e), i = Mt(o);
                        for (s = 0; r[s]; ++s) {
                            At(r[s], i[s])
                        }
                    }
                }
                return r = i = null, o
            },
            clean: function(e, t, n, r) {
                var s, o, u, a, f, l, c, h, p, d, m, g, y = t === i && Ct,
                    b = [];
                if (!t || typeof t.createDocumentFragment == "undefined") {
                    t = i
                }
                for (s = 0;
                    (u = e[s]) != null; s++) {
                    typeof u == "number" && (u += "");
                    if (!u) {
                        continue
                    }
                    if (typeof u == "string") {
                        if (!gt.test(u)) {
                            u = t.createTextNode(u)
                        } else {
                            y = y || lt(t), c = t.createElement("div"), y.appendChild(c), u = u.replace(dt, "<$1></$2>"), a = (vt.exec(u) || ["", ""])[1].toLowerCase(), f = Nt[a] || Nt._default, l = f[0], c.innerHTML = f[1] + u + f[2];
                            while (l--) {
                                c = c.lastChild
                            }
                            if (!v.support.tbody) {
                                h = mt.test(u), p = a === "table" && !h ? c.firstChild && c.firstChild.childNodes : f[1] === "<table>" && !h ? c.childNodes : [];
                                for (o = p.length - 1; o >= 0; --o) {
                                    v.nodeName(p[o], "tbody") && !p[o].childNodes.length && p[o].parentNode.removeChild(p[o])
                                }
                            }!v.support.leadingWhitespace && pt.test(u) && c.insertBefore(t.createTextNode(pt.exec(u)[0]), c.firstChild), u = c.childNodes, c.parentNode.removeChild(c)
                        }
                    }
                    u.nodeType ? b.push(u) : v.merge(b, u)
                }
                c && (u = c = y = null);
                if (!v.support.appendChecked) {
                    for (s = 0;
                        (u = b[s]) != null; s++) {
                        v.nodeName(u, "input") ? _t(u) : typeof u.getElementsByTagName != "undefined" && v.grep(u.getElementsByTagName("input"), _t)
                    }
                }
                if (n) {
                    m = function(e) {
                        if (!e.type || xt.test(e.type)) {
                            return r ? r.push(e.parentNode ? e.parentNode.removeChild(e) : e) : n.appendChild(e)
                        }
                    };
                    for (s = 0;
                        (u = b[s]) != null; s++) {
                        if (!v.nodeName(u, "script") || !m(u)) {
                            n.appendChild(u), typeof u.getElementsByTagName != "undefined" && (g = v.grep(v.merge([], u.getElementsByTagName("script")), m), b.splice.apply(b, [s + 1, 0].concat(g)), s += g.length)
                        }
                    }
                }
                return b
            },
            cleanData: function(e, t) {
                var n, r, i, s, o = 0,
                    u = v.expando,
                    a = v.cache,
                    f = v.support.deleteExpando,
                    l = v.event.special;
                for (;
                    (i = e[o]) != null; o++) {
                    if (t || v.acceptData(i)) {
                        r = i[u], n = r && a[r];
                        if (n) {
                            if (n.events) {
                                for (s in n.events) {
                                    l[s] ? v.event.remove(i, s) : v.removeEvent(i, s, n.handle)
                                }
                            }
                            a[r] && (delete a[r], f ? delete i[u] : i.removeAttribute ? i.removeAttribute(u) : i[u] = null, v.deletedIds.push(r))
                        }
                    }
                }
            }
        }),
        function() {
            var e, t;
            v.uaMatch = function(e) {
                e = e.toLowerCase();
                var t = /(chrome)[ \/]([\w.]+)/.exec(e) || /(webkit)[ \/]([\w.]+)/.exec(e) || /(opera)(?:.*version|)[ \/]([\w.]+)/.exec(e) || /(msie) ([\w.]+)/.exec(e) || e.indexOf("compatible") < 0 && /(mozilla)(?:.*? rv:([\w.]+)|)/.exec(e) || [];
                return {
                    browser: t[1] || "",
                    version: t[2] || "0"
                }
            }, e = v.uaMatch(o.userAgent), t = {}, e.browser && (t[e.browser] = !0, t.version = e.version), t.chrome ? t.webkit = !0 : t.webkit && (t.safari = !0), v.browser = t, v.sub = function() {
                function e(t, n) {
                    return new e.fn.init(t, n)
                }
                v.extend(!0, e, this), e.superclass = this, e.fn = e.prototype = this(), e.fn.constructor = e, e.sub = this.sub, e.fn.init = function(r, i) {
                    return i && i instanceof v && !(i instanceof e) && (i = e(i)), v.fn.init.call(this, r, i, t)
                }, e.fn.init.prototype = e.fn;
                var t = e(i);
                return e
            }
        }();
    var Dt, Pt, Ht, Bt = /alpha\([^)]*\)/i,
        jt = /opacity=([^)]*)/,
        Ft = /^(top|right|bottom|left)$/,
        It = /^(none|table(?!-c[ea]).+)/,
        qt = /^margin/,
        Rt = new RegExp("^(" + m + ")(.*)$", "i"),
        Ut = new RegExp("^(" + m + ")(?!px)[a-z%]+$", "i"),
        zt = new RegExp("^([-+])=(" + m + ")", "i"),
        Wt = {
            BODY: "block"
        },
        Xt = {
            position: "absolute",
            visibility: "hidden",
            display: "block"
        },
        Vt = {
            letterSpacing: 0,
            fontWeight: 400
        },
        $t = ["Top", "Right", "Bottom", "Left"],
        Jt = ["Webkit", "O", "Moz", "ms"],
        Kt = v.fn.toggle;
    v.fn.extend({
        css: function(e, n) {
            return v.access(this, function(e, n, r) {
                return r !== t ? v.style(e, n, r) : v.css(e, n)
            }, e, n, arguments.length > 1)
        },
        show: function() {
            return Yt(this, !0)
        },
        hide: function() {
            return Yt(this)
        },
        toggle: function(e, t) {
            var n = typeof e == "boolean";
            return v.isFunction(e) && v.isFunction(t) ? Kt.apply(this, arguments) : this.each(function() {
                (n ? e : Gt(this)) ? v(this).show(): v(this).hide()
            })
        }
    }), v.extend({
        cssHooks: {
            opacity: {
                get: function(e, t) {
                    if (t) {
                        var n = Dt(e, "opacity");
                        return n === "" ? "1" : n
                    }
                }
            }
        },
        cssNumber: {
            fillOpacity: !0,
            fontWeight: !0,
            lineHeight: !0,
            opacity: !0,
            orphans: !0,
            widows: !0,
            zIndex: !0,
            zoom: !0
        },
        cssProps: {
            "float": v.support.cssFloat ? "cssFloat" : "styleFloat"
        },
        style: function(e, n, r, i) {
            if (!e || e.nodeType === 3 || e.nodeType === 8 || !e.style) {
                return
            }
            var s, o, u, a = v.camelCase(n),
                f = e.style;
            n = v.cssProps[a] || (v.cssProps[a] = Qt(f, a)), u = v.cssHooks[n] || v.cssHooks[a];
            if (r === t) {
                return u && "get" in u && (s = u.get(e, !1, i)) !== t ? s : f[n]
            }
            o = typeof r, o === "string" && (s = zt.exec(r)) && (r = (s[1] + 1) * s[2] + parseFloat(v.css(e, n)), o = "number");
            if (r == null || o === "number" && isNaN(r)) {
                return
            }
            o === "number" && !v.cssNumber[a] && (r += "px");
            if (!u || !("set" in u) || (r = u.set(e, r, i)) !== t) {
                try {
                    f[n] = r
                } catch (l) {}
            }
        },
        css: function(e, n, r, i) {
            var s, o, u, a = v.camelCase(n);
            return n = v.cssProps[a] || (v.cssProps[a] = Qt(e.style, a)), u = v.cssHooks[n] || v.cssHooks[a], u && "get" in u && (s = u.get(e, !0, i)), s === t && (s = Dt(e, n)), s === "normal" && n in Vt && (s = Vt[n]), r || i !== t ? (o = parseFloat(s), r || v.isNumeric(o) ? o || 0 : s) : s
        },
        swap: function(e, t, n) {
            var r, i, s = {};
            for (i in t) {
                s[i] = e.style[i], e.style[i] = t[i]
            }
            r = n.call(e);
            for (i in t) {
                e.style[i] = s[i]
            }
            return r
        }
    }), e.getComputedStyle ? Dt = function(t, n) {
        var r, i, s, o, u = e.getComputedStyle(t, null),
            a = t.style;
        return u && (r = u.getPropertyValue(n) || u[n], r === "" && !v.contains(t.ownerDocument, t) && (r = v.style(t, n)), Ut.test(r) && qt.test(n) && (i = a.width, s = a.minWidth, o = a.maxWidth, a.minWidth = a.maxWidth = a.width = r, r = u.width, a.width = i, a.minWidth = s, a.maxWidth = o)), r
    } : i.documentElement.currentStyle && (Dt = function(e, t) {
        var n, r, i = e.currentStyle && e.currentStyle[t],
            s = e.style;
        return i == null && s && s[t] && (i = s[t]), Ut.test(i) && !Ft.test(t) && (n = s.left, r = e.runtimeStyle && e.runtimeStyle.left, r && (e.runtimeStyle.left = e.currentStyle.left), s.left = t === "fontSize" ? "1em" : i, i = s.pixelLeft + "px", s.left = n, r && (e.runtimeStyle.left = r)), i === "" ? "auto" : i
    }), v.each(["height", "width"], function(e, t) {
        v.cssHooks[t] = {
            get: function(e, n, r) {
                if (n) {
                    return e.offsetWidth === 0 && It.test(Dt(e, "display")) ? v.swap(e, Xt, function() {
                        return tn(e, t, r)
                    }) : tn(e, t, r)
                }
            },
            set: function(e, n, r) {
                return Zt(e, n, r ? en(e, t, r, v.support.boxSizing && v.css(e, "boxSizing") === "border-box") : 0)
            }
        }
    }), v.support.opacity || (v.cssHooks.opacity = {
        get: function(e, t) {
            return jt.test((t && e.currentStyle ? e.currentStyle.filter : e.style.filter) || "") ? 0.01 * parseFloat(RegExp.$1) + "" : t ? "1" : ""
        },
        set: function(e, t) {
            var n = e.style,
                r = e.currentStyle,
                i = v.isNumeric(t) ? "alpha(opacity=" + t * 100 + ")" : "",
                s = r && r.filter || n.filter || "";
            n.zoom = 1;
            if (t >= 1 && v.trim(s.replace(Bt, "")) === "" && n.removeAttribute) {
                n.removeAttribute("filter");
                if (r && !r.filter) {
                    return
                }
            }
            n.filter = Bt.test(s) ? s.replace(Bt, i) : s + " " + i
        }
    }), v(function() {
        v.support.reliableMarginRight || (v.cssHooks.marginRight = {
            get: function(e, t) {
                return v.swap(e, {
                    display: "inline-block"
                }, function() {
                    if (t) {
                        return Dt(e, "marginRight")
                    }
                })
            }
        }), !v.support.pixelPosition && v.fn.position && v.each(["top", "left"], function(e, t) {
            v.cssHooks[t] = {
                get: function(e, n) {
                    if (n) {
                        var r = Dt(e, t);
                        return Ut.test(r) ? v(e).position()[t] + "px" : r
                    }
                }
            }
        })
    }), v.expr && v.expr.filters && (v.expr.filters.hidden = function(e) {
        return e.offsetWidth === 0 && e.offsetHeight === 0 || !v.support.reliableHiddenOffsets && (e.style && e.style.display || Dt(e, "display")) === "none"
    }, v.expr.filters.visible = function(e) {
        return !v.expr.filters.hidden(e)
    }), v.each({
        margin: "",
        padding: "",
        border: "Width"
    }, function(e, t) {
        v.cssHooks[e + t] = {
            expand: function(n) {
                var r, i = typeof n == "string" ? n.split(" ") : [n],
                    s = {};
                for (r = 0; r < 4; r++) {
                    s[e + $t[r] + t] = i[r] || i[r - 2] || i[0]
                }
                return s
            }
        }, qt.test(e) || (v.cssHooks[e + t].set = Zt)
    });
    var rn = /%20/g,
        sn = /\[\]$/,
        on = /\r?\n/g,
        un = /^(?:color|date|datetime|datetime-local|email|hidden|month|number|password|range|search|tel|text|time|url|week)$/i,
        an = /^(?:select|textarea)/i;
    v.fn.extend({
        serialize: function() {
            return v.param(this.serializeArray())
        },
        serializeArray: function() {
            return this.map(function() {
                return this.elements ? v.makeArray(this.elements) : this
            }).filter(function() {
                return this.name && !this.disabled && (this.checked || an.test(this.nodeName) || un.test(this.type))
            }).map(function(e, t) {
                var n = v(this).val();
                return n == null ? null : v.isArray(n) ? v.map(n, function(e, n) {
                    return {
                        name: t.name,
                        value: e.replace(on, "\r\n")
                    }
                }) : {
                    name: t.name,
                    value: n.replace(on, "\r\n")
                }
            }).get()
        }
    }), v.param = function(e, n) {
        var r, i = [],
            s = function(e, t) {
                t = v.isFunction(t) ? t() : t == null ? "" : t, i[i.length] = encodeURIComponent(e) + "=" + encodeURIComponent(t)
            };
        n === t && (n = v.ajaxSettings && v.ajaxSettings.traditional);
        if (v.isArray(e) || e.jquery && !v.isPlainObject(e)) {
            v.each(e, function() {
                s(this.name, this.value)
            })
        } else {
            for (r in e) {
                fn(r, e[r], n, s)
            }
        }
        return i.join("&").replace(rn, "+")
    };
    var ln, cn, hn = /#.*$/,
        pn = /^(.*?):[ \t]*([^\r\n]*)\r?$/mg,
        dn = /^(?:about|app|app\-storage|.+\-extension|file|res|widget):$/,
        vn = /^(?:GET|HEAD)$/,
        mn = /^\/\//,
        gn = /\?/,
        yn = /<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/gi,
        bn = /([?&])_=[^&]*/,
        wn = /^([\w\+\.\-]+:)(?:\/\/([^\/?#:]*)(?::(\d+)|)|)/,
        En = v.fn.load,
        Sn = {},
        xn = {},
        Tn = ["*/"] + ["*"];
    try {
        cn = s.href
    } catch (Nn) {
        cn = i.createElement("a"), cn.href = "", cn = cn.href
    }
    ln = wn.exec(cn.toLowerCase()) || [], v.fn.load = function(e, n, r) {
        if (typeof e != "string" && En) {
            return En.apply(this, arguments)
        }
        if (!this.length) {
            return this
        }
        var i, s, o, u = this,
            a = e.indexOf(" ");
        return a >= 0 && (i = e.slice(a, e.length), e = e.slice(0, a)), v.isFunction(n) ? (r = n, n = t) : n && typeof n == "object" && (s = "POST"), v.ajax({
            url: e,
            type: s,
            dataType: "html",
            data: n,
            complete: function(e, t) {
                r && u.each(r, o || [e.responseText, t, e])
            }
        }).done(function(e) {
            o = arguments, u.html(i ? v("<div>").append(e.replace(yn, "")).find(i) : e)
        }), this
    }, v.each("ajaxStart ajaxStop ajaxComplete ajaxError ajaxSuccess ajaxSend".split(" "), function(e, t) {
        v.fn[t] = function(e) {
            return this.on(t, e)
        }
    }), v.each(["get", "post"], function(e, n) {
        v[n] = function(e, r, i, s) {
            return v.isFunction(r) && (s = s || i, i = r, r = t), v.ajax({
                type: n,
                url: e,
                data: r,
                success: i,
                dataType: s
            })
        }
    }), v.extend({
        getScript: function(e, n) {
            return v.get(e, t, n, "script")
        },
        getJSON: function(e, t, n) {
            return v.get(e, t, n, "json")
        },
        ajaxSetup: function(e, t) {
            return t ? Ln(e, v.ajaxSettings) : (t = e, e = v.ajaxSettings), Ln(e, t), e
        },
        ajaxSettings: {
            url: cn,
            isLocal: dn.test(ln[1]),
            global: !0,
            type: "GET",
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            processData: !0,
            async: !0,
            accepts: {
                xml: "application/xml, text/xml",
                html: "text/html",
                text: "text/plain",
                json: "application/json, text/javascript",
                "*": Tn
            },
            contents: {
                xml: /xml/,
                html: /html/,
                json: /json/
            },
            responseFields: {
                xml: "responseXML",
                text: "responseText"
            },
            converters: {
                "* text": e.String,
                "text html": !0,
                "text json": v.parseJSON,
                "text xml": v.parseXML
            },
            flatOptions: {
                context: !0,
                url: !0
            }
        },
        ajaxPrefilter: Cn(Sn),
        ajaxTransport: Cn(xn),
        ajax: function(e, n) {
            function T(e, n, s, a) {
                var l, y, b, w, S, T = n;
                if (E === 2) {
                    return
                }
                E = 2, u && clearTimeout(u), o = t, i = a || "", x.readyState = e > 0 ? 4 : 0, s && (w = An(c, x, s));
                if (e >= 200 && e < 300 || e === 304) {
                    c.ifModified && (S = x.getResponseHeader("Last-Modified"), S && (v.lastModified[r] = S), S = x.getResponseHeader("Etag"), S && (v.etag[r] = S)), e === 304 ? (T = "notmodified", l = !0) : (l = On(c, w), T = l.state, y = l.data, b = l.error, l = !b)
                } else {
                    b = T;
                    if (!T || e) {
                        T = "error", e < 0 && (e = 0)
                    }
                }
                x.status = e, x.statusText = (n || T) + "", l ? d.resolveWith(h, [y, T, x]) : d.rejectWith(h, [x, T, b]), x.statusCode(g), g = t, f && p.trigger("ajax" + (l ? "Success" : "Error"), [x, c, l ? y : b]), m.fireWith(h, [x, T]), f && (p.trigger("ajaxComplete", [x, c]), --v.active || v.event.trigger("ajaxStop"))
            }
            typeof e == "object" && (n = e, e = t), n = n || {};
            var r, i, s, o, u, a, f, l, c = v.ajaxSetup({}, n),
                h = c.context || c,
                p = h !== c && (h.nodeType || h instanceof v) ? v(h) : v.event,
                d = v.Deferred(),
                m = v.Callbacks("once memory"),
                g = c.statusCode || {},
                b = {},
                w = {},
                E = 0,
                S = "canceled",
                x = {
                    readyState: 0,
                    setRequestHeader: function(e, t) {
                        if (!E) {
                            var n = e.toLowerCase();
                            e = w[n] = w[n] || e, b[e] = t
                        }
                        return this
                    },
                    getAllResponseHeaders: function() {
                        return E === 2 ? i : null
                    },
                    getResponseHeader: function(e) {
                        var n;
                        if (E === 2) {
                            if (!s) {
                                s = {};
                                while (n = pn.exec(i)) {
                                    s[n[1].toLowerCase()] = n[2]
                                }
                            }
                            n = s[e.toLowerCase()]
                        }
                        return n === t ? null : n
                    },
                    overrideMimeType: function(e) {
                        return E || (c.mimeType = e), this
                    },
                    abort: function(e) {
                        return e = e || S, o && o.abort(e), T(0, e), this
                    }
                };
            d.promise(x), x.success = x.done, x.error = x.fail, x.complete = m.add, x.statusCode = function(e) {
                if (e) {
                    var t;
                    if (E < 2) {
                        for (t in e) {
                            g[t] = [g[t], e[t]]
                        }
                    } else {
                        t = e[x.status], x.always(t)
                    }
                }
                return this
            }, c.url = ((e || c.url) + "").replace(hn, "").replace(mn, ln[1] + "//"), c.dataTypes = v.trim(c.dataType || "*").toLowerCase().split(y), c.crossDomain == null && (a = wn.exec(c.url.toLowerCase()), c.crossDomain = !(!a || a[1] === ln[1] && a[2] === ln[2] && (a[3] || (a[1] === "http:" ? 80 : 443)) == (ln[3] || (ln[1] === "http:" ? 80 : 443)))), c.data && c.processData && typeof c.data != "string" && (c.data = v.param(c.data, c.traditional)), kn(Sn, c, n, x);
            if (E === 2) {
                return x
            }
            f = c.global, c.type = c.type.toUpperCase(), c.hasContent = !vn.test(c.type), f && v.active++ === 0 && v.event.trigger("ajaxStart");
            if (!c.hasContent) {
                c.data && (c.url += (gn.test(c.url) ? "&" : "?") + c.data, delete c.data), r = c.url;
                if (c.cache === !1) {
                    var N = v.now(),
                        C = c.url.replace(bn, "$1_=" + N);
                    c.url = C + (C === c.url ? (gn.test(c.url) ? "&" : "?") + "_=" + N : "")
                }
            }(c.data && c.hasContent && c.contentType !== !1 || n.contentType) && x.setRequestHeader("Content-Type", c.contentType), c.ifModified && (r = r || c.url, v.lastModified[r] && x.setRequestHeader("If-Modified-Since", v.lastModified[r]), v.etag[r] && x.setRequestHeader("If-None-Match", v.etag[r])), x.setRequestHeader("Accept", c.dataTypes[0] && c.accepts[c.dataTypes[0]] ? c.accepts[c.dataTypes[0]] + (c.dataTypes[0] !== "*" ? ", " + Tn + "; q=0.01" : "") : c.accepts["*"]);
            for (l in c.headers) {
                x.setRequestHeader(l, c.headers[l])
            }
            if (!c.beforeSend || c.beforeSend.call(h, x, c) !== !1 && E !== 2) {
                S = "abort";
                for (l in {
                        success: 1,
                        error: 1,
                        complete: 1
                    }) {
                    x[l](c[l])
                }
                o = kn(xn, c, n, x);
                if (!o) {
                    T(-1, "No Transport")
                } else {
                    x.readyState = 1, f && p.trigger("ajaxSend", [x, c]), c.async && c.timeout > 0 && (u = setTimeout(function() {
                        x.abort("timeout")
                    }, c.timeout));
                    try {
                        E = 1, o.send(b, T)
                    } catch (k) {
                        if (!(E < 2)) {
                            throw k
                        }
                        T(-1, k)
                    }
                }
                return x
            }
            return x.abort()
        },
        active: 0,
        lastModified: {},
        etag: {}
    });
    var Mn = [],
        _n = /\?/,
        Dn = /(=)\?(?=&|$)|\?\?/,
        Pn = v.now();
    v.ajaxSetup({
        jsonp: "callback",
        jsonpCallback: function() {
            var e = Mn.pop() || v.expando + "_" + Pn++;
            return this[e] = !0, e
        }
    }), v.ajaxPrefilter("json jsonp", function(n, r, i) {
        var s, o, u, a = n.data,
            f = n.url,
            l = n.jsonp !== !1,
            c = l && Dn.test(f),
            h = l && !c && typeof a == "string" && !(n.contentType || "").indexOf("application/x-www-form-urlencoded") && Dn.test(a);
        if (n.dataTypes[0] === "jsonp" || c || h) {
            return s = n.jsonpCallback = v.isFunction(n.jsonpCallback) ? n.jsonpCallback() : n.jsonpCallback, o = e[s], c ? n.url = f.replace(Dn, "$1" + s) : h ? n.data = a.replace(Dn, "$1" + s) : l && (n.url += (_n.test(f) ? "&" : "?") + n.jsonp + "=" + s), n.converters["script json"] = function() {
                return u || v.error(s + " was not called"), u[0]
            }, n.dataTypes[0] = "json", e[s] = function() {
                u = arguments
            }, i.always(function() {
                e[s] = o, n[s] && (n.jsonpCallback = r.jsonpCallback, Mn.push(s)), u && v.isFunction(o) && o(u[0]), u = o = t
            }), "script"
        }
    }), v.ajaxSetup({
        accepts: {
            script: "text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"
        },
        contents: {
            script: /javascript|ecmascript/
        },
        converters: {
            "text script": function(e) {
                return v.globalEval(e), e
            }
        }
    }), v.ajaxPrefilter("script", function(e) {
        e.cache === t && (e.cache = !1), e.crossDomain && (e.type = "GET", e.global = !1)
    }), v.ajaxTransport("script", function(e) {
        if (e.crossDomain) {
            var n, r = i.head || i.getElementsByTagName("head")[0] || i.documentElement;
            return {
                send: function(s, o) {
                    n = i.createElement("script"), n.async = "async", e.scriptCharset && (n.charset = e.scriptCharset), n.src = e.url, n.onload = n.onreadystatechange = function(e, i) {
                        if (i || !n.readyState || /loaded|complete/.test(n.readyState)) {
                            n.onload = n.onreadystatechange = null, r && n.parentNode && r.removeChild(n), n = t, i || o(200, "success")
                        }
                    }, r.insertBefore(n, r.firstChild)
                },
                abort: function() {
                    n && n.onload(0, 1)
                }
            }
        }
    });
    var Hn, Bn = e.ActiveXObject ? function() {
            for (var e in Hn) {
                Hn[e](0, 1)
            }
        } : !1,
        jn = 0;
    v.ajaxSettings.xhr = e.ActiveXObject ? function() {
            return !this.isLocal && Fn() || In()
        } : Fn,
        function(e) {
            v.extend(v.support, {
                ajax: !!e,
                cors: !!e && "withCredentials" in e
            })
        }(v.ajaxSettings.xhr()), v.support.ajax && v.ajaxTransport(function(n) {
            if (!n.crossDomain || v.support.cors) {
                var r;
                return {
                    send: function(i, s) {
                        var o, u, a = n.xhr();
                        n.username ? a.open(n.type, n.url, n.async, n.username, n.password) : a.open(n.type, n.url, n.async);
                        if (n.xhrFields) {
                            for (u in n.xhrFields) {
                                a[u] = n.xhrFields[u]
                            }
                        }
                        n.mimeType && a.overrideMimeType && a.overrideMimeType(n.mimeType), !n.crossDomain && !i["X-Requested-With"] && (i["X-Requested-With"] = "XMLHttpRequest");
                        try {
                            for (u in i) {
                                a.setRequestHeader(u, i[u])
                            }
                        } catch (f) {}
                        a.send(n.hasContent && n.data || null), r = function(e, i) {
                            var u, f, l, c, h;
                            try {
                                if (r && (i || a.readyState === 4)) {
                                    r = t, o && (a.onreadystatechange = v.noop, Bn && delete Hn[o]);
                                    if (i) {
                                        a.readyState !== 4 && a.abort()
                                    } else {
                                        u = a.status, l = a.getAllResponseHeaders(), c = {}, h = a.responseXML, h && h.documentElement && (c.xml = h);
                                        try {
                                            c.text = a.responseText
                                        } catch (p) {}
                                        try {
                                            f = a.statusText
                                        } catch (p) {
                                            f = ""
                                        }!u && n.isLocal && !n.crossDomain ? u = c.text ? 200 : 404 : u === 1223 && (u = 204)
                                    }
                                }
                            } catch (d) {
                                i || s(-1, d)
                            }
                            c && s(u, f, c, l)
                        }, n.async ? a.readyState === 4 ? setTimeout(r, 0) : (o = ++jn, Bn && (Hn || (Hn = {}, v(e).unload(Bn)), Hn[o] = r), a.onreadystatechange = r) : r()
                    },
                    abort: function() {
                        r && r(0, 1)
                    }
                }
            }
        });
    var qn, Rn, Un = /^(?:toggle|show|hide)$/,
        zn = new RegExp("^(?:([-+])=|)(" + m + ")([a-z%]*)$", "i"),
        Wn = /queueHooks$/,
        Xn = [Gn],
        Vn = {
            "*": [function(e, t) {
                var n, r, i = this.createTween(e, t),
                    s = zn.exec(t),
                    o = i.cur(),
                    u = +o || 0,
                    a = 1,
                    f = 20;
                if (s) {
                    n = +s[2], r = s[3] || (v.cssNumber[e] ? "" : "px");
                    if (r !== "px" && u) {
                        u = v.css(i.elem, e, !0) || n || 1;
                        do {
                            a = a || ".5", u /= a, v.style(i.elem, e, u + r)
                        } while (a !== (a = i.cur() / o) && a !== 1 && --f)
                    }
                    i.unit = r, i.start = u, i.end = s[1] ? u + (s[1] + 1) * n : n
                }
                return i
            }]
        };
    v.Animation = v.extend(Kn, {
        tweener: function(e, t) {
            v.isFunction(e) ? (t = e, e = ["*"]) : e = e.split(" ");
            var n, r = 0,
                i = e.length;
            for (; r < i; r++) {
                n = e[r], Vn[n] = Vn[n] || [], Vn[n].unshift(t)
            }
        },
        prefilter: function(e, t) {
            t ? Xn.unshift(e) : Xn.push(e)
        }
    }), v.Tween = Yn, Yn.prototype = {
        constructor: Yn,
        init: function(e, t, n, r, i, s) {
            this.elem = e, this.prop = n, this.easing = i || "swing", this.options = t, this.start = this.now = this.cur(), this.end = r, this.unit = s || (v.cssNumber[n] ? "" : "px")
        },
        cur: function() {
            var e = Yn.propHooks[this.prop];
            return e && e.get ? e.get(this) : Yn.propHooks._default.get(this)
        },
        run: function(e) {
            var t, n = Yn.propHooks[this.prop];
            return this.options.duration ? this.pos = t = v.easing[this.easing](e, this.options.duration * e, 0, 1, this.options.duration) : this.pos = t = e, this.now = (this.end - this.start) * t + this.start, this.options.step && this.options.step.call(this.elem, this.now, this), n && n.set ? n.set(this) : Yn.propHooks._default.set(this), this
        }
    }, Yn.prototype.init.prototype = Yn.prototype, Yn.propHooks = {
        _default: {
            get: function(e) {
                var t;
                return e.elem[e.prop] == null || !!e.elem.style && e.elem.style[e.prop] != null ? (t = v.css(e.elem, e.prop, !1, ""), !t || t === "auto" ? 0 : t) : e.elem[e.prop]
            },
            set: function(e) {
                v.fx.step[e.prop] ? v.fx.step[e.prop](e) : e.elem.style && (e.elem.style[v.cssProps[e.prop]] != null || v.cssHooks[e.prop]) ? v.style(e.elem, e.prop, e.now + e.unit) : e.elem[e.prop] = e.now
            }
        }
    }, Yn.propHooks.scrollTop = Yn.propHooks.scrollLeft = {
        set: function(e) {
            e.elem.nodeType && e.elem.parentNode && (e.elem[e.prop] = e.now)
        }
    }, v.each(["toggle", "show", "hide"], function(e, t) {
        var n = v.fn[t];
        v.fn[t] = function(r, i, s) {
            return r == null || typeof r == "boolean" || !e && v.isFunction(r) && v.isFunction(i) ? n.apply(this, arguments) : this.animate(Zn(t, !0), r, i, s)
        }
    }), v.fn.extend({
        fadeTo: function(e, t, n, r) {
            return this.filter(Gt).css("opacity", 0).show().end().animate({
                opacity: t
            }, e, n, r)
        },
        animate: function(e, t, n, r) {
            var i = v.isEmptyObject(e),
                s = v.speed(t, n, r),
                o = function() {
                    var t = Kn(this, v.extend({}, e), s);
                    i && t.stop(!0)
                };
            return i || s.queue === !1 ? this.each(o) : this.queue(s.queue, o)
        },
        stop: function(e, n, r) {
            var i = function(e) {
                var t = e.stop;
                delete e.stop, t(r)
            };
            return typeof e != "string" && (r = n, n = e, e = t), n && e !== !1 && this.queue(e || "fx", []), this.each(function() {
                var t = !0,
                    n = e != null && e + "queueHooks",
                    s = v.timers,
                    o = v._data(this);
                if (n) {
                    o[n] && o[n].stop && i(o[n])
                } else {
                    for (n in o) {
                        o[n] && o[n].stop && Wn.test(n) && i(o[n])
                    }
                }
                for (n = s.length; n--;) {
                    s[n].elem === this && (e == null || s[n].queue === e) && (s[n].anim.stop(r), t = !1, s.splice(n, 1))
                }(t || !r) && v.dequeue(this, e)
            })
        }
    }), v.each({
        slideDown: Zn("show"),
        slideUp: Zn("hide"),
        slideToggle: Zn("toggle"),
        fadeIn: {
            opacity: "show"
        },
        fadeOut: {
            opacity: "hide"
        },
        fadeToggle: {
            opacity: "toggle"
        }
    }, function(e, t) {
        v.fn[e] = function(e, n, r) {
            return this.animate(t, e, n, r)
        }
    }), v.speed = function(e, t, n) {
        var r = e && typeof e == "object" ? v.extend({}, e) : {
            complete: n || !n && t || v.isFunction(e) && e,
            duration: e,
            easing: n && t || t && !v.isFunction(t) && t
        };
        r.duration = v.fx.off ? 0 : typeof r.duration == "number" ? r.duration : r.duration in v.fx.speeds ? v.fx.speeds[r.duration] : v.fx.speeds._default;
        if (r.queue == null || r.queue === !0) {
            r.queue = "fx"
        }
        return r.old = r.complete, r.complete = function() {
            v.isFunction(r.old) && r.old.call(this), r.queue && v.dequeue(this, r.queue)
        }, r
    }, v.easing = {
        linear: function(e) {
            return e
        },
        swing: function(e) {
            return 0.5 - Math.cos(e * Math.PI) / 2
        }
    }, v.timers = [], v.fx = Yn.prototype.init, v.fx.tick = function() {
        var e, n = v.timers,
            r = 0;
        qn = v.now();
        for (; r < n.length; r++) {
            e = n[r], !e() && n[r] === e && n.splice(r--, 1)
        }
        n.length || v.fx.stop(), qn = t
    }, v.fx.timer = function(e) {
        e() && v.timers.push(e) && !Rn && (Rn = setInterval(v.fx.tick, v.fx.interval))
    }, v.fx.interval = 13, v.fx.stop = function() {
        clearInterval(Rn), Rn = null
    }, v.fx.speeds = {
        slow: 600,
        fast: 200,
        _default: 400
    }, v.fx.step = {}, v.expr && v.expr.filters && (v.expr.filters.animated = function(e) {
        return v.grep(v.timers, function(t) {
            return e === t.elem
        }).length
    });
    var er = /^(?:body|html)$/i;
    v.fn.offset = function(e) {
        if (arguments.length) {
            return e === t ? this : this.each(function(t) {
                v.offset.setOffset(this, e, t)
            })
        }
        var n, r, i, s, o, u, a, f = {
                top: 0,
                left: 0
            },
            l = this[0],
            c = l && l.ownerDocument;
        if (!c) {
            return
        }
        return (r = c.body) === l ? v.offset.bodyOffset(l) : (n = c.documentElement, v.contains(n, l) ? (typeof l.getBoundingClientRect != "undefined" && (f = l.getBoundingClientRect()), i = tr(c), s = n.clientTop || r.clientTop || 0, o = n.clientLeft || r.clientLeft || 0, u = i.pageYOffset || n.scrollTop, a = i.pageXOffset || n.scrollLeft, {
            top: f.top + u - s,
            left: f.left + a - o
        }) : f)
    }, v.offset = {
        bodyOffset: function(e) {
            var t = e.offsetTop,
                n = e.offsetLeft;
            return v.support.doesNotIncludeMarginInBodyOffset && (t += parseFloat(v.css(e, "marginTop")) || 0, n += parseFloat(v.css(e, "marginLeft")) || 0), {
                top: t,
                left: n
            }
        },
        setOffset: function(e, t, n) {
            var r = v.css(e, "position");
            r === "static" && (e.style.position = "relative");
            var i = v(e),
                s = i.offset(),
                o = v.css(e, "top"),
                u = v.css(e, "left"),
                a = (r === "absolute" || r === "fixed") && v.inArray("auto", [o, u]) > -1,
                f = {},
                l = {},
                c, h;
            a ? (l = i.position(), c = l.top, h = l.left) : (c = parseFloat(o) || 0, h = parseFloat(u) || 0), v.isFunction(t) && (t = t.call(e, n, s)), t.top != null && (f.top = t.top - s.top + c), t.left != null && (f.left = t.left - s.left + h), "using" in t ? t.using.call(e, f) : i.css(f)
        }
    }, v.fn.extend({
        position: function() {
            if (!this[0]) {
                return
            }
            var e = this[0],
                t = this.offsetParent(),
                n = this.offset(),
                r = er.test(t[0].nodeName) ? {
                    top: 0,
                    left: 0
                } : t.offset();
            return n.top -= parseFloat(v.css(e, "marginTop")) || 0, n.left -= parseFloat(v.css(e, "marginLeft")) || 0, r.top += parseFloat(v.css(t[0], "borderTopWidth")) || 0, r.left += parseFloat(v.css(t[0], "borderLeftWidth")) || 0, {
                top: n.top - r.top,
                left: n.left - r.left
            }
        },
        offsetParent: function() {
            return this.map(function() {
                var e = this.offsetParent || i.body;
                while (e && !er.test(e.nodeName) && v.css(e, "position") === "static") {
                    e = e.offsetParent
                }
                return e || i.body
            })
        }
    }), v.each({
        scrollLeft: "pageXOffset",
        scrollTop: "pageYOffset"
    }, function(e, n) {
        var r = /Y/.test(n);
        v.fn[e] = function(i) {
            return v.access(this, function(e, i, s) {
                var o = tr(e);
                if (s === t) {
                    return o ? n in o ? o[n] : o.document.documentElement[i] : e[i]
                }
                o ? o.scrollTo(r ? v(o).scrollLeft() : s, r ? s : v(o).scrollTop()) : e[i] = s
            }, e, i, arguments.length, null)
        }
    }), v.each({
        Height: "height",
        Width: "width"
    }, function(e, n) {
        v.each({
            padding: "inner" + e,
            content: n,
            "": "outer" + e
        }, function(r, i) {
            v.fn[i] = function(i, s) {
                var o = arguments.length && (r || typeof i != "boolean"),
                    u = r || (i === !0 || s === !0 ? "margin" : "border");
                return v.access(this, function(n, r, i) {
                    var s;
                    return v.isWindow(n) ? n.document.documentElement["client" + e] : n.nodeType === 9 ? (s = n.documentElement, Math.max(n.body["scroll" + e], s["scroll" + e], n.body["offset" + e], s["offset" + e], s["client" + e])) : i === t ? v.css(n, r, i, u) : v.style(n, r, i, u)
                }, n, o ? i : t, o, null)
            }
        })
    }), e.jQuery = e.$ = v, typeof define == "function" && define.amd && define.amd.jQuery && define("jquery", [], function() {
        return v
    })
})(window);
var jq18 = jQuery.noConflict(true);
(function(a) {
    (function(g, c) {
        function b(k, p) {
            var l, j, m, e = k.nodeName.toLowerCase();
            return "area" === e ? (l = k.parentNode, j = l.name, !k.href || !j || l.nodeName.toLowerCase() !== "map" ? !1 : (m = g("img[usemap=#" + j + "]")[0], !!m && d(m))) : (/input|select|textarea|button|object/.test(e) ? !k.disabled : "a" === e ? k.href || p : p) && d(k)
        }

        function d(e) {
            return g.expr.filters.visible(e) && !g(e).parents().andSelf().filter(function() {
                return g.css(this, "visibility") === "hidden"
            }).length
        }
        var h = 0,
            f = /^ui-id-\d+$/;
        g.ui = g.ui || {};
        if (g.ui.version) {
            return
        }
        g.extend(g.ui, {
                version: "1.9.2",
                keyCode: {
                    BACKSPACE: 8,
                    COMMA: 188,
                    DELETE: 46,
                    DOWN: 40,
                    END: 35,
                    ENTER: 13,
                    ESCAPE: 27,
                    HOME: 36,
                    LEFT: 37,
                    NUMPAD_ADD: 107,
                    NUMPAD_DECIMAL: 110,
                    NUMPAD_DIVIDE: 111,
                    NUMPAD_ENTER: 108,
                    NUMPAD_MULTIPLY: 106,
                    NUMPAD_SUBTRACT: 109,
                    PAGE_DOWN: 34,
                    PAGE_UP: 33,
                    PERIOD: 190,
                    RIGHT: 39,
                    SPACE: 32,
                    TAB: 9,
                    UP: 38
                }
            }), g.fn.extend({
                _focus: g.fn.focus,
                focus: function(e, j) {
                    return typeof e == "number" ? this.each(function() {
                        var k = this;
                        setTimeout(function() {
                            g(k).focus(), j && j.call(k)
                        }, e)
                    }) : this._focus.apply(this, arguments)
                },
                scrollParent: function() {
                    var e;
                    return g.ui.ie && /(static|relative)/.test(this.css("position")) || /absolute/.test(this.css("position")) ? e = this.parents().filter(function() {
                        return /(relative|absolute|fixed)/.test(g.css(this, "position")) && /(auto|scroll)/.test(g.css(this, "overflow") + g.css(this, "overflow-y") + g.css(this, "overflow-x"))
                    }).eq(0) : e = this.parents().filter(function() {
                        return /(auto|scroll)/.test(g.css(this, "overflow") + g.css(this, "overflow-y") + g.css(this, "overflow-x"))
                    }).eq(0), /fixed/.test(this.css("position")) || !e.length ? g(document) : e
                },
                zIndex: function(l) {
                    if (l !== c) {
                        return this.css("zIndex", l)
                    }
                    if (this.length) {
                        var k = g(this[0]),
                            e, j;
                        while (k.length && k[0] !== document) {
                            e = k.css("position");
                            if (e === "absolute" || e === "relative" || e === "fixed") {
                                j = parseInt(k.css("zIndex"), 10);
                                if (!isNaN(j) && j !== 0) {
                                    return j
                                }
                            }
                            k = k.parent()
                        }
                    }
                    return 0
                },
                uniqueId: function() {
                    return this.each(function() {
                        this.id || (this.id = "ui-id-" + ++h)
                    })
                },
                removeUniqueId: function() {
                    return this.each(function() {
                        f.test(this.id) && g(this).removeAttr("id")
                    })
                }
            }), g.extend(g.expr[":"], {
                data: g.expr.createPseudo ? g.expr.createPseudo(function(e) {
                    return function(j) {
                        return !!g.data(j, e)
                    }
                }) : function(e, k, j) {
                    return !!g.data(e, j[3])
                },
                focusable: function(e) {
                    return b(e, !isNaN(g.attr(e, "tabindex")))
                },
                tabbable: function(e) {
                    var k = g.attr(e, "tabindex"),
                        j = isNaN(k);
                    return (j || k >= 0) && b(e, !j)
                }
            }), g(function() {
                var e = document.body,
                    j = e.appendChild(j = document.createElement("div"));
                j.offsetHeight, g.extend(j.style, {
                    minHeight: "100px",
                    height: "auto",
                    padding: 0,
                    borderWidth: 0
                }), g.support.minHeight = j.offsetHeight === 100, g.support.selectstart = "onselectstart" in j, e.removeChild(j).style.display = "none"
            }), g("<a>").outerWidth(1).jquery || g.each(["Width", "Height"], function(p, l) {
                function e(o, v, u, q) {
                    return g.each(j, function() {
                        v -= parseFloat(g.css(o, "padding" + this)) || 0, u && (v -= parseFloat(g.css(o, "border" + this + "Width")) || 0), q && (v -= parseFloat(g.css(o, "margin" + this)) || 0)
                    }), v
                }
                var j = l === "Width" ? ["Left", "Right"] : ["Top", "Bottom"],
                    k = l.toLowerCase(),
                    m = {
                        innerWidth: g.fn.innerWidth,
                        innerHeight: g.fn.innerHeight,
                        outerWidth: g.fn.outerWidth,
                        outerHeight: g.fn.outerHeight
                    };
                g.fn["inner" + l] = function(o) {
                    return o === c ? m["inner" + l].call(this) : this.each(function() {
                        g(this).css(k, e(this, o) + "px")
                    })
                }, g.fn["outer" + l] = function(o, q) {
                    return typeof o != "number" ? m["outer" + l].call(this, o) : this.each(function() {
                        g(this).css(k, e(this, o, !0, q) + "px")
                    })
                }
            }), g("<a>").data("a-b", "a").removeData("a-b").data("a-b") && (g.fn.removeData = function(e) {
                return function(j) {
                    return arguments.length ? e.call(this, g.camelCase(j)) : e.call(this)
                }
            }(g.fn.removeData)),
            function() {
                var e = /msie ([\w.]+)/.exec(navigator.userAgent.toLowerCase()) || [];
                g.ui.ie = e.length ? !0 : !1, g.ui.ie6 = parseFloat(e[1], 10) === 6
            }(), g.fn.extend({
                disableSelection: function() {
                    return this.bind((g.support.selectstart ? "selectstart" : "mousedown") + ".ui-disableSelection", function(j) {
                        j.preventDefault()
                    })
                },
                enableSelection: function() {
                    return this.unbind(".ui-disableSelection")
                }
            }), g.extend(g.ui, {
                plugin: {
                    add: function(j, m, l) {
                        var e, k = g.ui[j].prototype;
                        for (e in l) {
                            k.plugins[e] = k.plugins[e] || [], k.plugins[e].push([m, l[e]])
                        }
                    },
                    call: function(m, k, o) {
                        var l, j = m.plugins[k];
                        if (!j || !m.element[0].parentNode || m.element[0].parentNode.nodeType === 11) {
                            return
                        }
                        for (l = 0; l < j.length; l++) {
                            m.options[j[l][0]] && j[l][1].apply(m.element, o)
                        }
                    }
                },
                contains: g.contains,
                hasScroll: function(j, l) {
                    if (g(j).css("overflow") === "hidden") {
                        return !1
                    }
                    var k = l && l === "left" ? "scrollLeft" : "scrollTop",
                        e = !1;
                    return j[k] > 0 ? !0 : (j[k] = 1, e = j[k] > 0, j[k] = 0, e)
                },
                isOverAxis: function(k, j, l) {
                    return k > j && k < j + l
                },
                isOver: function(j, p, l, e, k, m) {
                    return g.ui.isOverAxis(j, l, k) && g.ui.isOverAxis(p, e, m)
                }
            })
    })(a);
    (function(f, c) {
        var g = 0,
            d = Array.prototype.slice,
            b = f.cleanData;
        f.cleanData = function(e) {
            for (var k = 0, j;
                (j = e[k]) != null; k++) {
                try {
                    f(j).triggerHandler("remove")
                } catch (h) {}
            }
            b(e)
        }, f.widget = function(k, q, m) {
            var j, l, p, h, e = k.split(".")[0];
            k = k.split(".")[1], j = e + "-" + k, m || (m = q, q = f.Widget), f.expr[":"][j.toLowerCase()] = function(n) {
                return !!f.data(n, j)
            }, f[e] = f[e] || {}, l = f[e][k], p = f[e][k] = function(o, n) {
                if (!this._createWidget) {
                    return new p(o, n)
                }
                arguments.length && this._createWidget(o, n)
            }, f.extend(p, l, {
                version: m.version,
                _proto: f.extend({}, m),
                _childConstructors: []
            }), h = new q, h.options = f.widget.extend({}, h.options), f.each(m, function(o, n) {
                f.isFunction(n) && (m[o] = function() {
                    var t = function() {
                            return q.prototype[o].apply(this, arguments)
                        },
                        s = function(r) {
                            return q.prototype[o].apply(this, r)
                        };
                    return function() {
                        var r = this._super,
                            v = this._superApply,
                            u;
                        return this._super = t, this._superApply = s, u = n.apply(this, arguments), this._super = r, this._superApply = v, u
                    }
                }())
            }), p.prototype = f.widget.extend(h, {
                widgetEventPrefix: l ? h.widgetEventPrefix : k
            }, m, {
                constructor: p,
                namespace: e,
                widgetName: k,
                widgetBaseClass: j,
                widgetFullName: j
            }), l ? (f.each(l._childConstructors, function(o, u) {
                var s = u.prototype;
                f.widget(s.namespace + "." + s.widgetName, p, u._proto)
            }), delete l._childConstructors) : q._childConstructors.push(p), f.widget.bridge(k, p)
        }, f.widget.extend = function(m) {
            var j = d.call(arguments, 1),
                k = 0,
                l = j.length,
                h, e;
            for (; k < l; k++) {
                for (h in j[k]) {
                    e = j[k][h], j[k].hasOwnProperty(h) && e !== c && (f.isPlainObject(e) ? m[h] = f.isPlainObject(m[h]) ? f.widget.extend({}, m[h], e) : f.widget.extend({}, e) : m[h] = e)
                }
            }
            return m
        }, f.widget.bridge = function(j, e) {
            var h = e.prototype.widgetFullName || j;
            f.fn[j] = function(n) {
                var l = typeof n == "string",
                    k = d.call(arguments, 1),
                    m = this;
                return n = !l && k.length ? f.widget.extend.apply(null, [n].concat(k)) : n, l ? this.each(function() {
                    var p, o = f.data(this, h);
                    if (!o) {
                        return f.error("cannot call methods on " + j + " prior to initialization; attempted to call method '" + n + "'")
                    }
                    if (!f.isFunction(o[n]) || n.charAt(0) === "_") {
                        return f.error("no such method '" + n + "' for " + j + " widget instance")
                    }
                    p = o[n].apply(o, k);
                    if (p !== o && p !== c) {
                        return m = p && p.jquery ? m.pushStack(p.get()) : p, !1
                    }
                }) : this.each(function() {
                    var o = f.data(this, h);
                    o ? o.option(n || {})._init() : f.data(this, h, new e(n, this))
                }), m
            }
        }, f.Widget = function() {}, f.Widget._childConstructors = [], f.Widget.prototype = {
            widgetName: "widget",
            widgetEventPrefix: "",
            defaultElement: "<div>",
            options: {
                disabled: !1,
                create: null
            },
            _createWidget: function(e, h) {
                h = f(h || this.defaultElement || this)[0], this.element = f(h), this.uuid = g++, this.eventNamespace = "." + this.widgetName + this.uuid, this.options = f.widget.extend({}, this.options, this._getCreateOptions(), e), this.bindings = f(), this.hoverable = f(), this.focusable = f(), h !== this && (f.data(h, this.widgetName, this), f.data(h, this.widgetFullName, this), this._on(!0, this.element, {
                    remove: function(j) {
                        j.target === h && this.destroy()
                    }
                }), this.document = f(h.style ? h.ownerDocument : h.document || h), this.window = f(this.document[0].defaultView || this.document[0].parentWindow)), this._create(), this._trigger("create", null, this._getCreateEventData()), this._init()
            },
            _getCreateOptions: f.noop,
            _getCreateEventData: f.noop,
            _create: f.noop,
            _init: f.noop,
            destroy: function() {
                this._destroy(), this.element.unbind(this.eventNamespace).removeData(this.widgetName).removeData(this.widgetFullName).removeData(f.camelCase(this.widgetFullName)), this.widget().unbind(this.eventNamespace).removeAttr("aria-disabled").removeClass(this.widgetFullName + "-disabled ui-state-disabled"), this.bindings.unbind(this.eventNamespace), this.hoverable.removeClass("ui-state-hover"), this.focusable.removeClass("ui-state-focus")
            },
            _destroy: f.noop,
            widget: function() {
                return this.element
            },
            option: function(m, k) {
                var h = m,
                    j, l, e;
                if (arguments.length === 0) {
                    return f.widget.extend({}, this.options)
                }
                if (typeof m == "string") {
                    h = {}, j = m.split("."), m = j.shift();
                    if (j.length) {
                        l = h[m] = f.widget.extend({}, this.options[m]);
                        for (e = 0; e < j.length - 1; e++) {
                            l[j[e]] = l[j[e]] || {}, l = l[j[e]]
                        }
                        m = j.pop();
                        if (k === c) {
                            return l[m] === c ? null : l[m]
                        }
                        l[m] = k
                    } else {
                        if (k === c) {
                            return this.options[m] === c ? null : this.options[m]
                        }
                        h[m] = k
                    }
                }
                return this._setOptions(h), this
            },
            _setOptions: function(j) {
                var h;
                for (h in j) {
                    this._setOption(h, j[h])
                }
                return this
            },
            _setOption: function(j, h) {
                return this.options[j] = h, j === "disabled" && (this.widget().toggleClass(this.widgetFullName + "-disabled ui-state-disabled", !!h).attr("aria-disabled", h), this.hoverable.removeClass("ui-state-hover"), this.focusable.removeClass("ui-state-focus")), this
            },
            enable: function() {
                return this._setOption("disabled", !1)
            },
            disable: function() {
                return this._setOption("disabled", !0)
            },
            _on: function(h, l, k) {
                var e, j = this;
                typeof h != "boolean" && (k = l, l = h, h = !1), k ? (l = e = f(l), this.bindings = this.bindings.add(l)) : (k = l, l = this.element, e = this.widget()), f.each(k, function(q, t) {
                    function p() {
                        if (!h && (j.options.disabled === !0 || f(this).hasClass("ui-state-disabled"))) {
                            return
                        }
                        return (typeof t == "string" ? j[t] : t).apply(j, arguments)
                    }
                    typeof t != "string" && (p.guid = t.guid = t.guid || p.guid || f.guid++);
                    var n = q.match(/^(\w+)\s*(.*)$/),
                        s = n[1] + j.eventNamespace,
                        m = n[2];
                    m ? e.delegate(m, s, p) : l.bind(s, p)
                })
            },
            _off: function(j, h) {
                h = (h || "").split(" ").join(this.eventNamespace + " ") + this.eventNamespace, j.unbind(h).undelegate(h)
            },
            _delay: function(k, h) {
                function l() {
                    return (typeof k == "string" ? j[k] : k).apply(j, arguments)
                }
                var j = this;
                return setTimeout(l, h || 0)
            },
            _hoverable: function(e) {
                this.hoverable = this.hoverable.add(e), this._on(e, {
                    mouseenter: function(h) {
                        f(h.currentTarget).addClass("ui-state-hover")
                    },
                    mouseleave: function(h) {
                        f(h.currentTarget).removeClass("ui-state-hover")
                    }
                })
            },
            _focusable: function(e) {
                this.focusable = this.focusable.add(e), this._on(e, {
                    focusin: function(h) {
                        f(h.currentTarget).addClass("ui-state-focus")
                    },
                    focusout: function(h) {
                        f(h.currentTarget).removeClass("ui-state-focus")
                    }
                })
            },
            _trigger: function(h, m, k) {
                var e, j, l = this.options[h];
                k = k || {}, m = f.Event(m), m.type = (h === this.widgetEventPrefix ? h : this.widgetEventPrefix + h).toLowerCase(), m.target = this.element[0], j = m.originalEvent;
                if (j) {
                    for (e in j) {
                        e in m || (m[e] = j[e])
                    }
                }
                return this.element.trigger(m, k), !(f.isFunction(l) && l.apply(this.element[0], [m].concat(k)) === !1 || m.isDefaultPrevented())
            }
        }, f.each({
            show: "fadeIn",
            hide: "fadeOut"
        }, function(e, h) {
            f.Widget.prototype["_" + e] = function(m, k, l) {
                typeof k == "string" && (k = {
                    effect: k
                });
                var n, j = k ? k === !0 || typeof k == "number" ? h : k.effect || h : e;
                k = k || {}, typeof k == "number" && (k = {
                    duration: k
                }), n = !f.isEmptyObject(k), k.complete = l, k.delay && m.delay(k.delay), n && f.effects && (f.effects.effect[j] || f.uiBackCompat !== !1 && f.effects[j]) ? m[e](k) : j !== e && m[j] ? m[j](k.duration, k.easing, l) : m.queue(function(o) {
                    f(this)[e](), l && l.call(m[0]), o()
                })
            }
        }), f.uiBackCompat !== !1 && (f.Widget.prototype._getCreateOptions = function() {
            return f.metadata && f.metadata.get(this.element[0])[this.widgetName]
        })
    })(a);
    (function(c, b) {
        var d = !1;
        c(document).mouseup(function(f) {
            d = !1
        }), c.widget("ui.mouse", {
            version: "1.9.2",
            options: {
                cancel: "input,textarea,button,select,option",
                distance: 1,
                delay: 0
            },
            _mouseInit: function() {
                var e = this;
                this.element.bind("mousedown." + this.widgetName, function(f) {
                    return e._mouseDown(f)
                }).bind("click." + this.widgetName, function(f) {
                    if (!0 === c.data(f.target, e.widgetName + ".preventClickEvent")) {
                        return c.removeData(f.target, e.widgetName + ".preventClickEvent"), f.stopImmediatePropagation(), !1
                    }
                }), this.started = !1
            },
            _mouseDestroy: function() {
                this.element.unbind("." + this.widgetName), this._mouseMoveDelegate && c(document).unbind("mousemove." + this.widgetName, this._mouseMoveDelegate).unbind("mouseup." + this.widgetName, this._mouseUpDelegate)
            },
            _mouseDown: function(f) {
                if (d) {
                    return
                }
                this._mouseStarted && this._mouseUp(f), this._mouseDownEvent = f;
                var h = this,
                    e = f.which === 1,
                    g = typeof this.options.cancel == "string" && f.target.nodeName ? c(f.target).closest(this.options.cancel).length : !1;
                if (!e || g || !this._mouseCapture(f)) {
                    return !0
                }
                this.mouseDelayMet = !this.options.delay, this.mouseDelayMet || (this._mouseDelayTimer = setTimeout(function() {
                    h.mouseDelayMet = !0
                }, this.options.delay));
                if (this._mouseDistanceMet(f) && this._mouseDelayMet(f)) {
                    this._mouseStarted = this._mouseStart(f) !== !1;
                    if (!this._mouseStarted) {
                        return f.preventDefault(), !0
                    }
                }
                return !0 === c.data(f.target, this.widgetName + ".preventClickEvent") && c.removeData(f.target, this.widgetName + ".preventClickEvent"), this._mouseMoveDelegate = function(j) {
                    return h._mouseMove(j)
                }, this._mouseUpDelegate = function(j) {
                    return h._mouseUp(j)
                }, c(document).bind("mousemove." + this.widgetName, this._mouseMoveDelegate).bind("mouseup." + this.widgetName, this._mouseUpDelegate), f.preventDefault(), d = !0, !0
            },
            _mouseMove: function(e) {
                return !c.ui.ie || document.documentMode >= 9 || !!e.button ? this._mouseStarted ? (this._mouseDrag(e), e.preventDefault()) : (this._mouseDistanceMet(e) && this._mouseDelayMet(e) && (this._mouseStarted = this._mouseStart(this._mouseDownEvent, e) !== !1, this._mouseStarted ? this._mouseDrag(e) : this._mouseUp(e)), !this._mouseStarted) : this._mouseUp(e)
            },
            _mouseUp: function(e) {
                return c(document).unbind("mousemove." + this.widgetName, this._mouseMoveDelegate).unbind("mouseup." + this.widgetName, this._mouseUpDelegate), this._mouseStarted && (this._mouseStarted = !1, e.target === this._mouseDownEvent.target && c.data(e.target, this.widgetName + ".preventClickEvent", !0), this._mouseStop(e)), !1
            },
            _mouseDistanceMet: function(f) {
                return Math.max(Math.abs(this._mouseDownEvent.pageX - f.pageX), Math.abs(this._mouseDownEvent.pageY - f.pageY)) >= this.options.distance
            },
            _mouseDelayMet: function(f) {
                return this.mouseDelayMet
            },
            _mouseStart: function(f) {},
            _mouseDrag: function(f) {},
            _mouseStop: function(f) {},
            _mouseCapture: function(f) {
                return !0
            }
        })
    })(a);
    (function(w, A) {
        function q(f, c, h) {
            return [parseInt(f[0], 10) * (k.test(f[0]) ? c / 100 : 1), parseInt(f[1], 10) * (k.test(f[1]) ? h / 100 : 1)]
        }

        function d(c, e) {
            return parseInt(w.css(c, e), 10) || 0
        }
        w.ui = w.ui || {};
        var j, b = Math.max,
            m = Math.abs,
            B = Math.round,
            g = /left|center|right/,
            z = /top|center|bottom/,
            y = /[\+\-]\d+%?/,
            v = /^\w+/,
            k = /%$/,
            x = w.fn.position;
        w.position = {
                scrollbarWidth: function() {
                    if (j !== A) {
                        return j
                    }
                    var f, c, e = w("<div style='display:block;width:50px;height:50px;overflow:hidden;'><div style='height:100px;width:auto;'></div></div>"),
                        h = e.children()[0];
                    return w("body").append(e), f = h.offsetWidth, e.css("overflow", "scroll"), c = h.offsetWidth, f === c && (c = e[0].clientWidth), e.remove(), j = f - c
                },
                getScrollInfo: function(e) {
                    var l = e.isWindow ? "" : e.element.css("overflow-x"),
                        h = e.isWindow ? "" : e.element.css("overflow-y"),
                        c = l === "scroll" || l === "auto" && e.width < e.element[0].scrollWidth,
                        f = h === "scroll" || h === "auto" && e.height < e.element[0].scrollHeight;
                    return {
                        width: c ? w.position.scrollbarWidth() : 0,
                        height: f ? w.position.scrollbarWidth() : 0
                    }
                },
                getWithinInfo: function(c) {
                    var f = w(c || window),
                        e = w.isWindow(f[0]);
                    return {
                        element: f,
                        isWindow: e,
                        offset: f.offset() || {
                            left: 0,
                            top: 0
                        },
                        scrollLeft: f.scrollLeft(),
                        scrollTop: f.scrollTop(),
                        width: e ? f.width() : f.outerWidth(),
                        height: e ? f.height() : f.outerHeight()
                    }
                }
            }, w.fn.position = function(D) {
                if (!D || !D.of) {
                    return x.apply(this, arguments)
                }
                D = w.extend({}, D);
                var c, f, p, C, e, o = w(D.of),
                    s = w.position.getWithinInfo(D.within),
                    r = w.position.getScrollInfo(s),
                    u = o[0],
                    F = (D.collision || "flip").split(" "),
                    h = {};
                return u.nodeType === 9 ? (f = o.width(), p = o.height(), C = {
                    top: 0,
                    left: 0
                }) : w.isWindow(u) ? (f = o.width(), p = o.height(), C = {
                    top: o.scrollTop(),
                    left: o.scrollLeft()
                }) : u.preventDefault ? (D.at = "left top", f = p = 0, C = {
                    top: u.pageY,
                    left: u.pageX
                }) : (f = o.outerWidth(), p = o.outerHeight(), C = o.offset()), e = w.extend({}, C), w.each(["my", "at"], function() {
                    var t = (D[this] || "").split(" "),
                        E, l;
                    t.length === 1 && (t = g.test(t[0]) ? t.concat(["center"]) : z.test(t[0]) ? ["center"].concat(t) : ["center", "center"]), t[0] = g.test(t[0]) ? t[0] : "center", t[1] = z.test(t[1]) ? t[1] : "center", E = y.exec(t[0]), l = y.exec(t[1]), h[this] = [E ? E[0] : 0, l ? l[0] : 0], D[this] = [v.exec(t[0])[0], v.exec(t[1])[0]]
                }), F.length === 1 && (F[1] = F[0]), D.at[0] === "right" ? e.left += f : D.at[0] === "center" && (e.left += f / 2), D.at[1] === "bottom" ? e.top += p : D.at[1] === "center" && (e.top += p / 2), c = q(h.at, f, p), e.left += c[0], e.top += c[1], this.each(function() {
                    var n, M, J = w(this),
                        G = J.outerWidth(),
                        I = J.outerHeight(),
                        L = d(this, "marginLeft"),
                        K = d(this, "marginTop"),
                        E = G + L + d(this, "marginRight") + r.width,
                        H = I + K + d(this, "marginBottom") + r.height,
                        l = w.extend({}, e),
                        t = q(h.my, J.outerWidth(), J.outerHeight());
                    D.my[0] === "right" ? l.left -= G : D.my[0] === "center" && (l.left -= G / 2), D.my[1] === "bottom" ? l.top -= I : D.my[1] === "center" && (l.top -= I / 2), l.left += t[0], l.top += t[1], w.support.offsetFractions || (l.left = B(l.left), l.top = B(l.top)), n = {
                        marginLeft: L,
                        marginTop: K
                    }, w.each(["left", "top"], function(O, N) {
                        w.ui.position[F[O]] && w.ui.position[F[O]][N](l, {
                            targetWidth: f,
                            targetHeight: p,
                            elemWidth: G,
                            elemHeight: I,
                            collisionPosition: n,
                            collisionWidth: E,
                            collisionHeight: H,
                            offset: [c[0] + t[0], c[1] + t[1]],
                            my: D.my,
                            at: D.at,
                            within: s,
                            elem: J
                        })
                    }), w.fn.bgiframe && J.bgiframe(), D.using && (M = function(Q) {
                        var S = C.left - l.left,
                            P = S + f - G,
                            R = C.top - l.top,
                            N = R + p - I,
                            O = {
                                target: {
                                    element: o,
                                    left: C.left,
                                    top: C.top,
                                    width: f,
                                    height: p
                                },
                                element: {
                                    element: J,
                                    left: l.left,
                                    top: l.top,
                                    width: G,
                                    height: I
                                },
                                horizontal: P < 0 ? "left" : S > 0 ? "right" : "center",
                                vertical: N < 0 ? "top" : R > 0 ? "bottom" : "middle"
                            };
                        f < G && m(S + P) < f && (O.horizontal = "center"), p < I && m(R + N) < p && (O.vertical = "middle"), b(m(S), m(P)) > b(m(R), m(N)) ? O.important = "horizontal" : O.important = "vertical", D.using.call(this, Q, O)
                    }), J.offset(w.extend(l, {
                        using: M
                    }))
                })
            }, w.ui.position = {
                fit: {
                    left: function(r, E) {
                        var h = E.within,
                            l = h.isWindow ? h.scrollLeft : h.offset.left,
                            F = h.width,
                            c = r.left - E.collisionPosition.marginLeft,
                            D = l - c,
                            C = c + E.collisionWidth - F - l,
                            p;
                        E.collisionWidth > F ? D > 0 && C <= 0 ? (p = r.left + D + E.collisionWidth - F - l, r.left += D - p) : C > 0 && D <= 0 ? r.left = l : D > C ? r.left = l + F - E.collisionWidth : r.left = l : D > 0 ? r.left += D : C > 0 ? r.left -= C : r.left = b(r.left - c, r.left)
                    },
                    top: function(r, E) {
                        var h = E.within,
                            l = h.isWindow ? h.scrollTop : h.offset.top,
                            F = E.within.height,
                            c = r.top - E.collisionPosition.marginTop,
                            D = l - c,
                            C = c + E.collisionHeight - F - l,
                            p;
                        E.collisionHeight > F ? D > 0 && C <= 0 ? (p = r.top + D + E.collisionHeight - F - l, r.top += D - p) : C > 0 && D <= 0 ? r.top = l : D > C ? r.top = l + F - E.collisionHeight : r.top = l : D > 0 ? r.top += D : C > 0 ? r.top -= C : r.top = b(r.top - c, r.top)
                    }
                },
                flip: {
                    left: function(J, O) {
                        var F = O.within,
                            C = F.offset.left + F.scrollLeft,
                            P = F.width,
                            E = F.isWindow ? F.scrollLeft : F.offset.left,
                            N = J.left - O.collisionPosition.marginLeft,
                            M = N - E,
                            I = N + O.collisionWidth - P - E,
                            G = O.my[0] === "left" ? -O.elemWidth : O.my[0] === "right" ? O.elemWidth : 0,
                            L = O.at[0] === "left" ? O.targetWidth : O.at[0] === "right" ? -O.targetWidth : 0,
                            H = -2 * O.offset[0],
                            D, K;
                        if (M < 0) {
                            D = J.left + G + L + H + O.collisionWidth - P - C;
                            if (D < 0 || D < m(M)) {
                                J.left += G + L + H
                            }
                        } else {
                            if (I > 0) {
                                K = J.left - O.collisionPosition.marginLeft + G + L + H - E;
                                if (K > 0 || m(K) < I) {
                                    J.left += G + L + H
                                }
                            }
                        }
                    },
                    top: function(J, P) {
                        var F = P.within,
                            C = F.offset.top + F.scrollTop,
                            Q = F.height,
                            E = F.isWindow ? F.scrollTop : F.offset.top,
                            O = J.top - P.collisionPosition.marginTop,
                            M = O - E,
                            I = O + P.collisionHeight - Q - E,
                            G = P.my[1] === "top",
                            L = G ? -P.elemHeight : P.my[1] === "bottom" ? P.elemHeight : 0,
                            H = P.at[1] === "top" ? P.targetHeight : P.at[1] === "bottom" ? -P.targetHeight : 0,
                            D = -2 * P.offset[1],
                            K, N;
                        M < 0 ? (N = J.top + L + H + D + P.collisionHeight - Q - C, J.top + L + H + D > M && (N < 0 || N < m(M)) && (J.top += L + H + D)) : I > 0 && (K = J.top - P.collisionPosition.marginTop + L + H + D - E, J.top + L + H + D > I && (K > 0 || m(K) < I) && (J.top += L + H + D))
                    }
                },
                flipfit: {
                    left: function() {
                        w.ui.position.flip.left.apply(this, arguments), w.ui.position.fit.left.apply(this, arguments)
                    },
                    top: function() {
                        w.ui.position.flip.top.apply(this, arguments), w.ui.position.fit.top.apply(this, arguments)
                    }
                }
            },
            function() {
                var f, C, l, e, h, p = document.getElementsByTagName("body")[0],
                    c = document.createElement("div");
                f = document.createElement(p ? "div" : "body"), l = {
                    visibility: "hidden",
                    width: 0,
                    height: 0,
                    border: 0,
                    margin: 0,
                    background: "none"
                }, p && w.extend(l, {
                    position: "absolute",
                    left: "-1000px",
                    top: "-1000px"
                });
                for (h in l) {
                    f.style[h] = l[h]
                }
                f.appendChild(c), C = p || document.documentElement, C.insertBefore(f, C.firstChild), c.style.cssText = "position: absolute; left: 10.7432222px;", e = w(c).offset().left, w.support.offsetFractions = e > 10 && e < 11, f.innerHTML = "", C.removeChild(f)
            }(), w.uiBackCompat !== !1 && function(c) {
                var f = c.fn.position;
                c.fn.position = function(l) {
                    if (!l || !l.offset) {
                        return f.call(this, l)
                    }
                    var e = l.offset.split(" "),
                        h = l.at.split(" ");
                    return e.length === 1 && (e[1] = e[0]), /^\d/.test(e[0]) && (e[0] = "+" + e[0]), /^\d/.test(e[1]) && (e[1] = "+" + e[1]), h.length === 1 && (/left|center|right/.test(h[0]) ? h[1] = "center" : (h[1] = h[0], h[0] = "center")), f.call(this, c.extend(l, {
                        at: h[0] + e[0] + " " + h[1] + e[1],
                        offset: A
                    }))
                }
            }(a)
    })(a);
    (function(c, b) {
        c.widget("ui.draggable", c.ui.mouse, {
            version: "1.9.2",
            widgetEventPrefix: "drag",
            options: {
                addClasses: !0,
                appendTo: "parent",
                axis: !1,
                connectToSortable: !1,
                containment: !1,
                cursor: "auto",
                cursorAt: !1,
                grid: !1,
                handle: !1,
                helper: "original",
                iframeFix: !1,
                opacity: !1,
                refreshPositions: !1,
                revert: !1,
                revertDuration: 500,
                scope: "default",
                scroll: !0,
                scrollSensitivity: 20,
                scrollSpeed: 20,
                snap: !1,
                snapMode: "both",
                snapTolerance: 20,
                stack: !1,
                zIndex: !1
            },
            _create: function() {
                this.options.helper == "original" && !/^(?:r|a|f)/.test(this.element.css("position")) && (this.element[0].style.position = "relative"), this.options.addClasses && this.element.addClass("ui-draggable"), this.options.disabled && this.element.addClass("ui-draggable-disabled"), this._mouseInit()
            },
            _destroy: function() {
                this.element.removeClass("ui-draggable ui-draggable-dragging ui-draggable-disabled"), this._mouseDestroy()
            },
            _mouseCapture: function(d) {
                var e = this.options;
                return this.helper || e.disabled || c(d.target).is(".ui-resizable-handle") ? !1 : (this.handle = this._getHandle(d), this.handle ? (c(e.iframeFix === !0 ? "iframe" : e.iframeFix).each(function() {
                    c('<div class="ui-draggable-iframeFix" style="background: #fff;"></div>').css({
                        width: this.offsetWidth + "px",
                        height: this.offsetHeight + "px",
                        position: "absolute",
                        opacity: "0.001",
                        zIndex: 1000
                    }).css(c(this).offset()).appendTo("body")
                }), !0) : !1)
            },
            _mouseStart: function(d) {
                var e = this.options;
                return this.helper = this._createHelper(d), this.helper.addClass("ui-draggable-dragging"), this._cacheHelperProportions(), c.ui.ddmanager && (c.ui.ddmanager.current = this), this._cacheMargins(), this.cssPosition = this.helper.css("position"), this.scrollParent = this.helper.scrollParent(), this.offset = this.positionAbs = this.element.offset(), this.offset = {
                    top: this.offset.top - this.margins.top,
                    left: this.offset.left - this.margins.left
                }, c.extend(this.offset, {
                    click: {
                        left: d.pageX - this.offset.left,
                        top: d.pageY - this.offset.top
                    },
                    parent: this._getParentOffset(),
                    relative: this._getRelativeOffset()
                }), this.originalPosition = this.position = this._generatePosition(d), this.originalPageX = d.pageX, this.originalPageY = d.pageY, e.cursorAt && this._adjustOffsetFromHelper(e.cursorAt), e.containment && this._setContainment(), this._trigger("start", d) === !1 ? (this._clear(), !1) : (this._cacheHelperProportions(), c.ui.ddmanager && !e.dropBehaviour && c.ui.ddmanager.prepareOffsets(this, d), this._mouseDrag(d, !0), c.ui.ddmanager && c.ui.ddmanager.dragStart(this, d), !0)
            },
            _mouseDrag: function(d, f) {
                this.position = this._generatePosition(d), this.positionAbs = this._convertPositionTo("absolute");
                if (!f) {
                    var e = this._uiHash();
                    if (this._trigger("drag", d, e) === !1) {
                        return this._mouseUp({}), !1
                    }
                    this.position = e.position
                }
                if (!this.options.axis || this.options.axis != "y") {
                    this.helper[0].style.left = this.position.left + "px"
                }
                if (!this.options.axis || this.options.axis != "x") {
                    this.helper[0].style.top = this.position.top + "px"
                }
                return c.ui.ddmanager && c.ui.ddmanager.drag(this, d), !1
            },
            _mouseStop: function(e) {
                var h = !1;
                c.ui.ddmanager && !this.options.dropBehaviour && (h = c.ui.ddmanager.drop(this, e)), this.dropped && (h = this.dropped, this.dropped = !1);
                var g = this.element[0],
                    d = !1;
                while (g && (g = g.parentNode)) {
                    g == document && (d = !0)
                }
                if (!d && this.options.helper === "original") {
                    return !1
                }
                if (this.options.revert == "invalid" && !h || this.options.revert == "valid" && h || this.options.revert === !0 || c.isFunction(this.options.revert) && this.options.revert.call(this.element, h)) {
                    var f = this;
                    c(this.helper).animate(this.originalPosition, parseInt(this.options.revertDuration, 10), function() {
                        f._trigger("stop", e) !== !1 && f._clear()
                    })
                } else {
                    this._trigger("stop", e) !== !1 && this._clear()
                }
                return !1
            },
            _mouseUp: function(d) {
                return c("div.ui-draggable-iframeFix").each(function() {
                    this.parentNode.removeChild(this)
                }), c.ui.ddmanager && c.ui.ddmanager.dragStop(this, d), c.ui.mouse.prototype._mouseUp.call(this, d)
            },
            cancel: function() {
                return this.helper.is(".ui-draggable-dragging") ? this._mouseUp({}) : this._clear(), this
            },
            _getHandle: function(d) {
                var e = !this.options.handle || !c(this.options.handle, this.element).length ? !0 : !1;
                return c(this.options.handle, this.element).find("*").andSelf().each(function() {
                    this == d.target && (e = !0)
                }), e
            },
            _createHelper: function(d) {
                var f = this.options,
                    e = c.isFunction(f.helper) ? c(f.helper.apply(this.element[0], [d])) : f.helper == "clone" ? this.element.clone().removeAttr("id") : this.element;
                return e.parents("body").length || e.appendTo(f.appendTo == "parent" ? this.element[0].parentNode : f.appendTo), e[0] != this.element[0] && !/(fixed|absolute)/.test(e.css("position")) && e.css("position", "absolute"), e
            },
            _adjustOffsetFromHelper: function(d) {
                typeof d == "string" && (d = d.split(" ")), c.isArray(d) && (d = {
                    left: +d[0],
                    top: +d[1] || 0
                }), "left" in d && (this.offset.click.left = d.left + this.margins.left), "right" in d && (this.offset.click.left = this.helperProportions.width - d.right + this.margins.left), "top" in d && (this.offset.click.top = d.top + this.margins.top), "bottom" in d && (this.offset.click.top = this.helperProportions.height - d.bottom + this.margins.top)
            },
            _getParentOffset: function() {
                this.offsetParent = this.helper.offsetParent();
                var d = this.offsetParent.offset();
                this.cssPosition == "absolute" && this.scrollParent[0] != document && c.contains(this.scrollParent[0], this.offsetParent[0]) && (d.left += this.scrollParent.scrollLeft(), d.top += this.scrollParent.scrollTop());
                if (this.offsetParent[0] == document.body || this.offsetParent[0].tagName && this.offsetParent[0].tagName.toLowerCase() == "html" && c.ui.ie) {
                    d = {
                        top: 0,
                        left: 0
                    }
                }
                return {
                    top: d.top + (parseInt(this.offsetParent.css("borderTopWidth"), 10) || 0),
                    left: d.left + (parseInt(this.offsetParent.css("borderLeftWidth"), 10) || 0)
                }
            },
            _getRelativeOffset: function() {
                if (this.cssPosition == "relative") {
                    var d = this.element.position();
                    return {
                        top: d.top - (parseInt(this.helper.css("top"), 10) || 0) + this.scrollParent.scrollTop(),
                        left: d.left - (parseInt(this.helper.css("left"), 10) || 0) + this.scrollParent.scrollLeft()
                    }
                }
                return {
                    top: 0,
                    left: 0
                }
            },
            _cacheMargins: function() {
                this.margins = {
                    left: parseInt(this.element.css("marginLeft"), 10) || 0,
                    top: parseInt(this.element.css("marginTop"), 10) || 0,
                    right: parseInt(this.element.css("marginRight"), 10) || 0,
                    bottom: parseInt(this.element.css("marginBottom"), 10) || 0
                }
            },
            _cacheHelperProportions: function() {
                this.helperProportions = {
                    width: this.helper.outerWidth(),
                    height: this.helper.outerHeight()
                }
            },
            _setContainment: function() {
                var e = this.options;
                e.containment == "parent" && (e.containment = this.helper[0].parentNode);
                if (e.containment == "document" || e.containment == "window") {
                    this.containment = [e.containment == "document" ? 0 : c(window).scrollLeft() - this.offset.relative.left - this.offset.parent.left, e.containment == "document" ? 0 : c(window).scrollTop() - this.offset.relative.top - this.offset.parent.top, (e.containment == "document" ? 0 : c(window).scrollLeft()) + c(e.containment == "document" ? document : window).width() - this.helperProportions.width - this.margins.left, (e.containment == "document" ? 0 : c(window).scrollTop()) + (c(e.containment == "document" ? document : window).height() || document.body.parentNode.scrollHeight) - this.helperProportions.height - this.margins.top]
                }
                if (!/^(document|window|parent)$/.test(e.containment) && e.containment.constructor != Array) {
                    var h = c(e.containment),
                        g = h[0];
                    if (!g) {
                        return
                    }
                    var d = h.offset(),
                        f = c(g).css("overflow") != "hidden";
                    this.containment = [(parseInt(c(g).css("borderLeftWidth"), 10) || 0) + (parseInt(c(g).css("paddingLeft"), 10) || 0), (parseInt(c(g).css("borderTopWidth"), 10) || 0) + (parseInt(c(g).css("paddingTop"), 10) || 0), (f ? Math.max(g.scrollWidth, g.offsetWidth) : g.offsetWidth) - (parseInt(c(g).css("borderLeftWidth"), 10) || 0) - (parseInt(c(g).css("paddingRight"), 10) || 0) - this.helperProportions.width - this.margins.left - this.margins.right, (f ? Math.max(g.scrollHeight, g.offsetHeight) : g.offsetHeight) - (parseInt(c(g).css("borderTopWidth"), 10) || 0) - (parseInt(c(g).css("paddingBottom"), 10) || 0) - this.helperProportions.height - this.margins.top - this.margins.bottom], this.relative_container = h
                } else {
                    e.containment.constructor == Array && (this.containment = e.containment)
                }
            },
            _convertPositionTo: function(e, j) {
                j || (j = this.position);
                var g = e == "absolute" ? 1 : -1,
                    d = this.options,
                    f = this.cssPosition != "absolute" || this.scrollParent[0] != document && !!c.contains(this.scrollParent[0], this.offsetParent[0]) ? this.scrollParent : this.offsetParent,
                    h = /(html|body)/i.test(f[0].tagName);
                return {
                    top: j.top + this.offset.relative.top * g + this.offset.parent.top * g - (this.cssPosition == "fixed" ? -this.scrollParent.scrollTop() : h ? 0 : f.scrollTop()) * g,
                    left: j.left + this.offset.relative.left * g + this.offset.parent.left * g - (this.cssPosition == "fixed" ? -this.scrollParent.scrollLeft() : h ? 0 : f.scrollLeft()) * g
                }
            },
            _generatePosition: function(q) {
                var g = this.options,
                    d = this.cssPosition != "absolute" || this.scrollParent[0] != document && !!c.contains(this.scrollParent[0], this.offsetParent[0]) ? this.scrollParent : this.offsetParent,
                    j = /(html|body)/i.test(d[0].tagName),
                    v = q.pageX,
                    e = q.pageY;
                if (this.originalPosition) {
                    var p;
                    if (this.containment) {
                        if (this.relative_container) {
                            var m = this.relative_container.offset();
                            p = [this.containment[0] + m.left, this.containment[1] + m.top, this.containment[2] + m.left, this.containment[3] + m.top]
                        } else {
                            p = this.containment
                        }
                        q.pageX - this.offset.click.left < p[0] && (v = p[0] + this.offset.click.left), q.pageY - this.offset.click.top < p[1] && (e = p[1] + this.offset.click.top), q.pageX - this.offset.click.left > p[2] && (v = p[2] + this.offset.click.left), q.pageY - this.offset.click.top > p[3] && (e = p[3] + this.offset.click.top)
                    }
                    if (g.grid) {
                        var k = g.grid[1] ? this.originalPageY + Math.round((e - this.originalPageY) / g.grid[1]) * g.grid[1] : this.originalPageY;
                        e = p ? k - this.offset.click.top < p[1] || k - this.offset.click.top > p[3] ? k - this.offset.click.top < p[1] ? k + g.grid[1] : k - g.grid[1] : k : k;
                        var h = g.grid[0] ? this.originalPageX + Math.round((v - this.originalPageX) / g.grid[0]) * g.grid[0] : this.originalPageX;
                        v = p ? h - this.offset.click.left < p[0] || h - this.offset.click.left > p[2] ? h - this.offset.click.left < p[0] ? h + g.grid[0] : h - g.grid[0] : h : h
                    }
                }
                return {
                    top: e - this.offset.click.top - this.offset.relative.top - this.offset.parent.top + (this.cssPosition == "fixed" ? -this.scrollParent.scrollTop() : j ? 0 : d.scrollTop()),
                    left: v - this.offset.click.left - this.offset.relative.left - this.offset.parent.left + (this.cssPosition == "fixed" ? -this.scrollParent.scrollLeft() : j ? 0 : d.scrollLeft())
                }
            },
            _clear: function() {
                this.helper.removeClass("ui-draggable-dragging"), this.helper[0] != this.element[0] && !this.cancelHelperRemoval && this.helper.remove(), this.helper = null, this.cancelHelperRemoval = !1
            },
            _trigger: function(d, f, e) {
                return e = e || this._uiHash(), c.ui.plugin.call(this, d, [f, e]), d == "drag" && (this.positionAbs = this._convertPositionTo("absolute")), c.Widget.prototype._trigger.call(this, d, f, e)
            },
            plugins: {},
            _uiHash: function(d) {
                return {
                    helper: this.helper,
                    position: this.position,
                    originalPosition: this.originalPosition,
                    offset: this.positionAbs
                }
            }
        }), c.ui.plugin.add("draggable", "connectToSortable", {
            start: function(e, h) {
                var g = c(this).data("draggable"),
                    d = g.options,
                    f = c.extend({}, h, {
                        item: g.element
                    });
                g.sortables = [], c(d.connectToSortable).each(function() {
                    var j = c.data(this, "sortable");
                    j && !j.options.disabled && (g.sortables.push({
                        instance: j,
                        shouldRevert: j.options.revert
                    }), j.refreshPositions(), j._trigger("activate", e, f))
                })
            },
            stop: function(e, g) {
                var f = c(this).data("draggable"),
                    d = c.extend({}, g, {
                        item: f.element
                    });
                c.each(f.sortables, function() {
                    this.instance.isOver ? (this.instance.isOver = 0, f.cancelHelperRemoval = !0, this.instance.cancelHelperRemoval = !1, this.shouldRevert && (this.instance.options.revert = !0), this.instance._mouseStop(e), this.instance.options.helper = this.instance.options._helper, f.options.helper == "original" && this.instance.currentItem.css({
                        top: "auto",
                        left: "auto"
                    })) : (this.instance.cancelHelperRemoval = !1, this.instance._trigger("deactivate", e, d))
                })
            },
            drag: function(e, h) {
                var g = c(this).data("draggable"),
                    d = this,
                    f = function(w) {
                        var l = this.offset.click.top,
                            j = this.offset.click.left,
                            m = this.positionAbs.top,
                            x = this.positionAbs.left,
                            k = w.height,
                            v = w.width,
                            q = w.top,
                            p = w.left;
                        return c.ui.isOver(m + l, x + j, q, p, k, v)
                    };
                c.each(g.sortables, function(k) {
                    var l = !1,
                        j = this;
                    this.instance.positionAbs = g.positionAbs, this.instance.helperProportions = g.helperProportions, this.instance.offset.click = g.offset.click, this.instance._intersectsWith(this.instance.containerCache) && (l = !0, c.each(g.sortables, function() {
                        return this.instance.positionAbs = g.positionAbs, this.instance.helperProportions = g.helperProportions, this.instance.offset.click = g.offset.click, this != j && this.instance._intersectsWith(this.instance.containerCache) && c.ui.contains(j.instance.element[0], this.instance.element[0]) && (l = !1), l
                    })), l ? (this.instance.isOver || (this.instance.isOver = 1, this.instance.currentItem = c(d).clone().removeAttr("id").appendTo(this.instance.element).data("sortable-item", !0), this.instance.options._helper = this.instance.options.helper, this.instance.options.helper = function() {
                        return h.helper[0]
                    }, e.target = this.instance.currentItem[0], this.instance._mouseCapture(e, !0), this.instance._mouseStart(e, !0, !0), this.instance.offset.click.top = g.offset.click.top, this.instance.offset.click.left = g.offset.click.left, this.instance.offset.parent.left -= g.offset.parent.left - this.instance.offset.parent.left, this.instance.offset.parent.top -= g.offset.parent.top - this.instance.offset.parent.top, g._trigger("toSortable", e), g.dropped = this.instance.element, g.currentItem = g.element, this.instance.fromOutside = g), this.instance.currentItem && this.instance._mouseDrag(e)) : this.instance.isOver && (this.instance.isOver = 0, this.instance.cancelHelperRemoval = !0, this.instance.options.revert = !1, this.instance._trigger("out", e, this.instance._uiHash(this.instance)), this.instance._mouseStop(e, !0), this.instance.options.helper = this.instance.options._helper, this.instance.currentItem.remove(), this.instance.placeholder && this.instance.placeholder.remove(), g._trigger("fromSortable", e), g.dropped = !1)
                })
            }
        }), c.ui.plugin.add("draggable", "cursor", {
            start: function(e, g) {
                var f = c("body"),
                    d = c(this).data("draggable").options;
                f.css("cursor") && (d._cursor = f.css("cursor")), f.css("cursor", d.cursor)
            },
            stop: function(d, f) {
                var e = c(this).data("draggable").options;
                e._cursor && c("body").css("cursor", e._cursor)
            }
        }), c.ui.plugin.add("draggable", "opacity", {
            start: function(e, g) {
                var f = c(g.helper),
                    d = c(this).data("draggable").options;
                f.css("opacity") && (d._opacity = f.css("opacity")), f.css("opacity", d.opacity)
            },
            stop: function(d, f) {
                var e = c(this).data("draggable").options;
                e._opacity && c(f.helper).css("opacity", e._opacity)
            }
        }), c.ui.plugin.add("draggable", "scroll", {
            start: function(d, f) {
                var e = c(this).data("draggable");
                e.scrollParent[0] != document && e.scrollParent[0].tagName != "HTML" && (e.overflowOffset = e.scrollParent.offset())
            },
            drag: function(e, h) {
                var g = c(this).data("draggable"),
                    d = g.options,
                    f = !1;
                if (g.scrollParent[0] != document && g.scrollParent[0].tagName != "HTML") {
                    if (!d.axis || d.axis != "x") {
                        g.overflowOffset.top + g.scrollParent[0].offsetHeight - e.pageY < d.scrollSensitivity ? g.scrollParent[0].scrollTop = f = g.scrollParent[0].scrollTop + d.scrollSpeed : e.pageY - g.overflowOffset.top < d.scrollSensitivity && (g.scrollParent[0].scrollTop = f = g.scrollParent[0].scrollTop - d.scrollSpeed)
                    }
                    if (!d.axis || d.axis != "y") {
                        g.overflowOffset.left + g.scrollParent[0].offsetWidth - e.pageX < d.scrollSensitivity ? g.scrollParent[0].scrollLeft = f = g.scrollParent[0].scrollLeft + d.scrollSpeed : e.pageX - g.overflowOffset.left < d.scrollSensitivity && (g.scrollParent[0].scrollLeft = f = g.scrollParent[0].scrollLeft - d.scrollSpeed)
                    }
                } else {
                    if (!d.axis || d.axis != "x") {
                        e.pageY - c(document).scrollTop() < d.scrollSensitivity ? f = c(document).scrollTop(c(document).scrollTop() - d.scrollSpeed) : c(window).height() - (e.pageY - c(document).scrollTop()) < d.scrollSensitivity && (f = c(document).scrollTop(c(document).scrollTop() + d.scrollSpeed))
                    }
                    if (!d.axis || d.axis != "y") {
                        e.pageX - c(document).scrollLeft() < d.scrollSensitivity ? f = c(document).scrollLeft(c(document).scrollLeft() - d.scrollSpeed) : c(window).width() - (e.pageX - c(document).scrollLeft()) < d.scrollSensitivity && (f = c(document).scrollLeft(c(document).scrollLeft() + d.scrollSpeed))
                    }
                }
                f !== !1 && c.ui.ddmanager && !d.dropBehaviour && c.ui.ddmanager.prepareOffsets(g, e)
            }
        }), c.ui.plugin.add("draggable", "snap", {
            start: function(e, g) {
                var f = c(this).data("draggable"),
                    d = f.options;
                f.snapElements = [], c(d.snap.constructor != String ? d.snap.items || ":data(draggable)" : d.snap).each(function() {
                    var h = c(this),
                        j = h.offset();
                    this != f.element[0] && f.snapElements.push({
                        item: this,
                        width: h.outerWidth(),
                        height: h.outerHeight(),
                        top: j.top,
                        left: j.left
                    })
                })
            },
            drag: function(q, B) {
                var x = c(this).data("draggable"),
                    E = x.options,
                    w = E.snapTolerance,
                    A = B.offset.left,
                    k = A + x.helperProportions.width,
                    L = B.offset.top,
                    H = L + x.helperProportions.height;
                for (var D = x.snapElements.length - 1; D >= 0; D--) {
                    var J = x.snapElements[D].left,
                        F = J + x.snapElements[D].width,
                        z = x.snapElements[D].top,
                        I = z + x.snapElements[D].height;
                    if (!(J - w < A && A < F + w && z - w < L && L < I + w || J - w < A && A < F + w && z - w < H && H < I + w || J - w < k && k < F + w && z - w < L && L < I + w || J - w < k && k < F + w && z - w < H && H < I + w)) {
                        x.snapElements[D].snapping && x.options.snap.release && x.options.snap.release.call(x.element, q, c.extend(x._uiHash(), {
                            snapItem: x.snapElements[D].item
                        })), x.snapElements[D].snapping = !1;
                        continue
                    }
                    if (E.snapMode != "inner") {
                        var j = Math.abs(z - H) <= w,
                            C = Math.abs(I - L) <= w,
                            G = Math.abs(J - k) <= w,
                            e = Math.abs(F - A) <= w;
                        j && (B.position.top = x._convertPositionTo("relative", {
                            top: z - x.helperProportions.height,
                            left: 0
                        }).top - x.margins.top), C && (B.position.top = x._convertPositionTo("relative", {
                            top: I,
                            left: 0
                        }).top - x.margins.top), G && (B.position.left = x._convertPositionTo("relative", {
                            top: 0,
                            left: J - x.helperProportions.width
                        }).left - x.margins.left), e && (B.position.left = x._convertPositionTo("relative", {
                            top: 0,
                            left: F
                        }).left - x.margins.left)
                    }
                    var K = j || C || G || e;
                    if (E.snapMode != "outer") {
                        var j = Math.abs(z - L) <= w,
                            C = Math.abs(I - H) <= w,
                            G = Math.abs(J - A) <= w,
                            e = Math.abs(F - k) <= w;
                        j && (B.position.top = x._convertPositionTo("relative", {
                            top: z,
                            left: 0
                        }).top - x.margins.top), C && (B.position.top = x._convertPositionTo("relative", {
                            top: I - x.helperProportions.height,
                            left: 0
                        }).top - x.margins.top), G && (B.position.left = x._convertPositionTo("relative", {
                            top: 0,
                            left: J
                        }).left - x.margins.left), e && (B.position.left = x._convertPositionTo("relative", {
                            top: 0,
                            left: F - x.helperProportions.width
                        }).left - x.margins.left)
                    }!x.snapElements[D].snapping && (j || C || G || e || K) && x.options.snap.snap && x.options.snap.snap.call(x.element, q, c.extend(x._uiHash(), {
                        snapItem: x.snapElements[D].item
                    })), x.snapElements[D].snapping = j || C || G || e || K
                }
            }
        }), c.ui.plugin.add("draggable", "stack", {
            start: function(e, h) {
                var g = c(this).data("draggable").options,
                    d = c.makeArray(c(g.stack)).sort(function(j, k) {
                        return (parseInt(c(j).css("zIndex"), 10) || 0) - (parseInt(c(k).css("zIndex"), 10) || 0)
                    });
                if (!d.length) {
                    return
                }
                var f = parseInt(d[0].style.zIndex) || 0;
                c(d).each(function(j) {
                    this.style.zIndex = f + j
                }), this[0].style.zIndex = f + d.length
            }
        }), c.ui.plugin.add("draggable", "zIndex", {
            start: function(e, g) {
                var f = c(g.helper),
                    d = c(this).data("draggable").options;
                f.css("zIndex") && (d._zIndex = f.css("zIndex")), f.css("zIndex", d.zIndex)
            },
            stop: function(d, f) {
                var e = c(this).data("draggable").options;
                e._zIndex && c(f.helper).css("zIndex", e._zIndex)
            }
        })
    })(a)
})(jq18);
var Base64 = {
    _keyStr: "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-_*",
    encode: function(j) {
        var m = "";
        var d, b, g, p, c, l, k;
        var h = 0;
        j = Base64._utf8_encode(j);
        while (h < j.length) {
            d = j.charCodeAt(h++);
            b = j.charCodeAt(h++);
            g = j.charCodeAt(h++);
            p = d >> 2;
            c = (d & 3) << 4 | b >> 4;
            l = (b & 15) << 2 | g >> 6;
            k = g & 63;
            if (isNaN(b)) {
                l = k = 64
            } else {
                if (isNaN(g)) {
                    k = 64
                }
            }
            m = m + this._keyStr.charAt(p) + this._keyStr.charAt(c) + this._keyStr.charAt(l) + this._keyStr.charAt(k)
        }
        return m
    },
    decode: function(j) {
        var m = "";
        var d, b, g;
        var p, c, l, k;
        var h = 0;
        j = j.replace(/[^A-Za-z0-9\+\/\=]/g, "");
        while (h < j.length) {
            p = this._keyStr.indexOf(j.charAt(h++));
            c = this._keyStr.indexOf(j.charAt(h++));
            l = this._keyStr.indexOf(j.charAt(h++));
            k = this._keyStr.indexOf(j.charAt(h++));
            d = p << 2 | c >> 4;
            b = (c & 15) << 4 | l >> 2;
            g = (l & 3) << 6 | k;
            m = m + String.fromCharCode(d);
            if (l != 64) {
                m = m + String.fromCharCode(b)
            }
            if (k != 64) {
                m = m + String.fromCharCode(g)
            }
        }
        m = Base64._utf8_decode(m);
        return m
    },
    _utf8_encode: function(c) {
        c = c.replace(/\r\n/g, "\n");
        var a = "";
        for (var d = 0; d < c.length; d++) {
            var b = c.charCodeAt(d);
            if (b < 128) {
                a += String.fromCharCode(b)
            } else {
                if (b > 127 && b < 2048) {
                    a += String.fromCharCode(b >> 6 | 192);
                    a += String.fromCharCode(b & 63 | 128)
                } else {
                    a += String.fromCharCode(b >> 12 | 224);
                    a += String.fromCharCode(b >> 6 & 63 | 128);
                    a += String.fromCharCode(b & 63 | 128)
                }
            }
        }
        return a
    },
    _utf8_decode: function(c) {
        var a = "";
        var d = 0;
        var b = c1 = c2 = 0;
        while (d < c.length) {
            b = c.charCodeAt(d);
            if (b < 128) {
                a += String.fromCharCode(b);
                d++
            } else {
                if (b > 191 && b < 224) {
                    c2 = c.charCodeAt(d + 1);
                    a += String.fromCharCode((b & 31) << 6 | c2 & 63);
                    d += 2
                } else {
                    c2 = c.charCodeAt(d + 1);
                    c3 = c.charCodeAt(d + 2);
                    a += String.fromCharCode((b & 15) << 12 | (c2 & 63) << 6 | c3 & 63);
                    d += 3
                }
            }
        }
        return a
    }
};
var unityObject = {
    javaInstallDone: function(g, f, e) {
        var h = parseInt(g.substring(g.lastIndexOf("_") + 1), 10);
        if (!isNaN(h)) {
            setTimeout(function() {
                UnityObject2.instances[h].javaInstallDoneCallback(g, f, e)
            }, 10)
        }
    }
};
var UnityObject2 = function(ax) {
    var aI = [],
        a4 = window,
        ah = document,
        aj = navigator,
        aD = null,
        a5 = [],
        aC = (document.location.protocol == "https:"),
        aO = aC ? "https://ssl-webplayer.unity3d.com/" : "http://webplayer.unity3d.com/",
        aw = "_unity_triedjava",
        aA = bc(aw),
        aV = "_unity_triedclickonce",
        aS = bc(aV),
        aM = false,
        aJ = [],
        ar = false,
        aQ = null,
        a7 = null,
        aq = null,
        a1 = [],
        am = null,
        aW = [],
        ak = false,
        al = "installed",
        av = "missing",
        bb = "broken",
        aR = "unsupported",
        aH = "ready",
        aN = "start",
        aB = "error",
        ag = "first",
        aL = "java",
        aU = "clickonce",
        au = false,
        ao = null,
        aP = {
            pluginName: "Unity Player",
            pluginMimeType: "application/vnd.unity",
            baseDownloadUrl: aO + "download_webplayer-3.x/",
            fullInstall: false,
            autoInstall: false,
            enableJava: true,
            enableJVMPreloading: false,
            enableClickOnce: true,
            enableUnityAnalytics: false,
            enableGoogleAnalytics: true,
            params: {},
            attributes: {},
            referrer: null,
            debugLevel: 0
        };
    aP = jq18.extend(true, aP, ax);
    if (aP.referrer === "") {
        aP.referrer = null
    }
    if (aC) {
        aP.enableUnityAnalytics = false
    }

    function bc(b) {
        var a = new RegExp(escape(b) + "=([^;]+)");
        if (a.test(ah.cookie + ";")) {
            a.exec(ah.cookie + ";");
            return RegExp.$1
        }
        return false
    }

    function a8(b, a) {
        document.cookie = escape(b) + "=" + escape(a) + "; path=/"
    }

    function at(e) {
        var d = 0,
            a, f, h, c, b;
        if (e) {
            var g = e.toLowerCase().match(/^(\d+)(?:\.(\d+)(?:\.(\d+)([dabfr])?(\d+)?)?)?$/);
            if (g && g[1]) {
                a = g[1];
                f = g[2] ? g[2] : 0;
                h = g[3] ? g[3] : 0;
                c = g[4] ? g[4] : "r";
                b = g[5] ? g[5] : 0;
                d |= ((a / 10) % 10) << 28;
                d |= (a % 10) << 24;
                d |= (f % 10) << 20;
                d |= (h % 10) << 16;
                d |= {
                    d: 2 << 12,
                    a: 4 << 12,
                    b: 6 << 12,
                    f: 8 << 12,
                    r: 8 << 12
                }[c];
                d |= ((b / 100) % 10) << 8;
                d |= ((b / 10) % 10) << 4;
                d |= (b % 10)
            }
        }
        return d
    }

    function aF(d, c) {
        var a = ah.getElementsByTagName("body")[0];
        var b = ah.createElement("object");
        var f = 0;
        if (a && b) {
            b.setAttribute("type", aP.pluginMimeType);
            b.style.visibility = "hidden";
            a.appendChild(b);
            var e = 0;
            (function() {
                if (typeof b.GetPluginVersion === "undefined") {
                    if (e++ < 10) {
                        setTimeout(arguments.callee, 10)
                    } else {
                        a.removeChild(b);
                        d(null)
                    }
                } else {
                    var g = {};
                    if (c) {
                        for (f = 0; f < c.length; ++f) {
                            g[c[f]] = b.GetUnityVersion(c[f])
                        }
                    }
                    g.plugin = b.GetPluginVersion();
                    a.removeChild(b);
                    d(g)
                }
            })()
        } else {
            d(null)
        }
    }

    function ba() {
        var a = aP.fullInstall ? "UnityWebPlayerFull.exe" : "UnityWebPlayer.exe";
        if (aP.referrer !== null) {
            a += "?referrer=" + aP.referrer
        }
        return a
    }

    function aK() {
        var a = "UnityPlayer.plugin.zip";
        if (aP.referrer != null) {
            a += "?referrer=" + aP.referrer
        }
        return a
    }

    function a0() {
        return aP.baseDownloadUrl + (aT.win ? ba() : aK())
    }

    function aE(a, b, d, c) {
        if (a === av) {
            au = true
        }
        if (jq18.inArray(a, aW) === -1) {
            if (au) {
                a3.send(a, b, d, c)
            }
            aW.push(a)
        }
        am = a
    }
    var aT = function() {
        var g = aj.userAgent,
            e = aj.platform;
        var c = /chrome/i.test(g);
        var d = false;
        if (/msie/i.test(g)) {
            d = parseFloat(g.replace(/^.*msie ([0-9]+(\.[0-9]+)?).*$/i, "$1"))
        } else {
            if (/Trident/i.test(g)) {
                d = parseFloat(g.replace(/^.*rv:([0-9]+(\.[0-9]+)?).*$/i, "$1"))
            }
        }
        var b = {
            w3: typeof ah.getElementById != "undefined" && typeof ah.getElementsByTagName != "undefined" && typeof ah.createElement != "undefined",
            win: e ? /win/i.test(e) : /win/i.test(g),
            mac: e ? /mac/i.test(e) : /mac/i.test(g),
            ie: d,
            ff: /firefox/i.test(g),
            op: /opera/i.test(g),
            ch: c,
            ch_v: /chrome/i.test(g) ? parseFloat(g.replace(/^.*chrome\/(\d+(\.\d+)?).*$/i, "$1")) : false,
            sf: /safari/i.test(g) && !c,
            wk: /webkit/i.test(g) ? parseFloat(g.replace(/^.*webkit\/(\d+(\.\d+)?).*$/i, "$1")) : false,
            x64: /win64/i.test(g) && /x64/i.test(g),
            moz: /mozilla/i.test(g) ? parseFloat(g.replace(/^.*mozilla\/([0-9]+(\.[0-9]+)?).*$/i, "$1")) : 0,
            mobile: /ipad/i.test(e) || /iphone/i.test(e) || /ipod/i.test(e) || /android/i.test(g) || /windows phone/i.test(g)
        };
        b.clientBrand = b.ch ? "ch" : b.ff ? "ff" : b.sf ? "sf" : b.ie ? "ie" : b.op ? "op" : "??";
        b.clientPlatform = b.win ? "win" : b.mac ? "mac" : "???";
        var a = ah.getElementsByTagName("script");
        for (var j = 0; j < a.length; ++j) {
            var f = a[j].src.match(/^(.*)3\.0\/uo\/UnityObject2\.js$/i);
            if (f) {
                aP.baseDownloadUrl = f[1];
                break
            }
        }

        function h(l, m) {
            for (var k = 0; k < Math.max(l.length, m.length); ++k) {
                var n = (k < l.length) && l[k] ? new Number(l[k]) : 0;
                var o = (k < m.length) && m[k] ? new Number(m[k]) : 0;
                if (n < o) {
                    return -1
                }
                if (n > o) {
                    return 1
                }
            }
            return 0
        }
        b.java = function() {
            if (aj.javaEnabled()) {
                var k = (b.win && b.ff);
                var o = false;
                if (k || o) {
                    if (typeof aj.mimeTypes != "undefined") {
                        var p = k ? [1, 6, 0, 12] : [1, 4, 2, 0];
                        for (var l = 0; l < aj.mimeTypes.length; ++l) {
                            if (aj.mimeTypes[l].enabledPlugin) {
                                var n = aj.mimeTypes[l].type.match(/^application\/x-java-applet;(?:jpi-)?version=(\d+)(?:\.(\d+)(?:\.(\d+)(?:_(\d+))?)?)?$/);
                                if (n != null) {
                                    if (h(p, n.slice(1)) <= 0) {
                                        return true
                                    }
                                }
                            }
                        }
                    }
                } else {
                    if (b.win && b.ie) {
                        if (typeof ActiveXObject != "undefined") {
                            function m(s) {
                                try {
                                    return new ActiveXObject("JavaWebStart.isInstalled." + s + ".0") != null
                                } catch (r) {
                                    return false
                                }
                            }

                            function q(s) {
                                try {
                                    return new ActiveXObject("JavaPlugin.160_" + s) != null
                                } catch (r) {
                                    return false
                                }
                            }
                            if (m("1.7.0")) {
                                return true
                            }
                            if (b.ie >= 8) {
                                if (m("1.6.0")) {
                                    for (var l = 12; l <= 50; ++l) {
                                        if (q(l)) {
                                            if (b.ie == 9 && b.moz == 5 && l < 24) {
                                                continue
                                            } else {
                                                return true
                                            }
                                        }
                                    }
                                    return false
                                }
                            } else {
                                return m("1.6.0") || m("1.5.0") || m("1.4.2")
                            }
                        }
                    }
                }
            }
            return false
        }();
        b.co = function() {
            if (b.win && b.ie) {
                var n = g.match(/(\.NET CLR [0-9.]+)|(\.NET[0-9.]+)/g);
                if (n != null) {
                    var k = [3, 5, 0];
                    for (var l = 0; l < n.length; ++l) {
                        var m = n[l].match(/[0-9.]{2,}/g)[0].split(".");
                        if (h(k, m) <= 0) {
                            return true
                        }
                    }
                }
            }
            return false
        }();
        return b
    }();
    var a3 = function() {
        var c = function() {
            var h = new Date();
            var j = Date.UTC(h.getUTCFullYear(), h.getUTCMonth(), h.getUTCDay(), h.getUTCHours(), h.getUTCMinutes(), h.getUTCSeconds(), h.getUTCMilliseconds());
            return j.toString(16) + d().toString(16)
        }();
        var a = 0;
        var b = window._gaq = (window._gaq || []);
        f();

        function d() {
            return Math.floor(Math.random() * 2147483647)
        }

        function f() {
            var h = ("https:" == document.location.protocol ? "https://ssl" : "http://www") + ".google-analytics.com/ga.js";
            var l = ah.getElementsByTagName("script");
            var o = false;
            for (var j = 0; j < l.length; ++j) {
                if (l[j].src && l[j].src.toLowerCase() == h.toLowerCase()) {
                    o = true;
                    break
                }
            }
            if (!o) {
                var k = ah.createElement("script");
                k.type = "text/javascript";
                k.async = true;
                k.src = h;
                var m = document.getElementsByTagName("script")[0];
                m.parentNode.insertBefore(k, m)
            }
            var n = (aP.debugLevel === 0) ? "UA-16068464-16" : "UA-16068464-17";
            b.push(["unity._setDomainName", "none"]);
            b.push(["unity._setAllowLinker", true]);
            b.push(["unity._setReferrerOverride", " " + this.location.toString()]);
            b.push(["unity._setAccount", n]);
            b.push(["unity._setCustomVar", 1, "Revision", "e444f76e01cd", 2])
        }

        function g(j, l, h, m) {
            if (!aP.enableUnityAnalytics) {
                if (m) {
                    m()
                }
                return
            }
            var n = "http://unityanalyticscapture.appspot.com/event?u=" + encodeURIComponent(c) + "&s=" + encodeURIComponent(a) + "&e=" + encodeURIComponent(j);
            n += "&v=" + encodeURIComponent("e444f76e01cd");
            if (aP.referrer !== null) {
                n += "?r=" + aP.referrer
            }
            if (l) {
                n += "&t=" + encodeURIComponent(l)
            }
            if (h) {
                n += "&d=" + encodeURIComponent(h)
            }
            var k = new Image();
            if (m) {
                k.onload = k.onerror = m
            }
            k.src = n
        }

        function e(p, r, o, s) {
            if (!aP.enableGoogleAnalytics) {
                if (s) {
                    s()
                }
                return
            }
            var k = "/webplayer/install/" + p;
            var j = "?";
            if (r) {
                k += j + "t=" + encodeURIComponent(r);
                j = "&"
            }
            if (o) {
                k += j + "d=" + encodeURIComponent(o);
                j = "&"
            }
            if (s) {
                b.push(function() {
                    setTimeout(s, 1000)
                })
            }
            var m = aP.src;
            if (m.length > 40) {
                m = m.replace("http://", "");
                var q = m.split("/");
                var h = q.shift();
                var n = q.pop();
                m = h + "/../" + n;
                while (m.length < 40 && q.length > 0) {
                    var l = q.pop();
                    if (m.length + l.length + 5 < 40) {
                        n = l + "/" + n
                    } else {
                        n = "../" + n
                    }
                    m = h + "/../" + n
                }
            }
            b.push(["unity._setCustomVar", 2, "GameURL", m, 3]);
            b.push(["unity._setCustomVar", 1, "UnityObjectVersion", "2", 3]);
            if (r) {
                b.push(["unity._setCustomVar", 3, "installMethod", r, 3])
            }
            b.push(["unity._trackPageview", k])
        }
        return {
            send: function(k, l, h, n) {
                if (aP.enableUnityAnalytics || aP.enableGoogleAnalytics) {
                    aZ("Analytics SEND", k, l, h, n)
                }++a;
                var j = 2;
                var m = function() {
                    if (0 == --j) {
                        aQ = null;
                        window.location = n
                    }
                };
                if (h === null || h === undefined) {
                    h = ""
                }
                g(k, l, h, n ? m : null);
                e(k, l, h, n ? m : null)
            }
        }
    }();

    function ay(a, h, g) {
        var c, d, f, e, b;
        if (aT.win && aT.ie) {
            d = "";
            for (c in a) {
                d += " " + c + '="' + a[c] + '"'
            }
            f = "";
            for (c in h) {
                f += '<param name="' + c + '" value="' + h[c] + '" />'
            }
            g.outerHTML = "<object" + d + ">" + f + "</object>"
        } else {
            e = ah.createElement("object");
            for (c in a) {
                e.setAttribute(c, a[c])
            }
            for (c in h) {
                b = ah.createElement("param");
                b.name = c;
                b.value = h[c];
                e.appendChild(b)
            }
            g.parentNode.replaceChild(e, g)
        }
    }

    function aY(a) {
        if (typeof a == "undefined") {
            return false
        }
        if (!a.complete) {
            return false
        }
        if (typeof a.naturalWidth != "undefined" && a.naturalWidth == 0) {
            return false
        }
        return true
    }

    function az(d) {
        var b = false;
        for (var a = 0; a < a1.length; a++) {
            if (!a1[a]) {
                continue
            }
            var c = ah.images[a1[a]];
            if (!aY(c)) {
                b = true
            } else {
                a1[a] = null
            }
        }
        if (b) {
            setTimeout(arguments.callee, 100)
        } else {
            setTimeout(function() {
                a9(d)
            }, 100)
        }
    }

    function a9(f) {
        var d = ah.getElementById(f);
        if (!d) {
            d = ah.createElement("div");
            var c = ah.body.lastChild;
            ah.body.insertBefore(d, c.nextSibling)
        }
        var e = aP.baseDownloadUrl + "3.0/jws/";
        var b = {
            id: f,
            type: "application/x-java-applet",
            code: "JVMPreloader",
            width: 1,
            height: 1,
            name: "JVM Preloader"
        };
        var a = {
            context: f,
            codebase: e,
            classloader_cache: false,
            scriptable: true,
            mayscript: true
        };
        ay(b, a, d);
        jq18("#" + f).show()
    }

    function an(b) {
        aA = true;
        a8(aw, aA);
        var h = ah.getElementById(b);
        var f = b + "_applet_" + aD;
        aJ[f] = {
            attributes: aP.attributes,
            params: aP.params,
            callback: aP.callback,
            broken: aP.broken
        };
        var d = aJ[f];
        var g = {
            id: f,
            type: "application/x-java-applet",
            archive: aP.baseDownloadUrl + "3.0/jws/UnityWebPlayer.jar",
            code: "UnityWebPlayer",
            width: 1,
            height: 1,
            name: "Unity Web Player"
        };
        if (aT.win && aT.ff) {
            g.style = "visibility: hidden;"
        }
        var e = {
            context: f,
            jnlp_href: aP.baseDownloadUrl + "3.0/jws/UnityWebPlayer.jnlp",
            classloader_cache: false,
            installer: a0(),
            image: aO + "installation/unitylogo.png",
            centerimage: true,
            boxborder: false,
            scriptable: true,
            mayscript: true
        };
        for (var c in d.params) {
            if (c == "src") {
                continue
            }
            if (d.params[c] != Object.prototype[c]) {
                e[c] = d.params[c];
                if (c.toLowerCase() == "logoimage") {
                    e.image = d.params[c]
                } else {
                    if (c.toLowerCase() == "backgroundcolor") {
                        e.boxbgcolor = "#" + d.params[c]
                    } else {
                        if (c.toLowerCase() == "bordercolor") {
                            e.boxborder = true
                        } else {
                            if (c.toLowerCase() == "textcolor") {
                                e.boxfgcolor = "#" + d.params[c]
                            }
                        }
                    }
                }
            }
        }
        var a = ah.createElement("div");
        h.appendChild(a);
        ay(g, e, a);
        jq18("#" + b).show()
    }

    function ai(a) {
        setTimeout(function() {
            var b = ah.getElementById(a);
            if (b) {
                b.parentNode.removeChild(b)
            }
        }, 0)
    }

    function a6(f) {
        var e = aJ[f],
            g = ah.getElementById(f),
            a;
        if (!g) {
            return
        }
        g.width = e.attributes.width || 600;
        g.height = e.attributes.height || 450;
        var b = g.parentNode;
        var c = b.childNodes;
        for (var d = 0; d < c.length; d++) {
            a = c[d];
            if (a.nodeType == 1 && a != g) {
                b.removeChild(a)
            }
        }
    }

    function a2(a, c, b) {
        aZ("_javaInstallDoneCallback", a, c, b);
        if (!c) {
            aE(aB, aL, b)
        }
    }

    function aG() {
        aI.push(arguments);
        if (aP.debugLevel > 0 && window.console && window.console.log) {
            console.log(Array.prototype.slice.call(arguments))
        }
    }

    function aZ() {
        aI.push(arguments);
        if (aP.debugLevel > 1 && window.console && window.console.log) {
            console.log(Array.prototype.slice.call(arguments))
        }
    }

    function aX(a) {
        if (/^[-+]?[0-9]+$/.test(a)) {
            a += "px"
        }
        return a
    }
    var ap = {
        getLogHistory: function() {
            return aI
        },
        getConfig: function() {
            return aP
        },
        getPlatformInfo: function() {
            return aT
        },
        initPlugin: function(b, a) {
            aP.targetEl = b;
            aP.src = a;
            aZ("ua:", aT);
            this.detectUnity(this.handlePluginStatus)
        },
        detectUnity: function(a, m) {
            var c = this;
            var k = av;
            var j;
            aj.plugins.refresh();
            if (aT.clientBrand === "??" || aT.clientPlatform === "???" || aT.mobile) {
                k = aR
            } else {
                if (aT.op && aT.mac) {
                    k = aR;
                    j = "OPERA-MAC"
                } else {
                    if (typeof aj.plugins != "undefined" && aj.plugins[aP.pluginName] && typeof aj.mimeTypes != "undefined" && aj.mimeTypes[aP.pluginMimeType] && aj.mimeTypes[aP.pluginMimeType].enabledPlugin) {
                        k = al;
                        if (aT.sf && /Mac OS X 10_6/.test(aj.appVersion)) {
                            aF(function(o) {
                                if (!o || !o.plugin) {
                                    k = bb;
                                    j = "OSX10.6-SFx64"
                                }
                                aE(k, aq, j);
                                a.call(c, k, o)
                            }, m);
                            return
                        } else {
                            if (aT.mac && aT.ch) {
                                aF(function(o) {
                                    if (o && (at(o.plugin) <= at("2.6.1f3"))) {
                                        k = bb;
                                        j = "OSX-CH-U<=2.6.1f3"
                                    }
                                    aE(k, aq, j);
                                    a.call(c, k, o)
                                }, m);
                                return
                            } else {
                                if (m) {
                                    aF(function(o) {
                                        aE(k, aq, j);
                                        a.call(c, k, o)
                                    }, m);
                                    return
                                }
                            }
                        }
                    } else {
                        if (aT.ie) {
                            var l = false;
                            try {
                                if (ActiveXObject.prototype != null) {
                                    l = true
                                }
                            } catch (g) {}
                            if (!l || aT.x64) {
                                k = aR;
                                if (aT.x64) {
                                    j = "WIN-IEx64"
                                } else {
                                    j = "ActiveXFailed"
                                }
                            } else {
                                k = av;
                                try {
                                    var b = new ActiveXObject("UnityWebPlayer.UnityWebPlayer.1");
                                    var n = b.GetPluginVersion();
                                    if (m) {
                                        var f = {};
                                        for (var d = 0; d < m.length; ++d) {
                                            f[m[d]] = b.GetUnityVersion(m[d])
                                        }
                                        f.plugin = n
                                    }
                                    k = al;
                                    if (n == "2.5.0f5") {
                                        var e = /Windows NT \d+\.\d+/.exec(aj.userAgent);
                                        if (e && e.length > 0) {
                                            var h = parseFloat(e[0].split(" ")[2]);
                                            if (h >= 6) {
                                                k = bb;
                                                j = "WIN-U2.5.0f5"
                                            }
                                        }
                                    }
                                } catch (g) {}
                            }
                        }
                    }
                }
            }
            aE(k, aq, j);
            a.call(c, k, f)
        },
        handlePluginStatus: function(a, c) {
            var b = aP.targetEl;
            var e = jq18(b);
            switch (a) {
                case al:
                    this.notifyProgress(e);
                    this.embedPlugin(e, aP.callback);
                    break;
                case av:
                    this.notifyProgress(e);
                    var f = this;
                    var d = (aP.debugLevel === 0) ? 1000 : 8000;
                    setTimeout(function() {
                        aP.targetEl = b;
                        f.detectUnity(f.handlePluginStatus)
                    }, d);
                    break;
                case bb:
                    this.notifyProgress(e);
                    break;
                case aR:
                    this.notifyProgress(e);
                    break
            }
        },
        getPluginURL: function() {
            var a = "http://unity3d.com/webplayer/";
            if (aT.win) {
                a = aP.baseDownloadUrl + ba()
            } else {
                if (aj.platform == "MacIntel") {
                    a = aP.baseDownloadUrl + (aP.fullInstall ? "webplayer-i386.dmg" : "webplayer-mini.dmg");
                    if (aP.referrer !== null) {
                        a += "?referrer=" + aP.referrer
                    }
                } else {
                    if (aj.platform == "MacPPC") {
                        a = aP.baseDownloadUrl + (aP.fullInstall ? "webplayer-ppc.dmg" : "webplayer-mini.dmg");
                        if (aP.referrer !== null) {
                            a += "?referrer=" + aP.referrer
                        }
                    }
                }
            }
            return a
        },
        getClickOnceURL: function() {
            return aP.baseDownloadUrl + "3.0/co/UnityWebPlayer.application?installer=" + encodeURIComponent(aP.baseDownloadUrl + ba())
        },
        embedPlugin: function(j, a) {
            j = jq18(j).empty();
            var c = aP.src;
            var l = aP.width || "100%";
            var f = aP.height || "100%";
            var b = this;
            if (aT.win && aT.ie) {
                var k = "";
                for (var m in aP.attributes) {
                    if (aP.attributes[m] != Object.prototype[m]) {
                        if (m.toLowerCase() == "styleclass") {
                            k += ' class="' + aP.attributes[m] + '"'
                        } else {
                            if (m.toLowerCase() != "classid") {
                                k += " " + m + '="' + aP.attributes[m] + '"'
                            }
                        }
                    }
                }
                var g = "";
                g += '<param name="src" value="' + c + '" />';
                g += '<param name="firstFrameCallback" value="UnityObject2.instances[' + aD + '].firstFrameCallback();" />';
                for (var m in aP.params) {
                    if (aP.params[m] != Object.prototype[m]) {
                        if (m.toLowerCase() != "classid") {
                            g += '<param name="' + m + '" value="' + aP.params[m] + '" />'
                        }
                    }
                }
                var d = '<object classid="clsid:444785F1-DE89-4295-863A-D46C3A781394" style="display: block; width: ' + aX(l) + "; height: " + aX(f) + ';"' + k + ">" + g + "</object>";
                var e = jq18(d);
                j.append(e);
                a5.push(j.attr("id"));
                ao = e[0]
            } else {
                var h = jq18("<embed/>").attr({
                    src: c,
                    type: aP.pluginMimeType,
                    width: l,
                    height: f,
                    firstFrameCallback: "UnityObject2.instances[" + aD + "].firstFrameCallback();"
                }).attr(aP.attributes).attr(aP.params).css({
                    display: "block",
                    width: aX(l),
                    height: aX(f)
                }).appendTo(j);
                ao = h[0]
            }
            if (!aT.sf || !aT.mac) {
                setTimeout(function() {
                    ao.focus()
                }, 100)
            }
            if (a) {
                a()
            }
        },
        getBestInstallMethod: function() {
            var a = "Manual";
            if (aP.enableJava && aT.java && aA === false) {
                a = "JavaInstall"
            } else {
                if (aP.enableClickOnce && aT.co && aS === false) {
                    a = "ClickOnceIE"
                }
            }
            return a
        },
        installPlugin: function(b) {
            if (b == null || b == undefined) {
                b = this.getBestInstallMethod()
            }
            var c = null;
            switch (b) {
                case "JavaInstall":
                    this.doJavaInstall(aP.targetEl.id);
                    break;
                case "ClickOnceIE":
                    aS = true;
                    a8(aV, aS);
                    var a = jq18("<iframe src='" + this.getClickOnceURL() + "' style='display:none;' />");
                    jq18(aP.targetEl).append(a);
                    break;
                default:
                case "Manual":
                    var a = jq18("<iframe src='" + this.getPluginURL() + "' style='display:none;' />");
                    jq18(aP.targetEl).append(a);
                    break
            }
            aq = b;
            a3.send(aN, b, null, null)
        },
        trigger: function(a, b) {
            if (b) {
                aZ('trigger("' + a + '")', b)
            } else {
                aZ('trigger("' + a + '")')
            }
            jq18(document).trigger(a, b)
        },
        notifyProgress: function(b) {
            if (typeof aM !== "undefined" && typeof aM === "function") {
                var a = {
                    ua: aT,
                    pluginStatus: am,
                    bestMethod: null,
                    lastType: aq,
                    targetEl: aP.targetEl,
                    unityObj: this
                };
                if (am === av) {
                    a.bestMethod = this.getBestInstallMethod()
                }
                if (a7 !== am) {
                    a7 = am;
                    aM(a)
                }
            }
        },
        observeProgress: function(a) {
            aM = a
        },
        firstFrameCallback: function() {
            aZ("*** firstFrameCallback (" + aD + ") ***");
            am = ag;
            this.notifyProgress();
            if (au === true) {
                a3.send(am, aq)
            }
        },
        setPluginStatus: function(a, b, d, c) {
            aE(a, b, d, c)
        },
        doJavaInstall: function(a) {
            an(a)
        },
        jvmPreloaded: function(a) {
            ai(a)
        },
        appletStarted: function(a) {
            a6(a)
        },
        javaInstallDoneCallback: function(a, c, b) {
            a2(a, c, b)
        },
        getUnity: function() {
            return ao
        }
    };
    aD = UnityObject2.instances.length;
    UnityObject2.instances.push(ap);
    return ap
};
UnityObject2.instances = [];
var protocol = window.location.protocol + "//";
(function(a) {
    a.fn.tagHTML = function() {
        var b = a(a(this)[0].cloneNode(false));
        return b.html("").wrap("<div></div>").parent().html()
    };
    a.fn.outerHTML = function() {
        var b = a(a(this)[0].cloneNode(false));
        return b.clone().wrap("<div></div>").parent().html()
    };
    a.fn.linkPrompt = function(c, g, b, j) {
        a(".linkPrompt-view").fadeOut("fast", function() {
            a(this).remove()
        });
        if (b && b.pageY && b.pageX) {
            if (!j) {
                j = new Object()
            }
            if (!j.size) {
                j.size = 12
            }
            if (!j.width) {
                j.width = 80
            }
            if (!j.padding) {
                j.padding = "3px 18px 2px 2px"
            }
            if (!j.text) {
                j.text = "Acessar link"
            }
            if (!j.zIndex) {
                j.zIndex = 999
            }
            var h = a(this).offset();
            var d = a(this).width();
            h.left += d * 0.5;
            h.top = b.pageY - j.size;
            h.left = b.pageX;
            h.top -= 15;
            var f = -j.width * 0.5;
            var e = a("<a />").attr("href", c).attr("target", g).css("display", "block").html(j.text).css("font-size", j.size).css("width", j.width).css("padding", j.padding).css("position", "absolute").css("top", h.top + "px").css("left", h.left + "px").css("margin-left", f + "px").css("text-align", "center").addClass("linkPrompt-view").css("z-index", j.zIndex).fadeIn();
            a("body").append(e)
        }
    }
})(jq18);

function WLUnity(b) {
    var c = b;
    var a;
    this.viewTime = 0;
    this.loaded = 0;
    this.playing = false;
    this.currentGesture = "";
    this.initialize = function() {
        window.WLUnity = this;
        var e = {
            width: 240,
            height: 384,
            params: {
                enableDebugging: "0",
                backgroundcolor: "e7e7e7",
                bordercolor: "e7e7e7",
                textcolor: "666666",
                logoimage: c.getWlAutoRoot() + "/load/wlauto.png",
                progressbarimage: c.getWlAutoRoot() + "/load/bar.png",
                progressframeimage: c.getWlAutoRoot() + "/load/barFrame.png"
            }
        };
        e.params.disableContextMenu = true;
        a = new UnityObject2(e);
        var g = jq18("#wlautoPlayer").find(".broken");
        g.hide();
        a.observeProgress(function(h) {
            switch (h.pluginStatus) {
                case "broken":
                    g.find("a").click(function(k) {
                        k.stopPropagation();
                        k.preventDefault();
                        a.installPlugin();
                        return false
                    });
                    g.show();
                    break;
                case "missing":
                    var j = navigator.userAgent.toLowerCase().indexOf("chrome") > -1;
                    if (j) {
                        jq18("#wlautoScreen").append("<script src='http://arquivos.weblibras.com.br/auto/webgl/wlhtml5.js'><\/script>'");
                        return
                    } else {
                        jq18("#wlautoPlayer").append('<a href="http://unity3d.com/webplayer/" target="_blank" class="wlauto-noflash"><img src="' + c.getWlAutoRoot() + '/missingUnity.png" width="240" height="384" /></a>');
                        jq18("#wlautoPlayer").find("a").click(function(k) {
                            k.stopPropagation();
                            k.preventDefault();
                            a.installPlugin();
                            return false
                        })
                    }
                    break;
                case "installed":
                    jq18("#body").show();
                    break;
                case "unsupported":
                    jq18("#wlautoPlayer").append('<img src="' + c.getWlAutoRoot() + '/unsupportedUnity.png" width="240" height="384" />');
                    break;
                case "first":
                    break
            }
        });
        var d = WLPlayerVersion;
        var f = "weblibras." + d + ".unity3d";
        console.log(c.getWlAutoRoot() + "/" + f);
        jq18("<span />").attr("id", "WLautoVersionNumber").attr("style", "position:absolute; bottom:4px; right:7px; font-size:12px; color:#fff; font-family:Arial").text(d).appendTo("#wlautoContainer");
        f += "?t=" + (new Date().getTime()).toString();
        a.initPlugin(jq18("#wlautoPlayer")[0], c.getWlAutoRoot() + "/" + f);
        this.idleTimeout()
    };
    this.idleTimeout = function() {
        var d = Math.floor(8000 + Math.random() * 8000)
    };
    this.tryIDLE = function(e) {
        if (wlAutoObject.objPlayer.currentGesture == "") {
            var d = 5;
            var f = Math.floor(Math.random() * d) + 1;
            this.playGesture("_idle" + f, true)
        } else {}
    };
    this.playGesture = function(e, d) {
        if (e != this.currentGesture) {
            a.getUnity().SendMessage("WebLibras", "OpenText", e);
            this.currentGesture = e;
            this.playing = true;
            if (this.SetWLInteraction) {
                this.SetWLInteraction()
            }
        }
    };
    this.stopVideo = function() {
        a.getUnity().SendMessage("WebLibras", "Stop", "")
    };
    this.videoDone = function() {
        jq18(".linkPrompt-view").fadeOut("fast", function() {
            jq18(this).remove()
        });
        var d = this.currentGesture;
        this.currentGesture = "";
        if (wlAutoObject.continuousReading) {
            wlAutoObject.WlautoRequestNextTranslation(d)
        }
    };
    this.hideWlauto = function() {
        this.requestStop();
        this.currentGesture = ""
    };
    this.receiveInfo = function() {};
    this.requestPlay = function() {
        if (!this.playing) {} else {}
        this.playing = !this.playing
    };
    this.requestStop = function() {
        this.playing = false;
        this.stopVideo()
    };
    this.wlautoLoaded = function() {
        c.WlautoLoaded()
    };
    this.initialize(c);
    WLUnity.done = function() {
        this.playing = false;
        this.currentGesture = "";
        c.WlautoRequestNextTranslation()
    };
    WLUnity.executePreviousTranslation = function() {
        this.playing = false;
        this.currentGesture = "";
        c.WlautoRequestPreviousTranslation()
    };
    WLUnity.ready = function() {
        c.objPlayer.playGesture("_cliquenostextosaolado")
    };
    WLUnity.wlautoLoaded = function() {
        a.getUnity().SendMessage("WebLibras", "SendLog", WebLibras.siteType + "###" + navigator.userAgent);
        jq18("wlauto").addClass("wlautoHover")
    };
    WLUnity.removeWlAuto = function() {
        jq18("#startWlAuto").remove();
        jq18("#loadingWlAuto").remove();
        jq18("#imgAcessibilidadeWlAuto").remove();
        jq18("#wlautoContainer").remove();
        jq18("#balaoCliqueFrase").remove();
        jq18("#wlautoScreen").remove();
        jq18("wlauto").removeClass("wlautoHover").removeClass("wlautoPlaying")
    };
    WLUnity.getUnity = function() {
        return a
    };
    WLUnity.showAd = function(f, e, h, g) {
        var d = jq18("<img />").attr("src", h).load(function() {
            jq18("#wlautoPlayer").css("top", "-9999px").css("position", "absolute");
            jq18("#wlautoad").remove();
            jq18("#wlautoScreen").append(jq18("<div id='wlautoad'></div>").append(jq18("<a target='_blank' />").attr("href", e).append(d).click(function() {
                q18("#wlautoPlayer").css("top", "0");
                jq18("#wlautoad").remove();
                window.onfocus = function() {
                    jq18("#wlautoPlayer").css("top", "1");
                    setTimeout(function() {
                        jq18("#wlautoPlayer").css("top", "0")
                    }, 10)
                }
            }).css("position", "relative").append(jq18("<div />").css("position", "absolute").css("width", "100%").css("background", "rgba(0,0,0,0.63)").css("color", "#9d9d9d").css("font-size", "10px").css("font-family", "arial").css("bottom", "4px").css("padding", "10px 0").append("Esse an&uacute;ncio fechar&aacute; automaticamente<br /> em ").append(jq18("<span />").attr("id", "wlautoAdCounter").text(g).css("color", "#FFF")).append(" segundos.")).css("height", "384px").css("width", "240px")));
            var j = function(l) {
                var k = parseInt(jq18("#wlautoAdCounter").text()) - 1;
                if (k > 0) {
                    jq18("#wlautoAdCounter").text(k);
                    setTimeout(function() {
                        l(l)
                    }, 1000)
                } else {
                    jq18("#wlautoad").remove();
                    jq18("#wlautoPlayer").css("top", "1")
                }
            };
            setTimeout(function() {
                j(j)
            }, 1000)
        })
    };
    WLUnity.setDeniedImage = function(d) {
        jq18("#wlautoPlayer").html('<a href="http://weblibras.com.br" target="_blank" class="wlauto-noflash"><img src="' + c.getWlAutoRoot() + "/" + d + '.png" width="240" height="384" /></a>')
    }
}
var WebLibrasType = Object.freeze({
    Default: "default",
    Wordpress: "wordpress",
    Blogger: "blogger",
    Webnode: "webnode",
});
WebLibras.siteType = WebLibrasType.Default;

function WebLibras(r, b, o) {
    WebLibras.apiKey = "";
    WebLibras.siteType = "default";
    jq18.post("http://logging.weblibras.com.br/pageview/insert", {
        url: window.location.href
    });
    this.isWlAutoPlayerOnScreen = false;
    this.processedByWlAuto = false;
    this.objPlayer = false;
    this.imagePlayOnHover = false;
    this.continuousReading = true;
    this.autoStart = false;
    this.compatibility = (typeof o === "undefined") ? false : o;
    window.WLCompatibilityModeActivated = this.compatibility;
    var x = WLHost.substring(0, WLHost.lastIndexOf("/"));
    var e = WLHost;
    if (protocol.indexOf("https") > -1) {
        e = WLHttpsHost
    }
    var a = (typeof r == "string") ? r : "body";
    var l = 0;
    var f = 0;
    var c = 30;
    var t = 30;
    var q = 45;
    var z = l - q;
    var d = 31;
    var u = f + d;
    var B = 9999;
    var n = "fixed";
    var j = 9999;
    var v = (typeof b == "string") ? b : "body";
    var C = "255,255,0";
    var m = "194,220,245";
    var h = true;
    var p = "left";
    var w = "50%";
    this.getElementToAppendWL = function() {
        return a
    };
    this.getAlwaysDislpayHelp = function() {
        return alwaysDislpayHelp
    };
    this.getWlAutoRoot = function() {
        return e
    };
    this.getParentTagToApply = function() {
        return v
    };
    this.setSideDockedPosition = function(E, F) {
        p = E;
        w = F;
        h = false;
        var D = p == "right" ? w - 45 : w;
        jq18("#startWlAuto").css("left", "").css("right", "").css(p, w + "px");
        jq18("#loadingWlAuto").css("left", "").css("right", "").css(p, w + "px");
        jq18("#imgAcessibilidadeWlAuto").css("left", "").css("right", "").css(p, D + "px")
    };
    this.getIconMarginHPosition = function() {
        return l
    };
    this.setIconMarginHPosition = function(D) {
        l = D;
        z = l - q;
        jq18("#startWlAuto").css("margin-" + p, l + "px");
        jq18("#loadingWlAuto").css("margin-" + p, l + "px");
        jq18("#imgAcessibilidadeWlAuto").css("margin-" + p, z + "px")
    };
    this.getIconMarginVPosition = function() {
        return f
    };
    this.setIconMarginVPosition = function(D) {
        f = D;
        u = f + d;
        jq18("#startWlAuto").css("top", f + "px");
        jq18("#loadingWlAuto").css("top", f + "px");
        jq18("#imgAcessibilidadeWlAuto").css("top", u + "px")
    };
    this.getIconsPosition = function() {
        return f
    };
    this.setIconsPosition = function(D) {
        n = D;
        jq18("#startWlAuto").css("position", n);
        jq18("#loadingWlAuto").css("top", n);
        jq18("#imgAcessibilidadeWlAuto").css("top", n)
    };
    this.autoShowWlAuto = function() {
        jq18("#imgAcessibilidadeWlAuto").hide();
        jq18("#startWlAuto").hide();
        jq18("#loadingWlAuto").hide();
        this.autoStart = true;
        this.showWlAutoPlayer()
    };
    var k = ["V. Ex.Âª", "V. Mag.Âª", "V. Mag.Âª", "V. S.a", "V. S.", "Pe.", "DiÃ¡c.", "Ac.", "Ilmo.", "Sr.", "Sra.", "V. S.Âª", "Dr.", "Arq.", "Bib.", "Eng.", "Com.", "Prof.", "Des.", "Pr.", "Acad.", "AcadÃªm.", "Adm.", "Adv.", "Alm.", "Al.", "Bel.", "Bpo.", "Cad.", "Cap.", "Card.", "Com.", "Comte.", "Cons.", "Dep.", "DiÃ¡c.", "Dra.", "Exa.", "Gen.", "Gal.", "Ilma.", "Maj.", "MÃ©d.", "Mons.", "Pe.", "Ph.D.", "M.Sc.", "Rev.", "Srs.", "Sras.", "Srtas."];

    function y(I) {
        var L = "div, p, li, td, th, dt, dd, h1, h2, h3, h4, h5, h6, h7, br, dl";
        var D = "script, noscript, style, link";
        var J = "script";
        var K = "<wlauto>";
        var F = null;
        var N = jq18(I).tagHTML().split("><");
        var E = N[0] + ">";
        var G = jq18(I).contents();
        var M = "[~pr~]";
        var H = window.WLCompatibilityModeActivated;
        jq18(G).each(function() {
            if (this.nodeType == 3) {
                for (i = 0; i < k.length; i++) {
                    try {
                        if (jq18(this).text().toLowerCase().indexOf(" " + k[i].toLowerCase()) >= 0) {
                            var O = jq18(this).parent().html().replace(k[i], k[i].replace(".", "") + M);
                            jq18(this).parent().html(O)
                        }
                    } catch (P) {}
                }
            }
        });
        G = jq18(I).contents();
        jq18(G).each(function() {
            var P = this.nodeType == 8;
            if (!jq18(this).is(D) && !jq18(this).hasClass("no-wlauto") && (jq18(this).is(":visible") || H) && !P) {
                if (this.nodeType != 3) {
                    if (jq18(this).is("img")) {} else {
                        if (jq18(this).is(L)) {
                            if (F != null) {
                                F = null
                            }
                            y(this)
                        } else {
                            if (jq18(this).has(L).length) {
                                if (F != null) {
                                    F = null
                                }
                                y(this)
                            } else {
                                if (F == null) {
                                    F = jq18(K).insertBefore(jq18(this)).before(" ");
                                    //F.css("line-height", jq18(this).parent().css("line-height"))
                                }
                                jq18(this).find(J).remove();
                                jq18(this).appendTo(F)
                            }
                        }
                    }
                } else {
                    var R = jq18.trim(jq18(this).text());
                    if (R.length > 0) {
                        if (F == null) {
                            F = jq18(K).insertBefore(jq18(this)).before(" ");
                            //F.css("line-height", jq18(this).parent().css("line-height"))
                        }
                        var T = "[~]";
                        var S = jq18(this).text().replace(/\. /g, "." + T).replace(/\! /g, "!" + T).replace(/\? /g, "?" + T).replace(/\.$/g, "." + T).replace(/\!$/g, "!" + T).replace(/\?$/g, "?" + T);
                        S = S.replace(M, ".");
                        var O = S.split(T);
                        if (O.length > 1) {
                            for (var Q = 0; Q < O.length; Q++) {
                                F.append(O[Q]);
                                if (Q < O.length - 1) {
                                    F = jq18(K).insertBefore(jq18(this)).before(" ");
                                    //F.css("line-height", jq18(this).parent().css("line-height"))
                                }
                            }
                        } else {
                            F.append(jq18(this).text())
                        }
                        jq18(this).remove()
                    }
                }
            }
        })
    }

    function A(D) {
        jq18("wlauto").click(function(E) {
            if (jq18(this).hasClass("wlautoHover")) {
                if (jq18(this).text().length > WLMaxTranslationSize) {
                    jq18(this).removeClass("wlautoHover");
                    E.preventDefault()
                } else {
                    jq18(".linkPrompt-view").fadeOut("fast", function() {
                        jq18(this).remove()
                    });
                    jq18("wlauto.wlautoPlaying").removeClass("wlautoPlaying");
                    jq18(this).addClass("wlautoPlaying");
                    try {
                        var F = "";
                        var G = "";
                        if (jq18(this).parents("a").length != 0) {
                            F = jq18(this).parents("a").first().attr("href");
                            G = jq18(this).parents("a").first().attr("target")
                        } else {
                            if (jq18(E.target).parents("a").length != 0) {
                                F = jq18(E.target).parents("a").first().attr("href");
                                G = jq18(E.target).parents("a").first().attr("target")
                            } else {
                                if (jq18(E.target).is("a")) {
                                    F = jq18(E.target).attr("href");
                                    G = jq18(E.target).attr("target")
                                }
                            }
                        }
                        if (F != undefined && F != null && F != "" && F[0] != "#" && F.indexOf("javascript") != 0) {
                            E.preventDefault();
                            jq18(this).linkPrompt(F, G, E)
                        }
                    } catch (H) {
                        jq18("wlauto.wlautoPlaying").removeClass("wlautoPlaying")
                    }
                    D.objPlayer.playGesture(jq18(this).text())
                }
            }
        })
    }
    this.showWlAutoPlayer = function() {
        var D = this;
        if (!D.processedByWlAuto) {
            jq18("#startWlAuto").hide();
            jq18("#loadingWlAuto").show();
            D.objPlayer = new WLUnity(D);
            y(D.getParentTagToApply());
            jq18("wlauto").each(function() {
                var F = this;
                if (jq18(F).text().length > WLMaxTranslationSize) {
                    var G = [];
                    for (var E = 0; E < F.childNodes.length; E++) {
                        G.push(F.childNodes[E])
                    }
                    for (var E = 0; E < G.length; E++) {
                        jq18(G[E]).insertBefore(F)
                    }
                    jq18(F).remove()
                }
            });
            A(D);
            D.processedByWlAuto = true;
            D.WlautoLoaded(false)
        } else {
            jq18("wlauto").addClass("wlautoHover");
            D.DelayedShow(true)
        }
        this.SetWLInteraction()
    };
    this.WlautoLoaded = function(D, F) {
        try {
            D = D ? true : false
        } catch (E) {}
        this.DelayedShow(D, F)
    };
    this.DelayedShow = function(D, E) {
        var F = this;
        if (typeof E == "number") {
            setTimeout(function() {
                if (!F.isWlAutoPlayerOnScreen) {
                    WebLibras.showWindow(F, D)
                }
            }, E)
        } else {
            if (!F.isWlAutoPlayerOnScreen || !D) {
                WebLibras.showWindow(F, D)
            }
        }
    };
    WebLibras.showWindow = function(F, D) {
        g();
        var E = {
            top: "159px"
        };
        if (F.autoStart) {
            E = {
                top: "159px",
                left: "50%",
                "margin-left": "165px"
            }
        }
        jq18("#wlautoContainer").animate(E, "fast", function() {
            if (!D) {
                jq18("#balaoCliqueFrase").show(600);
                F.DelayedPlay.call(F, 250);
                jq18("#startWlAuto").show();
                jq18("#loadingWlAuto").hide()
            }
        });
        F.isWlAutoPlayerOnScreen = true
    };
    this.DelayedPlay = function(D) {
        var E = this;
        setTimeout(function() {
            try {
                if (!E.autoStart) {
                    E.objPlayer.playGesture("_cliquenostextosaolado")
                } else {
                    jq18("wlauto[hash]").first().click()
                }
            } catch (F) {}
            if (jq18("#balaoCliqueFrase").is(":visible")) {
                setTimeout("jq18('#balaoCliqueFrase').hide(600)", 5000)
            }
        }, D)
    };

    function g() {
        var D = jq18(".wlautoPlaying");
        D.removeClass("wlautoPlaying")
    }
    this.closeWlAutoPlayer = function() {
        g();
        jq18("#wlautoContainer").animate({
            top: "-800px"
        }, "fast");
        this.isWlAutoPlayerOnScreen = false;
        jq18("wlauto").removeClass("wlautoRealce");
        this.objPlayer.hideWlauto();
        this.currentGesture = "";
        jq18(".linkPrompt-view").fadeOut("fast", function() {
            jq18(this).remove()
        });
        jq18("wlauto").removeClass("wlautoHover").removeClass("wlautoPlaying");
        this.ClearWLInteraction()
    };
    this.hideHint = function(E) {
        var D = E ? "fast" : "slow";
        try {
            jq18("#imgAcessibilidadeWlAuto").fadeOut(D)
        } catch (F) {}
    };
    this.showHint = function(E) {
        var D = E ? "fast" : "slow";
        try {
            jq18("#imgAcessibilidadeWlAuto").fadeIn(D);
            if (!E) {
                setTimeout(s.hideHint, 1000)
            }
        } catch (F) {}
    };
    this.InsertHTMLElements = function() {
        var I = this;
        var G = I.getElementToAppendWL();
        if (G != "body") {
            n = "relative";
            f = 0;
            h = false;
            w = 0;
            u = 0
        }

        jq18("<a />").addClass("no-wlauto").attr("href", "#").attr("id", "startWlAuto").html('Traduzir para Libras').appendTo(G).click(function() {
            var D = jq18("<div />").addClass("no-wlauto").attr("id", "wlautoContainer");
            D.appendTo("body");
            jq18("<div id='wlautoHandle'>").addClass("no-wlauto").css("position", "absolute").css("left", "9px").css("top", "2px").css("width", "210px").css("height", "23px").css("cursor", "move").appendTo(D);
            
            jq18("<img />").addClass("no-wlauto").attr("src", e + "/close-wlauto.png").attr("id", "closeWlAuto").attr("display", "none").css("cursor", "pointer").css("position", "absolute").css("z-index", (j + 1)).css("top", "5px").css("right", "8px").css("width", "16px").css("height", "16px").css("background", "url(" + e + "/close-wlauto.png) no-repeat top left").appendTo(D).click(function() {
                I.closeWlAutoPlayer()
            });

            var H = jq18("<div />").addClass("no-wlauto").attr("id", "wlautoScreen").css("position", "absolute").css("top", "24px").css("left", "12px").appendTo(D);
            jq18("<div />").addClass("no-wlauto").attr("id", "wlautoPlayer").appendTo(H);
            var F = "border: 1px solid rgb(" + m + ") !important;margin:-1px;";
            var E = "outline: 1px solid rgb(" + m + ") !important;";
            var K = "border: 1px solid rgb(" + C + ") !important;margin:-1px;";
            var J = "outline: 1px solid rgb(" + C + ") !important;";
            jq18("<style type='text/css'>#wlautoContainer {position:fixed !important; z-index:" + j + "; top:-800px; right:10px; background:url(" + e + "/wlauto-background.png) no-repeat top left; width:264px; height:434px; text-align:center; opacity: 1 !important;}#wlautoPlayer {width:240px; height:384px}#wlautoPlayer .wlauto-noflash *{border:none;}.linkPrompt-view{color:#333;background-color:#FFF;border:1px solid;border-color:#777;border-color:rgba(0,0,0,0.5);text-decoration:none;background-position:middle right;background-repeat:no-repeat;border-radius:15px;background:#FFF url(" + e + '/arrow.png) no-repeat center right;font-family:Arial, Helvetica, "sans-serif";box-shadow:2px 2px 4px rgba(0,0,0,0.1);}.linkPrompt-view:hover{color:#000;text-decoration:underline;background-color:rgba(255,255,255,1);}.wlautoHover:hover, .wlautoHover *:hover{background-color:rgb(' + m + ") !important;}.wlautoHover.wlautoImage{" + ((jq18.browser.msie && (jq18.browser.version == "7.0" || jq18.browser.version == "8.0")) ? F : E) + "}.wlautoPlaying, .wlautoPlaying *{background-color:rgb(" + C + ") !important;}.wlautoPlaying:hover, .wlautoPlaying *:hover{background-color:rgb(" + C + ") !important;}.wlautoPlaying.wlautoImage{" + ((jq18.browser.msie && (jq18.browser.version == "7.0" || jq18.browser.version == "8.0")) ? K : J) + "}</style>").appendTo("head");
            jq18("<a />").addClass("no-wlauto").attr("id", "linkWlAuto").attr("href", "http://www.weblibras.com.br").attr("target", "_blank").css("position", "absolute").css("bottom", "6px").css("left", "75px").css("width", "101px").css("height", "13px").css("text-decoration", "none").css("background-color", "transparent").appendTo(D);
            jq18(function() {
                jq18("#wlautoContainer").draggable({
                    containment: "window"
                })
            });
            jq18("#wlautoScreen").hover(function() {
                jq18("#wlautoContainer").draggable("disable")
            }, function() {
                jq18("#wlautoContainer").draggable("enable")
            })

            I.showWlAutoPlayer()
        });

        /*
        jq18("<input />").addClass("no-wlauto").attr("type", "image").attr("src", e + "/loading.gif").attr("id", "loadingWlAuto").css("display", "none").css("position", n).css("z-index", B).css("top", f + "px").css(p, h ? "50%" : w).css("margin-" + p, l + "px").css("width", c + "px").css("height", t + "px").appendTo(G);
        jq18("<img />").addClass("no-wlauto").attr("src", e + "/acessibilidade-grande.png").attr("id", "imgAcessibilidadeWlAuto").attr("display", "none").css("position", n).css("cursor", "pointer").css("z-index", B).css("top", u + "px").css(p, h ? "50%" : w).css("margin-" + p, z + "px").css("width", "120px").css("height", "172px").appendTo(G).click(function() {
            I.showWlAutoPlayer()
        });
        */

        
    };
    this.WlautoRequestNextTranslation = function() {
        var E = jq18("wlauto:parent");
        var F = E.filter(".wlautoPlaying").removeClass("wlautoPlaying");
        var D = E.index(F.last());
        if (D == -1) {
            return
        }
        if (D < E.length && E[D + 1] != null) {
            if (jq18.trim(jq18(E[D + 1]).text()) != "") {
                E[D + 1].click()
            } else {
                jq18(E[D + 1]).addClass("wlautoPlaying");
                this.WlautoRequestNextTranslation()
            }
        }
    };
    this.WlautoRequestPreviousTranslation = function() {
        var E = jq18("wlauto:parent");
        var F = E.filter(".wlautoPlaying").removeClass("wlautoPlaying");
        var D = E.index(F.last());
        if (D == -1) {
            return
        }
        if (D > 0 && E[D - 1] != null) {
            if (jq18.trim(jq18(E[D - 1]).text()) != "") {
                E[D - 1].click()
            } else {
                jq18(E[D - 1]).addClass("wlautoPlaying");
                this.WlautoRequestPreviousTranslation()
            }
        }
    };
    this.CheckWLInteraction = function() {
        var E = this.GetWLInteractionValue();
        if (E != null) {
            var D = new Date();
            E.setMinutes(E.getMinutes() + 5);
            return E > D
        } else {
            return false
        }
    };
    this.SetWLInteraction = function() {
        if (typeof(Storage) !== "undefined") {
            sessionStorage.WLInteractionTime = new Date()
        } else {
            document.cookie = "WLInteractionTime=" + (new Date())
        }
    };
    this.ClearWLInteraction = function() {
        if (typeof(Storage) !== "undefined") {
            sessionStorage.WLInteractionTime = null
        } else {
            document.cookie = "WLInteractionTime=; expires=Thu, 01 Jan 1970 00:00:01 GMT;"
        }
    };
    this.GetWLInteractionValue = function() {
        if (typeof(Storage) !== "undefined") {
            if (sessionStorage.WLInteractionTime) {
                return new Date(sessionStorage.WLInteractionTime)
            } else {
                return null
            }
        } else {
            var F = "WLInteractionTime=";
            var D = document.cookie.split(";");
            for (var E = 0; E < D.length; E++) {
                var G = D[E];
                while (G.charAt(0) == " ") {
                    G = G.substring(1, G.length)
                }
                if (G.indexOf(F) == 0) {
                    return new Date(G.substring(F.length, G.length))
                }
            }
            return null
        }
    };
    this.OpenText = function(D) {
        WLUnity.playGesture(D)
    };
    var s = this;
    jq18(document).ready(function() {
        if (!WebLibras.hideAcessibilityImage) {
            setTimeout(s.showHint, 500)
        }
        s.InsertHTMLElements();
        if (WebLibras.hideAcessibilityImage) {
            //jq18("#imgAcessibilidadeWlAuto").hide()
        }
        if (s.CheckWLInteraction()) {
            s.autoShowWlAuto()
        }
        var D = 1;
        jq18(window).resize(function() {
            jq18("#wlautoContainer").css("marginTop", (D) + "px");
            D += 2;
            setTimeout(function() {
                jq18("#wlautoContainer").css("marginTop", "0px")
            }, 1)
        })
    })
};