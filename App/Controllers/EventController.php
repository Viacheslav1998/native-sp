<?php

namespace App\Controllers;
use App\Helpers\Request;
use App\Helpers\Response;
use App\Models\EventModel;

class EventController extends \Core\Controller
{

    private EventModel $eventModel;

    public function __construct()
    {
        $this->getEvent = new EventModel();
    }

    /**
     * render view events
     */
    public function index()
    {
        return $this->render('Event', ['title' => 'События']);
    }

    /**
     * getData
     */
    public function getEvent($id): void
    {
        try {
            $event = $this->eventModel->getItem($id);

            if(!$event) {
                Response::error('Событие не найдено!', 404);
            }

            Response::success($event);

        } catch (\Exception $e) {
            Response::error('Серверная ошибка', 500);
        }
    }

    public function getEvents(): array
    {
        return true;
    }


    /**
     * events filter
     * town | events [night, regular ...]
     */
    public function sortEvent(string $town, string $event = 'regular'): array
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
