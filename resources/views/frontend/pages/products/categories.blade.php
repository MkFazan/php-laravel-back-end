@extends('layouts.frontend')

@section('css')
    <link href="{{ asset('css/kernel_main.css') }}" type="text/css" rel="stylesheet"/>
    <link href="{{ asset('css/page_0ccbb7aec535b09c8dd524d4a8ed77cf.css') }}" type="text/css" rel="stylesheet"/>
    <link href="{{ asset('css/page_9ea45e8240bbb3edfa29029d6dc0c105.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('css/template_f281b088860d7887671196e71a797cfb.css') }}" type="text/css" data-template-style="true" rel="stylesheet"/>
    <link href="{{ asset('css/popup.css') }}" type="text/css" data-template-style="true" rel="stylesheet"/>
    <link href="{{ asset('css/contact.css') }}" type="text/css" data-template-style="true" rel="stylesheet" />
    <link href="{{ asset('css/page_ddd61dea76007c482fdae522ce14ebd2.css') }}" type="text/css" data-template-style="true" rel="stylesheet" />
    <link href="{{ asset('css/page_ab2c4370c7b1ee4523302f35bacddbc5.css') }}" type="text/css" data-template-style="true" rel="stylesheet" />

@endsection

@section('content')

    <div id="page-body" class="page-body row">
        <div class="content col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="row row_over">
                <div class="content-cols col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                    <div class="row">
                        @include('frontend.pages.products.components.filter-sidebar')

                        <div class="main-content col-lg-9 col-md-9 col-sm-9 col-xs-9 cols_over">
                            <nav class="breadcrumbs col-lg-12 col-md-12 col-sm-12 col-xs-12 col_over">
                                <ul itemscope="" itemtype="#" class="row">
                                    <a href="{{redirect()->getUrlGenerator()->previous()}}">Назад</a>
                                    <li itemprop="itemListElement" itemscope="" itemtype="#">
                                        <a itemprop="item" href="{{route('home')}}">
                                            <span itemprop="name" content="Agro-Market"><i class="fas fa-home"></i></span>
                                        </a>
                                        <meta itemprop="position" content="1" />
                                    </li>
                                    <li itemprop="itemListElement" itemscope="" itemtype="#">
                                        <a itemprop="item" href="{{route('categories', $category->id)}}"><span itemprop="name">{{$currentLocale == 'uk' ? $category->title_ua : $category->title_ru}}</span></a><meta itemprop="position" content="2" />
                                    </li>
                                </ul>
                            </nav>
                            <div class="rg_h1_wrapper"><h1 data-id="">{{ucfirst($currentLocale == 'uk' ? $category->title_ua : $category->title_ru)}}</h1></div>
                            <div id="horiz_sec_list">
                                <div class="bx_catalog_tile">
                                    @foreach($category->children as $cat)
                                        <div class="col-md-3 col-sm-4 col-xs-6">
                                            <a class="s-link" href="{{route('catalog', $cat->id)}}">
                                                <div class="s-card">
                                                    <div class="s-picture"><img src="{{asset('img/4d544e36b758d929f732d6d073e8a002.jpg')}}" alt="" /></div>
                                                    <div class="s-name">{{ucfirst($currentLocale == 'uk' ? $cat->title_ua : $cat->title_ru)}}</div>
                                                    <div class="s-button"><span>Перейти</span></div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

{{--                            <div class="top-banners">--}}
{{--                                <a href="#"> <img src="{{asset('img/31b0c97bbacbfbe4db855aac1b28b0dd.jpg')}}"  style="max-width: 100%" /> </a>--}}
{{--                            </div>--}}
{{--                            @include('frontend.pages.products.components.list-products')            --}}

                        </div>
                    </div>
                </div>

                @include('frontend.components.reviews')
            </div>

            <div class="row row_over">
                @include('frontend.components.subscribers')
            </div>
        </div>
    </div>

@stop
