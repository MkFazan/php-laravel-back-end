@extends('adminlte::page')

@section('title', 'Відредагувати питання')

@section('content_header')
    <h1>Редагувати категорію питання</h1>

    @include('backend.components.notifications')
@stop

@section('content')
    <form role="form" id="createUserForm" enctype="multipart/form-data" novalidate="novalidate" method="post" action="{{route('questionCategories.update', $questionCategory->id)}}">

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
                                <input type="text" name="title_ua" value="{{ old('title_ua', $questionCategory->title_ua) }}" class="form-control {{ $errors->has('title_ua') ? 'is-invalid' : '' }}" id="title_ua" placeholder="Enter title_ua" aria-describedby="title_ua-error" aria-invalid="true">
                                @if($errors->has('title_ua'))
                                    <span id="title_ua-error" class="error invalid-feedback">{{ $errors->first('title_ua') }}</span>
                                @endif
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
                                <input type="text" name="title_ru" value="{{ old('title_ru', $questionCategory->title_ru) }}" class="form-control {{ $errors->has('title_ru') ? 'is-invalid' : '' }}" id="title_ru" placeholder="Enter title_ru" aria-describedby="title_ru-error" aria-invalid="true">
                                @if($errors->has('title_ru'))
                                    <span id="title_ru-error" class="error invalid-feedback">{{ $errors->first('title_ru') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="form-group">
                            <div class="card-body">
                                <label for="QuestionCategory">Вкласти файл</label>
                                <div class="custom-file">
                                    <input name="questionCategory" type="file" class="custom-file-input"   id="QuestionCategory">
                                    <label class="custom-file-label" for="questionCategory" id="QuestionCategoryUpload" >Вибрати зображення</label>
                                </div>
                                <div class="input-group img">
                                    <img  src="{{asset('storage/' . $questionCategory->path)}}">
                                 </div>
                                <div class="form-group mb-0">
                                    <div class="custom-control custom-checkbox">
                                    <input type="hidden" name="status" value="0">
                                    <input type="checkbox" name="status" value="1" {{$questionCategory->status ? "checked" : ""}} class="custom-control-input {{ $errors->has('status') ? 'is-invalid' : '' }}" id="status" aria-describedby="status-error">
                                    <label class="custom-control-label" for="status">Статус</label>
                                     @if($errors->has('status'))
                                        <span id="status-error" class="error invalid-feedback" style="display: inline;">{{ $errors->first('status') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Створити</button>
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
        document.getElementById('QuestionCategory') . addEventListener( 'change', function (event) {
            document.getElementById('QuestionCategoryUpload') . textContent = event.srcElement.files[0].name;
        } );

    </script>
@stop

@section('css')
    <style>
        .img {
            margin-bottom:20px;
            margin-top: 20px;

        }
        .img img{
            width: auto;
            height: 200px;
            display: block;
            margin: 0 auto;
        }
    </style>
@stop
