<?php

namespace App\Controllers\Resources;

use App\Models\EventModel;

class EventController extends \Core\Controller
{
    public function getEvents()
    {
        $event = new EventModel();
        $events = $event->fetchAllEvents();
    }
}
