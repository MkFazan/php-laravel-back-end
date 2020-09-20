@extends('adminlte::page')

@section('title', 'Categories')

@section('content_header')
    <h1>Категорії</h1>
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
                                <th class="sorting_desc text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Rendering engine: activate to sort column ascending"
                                    aria-sort="descending">Категорія UA|Категорія RU
                                </th>

                                <th class="sorting_desc text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Rendering engine: activate to sort column ascending"
                                    aria-sort="descending">Під категорія UA|Під категорія RU
                                </th>

                                <th class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Engine version: activate to sort column ascending">Статус
                                </th>
                                <th class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="2"
                                    aria-label="CSS grade: activate to sort column ascending">
                                </th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($categories as $category)
                                <tr role="row" class="odd">
                                    <td class="align-middle"><a href="{{route('categories.show', $category->id)}}">{{$category->title_ua}}|{{$category->title_ru}}</a></td>
                                    <td class="align-middle">
                                       <ul>
                                           @foreach($category->children as $children)
                                               <li><a href="{{route('categories.show', $children->id)}}">{{$children->title_ru}}|{{$children->title_ru}}</a></li>
                                           @endforeach
                                       </ul>
                                    </td>

                                    <td class="text-center align-middle">{{$category->status}}</td>
                                    <td class="text-center align-middle"><a  class="btn btn-primary" href="{{route('categories.edit', $category->id)}}">Редагувати</a></td>
                                    <td class="text-center align-middle">
                                        <form class="inline" method="POST" action="{{route('categories.destroy', $category->id)}}">
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
                        <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Показано {{$paginate['from']}} - {{$paginate['to']}} із {{$paginate['total']}} записів
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        {{ $categories->links() }}
                    </div>
                </div>
                <br>
                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <a href="{{route('categories.create')}}" class="btn btn-primary">Створити</a>
                    </div>
                        <br>
                        <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid"
                               aria-describedby="example2_info">
                            <thead>
                                <tr>
                                    <th class="text-center">Категорія UA</th>
                                    <th class="text-center">Категорія RU</th>
                                    <th class="text-center">Статус</th>
                                    <th class="text-center" colspan="2"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($categories as $category)
                                        <tr>
                                            <td class="text-left" >{{$category->title_ua ?? '' }}</td>
                                            <td class="text-left" >{{$category->title_ru ?? '' }}</td>
                                            <td class="text-center align-middle">{{$category->status}}</td>
                                            <td class="text-center">
                                                <a class="btn btn-primary" href="{{ route('categories.edit', $category) }}">Редагувати</a>
                                            </td>
                                            <td class="text-center">
                                            <form class="inline" method="POST" action="{{route('categories.destroy', $category->id)}}">
                                                @method('DELETE')
                                                @csrf
                                                <button type="button" onclick="myConfirm(this)" class="btn btn-danger btn-xs">Видалити</button>
                                            </form>
                                            </td>
                                         </tr>
                                        @isset($category->children)
                                            @include('backend.categories._categories',  [
                                                    'categories'=> $category->children,
                                                    'delimiter'=>' - '.$delimiter,
                                                    'tr'=>true
                                                    ])
                                        @endisset

                                    @empty
                                         <tr>
                                            <td colspan="2">
                                                 <h1 class="text-center">Категорії не має</h1>
                                            </td>
                                         </tr>
                                @endforelse


@stop
@section('js')
<script>
    function myConfirm(el) {
        let isConfirm=confirm("При видаленні категорії всі її підкатегорії буде видалено. Ви впевненні, що хочете видалити категорію?");
        if(isConfirm){
            el.parentElement.submit();
        }
    }
</script>

@stop
