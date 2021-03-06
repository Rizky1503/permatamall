! function(p) {
    "use strict";
    var n = {
            splitChar: " ",
            cls: "",
            btnCls: "btn-default",
            placeHolder: "Pilih Kategori",
            dropUp: !1,
            lazy: !1,
            openOnHover: !1,
            openOnHoverDelay: 100,
            openOnHoverDelay4Lazy: 200,
            isSelectable: function(e) {
                return e && e.loaded && (!e.children || e.children.length <= 0 || e.selectable)
            }
        },
        t = '<div class="btn-group bootstrap-cascader form-control"></div>',
        s = '<button class="btn dropdown-toggle bs-placeholder" type="button"> <span class="filter-option pull-left"></span> <span class="caret icon-arrow-down"></span> <span class="icon-cross bsfont icon-jiaochacross78"></span>      </button>',
        u = '<ul class="dropdown-menu"></ul>',
        h = '<li><a href="javascript:"><span class="text"></span><span class="bsfont icon-ico-right-arrow item-right-arrow"></span>          <span class="bsfont icon-loading item-loading"></span>          <span class="bsfont icon-error"></span>        </a>      </li>',
        m = function(e) {
            $('#Categoricascader').val(e);
            return e ? String(e).replace(/&/g, "&amp;").replace(/>/g, "&gt;").replace(/</g, "&lt;").replace(/"/g, "&quot;") : ""
        },
        r = function(e, o) {
            if (e && e.children && !(e.children.length <= 0)) {
                var r = this;
                this.selectItem = function(e, a) {
                    o.params.isSelectable.call(o, e) && o.selectItem(a)
                }, this.setItemOpened = function(e, a) {
                    r.panelEl.children("li").removeClass("open"), a.addClass("open"), e.loaded && 0 == e.children.length && a.addClass("no-child")
                }, this.selectItemByCode = function(e) {
                    r.panelEl.children("li[code=" + m(e) + "]").trigger("selectItem")
                }, this.setSelected = function(e, a) {
                    var l = r.panelEl.children("li[code=" + m(e.code || e.c) + "]");
                    l.children("a").addClass("selected"), a && r.setItemOpened(e, l), r.scrollToOpened()
                }, this.isMatchedSelectedItems = function(e, a) {
                    for (var l = e, n = e.level - 1; 0 <= n; n--) {
                        var t = o.selectedItems[n],
                            s = t.code || t.c,
                            r = l.originData;
                        if (s != (r.code || r.c)) return !1;
                        if (!1 === a) return !0;
                        l = l.parent
                    }
                    return !0
                }, this.scrollToOpened = function() {
                    var e = r.panelEl,
                        a = e.find("li a.selected").parent();
                    if (0 < a.size()) {
                        var l = e.scrollTop(),
                            n = a.position().top + l;
                        l < n && (n -= (e.height() - a.height()) / 2, e.scrollTop(n))
                    }
                }, this.destroy = function() {
                    r.panelEl.remove()
                };
                var d = function(e, a, l) {
                    if (o.params.lazy && !1 === e.loaded) {
                        a.addClass("bs-loading");
                        var n = e.code || e.c;
                        r.loadingItem && (r.loadingItem = !1), r.loadingItem = n, o.loadData(e).then(function() {
                            r.loadingItem == n && o.refreshPanels(e.level + 1, e)
                        }, function() {
                            r.loadingItem == n && a.addClass("load-error")
                        }).always(function() {
                            r.loadingItem == n && (r.setItemOpened(e, a), r.loadingItem = !1), a.removeClass("bs-loading")
                        })
                    } else o.refreshPanels(e.level + 1, e), r.setItemOpened(e, a), l && r.selectItem(e, a)
                };
                r.panelEl = p(u).appendTo(o.el), r.data = e;
                var a = o.panels[o.panels.length - 1];
                if (a) {
                    var l = a.panelEl,
                        n = Number((l.css("left") || "").replace("px", ""));
                    r.panelEl.css({
                        left: n + l.outerWidth()
                    })
                }
                o.panels.push(r), 0 < o.panels.length && (o.el.children(".dropdown-menu").removeClass("first-child last-child"), o.panels[0].panelEl.addClass("first-child"), o.panels[o.panels.length - 1].panelEl.addClass("last-child"));
                var c = !1,
                    i = !1;
                o.selectedItems.length > e.level && (c = r.isMatchedSelectedItems(e)), p.each(e.children, function(e, a) {
                    var l = p(h).appendTo(r.panelEl),
                        n = a.originData,
                        t = n.name || n.n,
                        s = n.code || n.c;
                    l.data("cascaderItem", a).attr("code", s).attr("title", t).find(".text").text(t), l.on({
                        "selectItem click": function() {
                            d(a, l, !0)
                        },
                        openDropdown: function() {
                            d(a, l)
                        }
                    }), o.params.openOnHover && l.on("mouseover", function() {
                        o.openTimeout && clearTimeout(o.openTimeout), o.openTimeout = setTimeout(function() {
                            d(a, l)
                        }, o.params.lazy ? o.params.openOnHoverDelay4Lazy : o.params.openOnHoverDelay)
                    }), a.loaded && (!a.children || a.children.length <= 0) && l.addClass("no-child"), o.selectedItems.length >= a.level && c && r.isMatchedSelectedItems(a, !1) && (i = !0, o.selectedItems.length > a.level ? d(a, l, !1) : (o.selectedItems.length == o.panels.length && p.each(o.selectedItems, function(e, a) {
                        o.panels[e].setSelected(a, e < o.selectedItems.length - 1)
                    }), o.inited(), o.reloaded()))
                }), (!o.isInited || o.reloading) && o.selectedItems.length > e.level && !i && o.params.lazy && (o.isInited ? o.reloaded() : o.inited())
            }
        },
        o = function(e) {
            var d = this;
            for (var a in e = e || {}, n) "undefined" == typeof e[a] && (e[a] = n[a]);
            d.params = e, d.initialized = !1, d.selectedItems = [], d.readonly = !1, d.params.value instanceof Array && (d.selectedItems = []);
            var o = function(e, s) {
                    var r = d.params.lazy;
                    p.each(e, function(e, a) {
                        var l = a.code || a.c,
                            n = a.data || a.d,
                            t = {
                                childMap: {},
                                children: [],
                                loaded: !r || !1 === a.hasChild,
                                level: s.level + 1,
                                parent: s,
                                originData: a
                            };
                        s.children.push(t), s.childMap[l] = t, n && 0 < n.length && o(n, t)
                    })
                },
                c = function(e) {
                    d.btn.attr("title", e).children(".filter-option").text(e), 0 < d.getValue().length ? d.btn.removeClass("bs-placeholder").addClass("selected") : d.btn.addClass("bs-placeholder").removeClass("selected")
                },
                l = function(e) {
                    if (d.el.hasClass("open")) {
                        var a = p(e.target).parents(".bootstrap-cascader");
                        0 == a.size() ? d.close() : a[0] != d.el[0] && d.close()
                    }
                };
            d.setValue = function(e) {
                d.clearValue();
                var l = [],
                    a = d.getValue;
                p.each(e, function(e, a) {
                    d.selectedItems.push({
                        code: a.code || a.c,
                        name: a.name || a.n
                    }), l.push(a.name || a.n)
                }), c(l.join(d.params.splitChar)), d.updateViewBySelected(), d.tryFireOnChange(a, d.getValue())
            }, d.refreshPanels = function(e, a) {
                var l = d.panels.splice(e - 1, d.panels.length);
                l && p.each(l, function(e, a) {
                    a.destroy()
                }), new r(a, d)
            }, d.destroy = function() {
                p.each(d.panels, function(e, a) {
                    a.destroy()
                }), p("html").off("click", l)
            }, d.selectItem = function(e) {
                d.el.find("li a").removeClass("selected"), e.children("a").addClass("selected"), d.el.find("li.open a").addClass("selected");
                var a = e.data("cascaderItem"),
                    l = [],
                    n = d.getValue();
                for (d.selectedItems = []; a.parent;) {
                    var t = a.originData,
                        s = t.code || t.c,
                        r = t.name || t.n;
                    d.selectedItems.unshift({
                        code: s,
                        name: r
                    }), l.unshift(r), a = a.parent
                }
                c(l.join(d.params.splitChar)), d.close();
                var o = d.getValue();
                d.tryFireOnChange(n, o), d.params.el.trigger("bs.cascader.select", [o])
            }, d.tryFireOnChange = function(e, t) {
                var a = !0;
                if (e != t && e.length == t.length) {
                    var s = !0;
                    p.each(e, function(e, a) {
                        var l = a.code || a.c,
                            n = t[e];
                        if (l != (n.code || n.c)) return s = !1
                    }), s && (a = !1)
                }
                a && d.params.el.trigger("bs.cascader.change", [e, t])
            }, d.close = function() {
                d.el.removeClass("open"), d.updateViewBySelected()
            }, d.updateViewBySelected = function() {
                0 < d.selectedItems.length && 0 < d.panels.length && d.panels[0].selectItemByCode(d.selectedItems[0].code || d.selectedItems[0].c)
            }, d.open = function() {
                d.readonly || (d.el.toggleClass("open"), p.each(d.panels, function(e, a) {
                    a.scrollToOpened()
                }))
            }, d.getValue = function() {
                return d.selectedItems.slice()
            }, d.clearValue = function(e) {
                d.readonly || (d.selectedItems = [], d.el.find(".dropdown-menu li a").removeClass("selected"), c(d.params.placeHolder), e && d.params.el.trigger("bs.cascader.clear"))
            }, d.setReadonly = function(e) {
                e = !1 !== e, (d.readonly = e) ? (d.el.addClass("readonly"), d.btn.addClass("disabled")) : (d.el.removeClass("readonly"), d.btn.removeClass("disabled"))
            }, d.isReadonly = function() {
                return d.readonly
            }, d.reload = function() {
                d.reloading = !0, d.data = {
                    childMap: {},
                    children: [],
                    loaded: !1,
                    level: 0
                }, d.loadData().then(function() {
                    d.refreshPanels(1, d.data), d.params.value && d.setValue(d.params.value), d.params.lazy && d.params.value || d.reloaded()
                })
            }, d.reloaded = function() {
                d.reloading && (d.reloading = !1, d.params.el.trigger("bs.cascader.reloaded"))
            }, d.inited = function() {
                d.isInited || (d.isInited = !0, d.params.el.trigger("bs.cascader.inited"))
            }, d.loadData = function(a) {
                var l = [];
                if (a)
                    for (var e = a; e.parent;) l.unshift(e.originData), e = e.parent;
                else a = d.data;
                var n = p.Deferred();
                return d.params.loadData.call(d, l, function(e) {
                    e ? (0 < e.length && ((!l || l.length <= 0) && (d.data.originData = e), o(e, a)), a.loaded = !0, n.resolve(e)) : n.reject()
                }), n.promise()
            }, d.data = {
                childMap: {},
                children: [],
                loaded: !1,
                level: 0
            }, d.panels = [], d.cols = [], d.el = p(t).addClass(d.params.cls), d.params.dropUp && d.el.addClass("dropup"), d.params.replace ? (d.el.insertAfter(e.el), e.el.hide()) : d.el.appendTo(e.el), d.btn = p(s).addClass(e.btnCls).click(function() {
                d.open()
            }).appendTo(d.el), d.btn.children(".icon-cross").click(function(e) {
                d.clearValue(!0), e.preventDefault(), e.stopPropagation()
            }), c(e.placeHolder), d.params.readonly && d.setReadonly(!0), d.loadData().always(function() {
                d.refreshPanels(1, d.data), d.params.value && d.setValue(d.params.value), d.params.lazy && d.params.value || d.inited()
            }), p("html").on("click", l)
        };
    p.fn.bsCascader = function(l) {
        var n = arguments;
        return this.each(function() {
            if (this) {
                var e = p(this),
                    a = e.data("bsCascader");
                a || (l = p.extend({
                    el: e,
                    value: e.val() ? e.val().split(l.splitChar || " ") : ""
                }, l), a = new o(l), e.data("bsCascader", a)), "string" == typeof l && a[l].apply(a, Array.prototype.slice.call(n, 1))
            }
        })
    }
}(jQuery);
//# sourceMappingURL=bootstrap-cascader.min.js.map