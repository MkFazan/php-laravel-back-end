@extends('adminlte::page')

@section('title', 'Панель')

@section('content_header')
    <h1>Панель</h1>
@stop

@section('content')
    <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid"
           aria-describedby="example2_info">
        <thead>
        <tr>
            <th class="text-center">Заголовок UA</th>
            <th class="text-center">Заголовок RU</th>
            <th class="text-center">Значення</th>
            <th class="text-center">Статус</th>
            <th class="text-center" colspan="2"></th>
        </tr>
        </thead>
        <tbody>

        <tr>
            <td>  <a href="{{route('properties.show', $property->id)}}">{{$property->title_ua}}</a></td>
            <td> <a href="{{route('properties.show', $property->id)}}">{{$property->title_ru}}</a></td>
            <td>
                <ul>
                    @foreach($property->propertyValues as $propertyValues)
                        <li>
                            <a href="{{route('propertyValues.show', $propertyValues->id)}}">{{$propertyValues->value_ua}}/{{$propertyValues->value_ru}}</a>
                        </li>
                    @endforeach
                </ul>
            </td>
            <td class="text-center align-middle">{{$property->status}}</td>
            <td class="text-center">
                <a class="btn btn-primary" href="{{ route('properties.edit', $property) }}">Редагувати</a>
            </td>

            <td class=" text-center align-middle" >
                <form class="inline" method="POST" action="{{route('properties.destroy', $property->id)}}">
                    @method('DELETE')
                    @csrf
                    <button type="button" onclick="myConfirm(this)" class="btn btn-danger btn-xs">Видалити</button>
                </form>
            </td>
        </tr>
@stop

        @section('js')
            <script>
                function myConfirm(el) {
                    let isConfirm=confirm("Ви впевненні, що хочете видалити властивість? Ви видалите всі значення даної властивості");
                    if(isConfirm){
                        el.parentElement.submit();
                    }
                }
            </script>

@stop


