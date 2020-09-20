@php
    $pages = getPages();
    $replaces =getReplaces();
    $currentLocale = getCurrentLocale();
@endphp
@extends('layouts.frontend')

@section('css')
    <link href="{{ asset('css/kernel_main.css') }}" type="text/css" rel="stylesheet"/>
    <link href="{{ asset('css/page_0ccbb7aec535b09c8dd524d4a8ed77cf.css') }}" type="text/css" rel="stylesheet"/>
    <link href="{{ asset('css/page_9ea45e8240bbb3edfa29029d6dc0c105.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('css/template_f281b088860d7887671196e71a797cfb.css') }}" type="text/css"
          data-template-style="true" rel="stylesheet"/>
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
                                <a itemprop="item" href="/replace/"><span itemprop="name">{{$currentLocale == 'uk' ? $currentPage->title_ua : $currentPage->title_ru}}</span></a><meta itemprop="position" content="2" />
                            </li>
                        </ul>
                    </nav>
                    <h1>{{$currentLocale == 'uk' ? $currentPage->title_ua : $currentPage->title_ru}}</h1>
                    <div class="contacts-block">
                        <div class="container">
                            @foreach( $replaces as $replace)
                                @if($replace->id & 1)
                                    @include('frontend.pages.replace.components.row_1')
                                @else
                                    @include('frontend.pages.replace.components.row_2')
                                @endif
                            @endforeach
                        </div>
                            <p class="lastLine">Для получения дополнительной информации, или если у Вас есть другие вопросы о нашей 100% гарантии удовольствия от заказа, пожалуйста, <a href="contacts.html">свяжитесь с нами</a>.</p>
                    </div>
                </div>
            </div>

            @include('frontend.components.subscribers')
        </div>
    </div>

@stop
