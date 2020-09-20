@extends('adminlte::page')

@section('title', 'QuestionCategory')

@section('content_header')
    <h1>Список категорій</h1>

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
                                <th class="sorting_desc text-center align-middle" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Rendering engine: activate to sort column ascending"
                                    aria-sort="descending">Title
                                </th>
                                <th class="sorting text-center align-middle" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Image
                                </th>
                                <th class="sorting text-center align-middle" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending">Status
                                </th>
                                <th class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="2"
                                    aria-label="CSS grade: activate to sort column ascending">Action
                                </th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($questionCategories as $questionCategory)
                                <tr role="row" class="odd">
                                    <td class="text-left align-middle" >
                                        <a href="{{route('questionCategories.show', $questionCategory->id)}}">{{$questionCategory->title_ua}}/{{$questionCategory->title_ru}}</a>
                                    </td>

                                    <td class="text-center align-middle"><img width="100" height="100" src="{{asset('storage/' . $questionCategory->path)}}"></td>

                                    <td class="text-center align-middle">{{$questionCategory->status}}</td>
                                    <td class="text-center align-middle" ><a class="btn btn-primary" href="{{route('questionCategories.edit', $questionCategory->id)}}">Редагувати</a></td>
                                    <td class="text-center align-middle">
                                        <form class="inline" method="POST" enctype="multipart/form-data" action="{{route('questionCategories.destroy', $questionCategory->id)}}">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit"  class="btn btn-danger btn-xs">Видалити</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th class="text-center" rowspan="1" colspan="1">Title</th>
                                <th class="text-center" rowspan="1" colspan="1">Image</th>
                                <th class="text-center" rowspan="1" colspan="1">Status</th>
                                <th class="text-center" rowspan="1" colspan="2">Action</th>
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
                        {{ $questionCategories->links() }}
                    </div>
                </div>
            </div>
            <br>
            <div class="row ">
                <a href="{{route('questionCategories.create')}}" class="btn btn-primary">Створити</a>
            </div>
        </div>

    </div>

@stop
