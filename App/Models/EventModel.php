<?php

namespace App\Models;

use Core\Model;

class EventModel extends Model
{
    public function getEvents()
    {
        $stmt = $this->pdo()->query("SELECT * FROM events");
        $val = $stmt->fetchAll();
        
    }
}