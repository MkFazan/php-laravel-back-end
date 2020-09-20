@extends('adminlte::page')

@section('title', 'Створити категорію')

@section('content_header')
    <h1>Створити категорію</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Додати нову категорію</h3>
                    </div>
                    <form role="form" id="createUserForm" method="post" action="{{route('categories.store')}}">
                        @csrf
                        @include('backend.categories._form')
                </form>
            </div>
            </div>
        </div>
    </div>

@stop

