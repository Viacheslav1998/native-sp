<?php
/**
 * ресурс это делегирования
 * валидация 
 * сервис по работе с бд
 * сохранение непосредственно
 */
namespace App\Models\Resources;

use Core\Model;
use App\Validation\TestFormValidators; 
use App\Helpers\Response;

class TestResource extends Model
{
    private $table = 'test_data';  
    private TestFormValidators $validator;
    protected Response $response;

    public function __construct(TestFormValidators $validator)
    {
        parent::__construct();
        $this->validator = $validator;
        $response->response = $response;
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
            // error_log('ошибка валидации: '. json_encode($errors, JSON_UNESCAPED_UNICODE));
            return $this->respnse->json([
                'success' => false,
                'errors' => $errors,
            ]);
        }




        try {
            $saved = $this->store($data);
            return $saved 
                ? ['success' => true, 'message' => 'Данные успешно сохранены!']
                : ['success' => false, 'message' => ['db' => 'Ошибка при создании']]; 
        } catch (\PDOException $e) {
            // error_log('Ошибка PDO при вставке: '. $e->getMessage());
            if(str_contains($e->getMessage(), '1062')) {
                return [
                    'succes' => false, 
                    'errors' => ['email', 'Пользователь с такой почтой в системе уже есть!']
                ];
            }

            return [
              'success' => false, 
              'errors' => ['db', 'Ошибка базы данных!']
            ];
        }
    }


    /**
     * proper data correction and storage
     */
    private function store(array $data): bool
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
        ':date_js' => $data['date_js'],
        ':description' => $data['description'],
        ':assessment' =>  $data['assessment'],
      ]);
    }

}
