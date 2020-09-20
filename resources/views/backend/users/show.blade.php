@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <h1>Show</h1>
    <h3>{{$user->email}}</h3>
@stop

