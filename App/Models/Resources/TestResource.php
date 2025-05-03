<?php

namespace App\Models\Resources;

use Core\Model;
use App\Validation\TestFormValidators; 

class TestResource extends Model
{
    private $table = 'test_data';  
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

        try {
            $saved = $this->storeToDatabase($data);
            return $saved 
                ? ['success' => true, 'message' => 'Данные успешно сохранены!']
                : ['success' => false, 'message' => ['db' => 'Ошибка при создании']]; 
        } catch (\PDOException $e) {
            if(str_contains($e->getMessage(), '1062')) {
                return [
                    'succes' => false, 
                    'errors' => ['email', 'Пользователь с такой почтой в системе уже есть!']
                ];
            }
            
            // another error
            return [
              'success' => false, 
              'errors' => ['db', 'Ошибка базы данных!']
            ];
        }

        // return $this->storeToDatabase($data)
        //   ? ['success' => true, 'message' => 'сохранено']
        //   : ['success' => false, 'message' => ['db' => 'Error in Database']];
    }


    /**
     * proper data correction and storage
     */
    private function storeToDatabase(array $data): bool
    {
      $sql = "
          INSERT INTO `$this->table` (name, email, title, date_js, description, assessment)
          VALUES (:name, :email, :title, :date_js, :description, :assessment)
      ";

      $stmt = $this->pdo()->prepare($sql);

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
