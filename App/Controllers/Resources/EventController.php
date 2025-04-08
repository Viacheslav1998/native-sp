<?php

namespace App\Controllers\Resources;

use App\Models\EventModel;

class EventController extends \Core\Controller
{
    public function addEvent()
    {
        $event = new EventModel();
        $event->getEvents();
    }
}
