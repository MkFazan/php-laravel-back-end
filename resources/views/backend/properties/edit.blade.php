@extends('adminlte::page')

@section('title', 'Панель')

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
                        <h3 class="card-title">Змінити властивість:{{$property->id}}</h3>
                    </div>
                    <form role="form" id="createPropertyForm" novalidate="novalidate" method="post" action="{{route('properties.update', $property->id)}}">
                        @method('PUT')
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Заголовок UA</label>
                                <input type="text" name="title_ua" value="{{ old('title_ua', $property->title_ua) }}" class="form-control {{ $errors->has('title_ua') ? 'is-invalid' : '' }}" id="title" placeholder="Enter title_ua" aria-describedby="title_ua-error" aria-invalid="true">
                                @if($errors->has('title_ua'))
                                    <span id="title-error" class="error invalid-feedback">{{ $errors->first('title_ua') }}</span>
                                @endif
                                @csrf
                                <div class="form-group">
                                    <label for="title">Заголовок RU</label>
                                    <input type="text" name="title_ru" value="{{ old('title_ru', $property->title_ru) }}" class="form-control {{ $errors->has('title_ru') ? 'is-invalid' : '' }}" id="title_ru" placeholder="Enter title_ru" aria-describedby="title_ru-error" aria-invalid="true">
                                    @if($errors->has('title_ru'))
                                        <span id="title-error" class="error invalid-feedback">{{ $errors->first('title_ru') }}</span>
                                    @endif
                                </div>
                            <div class="form-group mb-0">
                                <div class="custom-control custom-checkbox">
                                    <input type="hidden" name="status" value="0">
                                    <input type="checkbox" name="status" value="1" class="custom-control-input {{ $errors->has('status') ? 'is-invalid' : '' }}" {{$property->status ? "checked" : ""}} id="status" aria-describedby="status-error">
                                    <label class="custom-control-label" for="status">Статус</label>
                                </div>
                                @if($errors->has('status'))
                                    <span id="status-error" class="error invalid-feedback" style="display: inline;">{{ $errors->first('status') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Зберегти</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

