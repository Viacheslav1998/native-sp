<?php

namespace App\Models;

use Core\Model;

class EventModel extends Model
{
    public function fetchAllEvents()
    {
        // danger code
        $stmt = $this->pdo()->query("SELECT * FROM events");
        return $stmt->fetchAll();   
    }
}