@extends('adminlte::page')

@section('title', 'Create user')

@section('content_header')
    <h1>Оновити питання</h1>

    @include('backend.components.notifications')
@stop

@section('content')
    <form role="form" id="createUserForm" novalidate="novalidate" method="post" action="{{route('questionAnswers.update',$questionAnswer)}}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Категорія питання</label>
            <select class="form-control" name="question_categories_id">
                @foreach($questionCategories as $questionCategory)
                        <option value="{{$questionCategory->id}}" {{$questionAnswer->questionCategories->id == $questionCategory->id ? "selected" : ""}}>{{$questionCategory->title_ua}}/{{$questionCategory->title_ru}}</option>
                @endforeach
            </select>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">UA</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="question_ua">Question_UA</label>
                                <textarea name="question_ua" class="form-control" rows="3" placeholder="Enter ...">{{ old('question_ua',  $questionAnswer->question_ua) }}</textarea>
                                @if($errors->has('question_ua'))
                                        <span id="question_ua-error" class="error invalid-feedback">{{ $errors->first('question_ua') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="answer_ua">Answer_UA</label>
                                <textarea name="answer_ua" class="form-control" rows="3" placeholder="Enter ...">{{ old('answer_ua',  $questionAnswer->answer_ua) }}</textarea>
                                @if($errors->has('header_ua'))
                                    <span id="answer_ua-error" class="error invalid-feedback">{{ $errors->first('answer_ua') }}</span>
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
                                <label for="question_ru">Question_RU</label>
                                <textarea name="question_ru" class="form-control" rows="3" placeholder="Enter ...">{{ old('question_ru',  $questionAnswer->question_ru) }}</textarea>
                                @if($errors->has('question_ru'))
                                    <span id="question_ru-error" class="error invalid-feedback">{{ $errors->first('question_ru') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="answer_ru">Answer_RU</label>
                                <textarea name="answer_ru" class="form-control" rows="3" placeholder="Enter ...">{{ old('answer_ru',  $questionAnswer->answer_ru) }}</textarea>
                                @if($errors->has('answer_ru'))
                                    <span id="header_ru-error" class="error invalid-feedback">{{ $errors->first('answer_ru') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="form-group mb-0">
                            <div class="custom-control custom-checkbox">
                                <input type="hidden" name="status" value="0">
                                <input type="checkbox" name="status" value="1" {{$questionAnswer->status ? "checked" : ""}} class="custom-control-input {{ $errors->has('status') ? 'is-invalid' : '' }}" id="status" aria-describedby="status-error">
                                <label class="custom-control-label" for="status">Статус</label>
                            </div>
                            @if($errors->has('status'))
                                <span id="status-error" class="error invalid-feedback" style="display: inline;">{{ $errors->first('status') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Створити</button>
                    </div>
                </div>
            </div>
        </div>

    </form>

@stop


