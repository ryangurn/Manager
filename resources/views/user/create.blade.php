@extends('layouts.layout')

@section('title', 'User Create')

@section('sidebar-about')
    @parent

@section('sidebar-about-title', 'User Create')
@section('sidebar-about-content')
    Here you can easily create a new user and add them directly into the Manager system.
@endsection
@stop

@section('content-main')
    @section('section-title', 'Create User')
    @section('section-action', action('UserController@store'))
    @include("auth._partials.register-content")
@stop