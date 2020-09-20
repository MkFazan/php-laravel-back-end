@extends('adminlte::page')

@section('title', 'Product')

@section('content_header')
    <h1>Продукт</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-12">
                    <a href="{{route('products.create')}}" class="btn btn-primary">Створити</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example2" class="table table-bordered table-hover dataTable dtr-inline js-products-table" role="grid">
                            <thead>
                            <tr role="row">
                                <th class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">
                                    ID
                                </th>
                                <th class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">
                                    Назва продукту
                                </th>
                                <th class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">
                                    Категорії
                                </th>
                                <th class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">
                                    Статус
                                </th>
                                <th class="text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="2"></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($products as $product)
                                <tr role="row">
                                    <td><b>#{{$product->id}}</b></td>
                                    <td>
                                        <a href="{{route('products.show', $product->id)}}">{{$product->title_ua}}</a>
                                        <br>
                                        <a href="{{route('products.show', $product->id)}}">{{$product->title_ru}}</a>
                                    </td>
                                    <td>
                                        <ul>
                                            @foreach($product->categories as $category)
                                                <li>{{$category->title_ua}}/{{$category->title_ru}}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>{{$product->status ? "Активний" : "Не активний"}}</td>
                                    <td class="text-center align-middle"><a  class="btn btn-primary" href="{{route('products.show', $product->id)}}">Повна інформація</a></td>
                                    <td class="text-center align-middle">
                                        <form class="inline" method="POST" enctype="multipart/form-data"  action="{{route('products.destroy', $product->id)}}">
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" onclick="myConfirm(this)" class="btn btn-danger btn-xs">Видалити</button>
                                        </form>
                                    </td>
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

@section('js')
<script>
    function myConfirm(el) {
        let isConfirm=confirm("При видаленні категорії всі її підкатегорії буде видалено. Ви впевненні, що хочете видалити категорію?");
        if(isConfirm){
            el.parentElement.submit();
        }
    }

    $(document).ready(function() {
        // $('.js-products-table').DataTable();
    });

</script>

@stop
