@extends('adminlte::page')

@section('title', 'Subscribers')

@section('content_header')
    <h1>Список підписників</h1>

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
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending">Status
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="2"
                                    aria-label="CSS grade: activate to sort column ascending">Action
                                </th>
                            </tr>
                                </thead>
                            <tbody>
                            @foreach($subscribers as $subscriber)
                                <tr role="row" class="odd">
                                    <td><a href="{{route('subscribers.show', $subscriber->id)}}">{{$subscriber->email}}</a></td>
                                    <td>{{$subscriber->status ? "Активний" : "Неактивний"}}</td>
                                    <td><a href="{{route('subscribers.edit', $subscriber->id)}}">Edit</a></td>
                                    <td>
                                            <form class="inline" method="POST" action="{{route('subscribers.destroy', $subscriber->id)}}">
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
                                <th rowspan="1" colspan="1">Status</th>
                                <th rowspan="1" colspan="2">Action</th>
                            </tr>
                            </tfoot>
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
                        {{ $subscribers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
@section('js')
    <script>
        function myConfirm(el) {
            let isConfirm = confirm("Ви впевнені що хочете видалити інформацію про підписника?!");
            if (isConfirm) {
                el.parentElement.submit();
            }
        }
    </script>

@stop
