function gsm() {
    for (var a = diap.length - 2, b = [], c = 0; c < a; c++) b.push(['<div class="ui-slider-mark-c" style=" left:', pixelDiap[c], 'px; "></div><div style="position:absolute; top:-18px; left:', pixelDiap[c], 'px; font-size:9px; color:#444"><div style="position:relative; top:0; left:-50%;">', diap[c + 1], "</div></div>"].join(""));
    return ['<div style="position:relative; width:100%; height:5px;"><div style="font-size:1px; position:absolute; top:-6px; left:0%; width:1px; height:11px; background:#000; margin-left:-1px;"></div><div style="position:absolute; top:-18px; left:0%; font-size:9px; color:#444;"><div style="position:relative; top:0; left:-50%;">&lt;</div></div>', b.join(""), '<div style="position:absolute; top:-6px; left:100%; width:1px; height:11px; background:#000; font-size:1px; z-index:1000"></div><div style="position:absolute; top:-18px; left:100%; font-size:9px; color:#444;"><div style="position:relative; top:0; left:-50%;">&gt;</div></div></div>'].join("")
}

function chts(a, b) {
    var c = 0;
    if ("" === a && 0 == b.side) return c = 1;
    if ("" === a && 1 == b.side) return c = w - 1;
    if (0 === a && 1 == b.side) return c = 1;
    if (1 == b.side) {
        for (var d = 0; d < 5; d++)
            if (Number(diap[d]) == Number(a)) return 0 == d ? 1 : pixelDiap[d - 1];
        c = w - 1;
        for (var e = result.length, f = e; f > 0; f--)
            if (a >= result[f] && a <= result[f + 1]) {
                c = f;
                break
            }
    } else {
        for (var d = 0; d < 5; d++)
            if (Number(diap[d]) == Number(a)) return 0 == d ? 0 : 4 == d ? pixelDiap[d - 1] - 1 : pixelDiap[d - 1];
        c = 0;
        for (var e = result.length, f = 0; f < e; f++)
            if (a >= result[f] && a <= result[f + 1]) {
                c = f;
                break
            }
    }
    return c
}

function cmtp(a, b) {
    md = [];
    var c = void 0 != a ? a : $("#min_price").data("min-price"),
        d = void 0 != b ? b : $("#max_price").data("max-price");
    md[0] = c, md[1] = d, pmd = [];
    for (var e = 0; e < md.length; e++) {
        var f = 1;
        for (m = 1; m < 5; m++) Number(md[e]) > Number(diap[m]) && f++;
        var g = Math.abs(Math.round(md[e])).toString().length;
        g > 2 && (md[e] = otr(Math.round(md[e]), 2 - g)), pmd.push(chts(md[e], {
            side: e
        }))
    }
    $(".ui-widget-header-bar").css({
        left: pmd[0],
        width: pmd[1] - pmd[0] + 1
    }), pmd[1] == pmd[0] || md[1] == md[0] ? $(".ui-widget-header-bar, .ui-widget-header-left, .ui-widget-header-right").hide() : $(".ui-widget-header-bar, .ui-widget-header-left, .ui-widget-header-right").show(), $(".ui-widget-header-left").css({
        left: pmd[0]
    }), $(".ui-widget-header-right").css({
        right: w - 1 - pmd[1]
    })
}

function umda(a) {
    var b = void 0 != a ? a : currentHandle,
        c = $("#slider_price").slider("values")[b],
        d = $(".ui-widget-header-bar"),
        e = $(".ui-widget-header-left"),
        f = $(".ui-widget-header-right"),
        g = "ui-widget-header-hidden",
        h = [parseInt(d.css("left")), w - parseInt(f.css("right"))];
    b ? c < h[0] ? f.css({
        width: h[1] - h[0]
    }).removeClass(g) : c < h[1] ? f.css({
        width: h[1] - c
    }).removeClass(g) : f.addClass(g) : c > h[1] ? e.css({
        width: h[1] - h[0]
    }).removeClass(g) : c > h[0] ? e.css({
        width: c - h[0]
    }).removeClass(g) : e.addClass(g)
}

function notr(a, b) {
    return Math.round(a / Math.pow(10, b)) * Math.pow(10, b)
}

function otr(a, b) {
    var c = String(a).length;
    return Number(String(a).substr(0, c + b)) * Math.pow(10, b * -1)
}

function popover(a) {
    return "<div class='popover'><div><div class='total_view'>Найдено " + a + "</div><div class='apply'><a href='#'></a></div></div></div>"
}

function count_filter(a) {
    return "<div class='total_view'>Найдено " + a + "</div>"
}! function(a) {
    "use strict";

    function c(b) {
        var c = b.data;
        b.isDefaultPrevented() || (b.preventDefault(), a(this).ajaxSubmit(c))
    }

    function d(b) {
        var c = b.target,
            d = a(c);
        if (!d.is(":submit,input:image")) {
            var e = d.closest(":submit");
            if (0 === e.length) return;
            c = e[0]
        }
        var f = this;
        if (f.clk = c, "image" == c.type)
            if (void 0 !== b.offsetX) f.clk_x = b.offsetX, f.clk_y = b.offsetY;
            else if ("function" == typeof a.fn.offset) {
                var g = d.offset();
                f.clk_x = b.pageX - g.left, f.clk_y = b.pageY - g.top
            } else f.clk_x = b.pageX - c.offsetLeft, f.clk_y = b.pageY - c.offsetTop;
        setTimeout(function() {
            f.clk = f.clk_x = f.clk_y = null
        }, 100)
    }

    function e() {
        if (a.fn.ajaxSubmit.debug) {
            var b = "[jquery.form] " + Array.prototype.join.call(arguments, "");
            window.console && window.console.log ? window.console.log(b) : window.opera && window.opera.postError && window.opera.postError(b)
        }
    }
    var b = {};
    b.fileapi = void 0 !== a("<input type='file'/>").get(0).files, b.formdata = void 0 !== window.FormData, a.fn.ajaxSubmit = function(c) {
        function y(b) {
            var f, g, c = a.param(b).split("&"),
                d = c.length,
                e = {};
            for (f = 0; f < d; f++) g = c[f].split("="), e[decodeURIComponent(g[0])] = decodeURIComponent(g[1]);
            return e
        }

        function z(b) {
            for (var e = new FormData, f = 0; f < b.length; f++) e.append(b[f].name, b[f].value);
            if (c.extraData) {
                var g = y(c.extraData);
                for (var h in g) g.hasOwnProperty(h) && e.append(h, g[h])
            }
            c.data = null;
            var i = a.extend(!0, {}, a.ajaxSettings, c, {
                contentType: !1,
                processData: !1,
                cache: !1,
                type: d || "POST"
            });
            c.uploadProgress && (i.xhr = function() {
                var a = jQuery.ajaxSettings.xhr();
                return a.upload && (a.upload.onprogress = function(a) {
                    var b = 0,
                        d = a.loaded || a.position,
                        e = a.total;
                    a.lengthComputable && (b = Math.ceil(d / e * 100)), c.uploadProgress(a, d, e, b)
                }), a
            }), i.data = null;
            var j = i.beforeSend;
            return i.beforeSend = function(a, b) {
                b.data = e, j && j.call(this, a, b)
            }, a.ajax(i)
        }

        function A(b) {
            function y(a) {
                var b = a.contentWindow ? a.contentWindow.document : a.contentDocument ? a.contentDocument : a.document;
                return b
            }

            function B() {
                function g() {
                    try {
                        var a = y(o).readyState;
                        e("state = " + a), a && "uninitialized" == a.toLowerCase() && setTimeout(g, 50)
                    } catch (a) {
                        e("Server abort: ", a, " (", a.name, ")"), G(x), t && clearTimeout(t), t = void 0
                    }
                }
                var b = h.attr("target"),
                    c = h.attr("action");
                f.setAttribute("target", m), d || f.setAttribute("method", "POST"), c != j.url && f.setAttribute("action", j.url), j.skipEncodingOverride || d && !/post/i.test(d) || h.attr({
                    encoding: "multipart/form-data",
                    enctype: "multipart/form-data"
                }), j.timeout && (t = setTimeout(function() {
                    s = !0, G(w)
                }, j.timeout));
                var i = [];
                try {
                    if (j.extraData)
                        for (var k in j.extraData) j.extraData.hasOwnProperty(k) && (a.isPlainObject(j.extraData[k]) && j.extraData[k].hasOwnProperty("name") && j.extraData[k].hasOwnProperty("value") ? i.push(a('<input type="hidden" name="' + j.extraData[k].name + '">').attr("value", j.extraData[k].value).appendTo(f)[0]) : i.push(a('<input type="hidden" name="' + k + '">').attr("value", j.extraData[k]).appendTo(f)[0]));
                    j.iframeTarget || (n.appendTo("body"), o.attachEvent ? o.attachEvent("onload", G) : o.addEventListener("load", G, !1)), setTimeout(g, 15), f.submit()
                } finally {
                    f.setAttribute("action", c), b ? f.setAttribute("target", b) : h.removeAttr("target"), a(i).remove()
                }
            }

            function G(b) {
                if (!p.aborted && !F) {
                    try {
                        D = y(o)
                    } catch (a) {
                        e("cannot access response document: ", a), b = x
                    }
                    if (b === w && p) return p.abort("timeout"), void v.reject(p, "timeout");
                    if (b == x && p) return p.abort("server abort"), void v.reject(p, "error", "server abort");
                    if (D && D.location.href != j.iframeSrc || s) {
                        o.detachEvent ? o.detachEvent("onload", G) : o.removeEventListener("load", G, !1);
                        var d, c = "success";
                        try {
                            if (s) throw "timeout";
                            var f = "xml" == j.dataType || D.XMLDocument || a.isXMLDoc(D);
                            if (e("isXml=" + f), !f && window.opera && (null === D.body || !D.body.innerHTML) && --E) return e("requeing onLoad callback, DOM not available"), void setTimeout(G, 250);
                            var g = D.body ? D.body : D.documentElement;
                            p.responseText = g ? g.innerHTML : null, p.responseXML = D.XMLDocument ? D.XMLDocument : D, f && (j.dataType = "xml"), p.getResponseHeader = function(a) {
                                var b = {
                                    "content-type": j.dataType
                                };
                                return b[a]
                            }, g && (p.status = Number(g.getAttribute("status")) || p.status, p.statusText = g.getAttribute("statusText") || p.statusText);
                            var h = (j.dataType || "").toLowerCase(),
                                i = /(json|script|text)/.test(h);
                            if (i || j.textarea) {
                                var k = D.getElementsByTagName("textarea")[0];
                                if (k) p.responseText = k.value, p.status = Number(k.getAttribute("status")) || p.status, p.statusText = k.getAttribute("statusText") || p.statusText;
                                else if (i) {
                                    var m = D.getElementsByTagName("pre")[0],
                                        q = D.getElementsByTagName("body")[0];
                                    m ? p.responseText = m.textContent ? m.textContent : m.innerText : q && (p.responseText = q.textContent ? q.textContent : q.innerText)
                                }
                            } else "xml" == h && !p.responseXML && p.responseText && (p.responseXML = H(p.responseText));
                            try {
                                C = J(p, h, j)
                            } catch (a) {
                                c = "parsererror", p.error = d = a || c
                            }
                        } catch (a) {
                            e("error caught: ", a), c = "error", p.error = d = a || c
                        }
                        p.aborted && (e("upload aborted"), c = null), p.status && (c = p.status >= 200 && p.status < 300 || 304 === p.status ? "success" : "error"), "success" === c ? (j.success && j.success.call(j.context, C, "success", p), v.resolve(p.responseText, "success", p), l && a.event.trigger("ajaxSuccess", [p, j])) : c && (void 0 === d && (d = p.statusText), j.error && j.error.call(j.context, p, c, d), v.reject(p, "error", d), l && a.event.trigger("ajaxError", [p, j, d])), l && a.event.trigger("ajaxComplete", [p, j]), l && !--a.active && a.event.trigger("ajaxStop"), j.complete && j.complete.call(j.context, p, c), F = !0, j.timeout && clearTimeout(t), setTimeout(function() {
                            j.iframeTarget || n.remove(), p.responseXML = null
                        }, 100)
                    }
                }
            }
            var g, i, j, l, m, n, o, p, q, r, s, t, f = h[0],
                u = !!a.fn.prop,
                v = a.Deferred();
            if (a(":input[name=submit],:input[id=submit]", f).length) return alert('Error: Form elements must not have name or id of "submit".'), v.reject(), v;
            if (b)
                for (i = 0; i < k.length; i++) g = a(k[i]), u ? g.prop("disabled", !1) : g.removeAttr("disabled");
            if (j = a.extend(!0, {}, a.ajaxSettings, c), j.context = j.context || j, m = "jqFormIO" + (new Date).getTime(), j.iframeTarget ? (n = a(j.iframeTarget), r = n.attr("name"), r ? m = r : n.attr("name", m)) : (n = a('<iframe name="' + m + '" src="' + j.iframeSrc + '" />'), n.css({
                    position: "absolute",
                    top: "-1000px",
                    left: "-1000px"
                })), o = n[0], p = {
                    aborted: 0,
                    responseText: null,
                    responseXML: null,
                    status: 0,
                    statusText: "n/a",
                    getAllResponseHeaders: function() {},
                    getResponseHeader: function() {},
                    setRequestHeader: function() {},
                    abort: function(b) {
                        var c = "timeout" === b ? "timeout" : "aborted";
                        if (e("aborting upload... " + c), this.aborted = 1, o.contentWindow.document.execCommand) try {
                            o.contentWindow.document.execCommand("Stop")
                        } catch (a) {}
                        n.attr("src", j.iframeSrc), p.error = c, j.error && j.error.call(j.context, p, c, b), l && a.event.trigger("ajaxError", [p, j, c]), j.complete && j.complete.call(j.context, p, c)
                    }
                }, l = j.global, l && 0 === a.active++ && a.event.trigger("ajaxStart"), l && a.event.trigger("ajaxSend", [p, j]), j.beforeSend && j.beforeSend.call(j.context, p, j) === !1) return j.global && a.active--, v.reject(), v;
            if (p.aborted) return v.reject(), v;
            q = f.clk, q && (r = q.name, r && !q.disabled && (j.extraData = j.extraData || {}, j.extraData[r] = q.value, "image" == q.type && (j.extraData[r + ".x"] = f.clk_x, j.extraData[r + ".y"] = f.clk_y)));
            var w = 1,
                x = 2,
                z = a("meta[name=csrf-token]").attr("content"),
                A = a("meta[name=csrf-param]").attr("content");
            A && z && (j.extraData = j.extraData || {}, j.extraData[A] = z), j.forceSync ? B() : setTimeout(B, 10);
            var C, D, F, E = 50,
                H = a.parseXML || function(a, b) {
                        return window.ActiveXObject ? (b = new ActiveXObject("Microsoft.XMLDOM"), b.async = "false", b.loadXML(a)) : b = (new DOMParser).parseFromString(a, "text/xml"), b && b.documentElement && "parsererror" != b.documentElement.nodeName ? b : null
                    },
                I = a.parseJSON || function(a) {
                        return window.eval("(" + a + ")")
                    },
                J = function(b, c, d) {
                    var e = b.getResponseHeader("content-type") || "",
                        f = "xml" === c || !c && e.indexOf("xml") >= 0,
                        g = f ? b.responseXML : b.responseText;
                    return f && "parsererror" === g.documentElement.nodeName && a.error && a.error("parsererror"), d && d.dataFilter && (g = d.dataFilter(g, c)), "string" == typeof g && ("json" === c || !c && e.indexOf("json") >= 0 ? g = I(g) : ("script" === c || !c && e.indexOf("javascript") >= 0) && a.globalEval(g)), g
                };
            return v
        }
        if (!this.length) return e("ajaxSubmit: skipping submit process - no element selected"), this;
        var d, f, g, h = this;
        "function" == typeof c && (c = {
            success: c
        }), d = this.attr("method"), f = this.attr("action"), g = "string" == typeof f ? a.trim(f) : "", g = g || window.location.href || "", g && (g = (g.match(/^([^#]+)/) || [])[1]), c = a.extend(!0, {
            url: g,
            success: a.ajaxSettings.success,
            type: d || "GET",
            iframeSrc: /^https/i.test(window.location.href || "") ? "javascript:false" : "about:blank"
        }, c);
        var i = {};
        if (this.trigger("form-pre-serialize", [this, c, i]), i.veto) return e("ajaxSubmit: submit vetoed via form-pre-serialize trigger"), this;
        if (c.beforeSerialize && c.beforeSerialize(this, c) === !1) return e("ajaxSubmit: submit aborted via beforeSerialize callback"), this;
        var j = c.traditional;
        void 0 === j && (j = a.ajaxSettings.traditional);
        var l, k = [],
            m = this.formToArray(c.semantic, k);
        if (c.data && (c.extraData = c.data, l = a.param(c.data, j)), c.beforeSubmit && c.beforeSubmit(m, this, c) === !1) return e("ajaxSubmit: submit aborted via beforeSubmit callback"), this;
        if (this.trigger("form-submit-validate", [m, this, c, i]), i.veto) return e("ajaxSubmit: submit vetoed via form-submit-validate trigger"), this;
        var n = a.param(m, j);
        l && (n = n ? n + "&" + l : l), "GET" == c.type.toUpperCase() ? (c.url += (c.url.indexOf("?") >= 0 ? "&" : "?") + n, c.data = null) : c.data = n;
        var o = [];
        if (c.resetForm && o.push(function() {
                h.resetForm()
            }), c.clearForm && o.push(function() {
                h.clearForm(c.includeHidden)
            }), !c.dataType && c.target) {
            var p = c.success || function() {};
            o.push(function(b) {
                var d = c.replaceTarget ? "replaceWith" : "html";
                a(c.target)[d](b).each(p, arguments)
            })
        } else c.success && o.push(c.success);
        c.success = function(a, b, d) {
            for (var e = c.context || this, f = 0, g = o.length; f < g; f++) o[f].apply(e, [a, b, d || h, h])
        };
        var q = a("input:file:enabled[value]", this),
            r = q.length > 0,
            s = "multipart/form-data",
            t = h.attr("enctype") == s || h.attr("encoding") == s,
            u = b.fileapi && b.formdata;
        e("fileAPI :" + u);
        var w, v = (r || t) && !u;
        c.iframe !== !1 && (c.iframe || v) ? c.closeKeepAlive ? a.get(c.closeKeepAlive, function() {
            w = A(m)
        }) : w = A(m) : w = (r || t) && u ? z(m) : a.ajax(c), h.removeData("jqxhr").data("jqxhr", w);
        for (var x = 0; x < k.length; x++) k[x] = null;
        return this.trigger("form-submit-notify", [this, c]), this
    }, a.fn.ajaxForm = function(b) {
        if (b = b || {}, b.delegation = b.delegation && a.isFunction(a.fn.on), !b.delegation && 0 === this.length) {
            var f = {
                s: this.selector,
                c: this.context
            };
            return !a.isReady && f.s ? (e("DOM not ready, queuing ajaxForm"), a(function() {
                a(f.s, f.c).ajaxForm(b)
            }), this) : (e("terminating; zero elements found by selector" + (a.isReady ? "" : " (DOM not ready)")), this)
        }
        return b.delegation ? (a(document).off("submit.form-plugin", this.selector, c).off("click.form-plugin", this.selector, d).on("submit.form-plugin", this.selector, b, c).on("click.form-plugin", this.selector, b, d), this) : this.ajaxFormUnbind().bind("submit.form-plugin", b, c).bind("click.form-plugin", b, d)
    }, a.fn.ajaxFormUnbind = function() {
        return this.unbind("submit.form-plugin click.form-plugin")
    }, a.fn.formToArray = function(c, d) {
        var e = [];
        if (0 === this.length) return e;
        var f = this[0],
            g = c ? f.getElementsByTagName("*") : f.elements;
        if (!g) return e;
        var h, i, j, k, l, m, n;
        for (h = 0, m = g.length; h < m; h++)
            if (l = g[h], j = l.name)
                if (c && f.clk && "image" == l.type) l.disabled || f.clk != l || (e.push({
                    name: j,
                    value: a(l).val(),
                    type: l.type
                }), e.push({
                    name: j + ".x",
                    value: f.clk_x
                }, {
                    name: j + ".y",
                    value: f.clk_y
                }));
                else if (k = a.fieldValue(l, !0), k && k.constructor == Array)
                    for (d && d.push(l), i = 0, n = k.length; i < n; i++) e.push({
                        name: j,
                        value: k[i]
                    });
                else if (b.fileapi && "file" == l.type && !l.disabled) {
                    d && d.push(l);
                    var o = l.files;
                    if (o.length)
                        for (i = 0; i < o.length; i++) e.push({
                            name: j,
                            value: o[i],
                            type: l.type
                        });
                    else e.push({
                        name: j,
                        value: "",
                        type: l.type
                    })
                } else null !== k && "undefined" != typeof k && (d && d.push(l), e.push({
                    name: j,
                    value: k,
                    type: l.type,
                    required: l.required
                }));
        if (!c && f.clk) {
            var p = a(f.clk),
                q = p[0];
            j = q.name, j && !q.disabled && "image" == q.type && (e.push({
                name: j,
                value: p.val()
            }), e.push({
                name: j + ".x",
                value: f.clk_x
            }, {
                name: j + ".y",
                value: f.clk_y
            }))
        }
        return e
    }, a.fn.formSerialize = function(b) {
        return a.param(this.formToArray(b))
    }, a.fn.fieldSerialize = function(b) {
        var c = [];
        return this.each(function() {
            var d = this.name;
            if (d) {
                var e = a.fieldValue(this, b);
                if (e && e.constructor == Array)
                    for (var f = 0, g = e.length; f < g; f++) c.push({
                        name: d,
                        value: e[f]
                    });
                else null !== e && "undefined" != typeof e && c.push({
                    name: this.name,
                    value: e
                })
            }
        }), a.param(c)
    }, a.fn.fieldValue = function(b) {
        for (var c = [], d = 0, e = this.length; d < e; d++) {
            var f = this[d],
                g = a.fieldValue(f, b);
            null === g || "undefined" == typeof g || g.constructor == Array && !g.length || (g.constructor == Array ? a.merge(c, g) : c.push(g))
        }
        return c
    }, a.fieldValue = function(b, c) {
        var d = b.name,
            e = b.type,
            f = b.tagName.toLowerCase();
        if (void 0 === c && (c = !0), c && (!d || b.disabled || "reset" == e || "button" == e || ("checkbox" == e || "radio" == e) && !b.checked || ("submit" == e || "image" == e) && b.form && b.form.clk != b || "select" == f && b.selectedIndex == -1)) return null;
        if ("select" == f) {
            var g = b.selectedIndex;
            if (g < 0) return null;
            for (var h = [], i = b.options, j = "select-one" == e, k = j ? g + 1 : i.length, l = j ? g : 0; l < k; l++) {
                var m = i[l];
                if (m.selected) {
                    var n = m.value;
                    if (n || (n = m.attributes && m.attributes.value && !m.attributes.value.specified ? m.text : m.value), j) return n;
                    h.push(n)
                }
            }
            return h
        }
        return a(b).val()
    }, a.fn.clearForm = function(b) {
        return this.each(function() {
            a("input,select,textarea", this).clearFields(b)
        })
    }, a.fn.clearFields = a.fn.clearInputs = function(b) {
        var c = /^(?:color|date|datetime|email|month|number|password|range|search|tel|text|time|url|week)$/i;
        return this.each(function() {
            var d = this.type,
                e = this.tagName.toLowerCase();
            c.test(d) || "textarea" == e ? this.value = "" : "checkbox" == d || "radio" == d ? this.checked = !1 : "select" == e ? this.selectedIndex = -1 : b && (b === !0 && /hidden/.test(d) || "string" == typeof b && a(this).is(b)) && (this.value = "")
        })
    }, a.fn.resetForm = function() {
        return this.each(function() {
            ("function" == typeof this.reset || "object" == typeof this.reset && !this.reset.nodeType) && this.reset()
        })
    }, a.fn.enable = function(a) {
        return void 0 === a && (a = !0), this.each(function() {
            this.disabled = !a
        })
    }, a.fn.selected = function(b) {
        return void 0 === b && (b = !0), this.each(function() {
            var c = this.type;
            if ("checkbox" == c || "radio" == c) this.checked = b;
            else if ("option" == this.tagName.toLowerCase()) {
                var d = a(this).parent("select");
                b && d[0] && "select-one" == d[0].type && d.find("option").selected(!1), this.selected = b
            }
        })
    }, a.fn.ajaxSubmit.debug = !1
}(jQuery), $(document).ready(function() {
    function p(a) {
        var b = $(this);
        b.closest("form").css("opacity", .5), b.closest("form").ajaxSubmit({
            success: function(a, c, d, e) {
                var f = $("#discounted");
                f.parent().find("i").text("(" + a.discounted.count + ")"), parseInt(a.discounted.count) > 0 ? f.parent().find("i").show() : f.parent().find("i").hide(), a.discounted.disabled ? a.discounted.disabled && (f.attr("disabled", "disabled"), f.parent().addClass("disabled")) : (f.parent().removeClass("disabled"), f.removeAttr("disabled"));
                var f = $("#featured");
                f.parent().find("i").text("(" + a.featured.count + ")"), parseInt(a.featured.count) > 0 ? f.parent().find("i").show() : f.parent().find("i").hide(), a.featured.disabled ? a.featured.disabled && (f.attr("disabled", "disabled"), f.parent().addClass("disabled")) : (f.parent().removeClass("disabled"), f.removeAttr("disabled")), $.each(a.features, function(a, b) {
                    $.each(b.options, function(a, c) {
                        var d = $("#option_" + b.id + "_" + a);
                        d.parent().find("i").text("(" + c.count + ")"), parseInt(c.count) > 0 ? d.parent().find("i").show() : d.parent().find("i").hide(), c.disabled ? c.disabled && (d.attr("disabled", "disabled"), d.parent().addClass("disabled")) : (d.parent().removeClass("disabled"), d.removeAttr("disabled"))
                    })
                }), $.each(a.brands, function(a, b) {
                    var c = $("#brand_" + b.id);
                    c.parent().find("i").text("(" + b.count + ")"), parseInt(b.count) > 0 ? c.parent().find("i").show() : c.parent().find("i").hide(), b.disabled ? b.disabled && (c.parent().addClass("disabled"),c.closest('li').addClass("disabled"), c.attr("disabled", "disabled")) : (c.parent().removeClass("disabled"),c.closest('li').removeClass("disabled"), c.removeAttr("disabled"))
                }), $.each(a.whoms, function(a, b) {
                    var c = $("#whom_" + b.id);
                    c.parent().find("i").text("(" + b.count + ")"), parseInt(b.count) > 0 ? c.parent().find("i").show() : c.parent().find("i").hide(), b.disabled ? b.disabled && (c.parent().addClass("disabled"),c.closest('li').addClass("disabled"), c.attr("disabled", "disabled")) : (c.parent().removeClass("disabled"),c.closest('li').removeClass("disabled"), c.removeAttr("disabled"))
                }), $.each(a.events, function(a, b) {
                    var c = $("#event_" + b.id);
                    c.parent().find("i").text("(" + b.count + ")"), parseInt(b.count) > 0 ? c.parent().find("i").show() : c.parent().find("i").hide(), b.disabled ? b.disabled && (c.parent().addClass("disabled"),c.closest('li').addClass("disabled"), c.attr("disabled", "disabled")) : (c.parent().removeClass("disabled"),c.closest('li').removeClass("disabled"), c.removeAttr("disabled"))
                }), cmtp(parseInt(a.max_min_price.min_price), parseInt(a.max_min_price.max_price)), umda(0), umda(1), b.parents("form").find(".popover").remove(), b.closest("form").css("opacity", 1), $(".count_filter").html(count_filter(a.total_view)), b.is('input[type="checkbox"]') && b.parent(":not(.disabled)"), b.parent().find(".popover").stop().show(200)
            },
            error: function() {
                return b.parents("form").submit(), !1
            }
        })
    }
    w = $("#slider_price").width(), diap = [], diap[1] = Math.round($("#slider_price").data("slider-min-range") + (Math.round(($("#slider_price").data("slider-max-range") + $("#slider_price").data("slider-min-range")) / 4) - $("#slider_price").data("slider-min-range")) / 2), diap[0] = Math.round(diap[1] / 2), diap[0] > $("#slider_price").data("slider-min-range") && (diap[0] = Math.round(.8 * $("#slider_price").data("slider-min-range"))), diap[2] = Math.round(($("#slider_price").data("slider-max-range") + $("#slider_price").data("slider-min-range")) / 2), diap[3] = Math.round(($("#slider_price").data("slider-max-range") + $("#slider_price").data("slider-min-range")) / 2) + (Math.round(1.1 * $("#slider_price").data("slider-max-range")) - Math.round(($("#slider_price").data("slider-max-range") + $("#slider_price").data("slider-min-range")) / 2)) / 2, diap[4] = Math.round(1.1 * $("#slider_price").data("slider-max-range"));
    var a = diap.length;
    pixelDiap = [];
    var b = Number(diap[4] - diap[0]).toFixed(0),
        d = (b.toString().length, w / (a - 1));
    valueDiap = [];
    for (var g = 0; g < a - 1; g++) {
        var h = diap[g + 1] - diap[g];
        valueDiap.push(h), pixelDiap.push(d * (g + 1))
    }
    var i = pixelDiap[0],
        j = 0,
        k = 0;
    result = [];
    for (var l = 0; l < w; l++) {
        if (l < i - 1) {
            var m = (l - j) / (i - j) * valueDiap[k] * 1 + 1 * diap[k];
            result[l] = Number(m).toFixed(null)
        } else j = i, k++, i = pixelDiap[k], result[l] = Number(diap[k]).toFixed(null);
        if (!Boolean(Number(null))) {
            var n = 1;
            for (f = 1; f < 5; f++) Number(result[l]) > Number(diap[f]) && n++;
            var o = Math.abs(Math.round(result[l])).toString().length;
            o > 2 && (result[l] = otr(Math.round(result[l]), 2 - o))
        }
    }
    result[0] = "", result[w - 1] = "", cmtp(), $("#slider_price").slider({
        animate: !1,
        step: 1,
        orientation: "horizontal",
        min: 0,
        max: w - 1,
        range: !0,
        values: [0, w],
        start: function(a, b) {
            currentHandle = $(b.handle).hasClass("ui-state-left") ? 0 : 1
        },
        stop: function(a, b) {},
        slide: function(a, b) {
            id = currentHandle ? "max_price" : "min_price";
            var c = result[b.value];
            $("#" + id).attr("value", c), umda(currentHandle)
        },
        change: function(a, b) {
            $("#slider_price").trigger("slider_price_change")
        }
    }), $("input#min_price").change(function() {
        var a = $("input#min_price").val(),
            b = $("input#max_price").val();
        parseInt(a) > parseInt(b) && (a = b, $("input#min_price").val(a)), d = Number($("input#min_price").attr("value").replace(",", ".")), $("#slider_price").slider("values", 0, chts(d, a)), umda(0)
    }), $("input#min_price").val() > 0 && ($("#slider_price").slider("values", 0, chts(Number($("input#min_price").attr("value").replace(",", ".")), $("input#min_price").val())), umda(0)), $("input#max_price").val() > 0 && ($("#slider_price").slider("values", 1, chts(Number($("input#max_price").attr("value").replace(",", ".")), $("input#max_price").val())), umda(1)), $("input#max_price").change(function() {
        var a = $("input#min_price").val(),
            b = $("input#max_price").val();
        b > $("input#max_price").data("max-price") && (b = $("input#max_price").data("max-price"), $("input#max_price").val($("input#max_price").data("max-price"))), parseInt(a) > parseInt(b) && (b = a, $("input#max_price").val(b)), d = Number($("input#max_price").attr("value").replace(",", ".")), $("#slider_price").slider("values", 1, chts(d, b)), umda(1)
    }), $(".keypress").keypress(function(a) {
        var b, c;
        if (!a) var a = window.event;
        return a.keyCode ? b = a.keyCode : a.which && (b = a.which), null == b || 0 == b || 8 == b || 13 == b || 9 == b || 46 == b || 37 == b || 39 == b || (c = String.fromCharCode(b), !!/\d/.test(c) && void 0)
    }), $('#filter form input[type="checkbox"]').on("change", p), $("#slider_price").on("slider_price_change", p), $(".apply").live("click", function() {
        return $(this).parents("form").submit(), !1
    })
}), $(document).click(function(a) {
    $(a.target).closest(".popover").length || ($(".popover").hide(130), a.stopPropagation())
}), $(document).click(function(a) {
    $(a.target).closest("ul.samopal>li>ul").length || ($("ul.samopal>li>ul").slideUp(130), $("ul.samopal>li").removeClass("selected"), a.stopPropagation())
}), $(function() {
    $("ul.samopal>li>span").click(function() {
        return $(this).closest("ul").find(">li>ul").slideToggle(130), $(this).closest("ul").find(">li").toggleClass("selected"), $(this).closest(".iteamfilter").toggleClass("zindex"), !1
    })
});