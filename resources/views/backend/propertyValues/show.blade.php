@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid"
           aria-describedby="example2_info">
        <thead>
        <tr>
            <th class="text-center">Властивість</th>
            <th class="text-center">Значення UA</th>
            <th class="text-center">Значення RU</th>
            <th class="text-center">Статус</th>
            <th class="text-center" colspan="2"></th>
        </tr>
        </thead>
        <tbody>

        <tr>
            <td>
                <a href="{{route('properties.show', $propertyValue->property)}}">{{$propertyValue->property->title_ua}}
                            /{{$propertyValue->property->title_ru}}</a>
            </td>
            <td class="text-left">{{$propertyValue->value_ua ?? '' }}</td>
            <td class="text-left">{{$propertyValue->value_ru ?? '' }}</td>
            <td class="text-center align-middle">{{$propertyValue->status}}</td>
            <td class="text-center">
                <a class="btn btn-primary" href="{{ route('propertyValues.edit', $propertyValue) }}">Редагувати</a>
            </td>

            <td class=" text-center align-middle">
                <form class="inline" method="POST" action="{{route('propertyValues.destroy', $propertyValue->id)}}">
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
                    let isConfirm = confirm("Ви впевненні, що хочете видалити значення? Ви видалите всі значення даної властивості");
                    if (isConfirm) {
                        el.parentElement.submit();
                    }
                }
            </script>


@stop
