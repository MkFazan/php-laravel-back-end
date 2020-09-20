@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
    <h1>Список користувачів</h1>

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
                                    aria-sort="descending">Nickname
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Email
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending">Role
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Engine version: activate to sort column ascending">Status
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="2"
                                    aria-label="CSS grade: activate to sort column ascending">Action
                                </th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($users as $user)
                                <tr role="row" class="odd">
                                    <td class="sorting_1" tabindex="0">{{$user->nickname}}</td>
                                    <td><a href="{{route('users.show', $user->id)}}">{{$user->email}}</a></td>
                                    <td>{{$user->role->title}}</td>
                                    <td>{{$user->status ? "Активний" : "Заблокований"}}</td>
                                    <td><a href="{{route('users.edit', $user->id)}}">Edit</a></td>
                                    <td>
                                        @if(!$user->isAdmin())
                                            <form class="inline" method="POST" action="{{route('users.destroy', $user->id)}}">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th rowspan="1" colspan="1">Nickname</th>
                                <th rowspan="1" colspan="1">Email</th>
                                <th rowspan="1" colspan="1">Role</th>
                                <th rowspan="1" colspan="1">Status</th>
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
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
