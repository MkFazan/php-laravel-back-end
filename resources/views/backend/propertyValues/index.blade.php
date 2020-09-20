@extends('adminlte::page')

@section('title', 'PropertyValues')

@section('content_header')
    <h1>Значення</h1>
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
                                    aria-sort="descending">Властивість
                                </th>
                                <th class="sorting_desc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Rendering engine: activate to sort column ascending"
                                    aria-sort="descending">Значення UA
                                </th>
                                <th class="sorting_desc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Rendering engine: activate to sort column ascending"
                                    aria-sort="descending">Значення RU
                                </th>
                                <th class="text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Engine version: activate to sort column ascending">Статус
                                </th>
                                <th class="text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="2"
                                    aria-label="CSS grade: activate to sort column ascending">
                                </th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($propertyValues as $propertyValue)
                                <tr role="row" class="odd">
                                    <td><a href="{{route('properties.show', $propertyValue->property->id)}}">{{$propertyValue->property->title_ua}}/{{$propertyValue->property->title_ru}}</a></td>
                                    <td><a href="{{route('propertyValues.show', $propertyValue->id)}}">{{$propertyValue->value_ua}}</a></td>
                                    <td><a href="{{route('propertyValues.show', $propertyValue->id)}}">{{$propertyValue->value_ru}}</a></td>
                                    <td class="text-center" >{{$propertyValue->status}}</td>
                                    <td class="text-center align-middle"><a  class="btn btn-primary" href="{{route('propertyValues.edit', $propertyValue->id)}}">Редагувати</a></td>
                                    <td class="text-center align-middle">
                                        <form class="inline" method="POST" action="{{route('propertyValues.destroy', $propertyValue->id)}}">
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
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing {{$paginate['from']}} to {{$paginate['to']}} of {{$paginate['total']}} entries
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        {{ $propertyValues->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
@section('js')
    <script>
        function myConfirm(el) {
            let isConfirm=confirm(" Ви впевненні, що хочете видалити значення?");
            if(isConfirm){
                el.parentElement.submit();
            }
        }
    </script>

@stop
