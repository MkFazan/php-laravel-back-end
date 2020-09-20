@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
    <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
            <thead>
            <tr>
                <th class="text-center">Питання</th>
                <th class="text-center">Відповідь</th>
                <th class="text-center">Status</th>
                <th class="text-center" colspan="2">Action</th>
            </tr>
            </thead>
            <tbody>
{{--             @foreach($questionCategories as $questionCategory)--}}
                <td class="text-center align-middle" colspan="5">{{$questionAnswer->questionCategories->title_ua}}/{{$questionAnswer->questionCategories->title_ru}}</td>
                <tr role="row" class="odd">
                    @foreach($questionAnswer->questionCategories->answer as $questionAnswer)
                        <tr role="row" class="odd" >
                            <td class="text-center align-middle" >
                                <label  class=" align-middle" for="question_ru">Question_UA</label>
                                <textarea style="display: block; width: 100%;" name="" id="form-control" cols="30" rows="4" readonly>{{$questionAnswer->question_ua}}</textarea>
                                <label for="question_ru">Question_RU</label>
                                <textarea style="display: block; width: 100%;" name="" id="form-control" cols="30" rows="4">{{$questionAnswer->question_ru}}</textarea>
                            </td>
                            <td class="text-center align-middle">
                                <label   for="answer_ua">Answer_UA</label>
                                <textarea  style="display: block; width: 100%;" name="" id="form-control" cols="30" rows="4" readonly>{{$questionAnswer->answer_ua}}</textarea>
                                <label   for="answer_ru">Answer_RU</label>
                                <textarea  style="display: block; width: 100%;" name="" id="form-control" cols="30" rows="4" readonly>{{$questionAnswer->answer_ru}}</textarea>
                            </td>
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
                </tr>
                <tr role="row" class="odd">
                    <td class="text-center align-middle" colspan="5"><img width="100" height="100" src="{{asset('storage/' . $questionAnswer->questionCategories->path)}}"></td>
                </tr>
{{--            @endforeach--}}
            </tbody>
    </table>
@stop

