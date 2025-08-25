<?php

namespace App\Models;

use Core\Model;

use App\Helpers\Response;

class EventModel extends Model
{
    private string $table = 'events';
    protected Response $response;

    public function __construct()
    {
        $this->response = new Response();
        parent::__construct();
    }

    public function getItem(int $id): ?array
    {
      $sql = "SELECT id, title, date FROM events WHERE id = :id LIMIT 1";
      $stmt = Model::staticPDO()->prepare($sql);
      $stmt->execute([':id' => $id]);
      
      return $stmt->fetch() ?: null;
    }
}