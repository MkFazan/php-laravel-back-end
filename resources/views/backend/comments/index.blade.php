@extends('adminlte::page')

@section('title', 'Comments')

@section('content_header')
    <h1>Список коментарів</h1>

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
                                    aria-sort="descending">Email
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Message
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending">Stars
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Engine version: activate to sort column ascending">Status
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Engine version: activate to sort column ascending">Approval
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Engine version: activate to sort column ascending">Is_buy
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="2"
                                    aria-label="CSS grade: activate to sort column ascending">Action
                                </th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($comments as $comment)
                                <tr role="row" class="odd">
                                    <td class="sorting_1" tabindex="0">{{$comment->email}}</td>
                                    <td>{{$comment->message}}</td>
                                    <td>{{$comment->stars}}</td>
                                    <td>{{$comment->status ? "Активний" : "Неактивний"}}</td>
                                    <td>{{$comment->approve ? "Активний" : "Неактивний"}}</td>
                                    <td>{{$comment->is_buy ? "Активний" : "Неактивний"}}</td>
                                    <td><a href="{{route('comments.edit', $comment->id)}}">Edit</a></td>
                                    <td class="text-center">
                                        <form class="inline" method="POST"
                                              action="{{route('comments.destroy', $comment->id)}}">
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
                                <th rowspan="1" colspan="1">Email</th>
                                <th rowspan="1" colspan="1">Message</th>
                                <th rowspan="1" colspan="1">Stars</th>
                                <th rowspan="1" colspan="1">Status</th>
                                <th rowspan="1" colspan="1">Approve</th>
                                <th rowspan="1" colspan="1">Is_buy</th>
                                <th rowspan="1" colspan="2">Action</th>
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
                        {{ $comments->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
@section('js')
    <script>
        function myConfirm(el) {
            let isConfirm = confirm("Ви впевнені що хочете видалити коментар!?");
            if (isConfirm) {
                el.parentElement.submit();
            }
        }
    </script>

@stop
