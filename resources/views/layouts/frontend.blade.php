<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" xml:lang="ru" class="no-js bx-core bx-no-touch bx-no-retina bx-firefox">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}" />
    <!--[if lte IE 9]> <meta http-equiv="X-UA-Compatible" content="IE=edge" /><![endif]-->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('css')
</head>
<body>
    @php
        //$pages = getPages();
        //$currentLocale = getCurrentLocale();
    @endphp
    <div id="panel"></div>
    <div id="page-wrapper" class="page-wrapper container-fluid">

{{--        @include('frontend.components.header', [--}}
{{--            'currentLocale' => $currentLocale,--}}
{{--            'pages' => $pages,--}}
{{--            'categories' => getCategories()--}}
{{--        ])--}}

        @yield('content')

        <div id="totop"></div>

{{--        @include('frontend.components.footer', [--}}
{{--            'currentLocale' => $currentLocale,--}}
{{--            'pages' => $pages--}}
{{--        ])--}}

    </div>


    <script type="text/javascript" src="{{ asset('js/jquery_002.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery-1.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/template_8b8648eef60a7cbfefa4dec7984cc49d.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/page_bb620dbb9a798bd536bd15071dce4622.js') }}"></script>

    <script async="" type="text/javascript">
        $(document).ready(function () {
            setTimeout(function () {
                $body = $("body");
                $url = location.href;
            }, 3000);
        });

        if (localStorage.getItem("likes")) {
            localStorage.removeItem("likes");
        }

        $(".oferta input").change(function () {
            if (!this.checked) {
                $(".rlsub button").attr("disabled", true);
            } else {
                $(".rlsub button").attr("disabled", false);
            }
        });

        document.oncopy = function () {
            var bodyElement = document.body;
            var selection = getSelection();
            var href = document.location.href;
            var copyright = "<br><br>Источник: <a href='" + href + "'>" + href + "</a><br>© ";
            var text = selection + copyright;
            var divElement = document.createElement("div");
            divElement.style.position = "absolute";
            divElement.style.left = "-99999px";
            divElement.innerHTML = text;
            bodyElement.appendChild(divElement);
            selection.selectAllChildren(divElement);
            setTimeout(function () {
                bodyElement.removeChild(divElement);
            }, 0);
        };
    </script>

    <script src="{{ asset('js/jquery.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#totop").click(function () {
                $("body,html").animate({ scrollTop: 0 }, 800);
            });
            $(window).scroll(function () {
                var bo = $(this).scrollTop();
                if (bo > 1900) {
                    $("#totop").fadeIn(1555);
                } else {
                    $("#totop").fadeOut(1555);
                }
            });
        });

        $(document).ready(function () {
            var pattern = /^[a-z0-9._-]+@[a-z0-9-]+\.[a-z]{2,6}$/i;
            var mail = $("#jpop-email");
            var sub = $("#jpop-submit");
            var cb = $("#jpopf1 .jpop-close");
            var over = $("#jpopover1");
            var jpopm = $("#jpopm1");
            var jpopmc = $("#jpopm1-close");
            var jpopf = $("#jpopf1");
            var dnow = Date.now();
            var dstart = $.cookie("startsesdate");
            if (!dstart) {
                $.cookie("startsesdate", dnow, { expires: 1, path: "/" });
                dstart = dnow;
            }
            var hit = $.cookie("hitperses");
            if (!hit) hit = 0;
            hit++;
            $.cookie("hitperses", hit, { expires: 1, path: "/" });
            var sw = window.screen.width;
            var autojpop = $.cookie("autojpop");
            function AnimateRotate(angle) {
                var $elem = $("#jpopm1-close");
                $({ deg: 0 }).animate(
                    { deg: angle },
                    {
                        duration: 2000,
                        step: function (now) {
                            $elem.css({ transform: "rotate(" + now + "deg)" });
                        },
                    }
                );
            }
            if (!localStorage.getItem("jpopsend") && !sessionStorage.getItem("jpop1")) {
                bottom = 0;
                if (window.innerWidth < 641) bottom = 20;
                jpopm.animate({ bottom: bottom }, 400);
            }
            function jpopclose() {
                jpopm.show();
                jpopmc.show();
                jpopf.animate({ top: "-50%" }, 400);
                setTimeout(function () {
                    jpopf.hide();
                    over.hide();
                }, 600);
                ga("send", "event", "Даем денег", "Закрытие");
            }


            $(document.body).delegate("#jpopm1", "click", function (e) {
                var container = $("#jpopm1-close");
                if (!container.is(e.target) && container.has(e.target).length === 0) {
                    jpopopen();
                }
            });
            $(document.body).delegate("#jpopf1 .jpop-close, #jpop1thx button", "click", function () {
                jpopclose();
            });
            $(document.body).delegate("#jpopover1", "click", function () {
                jpopclose();
            });


        });
    </script>

    <script src="{{ asset('js/script00.js') }}"></script>
    @yield('js')

</body>
</html>
