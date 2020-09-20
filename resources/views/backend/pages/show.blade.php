@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>{{$page->title_ua}}/{{$page->title_ru}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{$page->header_ua}}/{{$page->header_ru}}</h3>
        </div>
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
                                    aria-sort="descending">Slug
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending">Статус
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Is Sidebar
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Is Header
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Is Footer
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="2"
                                    aria-label="CSS grade: activate to sort column ascending">
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr role="row" class="odd">
                                    <td class="sorting_1" tabindex="0"><a href="{{route('pages.show', $page->id)}}">{{$page->slug}}</a></td>
                                    <td>{{$page->status ? "Активна" : "Заблокована"}}</td>
                                    <td>{{$page->is_sidebar}}</td>
                                    <td>{{$page->is_header}}</td>
                                    <td>{{$page->is_footer}}</td>
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Опис</h3>
        </div>
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
                                    aria-sort="descending">Опис UA
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending">Опис RU
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr role="row" class="odd">
                                <td>{{$page->description_ua}}</td>
                                <td>{{$page->description_ru}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Meta дані</h3>
        </div>
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
                                    aria-sort="descending">Meta Заголовок
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending">Meta Опис
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Meta Ключові слова
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr role="row" class="odd">
                                <td>{{$page->meta_title}}</td>
                                <td>{{$page->meta_description}}</td>
                                <td>{{$page->meta_keywords}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

