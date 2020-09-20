@extends('adminlte::page')

@section('title', 'Creat comment')

@section('content_header')
    <h1>Додати коментар</h1>

    @include('backend.components.notifications')
@stop

@section('content')
    <form role="form" id="createUserForm" novalidate="novalidate" method="post" action="{{route('comments.store')}}">
        @csrf
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Коментарі</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" value="{{ old('email', null) }}" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" placeholder="Enter email" aria-describedby="email-error" aria-invalid="true">
                                        @if($errors->has('email'))
                                            <span id="email-error" class="error invalid-feedback">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Message</label>
                                        <textarea name="message" class="form-control {{ $errors->has('message') ? 'is-invalid' : '' }}" rows="3" placeholder="Enter ...">{{old('message')}}</textarea>
                                        @if($errors->has('message'))
                                            <span id="message-error" class="error invalid-feedback">{{ $errors->first('message') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Stars</label>
                                        <select name="stars" class="form-control">
                                           @for($i=1; $i<=5; $i++)
                                               <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                            @if($errors->has('stars'))
                                                <span id="stars-error" class="error invalid-feedback" style="display: inline;">{{ $errors->first('stars') }}</span>
                                            @endif
                                    </div>
                                    <div class="form-group mb-0">
                                        <div class="custom-control custom-checkbox">
                                            <input type="hidden" name="status" value="0">
                                            <input type="checkbox" name="status" value="1" class="custom-control-input {{ $errors->has('status') ? 'is-invalid' : '' }}" id="status" aria-describedby="status-error">
                                            <label class="custom-control-label" for="status">Статус</label>
                                        </div>
                                        @if($errors->has('status'))
                                            <span id="status-error" class="error invalid-feedback"
                                                  style="display: inline;">{{ $errors->first('status') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-0">
                                        <div class="custom-control custom-checkbox">
                                            <input type="hidden" name="approve" value="0">
                                            <input type="checkbox" name="approve" value="1" class="custom-control-input {{ $errors->has('approve') ? 'is-invalid' : '' }}" id="approve" aria-describedby="approve-error">
                                            <label class="custom-control-label" for="approve">Approve</label>
                                        </div>
                                        @if($errors->has('approve'))
                                            <span id="approve-error" class="error invalid-feedback"
                                                  style="display: inline;">{{ $errors->first('approve') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-0">
                                        <div class="custom-control custom-checkbox">
                                            <input type="hidden" name="is_buy" value="0">
                                            <input type="checkbox" name="is_buy" value="1" class="custom-control-input {{ $errors->has('is_buy') ? 'is-invalid' : '' }}" id="is_buy" aria-describedby="is_buy-error">
                                            <label class="custom-control-label" for="is_buy">Is_buy</label>
                                        </div>
                                        @if($errors->has('is_buy'))
                                            <span id="is_buy-error" class="error invalid-feedback"
                                                  style="display: inline;">{{ $errors->first('is_buy') }}</span>
                                        @endif
                                        <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Створити</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

@stop



