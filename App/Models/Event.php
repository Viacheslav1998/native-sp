<?php

namespace App\Models;

use Core\Model;

class Event extends Model
{
    public function fetchAllEvents()
    {
        // danger code
        $stmt = $this->pdo()->query("SELECT * FROM events");
        return $stmt->fetchAll();   
    }
}