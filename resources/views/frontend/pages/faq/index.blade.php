@php
    $pages = getPages();
    $questionCategories = getQuestionCategories();
    $currentLocale = getCurrentLocale();

@endphp

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
                    @include('frontend.pages.faq.components.sub-menu', [])
                    <h1>{{$currentLocale == 'uk' ? $currentPage->title_ua : $currentPage->title_ru}}</h1>
                    @include('frontend.pages.faq.components.questions', [
                        'questionCategory' => true,
                        'questionAnswers' => []
                    ])
                </div>
            </div>

            @include('frontend.components.subscribers')
        </div>
    </div>

@stop
