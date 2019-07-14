@extends('layouts.layout')

@section('title', 'Home')

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.min.css" integrity="sha256-9VgA72/TnFndEp685+regIGSD6voLveO2iDuWhqTY3g=" crossorigin="anonymous" />
@stop

@section('script')
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.min.js" integrity="sha256-4+rW6N5lf9nslJC6ut/ob7fCY2Y+VZj2Pw/2KdmQjR0=" crossorigin="anonymous"></script>
@stop

@section('sidebar-about')
    @parent

    @section('sidebar-about-title', 'Meetings')
    @section('sidebar-about-content')
        July meeting is canceled<br />
        5:30 PM EXECUTIVE BOARD<br />
        7 PM GENERAL MEMBERSHIP<br />
    @endsection
@stop

@section('content-main')
    @if(isset($calendar))
        {!! $calendar->calendar() !!}
        {!! $calendar->script() !!}
    @endif
    <br /><hr />
@stop