<?php

namespace App;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use MaddHatter\LaravelFullcalendar\Event as ME;

class Event extends Model implements ME
{
    protected $casts = [
        'start' => 'datetime',
        'end' => 'datetime'
    ];

    //
    public function getTitle()
    {
        return $this->title;
    }

    public function isAllDay()
    {
        return (bool)$this->allDay;
    }

    public function getStart()
    {
        return $this->start;
    }

    public function getEnd()
    {
        return $this->end;
    }
}
