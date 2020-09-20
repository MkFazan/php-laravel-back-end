@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Оновити дані користувача</h1>

    @include('backend.components.notifications')
@stop

@section('content')
    <form role="form" id="createUserForm" enctype="multipart/form-data" novalidate="novalidate" method="post" action="{{route('products.update', $product)}}">
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
                                <label for="title_ua">Заголовок UA</label>
                                <input type="text" name="title_ua" value="{{ old('title_ua', $product->title_ua) }}" class="form-control {{ $errors->has('title_ua') ? 'is-invalid' : '' }}" id="title_ua" placeholder="Enter title_ua" aria-describedby="title_ua-error" aria-invalid="true">
                                @if($errors->has('title_ua'))
                                    <span id="title_ua-error" class="error invalid-feedback">{{ $errors->first('title_ua') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Опис UA</label>
                                <textarea name="description_ua" class="form-control" rows="3" placeholder="Enter ...">{{old('description_ua', $product->description_ua)}}</textarea>
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
                                <input type="text" name="title_ru" value="{{ old('title_ru', $product->title_ru) }}" class="form-control {{ $errors->has('title_ru') ? 'is-invalid' : '' }}" id="title_ru" placeholder="Enter title_ru" aria-describedby="title_ru-error" aria-invalid="true">
                                @if($errors->has('title_ru'))
                                    <span id="title_ru-error" class="error invalid-feedback">{{ $errors->first('title_ru') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Опис RU</label>
                                <textarea name="description_ru" class="form-control" rows="3" placeholder="Enter ...">{{old('description_ru', $product->description_ru)}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Meta дані</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="meta_title">Meta Заголовок</label>
                                <input type="text" name="meta_title" value="{{ old('meta_title', $product->meta_title) }}" class="form-control {{ $errors->has('meta_title') ? 'is-invalid' : '' }}" id="meta_title" placeholder="Enter meta_title" aria-describedby="meta_title-error" aria-invalid="true">
                                @if($errors->has('meta_title'))
                                    <span id="meta_title-error" class="error invalid-feedback">{{ $errors->first('meta_title') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Meta Опис </label>
                                <textarea name="meta_description" class="form-control {{ $errors->has('meta_description') ? 'is-invalid' : '' }}" rows="3" placeholder="Enter ...">{{old('meta_description', $product->meta_description)}}</textarea>
                                @if($errors->has('meta_description'))
                                    <span id="title_ru-error" class="error invalid-feedback">{{ $errors->first('meta_description') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="meta_keywords">Meta Ключові слова</label>
                                <input type="text" name="meta_keywords" value="{{ old('meta_keywords', $product->meta_keywords) }}" class="form-control {{ $errors->has('meta_keywords') ? 'is-invalid' : '' }}" id="meta_keywords" placeholder="Enter meta_keywords" aria-describedby="meta_keywords-error" aria-invalid="true">
                                @if($errors->has('meta_keywords'))
                                    <span id="meta_keywords-error" class="error invalid-feedback">{{ $errors->first('meta_keywords') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Налаштування</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Категорія</label>
                                <select name="categories[]" class="form-control js-multiple-categories {{ $errors->has('categories') ? 'is-invalid' : '' }}" multiple="multiple" aria-describedby="categories-error">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{in_array($category->id, $product->categories->pluck('id')->toArray()) ? "selected" : ""}}>{{$category->title_ua}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('categories'))
                                    <span id="categories-error" class="error invalid-feedback">{{ $errors->first('categories') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Властивості</label>
                                <select name="properties[]" class="form-control js-multiple-properties {{ $errors->has('properties') ? 'is-invalid' : '' }}" multiple="multiple" aria-describedby="properties-error">
                                    @foreach($properties as $property)
                                        <option value="{{$property->id}}" {{in_array($property->id, $product->properties->pluck('id')->toArray()) ? "selected" : ""}}>{{$property->title_ua}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('properties'))
                                    <span id="properties-error" class="error invalid-feedback">{{ $errors->first('properties') }}</span>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label for="price">Ціна</label>
                                    <input type="number" name="price" value="{{ old('price', $product->price) }}" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" id="price" placeholder="Enter price" aria-describedby="price-error" aria-invalid="true">
                                    @if($errors->has('price'))
                                        <span id="price-error" class="error invalid-feedback">{{ $errors->first('price') }}</span>
                                    @endif
                                </div>

                                <div class="col-6">
                                    <label for="old_price">Стара ціна</label>
                                    <input type="number" name="old_price" value="{{ old('old_price', $product->old_price) }}" class="form-control {{ $errors->has('old_price') ? 'is-invalid' : '' }}" id="old_price" placeholder="Enter old price" aria-describedby="old_price-error" aria-invalid="true">
                                    @if($errors->has('old_price'))
                                        <span id="old_price-error" class="error invalid-feedback">{{ $errors->first('old_price') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <div class="custom-control custom-checkbox">
                                    <input type="hidden" name="status" value="0">
                                    <input type="checkbox" name="status" {{$product->status ? "checked" : ""}} value="1" class="custom-control-input {{ $errors->has('status') ? 'is-invalid' : '' }}" id="status" aria-describedby="status-error">
                                    <label class="custom-control-label" for="status">Статус</label>
                                </div>
                                @if($errors->has('status'))
                                    <span id="status-error" class="error invalid-feedback" style="display: inline;">{{ $errors->first('status') }}</span>
                                @endif
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Оновити</button>
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
        $(document).ready(function() {
            $('.js-multiple-properties').select2();
            $('.js-multiple-categories').select2();
        });


    </script>
@stop
