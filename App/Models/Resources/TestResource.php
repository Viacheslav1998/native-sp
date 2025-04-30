<?php

namespace App\Models\Resources;

use Core\Model;
use App\Validation\TestFormValidators; 

class TestResource extends Model
{
    private TestFormValidators $validator;

    public function __construct(TestFormValidators $validator)
    {
        parent::__construct();
        $this->validator = $validator;
    }

    /**
     * save data
     * return response | error validation
     * @param
     */
    public function save(array $data): array
    {
        $errors = $this->validator->validate($data);
      
        if (!empty($errors)) {
          return ['success' => false, 'errors'  => $errors];
        }

        return $this->storeToDatabase($data)
          ? ['success' => true, 'message' => 'сохранено']
          : ['success' => false, 'message' => ['db' => 'Error in Database']];
    }


    /**
     * proper data correction and storage
     */
    private function storeToDatabase(array $data): bool
    {
      $stmt = $this->pdo()->prepare('
          INSERT INTO your_table (name, email, title, date_js, description, assessment)
          VALUES (:name, :email, :title, :date_js, :description, :assessment)
      ');

      return $stmt->execute([
        ':name' => $data['name'],
        ':email' =>  $data['email'],
        ':title' => $data['title'],
        ':date_js' => $data['date_js'], // js date function
        ':description' => $data['description'],
        ':assessment' =>  $data['assessment'],
      ]);
    }

}
