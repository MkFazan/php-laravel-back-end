@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1></h1>
@stop

@section('content')
    <h1>Показати категорію питання</h1>


    <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid"
           aria-describedby="example2_info">
        <thead>
        <tr>
            <th class="text-center">title</th>
            <th class="text-center">Image</th>
            <th class="text-center">Status</th>
            <th class="text-center" colspan="2">Action</th>
        </tr>
        </thead>
        <tbody>

        <tr>
            <td class="text-left" >{{$questionCategory->title_ua}}/{{$questionCategory->title_ru}}</td>
            <td><img width="100" height="100" src="{{asset('storage/' . $questionCategory->path)}}"></td>
            <td class="text-center align-middle">{{$questionCategory->status}}</td>
            <td class="text-center align-middle" ><a class="btn btn-primary" href="{{route('questionCategories.edit', $questionCategory->id)}}">Редагувати</a></td>
            <td class="text-center">
                <form class="inline" method="POST"
                      action="{{route('questionCategories.destroy',$questionCategory->id)}}">
                    @method('DELETE')
                    @csrf
                    <button type="submit"
                            class="btn btn-danger btn-xs">Видалити
                    </button>
                </form>
            </td>
        </tr>
@stop
