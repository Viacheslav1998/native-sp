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
}
