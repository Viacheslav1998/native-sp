<?php

namespace App\Controllers;

use App\Models\Event;

class EventResource extends \Core\Controller
{
    public function getEvents()
    {
        return true;
    }

    public function saveEvent()
    {
        echo "this is work a wonderfull - test message";
    }

    /**
     * events filter
     * town | events [night, regular ...]
     */
    public function sortEvent(string $town, string $event = 'regular')
    {

        // swith case ??? or or or

        if(!$town || !$event) {
            return getDefault();
        } 

        return getFilter($town, $event);

    }

    // 1 event id \ name \ filter \ country \  ...
    // sortEvent = Astana/[events]
    // filter universan = sortEvent / night/[events] ... 
}
