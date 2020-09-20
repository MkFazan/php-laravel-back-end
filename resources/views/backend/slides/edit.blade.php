@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Слайд</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Редагувати слайд</h3>
                    </div>
                    <form role="form" id="createUserForm" enctype="multipart/form-data" novalidate="novalidate" method="post" action="{{route('slides.update',  $slide->id)}}">
                        @method('PUT')
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="Slide">Вкласти файл</label>
                                <div class="input-group">
                                    <td><img width="100" height="100" src="{{asset('storage/' . $slide->path)}}"></td>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Вибрати</label>
                                <select name="position" class="form-control">
                                    @for($i=1; $i<=8; $i++)
                                        <option {{$slide->position == $i ? "selected" : ""}} value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                                @if($errors->has('position'))
                                    <span id="main-error" class="error invalid-feedback" style="display: inline;">{{ $errors->first('position') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-0">
                                <div class="custom-control custom-checkbox">
                                    <input type="hidden" name="status" value="0">
                                    <input type="checkbox" name="status" value="1" class="custom-control-input {{ $errors->has('status') ? 'is-invalid' : '' }}" {{$slide->status ? "checked" : ""}} id="status" aria-describedby="status-error">
                                    <label class="custom-control-label" for="status">Статус</label>
                                </div>
                                @if($errors->has('status'))
                                    <span id="status-error" class="error invalid-feedback" style="display: inline;">{{ $errors->first('status') }}</span>
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

