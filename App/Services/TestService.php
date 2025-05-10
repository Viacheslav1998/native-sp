<?php

namespace App\Services;

use Core\BaseService;

class TestService extends BaseService
{
    private $table = 'test_data';

    public function save(array $data): bool
    {
        $sql = "
          INSERT INTO `$this->table` (name, email, title, date_js, description, assessment, image)
          VALUES (:name, :email, :title, :date_js, :description, :assessment, :image)
        ";

        $stmt = $this->pdo->prepare($sql);
        
        return $stmt->execute([
          ':name' => $data['name'],
          ':email' =>  $data['email'],
          ':title' => $data['title'],
          ':date_js' => $data['date_js'],
          ':description' => $data['description'],
          ':assessment' =>  $data['assessment'],
          ':image' => $data['image'],
        ]);
    }
}