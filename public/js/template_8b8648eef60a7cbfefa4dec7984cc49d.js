;
! function(t) {
	var e = {},
	s = {
		mode: "horizontal",
		slideSelector: "",
		infiniteLoop: !0,
		hideControlOnEnd: !1,
		speed: 500,
		easing: null,
		slideMargin: 0,
		startSlide: 0,
		randomStart: !1,
		captions: !1,
		ticker: !1,
		tickerHover: !1,
		adaptiveHeight: !1,
		adaptiveHeightSpeed: 500,
		video: !1,
		useCSS: !0,
		preloadImages: "visible",
		responsive: !0,
		slideZIndex: 50,
		touchEnabled: !0,
		swipeThreshold: 50,
		oneToOneTouch: !0,
		preventDefaultSwipeX: !0,
		preventDefaultSwipeY: !1,
		pager: !0,
		pagerType: "full",
		pagerShortSeparator: " / ",
		pagerSelector: null,
		buildPager: null,
		pagerCustom: null,
		controls: !0,
		nextText: "Next",
		prevText: "Prev",
		nextSelector: null,
		prevSelector: null,
		autoControls: !1,
		startText: "Start",
		stopText: "Stop",
		autoControlsCombine: !1,
		autoControlsSelector: null,
		auto: !1,
		pause: 4e3,
		autoStart: !0,
		autoDirection: "next",
		autoHover: !1,
		autoDelay: 0,
		minSlides: 1,
		maxSlides: 1,
		moveSlides: 0,
		slideWidth: 0,
		onSliderLoad: function() {},
		onSlideBefore: function() {},
		onSlideAfter: function() {},
		onSlideNext: function() {},
		onSlidePrev: function() {},
		onSliderResize: function() {}
	};
	t.fn.bxSlider = function(n) {
		if (0 == this.length) return this;
		if (this.length > 1) return this.each(function() {
			t(this).bxSlider(n)
		}), this;
			var o = {},
			r = this;
			e.el = this;
			var a = t(window).width(),
			l = t(window).height(),
			d = function() {
				o.settings = t.extend({}, s, n), o.settings.slideWidth = parseInt(o.settings.slideWidth), o.children = r.children(o.settings.slideSelector), o.children.length < o.settings.minSlides && (o.settings.minSlides = o.children.length), o.children.length < o.settings.maxSlides && (o.settings.maxSlides = o.children.length), o.settings.randomStart && (o.settings.startSlide = Math.floor(Math.random() * o.children.length)), o.active = {
					index: o.settings.startSlide
				}, o.carousel = o.settings.minSlides > 1 || o.settings.maxSlides > 1, o.carousel && (o.settings.preloadImages = "all"), o.minThreshold = o.settings.minSlides * o.settings.slideWidth + (o.settings.minSlides - 1) * o.settings.slideMargin, o.maxThreshold = o.settings.maxSlides * o.settings.slideWidth + (o.settings.maxSlides - 1) * o.settings.slideMargin, o.working = !1, o.controls = {}, o.interval = null, o.animProp = "vertical" == o.settings.mode ? "top" : "left", o.usingCSS = o.settings.useCSS && "fade" != o.settings.mode && function() {
					var t = document.createElement("div"),
					e = ["WebkitPerspective", "MozPerspective", "OPerspective", "msPerspective"];
					for (var i in e)
						if (void 0 !== t.style[e[i]]) return o.cssPrefix = e[i].replace("Perspective", "").toLowerCase(), o.animProp = "-" + o.cssPrefix + "-transform", !0;
					return !1
				}(), "vertical" == o.settings.mode && (o.settings.maxSlides = o.settings.minSlides), r.data("origStyle", r.attr("style")), r.children(o.settings.slideSelector).each(function() {
					t(this).data("origStyle", t(this).attr("style"))
				}), c()
			},
			c = function() {
				r.wrap('<div class="bx-wrapper"><div class="bx-viewport"></div></div>'), o.viewport = r.parent(), o.loader = t('<div class="bx-loading" />'), o.viewport.prepend(o.loader), r.css({
					width: "horizontal" == o.settings.mode ? 100 * o.children.length + 215 + "%" : "auto",
					position: "relative"
				}), o.usingCSS && o.settings.easing ? r.css("-" + o.cssPrefix + "-transition-timing-function", o.settings.easing) : o.settings.easing || (o.settings.easing = "swing"), f(), o.viewport.css({
					width: "100%",
					overflow: "hidden",
					position: "relative"
				}), o.viewport.parent().css({
					maxWidth: p()
				}), o.settings.pager || o.viewport.parent().css({
					margin: "0 auto 0px"
				}), o.children.css({
					"float": "horizontal" == o.settings.mode ? "left" : "none",
					listStyle: "none",
					position: "relative"
				}), o.children.css("width", u()), "horizontal" == o.settings.mode && o.settings.slideMargin > 0 && o.children.css("marginRight", o.settings.slideMargin), "vertical" == o.settings.mode && o.settings.slideMargin > 0 && o.children.css("marginBottom", o.settings.slideMargin), "fade" == o.settings.mode && (o.children.css({
					position: "absolute",
					zIndex: 0,
					display: "none"
				}), o.children.eq(o.settings.startSlide).css({
					zIndex: o.settings.slideZIndex,
					display: "block"
				})), o.controls.el = t('<div class="bx-controls" />'), o.settings.captions && P(), o.active.last = o.settings.startSlide == x() - 1, o.settings.video && r.fitVids();
				var e = o.children.eq(o.settings.startSlide);
				"all" == o.settings.preloadImages && (e = o.children), o.settings.ticker ? o.settings.pager = !1 : (o.settings.pager && T(), o.settings.controls && C(), o.settings.auto && o.settings.autoControls && E(), (o.settings.controls || o.settings.autoControls || o.settings.pager) && o.viewport.after(o.controls.el)), g(e, h)
			},
			g = function(e, i) {
				var s = e.find("img, iframe").length;
				if (0 == s) return i(), void 0;
				var n = 0;
				e.find("img, iframe").each(function() {
					t(this).one("load", function() {
						++n == s && i()
					}).each(function() {
						this.complete && t(this).load()
					})
				})
			},
			h = function() {
				if (o.settings.infiniteLoop && "fade" != o.settings.mode && !o.settings.ticker) {
					var e = "vertical" == o.settings.mode ? o.settings.minSlides : o.settings.maxSlides,
					i = o.children.slice(0, e).clone().addClass("bx-clone"),
					s = o.children.slice(-e).clone().addClass("bx-clone");
					r.append(i).prepend(s)
				}
				o.loader.remove(), S(), "vertical" == o.settings.mode && (o.settings.adaptiveHeight = !0), o.viewport.height(v()), r.redrawSlider(), o.settings.onSliderLoad(o.active.index), o.initialized = !0, o.settings.responsive && t(window).bind("resize", Z), o.settings.auto && o.settings.autoStart && H(), o.settings.ticker && L(), o.settings.pager && q(o.settings.startSlide), o.settings.controls && W(), o.settings.touchEnabled && !o.settings.ticker && O()
			},
			v = function() {
				var e = 0,
				s = t();
				if ("vertical" == o.settings.mode || o.settings.adaptiveHeight)
					if (o.carousel) {
						var n = 1 == o.settings.moveSlides ? o.active.index : o.active.index * m();
						for (s = o.children.eq(n), i = 1; i <= o.settings.maxSlides - 1; i++) s = n + i >= o.children.length ? s.add(o.children.eq(i - 1)) : s.add(o.children.eq(n + i))
					} else s = o.children.eq(o.active.index);
				else s = o.children;
				return "vertical" == o.settings.mode ? (s.each(function() {
					e += t(this).outerHeight()
				}), o.settings.slideMargin > 0 && (e += o.settings.slideMargin * (o.settings.minSlides - 1))) : e = Math.max.apply(Math, s.map(function() {
					return t(this).outerHeight(!1)
				}).get()), e
			},
			p = function() {
				var t = "100%";
				return o.settings.slideWidth > 0 && (t = "horizontal" == o.settings.mode ? o.settings.maxSlides * o.settings.slideWidth + (o.settings.maxSlides - 1) * o.settings.slideMargin : o.settings.slideWidth), t
			},
			u = function() {
				var t = o.settings.slideWidth,
				e = o.viewport.width();
				return 0 == o.settings.slideWidth || o.settings.slideWidth > e && !o.carousel || "vertical" == o.settings.mode ? t = e : o.settings.maxSlides > 1 && "horizontal" == o.settings.mode && (e > o.maxThreshold || e < o.minThreshold && (t = (e - o.settings.slideMargin * (o.settings.minSlides - 1)) / o.settings.minSlides)), t
			},
			f = function() {
				var t = 1;
				if ("horizontal" == o.settings.mode && o.settings.slideWidth > 0)
					if (o.viewport.width() < o.minThreshold) t = o.settings.minSlides;
				else if (o.viewport.width() > o.maxThreshold) t = o.settings.maxSlides;
				else {
					var e = o.children.first().width();
					t = Math.floor(o.viewport.width() / e)
				} else "vertical" == o.settings.mode && (t = o.settings.minSlides);
				return t
			},
			x = function() {
				var t = 0;
				if (o.settings.moveSlides > 0)
					if (o.settings.infiniteLoop) t = o.children.length / m();
				else
					for (var e = 0, i = 0; e < o.children.length;) ++t, e = i + f(), i += o.settings.moveSlides <= f() ? o.settings.moveSlides : f();
						else t = Math.ceil(o.children.length / f());
					return t
				},
				m = function() {
					return o.settings.moveSlides > 0 && o.settings.moveSlides <= f() ? o.settings.moveSlides : f()
				},
				S = function() {
					if (o.children.length > o.settings.maxSlides && o.active.last && !o.settings.infiniteLoop) {
						if ("horizontal" == o.settings.mode) {
							var t = o.children.last(),
							e = t.position();
							b(-(e.left - (o.viewport.width() - t.width())), "reset", 0)
						} else if ("vertical" == o.settings.mode) {
							var i = o.children.length - o.settings.minSlides,
							e = o.children.eq(i).position();
							b(-e.top, "reset", 0)
						}
					} else {
						var e = o.children.eq(o.active.index * m()).position();
						o.active.index == x() - 1 && (o.active.last = !0), void 0 != e && ("horizontal" == o.settings.mode ? b(-e.left, "reset", 0) : "vertical" == o.settings.mode && b(-e.top, "reset", 0))
					}
				},
				b = function(t, e, i, s) {
					if (o.usingCSS) {
						var n = "vertical" == o.settings.mode ? "translate3d(0, " + t + "px, 0)" : "translate3d(" + t + "px, 0, 0)";
						r.css("-" + o.cssPrefix + "-transition-duration", i / 1e3 + "s"), "slide" == e ? (r.css(o.animProp, n), r.bind("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd", function() {
							r.unbind("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd"), D()
						})) : "reset" == e ? r.css(o.animProp, n) : "ticker" == e && (r.css("-" + o.cssPrefix + "-transition-timing-function", "linear"), r.css(o.animProp, n), r.bind("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd", function() {
							r.unbind("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd"), b(s.resetValue, "reset", 0), N()
						}))
					} else {
						var a = {};
						a[o.animProp] = t, "slide" == e ? r.animate(a, i, o.settings.easing, function() {
							D()
						}) : "reset" == e ? r.css(o.animProp, t) : "ticker" == e && r.animate(a, speed, "linear", function() {
							b(s.resetValue, "reset", 0), N()
						})
					}
				},
				w = function() {
					for (var e = "", i = x(), s = 0; i > s; s++) {
						var n = "";
						o.settings.buildPager && t.isFunction(o.settings.buildPager) ? (n = o.settings.buildPager(s), o.pagerEl.addClass("bx-custom-pager")) : (n = s + 1, o.pagerEl.addClass("bx-default-pager")), e += '<div class="bx-pager-item"><a href="" data-slide-index="' + s + '" class="bx-pager-link">' + n + "</a></div>"
					}
					o.pagerEl.html(e)
				},
				T = function() {
					o.settings.pagerCustom ? o.pagerEl = t(o.settings.pagerCustom) : (o.pagerEl = t('<div class="bx-pager" />'), o.settings.pagerSelector ? t(o.settings.pagerSelector).html(o.pagerEl) : o.controls.el.addClass("bx-has-pager").append(o.pagerEl), w()), o.pagerEl.on("click", "a", I)
				},
				C = function() {
					o.controls.next = t('<a class="bx-next" href="">' + o.settings.nextText + "</a>"), o.controls.prev = t('<a class="bx-prev" href="">' + o.settings.prevText + "</a>"), o.controls.next.bind("click", y), o.controls.prev.bind("click", z), o.settings.nextSelector && t(o.settings.nextSelector).append(o.controls.next), o.settings.prevSelector && t(o.settings.prevSelector).append(o.controls.prev), o.settings.nextSelector || o.settings.prevSelector || (o.controls.directionEl = t('<div class="bx-controls-direction" />'), o.controls.directionEl.append(o.controls.prev).append(o.controls.next), o.controls.el.addClass("bx-has-controls-direction").append(o.controls.directionEl))
				},
				E = function() {
					o.controls.start = t('<div class="bx-controls-auto-item"><a class="bx-start" href="">' + o.settings.startText + "</a></div>"), o.controls.stop = t('<div class="bx-controls-auto-item"><a class="bx-stop" href="">' + o.settings.stopText + "</a></div>"), o.controls.autoEl = t('<div class="bx-controls-auto" />'), o.controls.autoEl.on("click", ".bx-start", k), o.controls.autoEl.on("click", ".bx-stop", M), o.settings.autoControlsCombine ? o.controls.autoEl.append(o.controls.start) : o.controls.autoEl.append(o.controls.start).append(o.controls.stop), o.settings.autoControlsSelector ? t(o.settings.autoControlsSelector).html(o.controls.autoEl) : o.controls.el.addClass("bx-has-controls-auto").append(o.controls.autoEl), A(o.settings.autoStart ? "stop" : "start")
				},
				P = function() {
					o.children.each(function() {
						var e = t(this).find("img:first").attr("title");
						void 0 != e && ("" + e).length && t(this).append('<div class="bx-caption"><span>' + e + "</span></div>")
					})
				},
				y = function(t) {
					o.settings.auto && r.stopAuto(), r.goToNextSlide(), t.preventDefault()
				},
				z = function(t) {
					o.settings.auto && r.stopAuto(), r.goToPrevSlide(), t.preventDefault()
				},
				k = function(t) {
					r.startAuto(), t.preventDefault()
				},
				M = function(t) {
					r.stopAuto(), t.preventDefault()
				},
				I = function(e) {
					o.settings.auto && r.stopAuto();
					var i = t(e.currentTarget),
					s = parseInt(i.attr("data-slide-index"));
					s != o.active.index && r.goToSlide(s), e.preventDefault()
				},
				q = function(e) {
					var i = o.children.length;
					return "short" == o.settings.pagerType ? (o.settings.maxSlides > 1 && (i = Math.ceil(o.children.length / o.settings.maxSlides)), o.pagerEl.html(e + 1 + o.settings.pagerShortSeparator + i), void 0) : (o.pagerEl.find("a").removeClass("active"), o.pagerEl.each(function(i, s) {
						t(s).find("a").eq(e).addClass("active")
					}), void 0)
				},
				D = function() {
					if (o.settings.infiniteLoop) {
						var t = "";
						0 == o.active.index ? t = o.children.eq(0).position() : o.active.index == x() - 1 && o.carousel ? t = o.children.eq((x() - 1) * m()).position() : o.active.index == o.children.length - 1 && (t = o.children.eq(o.children.length - 1).position()), t && ("horizontal" == o.settings.mode ? b(-t.left, "reset", 0) : "vertical" == o.settings.mode && b(-t.top, "reset", 0))
					}
					o.working = !1, o.settings.onSlideAfter(o.children.eq(o.active.index), o.oldIndex, o.active.index)
				},
				A = function(t) {
					o.settings.autoControlsCombine ? o.controls.autoEl.html(o.controls[t]) : (o.controls.autoEl.find("a").removeClass("active"), o.controls.autoEl.find("a:not(.bx-" + t + ")").addClass("active"))
				},
				W = function() {
					1 == x() ? (o.controls.prev.addClass("disabled"), o.controls.next.addClass("disabled")) : !o.settings.infiniteLoop && o.settings.hideControlOnEnd && (0 == o.active.index ? (o.controls.prev.addClass("disabled"), o.controls.next.removeClass("disabled")) : o.active.index == x() - 1 ? (o.controls.next.addClass("disabled"), o.controls.prev.removeClass("disabled")) : (o.controls.prev.removeClass("disabled"), o.controls.next.removeClass("disabled")))
				},
				H = function() {
					o.settings.autoDelay > 0 ? setTimeout(r.startAuto, o.settings.autoDelay) : r.startAuto(), o.settings.autoHover && r.hover(function() {
						o.interval && (r.stopAuto(!0), o.autoPaused = !0)
					}, function() {
						o.autoPaused && (r.startAuto(!0), o.autoPaused = null)
					})
				},
				L = function() {
					var e = 0;
					if ("next" == o.settings.autoDirection) r.append(o.children.clone().addClass("bx-clone"));
					else {
						r.prepend(o.children.clone().addClass("bx-clone"));
						var i = o.children.first().position();
						e = "horizontal" == o.settings.mode ? -i.left : -i.top
					}
					b(e, "reset", 0), o.settings.pager = !1, o.settings.controls = !1, o.settings.autoControls = !1, o.settings.tickerHover && !o.usingCSS && o.viewport.hover(function() {
						r.stop()
					}, function() {
						var e = 0;
						o.children.each(function() {
							e += "horizontal" == o.settings.mode ? t(this).outerWidth(!0) : t(this).outerHeight(!0)
						});
						var i = o.settings.speed / e,
						s = "horizontal" == o.settings.mode ? "left" : "top",
						n = i * (e - Math.abs(parseInt(r.css(s))));
						N(n)
					}), N()
				},
				N = function(t) {
					speed = t ? t : o.settings.speed;
					var e = {
						left: 0,
						top: 0
					},
					i = {
						left: 0,
						top: 0
					};
					"next" == o.settings.autoDirection ? e = r.find(".bx-clone").first().position() : i = o.children.first().position();
					var s = "horizontal" == o.settings.mode ? -e.left : -e.top,
					n = "horizontal" == o.settings.mode ? -i.left : -i.top,
					a = {
						resetValue: n
					};
					b(s, "ticker", speed, a)
				},
				O = function() {
					o.touch = {
						start: {
							x: 0,
							y: 0
						},
						end: {
							x: 0,
							y: 0
						}
					}, o.viewport.bind("touchstart", X)
				},
				X = function(t) {
					if (o.working) t.preventDefault();
					else {
						o.touch.originalPos = r.position();
						var e = t.originalEvent;
						o.touch.start.x = e.changedTouches[0].pageX, o.touch.start.y = e.changedTouches[0].pageY, o.viewport.bind("touchmove", Y), o.viewport.bind("touchend", V)
					}
				},
				Y = function(t) {
					var e = t.originalEvent,
					i = Math.abs(e.changedTouches[0].pageX - o.touch.start.x),
					s = Math.abs(e.changedTouches[0].pageY - o.touch.start.y);
					if (3 * i > s && o.settings.preventDefaultSwipeX ? t.preventDefault() : 3 * s > i && o.settings.preventDefaultSwipeY && t.preventDefault(), "fade" != o.settings.mode && o.settings.oneToOneTouch) {
						var n = 0;
						if ("horizontal" == o.settings.mode) {
							var r = e.changedTouches[0].pageX - o.touch.start.x;
							n = o.touch.originalPos.left + r
						} else {
							var r = e.changedTouches[0].pageY - o.touch.start.y;
							n = o.touch.originalPos.top + r
						}
						b(n, "reset", 0)
					}
				},
				V = function(t) {
					o.viewport.unbind("touchmove", Y);
					var e = t.originalEvent,
					i = 0;
					if (o.touch.end.x = e.changedTouches[0].pageX, o.touch.end.y = e.changedTouches[0].pageY, "fade" == o.settings.mode) {
						var s = Math.abs(o.touch.start.x - o.touch.end.x);
						s >= o.settings.swipeThreshold && (o.touch.start.x > o.touch.end.x ? r.goToNextSlide() : r.goToPrevSlide(), r.stopAuto())
					} else {
						var s = 0;
						"horizontal" == o.settings.mode ? (s = o.touch.end.x - o.touch.start.x, i = o.touch.originalPos.left) : (s = o.touch.end.y - o.touch.start.y, i = o.touch.originalPos.top), !o.settings.infiniteLoop && (0 == o.active.index && s > 0 || o.active.last && 0 > s) ? b(i, "reset", 200) : Math.abs(s) >= o.settings.swipeThreshold ? (0 > s ? r.goToNextSlide() : r.goToPrevSlide(), r.stopAuto()) : b(i, "reset", 200)
					}
					o.viewport.unbind("touchend", V)
				},
				Z = function() {
					var e = t(window).width(),
					i = t(window).height();
					(a != e || l != i) && (a = e, l = i, r.redrawSlider(), o.settings.onSliderResize.call(r, o.active.index))
				};
				return r.goToSlide = function(e, i) {
					if (!o.working && o.active.index != e)
						if (o.working = !0, o.oldIndex = o.active.index, o.active.index = 0 > e ? x() - 1 : e >= x() ? 0 : e, o.settings.onSlideBefore(o.children.eq(o.active.index), o.oldIndex, o.active.index), "next" == i ? o.settings.onSlideNext(o.children.eq(o.active.index), o.oldIndex, o.active.index) : "prev" == i && o.settings.onSlidePrev(o.children.eq(o.active.index), o.oldIndex, o.active.index), o.active.last = o.active.index >= x() - 1, o.settings.pager && q(o.active.index), o.settings.controls && W(), "fade" == o.settings.mode) o.settings.adaptiveHeight && o.viewport.height() != v() && o.viewport.animate({
							height: v()
						}, o.settings.adaptiveHeightSpeed), o.children.filter(":visible").fadeOut(o.settings.speed).css({
							zIndex: 0
						}), o.children.eq(o.active.index).css("zIndex", o.settings.slideZIndex + 1).fadeIn(o.settings.speed, function() {
							t(this).css("zIndex", o.settings.slideZIndex), D()
						});
						else {
							o.settings.adaptiveHeight && o.viewport.height() != v() && o.viewport.animate({
								height: v()
							}, o.settings.adaptiveHeightSpeed);
							var s = 0,
							n = {
								left: 0,
								top: 0
							};
							if (!o.settings.infiniteLoop && o.carousel && o.active.last)
								if ("horizontal" == o.settings.mode) {
									var a = o.children.eq(o.children.length - 1);
									n = a.position(), s = o.viewport.width() - a.outerWidth()
								} else {
									var l = o.children.length - o.settings.minSlides;
									n = o.children.eq(l).position()
								}
								else if (o.carousel && o.active.last && "prev" == i) {
									var d = 1 == o.settings.moveSlides ? o.settings.maxSlides - m() : (x() - 1) * m() - (o.children.length - o.settings.maxSlides),
									a = r.children(".bx-clone").eq(d);
									n = a.position()
								} else if ("next" == i && 0 == o.active.index) n = r.find("> .bx-clone").eq(o.settings.maxSlides).position(), o.active.last = !1;
								else if (e >= 0) {
									var c = e * m();
									n = o.children.eq(c).position()
								}
								if ("undefined" != typeof n) {
									var g = "horizontal" == o.settings.mode ? -(n.left - s) : -n.top;
									b(g, "slide", o.settings.speed)
								}
							}
						}, r.goToNextSlide = function() {
							if (o.settings.infiniteLoop || !o.active.last) {
								var t = parseInt(o.active.index) + 1;
								r.goToSlide(t, "next")
							}
						}, r.goToPrevSlide = function() {
							if (o.settings.infiniteLoop || 0 != o.active.index) {
								var t = parseInt(o.active.index) - 1;
								r.goToSlide(t, "prev")
							}
						}, r.startAuto = function(t) {
							o.interval || (o.interval = setInterval(function() {
								"next" == o.settings.autoDirection ? r.goToNextSlide() : r.goToPrevSlide()
							}, o.settings.pause), o.settings.autoControls && 1 != t && A("stop"))
						}, r.stopAuto = function(t) {
							o.interval && (clearInterval(o.interval), o.interval = null, o.settings.autoControls && 1 != t && A("start"))
						}, r.getCurrentSlide = function() {
							return o.active.index
						}, r.getCurrentSlideElement = function() {
							return o.children.eq(o.active.index)
						}, r.getSlideCount = function() {
							return o.children.length
						}, r.redrawSlider = function() {
							o.children.add(r.find(".bx-clone")).outerWidth(u()), o.viewport.css("height", v()), o.settings.ticker || S(), o.active.last && (o.active.index = x() - 1), o.active.index >= x() && (o.active.last = !0), o.settings.pager && !o.settings.pagerCustom && (w(), q(o.active.index))
						}, r.destroySlider = function() {
							o.initialized && (o.initialized = !1, t(".bx-clone", this).remove(), o.children.each(function() {
								void 0 != t(this).data("origStyle") ? t(this).attr("style", t(this).data("origStyle")) : t(this).removeAttr("style")
							}), void 0 != t(this).data("origStyle") ? this.attr("style", t(this).data("origStyle")) : t(this).removeAttr("style"), t(this).unwrap().unwrap(), o.controls.el && o.controls.el.remove(), o.controls.next && o.controls.next.remove(), o.controls.prev && o.controls.prev.remove(), o.pagerEl && o.settings.controls && o.pagerEl.remove(), t(".bx-caption", this).remove(), o.controls.autoEl && o.controls.autoEl.remove(), clearInterval(o.interval), o.settings.responsive && t(window).unbind("resize", Z))
						}, r.reloadSlider = function(t) {
							void 0 != t && (n = t), r.destroySlider(), d()
						}, d(), this
					}
				}(jQuery);
/*!
 * jQuery Cookie Plugin v1.4.1
 * https://github.com/carhartl/jquery-cookie
 *
 * Copyright 2006, 2014 Klaus Hartl
 * Released under the MIT license
 */
 (function(factory) {
 	if (typeof define === 'function' && define.amd) {
 		define(['jquery'], factory);
 	} else if (typeof exports === 'object') {
 		module.exports = factory(require('jquery'));
 	} else {
 		factory(jQuery);
 	}
 }(function($) {
 	var pluses = /\+/g;

 	function encode(s) {
 		return config.raw ? s : encodeURIComponent(s);
 	}

 	function decode(s) {
 		return config.raw ? s : decodeURIComponent(s);
 	}

 	function stringifyCookieValue(value) {
 		return encode(config.json ? JSON.stringify(value) : String(value));
 	}

 	function parseCookieValue(s) {
 		if (s.indexOf('"') === 0) {
 			s = s.slice(1, -1).replace(/\\"/g, '"').replace(/\\\\/g, '\\');
 		}
 		try {
 			s = decodeURIComponent(s.replace(pluses, ' '));
 			return config.json ? JSON.parse(s) : s;
 		} catch (e) {}
 	}

 	function read(s, converter) {
 		var value = config.raw ? s : parseCookieValue(s);
 		return $.isFunction(converter) ? converter(value) : value;
 	}
 	var config = $.cookie = function(key, value, options) {
 		if (arguments.length > 1 && !$.isFunction(value)) {
 			options = $.extend({}, config.defaults, options);
 			if (typeof options.expires === 'number') {
 				var days = options.expires,
 				t = options.expires = new Date();
 				t.setMilliseconds(t.getMilliseconds() + days * 864e+5);
 			}
 			return (document.cookie = [encode(key), '=', stringifyCookieValue(value), options.expires ? '; expires=' + options.expires.toUTCString() : '', options.path ? '; path=' + options.path : '', options.domain ? '; domain=' + options.domain : '', options.secure ? '; secure' : ''].join(''));
 		}
 		var result = key ? undefined : {},
 		cookies = document.cookie ? document.cookie.split('; ') : [],
 		i = 0,
 		l = cookies.length;
 		for (; i < l; i++) {
 			var parts = cookies[i].split('='),
 			name = decode(parts.shift()),
 			cookie = parts.join('=');
 			if (key === name) {
 				result = read(cookie, value);
 				break;
 			}
 			if (!key && (cookie = read(cookie)) !== undefined) {
 				result[name] = cookie;
 			}
 		}
 		return result;
 	};
 	config.defaults = {};
 	$.removeCookie = function(key, options) {
 		$.cookie(key, '', $.extend({}, options, {
 			expires: -1
 		}));
 		return !$.cookie(key);
 	};
 }));;;
/*!
 * fancyBox - jQuery Plugin
 * version: 2.1.5 (Fri, 14 Jun 2013)
 * @requires jQuery v1.6 or later
 *
 * Examples at http://fancyapps.com/fancybox/
 * License: www.fancyapps.com/fancybox/#license
 *
 * Copyright 2012 Janis Skarnelis - janis@fancyapps.com
 *
 */
 (function(window, document, $, undefined) {
 	"use strict";
 	var H = $("html"),
 	W = $(window),
 	D = $(document),
 	F = $.fancybox = function() {
 		F.open.apply(this, arguments);
 	},
 	IE = navigator.userAgent.match(/msie/i),
 	didUpdate = null,
 	isTouch = document.createTouch !== undefined,
 	isQuery = function(obj) {
 		return obj && obj.hasOwnProperty && obj instanceof $;
 	},
 	isString = function(str) {
 		return str && $.type(str) === "string";
 	},
 	isPercentage = function(str) {
 		return isString(str) && str.indexOf('%') > 0;
 	},
 	isScrollable = function(el) {
 		return (el && !(el.style.overflow && el.style.overflow === 'hidden') && ((el.clientWidth && el.scrollWidth > el.clientWidth) || (el.clientHeight && el.scrollHeight > el.clientHeight)));
 	},
 	getScalar = function(orig, dim) {
 		var value = parseInt(orig, 10) || 0;
 		if (dim && isPercentage(orig)) {
 			value = F.getViewport()[dim] / 100 * value;
 		}
 		return Math.ceil(value);
 	},
 	getValue = function(value, dim) {
 		return getScalar(value, dim) + 'px';
 	};
 	$.extend(F, {
 		version: '2.1.5',
 		defaults: {
 			padding: 15,
 			margin: 20,
 			minWidth: 100,
 			minHeight: 100,
 			maxWidth: 9999,
 			maxHeight: 9999,
 			pixelRatio: 1,
 			autoSize: true,
 			autoHeight: false,
 			autoWidth: false,
 			fitToViewHeight: true,
 			autoResize: true,
 			autoCenter: !isTouch,
 			fitToView: true,
 			aspectRatio: false,
 			topRatio: 0.5,
 			leftRatio: 0.5,
 			scrolling: 'auto',
 			wrapCSS: '',
 			arrows: true,
 			closeBtn: true,
 			closeClick: false,
 			nextClick: false,
 			mouseWheel: true,
 			autoPlay: false,
 			playSpeed: 3000,
 			preload: 3,
 			modal: false,
 			loop: true,
 			ajax: {
 				dataType: 'html',
 				headers: {
 					'X-fancyBox': true
 				}
 			},
 			iframe: {
 				scrolling: 'auto',
 				preload: true
 			},
 			swf: {
 				wmode: 'transparent',
 				allowfullscreen: 'true',
 				allowscriptaccess: 'always'
 			},
 			keys: {
 				next: {
 					13: 'left',
 					34: 'up',
 					39: 'left',
 					40: 'up'
 				},
 				prev: {
 					8: 'right',
 					33: 'down',
 					37: 'right',
 					38: 'down'
 				},
 				close: [27],
 				play: [32],
 				toggle: [70]
 			},
 			direction: {
 				next: 'left',
 				prev: 'right'
 			},
 			scrollOutside: true,
 			index: 0,
 			type: null,
 			href: null,
 			content: null,
 			title: null,
 			tpl: {
 				wrap: '<div class="fancybox-wrap" tabIndex="-1"><div class="fancybox-skin"><div class="fancybox-outer"><div class="fancybox-inner"></div></div></div></div>',
 				image: '<img class="fancybox-image" src="{href}" alt="" />',
 				iframe: '<iframe id="fancybox-frame{rnd}" name="fancybox-frame{rnd}" class="fancybox-iframe" frameborder="0" vspace="0" hspace="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen' + (IE ? ' allowtransparency="true"' : '') + '></iframe>',
 				error: '<p class="fancybox-error">The requested content cannot be loaded.<br/>Please try again later.</p>',
 				closeBtn: '<a title="Close" class="fancybox-item fancybox-close" href="javascript:;"></a>',
 				next: '<a title="Next" class="fancybox-nav fancybox-next" href="javascript:;"><span></span></a>',
 				prev: '<a title="Previous" class="fancybox-nav fancybox-prev" href="javascript:;"><span></span></a>'
 			},
 			openEffect: 'fade',
 			openSpeed: 250,
 			openEasing: 'swing',
 			openOpacity: true,
 			openMethod: 'zoomIn',
 			closeEffect: 'fade',
 			closeSpeed: 250,
 			closeEasing: 'swing',
 			closeOpacity: true,
 			closeMethod: 'zoomOut',
 			nextEffect: 'elastic',
 			nextSpeed: 250,
 			nextEasing: 'swing',
 			nextMethod: 'changeIn',
 			prevEffect: 'elastic',
 			prevSpeed: 250,
 			prevEasing: 'swing',
 			prevMethod: 'changeOut',
 			helpers: {
 				overlay: true,
 				title: true
 			},
 			onCancel: $.noop,
 			beforeLoad: $.noop,
 			afterLoad: $.noop,
 			beforeShow: $.noop,
 			afterShow: $.noop,
 			beforeChange: $.noop,
 			beforeClose: $.noop,
 			afterClose: $.noop
 		},
 		group: {},
 		opts: {},
 		previous: null,
 		coming: null,
 		current: null,
 		isActive: false,
 		isOpen: false,
 		isOpened: false,
 		wrap: null,
 		skin: null,
 		outer: null,
 		inner: null,
 		player: {
 			timer: null,
 			isActive: false
 		},
 		ajaxLoad: null,
 		imgPreload: null,
 		transitions: {},
 		helpers: {},
 		open: function(group, opts) {
 			if (!group) {
 				return;
 			}
 			if (!$.isPlainObject(opts)) {
 				opts = {};
 			}
 			if (false === F.close(true)) {
 				return;
 			}
 			if (!$.isArray(group)) {
 				group = isQuery(group) ? $(group).get() : [group];
 			}
 			$.each(group, function(i, element) {
 				var obj = {},
 				href, title, content, type, rez, hrefParts, selector;
 				if ($.type(element) === "object") {
 					if (element.nodeType) {
 						element = $(element);
 					}
 					if (isQuery(element)) {
 						obj = {
 							href: element.data('fancybox-href') || element.attr('href'),
 							title: element.data('fancybox-title') || element.attr('title'),
 							isDom: true,
 							element: element
 						};
 						if ($.metadata) {
 							$.extend(true, obj, element.metadata());
 						}
 					} else {
 						obj = element;
 					}
 				}
 				href = opts.href || obj.href || (isString(element) ? element : null);
 				title = opts.title !== undefined ? opts.title : obj.title || '';
 				content = opts.content || obj.content;
 				type = content ? 'html' : (opts.type || obj.type);
 				if (!type && obj.isDom) {
 					type = element.data('fancybox-type');
 					if (!type) {
 						rez = element.prop('class').match(/fancybox\.(\w+)/);
 						type = rez ? rez[1] : null;
 					}
 				}
 				if (isString(href)) {
 					if (!type) {
 						if (F.isImage(href)) {
 							type = 'image';
 						} else if (F.isSWF(href)) {
 							type = 'swf';
 						} else if (href.charAt(0) === '#') {
 							type = 'inline';
 						} else if (isString(element)) {
 							type = 'html';
 							content = element;
 						}
 					}
 					if (type === 'ajax') {
 						hrefParts = href.split(/\s+/, 2);
 						href = hrefParts.shift();
 						selector = hrefParts.shift();
 					}
 				}
 				if (!content) {
 					if (type === 'inline') {
 						if (href) {
 							content = $(isString(href) ? href.replace(/.*(?=#[^\s]+$)/, '') : href);
 						} else if (obj.isDom) {
 							content = element;
 						}
 					} else if (type === 'html') {
 						content = href;
 					} else if (!type && !href && obj.isDom) {
 						type = 'inline';
 						content = element;
 					}
 				}
 				$.extend(obj, {
 					href: href,
 					type: type,
 					content: content,
 					title: title,
 					selector: selector
 				});
 				group[i] = obj;
 			});
 			F.opts = $.extend(true, {}, F.defaults, opts);
 			if (opts.keys !== undefined) {
 				F.opts.keys = opts.keys ? $.extend({}, F.defaults.keys, opts.keys) : false;
 			}
 			F.group = group;
 			return F._start(F.opts.index);
 		},
 		cancel: function() {
 			var coming = F.coming;
 			if (!coming || false === F.trigger('onCancel')) {
 				return;
 			}
 			F.hideLoading();
 			if (F.ajaxLoad) {
 				F.ajaxLoad.abort();
 			}
 			F.ajaxLoad = null;
 			if (F.imgPreload) {
 				F.imgPreload.onload = F.imgPreload.onerror = null;
 			}
 			if (coming.wrap) {
 				coming.wrap.stop(true, true).trigger('onReset').remove();
 			}
 			F.coming = null;
 			if (!F.current) {
 				F._afterZoomOut(coming);
 			}
 		},
 		close: function(event) {
 			F.cancel();
 			if (false === F.trigger('beforeClose')) {
 				return;
 			}
 			F.unbindEvents();
 			if (!F.isActive) {
 				return;
 			}
 			if (!F.isOpen || event === true) {
 				$('.fancybox-wrap').stop(true).trigger('onReset').remove();
 				F._afterZoomOut();
 			} else {
 				F.isOpen = F.isOpened = false;
 				F.isClosing = true;
 				$('.fancybox-item, .fancybox-nav').remove();
 				F.wrap.stop(true, true).removeClass('fancybox-opened');
 				F.transitions[F.current.closeMethod]();
 			}
 		},
 		play: function(action) {
 			var clear = function() {
 				clearTimeout(F.player.timer);
 			},
 			set = function() {
 				clear();
 				if (F.current && F.player.isActive) {
 					F.player.timer = setTimeout(F.next, F.current.playSpeed);
 				}
 			},
 			stop = function() {
 				clear();
 				D.unbind('.player');
 				F.player.isActive = false;
 				F.trigger('onPlayEnd');
 			},
 			start = function() {
 				if (F.current && (F.current.loop || F.current.index < F.group.length - 1)) {
 					F.player.isActive = true;
 					D.bind({
 						'onCancel.player beforeClose.player': stop,
 						'onUpdate.player': set,
 						'beforeLoad.player': clear
 					});
 					set();
 					F.trigger('onPlayStart');
 				}
 			};
 			if (action === true || (!F.player.isActive && action !== false)) {
 				start();
 			} else {
 				stop();
 			}
 		},
 		next: function(direction) {
 			var current = F.current;
 			if (current) {
 				if (!isString(direction)) {
 					direction = current.direction.next;
 				}
 				F.jumpto(current.index + 1, direction, 'next');
 			}
 		},
 		prev: function(direction) {
 			var current = F.current;
 			if (current) {
 				if (!isString(direction)) {
 					direction = current.direction.prev;
 				}
 				F.jumpto(current.index - 1, direction, 'prev');
 			}
 		},
 		jumpto: function(index, direction, router) {
 			var current = F.current;
 			if (!current) {
 				return;
 			}
 			index = getScalar(index);
 			F.direction = direction || current.direction[(index >= current.index ? 'next' : 'prev')];
 			F.router = router || 'jumpto';
 			if (current.loop) {
 				if (index < 0) {
 					index = current.group.length + (index % current.group.length);
 				}
 				index = index % current.group.length;
 			}
 			if (current.group[index] !== undefined) {
 				F.cancel();
 				F._start(index);
 			}
 		},
 		reposition: function(e, onlyAbsolute) {
 			var current = F.current,
 			wrap = current ? current.wrap : null,
 			pos;
 			if (wrap) {
 				pos = F._getPosition(onlyAbsolute);
 				if (e && e.type === 'scroll') {
 					delete pos.position;
 				} else {
 					wrap.css(pos);
 					current.pos = $.extend({}, current.dim, pos);
 				}
 			}
 		},
 		update: function(e) {
 			var type = (e && e.type),
 			anyway = !type || type === 'orientationchange';
 			if (anyway) {
 				clearTimeout(didUpdate);
 				didUpdate = null;
 			}
 			if (!F.isOpen || didUpdate) {
 				return;
 			}
 			didUpdate = setTimeout(function() {
 				var current = F.current;
 				if (!current || F.isClosing) {
 					return;
 				}
 				F.wrap.removeClass('fancybox-tmp');
 				if (anyway || type === 'load' || (type === 'resize' && current.autoResize)) {
 					F._setDimension();
 				}
 				if (!(type === 'scroll' && current.canShrink)) {
 					F.reposition(e);
 				}
 				F.trigger('onUpdate');
 				didUpdate = null;
 			}, (anyway && !isTouch ? 0 : 300));
 		},
 		toggle: function(action) {
 			if (F.isOpen) {
 				F.current.fitToView = $.type(action) === "boolean" ? action : !F.current.fitToView;
 				if (isTouch) {
 					F.wrap.removeAttr('style').addClass('fancybox-tmp');
 					F.trigger('onUpdate');
 				}
 				F.update();
 			}
 		},
 		hideLoading: function() {
 			D.unbind('.loading');
 			$('#fancybox-loading').remove();
 		},
 		showLoading: function() {
 			var el, viewport;
 			F.hideLoading();
 			el = $('<div id="fancybox-loading"><div></div></div>').click(F.cancel).appendTo('body');
 			D.bind('keydown.loading', function(e) {
 				if ((e.which || e.keyCode) === 27) {
 					e.preventDefault();
 					F.cancel();
 				}
 			});
 			if (!F.defaults.fixed) {
 				viewport = F.getViewport();
 				el.css({
 					position: 'absolute',
 					top: (viewport.h * 0.5) + viewport.y,
 					left: (viewport.w * 0.5) + viewport.x
 				});
 			}
 		},
 		getViewport: function() {
 			var locked = (F.current && F.current.locked) || false,
 			rez = {
 				x: W.scrollLeft(),
 				y: W.scrollTop()
 			};
 			if (locked) {
 				rez.w = locked[0].clientWidth;
 				rez.h = locked[0].clientHeight;
 			} else {
 				rez.w = isTouch && window.innerWidth ? window.innerWidth : W.width();
 				rez.h = isTouch && window.innerHeight ? window.innerHeight : W.height();
 			}
 			return rez;
 		},
 		unbindEvents: function() {
 			if (F.wrap && isQuery(F.wrap)) {
 				F.wrap.unbind('.fb');
 			}
 			D.unbind('.fb');
 			W.unbind('.fb');
 		},
 		bindEvents: function() {
 			var current = F.current,
 			keys;
 			if (!current) {
 				return;
 			}
 			W.bind('orientationchange.fb' + (isTouch ? '' : ' resize.fb') + (current.autoCenter && !current.locked ? ' scroll.fb' : ''), F.update);
 			keys = current.keys;
 			if (keys) {
 				D.bind('keydown.fb', function(e) {
 					var code = e.which || e.keyCode,
 					target = e.target || e.srcElement;
 					if (code === 27 && F.coming) {
 						return false;
 					}
 					if (!e.ctrlKey && !e.altKey && !e.shiftKey && !e.metaKey && !(target && (target.type || $(target).is('[contenteditable]')))) {
 						$.each(keys, function(i, val) {
 							if (current.group.length > 1 && val[code] !== undefined) {
 								F[i](val[code]);
 								e.preventDefault();
 								return false;
 							}
 							if ($.inArray(code, val) > -1) {
 								F[i]();
 								e.preventDefault();
 								return false;
 							}
 						});
 					}
 				});
 			}
 			if ($.fn.mousewheel && current.mouseWheel) {
 				F.wrap.bind('mousewheel.fb', function(e, delta, deltaX, deltaY) {
 					var target = e.target || null,
 					parent = $(target),
 					canScroll = false;
 					while (parent.length) {
 						if (canScroll || parent.is('.fancybox-skin') || parent.is('.fancybox-wrap')) {
 							break;
 						}
 						canScroll = isScrollable(parent[0]);
 						parent = $(parent).parent();
 					}
 					if (delta !== 0 && !canScroll) {
 						if (F.group.length > 1 && !current.canShrink) {
 							if (deltaY > 0 || deltaX > 0) {
 								F.prev(deltaY > 0 ? 'down' : 'left');
 							} else if (deltaY < 0 || deltaX < 0) {
 								F.next(deltaY < 0 ? 'up' : 'right');
 							}
 							e.preventDefault();
 						}
 					}
 				});
 			}
 		},
 		trigger: function(event, o) {
 			var ret, obj = o || F.coming || F.current;
 			if (!obj) {
 				return;
 			}
 			if ($.isFunction(obj[event])) {
 				ret = obj[event].apply(obj, Array.prototype.slice.call(arguments, 1));
 			}
 			if (ret === false) {
 				return false;
 			}
 			if (obj.helpers) {
 				$.each(obj.helpers, function(helper, opts) {
 					if (opts && F.helpers[helper] && $.isFunction(F.helpers[helper][event])) {
 						F.helpers[helper][event]($.extend(true, {}, F.helpers[helper].defaults, opts), obj);
 					}
 				});
 			}
 			D.trigger(event);
 		},
 		isImage: function(str) {
 			return isString(str) && str.match(/(^data:image\/.*,)|(\.(jp(e|g|eg)|gif|png|bmp|webp|svg)((\?|#).*)?$)/i);
 		},
 		isSWF: function(str) {
 			return isString(str) && str.match(/\.(swf)((\?|#).*)?$/i);
 		},
 		_start: function(index) {
 			var coming = {},
 			obj, href, type, margin, padding;
 			index = getScalar(index);
 			obj = F.group[index] || null;
 			if (!obj) {
 				return false;
 			}
 			coming = $.extend(true, {}, F.opts, obj);
 			margin = coming.margin;
 			padding = coming.padding;
 			if ($.type(margin) === 'number') {
 				coming.margin = [margin, margin, margin, margin];
 			}
 			if ($.type(padding) === 'number') {
 				coming.padding = [padding, padding, padding, padding];
 			}
 			if (coming.modal) {
 				$.extend(true, coming, {
 					closeBtn: false,
 					closeClick: false,
 					nextClick: false,
 					arrows: false,
 					mouseWheel: false,
 					keys: null,
 					helpers: {
 						overlay: {
 							closeClick: false
 						}
 					}
 				});
 			}
 			if (coming.autoSize) {
 				coming.autoWidth = coming.autoHeight = true;
 			}
 			if (coming.width === 'auto') {
 				coming.autoWidth = true;
 			}
 			if (coming.height === 'auto') {
 				coming.autoHeight = true;
 			}
 			coming.group = F.group;
 			coming.index = index;
 			F.coming = coming;
 			if (false === F.trigger('beforeLoad')) {
 				F.coming = null;
 				return;
 			}
 			type = coming.type;
 			href = coming.href;
 			if (!type) {
 				F.coming = null;
 				if (F.current && F.router && F.router !== 'jumpto') {
 					F.current.index = index;
 					return F[F.router](F.direction);
 				}
 				return false;
 			}
 			F.isActive = true;
 			if (type === 'image' || type === 'swf') {
 				coming.autoHeight = coming.autoWidth = false;
 				coming.scrolling = 'visible';
 			}
 			if (type === 'image') {
 				coming.aspectRatio = true;
 			}
 			if (type === 'iframe' && isTouch) {
 				coming.scrolling = 'scroll';
 			}
 			coming.wrap = $(coming.tpl.wrap).addClass('fancybox-' + (isTouch ? 'mobile' : 'desktop') + ' fancybox-type-' + type + ' fancybox-tmp ' + coming.wrapCSS).appendTo(coming.parent || 'body');
 			$.extend(coming, {
 				skin: $('.fancybox-skin', coming.wrap),
 				outer: $('.fancybox-outer', coming.wrap),
 				inner: $('.fancybox-inner', coming.wrap)
 			});
 			$.each(["Top", "Right", "Bottom", "Left"], function(i, v) {
 				coming.skin.css('padding' + v, getValue(coming.padding[i]));
 			});
 			F.trigger('onReady');
 			if (type === 'inline' || type === 'html') {
 				if (!coming.content || !coming.content.length) {
 					return F._error('content');
 				}
 			} else if (!href) {
 				return F._error('href');
 			}
 			if (type === 'image') {
 				F._loadImage();
 			} else if (type === 'ajax') {
 				F._loadAjax();
 			} else if (type === 'iframe') {
 				F._loadIframe();
 			} else {
 				F._afterLoad();
 			}
 		},
 		_error: function(type) {
 			$.extend(F.coming, {
 				type: 'html',
 				autoWidth: true,
 				autoHeight: true,
 				minWidth: 0,
 				minHeight: 0,
 				scrolling: 'no',
 				hasError: type,
 				content: F.coming.tpl.error
 			});
 			F._afterLoad();
 		},
 		_loadImage: function() {
 			var img = F.imgPreload = new Image();
 			img.onload = function() {
 				this.onload = this.onerror = null;
 				F.coming.width = this.width / F.opts.pixelRatio;
 				F.coming.height = this.height / F.opts.pixelRatio;
 				F._afterLoad();
 			};
 			img.onerror = function() {
 				this.onload = this.onerror = null;
 				F._error('image');
 			};
 			img.src = F.coming.href;
 			if (img.complete !== true) {
 				F.showLoading();
 			}
 		},
 		_loadAjax: function() {
 			var coming = F.coming;
 			F.showLoading();
 			F.ajaxLoad = $.ajax($.extend({}, coming.ajax, {
 				url: coming.href,
 				error: function(jqXHR, textStatus) {
 					if (F.coming && textStatus !== 'abort') {
 						F._error('ajax', jqXHR);
 					} else {
 						F.hideLoading();
 					}
 				},
 				success: function(data, textStatus) {
 					if (textStatus === 'success') {
 						coming.content = data;
 						F._afterLoad();
 					}
 				}
 			}));
 		},
 		_loadIframe: function() {
 			var coming = F.coming,
 			iframe = $(coming.tpl.iframe.replace(/\{rnd\}/g, new Date().getTime())).attr('scrolling', isTouch ? 'auto' : coming.iframe.scrolling).attr('src', coming.href);
 			$(coming.wrap).bind('onReset', function() {
 				try {
 					$(this).find('iframe').hide().attr('src', '//about:blank').end().empty();
 				} catch (e) {}
 			});
 			if (coming.iframe.preload) {
 				F.showLoading();
 				iframe.one('load', function() {
 					$(this).data('ready', 1);
 					if (!isTouch) {
 						$(this).bind('load.fb', F.update);
 					}
 					$(this).parents('.fancybox-wrap').width('100%').removeClass('fancybox-tmp').show();
 					F._afterLoad();
 				});
 			}
 			coming.content = iframe.appendTo(coming.inner);
 			if (!coming.iframe.preload) {
 				F._afterLoad();
 			}
 		},
 		_preloadImages: function() {
 			var group = F.group,
 			current = F.current,
 			len = group.length,
 			cnt = current.preload ? Math.min(current.preload, len - 1) : 0,
 			item, i;
 			for (i = 1; i <= cnt; i += 1) {
 				item = group[(current.index + i) % len];
 				if (item.type === 'image' && item.href) {
 					new Image().src = item.href;
 				}
 			}
 		},
 		_afterLoad: function() {
 			var coming = F.coming,
 			previous = F.current,
 			placeholder = 'fancybox-placeholder',
 			current, content, type, scrolling, href, embed;
 			F.hideLoading();
 			if (!coming || F.isActive === false) {
 				return;
 			}
 			if (false === F.trigger('afterLoad', coming, previous)) {
 				coming.wrap.stop(true).trigger('onReset').remove();
 				F.coming = null;
 				return;
 			}
 			if (previous) {
 				F.trigger('beforeChange', previous);
 				previous.wrap.stop(true).removeClass('fancybox-opened').find('.fancybox-item, .fancybox-nav').remove();
 			}
 			F.unbindEvents();
 			current = coming;
 			content = coming.content;
 			type = coming.type;
 			scrolling = coming.scrolling;
 			$.extend(F, {
 				wrap: current.wrap,
 				skin: current.skin,
 				outer: current.outer,
 				inner: current.inner,
 				current: current,
 				previous: previous
 			});
 			href = current.href;
 			switch (type) {
 				case 'inline':
 				case 'ajax':
 				case 'html':
 				if (current.selector) {
 					content = $('<div>').html(content).find(current.selector);
 				} else if (isQuery(content)) {
 					if (!content.data(placeholder)) {
 						content.data(placeholder, $('<div class="' + placeholder + '"></div>').insertAfter(content).hide());
 					}
 					content = content.show().detach();
 					current.wrap.bind('onReset', function() {
 						if ($(this).find(content).length) {
 							content.hide().replaceAll(content.data(placeholder)).data(placeholder, false);
 						}
 					});
 				}
 				break;
 				case 'image':
 				content = current.tpl.image.replace('{href}', href);
 				break;
 				case 'swf':
 				content = '<object id="fancybox-swf" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="100%" height="100%"><param name="movie" value="' + href + '"></param>';
 				embed = '';
 				$.each(current.swf, function(name, val) {
 					content += '<param name="' + name + '" value="' + val + '"></param>';
 					embed += ' ' + name + '="' + val + '"';
 				});
 				content += '<embed src="' + href + '" type="application/x-shockwave-flash" width="100%" height="100%"' + embed + '></embed></object>';
 				break;
 			}
 			if (!(isQuery(content) && content.parent().is(current.inner))) {
 				current.inner.append(content);
 			}
 			F.trigger('beforeShow');
 			current.inner.css('overflow', scrolling === 'yes' ? 'scroll' : (scrolling === 'no' ? 'hidden' : scrolling));
 			F._setDimension();
 			F.reposition();
 			F.isOpen = false;
 			F.coming = null;
 			F.bindEvents();
 			if (!F.isOpened) {
 				$('.fancybox-wrap').not(current.wrap).stop(true).trigger('onReset').remove();
 			} else if (previous.prevMethod) {
 				F.transitions[previous.prevMethod]();
 			}
 			F.transitions[F.isOpened ? current.nextMethod : current.openMethod]();
 			F._preloadImages();
 		},
 		_setDimension: function() {
 			var viewport = F.getViewport(),
 			steps = 0,
 			canShrink = false,
 			canExpand = false,
 			wrap = F.wrap,
 			skin = F.skin,
 			inner = F.inner,
 			current = F.current,
 			width = current.width,
 			height = current.height,
 			minWidth = current.minWidth,
 			minHeight = current.minHeight,
 			maxWidth = current.maxWidth,
 			maxHeight = current.maxHeight,
 			scrolling = current.scrolling,
 			scrollOut = current.scrollOutside ? current.scrollbarWidth : 0,
 			margin = current.margin,
 			wMargin = getScalar(margin[1] + margin[3]),
 			hMargin = getScalar(margin[0] + margin[2]),
 			wPadding, hPadding, wSpace, hSpace, origWidth, origHeight, origMaxWidth, origMaxHeight, ratio, width_, height_, maxWidth_, maxHeight_, iframe, body;
 			wrap.add(skin).add(inner).width('auto').height('auto').removeClass('fancybox-tmp');
 			wPadding = getScalar(skin.outerWidth(true) - skin.width());
 			hPadding = getScalar(skin.outerHeight(true) - skin.height());
 			wSpace = wMargin + wPadding;
 			hSpace = hMargin + hPadding;
 			origWidth = isPercentage(width) ? (viewport.w - wSpace) * getScalar(width) / 100 : width;
 			origHeight = isPercentage(height) ? (viewport.h - hSpace) * getScalar(height) / 100 : height;
 			if (current.type === 'iframe') {
 				iframe = current.content;
 				if (current.autoHeight && iframe.data('ready') === 1) {
 					try {
 						if (iframe[0].contentWindow.document.location) {
 							inner.width(origWidth).height(9999);
 							body = iframe.contents().find('body');
 							if (scrollOut) {
 								body.css('overflow-x', 'hidden');
 							}
 							origHeight = body.outerHeight(true);
 						}
 					} catch (e) {}
 				}
 			} else if (current.autoWidth || current.autoHeight) {
 				inner.addClass('fancybox-tmp');
 				if (!current.autoWidth) {
 					inner.width(origWidth);
 				}
 				if (!current.autoHeight) {
 					inner.height(origHeight);
 				}
 				if (current.autoWidth) {
 					origWidth = inner.width();
 				}
 				if (current.autoHeight) {
 					origHeight = inner.height();
 				}
 				inner.removeClass('fancybox-tmp');
 			}
 			width = getScalar(origWidth);
 			height = getScalar(origHeight);
 			ratio = origWidth / origHeight;
 			minWidth = getScalar(isPercentage(minWidth) ? getScalar(minWidth, 'w') - wSpace : minWidth);
 			maxWidth = getScalar(isPercentage(maxWidth) ? getScalar(maxWidth, 'w') - wSpace : maxWidth);
 			minHeight = getScalar(isPercentage(minHeight) ? getScalar(minHeight, 'h') - hSpace : minHeight);
 			maxHeight = getScalar(isPercentage(maxHeight) ? getScalar(maxHeight, 'h') - hSpace : maxHeight);
 			origMaxWidth = maxWidth;
 			origMaxHeight = maxHeight;
 			if (current.fitToView) {
 				maxWidth = Math.min(viewport.w - wSpace, maxWidth);
 				maxHeight = Math.min(viewport.h - hSpace, maxHeight);
 			}
 			maxWidth_ = viewport.w - wMargin;
 			maxHeight_ = viewport.h - hMargin;
 			if (current.aspectRatio) {
 				if (width > maxWidth) {
 					width = maxWidth;
 					height = getScalar(width / ratio);
 				}
 				if (height > maxHeight) {
 					height = maxHeight;
 					width = getScalar(height * ratio);
 				}
 				if (width < minWidth) {
 					width = minWidth;
 					height = getScalar(width / ratio);
 				}
 				if (height < minHeight) {
 					height = minHeight;
 					width = getScalar(height * ratio);
 				}
 			} else {
 				width = Math.max(minWidth, Math.min(width, maxWidth));
 				if (current.autoHeight && current.type !== 'iframe') {
 					inner.width(width);
 					height = inner.height();
 				}
 				height = Math.max(minHeight, Math.min(height, maxHeight));
 			}
 			if (current.fitToView) {
 				inner.width(width).height(height);
 				wrap.width(width + wPadding);
 				width_ = wrap.width();
 				height_ = wrap.height();
 				if (current.aspectRatio) {
 					while ((width_ > maxWidth_ || height_ > maxHeight_) && width > minWidth && height > minHeight) {
 						if (steps++ > 19) {
 							break;
 						}
 						height = Math.max(minHeight, Math.min(maxHeight, height - 10));
 						width = getScalar(height * ratio);
 						if (width < minWidth) {
 							width = minWidth;
 							height = getScalar(width / ratio);
 						}
 						if (width > maxWidth) {
 							width = maxWidth;
 							height = getScalar(width / ratio);
 						}
 						inner.width(width).height(height);
 						wrap.width(width + wPadding);
 						width_ = wrap.width();
 						height_ = wrap.height();
 					}
 				} else {
 					width = Math.max(minWidth, Math.min(width, width - (width_ - maxWidth_)));
 					height = Math.max(minHeight, Math.min(height, height - (height_ - maxHeight_)));
 				}
 				if (current.fitToViewHeight == false) {
 					height = 'auto';
 				}
 			}
 			if (scrollOut && scrolling === 'auto' && height < origHeight && (width + wPadding + scrollOut) < maxWidth_) {
 				width += scrollOut;
 			}
 			inner.width(width).height(height);
 			wrap.width(width + wPadding);
 			width_ = wrap.width();
 			height_ = wrap.height();
 			canShrink = (width_ > maxWidth_ || height_ > maxHeight_) && width > minWidth && height > minHeight;
 			canExpand = current.aspectRatio ? (width < origMaxWidth && height < origMaxHeight && width < origWidth && height < origHeight) : ((width < origMaxWidth || height < origMaxHeight) && (width < origWidth || height < origHeight));
 			$.extend(current, {
 				dim: {
 					width: getValue(width_),
 					height: getValue(height_)
 				},
 				origWidth: origWidth,
 				origHeight: origHeight,
 				canShrink: canShrink,
 				canExpand: canExpand,
 				wPadding: wPadding,
 				hPadding: hPadding,
 				wrapSpace: height_ - skin.outerHeight(true),
 				skinSpace: skin.height() - height
 			});
 			if (!iframe && current.autoHeight && height > minHeight && height < maxHeight && !canExpand) {
 				inner.height('auto');
 			}
 		},
 		_getPosition: function(onlyAbsolute) {
 			var current = F.current,
 			viewport = F.getViewport(),
 			margin = current.margin,
 			width = F.wrap.width() + margin[1] + margin[3],
 			height = F.wrap.height() + margin[0] + margin[2],
 			rez = {
 				position: 'absolute',
 				top: margin[0],
 				left: margin[3]
 			};
 			if (current.autoCenter && current.fixed && !onlyAbsolute && height <= viewport.h && width <= viewport.w) {
 				rez.position = 'fixed';
 			} else if (!current.locked) {
 				rez.top += viewport.y;
 				rez.left += viewport.x;
 			}
 			rez.top = getValue(Math.max(rez.top, rez.top + ((viewport.h - height) * current.topRatio)));
 			rez.left = getValue(Math.max(rez.left, rez.left + ((viewport.w - width) * current.leftRatio)));
 			return rez;
 		},
 		_afterZoomIn: function() {
 			var current = F.current;
 			if (!current) {
 				return;
 			}
 			F.isOpen = F.isOpened = true;
 			F.wrap.css('overflow', 'visible').addClass('fancybox-opened');
 			F.update();
 			if (current.closeClick || (current.nextClick && F.group.length > 1)) {
 				F.inner.css('cursor', 'pointer').bind('click.fb', function(e) {
 					if (!$(e.target).is('a') && !$(e.target).parent().is('a')) {
 						e.preventDefault();
 						F[current.closeClick ? 'close' : 'next']();
 					}
 				});
 			}
 			if (current.closeBtn) {
 				$(current.tpl.closeBtn).appendTo(F.skin).bind('click.fb', function(e) {
 					e.preventDefault();
 					F.close();
 				});
 			}
 			if (current.arrows && F.group.length > 1) {
 				if (current.loop || current.index > 0) {
 					$(current.tpl.prev).appendTo(F.outer).bind('click.fb', F.prev);
 				}
 				if (current.loop || current.index < F.group.length - 1) {
 					$(current.tpl.next).appendTo(F.outer).bind('click.fb', F.next);
 				}
 			}
 			F.trigger('afterShow');
 			if (!current.loop && current.index === current.group.length - 1) {
 				F.play(false);
 			} else if (F.opts.autoPlay && !F.player.isActive) {
 				F.opts.autoPlay = false;
 				F.play();
 			}
 		},
 		_afterZoomOut: function(obj) {
 			obj = obj || F.current;
 			$('.fancybox-wrap').trigger('onReset').remove();
 			$.extend(F, {
 				group: {},
 				opts: {},
 				router: false,
 				current: null,
 				isActive: false,
 				isOpened: false,
 				isOpen: false,
 				isClosing: false,
 				wrap: null,
 				skin: null,
 				outer: null,
 				inner: null
 			});
 			F.trigger('afterClose', obj);
 		}
 	});
F.transitions = {
	getOrigPosition: function() {
		var current = F.current,
		element = current.element,
		orig = current.orig,
		pos = {},
		width = 50,
		height = 50,
		hPadding = current.hPadding,
		wPadding = current.wPadding,
		viewport = F.getViewport();
		if (!orig && current.isDom && element.is(':visible')) {
			orig = element.find('img:first');
			if (!orig.length) {
				orig = element;
			}
		}
		if (isQuery(orig)) {
			pos = orig.offset();
			if (orig.is('img')) {
				width = orig.outerWidth();
				height = orig.outerHeight();
			}
		} else {
			pos.top = viewport.y + (viewport.h - height) * current.topRatio;
			pos.left = viewport.x + (viewport.w - width) * current.leftRatio;
		}
		if (F.wrap.css('position') === 'fixed' || current.locked) {
			pos.top -= viewport.y;
			pos.left -= viewport.x;
		}
		pos = {
			top: getValue(pos.top - hPadding * current.topRatio),
			left: getValue(pos.left - wPadding * current.leftRatio),
			width: getValue(width + wPadding),
			height: getValue(height + hPadding)
		};
		return pos;
	},
	step: function(now, fx) {
		var ratio, padding, value, prop = fx.prop,
		current = F.current,
		wrapSpace = current.wrapSpace,
		skinSpace = current.skinSpace;
		if (prop === 'width' || prop === 'height') {
			ratio = fx.end === fx.start ? 1 : (now - fx.start) / (fx.end - fx.start);
			if (F.isClosing) {
				ratio = 1 - ratio;
			}
			padding = prop === 'width' ? current.wPadding : current.hPadding;
			value = now - padding;
			F.skin[prop](getScalar(prop === 'width' ? value : value - (wrapSpace * ratio)));
			F.inner[prop](getScalar(prop === 'width' ? value : value - (wrapSpace * ratio) - (skinSpace * ratio)));
		}
	},
	zoomIn: function() {
		var current = F.current,
		startPos = current.pos,
		effect = current.openEffect,
		elastic = effect === 'elastic',
		endPos = $.extend({
			opacity: 1
		}, startPos);
		delete endPos.position;
		if (elastic) {
			startPos = this.getOrigPosition();
			if (current.openOpacity) {
				startPos.opacity = 0.1;
			}
		} else if (effect === 'fade') {
			startPos.opacity = 0.1;
		}
		F.wrap.css(startPos).animate(endPos, {
			duration: effect === 'none' ? 0 : current.openSpeed,
			easing: current.openEasing,
			step: elastic ? this.step : null,
			complete: F._afterZoomIn
		});
	},
	zoomOut: function() {
		var current = F.current,
		effect = current.closeEffect,
		elastic = effect === 'elastic',
		endPos = {
			opacity: 0.1
		};
		if (elastic) {
			endPos = this.getOrigPosition();
			if (current.closeOpacity) {
				endPos.opacity = 0.1;
			}
		}
		F.wrap.animate(endPos, {
			duration: effect === 'none' ? 0 : current.closeSpeed,
			easing: current.closeEasing,
			step: elastic ? this.step : null,
			complete: F._afterZoomOut
		});
	},
	changeIn: function() {
		var current = F.current,
		effect = current.nextEffect,
		startPos = current.pos,
		endPos = {
			opacity: 1
		},
		direction = F.direction,
		distance = 200,
		field;
		startPos.opacity = 0.1;
		if (effect === 'elastic') {
			field = direction === 'down' || direction === 'up' ? 'top' : 'left';
			if (direction === 'down' || direction === 'right') {
				startPos[field] = getValue(getScalar(startPos[field]) - distance);
				endPos[field] = '+=' + distance + 'px';
			} else {
				startPos[field] = getValue(getScalar(startPos[field]) + distance);
				endPos[field] = '-=' + distance + 'px';
			}
		}
		if (effect === 'none') {
			F._afterZoomIn();
		} else {
			F.wrap.css(startPos).animate(endPos, {
				duration: current.nextSpeed,
				easing: current.nextEasing,
				complete: F._afterZoomIn
			});
		}
	},
	changeOut: function() {
		var previous = F.previous,
		effect = previous.prevEffect,
		endPos = {
			opacity: 0.1
		},
		direction = F.direction,
		distance = 200;
		if (effect === 'elastic') {
			endPos[direction === 'down' || direction === 'up' ? 'top' : 'left'] = (direction === 'up' || direction === 'left' ? '-' : '+') + '=' + distance + 'px';
		}
		previous.wrap.animate(endPos, {
			duration: effect === 'none' ? 0 : previous.prevSpeed,
			easing: previous.prevEasing,
			complete: function() {
				$(this).trigger('onReset').remove();
			}
		});
	}
};
F.helpers.overlay = {
	defaults: {
		closeClick: true,
		speedOut: 200,
		showEarly: true,
		css: {},
		locked: !isTouch,
		fixed: true
	},
	overlay: null,
	fixed: false,
	el: $('html'),
	create: function(opts) {
		opts = $.extend({}, this.defaults, opts);
		if (this.overlay) {
			this.close();
		}
		this.overlay = $('<div class="fancybox-overlay"></div>').appendTo(F.coming ? F.coming.parent : opts.parent);
		this.fixed = false;
		if (opts.fixed && F.defaults.fixed) {
			this.overlay.addClass('fancybox-overlay-fixed');
			this.fixed = true;
		}
	},
	open: function(opts) {
		var that = this;
		opts = $.extend({}, this.defaults, opts);
		if (this.overlay) {
			this.overlay.unbind('.overlay').width('auto').height('auto');
		} else {
			this.create(opts);
		}
		if (!this.fixed) {
			W.bind('resize.overlay', $.proxy(this.update, this));
			this.update();
		}
		if (opts.closeClick) {
			this.overlay.bind('click.overlay', function(e) {
				if ($(e.target).hasClass('fancybox-overlay')) {
					if (F.isActive) {
						F.close();
					} else {
						that.close();
					}
					return false;
				}
			});
		}
		this.overlay.css(opts.css).show();
	},
	close: function() {
		var scrollV, scrollH;
		W.unbind('resize.overlay');
		if (this.el.hasClass('fancybox-lock')) {
			$('.fancybox-margin').removeClass('fancybox-margin');
			this.el.removeClass('fancybox-lock');
		}
		$('.fancybox-overlay').remove().hide();
		$.extend(this, {
			overlay: null,
			fixed: false
		});
	},
	update: function() {
		var width = '100%',
		offsetWidth;
		this.overlay.width(width).height('100%');
		if (IE) {
			offsetWidth = Math.max(document.documentElement.offsetWidth, document.body.offsetWidth);
			if (D.width() > offsetWidth) {
				width = D.width();
			}
		} else if (D.width() > W.width()) {
			width = D.width();
		}
		this.overlay.width(width).height(D.height());
	},
	onReady: function(opts, obj) {
		var overlay = this.overlay;
		$('.fancybox-overlay').stop(true, true);
		if (!overlay) {
			this.create(opts);
		}
		if (opts.locked && this.fixed && obj.fixed) {
			if (!overlay) {
				this.margin = D.height() > W.height() ? $('html').css('margin-right').replace("px", "") : false;
			}
			obj.locked = this.overlay.append(obj.wrap);
			obj.fixed = false;
		}
		if (opts.showEarly === true) {
			this.beforeShow.apply(this, arguments);
		}
	},
	beforeShow: function(opts, obj) {
		var scrollV, scrollH;
		if (obj.locked) {
			if (this.margin !== false) {
				$('*').filter(function() {
					return ($(this).css('position') === 'fixed' && !$(this).hasClass("fancybox-overlay") && !$(this).hasClass("fancybox-wrap"));
				}).addClass('fancybox-margin');
				this.el.addClass('fancybox-margin');
			}
		}
		this.open(opts);
	},
	onUpdate: function() {
		if (!this.fixed) {
			this.update();
		}
	},
	afterClose: function(opts) {
		if (this.overlay && !F.coming) {
			this.overlay.fadeOut(opts.speedOut, $.proxy(this.close, this));
		}
	}
};
F.helpers.title = {
	defaults: {
		type: 'float',
		position: 'bottom'
	},
	beforeShow: function(opts) {
		var current = F.current,
		text = current.title,
		type = opts.type,
		title, target;
		if ($.isFunction(text)) {
			text = text.call(current.element, current);
		}
		if (!isString(text) || $.trim(text) === '') {
			return;
		}
		title = $('<div class="fancybox-title fancybox-title-' + type + '-wrap">' + text + '</div>');
		switch (type) {
			case 'inside':
			target = F.skin;
			break;
			case 'outside':
			target = F.wrap;
			break;
			case 'over':
			target = F.inner;
			break;
			default:
			target = F.skin;
			title.appendTo('body');
			if (IE) {
				title.width(title.width());
			}
			title.wrapInner('<span class="child"></span>');
			F.current.margin[2] += Math.abs(getScalar(title.css('margin-bottom')));
			break;
		}
		title[(opts.position === 'top' ? 'prependTo' : 'appendTo')](target);
	}
};
$.fn.fancybox = function(options) {
	var index, that = $(this),
	selector = this.selector || '',
	run = function(e) {
		var what = $(this).blur(),
		idx = index,
		relType, relVal;
		if (!(e.ctrlKey || e.altKey || e.shiftKey || e.metaKey) && !what.is('.fancybox-wrap')) {
			relType = options.groupAttr || 'data-fancybox-group';
			relVal = what.attr(relType);
			if (!relVal) {
				relType = 'rel';
				relVal = what.get(0)[relType];
			}
			if (relVal && relVal !== '' && relVal !== 'nofollow') {
				what = selector.length ? $(selector) : that;
				what = what.filter('[' + relType + '="' + relVal + '"]');
				idx = what.index(this);
			}
			options.index = idx;
			if (F.open(what, options) !== false) {
				e.preventDefault();
			}
		}
	};
	options = options || {};
	index = options.index || 0;
	if (!selector || options.live === false) {
		that.unbind('click.fb-start').bind('click.fb-start', run);
	} else {
		D.undelegate(selector, 'click.fb-start').delegate(selector + ":not('.fancybox-item, .fancybox-nav')", 'click.fb-start', run);
	}
	this.filter('[data-fancybox-start=1]').trigger('click');
	return this;
};
D.ready(function() {
	var w1, w2;
	if ($.scrollbarWidth === undefined) {
		$.scrollbarWidth = function() {
			var parent = $('<div style="width:50px;height:50px;overflow:auto"><div/></div>').appendTo('body'),
			child = parent.children(),
			width = child.innerWidth() - child.height(99).innerWidth();
			parent.remove();
			return width;
		};
	}
	if ($.support.fixedPosition === undefined) {
		$.support.fixedPosition = (function() {
			var elem = $('<div style="position:fixed;top:20px;"></div>').appendTo('body'),
			fixed = (elem[0].offsetTop === 20 || elem[0].offsetTop === 15);
			elem.remove();
			return fixed;
		}());
	}
	$.extend(F.defaults, {
		scrollbarWidth: $.scrollbarWidth(),
		fixed: $.support.fixedPosition,
		parent: $('body')
	});
	w1 = $(window).width();
	H.addClass('fancybox-lock-test');
	w2 = $(window).width();
	H.removeClass('fancybox-lock-test');
	$("<style type='text/css'>.fancybox-margin{margin-right:" + (w2 - w1) + "px;}</style>").appendTo("head");
});
}(window, document, jQuery));

function OnLoad() {
	$('a[href*="/ajax/"], .fancy_content').unbind('click');
	$('a[href*="/ajax/"], .fancy_content').click(function() {
		ShowFancyAjax($(this));
		return false;
	});
	$('.ajax_form').unbind('submit');
	$('.ajax_form').submit(function() {
		UploadAjaxFancyForm($(this), 0, 'submit');
		return false;
	});
	$(".fancybox").fancybox({
		fitToView: true,
		fitToViewHeight: true,
		width: 'auto',
		height: 'auto',
		autoSize: true,
		closeClick: false,
		autoHeight: true,
		onComplete: '',
		openEffect: 'none',
		closeEffect: 'none',
		padding: 0,
		margin: 10,
		afterShow: function() {
			CheckWhatShoudToDoFancy();
		},
		helpers: {
			overlay: {
				locked: false
			}
		},
		opacity: 0.1
	});
}
$(document).ready(function() {
	OnLoad();
});

function UploadAjaxFancyFormEmenImmediately() {
	$(window.timer_form_obj).attr('data-fancybox-type', 'ajax');
	$(window.timer_form_obj).attr('data-fancybox-href', $(window.timer_form_obj).attr('action') + '?' + $(window.timer_form_obj).serialize());
	ShowFancyAjax($(window.timer_form_obj));
}

function UploadAjaxFancyForm(form, element, submit) {
	element = element || 0;
	submit = submit || 0;
	if (submit == 0) {
		$(form).find('#submit_form').val(0);
	}
	window.timer_form_obj = form;
	clearTimeout(window.timer_form);
	window.timer_form = setTimeout("UploadAjaxFancyFormEmenImmediately()", 800);
	return false;
}

function FancyboxAfterClose(do_after_fancybox) {
	switch (do_after_fancybox) {
		case 'reload_window':
		window.location.reload();
		break;
		case 'reload_basket':
		if ($("#order_ajax_wrapper").length) {
			$.ajax({
				url: "/ajax/order_ajax_b.php",
				type: "POST",
				data: {},
				success: function(out) {
					$('#order_ajax_wrapper').html(out);
				}
			});
		}
		break;
		case 'reload_basket_order':
		$.ajax({
			type: 'POST',
			dataType: 'json',
			url: '/bitrix/templates/.default/include/ajax.php',
			data: {
				action_var: 'getlist'
			},
			success: function(data) {
				$('.results').html(data);
				refereshBasket(data);
			}
		});
		break;
		case 'update':
		$.fancybox.update();
		default:
		break;
	}
	do_after_fancybox = '';
}

function CheckWhatShoudToDoFancy() {
	var to_do = $('.fancybox-inner span.to_do').text();
	switch (to_do) {
		case 'reload_page':
		window.location.reload();
		break;
		case 'set_cur_page':
		$('#page').val(window.location.href);
		break;
	}
}

function addParameterToURL(url, param) {
	var _url = url;
	_url += (_url.split('?')[1] ? '&' : '?') + param;
	return _url;
}

function ShowFancyAjax(object) {
	var param;
	if ($(object).hasClass('basket-popup')) param = 'reload_basket';
	if ($(object).hasClass('basket-popup-order')) param = 'reload_basket_order';
	if ($(object).hasClass('add-comment-bt')) param = 'update';
	if ($(object).hasClass('redirect')) param = 'reload_window';
	$.fancybox({
		minWidth: 330,
		type: $(object).attr('data-fancybox-type'),
		href: addParameterToURL($(object).attr('data-fancybox-href'), 'ajax_fancy=1'),
		fitToView: true,
		fitToViewHeight: false,
		width: 'auto',
		height: 'auto',
		autoSize: false,
		closeClick: false,
		onComplete: '',
		openEffect: 'none',
		closeEffect: 'none',
		padding: 0,
		margin: 10,
		afterShow: function() {
			CheckWhatShoudToDoFancy();
			OnLoad();
		},
		afterClose: function() {
			FancyboxAfterClose(param);
		},
		helpers: {
			overlay: {
				locked: false
			}
		},
		opacity: 0.1
	});
}

function ShowFancyAjaxError(start, stext, end) {
	$.fancybox({
		minWidth: 330,
		type: 'ajax',
		href: '/include/ajax/error.php?ajax_fancy=1',
		fitToView: true,
		fitToViewHeight: false,
		width: 'auto',
		height: 'auto',
		autoSize: false,
		closeClick: false,
		onComplete: '',
		openEffect: 'none',
		closeEffect: 'none',
		padding: 0,
		margin: 10,
		afterShow: function() {
			$('#page').val(window.location.href);
			$('#text-error').text(stext);
			$('#start-error').text(start);
			$('#end-error').text(end);
			$('#input-error').val(stext);
			CheckWhatShoudToDoFancy();
			OnLoad();
		},
		afterClose: function() {},
		helpers: {
			overlay: {
				locked: false
			}
		},
		opacity: 0.1
	});
}

function popclose() {
	$('.fancybox-close').click();
	return false;
};

function change_quantity_popup(product_id, action, template) {
	var count = parseInt($('#QUANTITY_INPUT_' + product_id).val());
	if (action == 'up') {
		count++;
	} else if (action == 'down') {
		count--;
	} else if (action == "change") {}
	if (count > 0) {
		$('.fade-bg-pop').show();
		$('#QUANTITY_' + product_id).val(count);
		$('#QUANTITY_' + product_id).val($('#QUANTITY_INPUT_' + product_id).val());
		$.post("/ajax/change_basket_popup.php", {
			ID: product_id,
			ACTION: 'change',
			COUNT: count,
			TEMPLATE: template
		}, function(data) {
			if (data.length > 0) {
				$('#popup-basket').html(data);
			}
		});
	}
}

function del_item_pop(product_id, template) {
	$('.fade-bg-pop').show();
	$.post("/ajax/change_basket_popup.php", {
		ID: product_id,
		ACTION: 'del',
		TEMPLATE: template
	}, function(data) {
		if (data.length > 0) {
			$('#popup-basket').html(data);
		}
	});
	setTimeout(function() {}, 200);
	setTimeout(function() {
		$('.fade-bg-pop').hide();
	}, 600);
}

function refereshBasket(data) {
	$('#basket_items').html(data.STR);
	$('#summ').html(data.SUM_STR)
}

function addBasket(el) {
	const li = el.closest('li')
	const id = li.getAttribute('data-id');
	const price = li.getAttribute('data-price');
	const title = li.querySelector('.name').innerText;
	const count = li.querySelector('input.count_buy').value;
	const bonus = li.querySelector('#bonus_calculate_number').innerText;
	Offer.add({
		id:id,
		title:title,
		price:price,
		count:count,
		bonus:bonus
	});
	Offer.get()
}









function addBasketSQ(obj, is_count, setCount, $img, action) {
	$obj = $(obj);
	var id = $obj.data('id');
	var type = $obj.data('type') || "";
	var f = false;
	var setCount = setCount || 0;
	var $img = $img || null;
	var callfunc = $obj.data('call') || '';
	var counterBlock = $obj.data('counter') || '';
	if (action != 'del' && action != 'buy') action = 'buy';
	if (is_count == true) {
		if (type == 'list') {
			var ItemList = $obj.closest('.catalog-list-item');
			imgtodrag = ItemList.find('.img-wrap img').eq(0);
			count = ItemList.find('.count_buy').val();
		} else {
			imgtodrag = $obj.closest('.item-card').find('.img-wrap').eq(0);
			count = $obj.parents('.item-card:first').find('.item-card-footer .count_buy:first').val();
			count = count / 1;
		}
	}
	var qua = false;
	if ($(obj).data('qua') != undefined) {
		var qua = $(obj).data('qua');
	}
	if (qua) {
		var arr = qua.split(',');
		for (var i = 0; i < arr.length; i++) {
			arr[i] = arr[i] * count;
		}
		count = arr.join(',');
	}
	label = $('.item-' + id);

	return false;
}

function intval(num) {
	if (typeof num == 'number' || typeof num == 'string') {
		num = num.toString();
		var dotLocation = num.indexOf('.');
		if (dotLocation > 0) {
			num = num.substr(0, dotLocation);
		}
		if (isNaN(Number(num))) {
			num = parseInt(num);
		}
		if (isNaN(num)) {
			return 0;
		}
		return Number(num);
	} else if (typeof num == 'object' && num.length != null && num.length > 0) {
		return 1;
	} else if (typeof num == 'boolean' && num === true) {
		return 1;
	}
	return 0;
}

function counter_active(obj, blockClass, count) {
	console.log('call - counter_active');
	console.log(obj);
	console.log(blockClass);
	console.log(count);
	if (blockClass == '') return false;
	if (count > 0) {
		$(obj).closest('li').find('.' + blockClass).removeClass('hidden');
	} else {
		$(obj).closest('li').find('.' + blockClass).addClass('hidden');
	}
}

function removeBasket(obj, $img) {
	$obj = $(obj);
	var id = $obj.data('id');
	var f = false;
	var $img = $img || null;
	return false;
}



function addBasketDetail(obj, is_count) {
	var id = $(obj).data('id');
	var f = false;
	if (is_count == true) count = $(obj).closest('.catalog-item-footer').find('.count_buy').val();
	console.log(count);
	if (count == undefined) {
		count = $(obj).parent().parent().parent().parent().find('.count_buy_detail').val();
		console.log($(obj).parent().parent().parent().parent().find('.count_buy_detail').val());
	}
	var qua = false;
	if ($(obj).data('qua') != undefined) {
		var qua = $(obj).data('qua');
	}
	if (qua) {
		var arr = qua.split(',');
		for (var i = 0; i < arr.length; i++) {
			arr[i] = arr[i] * count;
		}
		count = arr.join(',');
	}
	label = $('.item-' + id);

	return false;
}
$(".reviews-link").on("click", function() {
	$("#tab_comment").click();
	return false;
});
$(document).on('click', 'input.error, textarea.error', function() {
	$(this).removeClass('error');
	$(this).siblings('label.error').hide();
});
$(document).on('click', '#order_form_content input', function() {
	$(this).removeClass('error');
	if ($(this).next('label').hasClass('error')) $(this).next('label.error').hide();
	if ($(this).hasClass('bx-ui-sls-fake')) {
		$('.dropdown-block.bx-ui-sls-input-block').removeClass('error');
		$('.location-block-wrapper').next('label.error').hide();
	}
	return false;
});
$(document).on('click', '.catalog-nav-content li a', function(e) {
	$('.catalog-nav-content li').removeClass('active');
	$(this).parent('li').addClass('active');
});
$('.search-block input[type="submit"]').click(function(e) {
	e.preventDefault();
	var len = $('input[name="q"]').val().length;
	if (len > 1) {
		$('#search-title').submit();
	}
});;;

function getLang() {
	url = location.href;
	if (url.indexOf('/ua/') != -1) {
		lang = 'ua';
	} else {
		lang = 'ru';
	}
	return lang;
}

function showInfo() {
	if (getLang() == 'ua') {
		url = '/external/modal/ostatus_ua.php';
	}
}

function update_small_basket() {

};

function getCookie(name) {
	let matches = document.cookie.match(new RegExp("(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"));
	return matches ? decodeURIComponent(matches[1]) : undefined;
}
dataAval = {};
dataAval2 = {};
dataCount = {};
dataCount2 = {};
$(document).on('click', '.catalog-item .jq-number', function() {
	$('.catalog-item').find('.available-block-outer').remove();
	var rg_margin = 362;
	var buy_pos = $(this).parents('.catalog-item:first').find('.buy-wrap').position().top;
	var aval = $(this).parents('.catalog-item:first').find('.status').html();
	if (aval == 'В наличии' || aval == 'Заканчивается' || aval == 'В наявності' || aval == 'Закінчуєтся') {
		var id = $(this).parents('.catalog-item:first').find('.buy-btn').attr('data-id');
		var site = location.host;
		var curval = parseInt($(this).find('.count_buy').val());
		if (id != undefined && dataAval['i' + id] == undefined) {
			$.get("https://" + site + "/api/product/available.php?id=" + id).done(function(data) {
				if (data > 0) {
					dataAval['i' + id] = data;
				} else {
					dataAval['i' + id] = 0;
				}
			});
		}
		if (id != undefined) {
			$(this).parents('.catalog-item:first').find('.count_buy').attr('max', dataAval['i' + id]);
			if (dataAval['i' + id] !== undefined && curval >= dataAval['i' + id]) {
				$(this).parents('.catalog-item:first').find('.count_buy').val(dataAval['i' + id]);
				$(this).parents('.catalog-item:first').find('.available-block-outer').remove();
				if (buy_pos > 0) {
					rg_margin = +rg_margin + +buy_pos;
					$(this).parents('.catalog-item:first').prepend('<div class="available-block-outer" style="top: ' + rg_margin + 'px"><div><div>Сейчас доступно для заказа:</div><div class="quantity-available">' + dataAval['i' + id] + 'шт.</div></div></div>');
				} else {
					$(this).parents('.catalog-item:first').prepend('<div class="available-block-outer" style="top: ' + rg_margin + 'px"><div><div>Сейчас доступно для заказа:</div><div class="quantity-available">' + dataAval['i' + id] + 'шт.</div></div></div>');
				}
			} else {
				$(this).parents('.catalog-item:first').find('.count_buy').val(curval);
				$(this).parents('.catalog-item:first').find('.available-block-outer').remove();
			}
		}
	}
	if (aval != 'Нет наличии') {
		if ($(this).parents('.catalog-item').find('#bonus_view').length != false) {
			var id = $(this).parents('.catalog-item:first').find('.buy-btn').attr('data-id');
			var bonus = $(this).parents('.catalog-item:first').find('#bonus_calculate_number').html();
			var value = $(this).find('.count_buy').val();
			if (dataCount['c' + id] == undefined) {
				dataCount['c' + id] = bonus;
				var cur_count = (value * dataCount['c' + id]).toFixed(2);
			} else {
				var cur_count = (value * dataCount['c' + id]).toFixed(2);
			}
			$(this).parents('.catalog-item:first').find('#bonus_calculate_number').html(cur_count);
		}
	}
});
$(document).on('focus', '.catalog-item .jq-number input', function() {
	$('.catalog-item').find('.available-block-outer').remove();
	var rg_margin = 362;
	var buy_pos = $(this).parents('.catalog-item:first').find('.buy-wrap').position().top;
	var aval = $(this).parents('.catalog-item:first').find('.status').html();
	if (aval == 'В наличии' || aval == 'Заканчивается' || aval == 'В наявності' || aval == 'Закінчуєтся') {
		var id = $(this).parents('.catalog-item:first').find('.buy-btn').attr('data-id');
		var site = location.host;
		var curval = $(this).val() ? parseInt($(this).val()) : 1;
		if (id != undefined && dataAval['i' + id] == undefined) {
			$.get("https://" + site + "/api/product/available.php?id=" + id).done(function(data) {
				if (data > 0) {
					dataAval['i' + id] = data;
				} else {
					dataAval['i' + id] = 0;
				}
			});
		}
		if (id != undefined) {
			$(this).parents('.catalog-item:first').find('.count_buy').attr('max', dataAval['i' + id]);
			if (dataAval['i' + id] !== 'undefined' && curval == dataAval['i' + id] && !isNaN(curval)) {
				$(this).parents('.catalog-item:first').find('.available-block-outer').remove();
				if (buy_pos > 0) {
					rg_margin = +rg_margin + +buy_pos;
					$(this).parents('.catalog-item:first').prepend('<div class="available-block-outer" style="top: ' + rg_margin + 'px"><div><div>Сейчас доступно для заказа:</div><div class="quantity-available">' + dataAval['i' + id] + 'шт.</div></div></div>');
				} else {
					$(this).parents('.catalog-item:first').prepend('<div class="available-block-outer" style="top: ' + rg_margin + 'px"><div><div>Сейчас доступно для заказа:</div><div class="quantity-available">' + dataAval['i' + id] + 'шт.</div></div></div>');
				}
			}
		}
	}
	if (aval != 'Нет наличии') {
		if ($(this).parents('.catalog-item').find('#bonus_view').length != false) {
			var id = $(this).parents('.catalog-item:first').find('.buy-btn').attr('data-id');
			var bonus = $(this).parents('.catalog-item:first').find('#bonus_calculate_number').html();
			var value = $(this).val();
			if (dataCount['c' + id] == undefined) {
				dataCount['c' + id] = bonus;
				var cur_count = (value * dataCount['c' + id]).toFixed(2);
			} else {
				var cur_count = (value * dataCount['c' + id]).toFixed(2);
			}
			$(this).parents('.catalog-item:first').find('#bonus_calculate_number').html(cur_count);
		}
	}
});
$(document).on('keyup', '.catalog-item .jq-number input', function(e) {
	lang = getLang();
	mess = {};
	if (lang == 'ru') {
		mess.dost = 'Сейчас доступно для заказа:';
	} else {
		mess.dost = 'Зараз доступно для замовлення:';
	}
	if (e.keyCode != 8) {
		$('.catalog-item').find('.available-block-outer').remove();
		var rg_margin = 362;
		var buy_pos = $(this).parents('.catalog-item:first').find('.buy-wrap').position().top;
		var aval = $(this).parents('.catalog-item:first').find('.status').html();
		if (aval == 'В наличии' || aval == 'Заканчивается' || aval == 'В наявності' || aval == 'Закінчуєтся') {
			var id = $(this).parents('.catalog-item:first').find('.buy-btn').attr('data-id');
			var site = location.host;
			var curval = $(this).val() ? parseInt($(this).val()) : 1;
			if (id != undefined && dataAval['i' + id] == undefined) {
				$.get("https://" + site + "/api/product/available.php?id=" + id).done(function(data) {
					if (data > 0) {
						dataAval['i' + id] = data;
					} else {
						dataAval['i' + id] = 0;
					}
				});
			}
			if (id != undefined) {
				$(this).parents('.catalog-item:first').find('.count_buy').attr('max', dataAval['i' + id]);
				if (dataAval['i' + id] !== 'undefined' && curval >= dataAval['i' + id] && !isNaN(curval)) {
					$(this).parents('.catalog-item:first').find('.count_buy').val(dataAval['i' + id]);
					$(this).parents('.catalog-item:first').find('.available-block-outer').remove();
					if (buy_pos > 0) {
						rg_margin = +rg_margin + +buy_pos;
						$(this).parents('.catalog-item:first').prepend('<div class="available-block-outer" style="top: ' + rg_margin + 'px"><div><div>' + mess.dost + '</div><div class="quantity-available">' + dataAval['i' + id] + 'шт.</div></div></div>');
					} else {
						$(this).parents('.catalog-item:first').prepend('<div class="available-block-outer" style="top: ' + rg_margin + 'px"><div><div>' + mess.dost + '</div><div class="quantity-available">' + dataAval['i' + id] + 'шт.</div></div></div>');
					}
				} else {
					if (!isNaN(curval)) {
						$(this).parents('.catalog-item:first').find('.count_buy').val(curval);
					}
					$(this).parents('.catalog-item:first').find('.available-block-outer').remove();
				}
			}
		}
		if (aval != 'Нет наличии') {
			if ($(this).parents('.catalog-item').find('#bonus_view').length != false) {
				var id = $(this).parents('.catalog-item:first').find('.buy-btn').attr('data-id');
				var bonus = $(this).parents('.catalog-item:first').find('#bonus_calculate_number').html();
				var value = $(this).val();
				if (dataCount['c' + id] == undefined) {
					dataCount['c' + id] = bonus;
					var cur_count = (value * dataCount['c' + id]).toFixed(2);
				} else {
					var cur_count = (value * dataCount['c' + id]).toFixed(2);
				}
				$(this).parents('.catalog-item:first').find('#bonus_calculate_number').html(cur_count);
			}
		}
	}
});
$(document).on('blur', '.catalog-item .jq-number input', function() {
	var rg_margin = 362;
	var buy_pos = $(this).parents('.catalog-item:first').find('.buy-wrap').position().top;
	var aval = $(this).parents('.catalog-item:first').find('.status').html();
	if ($(this).val() <= 0 || $(this).val() == '') {
		$(this).val(1)
	}
	if (aval != 'Нет наличии') {
		if ($(this).parents('.catalog-item').find('#bonus_view').length != false) {
			var id = $(this).parents('.catalog-item:first').find('.buy-btn').attr('data-id');
			var bonus = $(this).parents('.catalog-item:first').find('#bonus_calculate_number').html();
			var value = $(this).val();
			if (dataCount['c' + id] == undefined) {
				dataCount['c' + id] = bonus;
				var cur_count = (value * dataCount['c' + id]).toFixed(2);
			} else {
				var cur_count = (value * dataCount['c' + id]).toFixed(2);
			}
			$(this).parents('.catalog-item:first').find('#bonus_calculate_number').html(cur_count);
		}
	}
	$('.catalog-item').find('.available-block-outer').remove();
});
$(document).on('click', '.catalog-item-page .l-col .jq-number', function() {
	lang = getLang();
	mess = {};
	if (lang == 'ru') {
		mess.dost = 'Сейчас доступно для заказа:';
	} else {
		mess.dost = 'Доступно для замовлення:';
	}
	$('.catalog-item-page').find('.available-block-outer').remove();
	var aval2 = $(this).parents('.catalog-item-page:first').find('.status:first').html();
	if (aval2 == 'В наличии' || aval2 == 'Заканчивается' || aval2 == 'В наявності' || aval2 == 'Закінчуєтся') {
		var id2 = $(this).parents('.catalog-item-page:first').find('.buy-btn:first').attr('data-id');
		var site = location.host;
		var curval2 = parseInt($(this).find('.count_buy_detail:first').val());
		if (id2 != undefined && dataAval2['i' + id2] == undefined) {
			$.get("https://" + site + "/api/product/available.php?id=" + id2).done(function(data) {
				if (data > 0) {
					dataAval2['i' + id2] = data;
				} else {
					dataAval2['i' + id2] = 0;
				}
			});
		}
		if (id2 != undefined) {
			$(this).parents('.catalog-item-page:first').find('.count_buy_detail').attr('max', dataAval2['i' + id2]);
			if (dataAval2['i' + id2] !== undefined && curval2 >= dataAval2['i' + id2]) {
				$(this).parents('.catalog-item-page:first').find('.count_buy_detail').val(dataAval2['i' + id2]);
				$(this).parents('.catalog-item-page').find('.available-block-outer').remove();
				$(this).parents('.info_desc_product:first').prepend('<div class="available-block-outer"><div><div>' + mess.dost + '</div><div class="quantity-available">' + dataAval2['i' + id2] + 'шт.</div></div></div>');
			} else {
				$(this).parents('.catalog-item-page:first').find('.count_buy_detail').val(curval2);
				$(this).parents('.catalog-item-page:first').find('.available-block-outer').remove();
			}
		}
	}
	if (aval2 != 'Нет наличии') {
		if ($(this).parents('.catalog-item-page').find('#bonus_view').length != false) {
			var id2 = $(this).parents('.catalog-item-page:first').find('.buy-btn:first').attr('data-id');
			var bonus2 = $(this).parents('.catalog-item-page:first').find('#bonus_calculate_number').html();
			var value2 = $(this).find('.count_buy_detail').val();
			if (dataCount2['c' + id2] == undefined) {
				dataCount2['c' + id2] = bonus2;
				var cur_count2 = (value2 * dataCount2['c' + id2]).toFixed(2);
			} else {
				var cur_count2 = (value2 * dataCount2['c' + id2]).toFixed(2);
			}
			$(this).parents('.catalog-item-page:first').find('#bonus_calculate_number').html(cur_count2);
		}
	}
});
$(document).on('focus', '.catalog-item-page .jq-number input', function() {
	lang = getLang();
	mess = {};
	if (lang == 'ru') {
		mess.dost = 'Сейчас доступно для заказа:';
	} else {
		mess.dost = 'Доступно для замовлення:';
	}
	$('.catalog-item-page').find('.available-block-outer').remove();
	var aval2 = $(this).parents('.catalog-item-page:first').find('.status').html();
	if (aval2 == 'В наличии' || aval2 == 'Заканчивается' || aval2 == 'В наявності' || aval2 == 'Закінчуєтся') {
		var id2 = $(this).parents('.catalog-item-page:first').find('.buy-btn').attr('data-id');
		var site = location.host;
		var curval = $(this).val() ? parseInt($(this).val()) : 1;
		if (id2 != undefined && dataAval2['i' + id2] == undefined) {
			$.get("https://" + site + "/api/product/available.php?id=" + id2).done(function(data) {
				if (data > 0) {
					dataAval2['i' + id2] = data;
				} else {
					dataAval2['i' + id2] = 0;
				}
			});
		}
		if (id2 != undefined) {
			$(this).parents('.catalog-item-page:first').find('.count_buy_detail').attr('max', dataAval2['i' + id2]);
			if (dataAval2['i' + id2] !== 'undefined' && curval == dataAval2['i' + id2] && !isNaN(curval)) {
				$(this).parents('.catalog-item-page:first').find('.available-block-outer').remove();
				$(this).parents('.info_desc_product:first').prepend('<div class="available-block-outer"><div><div>' + mess.dost + '</div><div class="quantity-available">' + dataAval2['i' + id2] + 'шт.</div></div></div>');
			}
		}
	}
	if (aval2 != 'Нет наличии') {
		if ($(this).parents('.catalog-item-page').find('#bonus_view').length != false) {
			var id2 = $(this).parents('.catalog-item-page:first').find('.buy-btn:first').attr('data-id');
			var bonus2 = $(this).parents('.catalog-item-page:first').find('#bonus_calculate_number').html();
			var value2 = $(this).val();
			if (dataCount2['c' + id2] == undefined) {
				dataCount2['c' + id2] = bonus2;
				var cur_count2 = (value2 * dataCount2['c' + id2]).toFixed(2);
			} else {
				var cur_count2 = (value2 * dataCount2['c' + id2]).toFixed(2);
			}
			$(this).parents('.catalog-item-page:first').find('#bonus_calculate_number').html(cur_count2);
		}
	}
});
$(document).on('keyup', '.catalog-item-page .info_desc_product .jq-number input', function(e) {
	lang = getLang();
	mess = {};
	if (lang == 'ru') {
		mess.dost = 'Сейчас доступно для заказа:';
	} else {
		mess.dost = 'Доступно для замовлення:';
	}
	if (e.keyCode != 8) {
		$('.catalog-item-page').find('.available-block-outer').remove();
		var aval2 = $(this).parents('.catalog-item-page:first').find('.status').html();
		if (aval2 == 'В наличии' || aval2 == 'Заканчивается' || aval2 == 'В наявності' || aval2 == 'Закінчуєтся') {
			var id2 = $(this).parents('.catalog-item-page:first').find('.buy-btn').attr('data-id');
			var site = location.host;
			var curval = $(this).val() ? parseInt($(this).val()) : 1;
			if (id2 != undefined && dataAval2['i' + id2] == undefined) {
				$.get("https://" + site + "/api/product/available.php?id=" + id2).done(function(data) {
					if (data > 0) {
						dataAval2['i' + id2] = data;
					} else {
						dataAval2['i' + id2] = 0;
					}
				});
			}
			if (id2 != undefined) {
				$(this).parents('.catalog-item-page:first').find('.count_buy_detail').attr('max', dataAval2['i' + id2]);
				if (dataAval2['i' + id2] !== 'undefined' && curval >= dataAval2['i' + id2] && !isNaN(curval)) {
					$(this).parents('.catalog-item-page:first').find('.count_buy_detail').val(dataAval2['i' + id2]);
					$(this).parents('.catalog-item-page:first').find('.available-block-outer').remove();
					$(this).parents('.info_desc_product:first').prepend('<div class="available-block-outer"><div><div>' + mess.dost + '</div><div class="quantity-available">' + dataAval2['i' + id2] + 'шт.</div></div></div>');
				} else {
					if (!isNaN(curval)) {
						$(this).parents('.catalog-item-page:first').find('.count_buy_detail').val(curval);
					}
					$(this).parents('.catalog-item-page:first').find('.available-block-outer').remove();
				}
			}
		}
		if (aval2 != 'Нет наличии') {
			if ($(this).parents('.catalog-item-page').find('#bonus_view').length != false) {
				var id2 = $(this).parents('.catalog-item-page:first').find('.buy-btn:first').attr('data-id');
				var bonus2 = $(this).parents('.catalog-item-page:first').find('#bonus_calculate_number').html();
				var value2 = $(this).val();
				if (dataCount2['c' + id2] == undefined) {
					dataCount2['c' + id2] = bonus2;
					var cur_count2 = (value2 * dataCount2['c' + id2]).toFixed(2);
				} else {
					var cur_count2 = (value2 * dataCount2['c' + id2]).toFixed(2);
				}
				$(this).parents('.catalog-item-page:first').find('#bonus_calculate_number').html(cur_count2);
			}
		}
	}
});
$(document).on('blur', '.catalog-item-page .jq-number input', function() {
	var aval2 = $(this).parents('.catalog-item-page:first').find('.status').html();
	if ($(this).val() <= 0 || $(this).val() == '') {
		$(this).val(1)
	}
	if (aval2 != 'Нет наличии') {
		if ($(this).parents('.catalog-item-page').find('#bonus_view').length != false) {
			var id2 = $(this).parents('.catalog-item-page:first').find('.buy-btn:first').attr('data-id');
			var bonus2 = $(this).parents('.catalog-item-page:first').find('#bonus_calculate_number').html();
			var value2 = $(this).val();
			if (dataCount2['c' + id2] == undefined) {
				dataCount2['c' + id2] = bonus2;
				var cur_count2 = (value2 * dataCount2['c' + id2]).toFixed(2);
			} else {
				var cur_count2 = (value2 * dataCount2['c' + id2]).toFixed(2);
			}
			$(this).parents('.catalog-item-page:first').find('#bonus_calculate_number').html(cur_count2);
		}
	}
	$('.catalog-item-page').find('.available-block-outer').remove();
});
dataTimer = {};

function num2word($num, $words) {
	$num = $num % 100;
	if ($num > 19) {
		$num = $num % 10;
	}
	switch ($num) {
		case 1: {
			return ($words[0]);
		}
		case 2:
		case 3:
		case 4: {
			return ($words[1]);
		}
		default: {
			return ($words[2]);
		}
	}
}

function timeSection(id, timeend) {
	dataTimer['t' + id] = id;
	dataTimer['t' + timeend] = timeend;
	today = dataTimer['t' + timeend];
	tsec = today % 60;
	today = Math.floor(today / 60);
	if (tsec < 10) {
		tsec = '0' + tsec;
	}
	tmin = today % 60;
	today = Math.floor(today / 60);
	if (tmin < 10) {
		tmin = '0' + tmin;
	}
	thour = today % 24;
	today = Math.floor(today / 24);
	$num = today;
	$words = Array("день", "дня", "дней");
	day = num2word($num, $words);
	timestr = today + " " + day + " " + thour + ":" + tmin + ":" + tsec;
	dataTimer['t' + timestr] = timestr;
	$(".catalog-item .rg_timer_" + dataTimer['t' + id] + "").html(dataTimer["t" + timestr]);
}

function SectionTimerOn(element) {
	now = Date.parse(new Date());
	now = now / 1000;
	var element = element;
	$(element).each(function(i) {
		if ($(this).find('.rg_action_timer').length > 0) {
			id = $(this).find('.rg_action_timer').data('id');
			timeend = $(this).find('.rg_action_timer').data('timeend');
			dataTimer['t' + id] = id;
			dataTimer['t' + timeend] = timeend;
			dataTimer['t' + timeend] = Math.floor((dataTimer['t' + timeend]) - now);
			if (now > 0) {
				timeSection(dataTimer['t' + id], dataTimer['t' + timeend]);
			} else {
				$('.catalog-item[data-id="' + dataTimer['t' + id] + '"]').find('.rg_action_timer').hide();
			}
		}
	});
}

function timeElement(id, timeend) {
	dataTimer['t' + id] = id;
	dataTimer['t' + timeend] = timeend;
	today = dataTimer['t' + timeend];
	tsec = today % 60;
	today = Math.floor(today / 60);
	if (tsec < 10) {
		tsec = '0' + tsec;
	}
	tmin = today % 60;
	today = Math.floor(today / 60);
	if (tmin < 10) {
		tmin = '0' + tmin;
	}
	thour = today % 24;
	today = Math.floor(today / 24);
	$num = today;
	$words = Array("день", "дня", "дней");
	day = num2word($num, $words);
	timestr = today + " " + day + " " + thour + ":" + tmin + ":" + tsec;
	dataTimer['t' + timestr] = timestr;
	$(".catalog-item-page .product-cols .rg_timer_" + dataTimer['t' + id] + "").html(dataTimer["t" + timestr]);
}

function ElementTimerOn(element) {
	now = Date.parse(new Date());
	now = now / 1000;
	var element = element;
	$(element).each(function(i) {
		if ($(this).find('.rg_action_timer').length > 0) {
			id = $(this).find('.rg_action_timer').data('id');
			timeend = $(this).find('.rg_action_timer').data('timeend');
			dataTimer['t' + id] = id;
			dataTimer['t' + timeend] = timeend;
			dataTimer['t' + timeend] = Math.floor((dataTimer['t' + timeend]) - now);
			if (now > 0) {
				timeElement(dataTimer['t' + id], dataTimer['t' + timeend]);
			} else {
				$(element).find('.rg_action_timer').hide();
			}
		}
	});
}
DelayModalYouBuy = 0;

function ModalBuyDelay() {
	DelayModalYouBuy = setTimeout(function() {
		$('.modal_thx').remove();
		$('.modal_you_buy_wrapp').remove();
		$('.modal_overlay').remove();
	}, 3000);
}
$(document).on('click', '.buy-btn', function() {
	lang = getLang();
	mess = {};
	if (lang == 'ru') {
		mess.tg = 'Товар добавлен в Вашу корзину!';
		mess.oz = 'Оформить заказ';
		mess.co = 'Продолжить покупки';
		url = '/ru/orders';
	} else {
		mess.tg = '\n' + 'Товар доданий у Ваш кошик!';
		mess.oz = 'Оформити';
		mess.co = 'Продовжити покупки';
		url = '/uk/orders';
	}
	$('body').append('<div class="modal_overlay" style="z-index: 999998"></div>');
	$('body').append('<div class="modal_you_buy_wrapp" style="z-index: 999999"><span class="modal_you_buy_close"></span>' +
		'<div class="you_buy">' +
		'<div class="modal_title">' + mess.tg + '</div>' +
		'<div class="modal_buttons_wrapp">' +
		'<div class="modal_button"><a href="' + url + '">' + mess.oz + '</a></div>' +
		'<div class="modal_button continue_buy">' + mess.co + '</div>' +
		'</div>' +
		'</div>' +
		'</div>');
	clearTimeout(DelayModalYouBuy);
	ModalBuyDelay();
});
$(document).on('click', '.modal_overlay, .continue_buy, .modal_you_buy_close', function() {
	clearTimeout(DelayModalYouBuy);
	$('.modal_overlay').remove();
	$('.modal_you_buy_wrapp').remove();
});

function modalPr(name) {
	var modalName = name;
	$.get("/ajax/modal/" + modalName + ".php").done(function(data) {
		html = $(data).html();
		$('body').append('<div class="modal_overlay"></div>');
		$('body').append('<div class="modal_wrapp"><span class="modal_close" ></span>' + html + '</div>');
		$(document).on('click', '.modal_overlay, .modal_close', function() {
			$('.modal_overlay').remove();
			$('.modal_wrapp').remove();
			$('.modal_thx').remove();
		});
		$(document).on('click', '.modal_sub', function() {
			function Validate() {
				$('.modal_wrapp').remove();
				$('body').append('<div class="modal_thx">Спасибо! Мы рассмотрим Вашу заявку в ближайшее время!</div>');
				setTimeout(function() {
					$('.modal_thx').remove();
				}, 3000);
				setTimeout(function() {
					$('.modal_overlay').remove();
				}, 3000);
			}
			if ($(".modal_wrapp .inputtext").val() == '') {
				flag = 0;
			} else if ($(".modal_wrapp .inputtextarea").val() == '') {
				flag = 0;
			} else {
				flag = 1;
			}
			if (flag != false) {
				Validate();
			}
		});
	});
}
searchHTML = $('.search').html();
if (!searchHTML) {
	searchHTML = $('.search-fixed').html();
}
$('.catalog-fixed').click(function() {
	if ($('.mobile-menu').hasClass('open')) {
		$('.mobile-menu').removeClass('open');
		$(this).removeClass('active');
		$(".mobile-menu").animate({
			"left": "-100%"
		}, "fast");
		$('body').removeClass('fixed');
	} else {
		$('.mobile-menu').addClass('open');
		$(this).addClass('active');
		$(".mobile-menu").animate({
			"left": "0px"
		}, "fast");
		$('body').addClass('fixed');
	}
});
$(document).ready(function() {
	$('.open-menu').click(function() {
		showHide();
	})

	function checkHeader(searchHTML) {
		if ($('body').width() > 1024) {
			if ($('#page-body').length != '0') {
				if (($(window).scrollTop()) > ($('#page-body').offset().top + 500)) {
					$('#header .header-mobile').show();
					if (!$('.search-fixed .searching_wrap').is('div')) {
						$('.search-fixed').html(searchHTML);
						$('.search .searching_wrap').remove();
						$('#search-result').remove();
					}
				} else {
					$('#header .header-mobile').hide();
					if (!$('.search .searching_wrap').is('div')) {
						$('.search').html(searchHTML);
						$('#search-result').remove();
						$('.search-fixed .searching_wrap').remove();
					}
				}
			}
		} else {
			if (!$('.search-fixed .searching_wrap').is('div')) {
				$('.search-fixed').html(searchHTML);
			}
		}
	}
	checkHeader(searchHTML);
	$(window).on('scroll', function() {
		checkHeader(searchHTML);
	});
	$(window).on('resize', function() {
		checkHeader(searchHTML);
	});
	if ($('body').width() < 1025) {
		$('#header .header-mobile').show();
		$('.search-fixed').html(searchHTML);
		$('.search .searching_wrap').remove();
	}
	$(window).on('resize', function() {
		lang = getLang();
		mess = {};
		if (lang == 'ru') {
			mess.sb = 'Начните поиск';
			mess.sbl = 'Найдите лучшее для сада';
		} else {
			mess.sb = 'Почніть пошук';
			mess.sbl = 'Знайдіть краще для саду';
		}
		if ($('body').width() < 1025) {
			if (!$('#header .header-mobile').is(':visible')) {
				$('#header .header-mobile').show();
				$('.search .searching_wrap').remove();
				$('.search-fixed').html(searchHTML);
			}
		} else if ($(window).scrollTop() < $('#page-body').offset().top + 500) {
			$('.search').html(searchHTML);
			$('.search-fixed .searching_wrap').remove();
		}
		if ($('body').width() < 600) {
			$('input[name="q"]').attr('placeholder', mess.sb)
		} else {
			$('input[name="q"]').attr('placeholder', mess.sbl)
		}
	});
	$(document).delegate('.jq-number .plus', 'click', function() {
		var count = $(this).parents('.jq-number').find('input').val();
		count = +count + 1;
		$(this).parents('.jq-number').find('input').attr('value', count);
		$(this).parents('.jq-number').find('input').val(count);
	});
	$(document).delegate('.jq-number .minus', 'click', function() {
		var count = $(this).parents('.jq-number').find('input').val();
		count = +count - 1;
		if (count <= 0) {
			count = 1;
			$(this).parents('.jq-number').find('input').attr('value', count);
			$(this).parents('.jq-number').find('input').val(count);
		} else {
			$(this).parents('.jq-number').find('input').attr('value', count);
			$(this).parents('.jq-number').find('input').val(count);
		}
	});
	$(document).ready(function() {
		if ($('.filtered-list-scroller').length) {
			$('.filter-box-popup .filtered-list .filtered-list-form input[type="text"]').on('keyup', function() {
				var val = $(this).val().toString().toLowerCase();
				if (val == '') {
					$('.filtered-list-scroller ul li').removeClass('hidden');
				} else {
					$('.filtered-list-scroller ul li').each(function() {
						var text = $(this).find('label').text().toLowerCase();
						if (text.indexOf(val) < 0) {
							$(this).addClass('hidden');
						}
					})
				}
				slyFilter.reload();
			});
		}
		$('.select-box .select-box-title').on('click', function(e) {
			e.preventDefault();
			$('.select-box').not($(this).closest('.select-box')).removeClass('opened');
			$(this).closest('.select-box').toggleClass('opened');
		})
		$('.filter-box .filter-box-title').on('click', function(e) {
			e.preventDefault();
			$('.filter-box').not($(this).closest('.filter-box')).removeClass('opened');
			$(this).closest('.filter-box').toggleClass('opened');
		})
		$('.filter-box .apply-btn').on('click', function(e) {
			e.preventDefault();
			var $filter = $(this).closest('.filter-box'),
			size = $filter.find('input[type="checkbox"]:checked').size(),
			pr = $filter.data('pr');
			switch (size) {
				case 0:
				$filter.removeClass('opened');
				break;
				case 1:
				var val = $filter.find('input[type="checkbox"]:checked + label').text();
				$filter.find('.filter-box-title .value').html(val);
				$filter.addClass('selected').removeClass('opened');
				break;
				default:
				$filter.addClass('selected multiple').removeClass('opened');
				$filter.find('.filter-box-title .value').html(size + ' ' + declOfNum(size, pr));
			}
		})
		$('.filter-box .filter-box-title .remove').on('click', function(e) {
			return false;
		})
		$(document).on('click', function(e) {
			if (!$(e.target).closest('.select-box').length)
				$('.select-box').removeClass('opened');
			if (!$(e.target).closest('.filter-box').length)
				$('.filter-box').removeClass('opened');
		})
	});
	if ($('.order-scroll-to-top').length) {
		$(window).on('scroll', function() {
			if ($(window).scrollTop() > 200) {
				$('.order-scroll-to-top').addClass('visible');
			} else {
				$('.order-scroll-to-top').removeClass('visible');
			}
		})
	}
	$('.scroll-to-top').on('click', function(e) {
		e.preventDefault();
		$('body, html').animate({
			scrollTop: 0
		}, 300);
	});
	$(document).ready(function() {
		$('input[name="q"]').live('keydown', function(e) {
			if (e.keyCode === 13) {
				$(this).blur();
				search($(this).val());
			}
		});
		$('.search-submit').live('click', function() {
			let val = $(this).parent().find('input').val();
			if (val.length > 0) {
				if (document.documentElement.lang == 'ru')
					location.href = '/catalog/?q=' + val;
				else {
					location.href = '/ua/catalog/?q=' + val;
				}
			}
		});
		dktime = 0;
		$('input[name="q"]').live('keyup', function() {
			if (dktime != 0) {
				clearTimeout(dktime);
			}
			let val = $(this).val();
			if (val.length > 3) {
				dktime = setTimeout(search, 1500, val);
			} else {
				if ($('.search-result').is('div')) {
					$('.search-result').not('.static').remove();
				}
			}
		})
	});
	$('.search-fixed').click(function(e) {
		notclick = $('.input-block');
		if (notclick.has(e.target).length === 0) {
			if ($('.search-fixed').hasClass('active')) {
				$('.search-fixed').removeClass('active');
			} else {
				$('.search-fixed').addClass('active');
			}
		}
	});

	function search(val) {
		if (val.length > 0) {
			lang = getLang();
			mess = {};
			if (lang == 'ru') {
				mess.sz = 'Загружаем результаты по Вашему запросу..';
				url = '/ajax/search.php';
			} else {
				mess.sz = 'Завантажуємо результати по Вашому запиту..';
				url = '/ua/ajax/search.php';
			}
			$('.search-result').not('.static').remove();
			if ($('.search-fixed').is(':visible')) {
				$('.search-fixed').append('<div class="search-result" id="search-result"><div class="container" style="text-align: center"><div id="wait"></div><span>' + mess.sz + '</span></div></div>');
				$('.search-result').not('.static').css('top', $('#search-title input').height());
				$('.search-result').not('.static').addClass('fixed');
				$('.search-result').not('.static').css('top', $('.search-fixed #search-title input').height() + 13);
			} else {
				$('.searching_wrap').append('<div class="search-result" id="search-result"><div class="container" style="text-align: center"><div id="wait"></div><span>' + mess.sz + '</span></div></div>');
				$('.search-result').not('.static').css('top', $('#search-title input').height());
				$('.search-result').not('.static').addClass('fixed');
				$('.search-result').not('.static').css('top', $('.searching_wrap #search-title input').height() + 50 + $('.top-content-info').height());
			}
			$.ajax(url, {
				type: 'POST',
				data: {
					q: val
				}
			}).success(function(data) {
				$('.search-result').not('.static').remove();
				if ($('.search-fixed').is(':visible')) {
					$('.search-fixed').append('<div class="search-result" id="search-result">' + data + '</div>');
					$('.search-result').not('.static').css('top', $('#search-title input').height());
					$('.search-result').not('.static').addClass('fixed');
					$('.search-result').not('.static').css('top', $('.search-fixed #search-title input').height() + 13);
				} else {
					$('.searching_wrap').append('<div class="search-result" id="search-result">' + data + '</div>');
					$('.search-result').not('.static').css('top', $('#search-title input').height());
					$('.search-result').not('.static').addClass('fixed');
					$('.search-result').not('.static').css('top', $('.searching_wrap #search-title input').height() + 50 + $('.top-content-info').height());
				}
				$(document).click(function(evt) {
					if (!$('.fancybox-overlay-fixed').is('div') && !$('.modal_overlay').is('div')) {
						if (!$(evt.target).closest('#search-result').length && !$(evt.target).closest('.fancybox-wrap').length && !$(evt.target).closest('.modal_you_buy_wrapp').length && !$(evt.target).closest('.fancybox-close').length && !$(evt.target).closest('.rem_modal_wrapp').length && !$(evt.target).closest('.modal_overlay').length) {
							$('.search-result').not('.static').remove();
							console.log($(evt.target));
						}
					}
				});
				$('.search-result .close').click(function() {
					$('.search-result').not('.static').remove();
				});
			});
		}
	}
	$('.video-youtube[data-fancybox-type="iframe"]').fancybox({
		type: 'iframe',
		width: '560px',
		height: '300px',
		youtube: {
			autoplay: 1
		},
		helpers: {
			media: true
		},
	});

	function isInViewport(el) {
		var rect = el.getBoundingClientRect();
		return (rect.bottom >= 0 && rect.right >= 0 && rect.top <= (window.innerHeight || document.documentElement.clientHeight) && rect.left <= (window.innerWidth || document.documentElement.clientWidth));
	}

	function lazyLoad() {
		var lazy = document.getElementsByClassName('lazy');
		for (var i = 0; i < lazy.length; i++) {
			if (isInViewport(lazy[i])) {
				lazy[i].src = lazy[i].getAttribute('data-original');
			}
		}
	}
	registerListener('load', lazyLoad);
	registerListener('scroll', lazyLoad);

	function registerListener(event, func) {
		if (window.addEventListener) {
			window.addEventListener(event, func)
		} else {
			window.attachEvent('on' + event, func)
		}
	}
	$needmenu = true;
	$ajaxblock = $(".main-menu #jmenu_ajax");

	function jmenu_show($id) {
		$(".main-menu #jmenu_ajax .left-menu").each(function() {
			$asecblock = $(this);
			$sec = $asecblock.data("sec");
			if ($id == $sec) {
				var lazy = $asecblock.find('.lazy-m');
				for (var i = 0; i < lazy.length; i++) {
					if (isInViewport(lazy[i])) {
						lazy[i].src = lazy[i].getAttribute('data-original');
					}
				}
				$asecblock.show()
			} else {
				$asecblock.hide()
			}
		});
		jmenuT = setTimeout(function() {
			$ajaxblock.fadeIn();
		}, 300)
	}
	$(document).ready(function() {
		timeout = 0;
		timeoutclose = 0;
		$('.small-basket, .menu-auth, .has-sub').on("mouseenter", function() {
			timeout = setTimeout(showSub, 500, $(this));
		});

		function showSub(el) {
			$(el).find('.sub-new').css('opacity', '1');
			$(el).find('.sub-new').css('pointer-events', 'all');
		}

		function hideSub(el) {
			$(el).find('.sub-new').css('opacity', '0');
			$(el).find('.sub-new').css('pointer-events', 'none');
		}
		$('.small-basket, .menu-auth, .has-sub').on("mouseleave", function() {
			timeoutclose = setTimeout(hideSub, 500, $(this));
			clearTimeout(timeout);
		});
		jmenuT = false;
		$(".jmenu_main").on("mouseenter", function() {
			$id = $(this).data("id");
			lang = '<?=LANGUAGE_ID?>';
			if ($needmenu) {
				$needmenuload = false;
				var d = new Date();
				var curr_date = d.getDate();
				var curr_month = d.getMonth() + 1;
				var curr_year = d.getFullYear();
				$now = curr_year + "" + curr_month + "" + curr_date;
				jmenu = {
					date: $now,
					nav: ''
				};
				$jmenudata = localStorage["jmenu_" + lang];
				if ($jmenudata) {
					$jmenudata = JSON.parse($jmenudata);
					if ($jmenudata.date != $now && $jmenudata.nav) {
						localStorage.removeItem("jmenu_" + lang);
						$needmenuload = true;
					} else {
						jmenu = $jmenudata;
					}
				} else {
					$needmenuload = true;
				}
				$needmenuload = true;

				$needmenu = false;
			} else {
				jmenu_show($id);
			}
		});
		$(".jmenu_main").on("mouseleave", function() {
			if (!!jmenuT) clearTimeout(jmenuT);
		});
		$("nav,.last_four").on("mouseleave", function() {
			$ajaxblock.fadeOut();
		});
	});;;

	function modalPr(name) {
		var modalName = name;
		$.get("/ajax/modal/" + modalName + ".php").done(function(data) {
			html = $(data).html();
			$('body').append('<div class="modal_overlay"></div>');
			$('body').append('<div class="modal_wrapp" style="width: 400px; top: 10%; left: 50%; margin-left: -200px;"><span class="modal_close" style="top: 12%; left: 50%; margin-left: 183px; margin-top: -4px;"></span>' + html + '</div>');
			$(document).on('click', '.modal_overlay, .modal_close', function() {
				$('.modal_overlay').remove();
				$('.modal_wrapp').remove();
				$('.modal_thx').remove();
			});
			$(document).on('click', '.modal_sub', function() {
				function Validate() {
					$('.modal_wrapp').remove();
					$('body').append('<div class="modal_thx">Спасибо! Мы рассмотрим Вашу заявку в ближайшее время!</div>');
					setTimeout(function() {
						$('.modal_thx').remove();
					}, 3000);
					setTimeout(function() {
						$('.modal_overlay').remove();
					}, 3000);
				}
				if ($(".modal_wrapp .inputtext").val() == '') {
					flag = 0;
				} else if ($(".modal_wrapp .inputtextarea").val() == '') {
					flag = 0;
				} else {
					flag = 1;
				}
				if (flag != false) {
					Validate();
				}
			});
		});
	};;


	// function like(el) {
	// 	let id = BX.data(el, 'id'),
	// 	us = BX.data(el, 'us');
	// 	$('.like[data-id=' + id + ']').click(function() {
	// 		return false;
	// 	});
	// 	BX.ajax.post('/bitrix/components/diamon/catalog.like/ajax.php', {
	// 		id: id,
	// 		us: us
	// 	}, function(res) {
	// 		mas = JSON.parse(localStorage.getItem('likes'));
	// 		count = $('.like[data-id=' + id + ']').find('.count');
	// 		fa = $('.like[data-id=' + id + ']').find('i');
	// 		if (res == 'like') {
	// 			mas.push(id);
	// 			console.log(mas);
	// 			localStorage.setItem('likes', JSON.stringify(mas));
	// 			count.each(function(i) {
	// 				$(count[i]).text(+$(count[i]).text() + 1);
	// 			});
	// 			fa.each(function(i) {
	// 				$(fa[i]).removeClass('far');
	// 				$(fa[i]).addClass('fas');
	// 			});
	// 			$('.like-popup .count').text(+$('.like-popup .count').text() + 1);
	// 			$('.likes').text(+$('.like-popup .count').text() + 1);
	// 			setLikes();
	// 			$('.like[data-id=' + id + ']').click(click(this));
	// 		} else {
	// 			mas.splice(mas.indexOf(id), 1);
	// 			localStorage.setItem('likes', JSON.stringify(mas));
	// 			count.each(function(i) {
	// 				$(count[i]).text(+$(count[i]).text() - 1);
	// 			});
	// 			fa.each(function(i) {
	// 				$(fa[i]).removeClass('fas');
	// 				$(fa[i]).addClass('far');
	// 			});
	// 			$('.like-popup .count').text(+$('.like-popup .count').text() - 1);
	// 			$('.likes').text(+$('.like-popup .count').text() - 1);
	// 			setLikes();
	// 			$('.like[data-id=' + id + ']').click(click(this));
	// 		}
	// 	});
	// }

	// function setLikeCoockie(id = false) {
	// 	if (!id) return false;
	// 	else {
	// 		document.cookie = "setLike=" + id + "; path=/; max-age=3600";
	// 	}
	// }
	// BX.ready(function(){setTimeout(setLikes,2000);});function setLikes(){likes=$('.fa-heart-o');mas=JSON.parse(localStorage.getItem('likes'));if(mas){if(mas.length>0){likes.each(function(i){if(mas.indexOf(String($(likes[i]).data('id')))!='-1'){$(likes[i]).removeClass('far');$(likes[i]).addClass('fas');}});$('.likes').text(mas.length);}
	// lang=getLang();mess={};if(lang=='ru'){mess.nra='Вам нравится';mess.more=' Узнать'
	// href='/personal/like_items/';}else{mess.nra='Вам подобається';mess.more=' Дізнатися'
	// href='/ua/personal/like_items/';}
	// if(mas.length>0){$('.like-popup .text').html(mess.nra+' <br><span class="count">'+mas.length+'</span> тов.');$('.like-popup').parent().attr('href',href);}else{$('.like-popup .text').html($('.like-popup .text').html()+mess.more);$('.like-popup').parent().attr('href','/actions/aktsiya-2000-bonusov-za-layki-/');}}};;function showHide(){if($('.section-menu').hasClass('open')||h){$('.section-menu').removeClass('open');$('.section-menu').animate({left:'-100%'},1000);$('.catalog-fixed').removeClass('active');$('body').removeClass('fixed');}else{$('.section-menu').addClass('open');$('.catalog-fixed').click();$('.section-menu').animate({left:'0'},500);$('body').addClass('fixed');}}

	$('.section-menu .close').click(function() {
		$('.section-menu').removeClass('open');
		$('.catalog-fixed').click();
		$('.section-menu').animate({
			left: '-100%'
		}, 1000);
		$('body').removeClass('fixed');
	})
	$(document).click(function(evt) {
		if (!$(evt.target).closest('.section-menu').length && !$(evt.target).closest('.open-menu').length) {
			$('.section-menu').removeClass('open');
			$('.section-menu').animate({
				left: '-100%'
			}, 1000);
		}
		if (!$(evt.target).closest('.open-menu').length && !$(evt.target).closest('.catalog-fixed').length && !$(evt.target).closest('.section-menu').length && !$(evt.target).closest('.m-menu').length) {
			$('.mobile-menu').removeClass('open');
			$(".mobile-menu").animate({
				"left": "-100%"
			}, "fast");
			$('body').removeClass('fixed');
			$('.catalog-fixed').removeClass('active');
		}
	});
});;
$(document).ready(function() {
	if ($(window).width() > 1024) {
		var id = $('.rg_banner_right_bottom').data('id');
		var show = localStorage.getItem("BANNERS_BOTTOM_RIGHT");
		if (show == null || show == '') {
			show = ['0'];
		} else {
			show = show.split(';');
		}
		if ($.inArray('' + id + '', show) == -1) {
			setTimeout(function() {
				if ($('.rg_banner_right_bottom').length != 0) {
					$('.rg_banner_right_bottom').addClass('rg_banner_slide');
				}
			}, 20000);
		}
	}
});
$('.rg_banner_close').on('click', function() {
	var id = $('.rg_banner_right_bottom').data('id');
	var oldvalue = localStorage.getItem("BANNERS_BOTTOM_RIGHT");
	if (oldvalue == null || oldvalue == '') {
		newvalue = id;
		string = ['0'];
	} else {
		newvalue = oldvalue + ';' + id;
		string = oldvalue.split(';');
	}
	$('.rg_banner_right_bottom').remove();
	if ($('.rg_banner_right_bottom').length == 0) {
		var value = $.inArray('' + id + '', string);
		if (value == -1) {
			localStorage.setItem("BANNERS_BOTTOM_RIGHT", newvalue);
		}
	}
});;;;;;;;;;
