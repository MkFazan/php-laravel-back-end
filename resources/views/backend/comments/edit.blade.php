@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Оновити дані коментаря</h1>

    @include('backend.components.notifications')
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Оновити коментар{{$comment->id}}</h3>
                    </div>
                    <form role="form" id="createUserForm" novalidate="novalidate" method="post" action="{{route('comments.update', $comment->id)}}">
                        @method('PUT')
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" value="{{ old('email', $comment->email) }}" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" placeholder="Enter email" aria-describedby="email-error" aria-invalid="true">
                                @if($errors->has('email'))
                                    <span id="email-error" class="error invalid-feedback">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Message</label>
                                <input name="message" value="{{ old('message', $comment->message) }}" class="form-control {{ $errors->has('message') ? 'is-invalid' : '' }}" id="message" placeholder="Enter message" aria-describedby="message-error" aria-invalid="true">
                                @if($errors->has('message'))
                                    <span id="message-error" class="error invalid-feedback">{{ $errors->first('message') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Stars</label>
                                <select name="stars" class="form-control">
                                    @for($i=1; $i<=5; $i++)
                                        <option {{$comment->stars == $i ? "selected" : ""}}>{{$i}}</option>
                                    @endfor
                                </select>
                                @if($errors->has('stars'))
                                    <span id="main-error" class="error invalid-feedback" style="display: inline;">{{ $errors->first('stars') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-0">
                                <div class="custom-control custom-checkbox">
                                    <input type="hidden" name="status" value="0">
                                    <input type="checkbox" name="status" value="1" {{$comment->status ? "checked" : ""}} class="custom-control-input {{ $errors->has('status') ? 'is-invalid' : '' }}" id="status" aria-describedby="status-error">
                                    <label class="custom-control-label" for="status">Статус</label>
                                </div>
                                @if($errors->has('status'))
                                    <span id="status-error" class="error invalid-feedback" style="display: inline;">{{ $errors->first('status') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-0">
                                <div class="custom-control custom-checkbox">
                                    <input type="hidden" name="approve" value="0">
                                    <input type="checkbox" name="approve" value="1" {{$comment->approve ? "checked" : ""}} class="custom-control-input {{ $errors->has('approve') ? 'is-invalid' : '' }}" id="approve" aria-describedby="approve-error">
                                    <label class="custom-control-label" for="approve">Approve</label>
                                </div>
                                @if($errors->has('approve'))
                                    <span id="approve-error" class="error invalid-feedback" style="display: inline;">{{ $errors->first('approve') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-0">
                                <div class="custom-control custom-checkbox">
                                    <input type="hidden" name="is_buy" value="0">
                                    <input type="checkbox" name="is_buy" value="1" {{$comment->is_buy ? "checked" : ""}} class="custom-control-input {{ $errors->has('is_buy') ? 'is-invalid' : '' }}" id="is_buy" aria-describedby="is_buy-error">
                                    <label class="custom-control-label" for="is_buy">Is_buy</label>
                                </div>
                                @if($errors->has('is_buy'))
                                    <span id="is_buy-error" class="error invalid-feedback" style="display: inline;">{{ $errors->first('is_buy') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

