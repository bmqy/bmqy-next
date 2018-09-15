<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>
    <footer id="footer" class="footer">
        <div class="footer-inner">
            <div class="copyright">© <?php echo !empty(get_option('bmqynext_options_since')) ? get_option('bmqynext_options_since') : '2014' ?> - <span itemprop="copyrightYear"><?php the_time("Y") ?></span> <span class="with-love"><i class="fa fa-heart"></i> </span><span class="author" itemprop="copyrightHolder"><?php bloginfo("name") ?></span>
            </div>

            <?php if(get_option("bmqynext_options_powered")==="1"):?>
            <div class="powered-by">
                <?php printf( __( 'Powered by %s', 'bmqynext' ), '<a href="'. esc_url( __( 'https://wordpress.org/', 'bmqynext' ) ) .'">WordPress</a>' ); ?>
            </div>

            <div class="theme-info">
                <?php _e("Themes") ?> -
                <a class="theme-link" href="https://github.com/bmqy/bmqy-next">
                    bmqy-next
                </a>
            </div>
            <?php endif; ?>
            <div style="display: none;">
                熊掌号：https://author.baidu.com/home/1545776927809018?from=bmqy
            </div>
        </div>
    </footer>
    <div class="back-to-top"><i class="fa fa-arrow-up"></i></div>
</div>
</div>
<?php wp_footer(); ?>

<?php
if(get_option('bmqynext_options_show_eevee')==='1') {
	get_template_part( "template-parts/eevee/eevee", "bmqynext-eevee" );
}
?>

<script type="text/javascript">"[object Function]" !== Object.prototype.toString.call(window.Promise) && (window.Promise = null)</script>
<script id="cy_cmt_num"
        src="https://changyan.sohu.com/upload/plugins/plugins.list.count.js?clientId=cysKX3oNx"></script>
<script type="text/javascript">function proceedsearch() {
        $("body").append('<div class="search-popup-overlay local-search-pop-overlay"></div>').css("overflow", "hidden"), $(".search-popup-overlay").click(onPopupClose), $(".popup").toggle();
        var t = $("#local-search-input");
        t.attr("autocapitalize", "none"), t.attr("autocorrect", "off"), t.focus()
    }

    var isfetched = !1, isXml = !0, search_path = "search.xml";
    0 === search_path.length ? search_path = "search.xml" : /json$/i.test(search_path) && (isXml = !1);
    var path = "/" + search_path, onPopupClose = function (t) {
        $(".popup").hide(), $("#local-search-input").val(""), $(".search-result-list").remove(), $("#no-result").remove(), $(".local-search-pop-overlay").remove(), $("body").css("overflow", "")
    }, searchFunc = function (t, e, o) {
        "use strict";
        $("body").append('<div class="search-popup-overlay local-search-pop-overlay"><div id="search-loading-icon"><i class="fa fa-spinner fa-pulse fa-5x fa-fw"></i></div></div>').css("overflow", "hidden"), $("#search-loading-icon").css("margin", "20% auto 0 auto").css("text-align", "center"), $.ajax({
            url: t,
            dataType: isXml ? "xml" : "json",
            async: !0,
            success: function (t) {
                isfetched = !0, $(".popup").detach().appendTo(".header-inner");
                var n = isXml ? $("entry", t).map(function () {
                    return {
                        title: $("title", this).text(),
                        content: $("content", this).text(),
                        url: $("url", this).text()
                    }
                }).get() : t, r = document.getElementById(e), s = document.getElementById(o), a = function () {
                    var t = r.value.trim().toLowerCase(), e = t.split(/[\s\-]+/);
                    e.length > 1 && e.push(t);
                    var o = [];
                    if (t.length > 0 && n.forEach(function (n) {
                        function r(e, o, n, r) {
                            for (var s = r[r.length - 1], a = s.position, i = s.word, l = [], h = 0; a + i.length <= n && 0 != r.length;) {
                                i === t && h++, l.push({position: a, length: i.length});
                                var p = a + i.length;
                                for (r.pop(); 0 != r.length && (s = r[r.length - 1], a = s.position, i = s.word, p > a);) r.pop()
                            }
                            return c += h, {hits: l, start: o, end: n, searchTextCount: h}
                        }

                        function s(t, e) {
                            var o = "", n = e.start;
                            return e.hits.forEach(function (e) {
                                o += t.substring(n, e.position);
                                var r = e.position + e.length;
                                o += '<b class="search-keyword">' + t.substring(e.position, r) + "</b>", n = r
                            }), o += t.substring(n, e.end)
                        }

                        var a = !1, i = 0, c = 0, l = n.title.trim(), h = l.toLowerCase(),
                            p = n.content.trim().replace(/<[^>]+>/g, ""), u = p.toLowerCase(),
                            f = decodeURIComponent(n.url), d = [], g = [];
                        if ("" != l && (e.forEach(function (t) {
                            function e(t, e, o) {
                                var n = t.length;
                                if (0 === n) return [];
                                var r = 0, s = [], a = [];
                                for (o || (e = e.toLowerCase(), t = t.toLowerCase()); (s = e.indexOf(t, r)) > -1;) a.push({
                                    position: s,
                                    word: t
                                }), r = s + n;
                                return a
                            }

                            d = d.concat(e(t, h, !1)), g = g.concat(e(t, u, !1))
                        }), (d.length > 0 || g.length > 0) && (a = !0, i = d.length + g.length)), a) {
                            [d, g].forEach(function (t) {
                                t.sort(function (t, e) {
                                    return e.position !== t.position ? e.position - t.position : t.word.length - e.word.length
                                })
                            });
                            var v = [];
                            0 != d.length && v.push(r(l, 0, l.length, d));
                            for (var $ = []; 0 != g.length;) {
                                var C = g[g.length - 1], m = C.position, x = C.word, w = m - 20, y = m + 80;
                                0 > w && (w = 0), y < m + x.length && (y = m + x.length), y > p.length && (y = p.length), $.push(r(p, w, y, g))
                            }
                            $.sort(function (t, e) {
                                return t.searchTextCount !== e.searchTextCount ? e.searchTextCount - t.searchTextCount : t.hits.length !== e.hits.length ? e.hits.length - t.hits.length : t.start - e.start
                            });
                            var T = parseInt("1");
                            T >= 0 && ($ = $.slice(0, T));
                            var b = "";
                            b += 0 != v.length ? "<li><a href='" + f + "' class='search-result-title'>" + s(l, v[0]) + "</a>" : "<li><a href='" + f + "' class='search-result-title'>" + l + "</a>", $.forEach(function (t) {
                                b += "<a href='" + f + '\'><p class="search-result">' + s(p, t) + "...</p></a>"
                            }), b += "</li>", o.push({item: b, searchTextCount: c, hitCount: i, id: o.length})
                        }
                    }), 1 === e.length && "" === e[0]) s.innerHTML = '<div id="no-result"><i class="fa fa-search fa-5x" /></div>'; else if (0 === o.length) s.innerHTML = '<div id="no-result"><i class="fa fa-frown-o fa-5x" /></div>'; else {
                        o.sort(function (t, e) {
                            return t.searchTextCount !== e.searchTextCount ? e.searchTextCount - t.searchTextCount : t.hitCount !== e.hitCount ? e.hitCount - t.hitCount : e.id - t.id
                        });
                        var a = '<ul class="search-result-list">';
                        o.forEach(function (t) {
                            a += t.item
                        }), a += "</ul>", s.innerHTML = a
                    }
                };
                r.addEventListener("input", a), $(".local-search-pop-overlay").remove(), $("body").css("overflow", ""), proceedsearch()
            }
        })
    };
    $(".popup-trigger").click(function (t) {
        t.stopPropagation(), isfetched === !1 ? searchFunc(path, "local-search-input", "local-search-result") : proceedsearch()
    }), $(".popup-btn-close").click(onPopupClose), $(".popup").click(function (t) {
        t.stopPropagation()
    }), $(document).on("keyup", function (t) {
        var e = 27 === t.which && $(".search-popup").is(":visible");
        e && onPopupClose()
    })</script>
<script src="https://cdn1.lncld.net/static/js/av-core-mini-0.6.1.js"></script>
<script>AV.initialize("GJMIqaJ14aV7dSKNMtYxx5BU-gzGzoHsz", "Dbwphj6QwwaNqdgCFIlXlYpH")</script>
<script>function showTime(e) {
        var t = new AV.Query(e), n = [], o = $(".leancloud_visitors");
        o.each(function () {
            n.push($(this).attr("id").trim())
        }), t.containedIn("url", n), t.find().done(function (e) {
            var t = ".leancloud-visitors-count";
            if (0 === e.length) return void o.find(t).text(0);
            for (var i = 0; i < e.length; i++) {
                var r = e[i], s = r.get("url"), l = r.get("time"), c = document.getElementById(s);
                $(c).find(t).text(l)
            }
            for (var i = 0; i < n.length; i++) {
                var s = n[i], c = document.getElementById(s), u = $(c).find(t);
                "" == u.text() && u.text(0)
            }
        }).fail(function (e, t) {
            console.log("Error: " + t.code + " " + t.message)
        })
    }

    function addCount(e) {
        var t = $(".leancloud_visitors"), n = t.attr("id").trim(), o = t.attr("data-flag-title").trim(),
            i = new AV.Query(e);
        i.equalTo("url", n), i.find({
            success: function (t) {
                if (t.length > 0) {
                    var i = t[0];
                    i.fetchWhenSave(!0), i.increment("time"), i.save(null, {
                        success: function (e) {
                            var t = $(document.getElementById(n));
                            t.find(".leancloud-visitors-count").text(e.get("time"))
                        }, error: function (e, t) {
                            console.log("Failed to save Visitor num, with error message: " + t.message)
                        }
                    })
                } else {
                    var r = new e, s = new AV.ACL;
                    s.setPublicReadAccess(!0), s.setPublicWriteAccess(!0), r.setACL(s), r.set("title", o), r.set("url", n), r.set("time", 1), r.save(null, {
                        success: function (e) {
                            var t = $(document.getElementById(n));
                            t.find(".leancloud-visitors-count").text(e.get("time"))
                        }, error: function (e, t) {
                            console.log("Failed to create")
                        }
                    })
                }
            }, error: function (e) {
                console.log("Error:" + e.code + " " + e.message)
            }
        })
    }

    $(function () {
        var e = AV.Object.extend("Counter");
        1 == $(".leancloud_visitors").length ? addCount(e) : $(".post-title-link").length > 1 && showTime(e)
    })
</script>
<!--<script>
    !function () {
        var t = document.createElement("script"), s = window.location.protocol.split(":")[0];
        "https" === s ? t.src = "https://zz.bdstatic.com/linksubmit/push.js" : t.src = "http://push.zhanzhang.baidu.com/push.js";
        var e = document.getElementsByTagName("script")[0];
        e.parentNode.insertBefore(t, e)
    }()
</script>-->
</body>
</html>