@extends('layouts.frontend')

@section('css')
    <link href="{{ asset('css/kernel_main.css') }}" type="text/css" rel="stylesheet"/>
    <link href="{{ asset('css/page_0ccbb7aec535b09c8dd524d4a8ed77cf.css') }}" type="text/css" rel="stylesheet"/>
    <link href="{{ asset('css/template_f281b088860d7887671196e71a797cfb.css') }}" type="text/css" data-template-style="true" rel="stylesheet"/>
    <link href="{{ asset('css/popup.css') }}" type="text/css" data-template-style="true" rel="stylesheet"/>
@endsection

@section('content')
    <div id="page-body" class="page-body row">
        <div class="content col-lg-12 col-md-12 col-sm-12 col-xs-12">
            @include('frontend.components.slider')

            @include('frontend.components.popular')

            @include('frontend.components.advantages')

            @include('frontend.components.reviews')

            @include('frontend.components.subscribers')

{{--            Відкласти--}}
{{--            @include('frontend.components.videos')--}}

        </div>
    </div>
@stop
