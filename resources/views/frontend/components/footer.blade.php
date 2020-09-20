<footer id="footer" class="wrapper footer col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="top-block row">
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 sm-text-center xs-text-center">
            <a> <img src="{{asset('img/logo-bottom.webp')}}" alt="Agro-Market" title="Agro-Market" /> </a>
            <p></p>
            <span id="bug_block"> </span>
        </div>

        <div >

            <div class="phone-namber col-lg-4 col-md-4 col-sm-6 col-xs-12 text-sm-center text-xs-center">
                <p id="phone-namber_icon"></p>
                <p>Звоните с 09:00 до 18:00 (без выходных)</p>
                <p><a href="tel:0800751100" class="telcall" itemprop="telephone"> </a></p>

                <div id="bx_incl_area_11" title="Двойной щелчок - Редактировать файл включаемой области">
                    <a href="tel:0800751100" class="telcall" itemprop="telephone">
                        0 (44) 333-49-12, 0 (93) 170-15-55, <br />
                        0 (95) 260-94-04, 0 (67) 654-37-67<br />
                    </a>
                </div>

                <a href="tel:0800751100" class="telcall" itemprop="telephone"> </a>

            </div>

            <div class="adress col-lg-4 col-md-4 col-sm-6 col-xs-12 text-sm-center text-xs-center" itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress">
                <p id="adress_icon"></p>
                <p><strong>Магазин «Семена, Все для сада и огорода»</strong></p>
                <p>
                    <span itemprop="addressLocality">Украина, г. Одесса</span>, <span itemprop="streetAddress">ул.Привозная, 14</span><strong><a href="/contacts/#map">На карте</a></strong>
                </p>
            </div>
        </div>
        <div class="col-md-2 col-sm-12 col-xs-12" style="overflow: hidden;">
            <a href="comments.html">
                <div class="rate inFooter">
                    <div class="rating-view"><span style="width: 80%;"></span></div>
                    <div class="text"><span class="rate-sp">4</span> <span class="rev">5287 отзывов</span></div>
                </div>
            </a>
            <style>
                .rate {
                    background-color: #e2f1e1;
                    padding: 10px;
                    text-align: center;
                    border-radius: 5px;
                    font-family: ProximaNova;
                }
                .rate-sp {
                    font-size: 21px;
                    color: #ed8a19;
                }
                .rev {
                    font-size: 16px;
                    font-weight: 800;
                    color: #555555;
                }
                .rate .rating-view {
                    position: relative;
                }
                .rate .rating-view span:before,
                .rating-view:before {
                    font-size: 20px;
                }
            </style>
        </div>
    </div>

    <div class="bottom-block row">
        <div class="cont">

            <div class="col-md-10 col-sm-12 col-xs-12 text-sm-center text-xs-center">
                <div class="news">
                    @foreach($pages as $page)
                        @if($page->is_footer)
                            <span><a href="{{route('get.page.for.slug', $page->slug)}}">{{$currentLocale == 'uk' ? $page->title_ua : $page->title_ru}}</a></span>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="col-md-2 col-sm-12 col-xs-12">
                <div class="soc">
                    <a href="https://invite.viber.com/?g2=AQA%2BJJpxTAEsCUisFKIzN8MRvAhNdvgE3BM9PnMqWnhAfH6L3hVHiysCGUEJK9Au&amp;lang=ru" target="_blank" rel="nofollow"><img src="{{asset('img/viber.webp')}}" alt="" /></a>
                    <a href="https://www.facebook.com/agromarket.net" target="_blank" rel="nofollow"><img src="{{asset('img/facebook.webp')}}" alt="" /></a>
                    <a href="https://www.youtube.com/channel/UC8gUU0qR_LM0d_BSOsiLg5A?sub_confirmation=1" target="_blank" rel="nofollow"><img src="{{asset('img/youtube.webp')}}" alt="" /></a>
                    <a href="https://www.instagram.com/agro_market_ua/" target="_blank" rel="nofollow"><img src="{{asset('img/instagram.webp')}}" alt="" /></a>
                </div>
            </div>

        </div>
    </div>
</footer>
