@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Слайд</h1>
@stop

@section('content')

    <form role="form" id="createUserForm" enctype="multipart/form-data" novalidate="novalidate" method="post"
          action="{{route('replaces.update',  $replace->id)}}">
        @csrf
        @method('PUT')

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">UA</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title_ua">Title UA</label>
                                <input type="text" name="title_ua" value="{{ old('title_ua', $replace->title_ua) }}"
                                       class="form-control {{ $errors->has('title_ua') ? 'is-invalid' : '' }}"
                                       id="title_ua" placeholder="Enter title_ua" aria-describedby="title_ua-error"
                                       aria-invalid="true">
                                @if($errors->has('title_ua'))
                                    <span id="title_ua-error"
                                          class="error invalid-feedback">{{ $errors->first('title_ua') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="header_ua">Header UA</label>
                                <input type="text" name="header_ua" value="{{ old('header_ua', $replace->header_ua) }}"
                                       class="form-control {{ $errors->has('header_ua') ? 'is-invalid' : '' }}"
                                       id="header_ua" placeholder="Enter header_ua" aria-describedby="header_ua-error"
                                       aria-invalid="true">
                                @if($errors->has('header_ua'))
                                    <span id="header_ua-error"
                                          class="error invalid-feedback">{{ $errors->first('header_ua') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Description UA</label>
                                <textarea name="description_ua" class="form-control" rows="3"
                                          placeholder="Enter ...">{{old('description_ua', $replace->description_ua)}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">RU</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title_ru">Title RU</label>
                                <input type="text" name="title_ru" value="{{ old('title_ru', $replace->title_ru) }}"
                                       class="form-control {{ $errors->has('title_ru') ? 'is-invalid' : '' }}"
                                       id="title_ru" placeholder="Enter title_ru" aria-describedby="title_ru-error"
                                       aria-invalid="true">
                                @if($errors->has('title_ru'))
                                    <span id="title_ru-error"
                                          class="error invalid-feedback">{{ $errors->first('title_ru') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="header_ru">Header RU</label>
                                <input type="text" name="header_ru" value="{{ old('header_ru', $replace->header_ru) }}"
                                       class="form-control {{ $errors->has('header_ru') ? 'is-invalid' : '' }}"
                                       id="header_ru" placeholder="Enter header_ru" aria-describedby="header_ru-error"
                                       aria-invalid="true">
                                @if($errors->has('header_ru'))
                                    <span id="header_ru-error"
                                          class="error invalid-feedback">{{ $errors->first('header_ru') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Description RU</label>
                                <textarea name="description_ru" class="form-control" rows="3"
                                          placeholder="Enter ...">{{old('description_ru', $replace->description_ru)}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Додати зображення</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="image_replace">Вкласти файл</label>
                                        <div class="input-group">
                                            <td><img width="100" height="100" src="{{asset('storage/' . $replace->path)}}"></td>
                                            <div class="custom-file">
                                                <input name="image_replace" type="file" class="custom-file-input"
                                                       enctype="multipart/form-data" id="image_replace">
                                                <label class="custom-file-label" for="image_replace"
                                                       id="image_replaceUpload">Вибрати
                                                    зображення</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="">Загрузити</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-0">
                                        <div class="custom-control custom-checkbox">
                                            <input type="hidden" name="status" value="0">
                                            <input type="checkbox" name="status" value="1"
                                                   {{$replace->status ? "checked" : ""}} class="custom-control-input {{ $errors->has('status') ? 'is-invalid' : '' }}"
                                                   id="status" aria-describedby="status-error">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>


@stop
@section('js')
    <script>
        document.getElementById('image_replace').addEventListener('change', function (event) {
            document.getElementById('image_replaceUpload').textContent = event.srcElement.files[0].name;
        });

    </script>

@stop
