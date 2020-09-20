@extends('adminlte::page')

@section('title', 'Редагувати')

@section('content_header')
    <h1>Редагувати</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Оновити ідентифікатор категорій: {{$category->id}}</h3>
                    </div>
                    <form role="form" id="createUserForm" novalidate="novalidate" method="post" action="{{route('categories.update', $category->id)}}">
                        @method('PUT')
                        @csrf
                        <div class="card-body">
                            <label>Розділ</label>
                            <select class="custom-select {{ $errors->has('parent_id') ? 'is-invalid' : '' }}" name="parent_id">
                                <option value="{{null}}">-Root-</option>
                                @foreach($categories as $categoryItem)
                                    @if(!in_array($categoryItem->id, $children) && $categoryItem->id != $category->id)
                                        <option value="{{$categoryItem->id}}" {{$category->parent_id == $categoryItem->id ? 'selected': ""}}>{{$categoryItem->title_ua}}|{{$categoryItem->title_ua}}</option>
                                    @endif
                                @endforeach
                            </select>
                            @if($errors->has('parent_id'))
                                <span id="title-error" class="error invalid-feedback">{{ $errors->first('parent_id') }}</span>
                            @endif


                            <div class="form-group">
                                <label for="title_ua">Категорія UA</label>
                                <input type="text" name="title_ua" value="{{ old('title_ua', $category->title_ua) }}" class="form-control {{ $errors->has('title_ua') ? 'is-invalid' : '' }}" id="title" placeholder="Введіть назву" aria-describedby="title-error" aria-invalid="true">
                                @if($errors->has('title_ua'))
                                    <span id="title-error" class="error invalid-feedback">{{ $errors->first('title_ua') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="title_ru">Категорія RU</label>
                                <input type="text" name="title_ru" value="{{ old('title_ru', $category->title_ru) }}" class="form-control {{ $errors->has('title_ru') ? 'is-invalid' : '' }}" id="title" placeholder="Введіть назву" aria-describedby="title-error" aria-invalid="true">
                                @if($errors->has('title_ru'))
                                    <span id="title-error" class="error invalid-feedback">{{ $errors->first('title_ru') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-0">
                                <div class="custom-control custom-checkbox">
                                    <input type="hidden" name="status"  value="0" >
                                    <input type="checkbox" name="status" class="custom-control-input {{ $errors->has('status') ? 'is-invalid' : '' }}" id="status" {{$category->status ? "checked" : " " }} value="1" aria-describedby="status-error">
                                    <label class="custom-control-label" for="status">Статус активний</label>
                                </div>
                                @if($errors->has('status'))
                                    <span id="status-error" class="error invalid-feedback" style="display: inline;">{{ $errors->first('status') }}</span>
                                @endif
                            </div>
                        </div>


                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Відправити</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop


