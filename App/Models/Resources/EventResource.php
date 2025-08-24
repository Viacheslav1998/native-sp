<?php

namespace App\Models\Resources;

use Core\Model;

use App\Helpers\Response;

class EventResource extends Model
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
      $pdo = Model::staticPDO();
      $sql = "SELECT id, title, date FROM events WHERE id = :id";
      $stmt = $pdo->prepare($sql);
      $stmt->execute(['id' => $id]);

      $event = $stmt->fetch(PDO::FETCH_ASSOC);
      
      return $event ?: null;
    }
}