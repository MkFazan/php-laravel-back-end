@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Панель</h1>
    @include('backend.components.notifications')
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Редагувати зображення</h3>
                    </div>
                    <form role="form" id="createUserForm" enctype="multipart/form-data" novalidate="novalidate" method="post" action="{{route('images.update',  $image->id)}}">
                        @method('PUT')
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="Image">Вкласти файл</label>
                                <div class="input-group">
                                    <img width="100" height="100" src="{{asset('storage/' . $image->path)}}">
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <div class="custom-control custom-checkbox">
                                    <input type="hidden" name="status" value="0">
                                    <input type="checkbox" name="status" value="1" class="custom-control-input {{ $errors->has('status') ? 'is-invalid' : '' }}" {{$image->status ? "checked" : ""}} id="status" aria-describedby="status-error">
                                    <label class="custom-control-label" for="status">Статус</label>
                                </div>
                                @if($errors->has('status'))
                                    <span id="status-error" class="error invalid-feedback" style="display: inline;">{{ $errors->first('status') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-0">
                                <div class="custom-control custom-checkbox">
                                    <input type="hidden" name="main" value="0">
                                    <input type="checkbox" name="main" value="1" class="custom-control-input {{ $errors->has('main') ? 'is-invalid' : '' }}" {{$image->main ? "checked" : ""}}  id="main" aria-describedby="main-error">
                                    <label class="custom-control-label" for="main">Головна</label>
                                </div>
                                @if($errors->has('main'))
                                    <span id="main-error" class="error invalid-feedback" style="display: inline;">{{ $errors->first('main') }}</span>
                                @endif
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Підтвердити</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

