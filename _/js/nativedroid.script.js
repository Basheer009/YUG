$(document).on("pageinit", function() {
    var e = (new Date).getTime();
    nativeDroid = {
        basic: {
            dateFormat: {
                language: {
                    set: "en",
                    type: "short",
                    en: {
                        dayShort: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
                        dayLong: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
                        monthShort: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                        monthLong: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                        order: function(e, t, n, i, o) {
                            return t + ", " + o + " " + n
                        }
                    },
                    de: {
                        dayShort: ["So", "Mo", "Di", "Mi", "Do", "Fr", "Sa"],
                        dayLong: ["Sonntag", "Montag", "Dienstag", "Mittwoch", "Donnerstag", "Freitag", "Samstag"],
                        monthShort: ["Jan", "Feb", "Mrz", "Apr", "Mai", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Dez"],
                        monthLong: ["Januar", "Februar", "M&auml;rz", "April", "Mai", "Juni", "Juli", "August", "September", "Oktober", "November", "Dezember"],
                        order: function(e, t, n, i, o, a) {
                            return t + ", " + n + ". " + o + " " + a
                        }
                    }
                },
                getTodayString: function(e, t, n, i) {
                    return dfLang = nativeDroid.basic.dateFormat.language, type = dfLang.type, lang = dfLang.set, retStr = "--empty-string--", "long" == type ? (dayStr = dfLang[lang].dayLong[e], monthStr = dfLang[lang].monthLong[n]) : "short" == type && (dayStr = dfLang[lang].dayShort[e], monthStr = dfLang[lang].monthShort[n]), retStr = dfLang[lang].order(e, dayStr, t, n, monthStr, i)
                },
                format: function(e) {
                    return d = new Date(e), nativeDroid.basic.dateFormat.getTodayString(d.getDay(), d.getDate(), d.getMonth(), d.getFullYear())
                }
            },
            touchEvent: function() {
                return "ontouchstart" in document.documentElement ? "touchstart" : "click"
            },
            disableScrollTop: function() {
                $(window).scrollTop(1), $(window).on("scroll", function() {
                    0 >= $(window).scrollTop() && $(window).scrollTop(1)
                })
            }
        },
        design: {
            animation: {
                delayedFadeIn: function() {
                    obj = $(".delayedFadeIn"), obj && obj.length > 0 && (delay = 2750, setTimeout(function() {
                        $(".delayedFadeIn:last").fadeIn(1e3).removeClass("delayedFadeIn"), nativeDroid.design.animation.delayedFadeIn()
                    }, delay))
                }
            },
            progress: {
                loaded: !1,
                ini: function() {
                    $("body").prepend("<progress id='nativeDroidProgress' data-animation-time='5' value='0' max='100' class='nativeDroidProgress'></progress>"), $(".ui-header").addClass("noborder"), $(".nativeDroidProgress").attr("data-animation-time", 0).attr("value", 0), setTimeout(function() {
                        nativeDroid.design.progress.createCSS($("body").data("nativedroid-progress-animation")), $(".nativeDroidProgress").attr("data-animation-time", 5).attr("value", 100)
                    }, 300)
                },
                update: function(e) {
                    roundedTime = e % 5 >= 2.5 ? 5 * parseInt(e / 5) + 5 : 5 * parseInt(e / 5), nativeDroid.design.progress.createCSS(0), $(".nativeDroidProgress").attr("data-animation-time", 0).attr("value", 0), setTimeout(function() {
                        $(".nativeDroidProgress").attr("data-animation-time", roundedTime), nativeDroid.design.progress.createCSS($(".nativeDroidProgress").attr("data-animation-time")), $(".nativeDroidProgress").attr("value", 100)
                    }, 300)
                },
                blink: function() {
                    $(".nativeDroidProgress").fadeTo(500, .5, function() {
                        $(".nativeDroidProgress").fadeTo(500, 1)
                    })
                },
                createCSS: function(e) {
                    s = ".nativeDroidProgress::-webkit-progress-value { -webkit-transition: all " + e + "s !important; }", s += ".nativeDroidProgress::-moz-progress-bar { -moz-transition: all " + e + "s !important; }", $("#progressLoadeStyle").remove(), $("<style type='text/css' id='progressLoaderStyle'> " + s + " </style>").appendTo("head")
                }
            }
        },
        plugins: {
            cards: {
                ini: function(e) {
                    e.addClass("nativeDroidCards"), e.find(" > li").each(function() {
                        type = $(this).attr("data-cards-type"), nativeDroid.plugins.cards.create[type]($(this))
                    })
                },
                create: {
                    text: function() {
                        console.log("text")
                    },
                    traffic: function(e) {
                        route = e.data("cards-traffic-route"), e.find(".map").html("Display a route-map here [from: " + route.from + ", to: " + route.to + "]"), route.container = e.find(".map").get(0), nativeDroid.api.helper.googlemaps.directions.getRoute(route)
                    },
                    weather: function() {
                        console.log("weather")
                    },
                    publictransport: function() {
                        console.log("publictransport")
                    },
                    sports: function() {
                        console.log("sports")
                    }
                }
            },
            twitter: {
                container: !1,
                results: {
                    count: 0,
                    rpmin: 0,
                    first: 0,
                    last: 0,
                    pendingResults: [],
                    update: function(e) {
                        nativeDroid.plugins.twitter.results.count += e, lastResult = (new Date).getTime() / 1e3, firstResult = nativeDroid.plugins.twitter.results.first, nativeDroid.plugins.twitter.results.first = 0 == firstResult ? nativeDroid.plugins.twitter.results.last : firstResult, nativeDroid.plugins.twitter.results.last = lastResult, results = nativeDroid.plugins.twitter.results.count, rpm = Math.round(results / ((lastResult - firstResult) / 60)), nativeDroid.plugins.twitter.results.rpmin = rpm, qd = nativeDroid.plugins.twitter.request.queryData, rpp = qd.rpp ? parseInt(qd.rpp) : 15, rpm > .5 && (ad = 6e4 * (.8 * rpp / rpm), ad > 1e4 && 12e4 > ad && (nativeDroid.plugins.twitter.refresh.time = ad))
                    }
                },
                refresh: {
                    url: !1,
                    time: !1,
                    auto_delay: 45e3,
                    load: function() {
                        nativeDroid.design.progress.update(nativeDroid.plugins.twitter.refresh.time / 1e3), nativeDroid.plugins.twitter.refresh.time > 1e4 && nativeDroid.plugins.twitter.refresh.url ? (nativeDroid.api.get("jsonp", nativeDroid.plugins.twitter.request.queryURL + nativeDroid.plugins.twitter.refresh.url, !1, nativeDroid.plugins.twitter.append), setTimeout(nativeDroid.plugins.twitter.refresh.load, nativeDroid.plugins.twitter.refresh.time)) : console.log("Refresh timer invalid or refresh URL not set."), logDate = new Date
                    }
                },
                request: {
                    search: {
                        q: {
                            parameter: "q",
                            required: !0,
                            value: !1
                        },
                        callback: {
                            parameter: "callback",
                            required: !1,
                            value: !1
                        },
                        geocode: {
                            parameter: "geocode",
                            required: !1,
                            value: !1
                        },
                        lang: {
                            parameter: "lang",
                            required: !1,
                            value: !1
                        },
                        locale: {
                            parameter: "locale",
                            required: !1,
                            value: !1
                        },
                        page: {
                            parameter: "page",
                            required: !1,
                            value: !1
                        },
                        result_type: {
                            parameter: "result_type",
                            required: !1,
                            value: !1
                        },
                        rpp: {
                            parameter: "rpp",
                            required: !1,
                            value: !1
                        },
                        show_user: {
                            parameter: "show_user",
                            required: !1,
                            value: !1
                        },
                        until: {
                            parameter: "until",
                            required: !1,
                            value: !1
                        },
                        since_id: {
                            parameter: "since_id",
                            required: !1,
                            value: !1
                        },
                        max_id: {
                            parameter: "max_id",
                            required: !1,
                            value: !1
                        },
                        include_entities: {
                            parameter: "include_entities",
                            required: !1,
                            value: !1
                        }
                    },
                    queryURL: !1,
                    queryData: !1,
                    prepareQuery: function() {
                        obj = nativeDroid.plugins.twitter.container, nativeDroid.plugins.twitter.request.queryData = obj.data("nativedroid-twitter-get")
                    }
                },
                ini: function(e) {
                    nativeDroid.plugins.twitter.container = e, t = e.attr("data-nativedroid-twitter-type"), nativeDroid.plugins.twitter.load(t), "false" != nativeDroid.plugins.twitter.container.attr("data-nativedroid-twitter-refresh") && nativeDroid.design.progress.ini(), refreshTime = nativeDroid.plugins.twitter.container.attr("data-nativedroid-twitter-refresh"), refreshTime && "false" != refreshTime && (nativeDroid.plugins.twitter.refresh.time = "auto" != refreshTime ? parseInt(refreshTime) : nativeDroid.plugins.twitter.refresh.auto_delay, setTimeout(nativeDroid.plugins.twitter.refresh.load, parseInt(nativeDroid.plugins.twitter.refresh.time)))
                },
                apiUrl: {
                    search: "http://search.twitter.com/search.json"
                },
                load: function(e) {
                    nativeDroid.plugins.twitter.request.prepareQuery(), nativeDroid.plugins.twitter.request.queryURL = this.apiUrl[e], nativeDroid.api.get("jsonp", this.request.queryURL, this.request.queryData, this.append), nativeDroid.plugins.twitter.populate()
                },
                populate: function() {
                    setInterval(function() {
                        p = nativeDroid.plugins.twitter.results.pendingResults, p && p.length > 0 && (nativeDroid.design.progress.blink(), nativeDroid.plugins.twitter.container.prepend(p[0]), nativeDroid.plugins.twitter.results.pendingResults.splice(0, 1), $(".ui-page-active .ui-listview").listview("refresh"))
                    }, 3e3)
                },
                append: function(e) {
                    if (e && (nativeDroid.plugins.twitter.refresh.url = e.refresh_url ? e.refresh_url : nativeDroid.plugins.twitter.refresh.url, e = e.results ? e.results : e, anz = e.length, nativeDroid.plugins.twitter.results.update(anz), anz > 0))
                        for (i = 0; anz > i; i++) entity = e[i], html = "", html += "<li>", html += "<img src='" + entity.profile_image_url + "'>", html += "<h2><a href='http://www.twitter.com/" + entity.from_user + "' data-ajax='false' target='_blank'>" + entity.from_user_name + "</a></h2>", html += "<p>" + entity.text + "</p>", html += "</li>", toTimer = 1e3 * i, nativeDroid.plugins.twitter.results.pendingResults.splice(0, 0, html)
                }
            },
            flickr: {
                container: !1,
                apiKey: !1,
                dragStarted: !1,
                dragStartX: 0,
                lastSwipe: !1,
                request: {
                    queryData: !1,
                    apiUrl: "http://api.flickr.com/services/rest/?method=flickr.",
                    requestUrl: !1,
                    cat: !1,
                    method: !1,
                    parameter: !1,
                    prepareQuery: function() {
                        obj = nativeDroid.plugins.flickr.container, cat = obj.data("nativedroid-flickr-cat"), method = obj.data("nativedroid-flickr-method"), apikey = obj.data("nativedroid-flickr-apikey"), parameter = obj.data("nativedroid-flickr-parameter"), nativeDroid.plugins.flickr.request.cat = cat, nativeDroid.plugins.flickr.request.method = method, nativeDroid.plugins.flickr.request.parameter = parameter, nativeDroid.plugins.flickr.request.requestUrl = nativeDroid.plugins.flickr.request.apiUrl + cat + "." + method + "&api_key=" + apikey + "&nojsoncallback=1&format=json&" + parameter
                    }
                },
                bindEvents: function() {
                    $(".ui-page").on("click", ".nativeDroidGallery li:not('.active')", function() {
                        lastSwipe = nativeDroid.plugins.flickr.lastSwipe, nativeDroid.plugins.flickr.dragStarted = !1, orig = $(this), $(".overlay").show(), lastSwipe ? "left" == lastSwipe ? ($(this).addClass("active").addClass("noTransition").addClass("slideRight"), setTimeout(function() {
                            orig.removeClass("noTransition").removeClass("slideRight")
                        }, 1)) : "right" == lastSwipe && ($(this).addClass("active").addClass("noTransition").addClass("slideLeft"), setTimeout(function() {
                            orig.removeClass("noTransition").removeClass("slideLeft")
                        }, 1)) : $(this).addClass("active"), $(this).css({
                            "background-image": "url('" + $(this).data("image-thumb") + "')"
                        }), $(this).css({
                            "background-image": "url('" + $(this).data("image-large") + "')"
                        })
                    }).on("mousedown touchstart", ".nativeDroidGallery li.active .closeTrigger", function() {
                        $(this).parent().removeClass("active"), $(".overlay").hide()
                    }).on("swipeleft", ".nativeDroidGallery li.active:not('.zoom')", function(e) {
                        e.preventDefault();
                        var t = $(this);
                        t.addClass("slideLeft"), setTimeout(function() {
                            t.removeClass("active").css({
                                left: "auto"
                            }).removeClass("slideLeft").removeClass("slideRight")
                        }, 500), next = $(this).next("li"), 1 == next.length ? (nativeDroid.plugins.flickr.lastSwipe = "left", next.trigger("click")) : (nativeDroid.plugins.flickr.lastSwipe = !1, $(".overlay").hide()), thumb = t.data("image-thumb"), $(this).css({
                            "background-image": "url('" + thumb + "')"
                        })
                    }).on("swiperight", ".nativeDroidGallery li.active:not('.zoom')", function(e) {
                        e.preventDefault();
                        var t = $(this);
                        t.addClass("slideRight"), setTimeout(function() {
                            t.removeClass("active").css({
                                left: "auto"
                            }).removeClass("slideLeft").removeClass("slideRight")
                        }, 500), prev = $(this).prev("li"), 1 == prev.length ? (nativeDroid.plugins.flickr.lastSwipe = "right", prev.trigger("click")) : (nativeDroid.plugins.flickr.lastSwipe = !1, $(".overlay").hide()), thumb = t.data("image-thumb"), $(this).css({
                            "background-image": "url('" + thumb + "')"
                        })
                    }).on("mousedown touchstart", ".nativeDroidGallery li.active:not('.zoom')", function(e) {
                        nativeDroid.plugins.flickr.dragStartX = "touchstart" == e.type ? e.originalEvent.touches[0].screenX : e.screenX, nativeDroid.plugins.flickr.dragStarted = !0, $(this).addClass("noTransition")
                    }).on("mouseup touchend", ".nativeDroidGallery li.active:not('.zoom')", function() {
                        $(this).removeClass("noTransition").css({
                            left: "auto"
                        }), nativeDroid.plugins.flickr.dragStarted = !1
                    }).on("mousemove touchmove", ".nativeDroidGallery li.active:not('.zoom')", function(e) {
                        e.preventDefault(), mousedown = nativeDroid.plugins.flickr.dragStarted, mousedown && (distance = "touchmove" == e.type ? parseInt(e.originalEvent.touches[0].screenX) - parseInt(nativeDroid.plugins.flickr.dragStartX) : e.screenX - nativeDroid.plugins.flickr.dragStartX, (distance > 30 || -30 > distance) && $(this).css("left", distance + "px"))
                    }).on("click", ".nativeDroidGallerySetList li a", function(e) {
                        e.preventDefault(), setId = $(this).data("photoset-id"), setId && !isNaN(setId) ? (nativeDroid.plugins.flickr.request.cat = "photosets", nativeDroid.plugins.flickr.request.method = "getPhotos", reqUrl = nativeDroid.plugins.flickr.request.apiUrl + "photosets.getPhotos&api_key=" + nativeDroid.plugins.flickr.apiKey + "&photoset_id=" + setId + "&nojsoncallback=1&format=json&extras=description,date_upload,geo,views,url_sq,url_l,url_t", $("div[data-role='header'] h1").text($(this).text()), cLink = $("div[data-role='header'] a.ui-btn:first").attr("href"), $("div[data-role='header'] a.ui-btn:first").attr("href", cLink + "#flickr-back-to-setlist"), new nativeDroid.api.get("json", reqUrl, !1, nativeDroid.plugins.flickr.parseData)) : console.log("SetId is not a Number")
                    }), $("div[data-role='header']").on("click", "a[href$='flickr-back-to-setlist']", function(e) {
                        e.preventDefault(), $("div[data-role='header'] h1").text(document.title), href = $(this).attr("href"), hrefArr = href.split("#flickr-back-to-setlist"), $("div[data-role='header'] a.ui-btn:first").attr("href", hrefArr[0]), $(".nativeDroidGallerySet").remove(), $(".nativeDroidGallerySetList").removeClass("slideLeft")
                    })
                },
                ini: function(e) {
                    nativeDroid.plugins.flickr.container = e, nativeDroid.plugins.flickr.apiKey = e.data("nativedroid-flickr-apikey"), new nativeDroid.plugins.flickr.load, nativeDroid.plugins.flickr.bindEvents()
                },
                load: function() {
                    nativeDroid.plugins.flickr.request.prepareQuery(), new nativeDroid.api.get("json", nativeDroid.plugins.flickr.request.requestUrl, nativeDroid.plugins.flickr.request.queryData, nativeDroid.plugins.flickr.parseData)
                },
                delayedAppend: function(e, t, n) {
                    setTimeout(function() {
                        e.append(t)
                    }, n)
                },
                parseByType: {
                    photos: {
                        search: function(e) {
                            if (nativeDroid.plugins.flickr.container.addClass("nativeDroidGallery"), nativeDroid.plugins.flickr.container.append("<div class='overlay'></div>"), e.photos) {
                                var t = nativeDroid.plugins.flickr.container;
                                for (i = 0; e.photos.photo.length > i; i++) p = e.photos.photo[i], html = "<li style='background-image:url(\"" + p.url_t + "\")' data-image-large='" + p.url_l + "' data-image-thumb='" + p.url_t + "'><div class='closeTrigger'><i class='icon-remove'></i> close</div><span>" + p.title + "</span></li>", nativeDroid.plugins.flickr.delayedAppend(t, html, 50 * i)
                            }
                        }
                    },
                    photosets: {
                        getList: function(e) {
                            if (nativeDroid.plugins.flickr.container.addClass("nativeDroidGallerySetList"), e.photosets) {
                                html = "";
                                var t = nativeDroid.plugins.flickr.container;
                                for (i = 0; e.photosets.photoset.length > i; i++) set = e.photosets.photoset[i], html += "<li class='flickrGalleryLoad'><a href='#load-photoset-flickr-" + set.id + "' data-photoset-id='" + set.id + "' data-ajax='false'>" + set.title._content + "</a></li>";
                                t.append(html), $(".ui-page-active .ui-listview").listview("refresh")
                            }
                        },
                        getPhotos: function(e) {
                            if ($(".nativeDroidGallerySetList").addClass("slideLeft"), e.photoset) {
                                var t = "";
                                for (t += "<div class='nativeDroidGallerySet'><ul class='nativeDroidGallery'>", i = 0; e.photoset.photo.length > i; i++) p = e.photoset.photo[i], t += "<li style='background-image:url(\"" + p.url_t + "\")' data-image-large='" + p.url_l + "' data-image-thumb='" + p.url_t + "'><div class='closeTrigger'><i class='icon-remove'></i> close</div><span>" + p.title + "</span></li>";
                                t += "<div class='overlay'></div></ul></div>", $(".nativeDroidGallerySet").remove(), $(".nativeDroidGallerySetList").after(t)
                            }
                        }
                    }
                },
                parseData: function(e) {
                    e ? "ok" == e.stat ? (cat = nativeDroid.plugins.flickr.request.cat, method = nativeDroid.plugins.flickr.request.method, nativeDroid.plugins.flickr.parseByType[cat] !== void 0 ? nativeDroid.plugins.flickr.parseByType[cat][method] !== void 0 ? new nativeDroid.plugins.flickr.parseByType[cat][method](e) : console.log("There no data parser for " + cat + "." + method) : console.log("There no data parser for " + cat + "." + method)) : console.log("There is an error. Code: " + e.stat) : console.log("No data received. Check your request.")
                }
            },
            gallery: {
                lastSwipe: !1,
                dragStarted: !1,
                dragStartX: 0,
                bindEvents: function() {
                    $(".ui-page").on("click", ".nativeDroidGallery li:not('.active')", function() {
                        lastSwipe = nativeDroid.plugins.gallery.lastSwipe, nativeDroid.plugins.gallery.dragStarted = !1, orig = $(this), $(".overlay").show(), lastSwipe ? "left" == lastSwipe ? ($(this).addClass("active").addClass("noTransition").addClass("slideRight"), setTimeout(function() {
                            orig.removeClass("noTransition").removeClass("slideRight")
                        }, 1)) : "right" == lastSwipe && ($(this).addClass("active").addClass("noTransition").addClass("slideLeft"), setTimeout(function() {
                            orig.removeClass("noTransition").removeClass("slideLeft")
                        }, 1)) : $(this).addClass("active"), $(this).css({
                            "background-image": "url('" + $(this).data("image-thumb") + "')"
                        }), $(this).css({
                            "background-image": "url('" + $(this).data("image-large") + "')"
                        })
                    }).on("mousedown touchstart", ".nativeDroidGallery li.active .closeTrigger", function() {
                        $(this).parent().removeClass("active"), $(".overlay").hide()
                    }).on("swipeleft", ".nativeDroidGallery li.active:not('.zoom')", function(e) {
                        e.preventDefault();
                        var t = $(this);
                        t.addClass("slideLeft"), setTimeout(function() {
                            t.removeClass("active").css({
                                left: "auto"
                            }).removeClass("slideLeft").removeClass("slideRight")
                        }, 500), next = $(this).next("li"), 1 == next.length ? (nativeDroid.plugins.gallery.lastSwipe = "left", next.trigger("click")) : (nativeDroid.plugins.gallery.lastSwipe = !1, $(".overlay").hide()), thumb = t.data("image-thumb"), $(this).css({
                            "background-image": "url('" + thumb + "')"
                        })
                    }).on("swiperight", ".nativeDroidGallery li.active:not('.zoom')", function(e) {
                        e.preventDefault();
                        var t = $(this);
                        t.addClass("slideRight"), setTimeout(function() {
                            t.removeClass("active").css({
                                left: "auto"
                            }).removeClass("slideLeft").removeClass("slideRight")
                        }, 500), prev = $(this).prev("li"), 1 == prev.length ? (nativeDroid.plugins.gallery.lastSwipe = "right", prev.trigger("click")) : (nativeDroid.plugins.gallery.lastSwipe = !1, $(".overlay").hide()), thumb = t.data("image-thumb"), $(this).css({
                            "background-image": "url('" + thumb + "')"
                        })
                    }).on("mousedown touchstart", ".nativeDroidGallery li.active:not('.zoom')", function(e) {
                        nativeDroid.plugins.gallery.dragStartX = "touchstart" == e.type ? e.originalEvent.touches[0].screenX : e.screenX, nativeDroid.plugins.gallery.dragStarted = !0, $(this).addClass("noTransition")
                    }).on("mouseup touchend", ".nativeDroidGallery li.active:not('.zoom')", function() {
                        $(this).removeClass("noTransition").css({
                            left: "auto"
                        }), nativeDroid.plugins.gallery.dragStarted = !1
                    }).on("mousemove touchmove", ".nativeDroidGallery li.active:not('.zoom')", function(e) {
                        e.preventDefault(), mousedown = nativeDroid.plugins.gallery.dragStarted, mousedown && (distance = "touchmove" == e.type ? parseInt(e.originalEvent.touches[0].screenX) - parseInt(nativeDroid.plugins.gallery.dragStartX) : e.screenX - nativeDroid.plugins.gallery.dragStartX, (distance > 30 || -30 > distance) && $(this).css("left", distance + "px"))
                    })
                },
                ini: function(e) {
                    e.addClass("nativeDroidGallery"), nativeDroid.plugins.gallery.bindEvents()
                }
            },
            splashscreen: {
                container: !1,
                background: !1,
                time: 3,
                animation: !1,
                bindEvents: function() {},
                create: function() {
                    var e = nativeDroid.plugins.splashscreen.container,
                        t = nativeDroid.plugins.splashscreen.background,
                        n = nativeDroid.plugins.splashscreen.animation;
                    t && (e.addClass("nativeDroidSplashscreen").css({
                        "background-image": "url('" + t + "')"
                    }), delay = 1e3 * nativeDroid.plugins.splashscreen.time, setTimeout(function() {
                        n && e.addClass(n), setTimeout(function() {
                            e.remove()
                        }, 500)
                    }, delay))
                },
                ini: function(e) {
                    nativeDroid.plugins.splashscreen.container = e, nativeDroid.plugins.splashscreen.time = parseInt(e.data("nativedroid-splashscreen-time")), nativeDroid.plugins.splashscreen.background = e.data("nativedroid-background"), nativeDroid.plugins.splashscreen.animation = e.data("nativedroid-splashscreen-animation"), nativeDroid.plugins.splashscreen.create()
                }
            },
            lockscreen: {
                container: !1,
                background: !1,
                delay: 25,
                display: !1,
                lastactivity: e,
                animation: "fadeOut",
                bindEvents: function() {
                    $(".ui-page").on("click", ".nativeDroidLockscreen .unlock", function() {
                        nativeDroid.plugins.lockscreen.close()
                    }).on("touchstart touchend touchmove mousemove click tap", function() {
                        nativeDroid.plugins.lockscreen.lastactivity = (new Date).getTime()
                    }), nativeDroid.plugins.lockscreen.startCheckInactivity()
                },
                startCheckInactivity: function() {
                    delay = 1e3 * nativeDroid.plugins.lockscreen.delay, setTimeout(function() {
                        setTimeout(function() {
                            nativeDroid.plugins.lockscreen.checkInactivity()
                        }, delay)
                    })
                },
                checkInactivity: function() {
                    display = nativeDroid.plugins.lockscreen.display, activity = nativeDroid.plugins.lockscreen.lastactivity, delay = 1e3 * nativeDroid.plugins.lockscreen.delay, now = (new Date).getTime(), !display && now - activity > delay ? nativeDroid.plugins.lockscreen.open() : (nextCheck = delay - (now - activity), setTimeout(function() {
                        nativeDroid.plugins.lockscreen.checkInactivity()
                    }, nextCheck))
                },
                open: function() {
                    nativeDroid.plugins.lockscreen.container.fadeIn(500), nativeDroid.plugins.lockscreen.display = !0
                },
                close: function() {
                    nativeDroid.plugins.lockscreen.container.fadeOut(500), nativeDroid.plugins.lockscreen.display = !1, nativeDroid.plugins.lockscreen.startCheckInactivity()
                },
                create: function() {
                    nativeDroid.plugins.lockscreen.bindEvents();
                    var e = nativeDroid.plugins.lockscreen.container,
                        t = nativeDroid.plugins.lockscreen.background;
                    nativeDroid.plugins.lockscreen.animation, t && e.addClass("nativeDroidLockscreen").css({
                        "background-image": "url('" + t + "')"
                    })
                },
                ini: function(e) {
                    nativeDroid.plugins.lockscreen.container = e, nativeDroid.plugins.lockscreen.delay = parseInt(e.data("nativedroid-lockscreen-delay")), nativeDroid.plugins.lockscreen.background = e.data("nativedroid-background"), nativeDroid.plugins.lockscreen.animation = e.data("nativedroid-lockscreen-animation"), nativeDroid.plugins.lockscreen.create()
                }
            },
            homescreen: {
                container: !1,
                background: !1,
                currentslide: 1,
                dragStartX: 0,
                dragStated: !1,
                slides: !1,
                bindEvents: function() {
                    $(".ui-page").on("swipeleft swiperight", "div[data-nativedroid-role='screenslide']", function(e) {
                        direction = e.type, e.preventDefault(), slides = nativeDroid.plugins.homescreen.slides, thisIdx = parseInt($(this).data("nativedroid-screenslide-idx")), nextIdx = thisIdx + 1, prevIdx = thisIdx - 1, nextIdx = nextIdx > slides ? 1 : nextIdx, prevIdx = 1 > prevIdx ? slides : prevIdx, slides > 1 && ("swiperight" == direction ? nativeDroid.plugins.homescreen.slide(thisIdx, prevIdx, direction) : nativeDroid.plugins.homescreen.slide(thisIdx, nextIdx, direction))
                    }).on("mousedown touchstart", ".nativeDroidHomescreen", function(e) {
                        nativeDroid.plugins.homescreen.dragStartX = "touchstart" == e.type ? e.originalEvent.touches[0].screenX : e.screenX, nativeDroid.plugins.homescreen.dragStarted = !0, homeScreenSlideObj = $(".nativeDroidHomescreen div[data-nativedroid-screenslide-idx='" + nativeDroid.plugins.homescreen.currentslide + "']"), homeScreenSlideObj.addClass("noTransition")
                    }).on("mouseup touchend", ".nativeDroidHomescreen", function() {
                        homeScreenSlideObj = $(".nativeDroidHomescreen div[data-nativedroid-screenslide-idx='" + nativeDroid.plugins.homescreen.currentslide + "']"), homeScreenSlideObj.removeAttr("style").removeClass("noTransition"), nativeDroid.plugins.homescreen.dragStarted = !1
                    }).on("mousemove touchmove", ".nativeDroidHomescreen", function(e) {
                        mousedown = nativeDroid.plugins.homescreen.dragStarted, e.preventDefault(), mousedown && (distance = "touchmove" == e.type ? parseInt(e.originalEvent.touches[0].screenX) - parseInt(nativeDroid.plugins.homescreen.dragStartX) : e.screenX - nativeDroid.plugins.homescreen.dragStartX, (distance > 30 || -30 > distance) && (homeScreenSlideObj = $(".nativeDroidHomescreen div[data-nativedroid-screenslide-idx='" + nativeDroid.plugins.homescreen.currentslide + "']"), homeScreenSlideObj.css("left", distance + "px")))
                    }), $("body,.ui-page,.ui-body,.ui-content").css({
                        overflow: "hidden"
                    })
                },
                slide: function(e, t, n) {
                    newClassFrom = "swipeleft" == n ? "left" : "right", $(".nativeDroidHomescreen div[data-nativedroid-screenslide-idx='" + e + "']").removeClass("left").removeClass("right").addClass(newClassFrom);
                    var i = "swipeleft" == n ? "rightNoTransition" : "leftNoTransition",
                        o = $(".nativeDroidHomescreen div[data-nativedroid-screenslide-idx='" + t + "']");
                    o.addClass(i).removeClass("left").removeClass("right"), setTimeout(function() {
                        o.removeClass(i), nativeDroid.plugins.homescreen.currentslide = t, nativeDroid.plugins.homescreen.updateSlideIndicators()
                    }, 50)
                },
                create: function() {
                    obj = nativeDroid.plugins.homescreen.container, obj.addClass("nativeDroidHomescreen"), bg = nativeDroid.plugins.homescreen.background, bg && obj.css({
                        "background-image": "url('" + bg + "')"
                    }), i = 1, obj.find("[data-nativedroid-role='screenslide']").each(function() {
                        $(this).attr("data-nativedroid-screenslide-idx", i), i > 1 && $(this).addClass("right"), i++
                    }), nativeDroid.plugins.homescreen.slides = i - 1, nativeDroid.plugins.homescreen.createSlideIndicators(), nativeDroid.plugins.homescreen.createWidgets(), nativeDroid.plugins.homescreen.bindEvents()
                },
                createSlideIndicators: function() {
                    if (total = nativeDroid.plugins.homescreen.slides, current = nativeDroid.plugins.homescreen.currentslide, total > 1) {
                        for (html = "<div class='nativeDroidScreenSlideIndicators'>", i = 1; total >= i; i++) currentClass = i == current ? " active" : "", html += "<div class='blobs" + currentClass + "' data-nativedroid-screenslide-indicator='" + i + "'></div>";
                        html += "</div>", nativeDroid.plugins.homescreen.container.append(html)
                    }
                },
                updateSlideIndicators: function() {
                    current = nativeDroid.plugins.homescreen.currentslide, $(".nativeDroidScreenSlideIndicators .blobs").removeClass("active"), $(".nativeDroidScreenSlideIndicators .blobs[data-nativedroid-screenslide-indicator='" + current + "']").addClass("active")
                },
                createWidgets: function() {
                    widgetsObj = nativeDroid.plugins.homescreen.container.find("[data-nativedroid-role='widget']"), widgetsObj.addClass("nativeDroidHomescreenWidget"), widgetsObj.each(function() {
                        type = $(this).data("nativedroid-widget-type"), type && nativeDroid.plugins.homescreen.widget[type] ? new nativeDroid.plugins.homescreen.widget[type].ini($(this)) : type && console.log(type + " - is not a valid nativeDroid homescreen widget.")
                    })
                },
                widget: {
                    clock: {
                        container: !1,
                        currentMin: 0,
                        language: {
                            set: "en",
                            type: "short",
                            en: {
                                dayShort: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
                                dayLong: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
                                monthShort: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                                monthLong: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                                order: function(e, t, n, i, o) {
                                    return t + ", " + o + " " + n
                                }
                            },
                            de: {
                                dayShort: ["So", "Mo", "Di", "Mi", "Do", "Fr", "Sa"],
                                dayLong: ["Sonntag", "Montag", "Dienstag", "Mittwoch", "Donnerstag", "Freitag", "Samstag"],
                                monthShort: ["Jan", "Feb", "Mrz", "Apr", "Mai", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Dez"],
                                monthLong: ["Januar", "Februar", "M&auml;rz", "April", "Mai", "Juni", "Juli", "August", "September", "Oktober", "November", "Dezember"],
                                order: function(e, t, n, i, o, a) {
                                    return t + ", " + n + ". " + o + " " + a
                                }
                            }
                        },
                        getTodayString: function(e, t, n, i) {
                            return cLang = nativeDroid.plugins.homescreen.widget.clock.language, type = cLang.type, lang = cLang.set, retStr = "--empty-string--", "long" == type ? (dayStr = cLang[lang].dayLong[e], monthStr = cLang[lang].monthLong[n]) : "short" == type && (dayStr = cLang[lang].dayShort[e], monthStr = cLang[lang].monthShort[n]), retStr = cLang[lang].order(e, dayStr, t, n, monthStr, i)
                        },
                        getClockHTML: function() {
                            return html = "<div class='ClockTime'>", d = new Date, hours = 10 > d.getHours() ? "0" + d.getHours() : d.getHours(), min = 10 > d.getMinutes() ? "0" + d.getMinutes() : d.getMinutes(), time = hours + ":" + min, nativeDroid.plugins.homescreen.widget.clock.currentMin = d.getMinutes(), html += "<div class='time'>" + time + "</div>", date = nativeDroid.plugins.homescreen.widget.clock.getTodayString(d.getDay(), d.getDate(), d.getMonth(), d.getFullYear()), html += "<div class='date'><i class='icon-calendar'></i> " + date + "</div>", html += "</div>"
                        },
                        create: function() {
                            cObj = nativeDroid.plugins.homescreen.widget.clock, cObj.container.addClass("nativeDroidWidgetClock"), cObj.container.html(cObj.getClockHTML()), cObj.run()
                        },
                        update: function() {
                            nativeDroid.plugins.homescreen.widget.clock.container.html(nativeDroid.plugins.homescreen.widget.clock.getClockHTML())
                        },
                        run: function() {
                            cMin = nativeDroid.plugins.homescreen.widget.clock.currentMin, now = new Date, cMin != now.getMinutes() && nativeDroid.plugins.homescreen.widget.clock.update(), nextRun = 1e3 * (61 - now.getSeconds()), setTimeout(function() {
                                nativeDroid.plugins.homescreen.widget.clock.run()
                            }, nextRun)
                        },
                        ini: function(e) {
                            nativeDroid.plugins.homescreen.widget.clock.container = e, e.data("nativedroid-widget-clock-format") && (nativeDroid.plugins.homescreen.widget.clock.language.type = e.data("nativedroid-widget-clock-format")), e.data("nativedroid-widget-clock-lang") && (nativeDroid.plugins.homescreen.widget.clock.language.set = e.data("nativedroid-widget-clock-lang")), nativeDroid.plugins.homescreen.widget.clock.create()
                        }
                    },
                    reader: {
                        container: !1,
                        type: "rss",
                        source: !1,
                        bindEvents: function() {},
                        create: function() {
                            rObj = nativeDroid.plugins.homescreen.widget.reader, rObj.container.addClass("nativeDroidWidgetReader"), "rss" == rObj.type && rObj.source && (queryUrl = "http://ajax.googleapis.com/ajax/services/feed/load?v=1.0&q=" + encodeURIComponent(rObj.source), nativeDroid.api.get("jsonp", queryUrl, !1, rObj.parseFeed))
                        },
                        parseFeed: function(e) {
                            if (feedTitle = !1, feedLink = !1, feedDescription = !1, feedAuthor = !1, e && "200" == e.responseStatus) {
                                for (e = e.responseData.feed, feedTitle = e.title, feedLink = e.link, feedDescription = e.description, feedAuthor = e.author, feedHTML = "", i = 0; e.entries.length > i; i++) entry = e.entries[i], feedHTML += "<li>", feedHTML += "<div class='feedActionBox'><a href='" + entry.link + "' target='_blank'><i class='icon-share-alt'></i></a></div>", feedHTML += "<strong>" + entry.title + "</strong>", feedHTML += "<p>" + nativeDroid.basic.dateFormat.format(entry.publishedDate) + " | " + entry.contentSnippet + "</p>", feedHTML += "</li>";
                                html = "<ul>", html += "<li class='widgetTitleBar'>", html += "<h3>" + feedTitle + "</h3>", html += "</li>", html += feedHTML, html += "</ul>", nativeDroid.plugins.homescreen.widget.reader.container.html(html)
                            }
                        },
                        ini: function(e) {
                            nativeDroid.plugins.homescreen.widget.reader.container = e, e.data("nativedroid-widget-reader-type") && (nativeDroid.plugins.homescreen.widget.reader.type = e.data("nativedroid-widget-reader-type")), e.data("nativedroid-widget-reader-source") && (nativeDroid.plugins.homescreen.widget.reader.source = e.data("nativedroid-widget-reader-source")), nativeDroid.plugins.homescreen.widget.reader.create()
                        }
                    },
                    icon: {
                        container: !1,
                        iconType: "text",
                        iconClass: "icon-question-sign",
                        iconTitle: "Your Icon",
                        iconLink: "#",
                        bindEvents: function() {
                            $("div[data-nativedroid-role='widget']").on("click", ".nativeDroidIconWidget", function() {
                                window.location.href = $(this).attr("data-nativedroid-icon-href")
                            })
                        },
                        create: function() {
                            html = "", "text" == nativeDroid.plugins.homescreen.widget.icon.iconType && (html = "<div class='nativeDroidIconWidget' data-nativedroid-icon-href='" + nativeDroid.plugins.homescreen.widget.icon.iconLink + "'><i class='" + nativeDroid.plugins.homescreen.widget.icon.iconClass + "'></i><span>" + nativeDroid.plugins.homescreen.widget.icon.iconTitle + "</span></div>"), "" != html && nativeDroid.plugins.homescreen.widget.icon.container.html(html), nativeDroid.plugins.homescreen.widget.icon.bindEvents()
                        },
                        ini: function(e) {
                            nativeDroid.plugins.homescreen.widget.icon.container = e, nativeDroid.plugins.homescreen.widget.icon.iconType = e.data("nativedroid-widget-icon-type"), nativeDroid.plugins.homescreen.widget.icon.iconClass = e.data("nativedroid-widget-icon-class"), nativeDroid.plugins.homescreen.widget.icon.iconTitle = e.data("nativedroid-widget-icon-title"), nativeDroid.plugins.homescreen.widget.icon.iconLink = e.data("nativedroid-widget-icon-link"), nativeDroid.plugins.homescreen.widget.icon.create()
                        }
                    }
                },
                ini: function(e) {
                    nativeDroid.plugins.homescreen.container = e, bg = e.data("nativedroid-background"), nativeDroid.plugins.homescreen.background = bg ? bg : !1, nativeDroid.plugins.homescreen.create()
                }
            }
        },
        api: {
            get: function(e, t, n, i) {
                $.ajax({
                    dataType: e,
                    url: t,
                    data: n !== !1 ? n : "",
                    success: i,
                    error: function(e) {
                        console.log("There is an error while your ajaxRequest: "), console.log("Query: " + t), console.log(e.responseText)
                    }
                })
            },
            helper: {
                googlemaps: {
                    apiScript: "https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false",
                    apiScriptLoaded: !1,
                    ini: function(e) {
                        "undefined" == typeof google ? $.getScript(nativeDroid.api.helper.googlemaps.apiScript).done(function() {
                            e(!0)
                        }) : e(!0)
                    },
                    directions: {
                        from: !1,
                        to: !1,
                        container: !1,
                        type: "string",
                        prepareRoute: function(e) {
                            nativeDroid.api.helper.googlemaps.directions.type = e.type ? e.type : nativeDroid.api.helper.googlemaps.directions.type, "coords" == nativeDroid.api.helper.googlemaps.directions.type ? (from = e.from.split(","), fromLat = parseFloat(from[0]), fromLng = parseFloat(from[1]), nativeDroid.api.helper.googlemaps.directions.from = new google.maps.LatLng(fromLat, fromLng), to = e.to.split(","), toLat = parseFloat(to[0]), toLng = parseFloat(to[1]), nativeDroid.api.helper.googlemaps.directions.to = new google.maps.LatLng(toLat, toLng)) : (nativeDroid.api.helper.googlemaps.directions.from = e.from, nativeDroid.api.helper.googlemaps.directions.to = e.to, nativeDroid.api.helper.googlemaps.directions.container = e.container)
                        },
                        getRoute: function(e) {
                            e && e.from && e.to && e.container && (nativeDroid.api.helper.googlemaps.directions.prepareRoute(e), $(window).on("load", function() {
                                function t() {
                                    var t = {
                                        zoom: 7,
                                        disableDefaultUI: !0,
                                        draggable: !1,
                                        keyboardShortcuts: !1,
                                        scrollwheel: !1,
                                        mapTypeId: google.maps.MapTypeId.ROADMAP
                                    };
                                    i = new google.maps.Map(e.container, t), a.setMap(i), n()
                                }

                                function n() {
                                    var e = {
                                        origin: nativeDroid.api.helper.googlemaps.directions.from,
                                        destination: nativeDroid.api.helper.googlemaps.directions.to,
                                        travelMode: google.maps.TravelMode.DRIVING
                                    };
                                    r.route(e, function(e, t) {
                                        t == google.maps.DirectionsStatus.OK && a.setDirections(e)
                                    })
                                }
                                var i, o = {
                                        draggable: !1
                                    },
                                    a = new google.maps.DirectionsRenderer(o),
                                    r = new google.maps.DirectionsService;
                                t()
                            }))
                        }
                    }
                }
            }
        }
    }, $("[data-nativedroid-plugin]").each(function() {
        nativeDroid.plugins[$(this).attr("data-nativedroid-plugin")] ? new(nativeDroid.plugins[$(this).attr("data-nativedroid-plugin")].ini)($(this)) : console.log($(this).attr("data-nativedroid-plugin") + " - is not a valid nativeDroid plugin.")
    }), "touchstart" == nativeDroid.basic.touchEvent() && nativeDroid.basic.disableScrollTop()
});