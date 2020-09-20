@extends('adminlte::page')

@section('title', 'Images')

@section('content_header')
    <h1>Зображення</h1>
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
                                    aria-sort="descending">Зображення
                                <th class="sorting_desc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Rendering engine: activate to sort column ascending"
                                    aria-sort="descending">Головна
                                <th class="sorting_desc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Rendering engine: activate to sort column ascending"
                                    aria-sort="descending">Статус
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="2"
                                    aria-label="CSS grade: activate to sort column ascending">
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($images as $image)
                                <tr role="row" class="odd">
                                    <td><img width="100" height="100" src="{{asset('storage/' . $image->path)}}"></td>
                                    <td>{{$image->main}}</td>
                                    <td>{{$image->status}}</td>
                                    <td><a href="{{route('images.edit', $image->id)}}">Змінити</a></td>
                                    <td class="text-center">
                                        <form class="inline" method="POST"
                                              action="{{route('images.destroy', $image->id)}}">
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
                                <th rowspan="1" colspan="1">Зображення</th>
                                <th rowspan="1" colspan="1">Головна</th>
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
                        {{ $images->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
@section('js')
    <script>
        function myConfirm(el) {
            let isConfirm = confirm("Ви впевнені що хочете видалити зображення?!");
            if (isConfirm) {
                el.parentElement.submit();
            }
        }
    </script>

@stop
