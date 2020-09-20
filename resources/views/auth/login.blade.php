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
            <div class="container">
                <div class="row">
                    <div class="col-auto text-center align-content-center align-items-center" style="background-color: white">
                        <div class="modal-content" style="display: inline-block;">
                            <div class="orenter">
                                <div class="text">
                                    <p>Авторизация</p>
                                </div>
                                <form method="post" action="{{ route('login') }}">
                                    @csrf
                                    @if(session()->has('error'))
                                        <span style="color: red">{{session()->get('error')}}</span>
                                    @endif
                                    <div class="form-row">
                                        <input class="inputtext" type="email" placeholder="E-mail (или номер телефона)" id="user_auth_login" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    </div>
                                    <div class="form-row">
                                        <input class="inputtext" type="password" name="password" required autocomplete="current-password" placeholder="Пароль">
                                    </div>
{{--                                    @if (Route::has('password.request'))--}}
{{--                                    <div class="form-row">--}}
{{--                                        <noindex><a class="fogetpassword" href="{{ route('password.request') }}" rel="nofollow">{{ __('Forgot Your Password?') }}</a></noindex>--}}
{{--                                    </div>--}}
{{--                                    @endif--}}
                                    <div class="form-row-submit">
                                        <input type="submit" value="Войти">
                                        <a href="{{route('register')}}" class="fancy_content">Зарегистрироваться</a>
                                        <span style="color: #ec8435; display: block;" class="anot">
                                                        Теперь для оформления заказов не обязательно нужен личный кабинет. Списание бонусов происходит в момент подтверждения заказа по телефону.
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

{{--            @include('frontend.components.subscribers')--}}
        </div>
    </div>
@endsection
