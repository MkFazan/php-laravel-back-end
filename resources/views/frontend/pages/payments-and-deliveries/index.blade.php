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
                                <a itemprop="item" href="/payments-and-deliveries/"><span itemprop="name">Оплата и доставка</span></a><meta itemprop="position" content="2" />
                            </li>
                        </ul>
                    </nav>
                    <h1>Оплата и доставка</h1>
                    <div class="contacts-block">
                        <p style="text-align: center;"></p>
                        <hr />
                        <hr />
                        <b>
                            <span style="color: #9ecb45;"><br /> </span>
                        </b>
                        <b><span style="color: #9ecb45;">С 27 марта 2020 года новые выгодные условия адресной доставки. Узнайте подробнее на этой странице ниже.</span></b><br />
                        <br />
                        <hr />
                        <hr />
                        <br />
                        <img width="100%" alt="тарифы 2019" src="img/tarif.webp" style="max-width: 100%" /> <br />
                        <br />
                        <ul>
                            <li><i>Часть цены доставки (или полная стоимость) возвращается бонусами на персональный счет сразу после получения доставки заказа.</i></li>
                            <li><i>При заказе на сумму, которая дает право на бесплатную доставку, Вы не платите за доставку вообще ничего на отделении.</i></li>
                            <li>
                                <i>
                                    Если заказ был оформлен не под учетной записью клиента (а на номер телефона из заказа не существует учетной записи), то бонусы будут возвращены на новую, автоматически созданную, учетную запись клиента. Оповещение с
                                    логином и паролем приходят автоматически на указанный email или номер телефона;
                                </i>
                            </li>
                            <li><i>Тарифы и правила могут быть дополнены или внесены изменения, о чем будет объявлено на этой странице;</i></li>
                            <li><i>Тарифы на доставку заказа применяются на сумму заказа с учетом всех скидок, использованных бонусов, минимальной суммы заказа и других возможных выгод, которые могут быть распространены на заказ.</i></li>
                        </ul>
                        <br />
                        <p style="text-align: center;">
                            <br />
                        </p>
                        <br />
                        <hr />
                        <hr />
                        <br />
                        <br />
                        <strong>1. Доставка до отделения «Нова Пошта» -&nbsp;</strong><b>без дополнительных комиссий</b><br />
                        &nbsp;<br />
                        <a href="https://novaposhta.ua/" rel="noffolow" target="_blank"><img src="img/novaya_pochta.webp" alt="Перейти на https://novaposhta.ua/" height="80" width="225" /></a>
                        &nbsp;
                        <ul>
                            <li><strong>Стоимость доставки (фиксированная):</strong>&nbsp;89 грн (+ полный или частичный возврат стоимости бонусами)</li>
                            <li><b>Бесплатная доставка:</b> при заказе от 1200 грн за доставку Вы ничего не платите</li>
                            <li><strong>Сроки доставки: </strong>от 1 до 3&nbsp;дней с момента отправки заказа</li>
                            <li><strong>Оплата:</strong> на отделении после осмотра посылки (Вы не оплачиваете пересылку денег обратно) либо предоплата на банковский счет компании</li>
                        </ul>
                        <br />
                        <ul>
                            <li>Адреса всех отделений можно узнать <a href="http://novaposhta.ua/office" rel="noffolow" target="_blank">здесь</a></li>
                            <li>Отследить маршрут посылки можно <a href="http://novaposhta.ua/tracking" rel="noffolow" target="_blank">здесь</a></li>
                        </ul>
                        <br />
                        <br />
                        <hr />
                        <br />
                        <br />
                        <strong>2.&nbsp;Доставка до отделения «Укрпошта» - фиксированная стоимость доставки</strong><br />
                        &nbsp;<br />
                        <a href="https://www.ukrposhta.ua/ua" rel="noffolow" target="_blank"><img src="img/ukr.webp" alt="Перейти на https://www.ukrposhta.ua/ua" height="80" width="225" /></a>
                        &nbsp;
                        <ul>
                            <li><b>Стоимость доставки (фиксированная):</b>&nbsp;49 грн (+ полный возврат стоимости бонусами)</li>
                            <li><b>Бесплатная доставка:</b>&nbsp; при заказе от 1200 грн за доставку Вы ничего не платите</li>
                            <li><strong>Сроки доставки:</strong> от 3 до 7 дней с момента отправки</li>
                            <li><strong>Оплата:</strong>&nbsp;на отделении после осмотра посылки либо предоплата на банковский счет компании (транспортной компанией взымается дополнительная плата за пересылку денег)</li>
                        </ul>
                        <br />
                        <ul>
                            <li>Почтовые индексы отделений можно узнать <a href="http://ukrposhta.ua/ua/dovidka/indeksi" rel="noffolow" target="_blank">здесь</a></li>
                            <li>Отследить маршрут посылки можно <a href="http://ukrposhta.ua/vidslidkuvati-forma-poshuku" rel="noffolow" target="_blank">здесь</a></li>
                        </ul>
                        <br />
                        <br />
                        <hr />
                        <br />
                        <br />
                        <strong>3. Курьерская доставка по адресу получателя</strong><br />
                        &nbsp;<br />
                        <ul>
                            <li><strong>Стоимость доставки:</strong>&nbsp;149 грн.</li>
                            <li><strong>Сроки доставки:</strong> от 2 до 5 дней с момента отправки заказа</li>
                            <li><strong>Оплата:</strong>&nbsp;наложенным платежом или онлайн</li>
                        </ul>
                        &nbsp;<br />
                        <br />
                        <hr />
                        <br />
                        <strong>4. Самовывоз из магазина в Одессе --- отсутствует (на текущий момент)</strong><br />
                        &nbsp;<br />
                        <ul>
                            <li><strong>Стоимость доставки:</strong>&nbsp;всегда бесплатно</li>
                            <li><strong>Сроки доставки:</strong> от 1 до 2 дней с момента подтверждения заказа оператором</li>
                            <li><strong>Оплата:</strong> в магазине после осмотра состава заказа</li>
                            <li><b>Необходимо: </b>забрать товар в течении 7 дней<b>&nbsp;</b>после оповещения о прибытии заказа на пункт самовывоза иначе Ваш заказ будет аннулирован.</li>
                        </ul>
                        &nbsp;<br />
                        <em>
                            Адрес магазина:<br />
                            Одесса, ул. Привозная, 14, рынок «Привоз», магазин «Все для сада и огорода»
                        </em>
                        <br />
                        &nbsp;<br />
                        <br />
                        <hr />
                        <hr />
                        &nbsp;<br />
                        <b>
                            Оплата по безналичному расчету для юридических лиц возможна при заказе от 3000 гривен и осуществляется следующим способом:после оформления заказа, менеджер магазина электронной почтой вышлет Вам форму которую нужно заполнить;
                            потом получить подтверждение по заказу, оплатить его; после чего, заказ и документы будут отправлены.<br />
                            <br />
                            Такая форма содержит: 1. Полное наименование;&nbsp;2. код ЕДРПУ;&nbsp;3. Система налогообложения (необязательно);&nbsp;4. Контактное лицо;&nbsp;5. Контактный телефон:&nbsp;6: Еmail.&nbsp;7. Форма доставки;&nbsp;8. Почтовый адрес
                            (новая почта) - для обмена документами.<br />
                            <br />
                            Далее, Вы сможете оплатить заказ в кассе отделения любого банка или с расчетного счета Вашей фирмы.&nbsp;<br />
                            <br />
                            Для юридических лиц пакет всех необходимых документов предоставляется на почтовый адрес.<br />
                            <br />
                            <hr />
                            <hr />
                            <br />
                            <br />
                            <br />
                            <strong>Возникли вопросы о доставке и оплате заказов?</strong><br />
                            Позвоните: 0 (44) 333-49-14<br />
                            Напишите: <a href="mailto:agro-market@mail.ua">info@agro-market.ua</a><br />
                            <br />
                        </b>
                    </div>
                    <b> </b>
                </div>
            </div>

            @include('frontend.components.subscribers')
        </div>
    </div>

@stop
