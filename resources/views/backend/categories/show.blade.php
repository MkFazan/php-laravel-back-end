@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Показати категорію</h1>
@stop

@section('content')


<table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid"
       aria-describedby="example2_info">
    <thead>
    <tr>
        <th class="text-center">Категорія UA</th>
        <th class="text-center">Категорія RU</th>
        <th class="text-center">Статус</th>
        <th class="text-center" colspan="2"></th>
    </tr>
    </thead>
    <tbody>

        <tr>
            <td class="text-left" >{{$category->title_ua ?? '' }}</td>
            <td class="text-left" >{{$category->title_ru ?? '' }}</td>
            <td class="text-center align-middle">{{$category->status}}</td>
            <td class="text-center">
                <a class="btn btn-primary" href="{{ route('categories.edit', $category) }}">Редагувати</a>
            </td>

            <td class=" text-center align-middle" >
                <form class="inline" method="POST" action="{{route('categories.destroy', $category->id)}}">
                    @method('DELETE')
                    @csrf
                    <button type="button" onclick="myConfirm(this)" class="btn btn-danger btn-xs">Видалити</button>
                </form>
            </td>
        </tr>
        @isset($category->children)
            @include('backend.categories._categories', [
                    'categories'=> $category->children,
                    'delimiter'=>' - '.$delimiter ?? '',
                    'tr'=>true
                    ])
        @endisset



@stop

@section('js')
    <script>
        function myConfirm(el) {
            let isConfirm=confirm("При видаленні категорії всі її підкатегорії буде видалено. Ви впевненні, що хочете видалити категорію?");
            if(isConfirm){
                el.parentElement.submit();
            }
        }
    </script>
@stop

