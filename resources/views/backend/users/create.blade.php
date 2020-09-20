@extends('adminlte::page')

@section('title', 'Create user')

@section('content_header')
    <h1>Додати користува</h1>

    @include('backend.components.notifications')
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add new User</h3>
                    </div>
                    <form role="form" id="createUserForm" novalidate="novalidate" method="post" action="{{route('users.store')}}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nickname">Nickname</label>
                                <input type="text" name="nickname" value="{{ old('nickname', null) }}" class="form-control {{ $errors->has('nickname') ? 'is-invalid' : '' }}" id="nickname" placeholder="Enter nickname" aria-describedby="nickname-error" aria-invalid="true">
                                @if($errors->has('nickname'))
                                    <span id="nickname-error" class="error invalid-feedback">{{ $errors->first('nickname') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" value="{{ old('email', null) }}" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" placeholder="Enter email" aria-describedby="email-error" aria-invalid="true">
                                @if($errors->has('email'))
                                    <span id="email-error" class="error invalid-feedback">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" value="{{ old('password', null) }}" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Enter password" aria-describedby="password-error" aria-invalid="true">
                                @error('password')
                                    <span id="password-error" class="error invalid-feedback">{{ $errors->first('password') }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Enter password" aria-describedby="password_confirmation-error" aria-invalid="true">
                            </div>
{{--                            <div class="form-group mb-0">--}}
{{--                                <div class="custom-control custom-checkbox">--}}
{{--                                    <input type="checkbox" name="terms" class="custom-control-input is-invalid" id="exampleCheck1" aria-describedby="terms-error">--}}
{{--                                    <label class="custom-control-label" for="exampleCheck1">I agree to the <a href="#">terms of service</a>.</label>--}}
{{--                                </div>--}}
{{--                                <span id="terms-error" class="error invalid-feedback" style="display: inline;">Please accept our terms</span>--}}
{{--                            </div>--}}
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop

