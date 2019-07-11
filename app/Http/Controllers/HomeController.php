<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;

class HomeController extends Controller
{

    public function index()
    {
        return view('home');
    }

    public function contact(){
        return view('contact');
    }

    public function calendar(){
        $events = [];
        $events[] = Calendar::event(
            "Valentine's Day", //event title
            true, //full day event?
            new \DateTime('now'), //start time (you can also use Carbon instead of DateTime)
            new \DateTime("+1 day"), //end time (you can also use Carbon instead of DateTime)
            'stringEventId' //optionally, you can specify an event ID
        );

        $calendar = Calendar::addEvents($events)->setOptions([ //set fullcalendar options
            'firstDay' => 1
        ])->setCallbacks([ //set fullcalendar callback options (will not be JSON encoded)
        ]);

        return view('calendar', compact('calendar'));
    }
}
