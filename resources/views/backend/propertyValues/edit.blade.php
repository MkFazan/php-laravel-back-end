@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Значення</h1>
    @include('backend.components.notifications')
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Update User ID: {{$propertyValue->id}}</h3>
                    </div>
                    <form role="form" id="createUserForm" novalidate="novalidate" method="post"
                          action="{{route('propertyValues.update', $propertyValue->id)}}">
                        @method('PUT')
                        @csrf
                        <div class="card-body">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Характеристика</label>
                                    <select class="form-control" name="property_id">
                                        @foreach($properties as $property)
                                            <option
                                                value="{{$property->id}}" {{$propertyValue->property->id == $property->id ? "selected" : ""}}>{{$property->title_ua}}
                                                /{{$property->title_ru}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <label for="value_ua">Значення UA</label>
                                <input type="text" name="value_ua"
                                       value="{{ old('value_ua', $propertyValue->value_ua) }}"
                                       class="form-control {{ $errors->has('value_ua') ? 'is-invalid' : '' }}"
                                       id="value_ua" placeholder="Ввести Значення" aria-describedby="value_ua-error"
                                       aria-invalid="true">
                                @if($errors->has('value_ua'))
                                    <span id="value_ua-error"
                                          class="error invalid-feedback">{{ $errors->first('value_ua') }}</span>
                                @endif
                                <div class="form-group">
                                    <label for="value_ru">Значення RU</label>
                                    <input type="text" name="value_ru"
                                           value="{{ old('value_ru', $propertyValue->value_ru) }}"
                                           class="form-control {{ $errors->has('value_ru') ? 'is-invalid' : '' }}"
                                           id="value" placeholder="Ввести Значення"
                                           aria-describedby="value_ru-error"
                                           aria-invalid="true">
                                    @if($errors->has('value_ru'))
                                        <span id="value_ru-error"
                                              class="error invalid-feedback">{{ $errors->first('value_ru') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-0">
                                    <div class="custom-control custom-checkbox">
                                        <input type="hidden" name="status" value="0">
                                        <input type="checkbox" name="status" value="1"
                                               class="custom-control-input {{ $errors->has('status') ? 'is-invalid' : '' }}"
                                               id="status" {{$propertyValue->status ? "checked" : ""}} aria-describedby="status-error">
                                        <label class="custom-control-label" for="status">Статус</label>
                                    </div>
                                    @if($errors->has('status'))
                                        <span id="status-error" class="error invalid-feedback"
                                              style="display: inline;">{{ $errors->first('status') }}</span>
                                    @endif
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Підтвердити</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

