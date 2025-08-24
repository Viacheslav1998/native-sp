<?php

namespace App\Controllers;
use App\Helpers\Request;
use App\Helpers\Response;
use App\Models\Event;

class EventResource extends \Core\Controller
{
    public function getEvent($id): array
    {
        try {
            $event = $this->eventModel->getItem($id);

            

            echo json_encode([
                'status' => 'success',
                'code' => 200,
                'data' => $event,
            ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        
        } catch (Exception $e) {
            http_response_code(500);
            header('Content-type: application/json; charset=utf-8');
            
            echo json_encode([
                'status' => 'error',
                'message' => 'Серверная ошибка',
            ], JSON_UNESCAPED_UNICODE);
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
