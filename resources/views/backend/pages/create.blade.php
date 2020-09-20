@extends('adminlte::page')

@section('title', 'Create user')

@section('content_header')
    <h1>Додати нову сторінку</h1>

    @include('backend.components.notifications')
@stop

@section('content')
    <form role="form" id="createUserForm" novalidate="novalidate" method="post" action="{{route('pages.store')}}">
        @csrf

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">UA</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title_ua">Заголовок UA</label>
                            <input type="text" name="title_ua" value="{{ old('title_ua', null) }}" class="form-control {{ $errors->has('title_ua') ? 'is-invalid' : '' }}" id="title_ua" placeholder="Enter title_ua" aria-describedby="title_ua-error" aria-invalid="true">
                            @if($errors->has('title_ua'))
                                <span id="title_ua-error" class="error invalid-feedback">{{ $errors->first('title_ua') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="header_ua">Шапка UA</label>
                            <input type="text" name="header_ua" value="{{ old('header_ua', null) }}" class="form-control {{ $errors->has('header_ua') ? 'is-invalid' : '' }}" id="header_ua" placeholder="Enter header_ua" aria-describedby="header_ua-error" aria-invalid="true">
                            @if($errors->has('header_ua'))
                                <span id="header_ua-error" class="error invalid-feedback">{{ $errors->first('header_ua') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Опис UA</label>
                            <textarea name="description_ua" class="form-control" rows="3" placeholder="Enter ...">{{old('description_ua')}}</textarea>
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
                            <label for="title_ru">Заголовок RU</label>
                            <input type="text" name="title_ru" value="{{ old('title_ru', null) }}" class="form-control {{ $errors->has('title_ru') ? 'is-invalid' : '' }}" id="title_ru" placeholder="Enter title_ru" aria-describedby="title_ru-error" aria-invalid="true">
                            @if($errors->has('title_ru'))
                                <span id="title_ru-error" class="error invalid-feedback">{{ $errors->first('title_ru') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="header_ru">Шапка RU</label>
                            <input type="text" name="header_ru" value="{{ old('header_ru', null) }}" class="form-control {{ $errors->has('header_ru') ? 'is-invalid' : '' }}" id="header_ru" placeholder="Enter header_ru" aria-describedby="header_ru-error" aria-invalid="true">
                            @if($errors->has('header_ru'))
                                <span id="header_ru-error" class="error invalid-feedback">{{ $errors->first('header_ru') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Опис RU</label>
                            <textarea name="description_ru" class="form-control" rows="3" placeholder="Enter ...">{{old('description_ru')}}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Meta дані та налаштування</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="meta_title">Meta Заголовок</label>
                            <input type="text" name="meta_title" value="{{ old('meta_title', null) }}" class="form-control {{ $errors->has('meta_title') ? 'is-invalid' : '' }}" id="meta_title" placeholder="Enter meta_title" aria-describedby="meta_title-error" aria-invalid="true">
                            @if($errors->has('meta_title'))
                                <span id="meta_title-error" class="error invalid-feedback">{{ $errors->first('meta_title') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Meta Опис </label>
                            <textarea name="meta_description" class="form-control {{ $errors->has('meta_description') ? 'is-invalid' : '' }}" rows="3" placeholder="Enter ...">{{old('meta_description')}}</textarea>
                            @if($errors->has('meta_description'))
                                <span id="title_ru-error" class="error invalid-feedback">{{ $errors->first('meta_description') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="meta_keywords">Meta Ключові слова</label>
                            <input type="text" name="meta_keywords" value="{{ old('meta_keywords', null) }}" class="form-control {{ $errors->has('meta_keywords') ? 'is-invalid' : '' }}" id="meta_keywords" placeholder="Enter meta_keywords" aria-describedby="meta_keywords-error" aria-invalid="true">
                            @if($errors->has('meta_keywords'))
                                <span id="meta_keywords-error" class="error invalid-feedback">{{ $errors->first('meta_keywords') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" name="slug" value="{{ old('slug', null) }}" onkeyup="generateSlug(this)" class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" id="slug" placeholder="Enter slug" aria-describedby="slug-error" aria-invalid="true">
                            @if($errors->has('slug'))
                                <span id="slug-error" class="error invalid-feedback">{{ $errors->first('slug') }}</span>
                            @endif
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
                        <div class="form-group mb-0">
                            <div class="custom-control custom-checkbox">
                                <input type="hidden" name="is_sidebar" value="0">
                                <input type="checkbox" name="is_sidebar" value="1" class="custom-control-input {{ $errors->has('is_sidebar') ? 'is-invalid' : '' }}" id="is_sidebar" aria-describedby="is_sidebar-error">
                                <label class="custom-control-label" for="is_sidebar">Is Sidebar</label>
                            </div>
                            @if($errors->has('is_sidebar'))
                                <span id="is_sidebar-error" class="error invalid-feedback" style="display: inline;">{{ $errors->first('is_sidebar') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-0">
                            <div class="custom-control custom-checkbox">
                                <input type="hidden" name="is_header" value="0">
                                <input type="checkbox" name="is_header" value="1" class="custom-control-input {{ $errors->has('is_header') ? 'is-invalid' : '' }}" id="is_header" aria-describedby="is_header-error">
                                <label class="custom-control-label" for="is_header">Is Header</label>
                            </div>
                            @if($errors->has('is_header'))
                                <span id="is_header-error" class="error invalid-feedback" style="display: inline;">{{ $errors->first('is_header') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-0">
                            <div class="custom-control custom-checkbox">
                                <input type="hidden" name="is_footer" value="0">
                                <input type="checkbox" name="is_footer" value="1" class="custom-control-input {{ $errors->has('is_footer') ? 'is-invalid' : '' }}" id="is_footer" aria-describedby="is_footer-error">
                                <label class="custom-control-label" for="is_footer">Is Footer</label>
                            </div>
                            @if($errors->has('is_footer'))
                                <span id="is_footer-error" class="error invalid-feedback" style="display: inline;">{{ $errors->first('is_footer') }}</span>
                            @endif
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

        function generateSlug(el){
            let slug = el.value;
            el.value = slug.replace(/[^A-Za-z-]/, '');
        }

    </script>
@stop
