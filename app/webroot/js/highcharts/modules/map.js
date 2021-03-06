/*
 Map plugin v0.2 for Highcharts

 (c) 2011-2014 Torstein Honsi

 License: www.highcharts.com/license
 */
(function (i) {
    function A(a, b, d) {
        for (var c = 4, e, f = []; c--;)e = b.rgba[c] + (a.rgba[c] - b.rgba[c]) * (1 - d), f[c] = c === 3 ? e : Math.round(e);
        return"rgba(" + f.join(",") + ")"
    }

    function E(a, b, d, c, e, f, g, h, m) {
        a = a["stroke-width"] % 2 / 2;
        b -= a;
        d -= a;
        return["M", b + f, d, "L", b + c - g, d, "C", b + c - g / 2, d, b + c, d + g / 2, b + c, d + g, "L", b + c, d + e - h, "C", b + c, d + e - h / 2, b + c - h / 2, d + e, b + c - h, d + e, "L", b + m, d + e, "C", b + m / 2, d + e, b, d + e - m / 2, b, d + e - m, "L", b, d + f, "C", b, d + f / 2, b + f / 2, d, b + f, d, "Z"]
    }

    var o = i.Axis, x = i.Chart, v = i.Color, w = i.Point, s = i.Pointer, H = i.Legend, y = i.Series, F = i.VMLRenderer,
        B = i.SVGRenderer.prototype.symbols, l = i.each, r = i.extend, t = i.extendClass, n = i.merge, j = i.pick, G = i.numberFormat, C = i.getOptions(), k = i.seriesTypes, p = C.plotOptions, q = i.wrap, u = function () {
        };
    r(C.lang, {zoomIn: "Zoom in", zoomOut: "Zoom out"});
    C.mapNavigation = {buttonOptions: {alignTo: "plotBox", align: "left", verticalAlign: "top", x: 0, width: 18, height: 18, style: {fontSize: "15px", fontWeight: "bold", textAlign: "center"}, theme: {"stroke-width": 1}}, buttons: {zoomIn: {onclick: function () {
        this.mapZoom(0.5)
    }, text: "+", y: 0}, zoomOut: {onclick: function () {
        this.mapZoom(2)
    },
        text: "-", y: 28}}};
    i.splitPath = function (a) {
        var b, a = a.replace(/([A-Za-z])/g, " $1 "), a = a.replace(/^\s*/, "").replace(/\s*$/, ""), a = a.split(/[ ,]+/);
        for (b = 0; b < a.length; b++)/[a-zA-Z]/.test(a[b]) || (a[b] = parseFloat(a[b]));
        return a
    };
    i.maps = {};
    q(o.prototype, "getSeriesExtremes", function (a) {
        var b = this.isXAxis, d, c, e = [];
        b && l(this.series, function (a, b) {
            if (a.useMapGeometry)e[b] = a.xData, a.xData = []
        });
        a.call(this);
        if (b)d = j(this.dataMin, Number.MAX_VALUE), c = j(this.dataMax, Number.MIN_VALUE), l(this.series, function (a, b) {
            if (a.useMapGeometry)d =
                Math.min(d, j(a.minX, d)), c = Math.max(c, j(a.maxX, d)), a.xData = e[b]
        }), this.dataMin = d, this.dataMax = c
    });
    q(o.prototype, "setAxisTranslation", function (a) {
        var b = this.chart, d = b.plotWidth / b.plotHeight, c = b.xAxis[0];
        a.call(this);
        if (b.options.chart.preserveAspectRatio && this.coll === "yAxis" && c.transA !== void 0 && (this.transA = c.transA = Math.min(this.transA, c.transA), a = b.mapRatio = d / ((c.max - c.min) / (this.max - this.min)), c = a < 1 ? this : c, a = (c.max - c.min) * c.transA, c.pixelPadding = c.len - a, c.minPixelPadding = c.pixelPadding / 2, a = c.fixTo))a =
            a[1] - c.toValue(a[0], !0), a *= c.transA, Math.abs(a) > c.minPixelPadding && (a = 0), c.minPixelPadding -= a
    });
    q(o.prototype, "render", function (a) {
        a.call(this);
        this.fixTo = null
    });
    r(s.prototype, {onContainerDblClick: function (a) {
        var b = this.chart, a = this.normalize(a);
        b.options.mapNavigation.enableDoubleClickZoomTo ? b.pointer.inClass(a.target, "highcharts-tracker") && b.hoverPoint.zoomTo() : b.isInsidePlot(a.chartX - b.plotLeft, a.chartY - b.plotTop) && b.mapZoom(0.5, b.xAxis[0].toValue(a.chartX), b.yAxis[0].toValue(a.chartY), a.chartX,
            a.chartY)
    }, onContainerMouseWheel: function (a) {
        var b = this.chart, d, a = this.normalize(a);
        d = a.detail || -(a.wheelDelta / 120);
        b.isInsidePlot(a.chartX - b.plotLeft, a.chartY - b.plotTop) && b.mapZoom(d > 0 ? 2 : 0.5, b.xAxis[0].toValue(a.chartX), b.yAxis[0].toValue(a.chartY), d > 0 ? void 0 : a.chartX, d > 0 ? void 0 : a.chartY)
    }});
    q(s.prototype, "init", function (a, b, d) {
        a.call(this, b, d);
        if (j(d.mapNavigation.enableTouchZoom, d.mapNavigation.enabled))this.pinchX = this.pinchHor = this.pinchY = this.pinchVert = !0
    });
    q(s.prototype, "pinchTranslate", function (a, b, d, c, e, f, g, h, m) {
        a.call(this, b, d, c, e, f, g, h, m);
        this.chart.options.chart.type === "map" && (a = f.scaleX > f.scaleY, this.pinchTranslateDirection(!a, c, e, f, g, h, m, a ? f.scaleX : f.scaleY))
    });
    var D = i.ColorAxis = function () {
        this.init.apply(this, arguments)
    };
    r(D.prototype, o.prototype);
    r(D.prototype, {defaultColorAxisOptions: {lineWidth: 0, gridLineWidth: 1, tickPixelInterval: 72, startOnTick: !0, endOnTick: !0, offset: 0, marker: {animation: {duration: 50}, color: "gray", width: 0.01}, labels: {overflow: "justify"}, minColor: "#EFEFFF", maxColor: "#102d4c"},
        init: function (a, b) {
            var d = a.options.legend.layout !== "vertical", c;
            c = n(this.defaultColorAxisOptions, {side: d ? 2 : 1, reversed: !d}, b, {isX: d, opposite: !d, showEmpty: !1, title: null});
            o.prototype.init.call(this, a, c);
            b.dataClasses && this.initDataClasses(b);
            this.isXAxis = !0;
            this.horiz = d
        }, initDataClasses: function (a) {
            var b = this.chart, d, c = 0, e = this.options;
            this.dataClasses = d = [];
            l(a.dataClasses, function (f, g) {
                var h, f = n(f);
                d.push(f);
                if (!f.color)e.dataClassColor === "category" ? (h = b.options.colors, f.color = h[c++], c === h.length &&
                    (c = 0)) : f.color = A(v(e.minColor), v(e.maxColor), g / (a.dataClasses.length - 1))
            })
        }, setOptions: function (a) {
            o.prototype.setOptions.call(this, a);
            this.options.crosshair = this.options.marker;
            this.stops = a.stops || [
                [0, this.options.minColor],
                [1, this.options.maxColor]
            ];
            l(this.stops, function (a) {
                a.color = v(a[1])
            });
            this.coll = "colorAxis"
        }, setAxisSize: function () {
            var a = this.legendSymbol, b = this.chart;
            if (a)this.left = a.x, this.top = a.y, this.width = a.width, this.height = a.height, this.right = b.chartWidth - this.left - this.width, this.bottom =
                b.chartHeight - this.top - this.height, this.len = this.horiz ? this.width : this.height, this.pos = this.horiz ? this.left : this.top
        }, toColor: function (a, b) {
            var d, c = this.stops, e, f = this.dataClasses, g, h;
            if (f)for (h = f.length; h--;) {
                if (g = f[h], e = g.from, c = g.to, (e === void 0 || a >= e) && (c === void 0 || a <= c)) {
                    d = g.color;
                    if (b)b.dataClass = h;
                    break
                }
            } else {
                this.isLog && (a = this.val2lin(a));
                d = 1 - (this.max - a) / (this.max - this.min);
                for (h = c.length; h--;)if (d > c[h][0])break;
                e = c[h] || c[h + 1];
                c = c[h + 1] || e;
                d = 1 - (c[0] - d) / (c[0] - e[0] || 1);
                d = A(e.color, c.color, d)
            }
            return d
        },
        getOffset: function () {
            var a = this.legendGroup;
            if (a && (o.prototype.getOffset.call(this), !this.axisGroup.parentGroup))this.axisGroup.add(a), this.gridGroup.add(a), this.labelGroup.add(a), this.added = !0
        }, setLegendColor: function () {
            var a, b = this.options;
            a = this.horiz ? [0, 0, 1, 0] : [0, 0, 0, 1];
            this.legendColor = {linearGradient: {x1: a[0], y1: a[1], x2: a[2], y2: a[3]}, stops: b.stops || [
                [0, b.minColor],
                [1, b.maxColor]
            ]}
        }, drawLegendSymbol: function (a, b) {
            var d = a.padding, c = a.options, e = this.horiz, f = j(c.symbolWidth, e ? 200 : 12), g = j(c.symbolHeight,
                e ? 12 : 200), c = j(c.labelPadding, e ? 10 : 30);
            this.setLegendColor();
            b.legendSymbol = this.chart.renderer.rect(0, a.baseline - 11, f, g).attr({zIndex: 1}).add(b.legendGroup);
            b.legendSymbol.getBBox();
            this.legendItemWidth = f + d + (e ? 0 : c);
            this.legendItemHeight = g + d + (e ? c : 0)
        }, setState: u, visible: !0, setVisible: u, getSeriesExtremes: function () {
            var a;
            if (this.series.length)a = this.series[0], this.dataMin = a.valueMin, this.dataMax = a.valueMax
        }, drawCrosshair: function (a, b) {
            var d = !this.cross, c = b && b.plotX, e = b && b.plotY, f, g = this.pos, h = this.len;
            if (b)f = this.toPixels(b.value), f < g ? f = g - 2 : f > g + h && (f = g + h + 2), b.plotX = f, b.plotY = this.len - f, o.prototype.drawCrosshair.call(this, a, b), b.plotX = c, b.plotY = e, !d && this.cross && this.cross.attr({fill: this.crosshair.color}).add(this.labelGroup)
        }, getPlotLinePath: function (a, b, d, c, e) {
            return e ? this.horiz ? ["M", e - 4, this.top - 6, "L", e + 4, this.top - 6, e, this.top, "Z"] : ["M", this.left, e, "L", this.left - 6, e + 6, this.left - 6, e - 6, "Z"] : o.prototype.getPlotLinePath.call(this, a, b, d, c)
        }, update: function (a, b) {
            o.prototype.update.call(this, a, b);
            this.legendItem && (this.setLegendColor(), this.chart.legend.colorizeItem(this, !0))
        }, getDataClassLegendSymbols: function () {
            var a = this, b = this.chart, d = [], c = b.options.legend, e = c.valueDecimals, f = c.valueSuffix || "", g;
            l(this.dataClasses, function (c, m) {
                var z = !0, j = c.from, k = c.to;
                g = "";
                j === void 0 ? g = "< " : k === void 0 && (g = "> ");
                j !== void 0 && (g += G(j, e) + f);
                j !== void 0 && k !== void 0 && (g += " - ");
                k !== void 0 && (g += G(k, e) + f);
                d.push(i.extend({chart: b, name: g, options: {}, drawLegendSymbol: i.LegendSymbolMixin.drawRectangle, visible: !0,
                    setState: u, setVisible: function () {
                        z = this.visible = !z;
                        l(a.series, function (a) {
                            l(a.points, function (a) {
                                a.dataClass === m && a.setVisible(z)
                            })
                        });
                        b.legend.colorizeItem(this, z)
                    }}, c))
            });
            return d
        }});
    q(H.prototype, "getAllItems", function (a) {
        var b = [], d = this.chart.colorAxis[0];
        d && (d.options.dataClasses ? b = b.concat(d.getDataClassLegendSymbols()) : b.push(d), l(d.series, function (a) {
            a.options.showInLegend = !1
        }));
        return b.concat(a.call(this))
    });
    r(x.prototype, {renderMapNavigation: function () {
        var a = this, b = this.options.mapNavigation,
            d = b.buttons, c, e, f, g, h = function () {
                this.handler.call(a)
            };
        if (j(b.enableButtons, b.enabled) && !a.renderer.forExport)for (c in d)if (d.hasOwnProperty(c))f = n(b.buttonOptions, d[c]), e = f.theme, g = e.states, e = a.renderer.button(f.text, 0, 0, h, e, g && g.hover, g && g.select, 0, c === "zoomIn" ? "topbutton" : "bottombutton").attr({width: f.width, height: f.height, title: a.options.lang[c], zIndex: 5}).css(f.style).add(), e.handler = f.onclick, e.align(r(f, {width: e.width, height: 2 * e.height}), null, f.alignTo)
    }, fitToBox: function (a, b) {
        l([
            ["x", "width"],
            ["y", "height"]
        ], function (d) {
            var c = d[0], d = d[1];
            a[c] + a[d] > b[c] + b[d] && (a[d] > b[d] ? (a[d] = b[d], a[c] = b[c]) : a[c] = b[c] + b[d] - a[d]);
            a[d] > b[d] && (a[d] = b[d]);
            a[c] < b[c] && (a[c] = b[c])
        });
        return a
    }, mapZoom: function (a, b, d, c, e) {
        var f = this.xAxis[0], g = f.max - f.min, h = j(b, f.min + g / 2), m = g * a, g = this.yAxis[0], i = g.max - g.min, k = j(d, g.min + i / 2);
        i *= a;
        h = this.fitToBox({x: h - m * (c ? (c - f.pos) / f.len : 0.5), y: k - i * (e ? (e - g.pos) / g.len : 0.5), width: m, height: i}, {x: f.dataMin, y: g.dataMin, width: f.dataMax - f.dataMin, height: g.dataMax - g.dataMin});
        if (c)f.fixTo =
            [c - f.pos, b];
        if (e)g.fixTo = [e - g.pos, d];
        a !== void 0 ? (f.setExtremes(h.x, h.x + h.width, !1), g.setExtremes(h.y, h.y + h.height, !1)) : (f.setExtremes(void 0, void 0, !1), g.setExtremes(void 0, void 0, !1));
        this.redraw()
    }});
    q(x.prototype, "getAxes", function (a) {
        var b = this.options.colorAxis;
        a.call(this);
        this.colorAxis = [];
        b && new D(this, b)
    });
    q(x.prototype, "render", function (a) {
        var b = this, d = b.options.mapNavigation;
        a.call(b);
        b.renderMapNavigation();
        (j(d.enableDoubleClickZoom, d.enabled) || d.enableDoubleClickZoomTo) && i.addEvent(b.container,
            "dblclick", function (a) {
                b.pointer.onContainerDblClick(a)
            });
        j(d.enableMouseWheelZoom, d.enabled) && i.addEvent(b.container, document.onmousewheel === void 0 ? "DOMMouseScroll" : "mousewheel", function (a) {
            b.pointer.onContainerMouseWheel(a);
            return!1
        })
    });
    p.map = n(p.scatter, {allAreas: !0, animation: !1, nullColor: "#F8F8F8", borderColor: "silver", borderWidth: 1, marker: null, stickyTracking: !1, dataLabels: {format: "{point.value}", verticalAlign: "middle"}, turboThreshold: 0, tooltip: {followPointer: !0, pointFormat: "{point.name}: {point.value}<br/>"},
        states: {normal: {animation: !0}, hover: {brightness: 0.2}}});
    s = t(w, {applyOptions: function (a, b) {
        var d = w.prototype.applyOptions.call(this, a, b), c = this.series, e = c.options, f = e.joinBy;
        if (e.mapData)if (e = f ? c.getMapData(f, d[f]) : e.mapData[d.x]) {
            if (c.xyFromShape)d.x = e._midX, d.y = e._midY;
            r(d, e)
        } else d.value = d.value || null;
        return d
    }, setVisible: function (a) {
        var b = this, d = a ? "show" : "hide";
        l(["graphic", "dataLabel"], function (a) {
            if (b[a])b[a][d]()
        })
    }, onMouseOver: function (a) {
        clearTimeout(this.colorInterval);
        w.prototype.onMouseOver.call(this,
            a)
    }, onMouseOut: function () {
        var a = this, b = +new Date, d = v(a.options.color), c = v(a.pointAttr.hover.fill), e = a.series.options.states.normal.animation, f = e && (e.duration || 500);
        if (f && d.rgba.length === 4 && c.rgba.length === 4 && a.state !== "select")delete a.pointAttr[""].fill, clearTimeout(a.colorInterval), a.colorInterval = setInterval(function () {
            var e = (new Date - b) / f, h = a.graphic;
            e > 1 && (e = 1);
            h && h.attr("fill", A(c, d, e));
            e >= 1 && clearTimeout(a.colorInterval)
        }, 13);
        w.prototype.onMouseOut.call(a)
    }, zoomTo: function () {
        var a = this.series;
        a.xAxis.setExtremes(this._minX, this._maxX, !1);
        a.yAxis.setExtremes(this._minY, this._maxY, !1);
        a.chart.redraw()
    }});
    k.map = t(k.scatter, {type: "map", pointAttrToOptions: {stroke: "borderColor", "stroke-width": "borderWidth", fill: "color", dashstyle: "dashStyle"}, pointClass: s, pointArrayMap: ["value"], axisTypes: ["xAxis", "yAxis", "colorAxis"], optionalAxis: "colorAxis", trackerGroups: ["group", "markerGroup", "dataLabelsGroup"], getSymbol: u, supportsDrilldown: !0, getExtremesFromAll: !0, useMapGeometry: !0, parallelArrays: ["x", "y",
        "value"], getBox: function (a) {
        var b = Number.MIN_VALUE, d = Number.MAX_VALUE, c = Number.MIN_VALUE, e = Number.MAX_VALUE, f;
        l(a || [], function (a) {
            if (a.path) {
                if (typeof a.path === "string")a.path = i.splitPath(a.path);
                var h = a.path || [], m = h.length, k = !1, j = Number.MIN_VALUE, l = Number.MAX_VALUE, o = Number.MIN_VALUE, n = Number.MAX_VALUE;
                if (!a._foundBox) {
                    for (; m--;)typeof h[m] === "number" && !isNaN(h[m]) && (k ? (j = Math.max(j, h[m]), l = Math.min(l, h[m])) : (o = Math.max(o, h[m]), n = Math.min(n, h[m])), k = !k);
                    a._midX = l + (j - l) * (a.middleX || 0.5);
                    a._midY = n +
                        (o - n) * (a.middleY || 0.5);
                    a._maxX = j;
                    a._minX = l;
                    a._maxY = o;
                    a._minY = n;
                    a._foundBox = !0
                }
                b = Math.max(b, a._maxX);
                d = Math.min(d, a._minX);
                c = Math.max(c, a._maxY);
                e = Math.min(e, a._minY);
                f = !0
            }
        });
        if (f)this.minY = Math.min(e, j(this.minY, Number.MAX_VALUE)), this.maxY = Math.max(c, j(this.maxY, Number.MIN_VALUE)), this.minX = Math.min(d, j(this.minX, Number.MAX_VALUE)), this.maxX = Math.max(b, j(this.maxX, Number.MIN_VALUE))
    }, getExtremes: function () {
        y.prototype.getExtremes.call(this, this.valueData);
        this.chart.hasRendered && this.isDirtyData &&
        this.getBox(this.options.data);
        this.valueMin = this.dataMin;
        this.valueMax = this.dataMax;
        this.dataMin = this.minY;
        this.dataMax = this.maxY
    }, translatePath: function (a) {
        var b = !1, d = this.xAxis, c = this.yAxis, e = d.min, f = d.transA, d = d.minPixelPadding, g = c.min, h = c.transA, c = c.minPixelPadding, i, j = [];
        if (a)for (i = a.length; i--;)typeof a[i] === "number" ? (j[i] = b ? (a[i] - e) * f + d : (a[i] - g) * h + c, b = !b) : j[i] = a[i];
        return j
    }, setData: function (a, b) {
        var d = this.options, c = d.mapData, e = d.joinBy, f = [];
        this.getBox(a);
        this.getBox(c);
        d.allAreas && c && (a =
            a || [], e && l(a, function (a) {
            f.push(a[e])
        }), f = "|" + f.join("|") + "|", l(c, function (b) {
            (!e || f.indexOf("|" + b[e] + "|") === -1) && a.push(n(b, {value: null}))
        }));
        y.prototype.setData.call(this, a, b)
    }, getMapData: function (a, b) {
        var d = this.options.mapData, c = this.mapMap, e = d.length;
        if (!c)c = this.mapMap = {};
        if (c[b] !== void 0)return d[c[b]]; else if (b !== void 0)for (; e--;)if (d[e][a] === b)return c[b] = e, d[e]
    }, translateColors: function () {
        var a = this, b = this.options.nullColor, d = this.colorAxis;
        l(this.data, function (c) {
            var e = c.value;
            if (e = e ===
                null ? b : d ? d.toColor(e, c) : c.color || a.color)c.color = c.options.color = e
        })
    }, drawGraph: u, drawDataLabels: u, translate: function () {
        var a = this, b = a.xAxis, d = a.yAxis;
        a.generatePoints();
        l(a.data, function (c) {
            c.plotX = b.toPixels(c._midX, !0);
            c.plotY = d.toPixels(c._midY, !0);
            if (a.isDirtyData || a.chart.renderer.isVML)c.shapeType = "path", c.shapeArgs = {d: a.translatePath(c.path), "vector-effect": "non-scaling-stroke"}
        });
        a.translateColors()
    }, drawPoints: function () {
        var a = this.xAxis, b = this.yAxis, d, c = this.group, e = this.chart, f = e.renderer,
            g = function (a, b) {
                var c = a.dataMin, e = a.dataMax;
                return a.len * (1 - d) * ((a.min - a.minPixelPadding / a.transA - (c - (e - c) * (b - 1) / 2)) / ((e - c - a.max + a.min) * b))
            };
        if (!this.transformGroup)this.transformGroup = f.g().attr({scaleX: 1, scaleY: 1}).add(c);
        this.isDirtyData || f.isVML ? (this.group = this.transformGroup, k.column.prototype.drawPoints.apply(this), this.group = c, l(this.points, function (a) {
            e.hasRendered && a.graphic && a.graphic.attr("fill", a.options.color)
        }), this.transA = a.transA) : (d = a.transA / this.transA, d > 0.99 && d < 1.01 ? (b = a = 0, d = 1) :
            (a = g(a, Math.max(1, this.chart.mapRatio)), b = g(b, 1 / Math.min(1, this.chart.mapRatio))), this.transformGroup.animate({translateX: a, translateY: b, scaleX: d, scaleY: d}));
        y.prototype.drawDataLabels.call(this)
    }, render: function () {
        var a = this, b = y.prototype.render;
        a.chart.renderer.isVML && a.data.length > 3E3 ? setTimeout(function () {
            b.call(a)
        }) : b.call(a)
    }, animate: function (a) {
        var b = this.options.animation, d = this.group, c = this.xAxis, e = this.yAxis, f = c.pos, g = e.pos;
        if (this.chart.renderer.isSVG)b === !0 && (b = {duration: 1E3}), a ? d.attr({translateX: f +
            c.len / 2, translateY: g + e.len / 2, scaleX: 0.001, scaleY: 0.001}) : (d.animate({translateX: f, translateY: g, scaleX: 1, scaleY: 1}, b), this.animate = null)
    }, animateDrilldown: function (a) {
        var b = this.chart.plotBox, d = this.chart.drilldownLevels[this.chart.drilldownLevels.length - 1], c = d.bBox, e = this.chart.options.drilldown.animation;
        if (!a)a = Math.min(c.width / b.width, c.height / b.height), d.shapeArgs = {scaleX: a, scaleY: a, translateX: c.x, translateY: c.y}, l(this.points, function (a) {
            a.graphic.attr(d.shapeArgs).animate({scaleX: 1, scaleY: 1,
                translateX: 0, translateY: 0}, e)
        }), this.animate = null
    }, drawLegendSymbol: i.LegendSymbolMixin.drawRectangle, animateDrillupFrom: function (a) {
        k.column.prototype.animateDrillupFrom.call(this, a)
    }, animateDrillupTo: function (a) {
        k.column.prototype.animateDrillupTo.call(this, a)
    }});
    p.mapline = n(p.map, {lineWidth: 1, fillColor: "none"});
    k.mapline = t(k.map, {type: "mapline", pointAttrToOptions: {stroke: "color", "stroke-width": "lineWidth", fill: "fillColor"}, drawLegendSymbol: k.line.prototype.drawLegendSymbol});
    p.mappoint = n(p.scatter,
        {dataLabels: {enabled: !0, format: "{point.name}", color: "black", style: {textShadow: "0 0 5px white"}}});
    k.mappoint = t(k.scatter, {type: "mappoint"});
    if (k.bubble)p.mapbubble = n(p.bubble, {tooltip: {pointFormat: "{point.name}: {point.z}"}}), k.mapbubble = t(k.bubble, {pointClass: t(w, {applyOptions: s.prototype.applyOptions}), xyFromShape: !0, type: "mapbubble", pointArrayMap: ["z"], getMapData: k.map.prototype.getMapData, getBox: k.map.prototype.getBox, setData: k.map.prototype.setData});
    B.topbutton = function (a, b, d, c, e) {
        return E(e,
            a, b, d, c, e.r, e.r, 0, 0)
    };
    B.bottombutton = function (a, b, d, c, e) {
        return E(e, a, b, d, c, 0, 0, e.r, e.r)
    };
    i.Renderer === F && l(["topbutton", "bottombutton"], function (a) {
        F.prototype.symbols[a] = B[a]
    });
    i.Map = function (a, b) {
        var d = {endOnTick: !1, gridLineWidth: 0, lineWidth: 0, minPadding: 0, maxPadding: 0, startOnTick: !1, title: null, tickPositions: []}, c;
        c = a.series;
        a.series = null;
        a = n({chart: {panning: "xy", type: "map"}, xAxis: d, yAxis: n(d, {reversed: !0})}, a, {chart: {inverted: !1, alignTicks: !1, preserveAspectRatio: !0}});
        a.series = c;
        return new x(a,
            b)
    }
})(Highcharts);
