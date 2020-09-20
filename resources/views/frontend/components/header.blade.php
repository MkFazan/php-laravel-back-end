<header id="header" class="wrapper header">
    <div class="content">
        <div class="col-lg-12 col-md-12 hidden-sm hidden-xs header-desktop">
            <div class="row">
                <div class="col-md-12" style="padding-left: 0;">
                    <ul class="nav-new">
                        @foreach($pages as $page)
                            @if($page->is_header)
                                <li><a href="{{route('get.page.for.slug', $page->slug)}}">{{$currentLocale == 'uk' ? $page->title_ua : $page->title_ru}}</a></li>
                            @endif
                        @endforeach
                    </ul>
                    <div class="lang-top">
                        @foreach(Mcamara\LaravelLocalization\Facades\LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <a class="{{$currentLocale == $localeCode ? "active" : ""}}" hreflang="{{ $localeCode }}" href="{{ Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">{{mb_strtoupper($localeCode)}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="wrap hidden-sm hidden-xs header-desktop">
                <div class="col-md-3" style="padding-right: 0;">
                    <a href="{{route('home')}}"> <img src="{{asset('img/logo_green_big2.webp')}}" class="top-logo" alt="Agro-Market" title="Agro-Market" /> </a> <span class="r">®</span>
                </div>
                <div class="col-md-6 search">
                    <div class="searching_wrap">
                        <div class="input-block" id="">
                            <form id="search-title" onsubmit="if (!window.__cfRLUnblockHandlers) return false; event.preventDefault();search();">
                                <input id="" type="text" name="q" placeholder="Найдите лучшее для сада" autocomplete="off" /> <span class="search-submit"></span>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="col-md-7">
                        <div class="menu-auth">
                            <div class="padding-center">
                                <a href="{{auth()->user() ? (auth()->user()->isAdmin() ? route('dashboard') : route('account')) : route('login') }}" class="fancy_content">
                                    <div class="wrap-icon"><span class="personal-icon"></span></div>
                                    <span>Ваш аккаунт</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 small-basket" id="">
                        <div class="padding-center">
                            <a href="cart.html" class="small-backet empty">
                                <span class="wrap-icon"><span class="basket-icon"></span></span><span class="backet-price">Корзина</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="nav-outer header-desktop">
            <div class="navigate-block">
                <nav class="main-menu">
                    <div class="rg_searching_toggle search-block"></div>
                    <div class="main-menu-trigger">
                        <a href="/catalog/"><span>Каталог товаров</span></a>
                    </div>
                    <ul>
                        @foreach($categories as $category)
                            <li class="jmenu_main osn" data-id="{{$category->id}}"><a href="{{route('categories', $category->id)}}"  class="root-item">{{$currentLocale == 'uk' ? $category->title_ua : $category->title_ru}}</a></li>
                        @endforeach
                    </ul>
                    <div class="innermenu" id="jmenu_ajax" style="display: none;">
                        @foreach($categories as $category)
                            <div class="left-menu" data-sec="{{$category->id}}" style="display: none;">
                                <ul>
                                    @foreach($category->children as $cat)
                                        <li>
                                            <a class="s-link" href="{{route('catalog', $cat->id)}}">
                                                <div class="s-card">
                                                    <div class="s-picture">
                                                        <img class="lazy-m" data-original="{{asset('img/437e12c7de42d39cc6a7b90261209092.webp')}}" alt="" >
                                                    </div>
                                                    <div class="s-name">
                                                        {{$currentLocale == 'uk' ? $cat->title_ua : $cat->title_ru}}
                                                    </div>
                                                    <div class="s-button">
                                                        <span>Перейти</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                    </div>
                </nav>
            </div>

        </div>
        <div id="bxdynamic_basketBanner_start" style="display: none;"></div>
        <div class="top-basket"></div>
        <div id="bxdynamic_basketBanner_end" style="display: none;"></div>
    </div>
    <div class="header-mobile">
        <div class="content">
            <div class="row">
                <div class="col-md-12 fixed-row">
                    <div class="logo-fixed"><a href="index.html" class="logo-mobile"></a></div>
                    <div class="catalog-fixed">
                        <div class="cat-menu"><i class="hamburger"></i><span>каталог</span></div>
                    </div>
                    <div class="search-fixed">
                        <div class="searching_wrap">
                            <div class="input-block" id="">
                                <form id="search-title2" onsubmit="if (!window.__cfRLUnblockHandlers) return false; event.preventDefault();search();">
                                    <input type="text" name="q2" placeholder="Найдите лучшее для сада" autocomplete="off" /> <span class="search-submit"></span>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="cart-fixed">
                        <a href="cart.html" class="cart-m"><span class="count-cart cart-count">0</span><i class="fas fa-shopping-cart"></i>Корзина</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="overlay-mobile"></div>

        <div class="mobile-menu" style="left: -100%;">
            <ul class="m-menu">
                <div class="close">x</div>
                <li class="last_four"><a href="" class="root-item">АКЦИИ</a></li>
                <li class="jmenu_main m-border-bottom" data-id="2703"><a href="" class="root-item">Новинки 2020</a></li>
                <li class="jmenu_main osn" data-id="2717"><a href="" class="root-item">ТОП 2020</a></li>
                <li class="jmenu_main osn" data-id="462"><a href="" class="root-item">Семена</a></li>
                <li class="jmenu_main osn" data-id="405"><a href="" class="root-item">Луковицы</a></li>
                <li class="jmenu_main osn" data-id="829"><a href="" class="root-item">Плодовые</a></li>
                <li class="jmenu_main osn" data-id="1331"><a href="" class="root-item">Колоновидные</a></li>
                <li class="jmenu_main osn" data-id="867"><a href="" class="root-item">Ягодные</a></li>
                <li class="jmenu_main osn" data-id="858"><a href="" class="root-item">Экзотика</a></li>
                <li class="jmenu_main osn" data-id="2644"><a href="" class="root-item">Цветущие</a></li>
                <li class="jmenu_main osn" data-id="1308"><a href="" class="root-item">Декоративные</a></li>
                <li class="jmenu_main osn" data-id="844"><a href="" class="root-item">Розы</a></li>
                <li class="jmenu_main osn" data-id="2241"><a href="" class="root-item">Эксклюзивы</a></li>
                <li class="jmenu_main osn" data-id="153"><a href="" class="root-item">Удобрения</a></li>
                <li class="jmenu_main osn m-border-bottom" data-id="2062"><a href="" class="root-item">Разное</a></li>
                <li class="pop">Популярные разделы:</li>
                <li class="pop-razd"><a href="" class="root-item">Абрикос</a></li>
                <li class="pop-razd"><a href="" class="root-item">Виноград</a></li>
                <li class="pop-razd"><a href="" class="root-item">Голубика</a></li>
                <li class="pop-razd"><a href="" class="root-item">Гортензия</a></li>
                <li class="pop-razd"><a href="" class="root-item">Клематис</a></li>
                <li class="pop-razd"><a href="" class="root-item">Клубника</a></li>
                <li class="pop-razd"><a href="" class="root-item">Лаванда</a></li>
                <li class="pop-razd"><a href="" class="root-item">Малиновое дерево</a></li>
                <li class="pop-razd"><a href="" class="root-item">Орех</a></li>
                <li class="pop-razd"><a href="" class="root-item">Персик</a></li>
                <li class="pop-razd"><a href="" class="root-item">Садовые цветы</a></li>
                <li class="pop-razd"><a href="" class="root-item">Тюльпаны</a></li>
                <li class="pop-razd"><a href="" class="root-item">Хурма</a></li>
                <li class="m-border-bottom pop-razd"><a href="" class="root-item">Яблоня</a></li>
                <li class="fancy_content fancybox.ajax" onclick="ModalWindow.open('account')">
                    <a href=""><img src="{{asset('img/new-user.webp')}}" alt="" />Ваш аккаунт</a>
                </li>
                <li class="fancy_content fancybox.ajax" onclick="if (!window.__cfRLUnblockHandlers) return false; event.preventDefault();showInfo()">
                    <a href="">Отследить заказ и бонусы</a>
                </li>
                <li class="m-border-bottom"><a href="">Акции магазина</a></li>
                <li class="lang-top"><a href="index.html" class="active">RU</a> <a href="" class="">UA</a></li>
                <li><a href="news.html">Блог садовника</a></li>
                <li><a href="contacts.html">Контакты</a></li>
                <li><a href="payments-and-deliveries.html">Оплата и доставка</a></li>
                <li><a href="replace.html">Гарантия качества</a></li>
                <li><a href="about.html">Узнать о нас</a></li>
                <li><a href="comments.html">Отзывы о магазине</a></li>
                <li><a href="program-loyalnost.html">Программа лояльности "LUX"</a></li>
                <li><a href="packing.html">Упаковка товаров</a></li>
                <li><a href="instruktsiya_po_ispolzovaniyu_bonusov_i_promo_kodov.html">Инструкция к скидкам</a></li>
                <li><a href="how-to-order.html">Как оформить заказ</a></li>
                <li><a href="secret-sales.html">Подписка на скидки</a></li>
                <li><a href="poluchayte-bonusnye-grivny-za-videootzyv-o-zakaze.html">200 бонусов за видеоотзыв</a></li>
                <li><a href="faq.html">Вопрос - ответ</a></li>
                <li><a href="postavchikam.html">Инфо поставщикам</a></li>
                <li><a href="semena.html">Оптовый прайс</a></li>
                <li><a href="politika.html">Политика конфиденциальности</a></li>
                <li><a href="oferta.html">Публичная оферта</a></li>
                <li><a href="brands.html">Бренды</a></li>
            </ul>
        </div>
        <div class="section-menu" style="left: -100%;"><div class="close">x</div></div>
    </div>
</header>
