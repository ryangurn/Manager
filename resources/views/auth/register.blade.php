@extends('layouts.layout')

@section('title', 'Register')

@section('sidebar-about')
    @parent

    @section('sidebar-about-title', 'Register')
    @section('sidebar-about-content')
        Please register for an account to access the {{ config('app.name')  }} Manager.
    @endsection
@stop

@section('content-main')
    @section('section-title', 'Register')
    @section('section-action', route('register'))
    @include("auth._partials.register-content")
@endsection
