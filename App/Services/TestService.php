<?php

namespace App\Services;

use App\Core\BaseService;

class TestService extends BaseService
{
    private $table = 'test_data';

    public function save(array $data): array
    {
        $sql = "
          INSERT INTO `$this->table` (name, email, title, date_js, description, assessment)
          VALUES (:name, :email, :title, :date_js, :description, :assessment)
        ";

        $stmt = $this->pdo->prepare($sql);
        
        return $stmt->execute([
          ':name' => $data['name'],
          ':email' =>  $data['email'],
          ':title' => $data['title'],
          ':date_js' => $data['date_js'],
          ':description' => $data['description'],
          ':assessment' =>  $data['assessment'],
        ]);
    }
}