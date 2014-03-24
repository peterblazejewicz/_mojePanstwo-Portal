/*
 Highcharts JS v3.0.10 (2014-03-10)

 (c) 2009-2013 Torstein Hønsi

 License: www.highcharts.com/license
 */
(function (c) {
    function v(e, a, b, d) {
        b *= q;
        a *= q;
        var g = [], l, h, f;
        b *= -1;
        l = d.x;
        h = d.y;
        f = d.z === 0 ? 1.0E-4 : d.z * 100;
        var j = i(b), n = k(b), u = i(a), w = k(a), s, m, r, o;
        c.each(e, function (a) {
            s = a.x - l;
            m = a.y - h;
            r = a.z;
            o = {x: n * s - j * r, y: -j * u * s - n * u * r + w * m, z: j * w * s + n * w * r + u * m};
            o.x = o.x * ((f - o.z) / f) + l;
            o.y = o.y * ((f - o.z) / f) + h;
            g.push(o)
        });
        return g
    }

    function y(e, a, b, d, g, c, h, f) {
        var j = [];
        return c > g && c - g > m / 2 + 1.0E-4 ? (j = j.concat(y(e, a, b, d, g, g + m / 2, h, f)), j = j.concat(y(e, a, b, d, g + m / 2, c, h, f))) : c < g && g - c > m / 2 + 1.0E-4 ? (j = j.concat(y(e, a, b, d, g, g - m / 2, h, f)), j = j.concat(y(e,
            a, b, d, g - m / 2, c, h, f))) : (j = c - g, ["C", e + b * k(g) - b * C * j * i(g) + h, a + d * i(g) + d * C * j * k(g) + f, e + b * k(c) + b * C * j * i(c) + h, a + d * i(c) - d * C * j * k(c) + f, e + b * k(c) + h, a + d * i(c) + f])
    }

    var m = Math.PI, q = m / 180, i = Math.sin, k = Math.cos, E = Math.round, C = 4 * (Math.sqrt(2) - 1) / 3 / (m / 2);
    c.SVGRenderer.prototype.toLinePath = function (e, a) {
        var b = [];
        c.each(e, function (a) {
            b.push("L", a.x, a.y)
        });
        b[0] = "M";
        a && b.push("Z");
        return b
    };
    c.SVGRenderer.prototype.cuboid = function (e) {
        var a = this.g(), e = this.cuboidPath(e);
        a.front = this.path(e[0]).attr({zIndex: e[3]}).add(a);
        a.top =
            this.path(e[1]).attr({zIndex: e[4]}).add(a);
        a.side = this.path(e[2]).attr({zIndex: e[5]}).add(a);
        a.attrSetters.fill = function (a) {
            var d = c.Color(a).brighten(0.1).get(), e = c.Color(a).brighten(-0.1).get();
            this.front.attr({fill: a});
            this.top.attr({fill: d});
            this.side.attr({fill: e});
            return this
        };
        a.animate = function (a, d, e) {
            a.x && a.y ? (a = this.renderer.cuboidPath(a), this.front.animate({d: a[0], zIndex: a[3]}, d, e), this.top.animate({d: a[1], zIndex: a[4]}, d, e), this.side.animate({d: a[2], zIndex: a[5]}, d, e)) : c.SVGElement.prototype.animate.call(this,
                a, d, e);
            return this
        };
        a.destroy = function () {
            this.front.destroy();
            this.top.destroy();
            this.side.destroy();
            return null
        };
        return a
    };
    c.SVGRenderer.prototype.cuboidPath = function (e) {
        var a = e.x, b = e.y, d = e.z, c = e.height, l = e.width, h = e.depth, f = e.alpha, j = e.beta, a = [
            {x: a, y: b, z: d},
            {x: a + l, y: b, z: d},
            {x: a + l, y: b + c, z: d},
            {x: a, y: b + c, z: d},
            {x: a, y: b + c, z: d + h},
            {x: a + l, y: b + c, z: d + h},
            {x: a + l, y: b, z: d + h},
            {x: a, y: b, z: d + h}
        ], a = v(a, f, j, e.origin);
        return[
            ["M", a[0].x, a[0].y, "L", a[1].x, a[1].y, "L", a[2].x, a[2].y, "L", a[3].x, a[3].y, "Z"],
            j > 0 ? ["M", a[0].x,
                a[0].y, "L", a[7].x, a[7].y, "L", a[6].x, a[6].y, "L", a[1].x, a[1].y, "Z"] : ["M", a[3].x, a[3].y, "L", a[2].x, a[2].y, "L", a[5].x, a[5].y, "L", a[4].x, a[4].y, "Z"],
            f > 0 ? ["M", a[1].x, a[1].y, "L", a[2].x, a[2].y, "L", a[5].x, a[5].y, "L", a[6].x, a[6].y, "Z"] : ["M", a[0].x, a[0].y, "L", a[7].x, a[7].y, "L", a[4].x, a[4].y, "L", a[3].x, a[3].y, "Z"],
            (a[0].z + a[1].z + a[2].z + a[3].z) / 4,
            j > 0 ? (a[0].z + a[7].z + a[6].z + a[1].z) / 4 : (a[3].z + a[2].z + a[5].z + a[4].z) / 4,
            f > 0 ? (a[1].z + a[2].z + a[5].z + a[6].z) / 4 : (a[0].z + a[7].z + a[4].z + a[3].z) / 4
        ]
    };
    c.SVGRenderer.prototype.arc3d =
        function (e) {
            e.alpha *= q;
            e.beta *= q;
            var a = this.g(), b = this.arc3dPath(e), d = a.renderer, g = b.zAll * 100;
            a.shapeArgs = e;
            a.side1 = d.path(b.side2).attr({zIndex: b.zSide2}).add(a);
            a.side2 = d.path(b.side1).attr({zIndex: b.zSide1}).add(a);
            a.inn = d.path(b.inn).attr({zIndex: b.zInn}).add(a);
            a.out = d.path(b.out).attr({zIndex: b.zOut}).add(a);
            a.top = d.path(b.top).attr({zIndex: b.zTop}).add(a);
            a.attrSetters.fill = function (a) {
                this.color = a;
                var b = c.Color(a).brighten(-0.1).get();
                this.side1.attr({fill: b});
                this.side2.attr({fill: b});
                this.inn.attr({fill: b});
                this.out.attr({fill: b});
                this.top.attr({fill: a});
                return this
            };
            a.animate = function (a, b, e) {
                c.SVGElement.prototype.animate.call(this, a, b, e);
                if (a.x && a.y)b = this.renderer, a = c.splat(a)[0], a.alpha *= q, a.beta *= q, b = b.arc3dPath(a), this.shapeArgs = a, this.inn.attr({d: b.inn, zIndex: b.zInn}), this.out.attr({d: b.out, zIndex: b.zOut}), this.side1.attr({d: b.side1, zIndex: b.zSide2}), this.side2.attr({d: b.side2, zIndex: b.zSide1}), this.top.attr({d: b.top, zIndex: b.zTop}), this.attr({fill: this.color}), this.attr({zIndex: b.zAll * 100});
                return this
            };
            a.zIndex = g;
            a.attr({zIndex: g});
            return a
        };
    c.SVGRenderer.prototype.arc3dPath = function (e) {
        var a = e.x, b = e.y, d = e.start, c = e.end - 1.0E-5, l = e.r, h = e.innerR, f = e.depth, j = e.alpha, n = e.beta, u = k(d), w = i(d), s = k(c), q = i(c), r = l * k(n), o = l * k(j), x = h * k(n), z = h * k(j), A = f * i(n), B = f * i(j), f = ["M", a + r * u, b + o * w], f = f.concat(y(a, b, r, o, d, c, 0, 0)), f = f.concat(["L", a + x * s, b + z * q]), f = f.concat(y(a, b, x, z, c, d, 0, 0)), f = f.concat(["Z"]), e = (e.start + e.end) / 2, e = i(n) * k(e) + i(-j) * i(-e), p = n > 0 ? m / 2 : 0, t = j > 0 ? 0 : m / 2, p = d > -p ? d : c > -p ? -p : d, v = c < m - t ? c : d < m - t ?
            m - t : c, t = ["M", a + r * k(p), b + o * i(p)], t = t.concat(y(a, b, r, o, p, v, 0, 0)), t = t.concat(["L", a + r * k(v) + A, b + o * i(v) + B]), t = t.concat(y(a, b, r, o, v, p, A, B)), t = t.concat(["Z"]), p = ["M", a + x * u, b + z * w], p = p.concat(y(a, b, x, z, d, c, 0, 0)), p = p.concat(["L", a + x * k(c) + A, b + z * i(c) + B]), p = p.concat(y(a, b, x, z, c, d, A, B)), p = p.concat(["Z"]), u = ["M", a + r * u, b + o * w, "L", a + r * u + A, b + o * w + B, "L", a + x * u + A, b + z * w + B, "L", a + x * u, b + z * w, "Z"], a = ["M", a + r * s, b + o * q, "L", a + r * s + A, b + o * q + B, "L", a + x * s + A, b + z * q + B, "L", a + x * s, b + z * q, "Z"], s = h + (l - h) / 2, b = Math.abs(e * 2 * s);
        l *= e;
        h *= e;
        d = (i(n) * k(d) +
            i(-j) * i(-d)) * s;
        c = (i(n) * k(c) + i(-j) * i(-c)) * s;
        return{top: f, zTop: b * 100, out: t, zOut: l * 100, inn: p, zInn: h * 100, side1: u, zSide1: d * 100, side2: a, zSide2: c * 100, zAll: e}
    };
    c.Chart.prototype.is3d = function () {
        return this.options.chart.options3d && this.options.chart.options3d.enabled
    };
    c.wrap(c.Chart.prototype, "isInsidePlot", function (e) {
        return this.is3d() ? !0 : e.apply(this, [].slice.call(arguments, 1))
    });
    c.wrap(c.Chart.prototype, "init", function (e) {
        var a = arguments;
        a[1] = c.merge({chart: {options3d: {enabled: !1, alpha: 0, beta: 0, depth: 0,
            frame: {bottom: {size: 1, color: "transparent"}, side: {size: 1, color: "transparent"}, back: {size: 1, color: "transparent"}}}}}, a[1]);
        e.apply(this, [].slice.call(a, 1))
    });
    c.wrap(c.Chart.prototype, "setChartSize", function (e) {
        e.apply(this, [].slice.call(arguments, 1));
        if (this.is3d()) {
            var a = this.inverted, b = this.clipBox, c = this.margin;
            b[a ? "y" : "x"] = -(c[3] || 0);
            b[a ? "x" : "y"] = -(c[0] || 0);
            b[a ? "height" : "width"] = this.chartWidth + (c[3] || 0) + (c[1] || 0);
            b[a ? "width" : "height"] = this.chartHeight + (c[0] || 0) + (c[2] || 0)
        }
    });
    c.wrap(c.Chart.prototype,
        "redraw", function (c) {
            if (this.is3d())this.isDirtyBox = !0;
            c.apply(this, [].slice.call(arguments, 1))
        });
    c.wrap(c.Axis.prototype, "init", function (c) {
        var a = arguments;
        if (a[1].is3d)a[2].tickWidth = a[2].tickWidth || 0, a[2].gridLineWidth = a[2].gridLineWidth || 1;
        c.apply(this, [].slice.call(arguments, 1))
    });
    c.wrap(c.Axis.prototype, "render", function (c) {
        c.apply(this, [].slice.call(arguments, 1));
        if (this.chart.is3d()) {
            var a = this.chart, b = a.renderer, d = a.options.chart.options3d, g = d.alpha, l = d.beta, h = d.frame, f = h.bottom, j = h.back,
                h = h.side, d = d.depth, n = this.height, i = this.width, k = this.left, m = this.top, a = {x: a.plotLeft + a.plotWidth / 2, y: a.plotTop + a.plotHeight / 2, z: d};
            this.horiz ? (this.axisLine && this.axisLine.hide(), g = {x: k, y: m + n, z: 0, width: i, height: f.size, depth: d, alpha: g, beta: l, origin: a}, this.bottomFrame ? this.bottomFrame.animate(g) : this.bottomFrame = b.cuboid(g).attr({fill: f.color, zIndex: -1}).add()) : (i = {x: k, y: m, z: d + 1, width: i, height: n + f.size, depth: j.size, alpha: g, beta: l, origin: a}, this.backFrame ? this.backFrame.animate(i) : this.backFrame = b.cuboid(i).attr({fill: j.color,
                zIndex: -3}).add(), this.axisLine && this.axisLine.hide(), f = {x: k - h.size, y: m, z: 0, width: h.size, height: n + f.size, depth: d + j.size, alpha: g, beta: l, origin: a}, this.sideFrame ? this.sideFrame.animate(f) : this.sideFrame = b.cuboid(f).attr({fill: h.color, zIndex: -2}).add())
        }
    });
    c.wrap(c.Axis.prototype, "getPlotLinePath", function (c) {
        var a = c.apply(this, [].slice.call(arguments, 1));
        if (!this.chart.is3d())return a;
        if (a === null)return a;
        var b = this.chart, d = b.options.chart.options3d, g = d.depth;
        d.origin = {x: b.plotLeft + b.plotWidth / 2, y: b.plotTop +
            b.plotHeight / 2, z: g};
        a = [
            {x: a[1], y: a[2], z: this.horiz || this.opposite ? g : 0},
            {x: a[1], y: a[2], z: g},
            {x: a[4], y: a[5], z: g},
            {x: a[4], y: a[5], z: this.horiz || this.opposite ? 0 : g}
        ];
        a = v(a, b.options.inverted ? d.beta : d.alpha, b.options.inverted ? d.alpha : d.beta, d.origin);
        return a = this.chart.renderer.toLinePath(a, !1)
    });
    c.wrap(c.Tick.prototype, "getMarkPath", function (c) {
        var a = c.apply(this, [].slice.call(arguments, 1));
        if (!this.axis.chart.is3d())return a;
        var b = this.axis.chart, d = b.options.chart.options3d, a = [
            {x: a[1], y: a[2], z: 0},
            {x: a[4],
                y: a[5], z: 0}
        ], a = v(a, b.inverted ? d.beta : d.alpha, b.inverted ? d.alpha : d.beta, {x: b.plotLeft + b.plotWidth / 2, y: b.plotTop + b.plotHeight / 2, z: d.depth});
        return a = ["M", a[0].x, a[0].y, "L", a[1].x, a[1].y]
    });
    c.wrap(c.Tick.prototype, "getLabelPosition", function (c) {
        var a = c.apply(this, [].slice.call(arguments, 1));
        if (!this.axis.chart.is3d())return a;
        var b = this.axis.chart, d = b.options.chart.options3d;
        return a = v([
            {x: a.x, y: a.y, z: 0}
        ], b.inverted ? d.beta : d.alpha, b.inverted ? d.alpha : d.beta, {x: b.plotLeft + b.plotWidth / 2, y: b.plotTop + b.plotHeight /
            2, z: d.depth})[0]
    });
    c.wrap(c.Axis.prototype, "drawCrosshair", function (c) {
        var a = arguments;
        this.chart.is3d() && a[2] && (a[2] = {plotX: a[2].plotXold || a[2].plotX, plotY: a[2].plotYold || a[2].plotY});
        c.apply(this, [].slice.call(a, 1))
    });
    c.wrap(c.seriesTypes.column.prototype, "init", function (c) {
        var a = arguments;
        if (a[1].is3d)a[2].borderColor = a[2].borderColor || this.color;
        c.apply(this, [].slice.call(arguments, 1))
    });
    c.wrap(c.seriesTypes.column.prototype, "translate", function (e) {
        e.apply(this, [].slice.call(arguments, 1));
        if (this.chart.is3d()) {
            var a =
                this.chart, b = a.options, d = b.plotOptions[this.chart.options.chart.type], b = b.chart.options3d, g = d.depth || 0, i = {x: a.plotWidth / 2, y: a.plotHeight / 2, z: b.depth}, h = b.alpha, f = b.beta, j = (d.stacking ? this.options.stack || 0 : this._i) * (g + (d.groupZPadding || 1));
            d.grouping !== !1 && (j = 0);
            j += d.groupZPadding || 1;
            c.each(this.data, function (a) {
                var b = a.shapeArgs;
                a.shapeType = "cuboid";
                b.alpha = h;
                b.beta = f;
                b.z = j;
                b.origin = i;
                b.depth = g
            })
        }
    });
    c.wrap(c.seriesTypes.column.prototype, "drawPoints", function (c) {
        this.chart.is3d() && this.group.attr({zIndex: this.group.zIndex *
            10});
        c.apply(this, [].slice.call(arguments, 1))
    });
    var D = c.getOptions();
    D.plotOptions.cylinder = c.merge(D.plotOptions.column);
    D = c.extendClass(c.seriesTypes.column, {type: "cylinder"});
    c.seriesTypes.cylinder = D;
    c.wrap(c.seriesTypes.cylinder.prototype, "translate", function (e) {
        e.apply(this, [].slice.call(arguments, 1));
        if (this.chart.is3d()) {
            var a = this.chart, b = a.options, d = b.plotOptions.cylinder, b = b.chart.options3d, g = d.depth || 0, k = {x: a.inverted ? a.plotHeight / 2 : a.plotWidth / 2, y: a.inverted ? a.plotWidth / 2 : a.plotHeight /
                2, z: b.depth}, h = b.alpha, f = d.stacking ? (this.options.stack || 0) * g : this._i * g;
            f += g / 2;
            d.grouping !== !1 && (f = 0);
            c.each(this.data, function (a) {
                var b = a.shapeArgs;
                a.shapeType = "arc3d";
                b.x += g / 2;
                b.z = f;
                b.start = 0;
                b.end = 2 * m;
                b.r = g * 0.95;
                b.innerR = 0;
                b.depth = b.height * (1 / i((90 - h) * q)) - f;
                b.alpha = 90 - h;
                b.beta = 0;
                b.origin = k
            })
        }
    });
    c.wrap(c.seriesTypes.pie.prototype, "translate", function (e) {
        e.apply(this, [].slice.call(arguments, 1));
        if (this.chart.is3d()) {
            var a = this, b = a.chart, d = b.options, g = d.plotOptions.pie, l = g.depth || 0, d = d.chart.options3d,
                h = {x: b.plotWidth / 2, y: b.plotHeight / 2, z: d.depth}, f = d.alpha, j = d.beta, n = g.stacking ? (this.options.stack || 0) * l : a._i * l;
            n += l / 2;
            g.grouping !== !1 && (n = 0);
            c.each(a.data, function (b) {
                b.shapeType = "arc3d";
                var c = b.shapeArgs;
                c.z = n;
                c.depth = l * 0.75;
                c.origin = h;
                c.alpha = f;
                c.beta = j;
                c = (c.end + c.start) / 2;
                b.slicedTranslation = {translateX: E(k(c) * a.options.slicedOffset * k(f * q)), translateY: E(i(c) * a.options.slicedOffset * k(f * q))}
            })
        }
    });
    c.wrap(c.seriesTypes.pie.prototype, "drawDataLabels", function (e) {
        e.apply(this, [].slice.call(arguments,
            1));
        this.chart.is3d() && c.each(this.data, function (a) {
            var b = a.shapeArgs, c = b.r, e = b.depth, l = b.alpha * q, h = b.beta * q, b = (b.start + b.end) / 2;
            a.connector && a.connector.translate(-c * (1 - k(h)) * k(b) + (k(b) > 0 ? i(h) * e : 0), -c * (1 - k(l)) * i(b) + (i(b) > 0 ? i(l) * e : 0));
            a.dataLabel && a.dataLabel.attr({x: a.dataLabel.connX + -c * (1 - k(h)) * k(b) + (k(b) > 0 ? k(h) * e : 0) - a.dataLabel.width / 2, y: a.dataLabel.connY + -c * (1 - k(l)) * i(b) + (i(b) > 0 ? i(l) * e : 0) - a.dataLabel.height / 2})
        })
    });
    c.wrap(c.seriesTypes.pie.prototype, "addPoint", function (c) {
        c.apply(this, [].slice.call(arguments,
            1));
        this.chart.is3d() && this.update()
    });
    c.wrap(c.seriesTypes.scatter.prototype, "translate", function (e) {
        e.apply(this, [].slice.call(arguments, 1));
        if (this.chart.is3d()) {
            var a = this.chart, b = this.chart.options.chart.options3d, d = b.alpha, g = b.beta, i = {x: a.inverted ? a.plotHeight / 2 : a.plotWidth / 2, y: a.inverted ? a.plotWidth / 2 : a.plotHeight / 2, z: b.depth}, b = b.depth, h = a.options.zAxis || {min: 0, max: b}, f = b / (h.max - h.min);
            c.each(this.data, function (a) {
                var b = {x: a.plotX, y: a.plotY, z: (a.z - h.min) * f}, b = v([b], d, g, i)[0];
                a.plotXold = a.plotX;
                a.plotYold = a.plotY;
                a.plotX = b.x;
                a.plotY = b.y;
                a.plotZ = b.z
            })
        }
    });
    c.wrap(c.seriesTypes.scatter.prototype, "init", function (c) {
        var a = c.apply(this, [].slice.call(arguments, 1));
        if (this.chart.is3d())this.pointArrayMap = ["x", "y", "z"], this.tooltipOptions.pointFormat = this.userOptions.tooltip ? this.userOptions.tooltip.pointFormat || "x: <b>{point.x}</b><br/>y: <b>{point.y}</b><br/>z: <b>{point.z}</b><br/>" : "x: <b>{point.x}</b><br/>y: <b>{point.y}</b><br/>z: <b>{point.z}</b><br/>";
        return a
    });
    if (c.VMLRenderer)c.VMLRenderer.prototype.cuboid =
        c.SVGRenderer.prototype.cuboid, c.VMLRenderer.prototype.cuboidPath = c.SVGRenderer.prototype.cuboidPath, c.VMLRenderer.prototype.toLinePath = c.SVGRenderer.prototype.toLinePath, c.VMLRenderer.prototype.createElement3D = c.SVGRenderer.prototype.createElement3D, c.VMLRenderer.prototype.arc3d = function (e) {
        e = c.SVGRenderer.prototype.arc3d.call(this, e);
        e.css({zIndex: e.zIndex});
        return e
    }, c.VMLRenderer.prototype.arc3dPath = c.SVGRenderer.prototype.arc3dPath, c.Chart.prototype.renderSeries = function () {
        for (var c, a = this.series.length; a--;)c =
            this.series[a], c.translate(), c.setTooltipPoints && c.setTooltipPoints(), c.render()
    }
})(Highcharts);
