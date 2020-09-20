@extends('adminlte::page')

@section('title', 'Replaces')

@section('content_header')
    <h1>Гарантія замін</h1>
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
                                    aria-sort="descending">Title
                                <th class="sorting_desc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Rendering engine: activate to sort column ascending"
                                    aria-sort="descending">header
                                <th class="sorting_desc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Rendering engine: activate to sort column ascending"
                                    aria-sort="descending">description
                                <th class="sorting_desc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Rendering engine: activate to sort column ascending"
                                    aria-sort="descending">Зображення
                                <th class="sorting_desc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Rendering engine: activate to sort column ascending"
                                    aria-sort="descending">Статус
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="2"
                                    aria-label="CSS grade: activate to sort column ascending">
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($replaces as $replace)
                                <tr role="row" class="odd">
                                    <td class="sorting_1" tabindex="0">{{$replace->title_ua}}/{{$replace->title_ru}}</td>
                                    <td class="sorting_1" tabindex="0">{{$replace->header_ua}}/{{$replace->header_ru}}</td>
                                    <td class="sorting_1" tabindex="0">{{$replace->description_ua}}/{{$replace->description_ru}}</td>
                                    <td><img width="100" height="100" src="{{asset('storage/' . $replace->path)}}"></td>
                                    <td>{{$replace->status}}</td>
                                    <td><a href="{{route('replaces.edit', $replace->id)}}">Змінити</a></td>
                                    <td class="text-center">
                                        <form class="inline" method="POST"
                                              action="{{route('replaces.destroy', $replace->id)}}">
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
                            <tfoot>
                            <tr>
                                <th rowspan="1" colspan="1">Title</th>
                                <th rowspan="1" colspan="1">header</th>
                                <th rowspan="1" colspan="1">description</th>
                                <th rowspan="1" colspan="1">Зображення</th>
                                <th rowspan="1" colspan="1">Статус</th>
                                <th rowspan="1" colspan="2"></th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing {{$paginate['from']}} to {{$paginate['to']}} of {{$paginate['total']}} entries
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        {{ $replaces->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
@section('js')
    <script>
        function myConfirm(el) {
            let isConfirm = confirm("Ви впевнені що хочете видалити інформацію?!");
            if (isConfirm) {
                el.parentElement.submit();
            }
        }
    </script>

@stop
