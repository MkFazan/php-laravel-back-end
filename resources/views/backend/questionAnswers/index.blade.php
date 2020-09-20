@extends('adminlte::page')

@section('title', 'Питання і відповіді')

@section('content_header')
    <h1>Список питань і відповідей</h1>

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
                                <th class="sorting text-center align-middle" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Питання
                                </th>
                                <th class="sorting text-center align-middle" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Відповідь
                                </th>
                                <th class="sorting_desc text-center align-middle" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Rendering engine: activate to sort column ascending"
                                    aria-sort="descending">Категорія
                                </th>
                                <th class="sorting text-center align-middle" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending">Status
                                </th>
                                <th class="sorting text-center align-middle" tabindex="0" aria-controls="example2" rowspan="1" colspan="2"
                                    aria-label="CSS grade: activate to sort column ascending">Action
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($questionAnswers as $questionAnswer)
                                    <tr role="row">
                                        <td class="text-center align-middle" >
                                            <label  class=" align-middle" for="question_ru">Question_UA</label>
                                            <textarea style="display: block; width: 100%;" name="" id="form-control" cols="30" rows="4" readonly>{{$questionAnswer->question_ua}}</textarea>
                                            <label for="question_ru">Question_RU</label>
                                            <textarea style="display: block; width: 100%;" name="" id="form-control" cols="30" rows="4" readonly>{{$questionAnswer->question_ru}}</textarea>
                                        </td>
                                        <td class="text-center align-middle">
                                            <label   for="answer_ua">Answer_UA</label>
                                            <textarea  style="display: block; width: 100%;" name="" id="form-control" cols="30" rows="4" readonly>{{$questionAnswer->answer_ua}}</textarea>
                                            <label   for="answer_ru">Answer_RU</label>
                                            <textarea  style="display: block; width: 100%;" name="" id="form-control" cols="30" rows="4" readonly>{{$questionAnswer->answer_ru}}</textarea>
                                        </td>
                                        <td class="text-center align-middle" ><a style="display: block" href="{{route('questionAnswers.show', $questionAnswer->id)}}">{{$questionAnswer->questionCategories->title_ua}}/{{$questionAnswer->questionCategories->title_ru}}</a></td>
                                        <td class="text-center align-middle">{{$questionAnswer->status}}</td>
                                        <td class="text-center align-middle"><a  class="btn btn-primary" href="{{route('questionAnswers.edit', $questionAnswer->id)}}">Редагувати</a></td>
                                        <td class="text-center align-middle">
                                            <form class="inline" method="POST" action="{{route('questionAnswers.destroy', $questionAnswer->id)}}">
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

                                <th  class="text-center align-middle" rowspan="1" colspan="1">Питання</th>
                                <th class="text-center align-middle" rowspan="1" colspan="1">Відповідь</th>
                                <th class="text-center align-middle" rowspan="1" colspan="1">Категорія</th>
                                <th class="text-center align-middle" rowspan="1" colspan="1">Status</th>
                                <th class="text-center align-middle" rowspan="1" colspan="2">Action</th>
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
                        {{ $questionAnswers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
