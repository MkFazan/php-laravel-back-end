@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Продукт</h1>

    @include('backend.components.notifications')
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{$product->title_ua}}/{{$product->title_ua}}</h3>
        </div>
        <div class="card-body">
            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                            <thead>
                                <tr role="row">
                                    <th>
                                        Ціна
                                    </th>
                                    <th>
                                        Стара ціна
                                    </th>
                                    <th>
                                        Статус
                                    </th>
                                    <th colspan="2"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr role="row" class="odd">
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->old_price}}</td>
                                    <td>{{$product->status ? "Активна" : "Заблокована"}}</td>
                                    <td><a href="{{route('products.edit', $product->id)}}">Edit</a></td>
                                    <td>
                                        <form class="inline" method="POST" action="{{route('products.destroy', $product->id)}}">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Опис</h3>
        </div>
        <div class="card-body">
            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered table-hover dataTable dtr-inline">
                            <thead>
                            <tr role="row">
                                <th>
                                    Опис UA
                                </th>
                                <th>
                                    Опис RU
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr role="row" class="odd">
                                <td>{{$product->description_ua}}</td>
                                <td>{{$product->description_ru}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Meta дані</h3>
        </div>
        <div class="card-body">
            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid">
                            <thead>
                            <tr role="row">
                                <th>
                                    Meta Заголовок
                                </th>
                                <th>
                                    Meta Опис
                                </th>
                                <th>
                                    Meta Ключові слова
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr role="row" class="odd">
                                <td>{{$product->meta_title}}</td>
                                <td>{{$product->meta_description}}</td>
                                <td>{{$product->meta_keywords}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col"><h3 class="card-title">Категорії</h3></div>
            </div>
        </div>
        <div class="card-body">
            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered table-hover dataTable dtr-inline">
                            <thead>
                            <tr role="row">
                                <th>UA</th>
                                <th>RU</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($product->categories as $category)
                                <tr role="row" class="odd">
                                    <td>{{$category->title_ua}}</td>
                                    <td>{{$category->title_ru}}</td>
                                    <td><a href="{{route('products.remove.category', ['product' => $product, 'category' => $category])}}" class="btn-danger btn-xs">Remove</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col"><h3 class="card-title">Властивості</h3></div>
            </div>
        </div>
        <div class="card-body">
            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered table-hover dataTable dtr-inline">
                            <thead>
                            <tr role="row">
                                <th>UA</th>
                                <th>RU</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($product->properties as $property)
                                <tr role="row" class="odd">
                                    <td>
                                        {{$property->title_ua}}
                                    </td>
                                    <td>
                                        {{$property->title_ru}}
                                    </td>
                                    <td><a href="{{route('products.remove.property', ['product' => $product, 'property' => $property])}}" class="btn-danger btn-xs">Remove</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col"><h3 class="card-title">Зображення</h3></div>
                <div class="col-auto"><a href="{{route('products.form.add.images', $product)}}" class="btn btn-primary">Додати зображення</a></div>
            </div>
        </div>
        <div class="card-body">
            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered table-hover dataTable dtr-inline">
                            <thead>
                            <tr role="row">
                                <th>Зображення</th>
                                <th>Статус</th>
                                <th>Головна</th>
                                <th colspan="2"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($product->images as $image)
                                <tr role="row" class="odd">
                                    <td><img width="100" height="100" src="{{asset('storage/' . $image->path)}}"></td>
                                    <td>{{$image->status}}</td>
                                    <td>{{$image->main}}</td>
                                    <td><a href="{{route('images.edit', $image->id)}}">Edit</a></td>
                                    <td><a href="{{route('products.remove.image', ['product' => $product, 'image' => $image])}}" class="btn-danger btn-xs">Remove</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

