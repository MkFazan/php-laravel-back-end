@extends('adminlte::page')

@section('title', 'Властивості')

@section('content_header')
    <h1>Властивості</h1>
    @include('backend.components.notifications')
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid"
                               aria-describedby="example2_info">
                            <thead>
                            <tr role="row">
                                <th class="sorting_desc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Rendering engine: activate to sort column ascending"
                                    aria-sort="descending">Заголовок UA
                                </th>
                                <th class="sorting_desc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Rendering engine: activate to sort column ascending"
                                    aria-sort="descending">Заголовок RU
                                </th>
                                <th class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Rendering engine: activate to sort column ascending"
                                    aria-sort="descending">Значення
                                </th>
                                <th class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Engine version: activate to sort column ascending">Статус
                                </th>
                                <th class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="2"
                                    aria-label="CSS grade: activate to sort column ascending">
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($properties as $property)
                                <tr role="row" class="odd">
                                    <td>
                                        <a href="{{route('properties.show', $property->id)}}">{{$property->title_ua}}</a>
                                    </td>
                                    <td>
                                        <a href="{{route('properties.show', $property->id)}}">{{$property->title_ru}}</a>
                                    </td>
                                    <td>
                                        <ul>
                                            @foreach($property->propertyValues as $propertyValues)
                                                <li>
                                                    <a href="{{route('propertyValues.show', $propertyValues->id)}}">{{$propertyValues->value_ua}}/{{$propertyValues->value_ru}}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td class="text-center">{{$property->status}}</td>
                                    <td class="text-center align-middle" ><a class="btn btn-primary" href="{{route('properties.edit', $property->id)}}">Редагувати</a></td>
                                    <td class="text-center">
                                        <form class="inline" method="POST"
                                              action="{{route('properties.destroy', $property->id)}}">
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" onclick="myConfirm(this)"
                                                    class="btn btn-danger btn-xs">Видалити
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">
                            Showing {{$paginate['from']}} to {{$paginate['to']}} of {{$paginate['total']}} entries
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        {{ $properties->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
@section('js')
    <script>
        function myConfirm(el) {
            let isConfirm = confirm("Ви впевненні, що хочете видалити дану властивість? Видаливши значення будуть видалені всі підпорядковані значення!");
            if (isConfirm) {
                el.parentElement.submit();
            }
        }
    </script>

@stop
