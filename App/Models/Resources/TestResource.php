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
use App\Services\TestService;

class TestResource extends Model
{
    private $table = 'test_data';  
    private TestFormValidators $validator;
    private TestService $testService;
    protected Response $response;

    public function __construct(TestFormValidators $validator)
    {
        parent::__construct();
        $this->validator = $validator;
        $response->response = $response;
        $testService->testService = $testService;
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
            return $this->response->json([
                'success' => false,
                'errors' => $errors,
            ], 400);
        }

        try {
            $this->testServie->save($data);

            return $this->response->json([
                $saved
                  ? ['success' => true, 'message' => 'Данные успешно сохранены']
                  : ['success' => false, 'message' => ['db' => 'Ошибка при создании данных']],
            ], 200);
        } catch (\PDOException $e) {
            // error_log('Ошибка PDO при вставке: '. $e->getMessage());
            if(str_contains($e->getMessage(), '1062')) {
                return $this->response->json([
                    'success' => false, 
                    'errors' => ['email' => 'Пользователь с такой почтой уже есть']
                ], 400);
            }

            return $this->response->json([
                'success' => false, 
                'errors' => ['db' => 'Ошибка базы данных']
            ], 500);
        }

    }

}
