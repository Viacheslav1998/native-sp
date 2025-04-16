<?php

namespace App\Controllers\Resources;

use App\Models\EventModel;

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
