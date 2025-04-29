<?php

namespace App\Models\Resources;

use Core\Model;
use App\Helpers\ValidationHelper;

class TestResource extends Model
{

    private \PDO $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }
        
    public function save(array $data): array
    {

        $errors = $this->validate($data);
      
        if (!empty($errors)) {
          return [
            'success' => false,
            'errors'  => $errors,
          ];
        }

        $stmt = $this->pdo->prepare('
            INSERT INTO your_table (name, email, title, date_js, description, assessment, date_test_php)
            VALUES (:name, :email, :title, :date_js, :description, :assessment, :date_test_php)
        ');

        $success = $stmt->execute([
          ':name' => $data['name'],
          ':email' =>  $data['email'],
          ':title' => $data['title'],
          ':date_js' => $data['date_js'], // js date function
          ':description' => $data['description'],
          ':assessment' =>  $data['assessment'],
          ':date_test_php' => $data['date_test_php'], // only sql func date
        ]);

        if ($success) {
            return [
              'success' => true,
              'message' => 'Данные успешно сохранены'
            ];
          } else {
            return [
              'success' => false, 
              'message' => ['db' => 'Ошибка при сохранении в бд']
            ];
        }
    }
}
