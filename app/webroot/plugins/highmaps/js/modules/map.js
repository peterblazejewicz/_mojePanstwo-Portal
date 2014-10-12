/*
 Highmaps JS v1.0.4 (2014-09-02)
 Highmaps as a plugin for Highcharts 4.0.1 or Highstock 2.0.1

 (c) 2011-2014 Torstein Honsi

 License: www.highcharts.com/license
 */
(function (j) {
    function F(a, b, c, d, e, f, g, h, l) {
        a = a["stroke-width"] % 2 / 2;
        b -= a;
        c -= a;
        return ["M", b + f, c, "L", b + d - g, c, "C", b + d - g / 2, c, b + d, c + g / 2, b + d, c + g, "L", b + d, c + e - h, "C", b + d, c + e - h / 2, b + d - h / 2, c + e, b + d - h, c + e, "L", b + l, c + e, "C", b + l / 2, c + e, b, c + e - l / 2, b, c + e - l, "L", b, c + f, "C", b, c + f / 2, b + f / 2, c, b + f, c, "Z"]
    }

    var o = j.Axis, z = j.Chart, t = j.Color, A = j.Point, v = j.Pointer, D = j.Legend, E = j.LegendSymbolMixin, J = j.Renderer, w = j.Series, B = j.SVGRenderer, G = j.VMLRenderer, H = j.addEvent, i = j.each, q = j.extend, u = j.extendClass, m = j.merge, n = j.pick, I = j.numberFormat,
        x = j.getOptions(), k = j.seriesTypes, r = x.plotOptions, p = j.wrap, s = function () {
        };
    p(o.prototype, "getSeriesExtremes", function (a) {
        var b = this.isXAxis, c, d, e = [], f;
        b && i(this.series, function (a, b) {
            if (a.useMapGeometry)e[b] = a.xData, a.xData = []
        });
        a.call(this);
        if (b && (c = n(this.dataMin, Number.MAX_VALUE), d = n(this.dataMax, Number.MIN_VALUE), i(this.series, function (a, b) {
                if (a.useMapGeometry)c = Math.min(c, n(a.minX, c)), d = Math.max(d, n(a.maxX, c)), a.xData = e[b], f = !0
            }), f))this.dataMin = c, this.dataMax = d
    });
    p(o.prototype, "setAxisTranslation",
        function (a) {
            var b = this.chart, c = b.plotWidth / b.plotHeight, d = b.xAxis[0];
            a.call(this);
            if (b.options.chart.preserveAspectRatio && this.coll === "yAxis" && d.transA !== void 0 && (this.transA = d.transA = Math.min(this.transA, d.transA), a = c / ((d.max - d.min) / (this.max - this.min)), d = a < 1 ? this : d, a = (d.max - d.min) * d.transA, d.pixelPadding = d.len - a, d.minPixelPadding = d.pixelPadding / 2, a = d.fixTo)) {
                a = a[1] - d.toValue(a[0], !0);
                a *= d.transA;
                if (Math.abs(a) > d.minPixelPadding || d.min === d.dataMin && d.max === d.dataMax)a = 0;
                d.minPixelPadding -= a
            }
        });
    p(o.prototype,
        "render", function (a) {
            a.call(this);
            this.fixTo = null
        });
    var C = j.ColorAxis = function () {
        this.isColorAxis = !0;
        this.init.apply(this, arguments)
    };
    q(C.prototype, o.prototype);
    q(C.prototype, {
        defaultColorAxisOptions: {
            lineWidth: 0,
            gridLineWidth: 1,
            tickPixelInterval: 72,
            startOnTick: !0,
            endOnTick: !0,
            offset: 0,
            marker: {animation: {duration: 50}, color: "gray", width: 0.01},
            labels: {overflow: "justify"},
            minColor: "#EFEFFF",
            maxColor: "#003875",
            tickLength: 5
        }, init: function (a, b) {
            var c = a.options.legend.layout !== "vertical", d;
            d = m(this.defaultColorAxisOptions,
                {side: c ? 2 : 1, reversed: !c}, b, {isX: c, opposite: !c, showEmpty: !1, title: null, isColor: !0});
            o.prototype.init.call(this, a, d);
            b.dataClasses && this.initDataClasses(b);
            this.initStops(b);
            this.isXAxis = !0;
            this.horiz = c;
            this.zoomEnabled = !1
        }, tweenColors: function (a, b, c) {
            var d = b.rgba[3] !== 1 || a.rgba[3] !== 1;
            return (d ? "rgba(" : "rgb(") + Math.round(b.rgba[0] + (a.rgba[0] - b.rgba[0]) * (1 - c)) + "," + Math.round(b.rgba[1] + (a.rgba[1] - b.rgba[1]) * (1 - c)) + "," + Math.round(b.rgba[2] + (a.rgba[2] - b.rgba[2]) * (1 - c)) + (d ? "," + (b.rgba[3] + (a.rgba[3] - b.rgba[3]) *
            (1 - c)) : "") + ")"
        }, initDataClasses: function (a) {
            var b = this, c = this.chart, d, e = 0, f = this.options, g = a.dataClasses.length;
            this.dataClasses = d = [];
            this.legendItems = [];
            i(a.dataClasses, function (a, l) {
                var i, a = m(a);
                d.push(a);
                if (!a.color)f.dataClassColor === "category" ? (i = c.options.colors, a.color = i[e++], e === i.length && (e = 0)) : a.color = b.tweenColors(t(f.minColor), t(f.maxColor), g < 2 ? 0.5 : l / (g - 1))
            })
        }, initStops: function (a) {
            this.stops = a.stops || [[0, this.options.minColor], [1, this.options.maxColor]];
            i(this.stops, function (a) {
                a.color =
                    t(a[1])
            })
        }, setOptions: function (a) {
            o.prototype.setOptions.call(this, a);
            this.options.crosshair = this.options.marker;
            this.coll = "colorAxis"
        }, setAxisSize: function () {
            var a = this.legendSymbol, b = this.chart, c, d, e;
            if (a)this.left = c = a.attr("x"), this.top = d = a.attr("y"), this.width = e = a.attr("width"), this.height = a = a.attr("height"), this.right = b.chartWidth - c - e, this.bottom = b.chartHeight - d - a, this.len = this.horiz ? e : a, this.pos = this.horiz ? c : d
        }, toColor: function (a, b) {
            var c, d = this.stops, e, f = this.dataClasses, g, h;
            if (f)for (h = f.length; h--;) {
                if (g =
                        f[h], e = g.from, d = g.to, (e === void 0 || a >= e) && (d === void 0 || a <= d)) {
                    c = g.color;
                    if (b)b.dataClass = h;
                    break
                }
            } else {
                this.isLog && (a = this.val2lin(a));
                c = 1 - (this.max - a) / (this.max - this.min || 1);
                for (h = d.length; h--;)if (c > d[h][0])break;
                e = d[h] || d[h + 1];
                d = d[h + 1] || e;
                c = 1 - (d[0] - c) / (d[0] - e[0] || 1);
                c = this.tweenColors(e.color, d.color, c)
            }
            return c
        }, getOffset: function () {
            var a = this.legendGroup, b = this.chart.axisOffset[this.side];
            if (a) {
                o.prototype.getOffset.call(this);
                if (!this.axisGroup.parentGroup)this.axisGroup.add(a), this.gridGroup.add(a),
                    this.labelGroup.add(a), this.added = !0;
                this.chart.axisOffset[this.side] = b
            }
        }, setLegendColor: function () {
            var a, b = this.options;
            a = this.horiz ? [0, 0, 1, 0] : [0, 0, 0, 1];
            this.legendColor = {
                linearGradient: {x1: a[0], y1: a[1], x2: a[2], y2: a[3]},
                stops: b.stops || [[0, b.minColor], [1, b.maxColor]]
            }
        }, drawLegendSymbol: function (a, b) {
            var c = a.padding, d = a.options, e = this.horiz, f = n(d.symbolWidth, e ? 200 : 12), g = n(d.symbolHeight, e ? 12 : 200), h = n(d.labelPadding, e ? 16 : 30), d = n(d.itemDistance, 10);
            this.setLegendColor();
            b.legendSymbol = this.chart.renderer.rect(0,
                a.baseline - 11, f, g).attr({zIndex: 1}).add(b.legendGroup);
            b.legendSymbol.getBBox();
            this.legendItemWidth = f + c + (e ? d : h);
            this.legendItemHeight = g + c + (e ? h : 0)
        }, setState: s, visible: !0, setVisible: s, getSeriesExtremes: function () {
            var a;
            if (this.series.length)a = this.series[0], this.dataMin = a.valueMin, this.dataMax = a.valueMax
        }, drawCrosshair: function (a, b) {
            var c = !this.cross, d = b && b.plotX, e = b && b.plotY, f, g = this.pos, h = this.len;
            if (b)f = this.toPixels(b.value), f < g ? f = g - 2 : f > g + h && (f = g + h + 2), b.plotX = f, b.plotY = this.len - f, o.prototype.drawCrosshair.call(this,
                a, b), b.plotX = d, b.plotY = e, !c && this.cross && this.cross.attr({fill: this.crosshair.color}).add(this.labelGroup)
        }, getPlotLinePath: function (a, b, c, d, e) {
            return e ? this.horiz ? ["M", e - 4, this.top - 6, "L", e + 4, this.top - 6, e, this.top, "Z"] : ["M", this.left, e, "L", this.left - 6, e + 6, this.left - 6, e - 6, "Z"] : o.prototype.getPlotLinePath.call(this, a, b, c, d)
        }, update: function (a, b) {
            i(this.series, function (a) {
                a.isDirtyData = !0
            });
            o.prototype.update.call(this, a, b);
            this.legendItem && (this.setLegendColor(), this.chart.legend.colorizeItem(this,
                !0))
        }, getDataClassLegendSymbols: function () {
            var a = this, b = this.chart, c = this.legendItems, d = b.options.legend, e = d.valueDecimals, f = d.valueSuffix || "", g;
            c.length || i(this.dataClasses, function (d, l) {
                var j = !0, y = d.from, k = d.to;
                g = "";
                y === void 0 ? g = "< " : k === void 0 && (g = "> ");
                y !== void 0 && (g += I(y, e) + f);
                y !== void 0 && k !== void 0 && (g += " - ");
                k !== void 0 && (g += I(k, e) + f);
                c.push(q({
                    chart: b,
                    name: g,
                    options: {},
                    drawLegendSymbol: E.drawRectangle,
                    visible: !0,
                    setState: s,
                    setVisible: function () {
                        j = this.visible = !j;
                        i(a.series, function (a) {
                            i(a.points,
                                function (a) {
                                    a.dataClass === l && a.setVisible(j)
                                })
                        });
                        b.legend.colorizeItem(this, j)
                    }
                }, d))
            });
            return c
        }, name: ""
    });
    i(["fill", "stroke"], function (a) {
        HighchartsAdapter.addAnimSetter(a, function (b) {
            b.elem.attr(a, C.prototype.tweenColors(t(b.start), t(b.end), b.pos))
        })
    });
    p(z.prototype, "getAxes", function (a) {
        var b = this.options.colorAxis;
        a.call(this);
        this.colorAxis = [];
        b && new C(this, b)
    });
    p(D.prototype, "getAllItems", function (a) {
        var b = [], c = this.chart.colorAxis[0];
        c && (c.options.dataClasses ? b = b.concat(c.getDataClassLegendSymbols()) :
            b.push(c), i(c.series, function (a) {
            a.options.showInLegend = !1
        }));
        return b.concat(a.call(this))
    });
    D = {
        pointAttrToOptions: {
            stroke: "borderColor",
            "stroke-width": "borderWidth",
            fill: "color",
            dashstyle: "dashStyle"
        },
        pointArrayMap: ["value"],
        axisTypes: ["xAxis", "yAxis", "colorAxis"],
        optionalAxis: "colorAxis",
        trackerGroups: ["group", "markerGroup", "dataLabelsGroup"],
        getSymbol: s,
        parallelArrays: ["x", "y", "value"],
        colorKey: "value",
        translateColors: function () {
            var a = this, b = this.options.nullColor, c = this.colorAxis, d = this.colorKey;
            i(this.data, function (e) {
                var f = e[d];
                if (f = f === null ? b : c && f !== void 0 ? c.toColor(f, e) : e.color || a.color)e.color = f
            })
        }
    };
    p(B.prototype, "buildText", function (a, b) {
        var c = b.styles && b.styles.HcTextStroke;
        a.call(this, b);
        c && b.applyTextStroke && b.applyTextStroke(c)
    });
    B.prototype.Element.prototype.applyTextStroke = function (a) {
        var b = this.element, c, d, a = a.split(" ");
        c = b.getElementsByTagName("tspan");
        d = b.firstChild;
        this.ySetter = this.xSetter;
        i([].slice.call(c), function (c, f) {
            var g;
            f === 0 && (c.setAttribute("x", b.getAttribute("x")),
            (f = b.getAttribute("y")) !== null && c.setAttribute("y", f));
            g = c.cloneNode(1);
            g.setAttribute("stroke", a[1]);
            g.setAttribute("stroke-width", a[0]);
            g.setAttribute("stroke-linejoin", "round");
            b.insertBefore(g, d)
        })
    };
    q(z.prototype, {
        renderMapNavigation: function () {
            var a = this, b = this.options.mapNavigation, c = b.buttons, d, e, f, g, h = function () {
                this.handler.call(a)
            };
            if (n(b.enableButtons, b.enabled) && !a.renderer.forExport)for (d in c)if (c.hasOwnProperty(d))f = m(b.buttonOptions, c[d]), e = f.theme, g = e.states, e = a.renderer.button(f.text,
                0, 0, h, e, g && g.hover, g && g.select, 0, d === "zoomIn" ? "topbutton" : "bottombutton").attr({
                    width: f.width,
                    height: f.height,
                    title: a.options.lang[d],
                    zIndex: 5
                }).css(f.style).add(), e.handler = f.onclick, e.align(q(f, {
                width: e.width,
                height: 2 * e.height
            }), null, f.alignTo)
        }, fitToBox: function (a, b) {
            i([["x", "width"], ["y", "height"]], function (c) {
                var d = c[0], c = c[1];
                a[d] + a[c] > b[d] + b[c] && (a[c] > b[c] ? (a[c] = b[c], a[d] = b[d]) : a[d] = b[d] + b[c] - a[c]);
                a[c] > b[c] && (a[c] = b[c]);
                a[d] < b[d] && (a[d] = b[d])
            });
            return a
        }, mapZoom: function (a, b, c, d, e) {
            var f =
                this.xAxis[0], g = f.max - f.min, h = n(b, f.min + g / 2), l = g * a, g = this.yAxis[0], i = g.max - g.min, y = n(c, g.min + i / 2);
            i *= a;
            h = this.fitToBox({
                x: h - l * (d ? (d - f.pos) / f.len : 0.5),
                y: y - i * (e ? (e - g.pos) / g.len : 0.5),
                width: l,
                height: i
            }, {x: f.dataMin, y: g.dataMin, width: f.dataMax - f.dataMin, height: g.dataMax - g.dataMin});
            if (d)f.fixTo = [d - f.pos, b];
            if (e)g.fixTo = [e - g.pos, c];
            a !== void 0 ? (f.setExtremes(h.x, h.x + h.width, !1), g.setExtremes(h.y, h.y + h.height, !1)) : (f.setExtremes(void 0, void 0, !1), g.setExtremes(void 0, void 0, !1));
            this.redraw()
        }
    });
    p(z.prototype,
        "render", function (a) {
            var b = this, c = b.options.mapNavigation;
            b.renderMapNavigation();
            a.call(b);
            (n(c.enableDoubleClickZoom, c.enabled) || c.enableDoubleClickZoomTo) && H(b.container, "dblclick", function (a) {
                b.pointer.onContainerDblClick(a)
            });
            n(c.enableMouseWheelZoom, c.enabled) && H(b.container, document.onmousewheel === void 0 ? "DOMMouseScroll" : "mousewheel", function (a) {
                b.pointer.onContainerMouseWheel(a);
                return !1
            })
        });
    q(v.prototype, {
        onContainerDblClick: function (a) {
            var b = this.chart, a = this.normalize(a);
            b.options.mapNavigation.enableDoubleClickZoomTo ?
            b.pointer.inClass(a.target, "highcharts-tracker") && b.hoverPoint.zoomTo() : b.isInsidePlot(a.chartX - b.plotLeft, a.chartY - b.plotTop) && b.mapZoom(0.5, b.xAxis[0].toValue(a.chartX), b.yAxis[0].toValue(a.chartY), a.chartX, a.chartY)
        }, onContainerMouseWheel: function (a) {
            var b = this.chart, c, a = this.normalize(a);
            c = a.detail || -(a.wheelDelta / 120);
            b.isInsidePlot(a.chartX - b.plotLeft, a.chartY - b.plotTop) && b.mapZoom(Math.pow(2, c), b.xAxis[0].toValue(a.chartX), b.yAxis[0].toValue(a.chartY), a.chartX, a.chartY)
        }
    });
    p(v.prototype, "init",
        function (a, b, c) {
            a.call(this, b, c);
            if (n(c.mapNavigation.enableTouchZoom, c.mapNavigation.enabled))this.pinchX = this.pinchHor = this.pinchY = this.pinchVert = this.hasZoom = !0
        });
    p(v.prototype, "pinchTranslate", function (a, b, c, d, e, f, g) {
        a.call(this, b, c, d, e, f, g);
        this.chart.options.chart.type === "map" && this.hasZoom && (a = d.scaleX > d.scaleY, this.pinchTranslateDirection(!a, b, c, d, e, f, g, a ? d.scaleX : d.scaleY))
    });
    r.map = m(r.scatter, {
        allAreas: !0,
        animation: !1,
        nullColor: "#F8F8F8",
        borderColor: "silver",
        borderWidth: 1,
        marker: null,
        stickyTracking: !1,
        dataLabels: {
            formatter: function () {
                return this.point.value
            },
            verticalAlign: "middle",
            crop: !1,
            overflow: !1,
            padding: 0,
            style: {color: "white", fontWeight: "bold", HcTextStroke: "3px rgba(0,0,0,0.5)"}
        },
        turboThreshold: 0,
        tooltip: {followPointer: !0, pointFormat: "{point.name}: {point.value}<br/>"},
        states: {normal: {animation: !0}, hover: {brightness: 0.2, halo: null}}
    });
    v = u(A, {
        applyOptions: function (a, b) {
            var c = A.prototype.applyOptions.call(this, a, b), d = this.series, e = d.joinBy;
            if (d.mapData)if (e = c[e[1]] !== void 0 && d.mapMap[c[e[1]]]) {
                if (d.xyFromShape)c.x =
                    e._midX, c.y = e._midY;
                q(c, e)
            } else c.value = c.value || null;
            return c
        }, setVisible: function (a) {
            var b = this, c = a ? "show" : "hide";
            i(["graphic", "dataLabel"], function (a) {
                if (b[a])b[a][c]()
            })
        }, onMouseOver: function (a) {
            clearTimeout(this.colorInterval);
            this.value !== null && A.prototype.onMouseOver.call(this, a)
        }, onMouseOut: function () {
            var a = this, b = +new Date, c = t(a.color), d = t(a.pointAttr.hover.fill), e = a.series.options.states.normal.animation, f = e && (e.duration || 500), g;
            if (f && c.rgba.length === 4 && d.rgba.length === 4 && a.state !== "select")g =
                a.pointAttr[""].fill, delete a.pointAttr[""].fill, clearTimeout(a.colorInterval), a.colorInterval = setInterval(function () {
                var e = (new Date - b) / f, g = a.graphic;
                e > 1 && (e = 1);
                g && g.attr("fill", C.prototype.tweenColors.call(0, d, c, e));
                e >= 1 && clearTimeout(a.colorInterval)
            }, 13);
            A.prototype.onMouseOut.call(a);
            if (g)a.pointAttr[""].fill = g
        }, zoomTo: function () {
            var a = this.series;
            a.xAxis.setExtremes(this._minX, this._maxX, !1);
            a.yAxis.setExtremes(this._minY, this._maxY, !1);
            a.chart.redraw()
        }
    });
    k.map = u(k.scatter, m(D, {
        type: "map",
        pointClass: v,
        supportsDrilldown: !0,
        getExtremesFromAll: !0,
        useMapGeometry: !0,
        forceDL: !0,
        getBox: function (a) {
            var b = Number.MAX_VALUE, c = -b, d = b, e = -b, f = b, g = b, h = this.xAxis, l = this.yAxis, k;
            i(a || [], function (a) {
                if (a.path) {
                    if (typeof a.path === "string")a.path = j.splitPath(a.path);
                    var h = a.path || [], i = h.length, l = !1, m = -b, o = b, q = -b, p = b, r = a.properties;
                    if (!a._foundBox) {
                        for (; i--;)typeof h[i] === "number" && !isNaN(h[i]) && (l ? (m = Math.max(m, h[i]), o = Math.min(o, h[i])) : (q = Math.max(q, h[i]), p = Math.min(p, h[i])), l = !l);
                        a._midX = o + (m - o) * (a.middleX ||
                        r && r["hc-middle-x"] || 0.5);
                        a._midY = p + (q - p) * (a.middleY || r && r["hc-middle-y"] || 0.5);
                        a._maxX = m;
                        a._minX = o;
                        a._maxY = q;
                        a._minY = p;
                        a.labelrank = n(a.labelrank, (m - o) * (q - p));
                        a._foundBox = !0
                    }
                    c = Math.max(c, a._maxX);
                    d = Math.min(d, a._minX);
                    e = Math.max(e, a._maxY);
                    f = Math.min(f, a._minY);
                    g = Math.min(a._maxX - a._minX, a._maxY - a._minY, g);
                    k = !0
                }
            });
            if (k) {
                this.minY = Math.min(f, n(this.minY, b));
                this.maxY = Math.max(e, n(this.maxY, -b));
                this.minX = Math.min(d, n(this.minX, b));
                this.maxX = Math.max(c, n(this.maxX, -b));
                if (h && h.options.minRange === void 0)h.minRange =
                    Math.min(5 * g, (this.maxX - this.minX) / 5, h.minRange || b);
                if (l && l.options.minRange === void 0)l.minRange = Math.min(5 * g, (this.maxY - this.minY) / 5, l.minRange || b)
            }
        },
        getExtremes: function () {
            w.prototype.getExtremes.call(this, this.valueData);
            this.chart.hasRendered && this.isDirtyData && this.getBox(this.options.data);
            this.valueMin = this.dataMin;
            this.valueMax = this.dataMax;
            this.dataMin = this.minY;
            this.dataMax = this.maxY
        },
        translatePath: function (a) {
            var b = !1, c = this.xAxis, d = this.yAxis, e = c.min, f = c.transA, c = c.minPixelPadding, g = d.min,
                h = d.transA, d = d.minPixelPadding, i, j = [];
            if (a)for (i = a.length; i--;)typeof a[i] === "number" ? (j[i] = b ? (a[i] - e) * f + c : (a[i] - g) * h + d, b = !b) : j[i] = a[i];
            return j
        },
        setData: function (a, b) {
            var c = this.options, d = c.mapData, e = c.joinBy, f = e === null, g = [], h, l, k;
            f && (e = "_i");
            e = this.joinBy = j.splat(e);
            e[1] || (e[1] = e[0]);
            a && i(a, function (b, d) {
                typeof b === "number" && (a[d] = {value: b});
                if (f)a[d]._i = d
            });
            this.getBox(a);
            if (d) {
                d.type === "FeatureCollection" && (d = j.geojson(d, this.type, this));
                this.getBox(d);
                this.mapData = d;
                this.mapMap = {};
                for (k = 0; k <
                d.length; k++)h = d[k], l = h.properties, h._i = k, e[0] && l && l[e[0]] && (h[e[0]] = l[e[0]]), this.mapMap[h[e[0]]] = h;
                c.allAreas && (a = a || [], e[1] && i(a, function (a) {
                    g.push(a[e[1]])
                }), g = "|" + g.join("|") + "|", i(d, function (b) {
                    (!e[0] || g.indexOf("|" + b[e[0]] + "|") === -1) && a.push(m(b, {value: null}))
                }))
            }
            w.prototype.setData.call(this, a, b)
        },
        drawGraph: s,
        drawDataLabels: s,
        doFullTranslate: function () {
            return this.isDirtyData || this.chart.renderer.isVML || !this.baseTrans
        },
        translate: function () {
            var a = this, b = a.xAxis, c = a.yAxis, d = a.doFullTranslate();
            a.generatePoints();
            i(a.data, function (e) {
                e.plotX = b.toPixels(e._midX, !0);
                e.plotY = c.toPixels(e._midY, !0);
                if (d)e.shapeType = "path", e.shapeArgs = {
                    d: a.translatePath(e.path),
                    "vector-effect": "non-scaling-stroke"
                }
            });
            a.translateColors()
        },
        drawPoints: function () {
            var a = this.xAxis, b = this.yAxis, c = this.group, d = this.chart, e = d.renderer, f = this.baseTrans;
            if (!this.transformGroup)this.transformGroup = e.g().attr({scaleX: 1, scaleY: 1}).add(c);
            this.doFullTranslate() ? (d.hasRendered && this.pointAttrToOptions.fill === "color" && i(this.points,
                function (a) {
                    a.graphic && a.graphic.attr("fill", a.color)
                }), this.group = this.transformGroup, k.column.prototype.drawPoints.apply(this), this.group = c, i(this.points, function (a) {
                a.graphic && (a.name && a.graphic.addClass("highcharts-name-" + a.name.replace(" ", "-").toLowerCase()), a.properties && a.properties["hc-key"] && a.graphic.addClass("highcharts-key-" + a.properties["hc-key"].toLowerCase()))
            }), this.baseTrans = {
                originX: a.min - a.minPixelPadding / a.transA,
                originY: b.min - b.minPixelPadding / b.transA + (b.reversed ? 0 : b.len / b.transA),
                transAX: a.transA,
                transAY: b.transA
            }) : (c = a.transA / f.transAX, d = b.transA / f.transAY, c > 0.99 && c < 1.01 && d > 0.99 && d < 1.01 ? (b = a = 0, d = c = 1) : (a = a.toPixels(f.originX, !0), b = b.toPixels(f.originY, !0)), this.transformGroup.animate({
                translateX: a,
                translateY: b,
                scaleX: c,
                scaleY: d
            }));
            this.drawMapDataLabels()
        },
        drawMapDataLabels: function () {
            w.prototype.drawDataLabels.call(this);
            this.dataLabelsGroup && this.dataLabelsGroup.clip(this.chart.clipRect);
            this.hideOverlappingDataLabels()
        },
        hideOverlappingDataLabels: function () {
            var a = this.points,
                b = a.length, c, d, e, f;
            i(a, function (a, b) {
                if (b = a.dataLabel)b.oldOpacity = b.opacity, b.newOpacity = 1
            });
            for (c = 0; c < b - 1; ++c) {
                e = a[c].dataLabel;
                for (d = c + 1; d < b; ++d)if (f = a[d].dataLabel, e && f && e.newOpacity !== 0 && f.newOpacity !== 0 && !(f.alignAttr.x > e.alignAttr.x + e.width || f.alignAttr.x + f.width < e.alignAttr.x || f.alignAttr.y > e.alignAttr.y + e.height || f.alignAttr.y + f.height < e.alignAttr.y))(a[c].labelrank < a[d].labelrank ? e : f).newOpacity = 0
            }
            i(a, function (a, b) {
                if (b = a.dataLabel) {
                    if (b.oldOpacity !== b.newOpacity)b[b.isOld ? "animate" : "attr"](q({opacity: b.newOpacity},
                        b.alignAttr));
                    b.isOld = !0
                }
            })
        },
        render: function () {
            var a = this, b = w.prototype.render;
            a.chart.renderer.isVML && a.data.length > 3E3 ? setTimeout(function () {
                b.call(a)
            }) : b.call(a)
        },
        animate: function (a) {
            var b = this.options.animation, c = this.group, d = this.xAxis, e = this.yAxis, f = d.pos, g = e.pos;
            if (this.chart.renderer.isSVG)b === !0 && (b = {duration: 1E3}), a ? c.attr({
                translateX: f + d.len / 2,
                translateY: g + e.len / 2,
                scaleX: 0.001,
                scaleY: 0.001
            }) : (c.animate({translateX: f, translateY: g, scaleX: 1, scaleY: 1}, b), this.animate = null)
        },
        animateDrilldown: function (a) {
            var b =
                this.chart.plotBox, c = this.chart.drilldownLevels[this.chart.drilldownLevels.length - 1], d = c.bBox, e = this.chart.options.drilldown.animation;
            if (!a)a = Math.min(d.width / b.width, d.height / b.height), c.shapeArgs = {
                scaleX: a,
                scaleY: a,
                translateX: d.x,
                translateY: d.y
            }, i(this.points, function (a) {
                a.graphic.attr(c.shapeArgs).animate({scaleX: 1, scaleY: 1, translateX: 0, translateY: 0}, e)
            }), this.animate = null
        },
        drawLegendSymbol: E.drawRectangle,
        animateDrillupFrom: function (a) {
            k.column.prototype.animateDrillupFrom.call(this, a)
        },
        animateDrillupTo: function (a) {
            k.column.prototype.animateDrillupTo.call(this,
                a)
        }
    }));
    r.mapline = m(r.map, {lineWidth: 1, fillColor: "none"});
    k.mapline = u(k.map, {
        type: "mapline",
        pointAttrToOptions: {stroke: "color", "stroke-width": "lineWidth", fill: "fillColor", dashstyle: "dashStyle"},
        drawLegendSymbol: k.line.prototype.drawLegendSymbol
    });
    r.mappoint = m(r.scatter, {
        dataLabels: {
            enabled: !0, formatter: function () {
                return this.point.name
            }, color: "black", crop: !1, defer: !1, overflow: !1, style: {HcTextStroke: "3px rgba(255,255,255,0.5)"}
        }
    });
    k.mappoint = u(k.scatter, {type: "mappoint", forceDL: !0});
    if (k.bubble)r.mapbubble =
        m(r.bubble, {
            animationLimit: 500,
            tooltip: {pointFormat: "{point.name}: {point.z}"}
        }), k.mapbubble = u(k.bubble, {
        pointClass: u(A, {applyOptions: v.prototype.applyOptions}),
        xyFromShape: !0,
        type: "mapbubble",
        pointArrayMap: ["z"],
        getMapData: k.map.prototype.getMapData,
        getBox: k.map.prototype.getBox,
        setData: k.map.prototype.setData
    });
    x.plotOptions.heatmap = m(x.plotOptions.scatter, {
        animation: !1,
        borderWidth: 0,
        nullColor: "#F8F8F8",
        dataLabels: {
            formatter: function () {
                return this.point.value
            }, verticalAlign: "middle", crop: !1, overflow: !1,
            style: {color: "white", fontWeight: "bold", HcTextStroke: "1px rgba(0,0,0,0.5)"}
        },
        marker: null,
        tooltip: {pointFormat: "{point.x}, {point.y}: {point.value}<br/>"},
        states: {normal: {animation: !0}, hover: {brightness: 0.2}}
    });
    k.heatmap = u(k.scatter, m(D, {
        type: "heatmap",
        pointArrayMap: ["y", "value"],
        hasPointSpecificOptions: !0,
        supportsDrilldown: !0,
        getExtremesFromAll: !0,
        init: function () {
            k.scatter.prototype.init.apply(this, arguments);
            this.pointRange = this.options.colsize || 1;
            this.yAxis.axisPointRange = this.options.rowsize || 1
        },
        translate: function () {
            var a = this.options, b = this.xAxis, c = this.yAxis;
            this.generatePoints();
            i(this.points, function (d) {
                var e = (a.colsize || 1) / 2, f = (a.rowsize || 1) / 2, g = Math.round(b.len - b.translate(d.x - e, 0, 1, 0, 1)), e = Math.round(b.len - b.translate(d.x + e, 0, 1, 0, 1)), h = Math.round(c.translate(d.y - f, 0, 1, 0, 1)), f = Math.round(c.translate(d.y + f, 0, 1, 0, 1));
                d.plotX = (g + e) / 2;
                d.plotY = (h + f) / 2;
                d.shapeType = "rect";
                d.shapeArgs = {x: Math.min(g, e), y: Math.min(h, f), width: Math.abs(e - g), height: Math.abs(f - h)}
            });
            this.translateColors();
            this.chart.hasRendered &&
            i(this.points, function (a) {
                a.shapeArgs.fill = a.options.color || a.color
            })
        },
        drawPoints: k.column.prototype.drawPoints,
        animate: s,
        getBox: s,
        drawLegendSymbol: E.drawRectangle,
        getExtremes: function () {
            w.prototype.getExtremes.call(this, this.valueData);
            this.valueMin = this.dataMin;
            this.valueMax = this.dataMax;
            w.prototype.getExtremes.call(this)
        }
    }));
    j.geojson = function (a, b, c) {
        var d = [], e = [], f = function (a) {
            var b = 0, d = a.length;
            for (e.push("M"); b < d; b++)b === 1 && e.push("L"), e.push(a[b][0], -a[b][1])
        }, b = b || "map";
        i(a.features, function (a) {
            var c =
                a.geometry, j = c.type, c = c.coordinates, a = a.properties, k;
            e = [];
            b === "map" || b === "mapbubble" ? (j === "Polygon" ? (i(c, f), e.push("Z")) : j === "MultiPolygon" && (i(c, function (a) {
                i(a, f)
            }), e.push("Z")), e.length && (k = {path: e})) : b === "mapline" ? (j === "LineString" ? f(c) : j === "MultiLineString" && i(c, f), e.length && (k = {path: e})) : b === "mappoint" && j === "Point" && (k = {
                x: c[0],
                y: -c[1]
            });
            k && d.push(q(k, {name: a.name || a.NAME, properties: a}))
        });
        if (c)c.chart.mapCredits = '<a href="http://www.highcharts.com">Highcharts</a> © <a href="' + a.copyrightUrl +
        '">' + a.copyrightShort + "</a>";
        return d
    };
    p(z.prototype, "showCredits", function (a, b) {
        if (x.credits.text === this.options.credits.text && this.mapCredits)b.text = this.mapCredits, b.href = null;
        a.call(this, b)
    });
    q(x.lang, {zoomIn: "Zoom in", zoomOut: "Zoom out"});
    x.mapNavigation = {
        buttonOptions: {
            alignTo: "plotBox",
            align: "left",
            verticalAlign: "top",
            x: 0,
            width: 18,
            height: 18,
            style: {fontSize: "15px", fontWeight: "bold", textAlign: "center"},
            theme: {"stroke-width": 1}
        }, buttons: {
            zoomIn: {
                onclick: function () {
                    this.mapZoom(0.5)
                }, text: "+",
                y: 0
            }, zoomOut: {
                onclick: function () {
                    this.mapZoom(2)
                }, text: "-", y: 28
            }
        }
    };
    j.splitPath = function (a) {
        var b, a = a.replace(/([A-Za-z])/g, " $1 "), a = a.replace(/^\s*/, "").replace(/\s*$/, ""), a = a.split(/[ ,]+/);
        for (b = 0; b < a.length; b++)/[a-zA-Z]/.test(a[b]) || (a[b] = parseFloat(a[b]));
        return a
    };
    j.maps = {};
    B.prototype.symbols.topbutton = function (a, b, c, d, e) {
        return F(e, a, b, c, d, e.r, e.r, 0, 0)
    };
    B.prototype.symbols.bottombutton = function (a, b, c, d, e) {
        return F(e, a, b, c, d, 0, 0, e.r, e.r)
    };
    J === G && i(["topbutton", "bottombutton"], function (a) {
        G.prototype.symbols[a] =
            B.prototype.symbols[a]
    });
    j.Map = function (a, b) {
        var c = {
            endOnTick: !1,
            gridLineWidth: 0,
            lineWidth: 0,
            minPadding: 0,
            maxPadding: 0,
            startOnTick: !1,
            title: null,
            tickPositions: []
        }, d;
        d = a.series;
        a.series = null;
        a = m({chart: {panning: "xy", type: "map"}, xAxis: c, yAxis: m(c, {reversed: !0})}, a, {
            chart: {
                inverted: !1,
                alignTicks: !1,
                preserveAspectRatio: !0
            }
        });
        a.series = d;
        return new z(a, b)
    }
})(Highcharts);
