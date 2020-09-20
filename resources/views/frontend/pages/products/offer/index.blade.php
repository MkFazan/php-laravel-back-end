@extends('layouts.frontend')
@php

    $dataId = $product->id + config('app.default_start_number_id_for_view');
@endphp
@section('css')
    <link href="{{ asset('css/kernel_main.css') }}" type="text/css" rel="stylesheet"/>
    <link href="{{ asset('css/page_0ccbb7aec535b09c8dd524d4a8ed77cf.css') }}" type="text/css" rel="stylesheet"/>
    <link href="{{ asset('css/page_9ea45e8240bbb3edfa29029d6dc0c105.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('css/template_f281b088860d7887671196e71a797cfb.css') }}" type="text/css" data-template-style="true" rel="stylesheet"/>
    <link href="{{ asset('css/popup.css') }}" type="text/css" data-template-style="true" rel="stylesheet"/>
    <link href="{{ asset('css/contact.css') }}" type="text/css" data-template-style="true" rel="stylesheet" />
    <link href="{{ asset('css/page_ddd61dea76007c482fdae522ce14ebd2.css') }}" type="text/css" data-template-style="true" rel="stylesheet" />
    <link href="{{ asset('css/page_ab2c4370c7b1ee4523302f35bacddbc5.css') }}" type="text/css" data-template-style="true" rel="stylesheet" />
    <link href="{{asset('css/actions.css')}}" type="text/css" data-template-style="true" rel="stylesheet" />
    <link href="{{asset('css/offer.css')}}" type="text/css" data-template-style="true" rel="stylesheet" />
@endsection



@section('content')
<style>

    .overinfo {
        background: rgba(0, 0, 0, 0.3);
        width: 100%;
        height: 100%;
        position: fixed;
        top: 0;
        right: 0;
        z-index: 99999999;
        font-size: 15px;
        display: none;
    }
    .overinfo.active {
        display: block !important;
    }
    #oinfo .binfo {
        margin: 15px auto;
    }
    #oinfo .binfo table{
        margin: 15px auto;
        width: 100%;
    }
    #oinfo .binfo td{
        padding: 5px 10px;
        border: 1px solid #d4caca;
    }
    #oinfo .binfo td:first-child{
        width: 60%;
        background: #efefef;
    }
    #oinfo .binfo td:last-child{
        width: 40%;
        font-weight: bold;
    }
    #oinfo {
        max-width: 612px;
        width: 100%;
        padding: 50px;
        position: absolute;
        font-family: 'proxima-nova', sans-serif;
        top: 50px;
        left: 50%;
        transform: translate(-50%);
        background: rgb(255, 255, 255);
        z-index: 999999999;
        display: none;
    }
    #oinfo.active {
        display: block !important;
    }

    #oinfo .oititle {
        font-size: 22px;
        font-weight: bold;
    }

    #oinfo #oitab {
        display: none;
    }

    #oinfo #oitab table {
        margin-top: 20px;
    }

    #oinfo input {
        width: 100%;
        padding: 20px;
        border: 1px solid #dcdcdc;
        border-radius: 2px;
        margin-top: 20px;
    }

    #oinfo a {
        color: #53a94b;
        text-decoration: underline;
    }

    #oinfo ul {
        list-style-type: none;
    }

    #oinfo button {
        width: 100%;
        padding: 20px;
        text-transform: uppercase;
        color: white;
        font-size: 20px;
        background: #ffca2a;
        border: none;
        border-radius: 2px;
        transition: 1s all ease;
    }

    #oinfo button:disabled {
        background: #909090;
    }

    #oinfo .green {
        color: #53a94b;
    }

    #oinfo .black {
        color: #000;
        font-weight: bold;
        margin-bottom: 20px;
    }

    #oinfo .grey {
        color: #909090;
    }

    #oinfo .oiin .oititle {
        margin-top: 30px;
        margin-bottom: 20px;
    }

    #oinfo ul li {
        margin-bottom: 20px;
    }

    #oinfo .oiin {
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 1px solid #dcdcdc;
    }

    #oinfo .oifoo {
        display: flex;
    }

    #oinfo .oifoo div {
        float: left;
        width: 50%;
        box-sizing: border-box;
    }

    #oinfo .oifoo div:last-child {
        border-left: 1px solid #dcdcdc;
        padding-left: 20px;
        min-height: 100%;
    }

    #oinfo .oifoo ul li {
        margin-bottom: 10px !important;
    }

    .error {
        color: red;
        padding: 5px;
        height: 30px;
    }

    #oitab table {
        width: 100%;
    }

    #oitab thead tr {
        border-top: 1px solid #909090;
        border-bottom: 1px solid #909090;
        color: #909090;
    }

    #oitab td {
        padding: 10px;
    }

    #oitab tr {
        border-bottom: 1px solid #909090;
    }
    #oinfo .close {
        position: absolute;
        right: 32px;
        top: 32px;
        width: 32px;
        height: 32px;
        opacity: 0.3;
    }
    #oinfo .close:hover {
        opacity: 1;
    }
    #oinfo .close:before, #oinfo .close:after {
        position: absolute;
        left: 15px;
        content: ' ';
        height: 33px;
        width: 2px;
        background-color: #333;
        display: block;
    }
    #oinfo .close:before {
        transform: rotate(45deg);
    }
    #oinfo .close:after {
        transform: rotate(-45deg);
    }



    @media (max-width: 824px) {
        #oinfo {
            right: 0;
            margin-right: 0;
        }
    }

    @media screen and (max-width: 600px) {
        #oitab table td {
            width: 100%;
            float: left;
            text-align: right;
            border-bottom: 1px dotted #909090;
        }
        #oitab table thead{
            display: none;
        }
        #oitab table td:before {
            content: attr(data-label);
            float: left;
            text-transform: uppercase;
            font-weight: bold;
        }
    }
</style>
    <div id="page-body" class="page-body" style="margin-top: 30px;">
        <div class="content col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="catalog-item-page row">
                @include('frontend.pages.products.offer.components.nav')
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                    <h1 class="title_product" itemprop="name">{{$currentLocale == 'uk' ? $product->title_ua : $product->title_ru}}</h1>
                    <div class="product-cols top-block col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="row row_over">
                            <div class="l-col col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="row row_over">
                                    @include('frontend.pages.products.offer.components.slider')
                                    <div class="modalBg" style="display: none;"></div>
                                    <div class="product-content col-lg-8 col-md-8 col-sm-7 col-xs-6">
                                        <div class="row row_over">
                                            <div class="rg_central_buy_block col-lg-7 col-md-7 col-sm-12 col-xs-12">
													<span class="cont_info_id row row_over">
														<span class="art_id col-lg-4 col-md-4 col-sm-4 col-xs-4" style="border-right:none;">Артикул : {{$dataId}}</span>
                                                    </span>
                                                @include('frontend.pages.products.offer.components.price')
                                                @include('frontend.pages.products.offer.components.product_info')
                                                @include('frontend.pages.products.offer.components.property')

                                            </div>
                                            @include('frontend.pages.products.offer.components.harantia')

                                        </div>
                                    </div>
                                    <div class="product-review"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row row_over">
                @include('frontend.components.reviews')
                @include('frontend.components.subscribers')
            </div>
        </div>

        <div style="clear: both;"></div>

        <div class="row ">
            <div style="clear: both;"></div>
            <style>
                .el-h2 {
                    margin: 0;
                    font-size: 32px;
                    text-align: center;
                    color: #333;
                    padding-bottom: 25px;
                    font-weight: 700;
                }

                .el-h2:after,
                .el-h2:before {
                    content: "";
                    background: #e5e5e5;
                    height: 1px;
                    width: 55px;
                    vertical-align: middle;
                    display: inline-block;
                }

                .el-h2:before {
                    margin-right: 20px;
                }

                .el-h2:after {
                    margin-left: 20px;
                }

                .section-order {
                    background: url(/bitrix/templates/agro_adaptive/img/bottom-shadow.png) bottom no-repeat;
                    padding-bottom: 33px;
                    float: left;
                    width: 100%;
                    margin: 0;
                    padding-top: 30px;
                }

                .section-order .order-box {
                    padding-top: 55px;
                    position: relative;
                    vertical-align: top;
                    color: #666;
                    display: inline-block;
                    text-align: center;
                    max-width: 313px;
                }

                .section-order .order-box img {
                    position: absolute;
                    left: 50%;
                    top: 0;
                    transform: translateX(-50%);
                }

                .section-order .row a img {
                    max-width: 80px;
                }

                .section-order .row a {
                    text-align: center;
                }

                @media (max-width: 600px) {
                    .section-order .row a {
                        width: 50%;
                        text-align: center;
                        margin-bottom: 20px;
                    }
                }

                @media (max-width: 414px) {
                    .section-order {
                        margin-bottom: 15px;
                    }
                    .section-order .row a {
                        width: 100%;
                    }
                }
            </style>
            <style>
                .custom_img {
                    display: block;
                    max-width: 100px !important;
                    width: auto;
                    margin: auto;
                    position: static !important;
                    margin: 15px auto 0 auto !important;
                    float: none !important;
                    transform: translate(0) !important;
                }
            </style>



        </div>

    </div>






<script type="text/javascript" src="{{asset('js/slick.min.js')}}"></script>

<script type="text/javascript">
    if(localStorage.getItem("likes")) {
        localStorage.removeItem("likes");
    }
</script>
<script type="text/javascript">
    $(".oferta input").change(function() {
        if(!this.checked) {
            $(".rlsub button").attr("disabled", true);
        } else {
            $(".rlsub button").attr("disabled", false);
        }
    });
</script>
<script type="text/javascript">
    document.oncopy = function() {
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
        setTimeout(function() {
            bodyElement.removeChild(divElement);
        }, 0);
    };
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#totop").click(function() {
            $("body,html").animate({
                scrollTop: 0
            }, 800);
        });
        $(window).scroll(function() {
            var bo = $(this).scrollTop();
            if(bo > 1900) {
                $("#totop").fadeIn(1555);
            } else {
                $("#totop").fadeOut(1555);
            }
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
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
        if(!dstart) {
            $.cookie("startsesdate", dnow, {
                expires: 1,
                path: "/"
            });
            dstart = dnow;
        }
        var hit = $.cookie("hitperses");
        if(!hit) hit = 0;
        hit++;
        $.cookie("hitperses", hit, {
            expires: 1,
            path: "/"
        });
        var sw = window.screen.width;
        var autojpop = $.cookie("autojpop");

        function AnimateRotate(angle) {
            var $elem = $("#jpopm1-close");
            $({
                deg: 0
            }).animate({
                deg: angle
            }, {
                duration: 2000,
                step: function(now) {
                    $elem.css({
                        transform: "rotate(" + now + "deg)"
                    });
                },
            });
        }
        if(!localStorage.getItem("jpopsend") && !sessionStorage.getItem("jpop1")) {
            bottom = 0;
            if(window.innerWidth < 641) bottom = 20;
            jpopm.animate({
                bottom: bottom
            }, 400);
        }

        function jpopclose() {
            jpopm.show();
            jpopmc.show();
            jpopf.animate({
                top: "-50%"
            }, 400);
            setTimeout(function() {
                jpopf.hide();
                over.hide();
            }, 600);
            ga("send", "event", "Даем денег", "Закрытие");
        }
        $(document.body).delegate("#jpopm1", "click", function(e) {
            var container = $("#jpopm1-close");
            if(!container.is(e.target) && container.has(e.target).length === 0) {
                jpopopen();
            }
        });
        $(document.body).delegate("#jpopf1 .jpop-close, #jpop1thx button", "click", function() {
            jpopclose();
        });
        $(document.body).delegate("#jpopover1", "click", function() {
            jpopclose();
        });
    });
</script>

@endsection
