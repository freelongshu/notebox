UEDITOR_CONFIG = window.UEDITOR_CONFIG || {};

var baidu = window.baidu || {};

window.baidu = baidu;

window.UE = baidu.editor = {};

UE.plugins = {};

UE.commands = {};

UE.instants = {};

UE.I18N = {};

UE.version = "1.2.4.0";

var dom = UE.dom = {};

var browser = UE.browser = function() {
    var agent = navigator.userAgent.toLowerCase(), opera = window.opera, browser = {
        ie: !!window.ActiveXObject,
        opera: !!opera && opera.version,
        webkit: agent.indexOf(" applewebkit/") > -1,
        mac: agent.indexOf("macintosh") > -1,
        quirks: document.compatMode == "BackCompat"
    };
    browser.gecko = navigator.product == "Gecko" && !browser.webkit && !browser.opera;
    var version = 0;
    if (browser.ie) {
        version = parseFloat(agent.match(/msie (\d+)/)[1]);
        browser.ie9Compat = document.documentMode == 9;
        browser.ie8 = !!document.documentMode;
        browser.ie8Compat = document.documentMode == 8;
        browser.ie7Compat = version == 7 && !document.documentMode || document.documentMode == 7;
        browser.ie6Compat = version < 7 || browser.quirks;
    }
    if (browser.gecko) {
        var geckoRelease = agent.match(/rv:([\d\.]+)/);
        if (geckoRelease) {
            geckoRelease = geckoRelease[1].split(".");
            version = geckoRelease[0] * 1e4 + (geckoRelease[1] || 0) * 100 + (geckoRelease[2] || 0) * 1;
        }
    }
    if (/chrome\/(\d+\.\d)/i.test(agent)) {
        browser.chrome = +RegExp["$1"];
    }
    if (/(\d+\.\d)?(?:\.\d)?\s+safari\/?(\d+\.\d+)?/i.test(agent) && !/chrome/i.test(agent)) {
        browser.safari = +(RegExp["$1"] || RegExp["$2"]);
    }
    if (browser.opera) version = parseFloat(opera.version());
    if (browser.webkit) version = parseFloat(agent.match(/ applewebkit\/(\d+)/)[1]);
    browser.version = version;
    browser.isCompatible = !browser.mobile && (browser.ie && version >= 6 || browser.gecko && version >= 10801 || browser.opera && version >= 9.5 || browser.air && version >= 1 || browser.webkit && version >= 522 || false);
    return browser;
}();

var ie = browser.ie, webkit = browser.webkit, gecko = browser.gecko, opera = browser.opera;

var utils = UE.utils = {
    each: function(obj, iterator, context) {
        if (obj == null) return;
        if (Array.prototype.forEach && obj.forEach === Array.prototype.forEach) {
            obj.forEach(iterator, context);
        } else if (obj.length === +obj.length) {
            for (var i = 0, l = obj.length; i < l; i++) {
                if (iterator.call(context, obj[i], i, obj) === false) return;
            }
        } else {
            for (var key in obj) {
                if (obj.hasOwnProperty(key)) {
                    if (iterator.call(context, obj[key], key, obj) === false) return;
                }
            }
        }
    },
    makeInstance: function(obj) {
        var noop = new Function();
        noop.prototype = obj;
        obj = new noop();
        noop.prototype = null;
        return obj;
    },
    extend: function(t, s, b) {
        if (s) {
            for (var k in s) {
                if (!b || !t.hasOwnProperty(k)) {
                    t[k] = s[k];
                }
            }
        }
        return t;
    },
    inherits: function(subClass, superClass) {
        var oldP = subClass.prototype, newP = utils.makeInstance(superClass.prototype);
        utils.extend(newP, oldP, true);
        subClass.prototype = newP;
        return newP.constructor = subClass;
    },
    bind: function(fn, context) {
        return function() {
            return fn.apply(context, arguments);
        };
    },
    defer: function(fn, delay, exclusion) {
        var timerID;
        return function() {
            if (exclusion) {
                clearTimeout(timerID);
            }
            timerID = setTimeout(fn, delay);
        };
    },
    indexOf: function(array, item, start) {
        var index = -1;
        start = this.isNumber(start) ? start : 0;
        this.each(array, function(v, i) {
            if (i >= start && v === item) {
                index = i;
                return false;
            }
        });
        return index;
    },
    removeItem: function(array, item) {
        for (var i = 0, l = array.length; i < l; i++) {
            if (array[i] === item) {
                array.splice(i, 1);
                i--;
            }
        }
    },
    trim: function(str) {
        return str.replace(/(^[ \t\n\r]+)|([ \t\n\r]+$)/g, "");
    },
    listToMap: function(list) {
        if (!list) return {};
        list = utils.isArray(list) ? list : list.split(",");
        for (var i = 0, ci, obj = {}; ci = list[i++]; ) {
            obj[ci.toUpperCase()] = obj[ci] = 1;
        }
        return obj;
    },
    unhtml: function(str, reg) {
        return str ? str.replace(reg || /[&<">]/g, function(m) {
            return {
                "<": "&lt;",
                "&": "&amp;",
                '"': "&quot;",
                ">": "&gt;"
            }[m];
        }) : "";
    },
    html: function(str) {
        return str ? str.replace(/&((g|l|quo)t|amp);/g, function(m) {
            return {
                "&lt;": "<",
                "&amp;": "&",
                "&quot;": '"',
                "&gt;": ">"
            }[m];
        }) : "";
    },
    cssStyleToDomStyle: function() {
        var test = document.createElement("div").style, cache = {
            "float": test.cssFloat != undefined ? "cssFloat" : test.styleFloat != undefined ? "styleFloat" : "float"
        };
        return function(cssName) {
            return cache[cssName] || (cache[cssName] = cssName.toLowerCase().replace(/-./g, function(match) {
                return match.charAt(1).toUpperCase();
            }));
        };
    }(),
    loadFile: function() {
        var tmpList = [];
        function getItem(doc, obj) {
            for (var i = 0, ci; ci = tmpList[i++]; ) {
                try {
                    if (ci.doc === doc && ci.url == (obj.src || obj.href)) {
                        return ci;
                    }
                } catch (e) {
                    continue;
                }
            }
        }
        return function(doc, obj, fn) {
            var item = getItem(doc, obj);
            if (item) {
                if (item.ready) {
                    fn && fn();
                } else {
                    item.funs.push(fn);
                }
                return;
            }
            tmpList.push({
                doc: doc,
                url: obj.src || obj.href,
                funs: [ fn ]
            });
            if (!doc.body) {
                var html = [];
                for (var p in obj) {
                    if (p == "tag") continue;
                    html.push(p + '="' + obj[p] + '"');
                }
                doc.write("<" + obj.tag + " " + html.join(" ") + " ></" + obj.tag + ">");
                return;
            }
            if (obj.id && doc.getElementById(obj.id)) {
                return;
            }
            var element = doc.createElement(obj.tag);
            delete obj.tag;
            for (var p in obj) {
                element.setAttribute(p, obj[p]);
            }
            element.onload = element.onreadystatechange = function() {
                if (!this.readyState || /loaded|complete/.test(this.readyState)) {
                    item = getItem(doc, obj);
                    if (item.funs.length > 0) {
                        item.ready = 1;
                        for (var fi; fi = item.funs.pop(); ) {
                            fi();
                        }
                    }
                    element.onload = element.onreadystatechange = null;
                }
            };
            doc.getElementsByTagName("head")[0].appendChild(element);
        };
    }(),
    isEmptyObject: function(obj) {
        if (obj == null) return true;
        if (this.isArray(obj) || this.isString(obj)) return obj.length === 0;
        for (var key in obj) if (obj.hasOwnProperty(key)) return false;
        return true;
    },
    fixColor: function(name, value) {
        if (/color/i.test(name) && /rgba?/.test(value)) {
            var array = value.split(",");
            if (array.length > 3) return "";
            value = "#";
            for (var i = 0, color; color = array[i++]; ) {
                color = parseInt(color.replace(/[^\d]/gi, ""), 10).toString(16);
                value += color.length == 1 ? "0" + color : color;
            }
            value = value.toUpperCase();
        }
        return value;
    },
    optCss: function(val) {
        var padding, margin, border;
        val = val.replace(/(padding|margin|border)\-([^:]+):([^;]+);?/gi, function(str, key, name, val) {
            if (val.split(" ").length == 1) {
                switch (key) {
                  case "padding":
                    !padding && (padding = {});
                    padding[name] = val;
                    return "";

                  case "margin":
                    !margin && (margin = {});
                    margin[name] = val;
                    return "";

                  case "border":
                    return val == "initial" ? "" : str;
                }
            }
            return str;
        });
        function opt(obj, name) {
            if (!obj) {
                return "";
            }
            var t = obj.top, b = obj.bottom, l = obj.left, r = obj.right, val = "";
            if (!t || !l || !b || !r) {
                for (var p in obj) {
                    val += ";" + name + "-" + p + ":" + obj[p] + ";";
                }
            } else {
                val += ";" + name + ":" + (t == b && b == l && l == r ? t : t == b && l == r ? t + " " + l : l == r ? t + " " + l + " " + b : t + " " + r + " " + b + " " + l) + ";";
            }
            return val;
        }
        val += opt(padding, "padding") + opt(margin, "margin");
        return val.replace(/^[ \n\r\t;]*|[ \n\r\t]*$/, "").replace(/;([ \n\r\t]+)|\1;/g, ";").replace(/(&((l|g)t|quot|#39))?;{2,}/g, function(a, b) {
            return b ? b + ";;" : ";";
        });
    },
    clone: function(source, target) {
        var tmp;
        target = target || {};
        for (var i in source) {
            if (source.hasOwnProperty(i)) {
                tmp = source[i];
                if (typeof tmp == "object") {
                    target[i] = utils.isArray(tmp) ? [] : {};
                    utils.clone(source[i], target[i]);
                } else {
                    target[i] = tmp;
                }
            }
        }
        return target;
    },
    transUnitToPx: function(val) {
        if (!/(pt|cm)/.test(val)) {
            return val;
        }
        var unit;
        val.replace(/([\d.]+)(\w+)/, function(str, v, u) {
            val = v;
            unit = u;
        });
        switch (unit) {
          case "cm":
            val = parseFloat(val) * 25;
            break;

          case "pt":
            val = Math.round(parseFloat(val) * 96 / 72);
        }
        return val + (val ? "px" : "");
    },
    domReady: function() {
        var fnArr = [];
        function doReady(doc) {
            doc.isReady = true;
            for (var ci; ci = fnArr.pop(); ci()) {}
        }
        return function(onready, win) {
            win = win || window;
            var doc = win.document;
            onready && fnArr.push(onready);
            if (doc.readyState === "complete") {
                doReady(doc);
            } else {
                doc.isReady && doReady(doc);
                if (browser.ie) {
                    (function() {
                        if (doc.isReady) return;
                        try {
                            doc.documentElement.doScroll("left");
                        } catch (error) {
                            setTimeout(arguments.callee, 0);
                            return;
                        }
                        doReady(doc);
                    })();
                    win.attachEvent("onload", function() {
                        doReady(doc);
                    });
                } else {
                    doc.addEventListener("DOMContentLoaded", function() {
                        doc.removeEventListener("DOMContentLoaded", arguments.callee, false);
                        doReady(doc);
                    }, false);
                    win.addEventListener("load", function() {
                        doReady(doc);
                    }, false);
                }
            }
        };
    }(),
    cssRule: browser.ie ? function(key, style, doc) {
        var indexList, index;
        doc = doc || document;
        if (doc.indexList) {
            indexList = doc.indexList;
        } else {
            indexList = doc.indexList = {};
        }
        var sheetStyle;
        if (!indexList[key]) {
            if (style === undefined) {
                return "";
            }
            sheetStyle = doc.createStyleSheet("", index = doc.styleSheets.length);
            indexList[key] = index;
        } else {
            sheetStyle = doc.styleSheets[indexList[key]];
        }
        if (style === undefined) {
            return sheetStyle.cssText;
        }
        sheetStyle.cssText = style || "";
    } : function(key, style, doc) {
        doc = doc || document;
        var head = doc.getElementsByTagName("head")[0], node;
        if (!(node = doc.getElementById(key))) {
            if (style === undefined) {
                return "";
            }
            node = doc.createElement("style");
            node.id = key;
            head.appendChild(node);
        }
        if (style === undefined) {
            return node.innerHTML;
        }
        if (style !== "") {
            node.innerHTML = style;
        } else {
            head.removeChild(node);
        }
    }
};

utils.each([ "String", "Function", "Array", "Number" ], function(v) {
    UE.utils["is" + v] = function(obj) {
        return Object.prototype.toString.apply(obj) == "[object " + v + "]";
    };
});

var EventBase = UE.EventBase = function() {};

EventBase.prototype = {
    addListener: function(types, listener) {
        types = utils.trim(types).split(" ");
        for (var i = 0, ti; ti = types[i++]; ) {
            getListener(this, ti, true).push(listener);
        }
    },
    removeListener: function(types, listener) {
        types = utils.trim(types).split(" ");
        for (var i = 0, ti; ti = types[i++]; ) {
            utils.removeItem(getListener(this, ti) || [], listener);
        }
    },
    fireEvent: function(types) {
        types = utils.trim(types).split(" ");
        for (var i = 0, ti; ti = types[i++]; ) {
            var listeners = getListener(this, ti), r, t, k;
            if (listeners) {
                k = listeners.length;
                while (k--) {
                    t = listeners[k].apply(this, arguments);
                    if (t !== undefined) {
                        r = t;
                    }
                }
            }
            if (t = this["on" + ti.toLowerCase()]) {
                r = t.apply(this, arguments);
            }
        }
        return r;
    }
};

function getListener(obj, type, force) {
    var allListeners;
    type = type.toLowerCase();
    return (allListeners = obj.__allListeners || force && (obj.__allListeners = {})) && (allListeners[type] || force && (allListeners[type] = []));
}

var filterWord = UE.filterWord = function() {
    function isWordDocument(str) {
        return /(class="?Mso|style="[^"]*\bmso\-|w:WordDocument|<v:)/gi.test(str);
    }
    function transUnit(v) {
        v = v.replace(/[\d.]+\w+/g, function(m) {
            return utils.transUnitToPx(m);
        });
        return v;
    }
    function filterPasteWord(str) {
        return str.replace(/[\t\r\n]+/g, "").replace(/<!--[\s\S]*?-->/gi, "").replace(/<v:shape [^>]*>[\s\S]*?.<\/v:shape>/gi, function(str) {
            if (browser.opera) {
                return "";
            }
            try {
                var width = str.match(/width:([ \d.]*p[tx])/i)[1], height = str.match(/height:([ \d.]*p[tx])/i)[1], src = str.match(/src=\s*"([^"]*)"/i)[1];
                return '<img width="' + transUnit(width) + '" height="' + transUnit(height) + '" src="' + src + '" />';
            } catch (e) {
                return "";
            }
        }).replace(/<\/?div[^>]*>/g, "").replace(/v:\w+=(["']?)[^'"]+\1/g, "").replace(/<(!|script[^>]*>.*?<\/script(?=[>\s])|\/?(\?xml(:\w+)?|xml|meta|link|style|\w+:\w+)(?=[\s\/>]))[^>]*>/gi, "").replace(/<p [^>]*class="?MsoHeading"?[^>]*>(.*?)<\/p>/gi, "<p><strong>$1</strong></p>").replace(/\s+(class|lang|align)\s*=\s*(['"]?)[\w-]+\2/gi, "").replace(/<(font|span)[^>]*>\s*<\/\1>/gi, "").replace(/(<[a-z][^>]*)\sstyle=(["'])([^\2]*?)\2/gi, function(str, tag, tmp, style) {
            var n = [], s = style.replace(/^\s+|\s+$/, "").replace(/&#39;/g, "'").replace(/&quot;/gi, "'").split(/;\s*/g);
            for (var i = 0, v; v = s[i]; i++) {
                var name, value, parts = v.split(":");
                if (parts.length == 2) {
                    name = parts[0].toLowerCase();
                    value = parts[1].toLowerCase();
                    if (/^(background)\w*/.test(name) && value.replace(/(initial|\s)/g, "").length == 0 || /^(margin)\w*/.test(name) && /^0\w+$/.test(value)) {
                        continue;
                    }
                    switch (name) {
                      case "mso-padding-alt":
                      case "mso-padding-top-alt":
                      case "mso-padding-right-alt":
                      case "mso-padding-bottom-alt":
                      case "mso-padding-left-alt":
                      case "mso-margin-alt":
                      case "mso-margin-top-alt":
                      case "mso-margin-right-alt":
                      case "mso-margin-bottom-alt":
                      case "mso-margin-left-alt":
                      case "mso-height":
                      case "mso-width":
                      case "mso-vertical-align-alt":
                        if (!/<table/.test(tag)) n[i] = name.replace(/^mso-|-alt$/g, "") + ":" + transUnit(value);
                        continue;

                      case "horiz-align":
                        n[i] = "text-align:" + value;
                        continue;

                      case "vert-align":
                        n[i] = "vertical-align:" + value;
                        continue;

                      case "font-color":
                      case "mso-foreground":
                        n[i] = "color:" + value;
                        continue;

                      case "mso-background":
                      case "mso-highlight":
                        n[i] = "background:" + value;
                        continue;

                      case "mso-default-height":
                        n[i] = "min-height:" + transUnit(value);
                        continue;

                      case "mso-default-width":
                        n[i] = "min-width:" + transUnit(value);
                        continue;

                      case "mso-padding-between-alt":
                        n[i] = "border-collapse:separate;border-spacing:" + transUnit(value);
                        continue;

                      case "text-line-through":
                        if (value == "single" || value == "double") {
                            n[i] = "text-decoration:line-through";
                        }
                        continue;

                      case "mso-zero-height":
                        if (value == "yes") {
                            n[i] = "display:none";
                        }
                        continue;

                      case "background":
                        if (value == "initial") {}
                        break;

                      case "margin":
                        if (!/[1-9]/.test(value)) {
                            continue;
                        }
                    }
                    if (/^(mso|column|font-emph|lang|layout|line-break|list-image|nav|panose|punct|row|ruby|sep|size|src|tab-|table-border|text-(?:decor|trans)|top-bar|version|vnd|word-break)/.test(name) || /text\-indent|padding|margin/.test(name) && /\-[\d.]+/.test(value)) {
                        continue;
                    }
                    n[i] = name + ":" + parts[1];
                }
            }
            return tag + (n.length ? ' style="' + n.join(";").replace(/;{2,}/g, ";") + '"' : "");
        }).replace(/[\d.]+(cm|pt)/g, function(str) {
            return utils.transUnitToPx(str);
        });
    }
    return function(html) {
        return (isWordDocument(html) ? filterPasteWord(html) : html).replace(/>[ \t\r\n]*</g, "><");
    };
}();

var dtd = dom.dtd = function() {
    function _(s) {
        for (var k in s) {
            s[k.toUpperCase()] = s[k];
        }
        return s;
    }
    function X(t) {
        var a = arguments;
        for (var i = 1; i < a.length; i++) {
            var x = a[i];
            for (var k in x) {
                if (!t.hasOwnProperty(k)) {
                    t[k] = x[k];
                }
            }
        }
        return t;
    }
    var A = _({
        isindex: 1,
        fieldset: 1
    }), B = _({
        input: 1,
        button: 1,
        select: 1,
        textarea: 1,
        label: 1
    }), C = X(_({
        a: 1
    }), B), D = X({
        iframe: 1
    }, C), E = _({
        hr: 1,
        ul: 1,
        menu: 1,
        div: 1,
        blockquote: 1,
        noscript: 1,
        table: 1,
        center: 1,
        address: 1,
        dir: 1,
        pre: 1,
        h5: 1,
        dl: 1,
        h4: 1,
        noframes: 1,
        h6: 1,
        ol: 1,
        h1: 1,
        h3: 1,
        h2: 1
    }), F = _({
        ins: 1,
        del: 1,
        script: 1,
        style: 1
    }), G = X(_({
        b: 1,
        acronym: 1,
        bdo: 1,
        "var": 1,
        "#": 1,
        abbr: 1,
        code: 1,
        br: 1,
        i: 1,
        cite: 1,
        kbd: 1,
        u: 1,
        strike: 1,
        s: 1,
        tt: 1,
        strong: 1,
        q: 1,
        samp: 1,
        em: 1,
        dfn: 1,
        span: 1
    }), F), H = X(_({
        sub: 1,
        img: 1,
        embed: 1,
        object: 1,
        sup: 1,
        basefont: 1,
        map: 1,
        applet: 1,
        font: 1,
        big: 1,
        small: 1
    }), G), I = X(_({
        p: 1
    }), H), J = X(_({
        iframe: 1
    }), H, B), K = _({
        img: 1,
        embed: 1,
        noscript: 1,
        br: 1,
        kbd: 1,
        center: 1,
        button: 1,
        basefont: 1,
        h5: 1,
        h4: 1,
        samp: 1,
        h6: 1,
        ol: 1,
        h1: 1,
        h3: 1,
        h2: 1,
        form: 1,
        font: 1,
        "#": 1,
        select: 1,
        menu: 1,
        ins: 1,
        abbr: 1,
        label: 1,
        code: 1,
        table: 1,
        script: 1,
        cite: 1,
        input: 1,
        iframe: 1,
        strong: 1,
        textarea: 1,
        noframes: 1,
        big: 1,
        small: 1,
        span: 1,
        hr: 1,
        sub: 1,
        bdo: 1,
        "var": 1,
        div: 1,
        object: 1,
        sup: 1,
        strike: 1,
        dir: 1,
        map: 1,
        dl: 1,
        applet: 1,
        del: 1,
        isindex: 1,
        fieldset: 1,
        ul: 1,
        b: 1,
        acronym: 1,
        a: 1,
        blockquote: 1,
        i: 1,
        u: 1,
        s: 1,
        tt: 1,
        address: 1,
        q: 1,
        pre: 1,
        p: 1,
        em: 1,
        dfn: 1
    }), L = X(_({
        a: 0
    }), J), M = _({
        tr: 1
    }), N = _({
        "#": 1
    }), O = X(_({
        param: 1
    }), K), P = X(_({
        form: 1
    }), A, D, E, I), Q = _({
        li: 1
    }), R = _({
        style: 1,
        script: 1
    }), S = _({
        base: 1,
        link: 1,
        meta: 1,
        title: 1
    }), T = X(S, R), U = _({
        head: 1,
        body: 1
    }), V = _({
        html: 1
    });
    var block = _({
        address: 1,
        blockquote: 1,
        center: 1,
        dir: 1,
        div: 1,
        dl: 1,
        fieldset: 1,
        form: 1,
        h1: 1,
        h2: 1,
        h3: 1,
        h4: 1,
        h5: 1,
        h6: 1,
        hr: 1,
        isindex: 1,
        menu: 1,
        noframes: 1,
        ol: 1,
        p: 1,
        pre: 1,
        table: 1,
        ul: 1
    }), empty = _({
        area: 1,
        base: 1,
        br: 1,
        col: 1,
        hr: 1,
        img: 1,
        input: 1,
        link: 1,
        meta: 1,
        param: 1,
        embed: 1
    });
    return _({
        $nonBodyContent: X(V, U, S),
        $block: block,
        $inline: L,
        $body: X(_({
            script: 1,
            style: 1
        }), block),
        $cdata: _({
            script: 1,
            style: 1
        }),
        $empty: empty,
        $nonChild: _({
            iframe: 1,
            textarea: 1
        }),
        $listItem: _({
            dd: 1,
            dt: 1,
            li: 1
        }),
        $list: _({
            ul: 1,
            ol: 1,
            dl: 1
        }),
        $isNotEmpty: _({
            table: 1,
            ul: 1,
            ol: 1,
            dl: 1,
            iframe: 1,
            area: 1,
            base: 1,
            col: 1,
            hr: 1,
            img: 1,
            embed: 1,
            input: 1,
            link: 1,
            meta: 1,
            param: 1
        }),
        $removeEmpty: _({
            a: 1,
            abbr: 1,
            acronym: 1,
            address: 1,
            b: 1,
            bdo: 1,
            big: 1,
            cite: 1,
            code: 1,
            del: 1,
            dfn: 1,
            em: 1,
            font: 1,
            i: 1,
            ins: 1,
            label: 1,
            kbd: 1,
            q: 1,
            s: 1,
            samp: 1,
            small: 1,
            span: 1,
            strike: 1,
            strong: 1,
            sub: 1,
            sup: 1,
            tt: 1,
            u: 1,
            "var": 1
        }),
        $removeEmptyBlock: _({
            p: 1,
            div: 1
        }),
        $tableContent: _({
            caption: 1,
            col: 1,
            colgroup: 1,
            tbody: 1,
            td: 1,
            tfoot: 1,
            th: 1,
            thead: 1,
            tr: 1,
            table: 1
        }),
        $notTransContent: _({
            pre: 1,
            script: 1,
            style: 1,
            textarea: 1
        }),
        html: U,
        head: T,
        style: N,
        script: N,
        body: P,
        base: {},
        link: {},
        meta: {},
        title: N,
        col: {},
        tr: _({
            td: 1,
            th: 1
        }),
        img: {},
        embed: {},
        colgroup: _({
            thead: 1,
            col: 1,
            tbody: 1,
            tr: 1,
            tfoot: 1
        }),
        noscript: P,
        td: P,
        br: {},
        th: P,
        center: P,
        kbd: L,
        button: X(I, E),
        basefont: {},
        h5: L,
        h4: L,
        samp: L,
        h6: L,
        ol: Q,
        h1: L,
        h3: L,
        option: N,
        h2: L,
        form: X(A, D, E, I),
        select: _({
            optgroup: 1,
            option: 1
        }),
        font: L,
        ins: L,
        menu: Q,
        abbr: L,
        label: L,
        table: _({
            thead: 1,
            col: 1,
            tbody: 1,
            tr: 1,
            colgroup: 1,
            caption: 1,
            tfoot: 1
        }),
        code: L,
        tfoot: M,
        cite: L,
        li: P,
        input: {},
        iframe: P,
        strong: L,
        textarea: N,
        noframes: P,
        big: L,
        small: L,
        span: _({
            "#": 1,
            br: 1
        }),
        hr: L,
        dt: L,
        sub: L,
        optgroup: _({
            option: 1
        }),
        param: {},
        bdo: L,
        "var": L,
        div: P,
        object: O,
        sup: L,
        dd: P,
        strike: L,
        area: {},
        dir: Q,
        map: X(_({
            area: 1,
            form: 1,
            p: 1
        }), A, F, E),
        applet: O,
        dl: _({
            dt: 1,
            dd: 1
        }),
        del: L,
        isindex: {},
        fieldset: X(_({
            legend: 1
        }), K),
        thead: M,
        ul: Q,
        acronym: L,
        b: L,
        a: X(_({
            a: 1
        }), J),
        blockquote: X(_({
            td: 1,
            tr: 1,
            tbody: 1,
            li: 1
        }), P),
        caption: L,
        i: L,
        u: L,
        tbody: M,
        s: L,
        address: X(D, I),
        tt: L,
        legend: L,
        q: L,
        pre: X(G, C),
        p: X(_({
            a: 1
        }), L),
        em: L,
        dfn: L
    });
}();

function getDomNode(node, start, ltr, startFromChild, fn, guard) {
    var tmpNode = startFromChild && node[start], parent;
    !tmpNode && (tmpNode = node[ltr]);
    while (!tmpNode && (parent = (parent || node).parentNode)) {
        if (parent.tagName == "BODY" || guard && !guard(parent)) {
            return null;
        }
        tmpNode = parent[ltr];
    }
    if (tmpNode && fn && !fn(tmpNode)) {
        return getDomNode(tmpNode, start, ltr, false, fn);
    }
    return tmpNode;
}

var attrFix = ie && browser.version < 9 ? {
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
    frameborder: "frameBorder"
} : {
    tabindex: "tabIndex",
    readonly: "readOnly"
}, styleBlock = utils.listToMap([ "-webkit-box", "-moz-box", "block", "list-item", "table", "table-row-group", "table-header-group", "table-footer-group", "table-row", "table-column-group", "table-column", "table-cell", "table-caption" ]);

var domUtils = dom.domUtils = {
    NODE_ELEMENT: 1,
    NODE_DOCUMENT: 9,
    NODE_TEXT: 3,
    NODE_COMMENT: 8,
    NODE_DOCUMENT_FRAGMENT: 11,
    POSITION_IDENTICAL: 0,
    POSITION_DISCONNECTED: 1,
    POSITION_FOLLOWING: 2,
    POSITION_PRECEDING: 4,
    POSITION_IS_CONTAINED: 8,
    POSITION_CONTAINS: 16,
    fillChar: ie && browser.version == "6" ? "﻿" : "​",
    keys: {
        8: 1,
        46: 1,
        16: 1,
        17: 1,
        18: 1,
        37: 1,
        38: 1,
        39: 1,
        40: 1,
        13: 1
    },
    getPosition: function(nodeA, nodeB) {
        if (nodeA === nodeB) {
            return 0;
        }
        var node, parentsA = [ nodeA ], parentsB = [ nodeB ];
        node = nodeA;
        while (node = node.parentNode) {
            if (node === nodeB) {
                return 10;
            }
            parentsA.push(node);
        }
        node = nodeB;
        while (node = node.parentNode) {
            if (node === nodeA) {
                return 20;
            }
            parentsB.push(node);
        }
        parentsA.reverse();
        parentsB.reverse();
        if (parentsA[0] !== parentsB[0]) {
            return 1;
        }
        var i = -1;
        while (i++, parentsA[i] === parentsB[i]) {}
        nodeA = parentsA[i];
        nodeB = parentsB[i];
        while (nodeA = nodeA.nextSibling) {
            if (nodeA === nodeB) {
                return 4;
            }
        }
        return 2;
    },
    getNodeIndex: function(node, ignoreTextNode) {
        var preNode = node, i = 0;
        while (preNode = preNode.previousSibling) {
            if (ignoreTextNode && preNode.nodeType == 3) {
                continue;
            }
            i++;
        }
        return i;
    },
    inDoc: function(node, doc) {
        return domUtils.getPosition(node, doc) == 10;
    },
    findParent: function(node, filterFn, includeSelf) {
        if (node && !domUtils.isBody(node)) {
            node = includeSelf ? node : node.parentNode;
            while (node) {
                if (!filterFn || filterFn(node) || domUtils.isBody(node)) {
                    return filterFn && !filterFn(node) && domUtils.isBody(node) ? null : node;
                }
                node = node.parentNode;
            }
        }
        return null;
    },
    findParentByTagName: function(node, tagNames, includeSelf, excludeFn) {
        tagNames = utils.listToMap(utils.isArray(tagNames) ? tagNames : [ tagNames ]);
        return domUtils.findParent(node, function(node) {
            return tagNames[node.tagName] && !(excludeFn && excludeFn(node));
        }, includeSelf);
    },
    findParents: function(node, includeSelf, filterFn, closerFirst) {
        var parents = includeSelf && (filterFn && filterFn(node) || !filterFn) ? [ node ] : [];
        while (node = domUtils.findParent(node, filterFn)) {
            parents.push(node);
        }
        return closerFirst ? parents : parents.reverse();
    },
    insertAfter: function(node, newNode) {
        return node.parentNode.insertBefore(newNode, node.nextSibling);
    },
    remove: function(node, keepChildren) {
        var parent = node.parentNode, child;
        if (parent) {
            if (keepChildren && node.hasChildNodes()) {
                while (child = node.firstChild) {
                    parent.insertBefore(child, node);
                }
            }
            parent.removeChild(node);
        }
        return node;
    },
    getNextDomNode: function(node, startFromChild, filterFn, guard) {
        return getDomNode(node, "firstChild", "nextSibling", startFromChild, filterFn, guard);
    },
    isBookmarkNode: function(node) {
        return node.nodeType == 1 && node.id && /^_baidu_bookmark_/i.test(node.id);
    },
    getWindow: function(node) {
        var doc = node.ownerDocument || node;
        return doc.defaultView || doc.parentWindow;
    },
    getCommonAncestor: function(nodeA, nodeB) {
        if (nodeA === nodeB) return nodeA;
        var parentsA = [ nodeA ], parentsB = [ nodeB ], parent = nodeA, i = -1;
        while (parent = parent.parentNode) {
            if (parent === nodeB) {
                return parent;
            }
            parentsA.push(parent);
        }
        parent = nodeB;
        while (parent = parent.parentNode) {
            if (parent === nodeA) return parent;
            parentsB.push(parent);
        }
        parentsA.reverse();
        parentsB.reverse();
        while (i++, parentsA[i] === parentsB[i]) {}
        return i == 0 ? null : parentsA[i - 1];
    },
    clearEmptySibling: function(node, ignoreNext, ignorePre) {
        function clear(next, dir) {
            var tmpNode;
            while (next && !domUtils.isBookmarkNode(next) && (domUtils.isEmptyInlineElement(next) || !new RegExp("[^	\n\r" + domUtils.fillChar + "]").test(next.nodeValue))) {
                tmpNode = next[dir];
                domUtils.remove(next);
                next = tmpNode;
            }
        }
        !ignoreNext && clear(node.nextSibling, "nextSibling");
        !ignorePre && clear(node.previousSibling, "previousSibling");
    },
    split: function(node, offset) {
        var doc = node.ownerDocument;
        if (browser.ie && offset == node.nodeValue.length) {
            var next = doc.createTextNode("");
            return domUtils.insertAfter(node, next);
        }
        var retval = node.splitText(offset);
        if (browser.ie8) {
            var tmpNode = doc.createTextNode("");
            domUtils.insertAfter(retval, tmpNode);
            domUtils.remove(tmpNode);
        }
        return retval;
    },
    isWhitespace: function(node) {
        return !new RegExp("[^ 	\n\r" + domUtils.fillChar + "]").test(node.nodeValue);
    },
    getXY: function(element) {
        var x = 0, y = 0;
        while (element.offsetParent) {
            y += element.offsetTop;
            x += element.offsetLeft;
            element = element.offsetParent;
        }
        return {
            x: x,
            y: y
        };
    },
    on: function(element, type, handler) {
        var types = utils.isArray(type) ? type : [ type ], k = types.length;
        if (k) while (k--) {
            type = types[k];
            if (element.addEventListener) {
                element.addEventListener(type, handler, false);
            } else {
                if (!handler._d) {
                    handler._d = {
                        els: []
                    };
                }
                var key = type + handler.toString(), index = utils.indexOf(handler._d.els, element);
                if (!handler._d[key] || index == -1) {
                    if (index == -1) {
                        handler._d.els.push(element);
                    }
                    if (!handler._d[key]) {
                        handler._d[key] = function(evt) {
                            return handler.call(evt.srcElement, evt || window.event);
                        };
                    }
                    element.attachEvent("on" + type, handler._d[key]);
                }
            }
        }
        element = null;
    },
    un: function(element, type, handler) {
        var types = utils.isArray(type) ? type : [ type ], k = types.length;
        if (k) while (k--) {
            type = types[k];
            if (element.removeEventListener) {
                element.removeEventListener(type, handler, false);
            } else {
                var key = type + handler.toString();
                try {
                    element.detachEvent("on" + type, handler._d ? handler._d[key] : handler);
                } catch (e) {}
                if (handler._d && handler._d[key]) {
                    var index = utils.indexOf(handler._d.els, element);
                    if (index != -1) {
                        handler._d.els.splice(index, 1);
                    }
                    handler._d.els.length == 0 && delete handler._d[key];
                }
            }
        }
    },
    isSameElement: function(nodeA, nodeB) {
        if (nodeA.tagName != nodeB.tagName) {
            return false;
        }
        var thisAttrs = nodeA.attributes, otherAttrs = nodeB.attributes;
        if (!ie && thisAttrs.length != otherAttrs.length) {
            return false;
        }
        var attrA, attrB, al = 0, bl = 0;
        for (var i = 0; attrA = thisAttrs[i++]; ) {
            if (attrA.nodeName == "style") {
                if (attrA.specified) {
                    al++;
                }
                if (domUtils.isSameStyle(nodeA, nodeB)) {
                    continue;
                } else {
                    return false;
                }
            }
            if (ie) {
                if (attrA.specified) {
                    al++;
                    attrB = otherAttrs.getNamedItem(attrA.nodeName);
                } else {
                    continue;
                }
            } else {
                attrB = nodeB.attributes[attrA.nodeName];
            }
            if (!attrB.specified || attrA.nodeValue != attrB.nodeValue) {
                return false;
            }
        }
        if (ie) {
            for (i = 0; attrB = otherAttrs[i++]; ) {
                if (attrB.specified) {
                    bl++;
                }
            }
            if (al != bl) {
                return false;
            }
        }
        return true;
    },
    isSameStyle: function(nodeA, nodeB) {
        var styleA = nodeA.style.cssText.replace(/( ?; ?)/g, ";").replace(/( ?: ?)/g, ":"), styleB = nodeB.style.cssText.replace(/( ?; ?)/g, ";").replace(/( ?: ?)/g, ":");
        if (browser.opera) {
            styleA = nodeA.style;
            styleB = nodeB.style;
            if (styleA.length != styleB.length) return false;
            for (var p in styleA) {
                if (/^(\d+|csstext)$/i.test(p)) {
                    continue;
                }
                if (styleA[p] != styleB[p]) {
                    return false;
                }
            }
            return true;
        }
        if (!styleA || !styleB) {
            return styleA == styleB;
        }
        styleA = styleA.split(";");
        styleB = styleB.split(";");
        if (styleA.length != styleB.length) {
            return false;
        }
        for (var i = 0, ci; ci = styleA[i++]; ) {
            if (utils.indexOf(styleB, ci) == -1) {
                return false;
            }
        }
        return true;
    },
    isBlockElm: function(node) {
        return node.nodeType == 1 && (dtd.$block[node.tagName] || styleBlock[domUtils.getComputedStyle(node, "display")]) && !dtd.$nonChild[node.tagName];
    },
    isBody: function(node) {
        return node && node.nodeType == 1 && node.tagName.toLowerCase() == "body";
    },
    breakParent: function(node, parent) {
        var tmpNode, parentClone = node, clone = node, leftNodes, rightNodes;
        do {
            parentClone = parentClone.parentNode;
            if (leftNodes) {
                tmpNode = parentClone.cloneNode(false);
                tmpNode.appendChild(leftNodes);
                leftNodes = tmpNode;
                tmpNode = parentClone.cloneNode(false);
                tmpNode.appendChild(rightNodes);
                rightNodes = tmpNode;
            } else {
                leftNodes = parentClone.cloneNode(false);
                rightNodes = leftNodes.cloneNode(false);
            }
            while (tmpNode = clone.previousSibling) {
                leftNodes.insertBefore(tmpNode, leftNodes.firstChild);
            }
            while (tmpNode = clone.nextSibling) {
                rightNodes.appendChild(tmpNode);
            }
            clone = parentClone;
        } while (parent !== parentClone);
        tmpNode = parent.parentNode;
        tmpNode.insertBefore(leftNodes, parent);
        tmpNode.insertBefore(rightNodes, parent);
        tmpNode.insertBefore(node, rightNodes);
        domUtils.remove(parent);
        return node;
    },
    isEmptyInlineElement: function(node) {
        if (node.nodeType != 1 || !dtd.$removeEmpty[node.tagName]) {
            return 0;
        }
        node = node.firstChild;
        while (node) {
            if (domUtils.isBookmarkNode(node)) {
                return 0;
            }
            if (node.nodeType == 1 && !domUtils.isEmptyInlineElement(node) || node.nodeType == 3 && !domUtils.isWhitespace(node)) {
                return 0;
            }
            node = node.nextSibling;
        }
        return 1;
    },
    trimWhiteTextNode: function(node) {
        function remove(dir) {
            var child;
            while ((child = node[dir]) && child.nodeType == 3 && domUtils.isWhitespace(child)) {
                node.removeChild(child);
            }
        }
        remove("firstChild");
        remove("lastChild");
    },
    mergeChild: function(node, tagName, attrs) {
        var list = domUtils.getElementsByTagName(node, node.tagName.toLowerCase());
        for (var i = 0, ci; ci = list[i++]; ) {
            if (!ci.parentNode || domUtils.isBookmarkNode(ci)) {
                continue;
            }
            if (ci.tagName.toLowerCase() == "span") {
                if (node === ci.parentNode) {
                    domUtils.trimWhiteTextNode(node);
                    if (node.childNodes.length == 1) {
                        node.style.cssText = ci.style.cssText + ";" + node.style.cssText;
                        domUtils.remove(ci, true);
                        continue;
                    }
                }
                ci.style.cssText = node.style.cssText + ";" + ci.style.cssText;
                if (attrs) {
                    var style = attrs.style;
                    if (style) {
                        style = style.split(";");
                        for (var j = 0, s; s = style[j++]; ) {
                            ci.style[utils.cssStyleToDomStyle(s.split(":")[0])] = s.split(":")[1];
                        }
                    }
                }
                if (domUtils.isSameStyle(ci, node)) {
                    domUtils.remove(ci, true);
                }
                continue;
            }
            if (domUtils.isSameElement(node, ci)) {
                domUtils.remove(ci, true);
            }
        }
    },
    getElementsByTagName: function(node, name) {
        var list = node.getElementsByTagName(name), arr = [];
        for (var i = 0, ci; ci = list[i++]; ) {
            arr.push(ci);
        }
        return arr;
    },
    mergeToParent: function(node) {
        var parent = node.parentNode;
        while (parent && dtd.$removeEmpty[parent.tagName]) {
            if (parent.tagName == node.tagName || parent.tagName == "A") {
                domUtils.trimWhiteTextNode(parent);
                if (parent.tagName == "SPAN" && !domUtils.isSameStyle(parent, node) || parent.tagName == "A" && node.tagName == "SPAN") {
                    if (parent.childNodes.length > 1 || parent !== node.parentNode) {
                        node.style.cssText = parent.style.cssText + ";" + node.style.cssText;
                        parent = parent.parentNode;
                        continue;
                    } else {
                        parent.style.cssText += ";" + node.style.cssText;
                        if (parent.tagName == "A") {
                            parent.style.textDecoration = "underline";
                        }
                    }
                }
                if (parent.tagName != "A") {
                    parent === node.parentNode && domUtils.remove(node, true);
                    break;
                }
            }
            parent = parent.parentNode;
        }
    },
    mergeSibling: function(node, ignorePre, ignoreNext) {
        function merge(rtl, start, node) {
            var next;
            if ((next = node[rtl]) && !domUtils.isBookmarkNode(next) && next.nodeType == 1 && domUtils.isSameElement(node, next)) {
                while (next.firstChild) {
                    if (start == "firstChild") {
                        node.insertBefore(next.lastChild, node.firstChild);
                    } else {
                        node.appendChild(next.firstChild);
                    }
                }
                domUtils.remove(next);
            }
        }
        !ignorePre && merge("previousSibling", "firstChild", node);
        !ignoreNext && merge("nextSibling", "lastChild", node);
    },
    unSelectable: ie || browser.opera ? function(node) {
        node.onselectstart = function() {
            return false;
        };
        node.onclick = node.onkeyup = node.onkeydown = function() {
            return false;
        };
        node.unselectable = "on";
        node.setAttribute("unselectable", "on");
        for (var i = 0, ci; ci = node.all[i++]; ) {
            switch (ci.tagName.toLowerCase()) {
              case "iframe":
              case "textarea":
              case "input":
              case "select":
                break;

              default:
                ci.unselectable = "on";
                node.setAttribute("unselectable", "on");
            }
        }
    } : function(node) {
        node.style.MozUserSelect = node.style.webkitUserSelect = node.style.KhtmlUserSelect = "none";
    },
    removeAttributes: function(node, attrNames) {
        for (var i = 0, ci; ci = attrNames[i++]; ) {
            ci = attrFix[ci] || ci;
            switch (ci) {
              case "className":
                node[ci] = "";
                break;

              case "style":
                node.style.cssText = "";
                !browser.ie && node.removeAttributeNode(node.getAttributeNode("style"));
            }
            node.removeAttribute(ci);
        }
    },
    createElement: function(doc, tag, attrs) {
        return domUtils.setAttributes(doc.createElement(tag), attrs);
    },
    setAttributes: function(node, attrs) {
        for (var attr in attrs) {
            if (attrs.hasOwnProperty(attr)) {
                var value = attrs[attr];
                switch (attr) {
                  case "class":
                    node.className = value;
                    break;

                  case "style":
                    node.style.cssText = node.style.cssText + ";" + value;
                    break;

                  case "innerHTML":
                    node[attr] = value;
                    break;

                  case "value":
                    node.value = value;
                    break;

                  default:
                    node.setAttribute(attrFix[attr] || attr, value);
                }
            }
        }
        return node;
    },
    getComputedStyle: function(element, styleName) {
        var pros = "width height top left";
        if (pros.indexOf(styleName) > -1) {
            return element["offset" + styleName.replace(/^\w/, function(s) {
                return s.toUpperCase();
            })] + "px";
        }
        if (element.nodeType == 3) {
            element = element.parentNode;
        }
        if (browser.ie && browser.version < 9 && styleName == "font-size" && !element.style.fontSize && !dtd.$empty[element.tagName] && !dtd.$nonChild[element.tagName]) {
            var span = element.ownerDocument.createElement("span");
            span.style.cssText = "padding:0;border:0;font-family:simsun;";
            span.innerHTML = ".";
            element.appendChild(span);
            var result = span.offsetHeight;
            element.removeChild(span);
            span = null;
            return result + "px";
        }
        try {
            var value = domUtils.getStyle(element, styleName) || (window.getComputedStyle ? domUtils.getWindow(element).getComputedStyle(element, "").getPropertyValue(styleName) : (element.currentStyle || element.style)[utils.cssStyleToDomStyle(styleName)]);
        } catch (e) {
            return "";
        }
        return utils.transUnitToPx(utils.fixColor(styleName, value));
    },
    removeClasses: function(elm, classNames) {
        classNames = utils.isArray(classNames) ? classNames : utils.trim(classNames).replace(/[ ]{2,}/g, " ").split(" ");
        for (var i = 0, ci, cls = elm.className; ci = classNames[i++]; ) {
            cls = cls.replace(new RegExp("\\b" + ci + "\\b"), "");
        }
        cls = utils.trim(cls).replace(/[ ]{2,}/g, " ");
        if (cls) {
            elm.className = cls;
        } else {
            domUtils.removeAttributes(elm, [ "class" ]);
        }
    },
    addClass: function(elm, classNames) {
        if (!elm) return;
        classNames = utils.trim(classNames).replace(/[ ]{2,}/g, " ").split(" ");
        for (var i = 0, ci, cls = elm.className; ci = classNames[i++]; ) {
            if (!new RegExp("\\b" + ci + "\\b").test(cls)) {
                elm.className += " " + ci;
            }
        }
    },
    hasClass: function(element, className) {
        className = utils.trim(className).replace(/[ ]{2,}/g, " ").split(" ");
        for (var i = 0, ci, cls = element.className; ci = className[i++]; ) {
            if (!new RegExp("\\b" + ci + "\\b").test(cls)) {
                return false;
            }
        }
        return i - 1 == className.length;
    },
    preventDefault: function(evt) {
        evt.preventDefault ? evt.preventDefault() : evt.returnValue = false;
    },
    removeStyle: function(element, name) {
        if (element.style.removeProperty) {
            element.style.removeProperty(name);
        } else {
            element.style.removeAttribute(utils.cssStyleToDomStyle(name));
        }
        if (!element.style.cssText) {
            domUtils.removeAttributes(element, [ "style" ]);
        }
    },
    getStyle: function(element, name) {
        var value = element.style[utils.cssStyleToDomStyle(name)];
        return utils.fixColor(name, value);
    },
    setStyle: function(element, name, value) {
        element.style[utils.cssStyleToDomStyle(name)] = value;
    },
    setStyles: function(element, styles) {
        for (var name in styles) {
            if (styles.hasOwnProperty(name)) {
                domUtils.setStyle(element, name, styles[name]);
            }
        }
    },
    removeDirtyAttr: function(node) {
        for (var i = 0, ci, nodes = node.getElementsByTagName("*"); ci = nodes[i++]; ) {
            ci.removeAttribute("_moz_dirty");
        }
        node.removeAttribute("_moz_dirty");
    },
    getChildCount: function(node, fn) {
        var count = 0, first = node.firstChild;
        fn = fn || function() {
            return 1;
        };
        while (first) {
            if (fn(first)) {
                count++;
            }
            first = first.nextSibling;
        }
        return count;
    },
    isEmptyNode: function(node) {
        return !node.firstChild || domUtils.getChildCount(node, function(node) {
            return !domUtils.isBr(node) && !domUtils.isBookmarkNode(node) && !domUtils.isWhitespace(node);
        }) == 0;
    },
    clearSelectedArr: function(nodes) {
        var node;
        while (node = nodes.pop()) {
            domUtils.removeAttributes(node, [ "class" ]);
        }
    },
    scrollToView: function(node, win, offsetTop) {
        var getViewPaneSize = function() {
            var doc = win.document, mode = doc.compatMode == "CSS1Compat";
            return {
                width: (mode ? doc.documentElement.clientWidth : doc.body.clientWidth) || 0,
                height: (mode ? doc.documentElement.clientHeight : doc.body.clientHeight) || 0
            };
        }, getScrollPosition = function(win) {
            if ("pageXOffset" in win) {
                return {
                    x: win.pageXOffset || 0,
                    y: win.pageYOffset || 0
                };
            } else {
                var doc = win.document;
                return {
                    x: doc.documentElement.scrollLeft || doc.body.scrollLeft || 0,
                    y: doc.documentElement.scrollTop || doc.body.scrollTop || 0
                };
            }
        };
        var winHeight = getViewPaneSize().height, offset = winHeight * -1 + offsetTop;
        offset += node.offsetHeight || 0;
        var elementPosition = domUtils.getXY(node);
        offset += elementPosition.y;
        var currentScroll = getScrollPosition(win).y;
        if (offset > currentScroll || offset < currentScroll - winHeight) {
            win.scrollTo(0, offset + (offset < 0 ? -20 : 20));
        }
    },
    isBr: function(node) {
        return node.nodeType == 1 && node.tagName == "BR";
    },
    isFillChar: function(node) {
        return node.nodeType == 3 && !node.nodeValue.replace(new RegExp(domUtils.fillChar), "").length;
    },
    isStartInblock: function(range) {
        var tmpRange = range.cloneRange(), flag = 0, start = tmpRange.startContainer, tmp;
        while (start && domUtils.isFillChar(start)) {
            tmp = start;
            start = start.previousSibling;
        }
        if (tmp) {
            tmpRange.setStartBefore(tmp);
            start = tmpRange.startContainer;
        }
        if (start.nodeType == 1 && domUtils.isEmptyNode(start) && tmpRange.startOffset == 1) {
            tmpRange.setStart(start, 0).collapse(true);
        }
        while (!tmpRange.startOffset) {
            start = tmpRange.startContainer;
            if (domUtils.isBlockElm(start) || domUtils.isBody(start)) {
                flag = 1;
                break;
            }
            var pre = tmpRange.startContainer.previousSibling, tmpNode;
            if (!pre) {
                tmpRange.setStartBefore(tmpRange.startContainer);
            } else {
                while (pre && domUtils.isFillChar(pre)) {
                    tmpNode = pre;
                    pre = pre.previousSibling;
                }
                if (tmpNode) {
                    tmpRange.setStartBefore(tmpNode);
                } else {
                    tmpRange.setStartBefore(tmpRange.startContainer);
                }
            }
        }
        return flag && !domUtils.isBody(tmpRange.startContainer) ? 1 : 0;
    },
    isEmptyBlock: function(node) {
        var reg = new RegExp("[ 	\r\n" + domUtils.fillChar + "]", "g");
        if (node[browser.ie ? "innerText" : "textContent"].replace(reg, "").length > 0) {
            return 0;
        }
        for (var n in dtd.$isNotEmpty) {
            if (node.getElementsByTagName(n).length) {
                return 0;
            }
        }
        return 1;
    },
    setViewportOffset: function(element, offset) {
        var left = parseInt(element.style.left) | 0;
        var top = parseInt(element.style.top) | 0;
        var rect = element.getBoundingClientRect();
        var offsetLeft = offset.left - rect.left;
        var offsetTop = offset.top - rect.top;
        if (offsetLeft) {
            element.style.left = left + offsetLeft + "px";
        }
        if (offsetTop) {
            element.style.top = top + offsetTop + "px";
        }
    },
    fillNode: function(doc, node) {
        var tmpNode = browser.ie ? doc.createTextNode(domUtils.fillChar) : doc.createElement("br");
        node.innerHTML = "";
        node.appendChild(tmpNode);
    },
    moveChild: function(src, tag, dir) {
        while (src.firstChild) {
            if (dir && tag.firstChild) {
                tag.insertBefore(src.lastChild, tag.firstChild);
            } else {
                tag.appendChild(src.firstChild);
            }
        }
    },
    hasNoAttributes: function(node) {
        return browser.ie ? /^<\w+\s*?>/.test(node.outerHTML) : node.attributes.length == 0;
    },
    isCustomeNode: function(node) {
        return node.nodeType == 1 && node.getAttribute("_ue_custom_node_");
    },
    isTagNode: function(node, tagName) {
        return node.nodeType == 1 && new RegExp(node.tagName, "i").test(tagName);
    },
    filterNodeList: function(nodelist, filter, forAll) {
        var results = [];
        if (!utils.isFunction(filter)) {
            var str = filter;
            filter = function(n) {
                return utils.indexOf(utils.isArray(str) ? str : str.split(" "), n.tagName.toLowerCase()) != -1;
            };
        }
        utils.each(nodelist, function(n) {
            filter(n) && results.push(n);
        });
        return results.length == 0 ? null : results.length == 1 || !forAll ? results[0] : results;
    },
    isInNodeEndBoundary: function(rng, node) {
        var start = rng.startContainer;
        if (start.nodeType == 3 && rng.startOffset != start.nodeValue.length) {
            return 0;
        }
        if (start.nodeType == 1 && rng.startOffset != start.childNodes.length) {
            return 0;
        }
        while (start !== node) {
            if (start.nextSibling) {
                return 0;
            }
            start = start.parentNode;
        }
        return 1;
    }
};

var fillCharReg = new RegExp(domUtils.fillChar, "g");

(function() {
    var guid = 0, fillChar = domUtils.fillChar, fillData;
    function updateCollapse(range) {
        range.collapsed = range.startContainer && range.endContainer && range.startContainer === range.endContainer && range.startOffset == range.endOffset;
    }
    function selectOneNode(rng) {
        return !rng.collapsed && rng.startContainer.nodeType == 1 && rng.startContainer === rng.endContainer && rng.endOffset - rng.startOffset == 1;
    }
    function setEndPoint(toStart, node, offset, range) {
        if (node.nodeType == 1 && (dtd.$empty[node.tagName] || dtd.$nonChild[node.tagName])) {
            offset = domUtils.getNodeIndex(node) + (toStart ? 0 : 1);
            node = node.parentNode;
        }
        if (toStart) {
            range.startContainer = node;
            range.startOffset = offset;
            if (!range.endContainer) {
                range.collapse(true);
            }
        } else {
            range.endContainer = node;
            range.endOffset = offset;
            if (!range.startContainer) {
                range.collapse(false);
            }
        }
        updateCollapse(range);
        return range;
    }
    function execContentsAction(range, action) {
        var start = range.startContainer, end = range.endContainer, startOffset = range.startOffset, endOffset = range.endOffset, doc = range.document, frag = doc.createDocumentFragment(), tmpStart, tmpEnd;
        if (start.nodeType == 1) {
            start = start.childNodes[startOffset] || (tmpStart = start.appendChild(doc.createTextNode("")));
        }
        if (end.nodeType == 1) {
            end = end.childNodes[endOffset] || (tmpEnd = end.appendChild(doc.createTextNode("")));
        }
        if (start === end && start.nodeType == 3) {
            frag.appendChild(doc.createTextNode(start.substringData(startOffset, endOffset - startOffset)));
            if (action) {
                start.deleteData(startOffset, endOffset - startOffset);
                range.collapse(true);
            }
            return frag;
        }
        var current, currentLevel, clone = frag, startParents = domUtils.findParents(start, true), endParents = domUtils.findParents(end, true);
        for (var i = 0; startParents[i] == endParents[i]; ) {
            i++;
        }
        for (var j = i, si; si = startParents[j]; j++) {
            current = si.nextSibling;
            if (si == start) {
                if (!tmpStart) {
                    if (range.startContainer.nodeType == 3) {
                        clone.appendChild(doc.createTextNode(start.nodeValue.slice(startOffset)));
                        if (action) {
                            start.deleteData(startOffset, start.nodeValue.length - startOffset);
                        }
                    } else {
                        clone.appendChild(!action ? start.cloneNode(true) : start);
                    }
                }
            } else {
                currentLevel = si.cloneNode(false);
                clone.appendChild(currentLevel);
            }
            while (current) {
                if (current === end || current === endParents[j]) {
                    break;
                }
                si = current.nextSibling;
                clone.appendChild(!action ? current.cloneNode(true) : current);
                current = si;
            }
            clone = currentLevel;
        }
        clone = frag;
        if (!startParents[i]) {
            clone.appendChild(startParents[i - 1].cloneNode(false));
            clone = clone.firstChild;
        }
        for (var j = i, ei; ei = endParents[j]; j++) {
            current = ei.previousSibling;
            if (ei == end) {
                if (!tmpEnd && range.endContainer.nodeType == 3) {
                    clone.appendChild(doc.createTextNode(end.substringData(0, endOffset)));
                    if (action) {
                        end.deleteData(0, endOffset);
                    }
                }
            } else {
                currentLevel = ei.cloneNode(false);
                clone.appendChild(currentLevel);
            }
            if (j != i || !startParents[i]) {
                while (current) {
                    if (current === start) {
                        break;
                    }
                    ei = current.previousSibling;
                    clone.insertBefore(!action ? current.cloneNode(true) : current, clone.firstChild);
                    current = ei;
                }
            }
            clone = currentLevel;
        }
        if (action) {
            range.setStartBefore(!endParents[i] ? endParents[i - 1] : !startParents[i] ? startParents[i - 1] : endParents[i]).collapse(true);
        }
        tmpStart && domUtils.remove(tmpStart);
        tmpEnd && domUtils.remove(tmpEnd);
        return frag;
    }
    var Range = dom.Range = function(document) {
        var me = this;
        me.startContainer = me.startOffset = me.endContainer = me.endOffset = null;
        me.document = document;
        me.collapsed = true;
    };
    function removeFillData(doc, excludeNode) {
        try {
            if (fillData && domUtils.inDoc(fillData, doc)) {
                if (!fillData.nodeValue.replace(fillCharReg, "").length) {
                    var tmpNode = fillData.parentNode;
                    domUtils.remove(fillData);
                    while (tmpNode && domUtils.isEmptyInlineElement(tmpNode) && (browser.safari ? !(domUtils.getPosition(tmpNode, excludeNode) & domUtils.POSITION_CONTAINS) : !tmpNode.contains(excludeNode))) {
                        fillData = tmpNode.parentNode;
                        domUtils.remove(tmpNode);
                        tmpNode = fillData;
                    }
                } else {
                    fillData.nodeValue = fillData.nodeValue.replace(fillCharReg, "");
                }
            }
        } catch (e) {}
    }
    function mergeSibling(node, dir) {
        var tmpNode;
        node = node[dir];
        while (node && domUtils.isFillChar(node)) {
            tmpNode = node[dir];
            domUtils.remove(node);
            node = tmpNode;
        }
    }
    Range.prototype = {
        cloneContents: function() {
            return this.collapsed ? null : execContentsAction(this, 0);
        },
        deleteContents: function() {
            var txt;
            if (!this.collapsed) {
                execContentsAction(this, 1);
            }
            if (browser.webkit) {
                txt = this.startContainer;
                if (txt.nodeType == 3 && !txt.nodeValue.length) {
                    this.setStartBefore(txt).collapse(true);
                    domUtils.remove(txt);
                }
            }
            return this;
        },
        extractContents: function() {
            return this.collapsed ? null : execContentsAction(this, 2);
        },
        setStart: function(node, offset) {
            return setEndPoint(true, node, offset, this);
        },
        setEnd: function(node, offset) {
            return setEndPoint(false, node, offset, this);
        },
        setStartAfter: function(node) {
            return this.setStart(node.parentNode, domUtils.getNodeIndex(node) + 1);
        },
        setStartBefore: function(node) {
            return this.setStart(node.parentNode, domUtils.getNodeIndex(node));
        },
        setEndAfter: function(node) {
            return this.setEnd(node.parentNode, domUtils.getNodeIndex(node) + 1);
        },
        setEndBefore: function(node) {
            return this.setEnd(node.parentNode, domUtils.getNodeIndex(node));
        },
        setStartAtFirst: function(node) {
            return this.setStart(node, 0);
        },
        setStartAtLast: function(node) {
            return this.setStart(node, node.nodeType == 3 ? node.nodeValue.length : node.childNodes.length);
        },
        setEndAtFirst: function(node) {
            return this.setEnd(node, 0);
        },
        setEndAtLast: function(node) {
            return this.setEnd(node, node.nodeType == 3 ? node.nodeValue.length : node.childNodes.length);
        },
        selectNode: function(node) {
            return this.setStartBefore(node).setEndAfter(node);
        },
        selectNodeContents: function(node) {
            return this.setStart(node, 0).setEndAtLast(node);
        },
        cloneRange: function() {
            var me = this;
            return new Range(me.document).setStart(me.startContainer, me.startOffset).setEnd(me.endContainer, me.endOffset);
        },
        collapse: function(toStart) {
            var me = this;
            if (toStart) {
                me.endContainer = me.startContainer;
                me.endOffset = me.startOffset;
            } else {
                me.startContainer = me.endContainer;
                me.startOffset = me.endOffset;
            }
            me.collapsed = true;
            return me;
        },
        shrinkBoundary: function(ignoreEnd) {
            var me = this, child, collapsed = me.collapsed;
            function check(node) {
                return node.nodeType == 1 && !domUtils.isBookmarkNode(node) && !dtd.$empty[node.tagName] && !dtd.$nonChild[node.tagName];
            }
            while (me.startContainer.nodeType == 1 && (child = me.startContainer.childNodes[me.startOffset]) && check(child)) {
                me.setStart(child, 0);
            }
            if (collapsed) {
                return me.collapse(true);
            }
            if (!ignoreEnd) {
                while (me.endContainer.nodeType == 1 && me.endOffset > 0 && (child = me.endContainer.childNodes[me.endOffset - 1]) && check(child)) {
                    me.setEnd(child, child.childNodes.length);
                }
            }
            return me;
        },
        getCommonAncestor: function(includeSelf, ignoreTextNode) {
            var me = this, start = me.startContainer, end = me.endContainer;
            if (start === end) {
                if (includeSelf && selectOneNode(this)) {
                    start = start.childNodes[me.startOffset];
                    if (start.nodeType == 1) return start;
                }
                return ignoreTextNode && start.nodeType == 3 ? start.parentNode : start;
            }
            return domUtils.getCommonAncestor(start, end);
        },
        trimBoundary: function(ignoreEnd) {
            this.txtToElmBoundary();
            var start = this.startContainer, offset = this.startOffset, collapsed = this.collapsed, end = this.endContainer;
            if (start.nodeType == 3) {
                if (offset == 0) {
                    this.setStartBefore(start);
                } else {
                    if (offset >= start.nodeValue.length) {
                        this.setStartAfter(start);
                    } else {
                        var textNode = domUtils.split(start, offset);
                        if (start === end) {
                            this.setEnd(textNode, this.endOffset - offset);
                        } else if (start.parentNode === end) {
                            this.endOffset += 1;
                        }
                        this.setStartBefore(textNode);
                    }
                }
                if (collapsed) {
                    return this.collapse(true);
                }
            }
            if (!ignoreEnd) {
                offset = this.endOffset;
                end = this.endContainer;
                if (end.nodeType == 3) {
                    if (offset == 0) {
                        this.setEndBefore(end);
                    } else {
                        offset < end.nodeValue.length && domUtils.split(end, offset);
                        this.setEndAfter(end);
                    }
                }
            }
            return this;
        },
        txtToElmBoundary: function() {
            function adjust(r, c) {
                var container = r[c + "Container"], offset = r[c + "Offset"];
                if (container.nodeType == 3) {
                    if (!offset) {
                        r["set" + c.replace(/(\w)/, function(a) {
                            return a.toUpperCase();
                        }) + "Before"](container);
                    } else if (offset >= container.nodeValue.length) {
                        r["set" + c.replace(/(\w)/, function(a) {
                            return a.toUpperCase();
                        }) + "After"](container);
                    }
                }
            }
            if (!this.collapsed) {
                adjust(this, "start");
                adjust(this, "end");
            }
            return this;
        },
        insertNode: function(node) {
            var first = node, length = 1;
            if (node.nodeType == 11) {
                first = node.firstChild;
                length = node.childNodes.length;
            }
            this.trimBoundary(true);
            var start = this.startContainer, offset = this.startOffset;
            var nextNode = start.childNodes[offset];
            if (nextNode) {
                start.insertBefore(node, nextNode);
            } else {
                start.appendChild(node);
            }
            if (first.parentNode === this.endContainer) {
                this.endOffset = this.endOffset + length;
            }
            return this.setStartBefore(first);
        },
        setCursor: function(toEnd, noFillData) {
            return this.collapse(!toEnd).select(noFillData);
        },
        createBookmark: function(serialize, same) {
            var endNode, startNode = this.document.createElement("span");
            startNode.style.cssText = "display:none;line-height:0px;";
            startNode.appendChild(this.document.createTextNode("﻿"));
            startNode.id = "_baidu_bookmark_start_" + (same ? "" : guid++);
            if (!this.collapsed) {
                endNode = startNode.cloneNode(true);
                endNode.id = "_baidu_bookmark_end_" + (same ? "" : guid++);
            }
            this.insertNode(startNode);
            if (endNode) {
                this.collapse().insertNode(endNode).setEndBefore(endNode);
            }
            this.setStartAfter(startNode);
            return {
                start: serialize ? startNode.id : startNode,
                end: endNode ? serialize ? endNode.id : endNode : null,
                id: serialize
            };
        },
        moveToBookmark: function(bookmark) {
            var start = bookmark.id ? this.document.getElementById(bookmark.start) : bookmark.start, end = bookmark.end && bookmark.id ? this.document.getElementById(bookmark.end) : bookmark.end;
            this.setStartBefore(start);
            domUtils.remove(start);
            if (end) {
                this.setEndBefore(end);
                domUtils.remove(end);
            } else {
                this.collapse(true);
            }
            return this;
        },
        enlarge: function(toBlock, stopFn) {
            var isBody = domUtils.isBody, pre, node, tmp = this.document.createTextNode("");
            if (toBlock) {
                node = this.startContainer;
                if (node.nodeType == 1) {
                    if (node.childNodes[this.startOffset]) {
                        pre = node = node.childNodes[this.startOffset];
                    } else {
                        node.appendChild(tmp);
                        pre = node = tmp;
                    }
                } else {
                    pre = node;
                }
                while (1) {
                    if (domUtils.isBlockElm(node)) {
                        node = pre;
                        while ((pre = node.previousSibling) && !domUtils.isBlockElm(pre)) {
                            node = pre;
                        }
                        this.setStartBefore(node);
                        break;
                    }
                    pre = node;
                    node = node.parentNode;
                }
                node = this.endContainer;
                if (node.nodeType == 1) {
                    if (pre = node.childNodes[this.endOffset]) {
                        node.insertBefore(tmp, pre);
                    } else {
                        node.appendChild(tmp);
                    }
                    pre = node = tmp;
                } else {
                    pre = node;
                }
                while (1) {
                    if (domUtils.isBlockElm(node)) {
                        node = pre;
                        while ((pre = node.nextSibling) && !domUtils.isBlockElm(pre)) {
                            node = pre;
                        }
                        this.setEndAfter(node);
                        break;
                    }
                    pre = node;
                    node = node.parentNode;
                }
                if (tmp.parentNode === this.endContainer) {
                    this.endOffset--;
                }
                domUtils.remove(tmp);
            }
            if (!this.collapsed) {
                while (this.startOffset == 0) {
                    if (stopFn && stopFn(this.startContainer)) {
                        break;
                    }
                    if (isBody(this.startContainer)) {
                        break;
                    }
                    this.setStartBefore(this.startContainer);
                }
                while (this.endOffset == (this.endContainer.nodeType == 1 ? this.endContainer.childNodes.length : this.endContainer.nodeValue.length)) {
                    if (stopFn && stopFn(this.endContainer)) {
                        break;
                    }
                    if (isBody(this.endContainer)) {
                        break;
                    }
                    this.setEndAfter(this.endContainer);
                }
            }
            return this;
        },
        adjustmentBoundary: function() {
            if (!this.collapsed) {
                while (!domUtils.isBody(this.startContainer) && this.startOffset == this.startContainer[this.startContainer.nodeType == 3 ? "nodeValue" : "childNodes"].length) {
                    this.setStartAfter(this.startContainer);
                }
                while (!domUtils.isBody(this.endContainer) && !this.endOffset) {
                    this.setEndBefore(this.endContainer);
                }
            }
            return this;
        },
        applyInlineStyle: function(tagName, attrs, list) {
            if (this.collapsed) return this;
            this.trimBoundary().enlarge(false, function(node) {
                return node.nodeType == 1 && domUtils.isBlockElm(node);
            }).adjustmentBoundary();
            var bookmark = this.createBookmark(), end = bookmark.end, filterFn = function(node) {
                return node.nodeType == 1 ? node.tagName.toLowerCase() != "br" : !domUtils.isWhitespace(node);
            }, current = domUtils.getNextDomNode(bookmark.start, false, filterFn), node, pre, range = this.cloneRange();
            while (current && domUtils.getPosition(current, end) & domUtils.POSITION_PRECEDING) {
                if (current.nodeType == 3 || dtd[tagName][current.tagName]) {
                    range.setStartBefore(current);
                    node = current;
                    while (node && (node.nodeType == 3 || dtd[tagName][node.tagName]) && node !== end) {
                        pre = node;
                        node = domUtils.getNextDomNode(node, node.nodeType == 1, null, function(parent) {
                            return dtd[tagName][parent.tagName];
                        });
                    }
                    var frag = range.setEndAfter(pre).extractContents(), elm;
                    if (list && list.length > 0) {
                        var level, top;
                        top = level = list[0].cloneNode(false);
                        for (var i = 1, ci; ci = list[i++]; ) {
                            level.appendChild(ci.cloneNode(false));
                            level = level.firstChild;
                        }
                        elm = level;
                    } else {
                        elm = range.document.createElement(tagName);
                    }
                    if (attrs) {
                        domUtils.setAttributes(elm, attrs);
                    }
                    elm.appendChild(frag);
                    range.insertNode(list ? top : elm);
                    var aNode;
                    if (tagName == "span" && attrs.style && /text\-decoration/.test(attrs.style) && (aNode = domUtils.findParentByTagName(elm, "a", true))) {
                        domUtils.setAttributes(aNode, attrs);
                        domUtils.remove(elm, true);
                        elm = aNode;
                    } else {
                        domUtils.mergeSibling(elm);
                        domUtils.clearEmptySibling(elm);
                    }
                    domUtils.mergeChild(elm, attrs);
                    current = domUtils.getNextDomNode(elm, false, filterFn);
                    domUtils.mergeToParent(elm);
                    if (node === end) {
                        break;
                    }
                } else {
                    current = domUtils.getNextDomNode(current, true, filterFn);
                }
            }
            return this.moveToBookmark(bookmark);
        },
        removeInlineStyle: function(tagNames) {
            if (this.collapsed) return this;
            tagNames = utils.isArray(tagNames) ? tagNames : [ tagNames ];
            this.shrinkBoundary().adjustmentBoundary();
            var start = this.startContainer, end = this.endContainer;
            while (1) {
                if (start.nodeType == 1) {
                    if (utils.indexOf(tagNames, start.tagName.toLowerCase()) > -1) {
                        break;
                    }
                    if (start.tagName.toLowerCase() == "body") {
                        start = null;
                        break;
                    }
                }
                start = start.parentNode;
            }
            while (1) {
                if (end.nodeType == 1) {
                    if (utils.indexOf(tagNames, end.tagName.toLowerCase()) > -1) {
                        break;
                    }
                    if (end.tagName.toLowerCase() == "body") {
                        end = null;
                        break;
                    }
                }
                end = end.parentNode;
            }
            var bookmark = this.createBookmark(), frag, tmpRange;
            if (start) {
                tmpRange = this.cloneRange().setEndBefore(bookmark.start).setStartBefore(start);
                frag = tmpRange.extractContents();
                tmpRange.insertNode(frag);
                domUtils.clearEmptySibling(start, true);
                start.parentNode.insertBefore(bookmark.start, start);
            }
            if (end) {
                tmpRange = this.cloneRange().setStartAfter(bookmark.end).setEndAfter(end);
                frag = tmpRange.extractContents();
                tmpRange.insertNode(frag);
                domUtils.clearEmptySibling(end, false, true);
                end.parentNode.insertBefore(bookmark.end, end.nextSibling);
            }
            var current = domUtils.getNextDomNode(bookmark.start, false, function(node) {
                return node.nodeType == 1;
            }), next;
            while (current && current !== bookmark.end) {
                next = domUtils.getNextDomNode(current, true, function(node) {
                    return node.nodeType == 1;
                });
                if (utils.indexOf(tagNames, current.tagName.toLowerCase()) > -1) {
                    domUtils.remove(current, true);
                }
                current = next;
            }
            return this.moveToBookmark(bookmark);
        },
        getClosedNode: function() {
            var node;
            if (!this.collapsed) {
                var range = this.cloneRange().adjustmentBoundary().shrinkBoundary();
                if (selectOneNode(range)) {
                    var child = range.startContainer.childNodes[range.startOffset];
                    if (child && child.nodeType == 1 && (dtd.$empty[child.tagName] || dtd.$nonChild[child.tagName])) {
                        node = child;
                    }
                }
            }
            return node;
        },
        select: browser.ie ? function(noFillData, textRange) {
            var nativeRange;
            if (!this.collapsed) this.shrinkBoundary();
            var node = this.getClosedNode();
            if (node && !textRange) {
                try {
                    nativeRange = this.document.body.createControlRange();
                    nativeRange.addElement(node);
                    nativeRange.select();
                } catch (e) {}
                return this;
            }
            var bookmark = this.createBookmark(), start = bookmark.start, end;
            nativeRange = this.document.body.createTextRange();
            nativeRange.moveToElementText(start);
            nativeRange.moveStart("character", 1);
            if (!this.collapsed) {
                var nativeRangeEnd = this.document.body.createTextRange();
                end = bookmark.end;
                nativeRangeEnd.moveToElementText(end);
                nativeRange.setEndPoint("EndToEnd", nativeRangeEnd);
            } else {
                if (!noFillData && this.startContainer.nodeType != 3) {
                    var tmpText = this.document.createTextNode(fillChar), tmp = this.document.createElement("span");
                    tmp.appendChild(this.document.createTextNode(fillChar));
                    start.parentNode.insertBefore(tmp, start);
                    start.parentNode.insertBefore(tmpText, start);
                    removeFillData(this.document, tmpText);
                    fillData = tmpText;
                    mergeSibling(tmp, "previousSibling");
                    mergeSibling(start, "nextSibling");
                    nativeRange.moveStart("character", -1);
                    nativeRange.collapse(true);
                }
            }
            this.moveToBookmark(bookmark);
            tmp && domUtils.remove(tmp);
            try {
                nativeRange.select();
            } catch (e) {}
            return this;
        } : function(notInsertFillData) {
            var win = domUtils.getWindow(this.document), sel = win.getSelection(), txtNode;
            browser.gecko ? this.document.body.focus() : win.focus();
            if (sel) {
                sel.removeAllRanges();
                if (this.collapsed) {
                    if (notInsertFillData && browser.opera && !domUtils.isBody(this.startContainer) && this.startContainer.nodeType == 1) {
                        var tmp = this.document.createTextNode("");
                        this.insertNode(tmp).setStart(tmp, 0).collapse(true);
                    }
                    if (!notInsertFillData && (this.startContainer.nodeType != 3 || this.startOffset == 0 && (!this.startContainer.previousSibling || this.startContainer.previousSibling.nodeType != 3))) {
                        txtNode = this.document.createTextNode(fillChar);
                        this.insertNode(txtNode);
                        removeFillData(this.document, txtNode);
                        mergeSibling(txtNode, "previousSibling");
                        mergeSibling(txtNode, "nextSibling");
                        fillData = txtNode;
                        this.setStart(txtNode, browser.webkit ? 1 : 0).collapse(true);
                    }
                }
                var nativeRange = this.document.createRange();
                nativeRange.setStart(this.startContainer, this.startOffset);
                nativeRange.setEnd(this.endContainer, this.endOffset);
                sel.addRange(nativeRange);
            }
            return this;
        },
        scrollToView: function(win, offset) {
            win = win ? window : domUtils.getWindow(this.document);
            var me = this, span = me.document.createElement("span");
            span.innerHTML = "&nbsp;";
            me.cloneRange().insertNode(span);
            domUtils.scrollToView(span, win, offset);
            domUtils.remove(span);
            return me;
        }
    };
})();

(function() {
    function getBoundaryInformation(range, start) {
        var getIndex = domUtils.getNodeIndex;
        range = range.duplicate();
        range.collapse(start);
        var parent = range.parentElement();
        if (!parent.hasChildNodes()) {
            return {
                container: parent,
                offset: 0
            };
        }
        var siblings = parent.children, child, testRange = range.duplicate(), startIndex = 0, endIndex = siblings.length - 1, index = -1, distance;
        while (startIndex <= endIndex) {
            index = Math.floor((startIndex + endIndex) / 2);
            child = siblings[index];
            testRange.moveToElementText(child);
            var position = testRange.compareEndPoints("StartToStart", range);
            if (position > 0) {
                endIndex = index - 1;
            } else if (position < 0) {
                startIndex = index + 1;
            } else {
                return {
                    container: parent,
                    offset: getIndex(child)
                };
            }
        }
        if (index == -1) {
            testRange.moveToElementText(parent);
            testRange.setEndPoint("StartToStart", range);
            distance = testRange.text.replace(/(\r\n|\r)/g, "\n").length;
            siblings = parent.childNodes;
            if (!distance) {
                child = siblings[siblings.length - 1];
                return {
                    container: child,
                    offset: child.nodeValue.length
                };
            }
            var i = siblings.length;
            while (distance > 0) {
                distance -= siblings[--i].nodeValue.length;
            }
            return {
                container: siblings[i],
                offset: -distance
            };
        }
        testRange.collapse(position > 0);
        testRange.setEndPoint(position > 0 ? "StartToStart" : "EndToStart", range);
        distance = testRange.text.replace(/(\r\n|\r)/g, "\n").length;
        if (!distance) {
            return dtd.$empty[child.tagName] || dtd.$nonChild[child.tagName] ? {
                container: parent,
                offset: getIndex(child) + (position > 0 ? 0 : 1)
            } : {
                container: child,
                offset: position > 0 ? 0 : child.childNodes.length
            };
        }
        while (distance > 0) {
            try {
                var pre = child;
                child = child[position > 0 ? "previousSibling" : "nextSibling"];
                distance -= child.nodeValue.length;
            } catch (e) {
                return {
                    container: parent,
                    offset: getIndex(pre)
                };
            }
        }
        return {
            container: child,
            offset: position > 0 ? -distance : child.nodeValue.length + distance
        };
    }
    function transformIERangeToRange(ieRange, range) {
        if (ieRange.item) {
            range.selectNode(ieRange.item(0));
        } else {
            var bi = getBoundaryInformation(ieRange, true);
            range.setStart(bi.container, bi.offset);
            if (ieRange.compareEndPoints("StartToEnd", ieRange) != 0) {
                bi = getBoundaryInformation(ieRange, false);
                range.setEnd(bi.container, bi.offset);
            }
        }
        return range;
    }
    function _getIERange(sel) {
        var ieRange;
        try {
            ieRange = sel.getNative().createRange();
        } catch (e) {
            return null;
        }
        var el = ieRange.item ? ieRange.item(0) : ieRange.parentElement();
        if ((el.ownerDocument || el) === sel.document) {
            return ieRange;
        }
        return null;
    }
    var Selection = dom.Selection = function(doc) {
        var me = this, iframe;
        me.document = doc;
        if (ie) {
            iframe = domUtils.getWindow(doc).frameElement;
            domUtils.on(iframe, "beforedeactivate", function() {
                me._bakIERange = me.getIERange();
            });
            domUtils.on(iframe, "activate", function() {
                try {
                    if (!_getIERange(me) && me._bakIERange) {
                        me._bakIERange.select();
                    }
                } catch (ex) {}
                me._bakIERange = null;
            });
        }
        iframe = doc = null;
    };
    Selection.prototype = {
        getNative: function() {
            var doc = this.document;
            try {
                return !doc ? null : ie ? doc.selection : domUtils.getWindow(doc).getSelection();
            } catch (e) {
                return null;
            }
        },
        getIERange: function() {
            var ieRange = _getIERange(this);
            if (!ieRange) {
                if (this._bakIERange) {
                    return this._bakIERange;
                }
            }
            return ieRange;
        },
        cache: function() {
            this.clear();
            this._cachedRange = this.getRange();
            this._cachedStartElement = this.getStart();
            this._cachedStartElementPath = this.getStartElementPath();
        },
        getStartElementPath: function() {
            if (this._cachedStartElementPath) {
                return this._cachedStartElementPath;
            }
            var start = this.getStart();
            if (start) {
                return domUtils.findParents(start, true, null, true);
            }
            return [];
        },
        clear: function() {
            this._cachedStartElementPath = this._cachedRange = this._cachedStartElement = null;
        },
        isFocus: function() {
            try {
                return browser.ie && _getIERange(this) || !browser.ie && this.getNative().rangeCount ? true : false;
            } catch (e) {
                return false;
            }
        },
        getRange: function() {
            var me = this;
            function optimze(range) {
                var child = me.document.body.firstChild, collapsed = range.collapsed;
                while (child && child.firstChild) {
                    range.setStart(child, 0);
                    child = child.firstChild;
                }
                if (!range.startContainer) {
                    range.setStart(me.document.body, 0);
                }
                if (collapsed) {
                    range.collapse(true);
                }
            }
            if (me._cachedRange != null) {
                return this._cachedRange;
            }
            var range = new baidu.editor.dom.Range(me.document);
            if (ie) {
                var nativeRange = me.getIERange();
                if (nativeRange) {
                    transformIERangeToRange(nativeRange, range);
                } else {
                    optimze(range);
                }
            } else {
                var sel = me.getNative();
                if (sel && sel.rangeCount) {
                    var firstRange = sel.getRangeAt(0);
                    var lastRange = sel.getRangeAt(sel.rangeCount - 1);
                    range.setStart(firstRange.startContainer, firstRange.startOffset).setEnd(lastRange.endContainer, lastRange.endOffset);
                    if (range.collapsed && domUtils.isBody(range.startContainer) && !range.startOffset) {
                        optimze(range);
                    }
                } else {
                    if (this._bakRange && domUtils.inDoc(this._bakRange.startContainer, this.document)) {
                        return this._bakRange;
                    }
                    optimze(range);
                }
            }
            return this._bakRange = range;
        },
        getStart: function() {
            if (this._cachedStartElement) {
                return this._cachedStartElement;
            }
            var range = ie ? this.getIERange() : this.getRange(), tmpRange, start, tmp, parent;
            if (ie) {
                if (!range) {
                    return this.document.body.firstChild;
                }
                if (range.item) {
                    return range.item(0);
                }
                tmpRange = range.duplicate();
                tmpRange.text.length > 0 && tmpRange.moveStart("character", 1);
                tmpRange.collapse(1);
                start = tmpRange.parentElement();
                parent = tmp = range.parentElement();
                while (tmp = tmp.parentNode) {
                    if (tmp == start) {
                        start = parent;
                        break;
                    }
                }
            } else {
                range.shrinkBoundary();
                start = range.startContainer;
                if (start.nodeType == 1 && start.hasChildNodes()) {
                    start = start.childNodes[Math.min(start.childNodes.length - 1, range.startOffset)];
                }
                if (start.nodeType == 3) {
                    return start.parentNode;
                }
            }
            return start;
        },
        getText: function() {
            var nativeSel, nativeRange;
            if (this.isFocus() && (nativeSel = this.getNative())) {
                nativeRange = browser.ie ? nativeSel.createRange() : nativeSel.getRangeAt(0);
                return browser.ie ? nativeRange.text : nativeRange.toString();
            }
            return "";
        }
    };
})();

UE.plugins["serialize"] = function() {
    var ie = browser.ie, version = browser.version;
    function ptToPx(value) {
        return /pt/.test(value) ? value.replace(/([\d.]+)pt/g, function(str) {
            return Math.round(parseFloat(str) * 96 / 72) + "px";
        }) : value;
    }
    var me = this, autoClearEmptyNode = me.options.autoClearEmptyNode, EMPTY_TAG = dtd.$empty, parseHTML = function() {
        var RE_PART = /<(?:(?:\/([^>]+)>)|(?:!--([\S|\s]*?)-->)|(?:([^\s\/>]+)\s*((?:(?:"[^"]*")|(?:'[^']*')|[^"'<>])*)\/?>))/g, RE_ATTR = /([\w\-:.]+)(?:(?:\s*=\s*(?:(?:"([^"]*)")|(?:'([^']*)')|([^\s>]+)))|(?=\s|$))/g, EMPTY_ATTR = {
            checked: 1,
            compact: 1,
            declare: 1,
            defer: 1,
            disabled: 1,
            ismap: 1,
            multiple: 1,
            nohref: 1,
            noresize: 1,
            noshade: 1,
            nowrap: 1,
            readonly: 1,
            selected: 1
        }, CDATA_TAG = {
            script: 1,
            style: 1
        }, NEED_PARENT_TAG = {
            li: {
                $: "ul",
                ul: 1,
                ol: 1
            },
            dd: {
                $: "dl",
                dl: 1
            },
            dt: {
                $: "dl",
                dl: 1
            },
            option: {
                $: "select",
                select: 1
            },
            td: {
                $: "tr",
                tr: 1
            },
            th: {
                $: "tr",
                tr: 1
            },
            tr: {
                $: "tbody",
                tbody: 1,
                thead: 1,
                tfoot: 1,
                table: 1
            },
            tbody: {
                $: "table",
                table: 1,
                colgroup: 1
            },
            thead: {
                $: "table",
                table: 1
            },
            tfoot: {
                $: "table",
                table: 1
            },
            col: {
                $: "colgroup",
                colgroup: 1
            }
        };
        var NEED_CHILD_TAG = {
            table: "td",
            tbody: "td",
            thead: "td",
            tfoot: "td",
            tr: "td",
            colgroup: "col",
            ul: "li",
            ol: "li",
            dl: "dd",
            select: "option"
        };
        function parse(html, callbacks) {
            var match, nextIndex = 0, tagName, cdata;
            RE_PART.exec("");
            while (match = RE_PART.exec(html)) {
                var tagIndex = match.index;
                if (tagIndex > nextIndex) {
                    var text = html.slice(nextIndex, tagIndex);
                    if (cdata) {
                        cdata.push(text);
                    } else {
                        callbacks.onText(text);
                    }
                }
                nextIndex = RE_PART.lastIndex;
                if (tagName = match[1]) {
                    tagName = tagName.toLowerCase();
                    if (cdata && tagName == cdata._tag_name) {
                        callbacks.onCDATA(cdata.join(""));
                        cdata = null;
                    }
                    if (!cdata) {
                        callbacks.onTagClose(tagName);
                        continue;
                    }
                }
                if (cdata) {
                    cdata.push(match[0]);
                    continue;
                }
                if (tagName = match[3]) {
                    if (/="/.test(tagName)) {
                        continue;
                    }
                    tagName = tagName.toLowerCase();
                    var attrPart = match[4], attrMatch, attrMap = {}, selfClosing = attrPart && attrPart.slice(-1) == "/";
                    if (attrPart) {
                        RE_ATTR.exec("");
                        while (attrMatch = RE_ATTR.exec(attrPart)) {
                            var attrName = attrMatch[1].toLowerCase(), attrValue = attrMatch[2] || attrMatch[3] || attrMatch[4] || "";
                            if (!attrValue && EMPTY_ATTR[attrName]) {
                                attrValue = attrName;
                            }
                            if (attrName == "style") {
                                if (ie && version <= 6) {
                                    attrValue = attrValue.replace(/(?!;)\s*([\w-]+):/g, function(m, p1) {
                                        return p1.toLowerCase() + ":";
                                    });
                                }
                            }
                            if (attrValue) {
                                attrMap[attrName] = attrValue.replace(/:\s*/g, ":");
                            }
                        }
                    }
                    callbacks.onTagOpen(tagName, attrMap, selfClosing);
                    if (!cdata && CDATA_TAG[tagName]) {
                        cdata = [];
                        cdata._tag_name = tagName;
                    }
                    continue;
                }
                if (tagName = match[2]) {
                    callbacks.onComment(tagName);
                }
            }
            if (html.length > nextIndex) {
                callbacks.onText(html.slice(nextIndex, html.length));
            }
        }
        return function(html, forceDtd) {
            var fragment = {
                type: "fragment",
                parent: null,
                children: []
            };
            var currentNode = fragment;
            function addChild(node) {
                node.parent = currentNode;
                currentNode.children.push(node);
            }
            function addElement(element, open) {
                var node = element;
                if (NEED_PARENT_TAG[node.tag]) {
                    while (NEED_PARENT_TAG[currentNode.tag] && NEED_PARENT_TAG[currentNode.tag][node.tag]) {
                        currentNode = currentNode.parent;
                    }
                    if (currentNode.tag == node.tag) {
                        currentNode = currentNode.parent;
                    }
                    while (NEED_PARENT_TAG[node.tag]) {
                        if (NEED_PARENT_TAG[node.tag][currentNode.tag]) break;
                        node = node.parent = {
                            type: "element",
                            tag: NEED_PARENT_TAG[node.tag]["$"],
                            attributes: {},
                            children: [ node ]
                        };
                    }
                }
                if (forceDtd) {
                    while (dtd[node.tag] && !(currentNode.tag == "span" ? utils.extend(dtd["strong"], {
                        a: 1,
                        A: 1
                    }) : dtd[currentNode.tag] || dtd["div"])[node.tag]) {
                        if (tagEnd(currentNode)) continue;
                        if (!currentNode.parent) break;
                        currentNode = currentNode.parent;
                    }
                }
                node.parent = currentNode;
                currentNode.children.push(node);
                if (open) {
                    currentNode = element;
                }
                if (element.attributes.style) {
                    element.attributes.style = element.attributes.style.toLowerCase();
                }
                return element;
            }
            function tagEnd(node) {
                var needTag;
                if (!node.children.length && (needTag = NEED_CHILD_TAG[node.tag])) {
                    addElement({
                        type: "element",
                        tag: needTag,
                        attributes: {},
                        children: []
                    }, true);
                    return true;
                }
                return false;
            }
            parse(html, {
                onText: function(text) {
                    while (!(dtd[currentNode.tag] || dtd["div"])["#"]) {
                        if (tagEnd(currentNode)) continue;
                        currentNode = currentNode.parent;
                    }
                    addChild({
                        type: "text",
                        data: text
                    });
                },
                onComment: function(text) {
                    addChild({
                        type: "comment",
                        data: text
                    });
                },
                onCDATA: function(text) {
                    while (!(dtd[currentNode.tag] || dtd["div"])["#"]) {
                        if (tagEnd(currentNode)) continue;
                        currentNode = currentNode.parent;
                    }
                    addChild({
                        type: "cdata",
                        data: text
                    });
                },
                onTagOpen: function(tag, attrs, closed) {
                    closed = closed || EMPTY_TAG[tag];
                    addElement({
                        type: "element",
                        tag: tag,
                        attributes: attrs,
                        closed: closed,
                        children: []
                    }, !closed);
                },
                onTagClose: function(tag) {
                    var node = currentNode;
                    while (node && tag != node.tag) {
                        node = node.parent;
                    }
                    if (node) {
                        for (var tnode = currentNode; tnode !== node.parent; tnode = tnode.parent) {
                            tagEnd(tnode);
                        }
                        currentNode = node.parent;
                    } else {
                        if (!(dtd.$removeEmpty[tag] || dtd.$removeEmptyBlock[tag] || tag == "embed")) {
                            node = {
                                type: "element",
                                tag: tag,
                                attributes: {},
                                children: []
                            };
                            addElement(node, true);
                            tagEnd(node);
                            currentNode = node.parent;
                        }
                    }
                }
            });
            while (currentNode !== fragment) {
                tagEnd(currentNode);
                currentNode = currentNode.parent;
            }
            return fragment;
        };
    }();
    var unhtml1 = function() {
        var map = {
            "<": "&lt;",
            ">": "&gt;",
            '"': "&quot;",
            "'": "&#39;"
        };
        function rep(m) {
            return map[m];
        }
        return function(str) {
            str = str + "";
            return str ? str.replace(/[<>"']/g, rep) : "";
        };
    }();
    var toHTML = function() {
        function printChildren(node, pasteplain) {
            var children = node.children;
            var buff = [];
            for (var i = 0, ci; ci = children[i]; i++) {
                buff.push(toHTML(ci, pasteplain));
            }
            return buff.join("");
        }
        function printAttrs(attrs) {
            var buff = [];
            for (var k in attrs) {
                var value = attrs[k];
                if (k == "style") {
                    value = ptToPx(value);
                    if (/rgba?\s*\([^)]*\)/.test(value)) {
                        value = value.replace(/rgba?\s*\(([^)]*)\)/g, function(str) {
                            return utils.fixColor("color", str);
                        });
                    }
                    attrs[k] = utils.optCss(value.replace(/windowtext/g, "#000")).replace(/white-space[^;]+;/g, "");
                }
                buff.push(k + '="' + unhtml1(attrs[k]) + '"');
            }
            return buff.join(" ");
        }
        function printData(node, notTrans) {
            return notTrans ? node.data.replace(/&nbsp;/g, " ") : unhtml1(node.data).replace(/ /g, "&nbsp;");
        }
        var transHtml = {
            div: "p",
            li: "p",
            tr: "p",
            br: "br",
            p: "p"
        };
        function printElement(node, pasteplain) {
            if (node.type == "element" && !node.children.length && dtd.$removeEmpty[node.tag] && node.tag != "a" && utils.isEmptyObject(node.attributes) && autoClearEmptyNode) {
                return html;
            }
            var tag = node.tag;
            if (pasteplain && tag == "td") {
                if (!html) html = "";
                html += printChildren(node, pasteplain) + "&nbsp;&nbsp;&nbsp;";
            } else {
                var attrs = printAttrs(node.attributes);
                var html = "<" + (pasteplain && transHtml[tag] ? transHtml[tag] : tag) + (attrs ? " " + attrs : "") + (EMPTY_TAG[tag] ? " />" : ">");
                if (!EMPTY_TAG[tag]) {
                    if (tag == "p" && !node.children.length) {
                        html += browser.ie ? "&nbsp;" : "<br/>";
                    }
                    html += printChildren(node, pasteplain);
                    html += "</" + (pasteplain && transHtml[tag] ? transHtml[tag] : tag) + ">";
                }
            }
            return html;
        }
        return function(node, pasteplain) {
            if (node.type == "fragment") {
                return printChildren(node, pasteplain);
            } else if (node.type == "element") {
                return printElement(node, pasteplain);
            } else if (node.type == "text" || node.type == "cdata") {
                return printData(node, dtd.$notTransContent[node.parent.tag]);
            } else if (node.type == "comment") {
                return "<!--" + node.data + "-->";
            }
            return "";
        };
    }();
    var NODE_NAME_MAP = {
        text: "#text",
        comment: "#comment",
        cdata: "#cdata-section",
        fragment: "#document-fragment"
    };
    function transNode(node, word_img_flag) {
        var sizeMap = [ 0, 10, 12, 16, 18, 24, 32, 48 ], attr, indexOf = utils.indexOf;
        switch (node.tag) {
          case "script":
            node.tag = "div";
            node.attributes._ue_org_tagName = "script";
            node.attributes._ue_div_script = 1;
            node.attributes._ue_script_data = node.children[0] ? encodeURIComponent(node.children[0].data) : "";
            node.attributes._ue_custom_node_ = 1;
            node.children = [];
            break;

          case "style":
            node.tag = "div";
            node.attributes._ue_div_style = 1;
            node.attributes._ue_org_tagName = "style";
            node.attributes._ue_style_data = node.children[0] ? encodeURIComponent(node.children[0].data) : "";
            node.attributes._ue_custom_node_ = 1;
            node.children = [];
            break;

          case "img":
            if (node.attributes.src && /^data:/.test(node.attributes.src)) {
                return {
                    type: "fragment",
                    children: []
                };
            }
            if (node.attributes.src && /^(?:file)/.test(node.attributes.src)) {
                if (!/(gif|bmp|png|jpg|jpeg)$/.test(node.attributes.src)) {
                    return {
                        type: "fragment",
                        children: []
                    };
                }
                node.attributes.word_img = node.attributes.src;
                node.attributes.src = me.options.UEDITOR_HOME_URL + "themes/default/images/spacer.gif";
                var flag = parseInt(node.attributes.width) < 128 || parseInt(node.attributes.height) < 43;
                node.attributes.style = "background:url(" + (flag ? me.options.themePath + me.options.theme + "/images/word.gif" : me.options.langPath + me.options.lang + "/images/localimage.png") + ") no-repeat center center;border:1px solid #ddd";
                word_img_flag && (word_img_flag.flag = 1);
            }
            if (browser.ie && browser.version < 7) node.attributes.orgSrc = node.attributes.src;
            node.attributes.data_ue_src = node.attributes.data_ue_src || node.attributes.src;
            break;

          case "li":
            var child = node.children[0];
            if (!child || child.type != "element" || child.tag != "p" && dtd.p[child.tag]) {
                var tmpPNode = {
                    type: "element",
                    tag: "p",
                    attributes: {},
                    parent: node
                };
                tmpPNode.children = child ? node.children : [ browser.ie ? {
                    type: "text",
                    data: domUtils.fillChar,
                    parent: tmpPNode
                } : {
                    type: "element",
                    tag: "br",
                    attributes: {},
                    closed: true,
                    children: [],
                    parent: tmpPNode
                } ];
                node.children = [ tmpPNode ];
            }
            break;

          case "table":
          case "td":
            optStyle(node);
            break;

          case "a":
            if (node.attributes["anchorname"]) {
                node.tag = "img";
                node.attributes = {
                    "class": "anchorclass",
                    anchorname: node.attributes["name"]
                };
                node.closed = 1;
            }
            node.attributes.href && (node.attributes.data_ue_src = node.attributes.href);
            break;

          case "b":
            node.tag = node.name = "strong";
            break;

          case "i":
            node.tag = node.name = "em";
            break;

          case "u":
            node.tag = node.name = "span";
            node.attributes.style = (node.attributes.style || "") + ";text-decoration:underline;";
            break;

          case "s":
          case "del":
            node.tag = node.name = "span";
            node.attributes.style = (node.attributes.style || "") + ";text-decoration:line-through;";
            if (node.children.length == 1) {
                child = node.children[0];
                if (child.tag == node.tag) {
                    node.attributes.style += ";" + child.attributes.style;
                    node.children = child.children;
                }
            }
            break;

          case "span":
            var style = node.attributes.style;
            if (style) {
                if (!node.attributes.style || browser.webkit && style == "white-space:nowrap;") {
                    delete node.attributes.style;
                }
            }
            if (browser.gecko && browser.version <= 10902 && node.parent) {
                var parent = node.parent;
                if (parent.tag == "span" && parent.attributes && parent.attributes.style) {
                    node.attributes.style = parent.attributes.style + ";" + node.attributes.style;
                }
            }
            if (utils.isEmptyObject(node.attributes) && autoClearEmptyNode) {
                node.type = "fragment";
            }
            break;

          case "font":
            node.tag = node.name = "span";
            attr = node.attributes;
            node.attributes = {
                style: (attr.size ? "font-size:" + (sizeMap[attr.size] || 12) + "px" : "") + ";" + (attr.color ? "color:" + attr.color : "") + ";" + (attr.face ? "font-family:" + attr.face : "") + ";" + (attr.style || "")
            };
            while (node.parent.tag == node.tag && node.parent.children.length == 1) {
                node.attributes.style && (node.parent.attributes.style ? node.parent.attributes.style += ";" + node.attributes.style : node.parent.attributes.style = node.attributes.style);
                node.parent.children = node.children;
                node = node.parent;
            }
            break;

          case "p":
            if (node.attributes.align) {
                node.attributes.style = (node.attributes.style || "") + ";text-align:" + node.attributes.align + ";";
                delete node.attributes.align;
            }
        }
        return node;
    }
    function optStyle(node) {
        if (ie && node.attributes.style) {
            var style = node.attributes.style;
            node.attributes.style = style.replace(/;\s*/g, ";");
            node.attributes.style = node.attributes.style.replace(/^\s*|\s*$/, "");
        }
    }
    function transOutNode(node) {
        switch (node.tag) {
          case "div":
            if (node.attributes._ue_div_script) {
                node.tag = "script";
                node.children = [ {
                    type: "cdata",
                    data: node.attributes._ue_script_data ? decodeURIComponent(node.attributes._ue_script_data) : "",
                    parent: node
                } ];
                delete node.attributes._ue_div_script;
                delete node.attributes._ue_script_data;
                delete node.attributes._ue_custom_node_;
                delete node.attributes._ue_org_tagName;
            }
            if (node.attributes._ue_div_style) {
                node.tag = "style";
                node.children = [ {
                    type: "cdata",
                    data: node.attributes._ue_style_data ? decodeURIComponent(node.attributes._ue_style_data) : "",
                    parent: node
                } ];
                delete node.attributes._ue_div_style;
                delete node.attributes._ue_style_data;
                delete node.attributes._ue_custom_node_;
                delete node.attributes._ue_org_tagName;
            }
            break;

          case "table":
            !node.attributes.style && delete node.attributes.style;
            if (ie && node.attributes.style) {
                optStyle(node);
            }
            if (node.attributes["class"] == "noBorderTable") {
                delete node.attributes["class"];
            }
            break;

          case "td":
          case "th":
            if (/display\s*:\s*none/i.test(node.attributes.style)) {
                return {
                    type: "fragment",
                    children: []
                };
            }
            if (ie && !node.children.length) {
                var txtNode = {
                    type: "text",
                    data: domUtils.fillChar,
                    parent: node
                };
                node.children[0] = txtNode;
            }
            if (ie && node.attributes.style) {
                optStyle(node);
            }
            if (node.attributes["class"] == "selectTdClass") {
                delete node.attributes["class"];
            }
            break;

          case "img":
            if (node.attributes.anchorname) {
                node.tag = "a";
                node.attributes = {
                    name: node.attributes.anchorname,
                    anchorname: 1
                };
                node.closed = null;
            } else {
                if (node.attributes.data_ue_src) {
                    node.attributes.src = node.attributes.data_ue_src;
                    delete node.attributes.data_ue_src;
                }
            }
            break;

          case "a":
            if (node.attributes.data_ue_src) {
                node.attributes.href = node.attributes.data_ue_src;
                delete node.attributes.data_ue_src;
            }
        }
        return node;
    }
    function childrenAccept(node, visit, ctx) {
        if (!node.children || !node.children.length) {
            return node;
        }
        var children = node.children;
        for (var i = 0; i < children.length; i++) {
            var newNode = visit(children[i], ctx);
            if (newNode.type == "fragment") {
                var args = [ i, 1 ];
                args.push.apply(args, newNode.children);
                children.splice.apply(children, args);
                if (!children.length) {
                    node = {
                        type: "fragment",
                        children: []
                    };
                }
                i--;
            } else {
                children[i] = newNode;
            }
        }
        return node;
    }
    function Serialize(rules) {
        this.rules = rules;
    }
    Serialize.prototype = {
        rules: null,
        filter: function(node, rules, modify) {
            rules = rules || this.rules;
            var whiteList = rules && rules.whiteList;
            var blackList = rules && rules.blackList;
            function visitNode(node, parent) {
                node.name = node.type == "element" ? node.tag : NODE_NAME_MAP[node.type];
                if (parent == null) {
                    return childrenAccept(node, visitNode, node);
                }
                if (blackList && (blackList[node.name] || node.attributes && node.attributes._ue_org_tagName && blackList[node.attributes._ue_org_tagName])) {
                    modify && (modify.flag = 1);
                    return {
                        type: "fragment",
                        children: []
                    };
                }
                if (whiteList) {
                    if (node.type == "element") {
                        if (parent.type == "fragment" ? whiteList[node.name] : whiteList[node.name] && whiteList[parent.name][node.name]) {
                            var props;
                            if (props = whiteList[node.name].$) {
                                var oldAttrs = node.attributes;
                                var newAttrs = {};
                                for (var k in props) {
                                    if (oldAttrs[k]) {
                                        newAttrs[k] = oldAttrs[k];
                                    }
                                }
                                node.attributes = newAttrs;
                            }
                        } else {
                            modify && (modify.flag = 1);
                            node.type = "fragment";
                            node.name = parent.name;
                        }
                    } else {}
                }
                if (blackList || whiteList) {
                    childrenAccept(node, visitNode, node);
                }
                return node;
            }
            return visitNode(node, null);
        },
        transformInput: function(node, word_img_flag) {
            function visitNode(node) {
                node = transNode(node, word_img_flag);
                node = childrenAccept(node, visitNode, node);
                if (me.options.pageBreakTag && node.type == "text" && node.data.replace(/\s/g, "") == me.options.pageBreakTag) {
                    node.type = "element";
                    node.name = node.tag = "hr";
                    delete node.data;
                    node.attributes = {
                        "class": "pagebreak",
                        noshade: "noshade",
                        size: "5",
                        unselectable: "on",
                        style: "moz-user-select:none;-khtml-user-select: none;"
                    };
                    node.children = [];
                }
                if (node.type == "text" && !dtd.$notTransContent[node.parent.tag]) {
                    node.data = node.data.replace(/[\r\t\n]*/g, "");
                }
                return node;
            }
            return visitNode(node);
        },
        transformOutput: function(node) {
            function visitNode(node) {
                if (node.tag == "hr" && node.attributes["class"] == "pagebreak") {
                    delete node.tag;
                    node.type = "text";
                    node.data = me.options.pageBreakTag;
                    delete node.children;
                }
                node = transOutNode(node);
                node = childrenAccept(node, visitNode, node);
                return node;
            }
            return visitNode(node);
        },
        toHTML: toHTML,
        parseHTML: parseHTML,
        word: UE.filterWord
    };
    me.serialize = new Serialize(me.options.serialize || {});
    UE.serialize = new Serialize({});
};

UE.plugins["undo"] = function() {
    var me = this, maxUndoCount = me.options.maxUndoCount || 20, maxInputCount = me.options.maxInputCount || 20, fillchar = new RegExp(domUtils.fillChar + "|</hr>", "gi"), specialAttr = /\b(?:href|src|name)="[^"]*?"/gi;
    function sceneRange(rng) {
        var me = this;
        me.collapsed = rng.collapsed;
        me.startAddr = getAddr(rng.startContainer, rng.startOffset);
        me.endAddr = rng.collapsed ? me.startAddr : getAddr(rng.endContainer, rng.endOffset);
    }
    sceneRange.prototype = {
        compare: function(obj) {
            var me = this;
            if (me.collapsed !== obj.collapsed) {
                return 0;
            }
            if (!compareAddr(me.startAddr, obj.startAddr) || !compareAddr(me.endAddr, obj.endAddr)) {
                return 0;
            }
            return 1;
        },
        transformRange: function(rng) {
            var me = this;
            rng.collapsed = me.collapsed;
            setAddr(rng, "start", me.startAddr);
            rng.collapsed ? rng.collapse(true) : setAddr(rng, "end", me.endAddr);
        }
    };
    function getAddr(node, index) {
        for (var i = 0, parentsIndex = [ index ], ci, parents = domUtils.findParents(node, true, function(node) {
            return !domUtils.isBody(node);
        }, true); ci = parents[i++]; ) {
            if (i == 1 && ci.nodeType == 3) {
                var tmpNode = ci;
                while (tmpNode = tmpNode.previousSibling) {
                    if (tmpNode.nodeType == 3) {
                        index += tmpNode.nodeValue.replace(fillCharReg, "").length;
                    } else {
                        break;
                    }
                }
                parentsIndex[0] = index;
            }
            parentsIndex.push(domUtils.getNodeIndex(ci, true));
        }
        return parentsIndex.reverse();
    }
    function compareAddr(indexA, indexB) {
        if (indexA.length != indexB.length) return 0;
        for (var i = 0, l = indexA.length; i < l; i++) {
            if (indexA[i] != indexB[i]) return 0;
        }
        return 1;
    }
    function setAddr(range, boundary, addr) {
        node = range.document.body;
        for (var i = 0, node, l = addr.length - 1; i < l; i++) {
            node = node.childNodes[addr[i]];
        }
        range[boundary + "Container"] = node;
        range[boundary + "Offset"] = addr[addr.length - 1];
    }
    function UndoManager() {
        this.list = [];
        this.index = 0;
        this.hasUndo = false;
        this.hasRedo = false;
        this.undo = function() {
            if (this.hasUndo) {
                var currentScene = this.getScene(), lastScene = this.list[this.index];
                if (lastScene.content.replace(specialAttr, "") != currentScene.content.replace(specialAttr, "")) {
                    this.save();
                }
                if (!this.list[this.index - 1] && this.list.length == 1) {
                    this.reset();
                    return;
                }
                while (this.list[this.index].content == this.list[this.index - 1].content) {
                    this.index--;
                    if (this.index == 0) {
                        return this.restore(0);
                    }
                }
                this.restore(--this.index);
            }
        };
        this.redo = function() {
            if (this.hasRedo) {
                while (this.list[this.index].content == this.list[this.index + 1].content) {
                    this.index++;
                    if (this.index == this.list.length - 1) {
                        return this.restore(this.index);
                    }
                }
                this.restore(++this.index);
            }
        };
        this.restore = function() {
            var scene = this.list[this.index];
            me.document.body.innerHTML = scene.bookcontent.replace(fillchar, "");
            if (browser.ie) {
                for (var i = 0, pi, ps = me.document.getElementsByTagName("p"); pi = ps[i++]; ) {
                    if (pi.innerHTML == "") {
                        domUtils.fillNode(me.document, pi);
                    }
                }
            }
            var range = new dom.Range(me.document);
            try {
                if (browser.opera || browser.safari) {
                    scene.senceRange.transformRange(range);
                } else {
                    range.moveToBookmark({
                        start: "_baidu_bookmark_start_",
                        end: "_baidu_bookmark_end_",
                        id: true
                    });
                }
                if (browser.ie && browser.version == 9 && range.collapsed && domUtils.isBlockElm(range.startContainer) && domUtils.isEmptyNode(range.startContainer)) {
                    domUtils.fillNode(range.document, range.startContainer);
                }
                range.select(!browser.gecko);
                if (!(browser.opera || browser.safari)) {
                    setTimeout(function() {
                        range.scrollToView(me.autoHeightEnabled, me.autoHeightEnabled ? domUtils.getXY(me.iframe).y : 0);
                    }, 200);
                }
            } catch (e) {}
            this.update();
            if (me.currentSelectedArr) {
                me.currentSelectedArr = [];
                var tds = me.document.getElementsByTagName("td");
                for (var i = 0, td; td = tds[i++]; ) {
                    if (td.className == me.options.selectedTdClass) {
                        me.currentSelectedArr.push(td);
                    }
                }
            }
            this.clearKey();
            me.fireEvent("reset", true);
        };
        this.getScene = function() {
            var range = me.selection.getRange(), cont = me.body.innerHTML.replace(fillchar, "");
            range.shrinkBoundary();
            browser.ie && (cont = cont.replace(/>&nbsp;</g, "><").replace(/\s*</g, "").replace(/>\s*/g, ">"));
            if (browser.opera || browser.safari) {
                return {
                    senceRange: new sceneRange(range),
                    content: cont,
                    bookcontent: cont
                };
            } else {
                var bookmark = range.createBookmark(true, true), bookCont = me.body.innerHTML.replace(fillchar, "");
                bookmark && range.moveToBookmark(bookmark).select(true);
                return {
                    bookcontent: bookCont,
                    content: cont
                };
            }
        };
        this.save = function(notCompareRange) {
            var currentScene = this.getScene(), lastScene = this.list[this.index];
            if (lastScene && lastScene.content == currentScene.content && (notCompareRange ? 1 : browser.opera || browser.safari ? lastScene.senceRange.compare(currentScene.senceRange) : lastScene.bookcontent == currentScene.bookcontent)) {
                return;
            }
            this.list = this.list.slice(0, this.index + 1);
            this.list.push(currentScene);
            if (this.list.length > maxUndoCount) {
                this.list.shift();
            }
            this.index = this.list.length - 1;
            this.clearKey();
            this.update();
        };
        this.update = function() {
            this.hasRedo = this.list[this.index + 1] ? true : false;
            this.hasUndo = this.list[this.index - 1] || this.list.length == 1 ? true : false;
        };
        this.reset = function() {
            this.list = [];
            this.index = 0;
            this.hasUndo = false;
            this.hasRedo = false;
            this.clearKey();
        };
        this.clearKey = function() {
            keycont = 0;
            lastKeyCode = null;
            me.fireEvent("contentchange");
        };
    }
    me.undoManger = new UndoManager();
    function saveScene() {
        this.undoManger.save();
    }
    me.addListener("beforeexeccommand", saveScene);
    me.addListener("afterexeccommand", saveScene);
    me.addListener("reset", function(type, exclude) {
        if (!exclude) {
            me.undoManger.reset();
        }
    });
    me.commands["redo"] = me.commands["undo"] = {
        execCommand: function(cmdName) {
            me.undoManger[cmdName]();
        },
        queryCommandState: function(cmdName) {
            return me.undoManger["has" + (cmdName.toLowerCase() == "undo" ? "Undo" : "Redo")] ? 0 : -1;
        },
        notNeedUndo: 1
    };
    var keys = {
        16: 1,
        17: 1,
        18: 1,
        37: 1,
        38: 1,
        39: 1,
        40: 1,
        13: 1
    }, keycont = 0, lastKeyCode;
    me.addListener("keydown", function(type, evt) {
        var keyCode = evt.keyCode || evt.which;
        if (!keys[keyCode] && !evt.ctrlKey && !evt.metaKey && !evt.shiftKey && !evt.altKey) {
            if (me.undoManger.list.length == 0 || (keyCode == 8 || keyCode == 46) && lastKeyCode != keyCode) {
                me.undoManger.save(true);
                lastKeyCode = keyCode;
                return;
            }
            if (me.undoManger.list.length == 2 && me.undoManger.index == 0 && keycont == 0) {
                me.undoManger.list.splice(1, 1);
                me.undoManger.update();
            }
            lastKeyCode = keyCode;
            keycont++;
            if (keycont >= maxInputCount) {
                if (me.selection.getRange().collapsed) me.undoManger.save();
            }
        }
    });
};

UE.commands["inserthtml"] = {
    execCommand: function(command, html, notSerialize) {
        var me = this, range, div, tds = me.currentSelectedArr;
        range = me.selection.getRange();
        div = range.document.createElement("div");
        div.style.display = "inline";
        var serialize = me.serialize;
        if (!notSerialize && serialize) {
            var node = serialize.parseHTML(html);
            node = serialize.transformInput(node);
            node = serialize.filter(node);
            html = serialize.toHTML(node);
        }
        div.innerHTML = utils.trim(html);
        try {
            me.adjustTable && me.adjustTable(div);
        } catch (e) {}
        if (tds && tds.length) {
            for (var i = 0, ti; ti = tds[i++]; ) {
                ti.className = "";
            }
            tds[0].innerHTML = "";
            range.setStart(tds[0], 0).collapse(true);
            me.currentSelectedArr = [];
        }
        if (!range.collapsed) {
            range.deleteContents();
            if (range.startContainer.nodeType == 1) {
                var child = range.startContainer.childNodes[range.startOffset], pre;
                if (child && domUtils.isBlockElm(child) && (pre = child.previousSibling) && domUtils.isBlockElm(pre)) {
                    range.setEnd(pre, pre.childNodes.length).collapse();
                    while (child.firstChild) {
                        pre.appendChild(child.firstChild);
                    }
                    domUtils.remove(child);
                }
            }
        }
        var child, parent, pre, tmp, hadBreak = 0;
        while (child = div.firstChild) {
            range.insertNode(child);
            if (!hadBreak && child.nodeType == domUtils.NODE_ELEMENT && domUtils.isBlockElm(child)) {
                parent = domUtils.findParent(child, function(node) {
                    return domUtils.isBlockElm(node);
                });
                if (parent && parent.tagName.toLowerCase() != "body" && !(dtd[parent.tagName][child.nodeName] && child.parentNode === parent)) {
                    if (!dtd[parent.tagName][child.nodeName]) {
                        pre = parent;
                    } else {
                        tmp = child.parentNode;
                        while (tmp !== parent) {
                            pre = tmp;
                            tmp = tmp.parentNode;
                        }
                    }
                    domUtils.breakParent(child, pre || tmp);
                    var pre = child.previousSibling;
                    domUtils.trimWhiteTextNode(pre);
                    if (!pre.childNodes.length) {
                        domUtils.remove(pre);
                    }
                    if (!browser.ie && (next = child.nextSibling) && domUtils.isBlockElm(next) && next.lastChild && !domUtils.isBr(next.lastChild)) {
                        next.appendChild(me.document.createElement("br"));
                    }
                    hadBreak = 1;
                }
            }
            var next = child.nextSibling;
            if (!div.firstChild && next && domUtils.isBlockElm(next)) {
                range.setStart(next, 0).collapse(true);
                break;
            }
            range.setEndAfter(child).collapse();
        }
        child = range.startContainer;
        if (domUtils.isBlockElm(child) && domUtils.isEmptyNode(child)) {
            child.innerHTML = browser.ie ? "" : "<br/>";
        }
        range.select(true);
        setTimeout(function() {
            range = me.selection.getRange();
            range.scrollToView(me.autoHeightEnabled, me.autoHeightEnabled ? domUtils.getXY(me.iframe).y : 0);
        }, 200);
    }
};

(function() {
    function getClipboardData(callback) {
        var doc = this.document;
        if (doc.getElementById("baidu_pastebin")) {
            return;
        }
        var range = this.selection.getRange(), bk = range.createBookmark(), pastebin = doc.createElement("div");
        pastebin.id = "baidu_pastebin";
        browser.webkit && pastebin.appendChild(doc.createTextNode(domUtils.fillChar + domUtils.fillChar));
        doc.body.appendChild(pastebin);
        bk.start.style.display = "";
        pastebin.style.cssText = "position:absolute;width:1px;height:1px;overflow:hidden;left:-1000px;white-space:nowrap;top:" + domUtils.getXY(bk.start).y + "px";
        range.selectNodeContents(pastebin).select(true);
        setTimeout(function() {
            if (browser.webkit) {
                for (var i = 0, pastebins = doc.querySelectorAll("#baidu_pastebin"), pi; pi = pastebins[i++]; ) {
                    if (domUtils.isEmptyNode(pi)) {
                        domUtils.remove(pi);
                    } else {
                        pastebin = pi;
                        break;
                    }
                }
            }
            try {
                pastebin.parentNode.removeChild(pastebin);
            } catch (e) {}
            range.moveToBookmark(bk).select(true);
            callback(pastebin);
        }, 0);
    }
    UE.plugins["paste"] = function() {
        var me = this;
        var word_img_flag = {
            flag: ""
        };
        var pasteplain = me.options.pasteplain === true;
        var modify_num = {
            flag: ""
        };
        me.commands["pasteplain"] = {
            queryCommandState: function() {
                return pasteplain;
            },
            execCommand: function() {
                pasteplain = !pasteplain | 0;
            },
            notNeedUndo: 1
        };
        function filter(div) {
            var html;
            if (div.firstChild) {
                var nodes = domUtils.getElementsByTagName(div, "span");
                for (var i = 0, ni; ni = nodes[i++]; ) {
                    if (ni.id == "_baidu_cut_start" || ni.id == "_baidu_cut_end") {
                        domUtils.remove(ni);
                    }
                }
                if (browser.webkit) {
                    var brs = div.querySelectorAll("div br");
                    for (var i = 0, bi; bi = brs[i++]; ) {
                        var pN = bi.parentNode;
                        if (pN.tagName == "DIV" && pN.childNodes.length == 1) {
                            pN.innerHTML = "<p><br/></p>";
                            domUtils.remove(pN);
                        }
                    }
                    var divs = div.querySelectorAll("#baidu_pastebin");
                    for (var i = 0, di; di = divs[i++]; ) {
                        var tmpP = me.document.createElement("p");
                        di.parentNode.insertBefore(tmpP, di);
                        while (di.firstChild) {
                            tmpP.appendChild(di.firstChild);
                        }
                        domUtils.remove(di);
                    }
                    var metas = div.querySelectorAll("meta");
                    for (var i = 0, ci; ci = metas[i++]; ) {
                        domUtils.remove(ci);
                    }
                    var brs = div.querySelectorAll("br");
                    for (i = 0; ci = brs[i++]; ) {
                        if (/^apple-/.test(ci)) {
                            domUtils.remove(ci);
                        }
                    }
                }
                if (browser.gecko) {
                    var dirtyNodes = div.querySelectorAll("[_moz_dirty]");
                    for (i = 0; ci = dirtyNodes[i++]; ) {
                        ci.removeAttribute("_moz_dirty");
                    }
                }
                if (!browser.ie) {
                    var spans = div.querySelectorAll("span.Apple-style-span");
                    for (var i = 0, ci; ci = spans[i++]; ) {
                        domUtils.remove(ci, true);
                    }
                }
                html = div.innerHTML;
                var f = me.serialize;
                if (f) {
                    try {
                        var node = f.transformInput(f.parseHTML(f.word(html)), word_img_flag);
                        node = f.filter(node, pasteplain ? {
                            whiteList: {
                                a: {
                                    $: {
                                        href: 1
                                    }
                                },
                                p: {
                                    br: 1,
                                    BR: 1,
                                    $: {}
                                },
                                br: {
                                    $: {}
                                },
                                div: {
                                    br: 1,
                                    BR: 1,
                                    $: {}
                                },
                                li: {
                                    $: {}
                                },
                                tr: {
                                    td: 1,
                                    $: {}
                                },
                                td: {
                                    $: {}
                                }
                            },
                            blackList: {
                                style: 1,
                                script: 1,
                                object: 1
                            }
                        } : null, !pasteplain ? modify_num : null);
                        if (browser.webkit) {
                            var length = node.children.length, child;
                            while ((child = node.children[length - 1]) && child.tag == "br") {
                                node.children.splice(length - 1, 1);
                                length = node.children.length;
                            }
                        }
                        html = f.toHTML(node, pasteplain);
                    } catch (e) {}
                }
                html = {
                    html: html
                };
                me.fireEvent("beforepaste", html);
                me.execCommand("insertHtml", html.html, true);
                me.fireEvent("afterpaste");
            }
        }
        me.ready(function() {
            domUtils.on(me.body, "cut", function() {
                var range = me.selection.getRange();
                if (!range.collapsed && me.undoManger) {
                    me.undoManger.save();
                }
            });
            domUtils.on(me.body, browser.ie || browser.opera ? "keydown" : "paste", function(e) {
                if ((browser.ie || browser.opera) && (!e.ctrlKey || e.keyCode != "86")) {
                    return;
                }
                getClipboardData.call(me, function(div) {
                    filter(div);
                });
            });
        });
    };
})();

UE.plugins["cleanformat"] = function() {
    this.setOpt({
        cleanformat: {
            mergeEmptyline: true,
            removeClass: true,
            removeEmptyline: false,
            imageBlockLine: "center",
            pasteFilter: true,
            removeEmptyNode: false,
            removeTagNames: utils.extend({
                div: 1
            }, dtd.$removeEmpty),
            indent: false,
            indentValue: "2em"
        }
    });
    var me = this, opt = me.options.cleanformat, remainClass = {
        selectTdClass: 1,
        pagebreak: 1,
        anchorclass: 1
    }, remainTag = {
        li: 1
    }, tags = {
        div: 1,
        p: 1,
        blockquote: 1,
        center: 1,
        h1: 1,
        h2: 1,
        h3: 1,
        h4: 1,
        h5: 1,
        h6: 1,
        span: 1
    }, highlightCont;
    if (!opt) {
        return;
    }
    function isLine(node, notEmpty) {
        if (!node || node.nodeType == 3) return 0;
        if (domUtils.isBr(node)) return 1;
        if (node && node.parentNode && tags[node.tagName.toLowerCase()]) {
            if (highlightCont && highlightCont.contains(node) || node.getAttribute("pagebreak")) {
                return 0;
            }
            return notEmpty ? !domUtils.isEmptyBlock(node) : domUtils.isEmptyBlock(node);
        }
    }
    function removeNotAttributeSpan(node) {
        if (!node.style.cssText) {
            domUtils.removeAttributes(node, [ "style" ]);
            if (node.tagName.toLowerCase() == "span" && domUtils.hasNoAttributes(node)) {
                domUtils.remove(node, true);
            }
        }
    }
    function autotype(type, html) {
        var cont;
        if (html) {
            if (!opt.pasteFilter) {
                return;
            }
            cont = me.document.createElement("div");
            cont.innerHTML = html.html;
        } else {
            cont = me.document.body;
        }
        var nodes = domUtils.getElementsByTagName(cont, "*");
        for (var i = 0, ci; ci = nodes[i++]; ) {
            if (!highlightCont && ci.tagName == "DIV" && ci.getAttribute("highlighter")) {
                highlightCont = ci;
            }
            domUtils.removeAttributes(ci, [ "style" ]);
            if (isLine(ci)) {
                if (opt.mergeEmptyline) {
                    var next = ci.nextSibling, tmpNode, isBr = domUtils.isBr(ci);
                    while (isLine(next)) {
                        tmpNode = next;
                        next = tmpNode.nextSibling;
                        if (isBr && (!next || next && !domUtils.isBr(next))) {
                            break;
                        }
                        domUtils.remove(tmpNode);
                    }
                }
                if (opt.removeEmptyline && domUtils.inDoc(ci, cont) && !remainTag[ci.parentNode.tagName.toLowerCase()]) {
                    if (domUtils.isBr(ci)) {
                        next = ci.nextSibling;
                        if (next && !domUtils.isBr(next)) {
                            continue;
                        }
                    }
                    domUtils.remove(ci);
                    continue;
                }
            }
            if (isLine(ci, true) && ci.tagName != "SPAN") {
                if (opt.indent) {
                    ci.style.textIndent = opt.indentValue;
                }
                if (opt.textAlign) {
                    ci.style.textAlign = opt.textAlign;
                }
            }
            if (opt.removeClass && ci.className && !remainClass[ci.className.toLowerCase()]) {
                if (highlightCont && highlightCont.contains(ci)) {
                    continue;
                }
                domUtils.removeAttributes(ci, [ "class" ]);
            }
            if (opt.removeEmptyNode) {
                if (opt.removeTagNames[ci.tagName.toLowerCase()] && domUtils.hasNoAttributes(ci) && domUtils.isEmptyBlock(ci)) {
                    domUtils.remove(ci);
                }
            }
        }
        if (html) {
            html.html = cont.innerHTML;
        }
    }
    if (opt.pasteFilter) {
        me.addListener("beforepaste", autotype);
    }
    me.commands["cleanformat"] = {
        execCommand: function() {
            me.removeListener("beforepaste", autotype);
            if (opt.pasteFilter) {
                me.addListener("beforepaste", autotype);
            }
            autotype();
        }
    };
};

(function() {
    var uid = 0, _selectionChangeTimer;
    function replaceSrc(div) {
        var imgs = div.getElementsByTagName("img"), orgSrc;
        for (var i = 0, img; img = imgs[i++]; ) {
            if (orgSrc = img.getAttribute("orgSrc")) {
                img.src = orgSrc;
                img.removeAttribute("orgSrc");
            }
        }
        var as = div.getElementsByTagName("a");
        for (var i = 0, ai; ai = as[i++]; i++) {
            if (ai.getAttribute("data_ue_src")) {
                ai.setAttribute("href", ai.getAttribute("data_ue_src"));
            }
        }
    }
    function setValue(form, editor) {
        var textarea;
        if (editor.textarea) {
            if (utils.isString(editor.textarea)) {
                for (var i = 0, ti, tis = domUtils.getElementsByTagName(form, "textarea"); ti = tis[i++]; ) {
                    if (ti.id == "ueditor_textarea_" + editor.options.textarea) {
                        textarea = ti;
                        break;
                    }
                }
            } else {
                textarea = editor.textarea;
            }
        }
        if (!textarea) {
            form.appendChild(textarea = domUtils.createElement(document, "textarea", {
                name: editor.options.textarea,
                id: "ueditor_textarea_" + editor.options.textarea,
                style: "display:none"
            }));
            editor.textarea = textarea;
        }
        textarea.value = editor.hasContents() ? editor.options.allHtmlEnabled ? editor.getAllHtml() : editor.getContent(null, null, true) : "";
    }
    var Editor = UE.Editor = function(options) {
        var me = this;
        me.uid = uid++;
        EventBase.call(me);
        me.commands = {};
        me.options = utils.extend(utils.clone(options || {}), UEDITOR_CONFIG, true);
        me.setOpt({
            isShow: true,
            initialContent: "欢迎使用ueditor!",
            autoClearinitialContent: false,
            iframeCssUrl: me.options.UEDITOR_HOME_URL + "themes/iframe.css",
            textarea: "editorValue",
            focus: false,
            initialFrameWidth: 1e3,
            initialFrameHeight: me.options.minFrameHeight || 320,
            minFrameWidth: 800,
            minFrameHeight: 220,
            autoClearEmptyNode: true,
            fullscreen: false,
            readonly: false,
            zIndex: 999,
            imagePopup: true,
            enterTag: "p",
            pageBreakTag: "_baidu_page_break_tag_",
            customDomain: false,
            lang: "zh-cn",
            langPath: me.options.UEDITOR_HOME_URL + "lang/",
            theme: "default",
            themePath: me.options.UEDITOR_HOME_URL + "themes/",
            allHtmlEnabled: false,
            scaleEnabled: false,
            tableNativeEditInFF: false
        });
        utils.loadFile(document, {
            src: me.options.langPath + me.options.lang + "/" + me.options.lang + ".js",
            tag: "script",
            type: "text/javascript",
            defer: "defer"
        }, function() {
            for (var pi in UE.plugins) {
                UE.plugins[pi].call(me);
            }
            me.langIsReady = true;
            me.fireEvent("langReady");
        });
        UE.instants["ueditorInstant" + me.uid] = me;
    };
    Editor.prototype = {
        ready: function(fn) {
            var me = this;
            if (fn) {
                me.isReady ? fn.apply(me) : me.addListener("ready", fn);
            }
        },
        setOpt: function(key, val) {
            var obj = {};
            if (utils.isString(key)) {
                obj[key] = val;
            } else {
                obj = key;
            }
            utils.extend(this.options, obj, true);
        },
        destroy: function() {
            var me = this;
            me.fireEvent("destroy");
            var container = me.container.parentNode;
            var textarea = me.textarea;
            if (!textarea) {
                textarea = document.createElement("textarea");
                container.parentNode.insertBefore(textarea, container);
            } else {
                textarea.style.display = "";
            }
            textarea.style.width = container.offsetWidth + "px";
            textarea.style.height = container.offsetHeight + "px";
            textarea.value = me.getContent();
            textarea.id = me.key;
            container.innerHTML = "";
            domUtils.remove(container);
            var key = me.key;
            for (var p in me) {
                if (me.hasOwnProperty(p)) {
                    delete this[p];
                }
            }
            UE.delEditor(key);
        },
        render: function(container) {
            var me = this, options = me.options;
            if (utils.isString(container)) {
                container = document.getElementById(container);
            }
            if (container) {
                var useBodyAsViewport = ie && browser.version < 9, html = (ie && browser.version < 9 ? "" : "<!DOCTYPE html>") + "<html xmlns='http://www.w3.org/1999/xhtml'" + (!useBodyAsViewport ? " class='view'" : "") + "><head>" + (options.iframeCssUrl ? "<link rel='stylesheet' type='text/css' href='" + utils.unhtml(options.iframeCssUrl) + "'/>" : "") + "<style type='text/css'>" + ".view{padding:0;word-wrap:break-word;cursor:text;height:100%;}\n" + "body{margin:8px;font-family:sans-serif;font-size:16px;}" + "p{margin:5px 0;}" + (options.initialStyle || "") + "</style></head><body" + (useBodyAsViewport ? " class='view'" : "") + "></body>";
                if (options.customDomain && document.domain != location.hostname) {
                    html += "<script>window.parent.UE.instants['ueditorInstant" + me.uid + "']._setup(document);</script></html>";
                    container.appendChild(domUtils.createElement(document, "iframe", {
                        id: "baidu_editor_" + me.uid,
                        width: "100%",
                        height: "100%",
                        frameborder: "0",
                        src: 'javascript:void(function(){document.open();document.domain="' + document.domain + '";' + 'document.write("' + html + '");document.close();}())'
                    }));
                } else {
                    container.innerHTML = '<iframe id="' + "baidu_editor_" + this.uid + '"' + 'width="100%" height="100%" scroll="no" frameborder="0" ></iframe>';
                    var doc = container.firstChild.contentWindow.document;
                    doc.open();
                    doc.write(html + "</html>");
                    doc.close();
                    me._setup(doc);
                }
                container.style.overflow = "hidden";
            }
        },
        _setup: function(doc) {
            var me = this, options = me.options;
            if (ie) {
                doc.body.disabled = true;
                doc.body.contentEditable = true;
                doc.body.disabled = false;
            } else {
                doc.body.contentEditable = true;
                doc.body.spellcheck = false;
            }
            me.document = doc;
            me.window = doc.defaultView || doc.parentWindow;
            me.iframe = me.window.frameElement;
            me.body = doc.body;
            me.setHeight(Math.max(options.minFrameHeight, options.initialFrameHeight));
            me.selection = new dom.Selection(doc);
            var geckoSel;
            if (browser.gecko && (geckoSel = this.selection.getNative())) {
                geckoSel.removeAllRanges();
            }
            this._initEvents();
            if (options.initialContent) {
                if (options.autoClearinitialContent) {
                    var oldExecCommand = me.execCommand;
                    me.execCommand = function() {
                        me.fireEvent("firstBeforeExecCommand");
                        oldExecCommand.apply(me, arguments);
                    };
                    this._setDefaultContent(options.initialContent);
                } else this.setContent(options.initialContent, true);
            }
            for (var form = this.iframe.parentNode; !domUtils.isBody(form); form = form.parentNode) {
                if (form.tagName == "FORM") {
                    domUtils.on(form, "submit", function() {
                        setValue(this, me);
                    });
                    break;
                }
            }
            if (domUtils.isEmptyNode(me.body)) {
                me.body.innerHTML = "<p>" + (browser.ie ? "" : "<br/>") + "</p>";
            }
            if (options.focus) {
                setTimeout(function() {
                    me.focus();
                    !me.options.autoClearinitialContent && me._selectionChange();
                }, 0);
            }
            if (!me.container) {
                me.container = this.iframe.parentNode;
            }
            if (options.fullscreen && me.ui) {
                me.ui.setFullScreen(true);
            }
            try {
                me.document.execCommand("2D-position", false, false);
            } catch (e) {}
            try {
                me.document.execCommand("enableInlineTableEditing", false, options.tableNativeEditInFF);
            } catch (e) {}
            try {
                me.document.execCommand("enableObjectResizing", false, false);
            } catch (e) {
                domUtils.on(me.body, browser.ie ? "resizestart" : "resize", function(evt) {
                    domUtils.preventDefault(evt);
                });
            }
            me.isReady = 1;
            me.fireEvent("ready");
            options.onready && options.onready.call(me);
            if (!browser.ie) {
                domUtils.on(me.window, [ "blur", "focus" ], function(e) {
                    if (e.type == "blur") {
                        me._bakRange = me.selection.getRange();
                        try {
                            me.selection.getNative().removeAllRanges();
                        } catch (e) {}
                    } else {
                        try {
                            me._bakRange && me._bakRange.select();
                        } catch (e) {}
                    }
                });
            }
            if (browser.gecko && browser.version <= 10902) {
                me.body.contentEditable = false;
                setTimeout(function() {
                    me.body.contentEditable = true;
                }, 100);
                setInterval(function() {
                    me.body.style.height = me.iframe.offsetHeight - 20 + "px";
                }, 100);
            }
            !options.isShow && me.setHide();
            options.readonly && me.setDisabled();
        },
        sync: function(formId) {
            var me = this, form = formId ? document.getElementById(formId) : domUtils.findParent(me.iframe.parentNode, function(node) {
                return node.tagName == "FORM";
            }, true);
            form && setValue(form, me);
        },
        setHeight: function(height) {
            if (height !== parseInt(this.iframe.parentNode.style.height)) {
                this.iframe.parentNode.style.height = height + "px";
            }
            this.document.body.style.height = height - 20 + "px";
        },
        getContent: function(cmd, fn, isPreview) {
            var me = this;
            if (cmd && utils.isFunction(cmd)) {
                fn = cmd;
                cmd = "";
            }
            if (fn ? !fn() : !this.hasContents()) {
                return "";
            }
            me.fireEvent("beforegetcontent", cmd);
            var reg = new RegExp(domUtils.fillChar, "g"), html = me.body.innerHTML.replace(reg, "").replace(/>[\t\r\n]*?</g, "><");
            me.fireEvent("aftergetcontent", cmd);
            if (me.serialize) {
                var node = me.serialize.parseHTML(html);
                node = me.serialize.transformOutput(node);
                html = me.serialize.toHTML(node);
            }
            if (ie && isPreview) {
                html = html.replace(/<p>\s*?<\/p>/g, "<p>&nbsp;</p>");
            } else {
                html = html.replace(/(&nbsp;)+/g, function(s) {
                    for (var i = 0, str = [], l = s.split(";").length - 1; i < l; i++) {
                        str.push(i % 2 == 0 ? " " : "&nbsp;");
                    }
                    return str.join("");
                });
            }
            return html;
        },
        getAllHtml: function() {
            var me = this, headHtml = {
                html: ""
            }, html = "";
            me.fireEvent("getAllHtml", headHtml);
            return "<html><head>" + (me.options.charset ? '<meta http-equiv="Content-Type" content="text/html; charset=' + me.options.charset + '"/>' : "") + me.document.getElementsByTagName("head")[0].innerHTML + headHtml.html + "</head>" + "<body " + (ie && browser.version < 9 ? 'class="view"' : "") + ">" + me.getContent(null, null, true) + "</body></html>";
        },
        getPlainTxt: function() {
            var reg = new RegExp(domUtils.fillChar, "g"), html = this.body.innerHTML.replace(/[\n\r]/g, "");
            html = html.replace(/<(p|div)[^>]*>(<br\/?>|&nbsp;)<\/\1>/gi, "\n").replace(/<br\/?>/gi, "\n").replace(/<[^>/]+>/g, "").replace(/(\n)?<\/([^>]+)>/g, function(a, b, c) {
                return dtd.$block[c] ? "\n" : b ? b : "";
            });
            return html.replace(reg, "").replace(/\u00a0/g, " ").replace(/&nbsp;/g, " ");
        },
        getContentTxt: function() {
            var reg = new RegExp(domUtils.fillChar, "g");
            return this.body[browser.ie ? "innerText" : "textContent"].replace(reg, "").replace(/\u00a0/g, " ");
        },
        setContent: function(html, notFireSelectionchange) {
            var me = this, inline = utils.extend({
                a: 1,
                A: 1
            }, dtd.$inline, true), lastTagName;
            html = html.replace(/^[ \t\r\n]*?</, "<").replace(/>[ \t\r\n]*?$/, ">").replace(/>[\t\r\n]*?</g, "><").replace(/[\s\/]?(\w+)?>[ \t\r\n]*?<\/?(\w+)/gi, function(a, b, c) {
                if (b) {
                    lastTagName = c;
                } else {
                    b = lastTagName;
                }
                return !inline[b] && !inline[c] ? a.replace(/>[ \t\r\n]*?</, "><") : a;
            });
            html = {
                html: html
            };
            me.fireEvent("beforesetcontent", html);
            html = html.html;
            var serialize = this.serialize;
            if (serialize) {
                var node = serialize.parseHTML(html);
                node = serialize.transformInput(node);
                node = serialize.filter(node);
                html = serialize.toHTML(node);
            }
            this.body.innerHTML = html.replace(new RegExp("[\r" + domUtils.fillChar + "]*", "g"), "");
            if (browser.ie && browser.version < 7) {
                replaceSrc(this.document.body);
            }
            if (me.options.enterTag == "p") {
                var child = this.body.firstChild, tmpNode;
                if (!child || child.nodeType == 1 && (dtd.$cdata[child.tagName] || domUtils.isCustomeNode(child)) && child === this.body.lastChild) {
                    this.body.innerHTML = "<p>" + (browser.ie ? "&nbsp;" : "<br/>") + "</p>" + this.body.innerHTML;
                } else {
                    var p = me.document.createElement("p");
                    while (child) {
                        while (child && (child.nodeType == 3 || child.nodeType == 1 && dtd.p[child.tagName] && !dtd.$cdata[child.tagName])) {
                            tmpNode = child.nextSibling;
                            p.appendChild(child);
                            child = tmpNode;
                        }
                        if (p.firstChild) {
                            if (!child) {
                                me.body.appendChild(p);
                                break;
                            } else {
                                me.body.insertBefore(p, child);
                                p = me.document.createElement("p");
                            }
                        }
                        child = child.nextSibling;
                    }
                }
            }
            me.fireEvent("aftersetcontent");
            me.fireEvent("contentchange");
            !notFireSelectionchange && me._selectionChange();
            me._bakRange = me._bakIERange = null;
            var geckoSel;
            if (browser.gecko && (geckoSel = this.selection.getNative())) {
                geckoSel.removeAllRanges();
            }
        },
        focus: function(toEnd) {
            try {
                var me = this, rng = me.selection.getRange();
                if (toEnd) {
                    rng.setStartAtLast(me.body.lastChild).setCursor(false, true);
                } else {
                    rng.select(true);
                }
            } catch (e) {}
        },
        _initEvents: function() {
            var me = this, doc = me.document, win = me.window;
            me._proxyDomEvent = utils.bind(me._proxyDomEvent, me);
            domUtils.on(doc, [ "click", "contextmenu", "mousedown", "keydown", "keyup", "keypress", "mouseup", "mouseover", "mouseout", "selectstart" ], me._proxyDomEvent);
            domUtils.on(win, [ "focus", "blur" ], me._proxyDomEvent);
            domUtils.on(doc, [ "mouseup", "keydown" ], function(evt) {
                if (evt.type == "keydown" && (evt.ctrlKey || evt.metaKey || evt.shiftKey || evt.altKey)) {
                    return;
                }
                if (evt.button == 2) return;
                me._selectionChange(250, evt);
            });
            var innerDrag = 0, source = browser.ie ? me.body : me.document, dragoverHandler;
            domUtils.on(source, "dragstart", function() {
                innerDrag = 1;
            });
            domUtils.on(source, browser.webkit ? "dragover" : "drop", function() {
                return browser.webkit ? function() {
                    clearTimeout(dragoverHandler);
                    dragoverHandler = setTimeout(function() {
                        if (!innerDrag) {
                            var sel = me.selection, range = sel.getRange();
                            if (range) {
                                var common = range.getCommonAncestor();
                                if (common && me.serialize) {
                                    var f = me.serialize, node = f.filter(f.transformInput(f.parseHTML(f.word(common.innerHTML))));
                                    common.innerHTML = f.toHTML(node);
                                }
                            }
                        }
                        innerDrag = 0;
                    }, 200);
                } : function(e) {
                    if (!innerDrag) {
                        e.preventDefault ? e.preventDefault() : e.returnValue = false;
                    }
                    innerDrag = 0;
                };
            }());
        },
        _proxyDomEvent: function(evt) {
            return this.fireEvent(evt.type.replace(/^on/, ""), evt);
        },
        _selectionChange: function(delay, evt) {
            var me = this;
            var hackForMouseUp = false;
            var mouseX, mouseY;
            if (browser.ie && browser.version < 9 && evt && evt.type == "mouseup") {
                var range = this.selection.getRange();
                if (!range.collapsed) {
                    hackForMouseUp = true;
                    mouseX = evt.clientX;
                    mouseY = evt.clientY;
                }
            }
            clearTimeout(_selectionChangeTimer);
            _selectionChangeTimer = setTimeout(function() {
                if (!me.selection.getNative()) {
                    return;
                }
                var ieRange;
                if (hackForMouseUp && me.selection.getNative().type == "None") {
                    ieRange = me.document.body.createTextRange();
                    try {
                        ieRange.moveToPoint(mouseX, mouseY);
                    } catch (ex) {
                        ieRange = null;
                    }
                }
                var bakGetIERange;
                if (ieRange) {
                    bakGetIERange = me.selection.getIERange;
                    me.selection.getIERange = function() {
                        return ieRange;
                    };
                }
                me.selection.cache();
                if (bakGetIERange) {
                    me.selection.getIERange = bakGetIERange;
                }
                if (me.selection._cachedRange && me.selection._cachedStartElement) {
                    me.fireEvent("beforeselectionchange");
                    me.fireEvent("selectionchange", !!evt);
                    me.fireEvent("afterselectionchange");
                    me.selection.clear();
                }
            }, delay || 50);
        },
        _callCmdFn: function(fnName, args) {
            var cmdName = args[0].toLowerCase(), cmd, cmdFn;
            cmd = this.commands[cmdName] || UE.commands[cmdName];
            cmdFn = cmd && cmd[fnName];
            if ((!cmd || !cmdFn) && fnName == "queryCommandState") {
                return 0;
            } else if (cmdFn) {
                return cmdFn.apply(this, args);
            }
        },
        execCommand: function(cmdName) {
            cmdName = cmdName.toLowerCase();
            var me = this, result, cmd = me.commands[cmdName] || UE.commands[cmdName];
            if (!cmd || !cmd.execCommand) {
                return null;
            }
            if (!cmd.notNeedUndo && !me.__hasEnterExecCommand) {
                me.__hasEnterExecCommand = true;
                if (me.queryCommandState(cmdName) != -1) {
                    me.fireEvent("beforeexeccommand", cmdName);
                    result = this._callCmdFn("execCommand", arguments);
                    me.fireEvent("afterexeccommand", cmdName);
                }
                me.__hasEnterExecCommand = false;
            } else {
                result = this._callCmdFn("execCommand", arguments);
            }
            !me.__hasEnterExecCommand && me._selectionChange();
            return result;
        },
        queryCommandState: function(cmdName) {
            return this._callCmdFn("queryCommandState", arguments);
        },
        queryCommandValue: function(cmdName) {
            return this._callCmdFn("queryCommandValue", arguments);
        },
        hasContents: function(tags) {
            if (tags) {
                for (var i = 0, ci; ci = tags[i++]; ) {
                    if (this.document.getElementsByTagName(ci).length > 0) {
                        return true;
                    }
                }
            }
            if (!domUtils.isEmptyBlock(this.body)) {
                return true;
            }
            tags = [ "div" ];
            for (i = 0; ci = tags[i++]; ) {
                var nodes = domUtils.getElementsByTagName(this.document, ci);
                for (var n = 0, cn; cn = nodes[n++]; ) {
                    if (domUtils.isCustomeNode(cn)) {
                        return true;
                    }
                }
            }
            return false;
        },
        reset: function() {
            this.fireEvent("reset");
        },
        setEnabled: function() {
            var me = this, range;
            if (me.body.contentEditable == "false") {
                me.body.contentEditable = true;
                range = me.selection.getRange();
                try {
                    range.moveToBookmark(me.lastBk);
                    delete me.lastBk;
                } catch (e) {
                    range.setStartAtFirst(me.body).collapse(true);
                }
                range.select(true);
                if (me.bkqueryCommandState) {
                    me.queryCommandState = me.bkqueryCommandState;
                    delete me.bkqueryCommandState;
                }
                me.fireEvent("selectionchange");
            }
        },
        enable: function() {
            return this.setEnabled();
        },
        setDisabled: function(except) {
            var me = this;
            except = except ? utils.isArray(except) ? except : [ except ] : [];
            if (me.body.contentEditable == "true") {
                if (!me.lastBk) {
                    me.lastBk = me.selection.getRange().createBookmark(true);
                }
                me.body.contentEditable = false;
                me.bkqueryCommandState = me.queryCommandState;
                me.queryCommandState = function(type) {
                    if (utils.indexOf(except, type) != -1) {
                        return me.bkqueryCommandState.apply(me, arguments);
                    }
                    return -1;
                };
                me.fireEvent("selectionchange");
            }
        },
        disable: function(except) {
            return this.setDisabled(except);
        },
        _setDefaultContent: function() {
            function clear() {
                var me = this;
                if (me.document.getElementById("initContent")) {
                    me.body.innerHTML = "<p>" + (ie ? "" : "<br/>") + "</p>";
                    me.removeListener("firstBeforeExecCommand focus", clear);
                    setTimeout(function() {
                        me.focus();
                        me._selectionChange();
                    }, 0);
                }
            }
            return function(cont) {
                var me = this;
                me.body.innerHTML = '<p id="initContent">' + cont + "</p>";
                if (browser.ie && browser.version < 7) {
                    replaceSrc(me.body);
                }
                me.addListener("firstBeforeExecCommand focus", clear);
            };
        }(),
        setShow: function() {
            var me = this, range = me.selection.getRange();
            if (me.container.style.display == "none") {
                try {
                    range.moveToBookmark(me.lastBk);
                    delete me.lastBk;
                } catch (e) {
                    range.setStartAtFirst(me.body).collapse(true);
                }
                setTimeout(function() {
                    range.select(true);
                }, 100);
                me.container.style.display = "";
            }
        },
        show: function() {
            return this.setShow();
        },
        setHide: function() {
            var me = this;
            if (!me.lastBk) {
                me.lastBk = me.selection.getRange().createBookmark(true);
            }
            me.container.style.display = "none";
        },
        hide: function() {
            return this.setHide();
        },
        getLang: function(path) {
            var lang = UE.I18N[this.options.lang];
            path = (path || "").split(".");
            for (var i = 0, ci; ci = path[i++]; ) {
                lang = lang[ci];
                if (!lang) break;
            }
            return lang;
        }
    };
    utils.inherits(Editor, EventBase);
})();