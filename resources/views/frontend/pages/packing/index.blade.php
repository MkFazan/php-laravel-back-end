@extends('layouts.frontend')

@section('css')
    <link href="{{ asset('css/kernel_main.css') }}" type="text/css" rel="stylesheet"/>
    <link href="{{ asset('css/page_0ccbb7aec535b09c8dd524d4a8ed77cf.css') }}" type="text/css" rel="stylesheet"/>
    <link href="{{ asset('css/page_9ea45e8240bbb3edfa29029d6dc0c105.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('css/template_f281b088860d7887671196e71a797cfb.css') }}" type="text/css" data-template-style="true" rel="stylesheet"/>
    <link href="{{ asset('css/popup.css') }}" type="text/css" data-template-style="true" rel="stylesheet"/>
    <link href="{{ asset('css/contact.css') }}" type="text/css" data-template-style="true" rel="stylesheet" />
    <link href="{{ asset('css/page_ddd61dea76007c482fdae522ce14ebd2.css') }}" type="text/css" data-template-style="true" rel="stylesheet" />

@endsection

@section('content')

    <div id="page-body" class="page-body row">
        <div class="content col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="help-cols">
                @include('frontend.components.side-bar')

                <div class="r-col">
                    <nav class="breadcrumbs col-lg-12 col-md-12 col-sm-12 col-xs-12 col_over">
                        <ul itemscope="" itemtype="http://schema.org/BreadcrumbList" class="row">
                            <a href="/">Назад</a>
                            <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                                <a itemprop="item" href="/">
                                    <span itemprop="name" content="Agro-Market"><i class="fas fa-home"></i></span>
                                </a>
                                <meta itemprop="position" content="1" />
                            </li>
                            <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                                <a itemprop="item" href="/packing/"><span itemprop="name">Упаковка товаров</span></a><meta itemprop="position" content="2" />
                            </li>
                        </ul>
                    </nav>
                    <h1>Упаковка товаров</h1>
                    <div class="contacts-block">
                        <br />
                        Хорошо ли упакуют и переживут ли стресс саженцы во время транспортировки? Ведь, какой бы здоровый саженец не был, если его упаковка будет некачественной, то он может заболеть, засохнуть, сломаться и расстроить вас при получении.
                        <br />
                        <br />
                        Мы здесь, в Agro-Market.net, заботимся о каждом саженце и упаковываем качественно! Смотрите краткое видео об упаковке и узнайте в каком прекрасном виде вы получите посылку с заказом! <br />
                        <br />
                        <b>Упаковка малогабаритных заказов</b><br />
                        <br />
                        В момент попадания заказов к упаковщикам, которые еще раз сверяют товары по накладной с теми, что собрали сборщики в коробки. Каждая коробка дополнительно заполняется уплотняющими материалами (если нужно), запечатывается и
                        маркируется специальными штрихкодами, которые помогают избежать ошибок с доставкой заказов.<br />
                        <br />
                        <br />
                        Все коробки, которые используются для упаковки заказов:<br />
                        <br />
                        <ul>
                            <li>Дополнительно уплотнены для лучшей сохранности заказов внутри</li>
                            <li>Имеют фирменную маркировку с логотипами на сторонах коробки</li>
                            <li>Разных размеров и максимально точно подходят под размер Вашего заказа</li>
                        </ul>
                        <br />
                        <b>Упаковка саженцев</b><br />
                        <br />
                        Корни саженцев замачиваются в специально приготовленном растворе, так называемой «болтушке» (глиняной). Это гарантирует сохранность корней растения от подсыхания при транспортировке до 7 дней и более. Далее корни саженцев помещаются
                        в пакет и плотно паллетируется. Если саженец высокий, то к нему крепится специальный деревянный штатив. Упаковка целостная и очень надежная.<br />
                        <br />
                        <br />
                        <hr />
                        <br />
                        <span><b>Инновационная, собственная система упаковки саженцев и товаров</b><br /> </span><br />
                        <iframe width="979" height="551" src="https://www.youtube.com/embed/6JxQifzyV0w" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <hr />
                        <b><br /> </b><br />
                        <b>Закадровые съемки со склада</b><br />
                        <br />
                        <iframe width="979" height="551" src="https://www.youtube.com/embed/U0424arEDWU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>

            @include('frontend.components.subscribers')
        </div>
    </div>

@stop
