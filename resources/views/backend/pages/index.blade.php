@extends('adminlte::page')

@section('title', 'Pages')

@section('content_header')
    <h1>Список сторінок</h1>

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
                                    aria-sort="descending">Заголовок
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Slug
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending">Статус
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="2"
                                    aria-label="CSS grade: activate to sort column ascending">
                                </th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($pages as $page)
                                <tr role="row" class="odd">
                                    <td class="sorting_1" tabindex="0">{{$page->title_ua}}/{{$page->title_ru}}</td>
                                    <td><a href="{{route('pages.show', $page->id)}}">{{$page->slug}}</a></td>
                                    <td>{{$page->status ? "Активна" : "Заблокована"}}</td>
                                    <td colspan="{{$page->special ? 2 : 1}}"><a href="{{route('pages.edit', $page->id)}}">Edit</a></td>
                                    @if(!$page->special)
                                        <td>
                                            <form class="inline" method="POST" action="{{route('pages.destroy', $page->id)}}">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                                            </form>
                                        </td>
                                    @endif
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
                        {{ $pages->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
