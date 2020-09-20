@extends('layouts.frontend')

@section('css')
    <link href="{{ asset('css/kernel_main.css') }}" type="text/css" rel="stylesheet"/>
    <link href="{{ asset('css/page_0ccbb7aec535b09c8dd524d4a8ed77cf.css') }}" type="text/css" rel="stylesheet"/>
    <link href="{{ asset('css/page_9ea45e8240bbb3edfa29029d6dc0c105.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('css/template_f281b088860d7887671196e71a797cfb.css') }}" type="text/css" data-template-style="true" rel="stylesheet"/>
    <link href="{{ asset('css/popup.css') }}" type="text/css" data-template-style="true" rel="stylesheet"/>
    <link href="{{ asset('css/contact.css') }}" type="text/css" data-template-style="true" rel="stylesheet" />

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
                                <a itemprop="item" href="/contacts/"><span itemprop="name">Контакты</span></a><meta itemprop="position" content="2" />
                            </li>
                        </ul>
                    </nav>
                    <h1>Контакты</h1>
                    <div class="contacts-block">
                        <div itemscope="" itemtype="http://schema.org/Organization">
                            <div class="contacts-cols">
                                <div class="col" itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress"><strong>Контактные телефоны</strong>&nbsp;(с 10:00 до 17:00 , без выходных)</div>
                                <br />
                                <div class="col" style="color: red; font-weight: bold;">
                                    Agromarket работает в обычном режиме в условиях карантина. Все заказы доставляются без задержек.
                                </div>
                                <br />
                                <hr />
                                <br />
                                <div class="col" style="color: red; font-weight: bold;">
                                    В связи с сезонной загруженностью, соединение с оператором по телефону происходит дольше обычного. Пожалуйста, задайте свой вопрос в онлайн чате на сайте. Он находится в нижнем правом углу.
                                </div>
                                <div class="col">
                                    &nbsp;&nbsp;
                                    <div class="phones" itemprop="telephone">
                                        <ul>
                                            <li>0 (44) 333-49-12&nbsp;&nbsp;</li>
                                            <li>
                                                0 (93) 170-15-55
                                            </li>
                                            <li>
                                                0 (95) 260-94-04
                                            </li>
                                            <li>
                                                0 (67) 654-37-67
                                            </li>
                                        </ul>
                                        <br />
                                    </div>
                                </div>
                            </div>
                            <div class="contacts-questions">
                                По вопросам сотрудничества, предложений, жалоб:&nbsp;<a href="mailto:info@agro-market.ua">info@agro-market.ua</a><br />
                                <br />
                                Доставка&nbsp;осуществляется по всей Украине такими транспортными компаниями: "Нова&nbsp;Пошта" и "Укрпошта"<br />
                                <br />
                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                &nbsp;
                                <a href="https://agro-market.net/payments-and-deliveries/"><img width="430" alt="доставка урк-min.jpg" src="img/471632a3477cf0763365dc0464803ab5.webp" height="100" title="доставка урк-min.jpg" /></a>
                                <br />
                                <br />
                                Подробнее об условиях доставки Вы можете узнать на этой странице "<a href="https://agro-market.net/payments-and-deliveries/">Оплата и Доставка</a>".<br />
                                <br />
                                <br />
                                <hr />
                            </div>
                            <br />
                            <b>Наш магазин находится:<br /> </b><br />
                            <ul>
                                <li>Украина,&nbsp;г. Одесса,&nbsp;ул.Привозная, 14 (с 08:00 до 18:00)</li>
                            </ul>
                            <i>(вход с ул. Преображенской в старый "Привоз" магазин №10 «Семена, Все для сада и огорода»</i><i>)</i><br />
                            <br />
                            <br />
                        </div>
                        <div class="map">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1373.9820306266574!2d30.731387658285723!3d46.4692198421379!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDbCsDI4JzA5LjIiTiAzMMKwNDMnNTYuOSJF!5e0!3m2!1sru!2sua!4v1518884969519"
                                width="100%"
                                height="270"
                                frameborder="0"
                                style="border: 0;"
                                allowfullscreen=""
                            ></iframe>
                        </div>
                        <br />
                        <hr />
                        <br />
                        <ul>
                            <li>Ознакомиться с гарантийными условиями, условиями возврата средств можно&nbsp;<a href="replace.html">на этой странице</a></li>
                            <li>Узнать варианты оплаты и доставки можно <a href="https://agro-market.net/payments-and-deliveries/">на этой странице</a></li>
                        </ul>
                        <br />
                    </div>
                </div>
            </div>

            @include('frontend.components.subscribers')
        </div>
    </div>

@stop
