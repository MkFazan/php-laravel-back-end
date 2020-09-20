@extends('adminlte::page')

@section('title', 'Новий слайд')

@section('content_header')
    <h1>Загрузити слайд</h1>
    @include('backend.components.notifications')
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Додати слайд</h3>
                    </div>
                    <form role="form" id="createUserForm" enctype="multipart/form-data" novalidate="novalidate" method="post" action="{{route('slides.store')}}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="Slide">Вкласти файл</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="slide" type="file" class="custom-file-input"  enctype="multipart/form-data"  id="Slide">
                                        <label class="custom-file-label" for="slide" id="SlideUpload" >Вибрати слайд</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="">Загрузити</span>
                                    </div>
                                    @if($errors->has('slide'))
                                        <span id="slide-error" class="error invalid-feedback">{{ $errors->first('slide') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Вибрати</label>
                                    <select name="position" class="form-control">
                                        @for($i=1; $i<=8; $i++)
                                            <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                    @if($errors->has('position'))
                                        <span id="main-error" class="error invalid-feedback" style="display: inline;">{{ $errors->first('position') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <div class="custom-control custom-checkbox">
                                    <input type="hidden" name="status" value="0">
                                    <input type="checkbox" name="status" value="1" class="custom-control-input {{ $errors->has('status') ? 'is-invalid' : '' }}" id="status" aria-describedby="status-error">
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

@section('js')
    <script>
        document.getElementById('Slide') . addEventListener( 'change', function (event) {
            document.getElementById('SlideUpload') . textContent = event.srcElement.files[0].name;
        } );

    </script>
@stop
