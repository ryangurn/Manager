@extends('layouts.layout')

@section('title', 'Home')

@section('sidebar-about')
    @parent

    @section('sidebar-about-title', 'Meetings')
    @section('sidebar-about-content')
        July meeting is canceled<br />
        5:30 PM EXECUTIVE BOARD<br />
        7 PM GENERAL MEMBERSHIP<br />
    @endsection
@stop