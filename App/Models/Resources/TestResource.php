<?php
/**
 * ресурс это делегирования
 * валидация 
 * сервис по работе с бд
 * сохранение непосредственно
 * 
 */
namespace App\Models\Resources;

use Core\Model;
use App\Validation\TestFormValidators; 
use App\Helpers\Response;
use App\Services\CrudService;
use App\ExceptionHandlers\PDOExceptionEmail;
use App\Services\FileUploadService;

class TestResource extends Model
{
    private string $table = 'test_data';  
    private TestFormValidators $validator;
    private CrudService $crudService;
    protected Response $response;
    private PDOExceptionEmail $pdoEmail;

    public function __construct(TestFormValidators $validator)
    {
        parent::__construct();
        $this->validator = $validator;
        $this->response = new Response();
        $this->crudService = new CrudService(self::staticPDO(), $this->table);
        $this->pdoEmail = new PDOExceptionEmail();
    }

    /**
     * save data
     * return response | error validation
     * @param
     */
    public function save(array $data): bool
    {
        // error_log('intresting message: '. print_r($data, true));
        $errors = $this->validator->validate($data);
      
        if (!empty($errors)) {
            // error_log('ошибка валидации: '. json_encode($errors, JSON_UNESCAPED_UNICODE));
            return $this->response->json([
                'success' => false,
                'errors' => $errors,
            ], 400);
        }

        if (!empty($data['image'])) {
            try {
                $fileUploader = new FileUploadService();
                $data['image_path'] = $fileUploader->uploadFile($data['image'], __DIR__ . '/../../../public/uploads');
            } catch (\Exception $e) {
                error_log('ошибка при загрузки картинки: ' . $e->getMessage() );
                return $this->response->json([
                    'success' => false,
                    'errors' => ['image' => $e->getMessage()],
                ], 400);
            }
        }

        try {
            $saved = $this->crudService->create([
                'name' => $data['name'],
                'email' =>  $data['email'],
                'title' => $data['title'],
                'date_js' => $data['date_js'],
                'description' => $data['description'],
                'assessment' =>  $data['assessment'],
                'image' => $data['image_path']
            ]);

            return $this->response->json([
                $saved
                  ? ['success' => true, 'message' => 'Данные успешно сохранены']
                  : ['success' => false, 'message' => ['db' => 'Ошибка при создании данных']],
            ], 200);
        } catch (\PDOException $e) {
            $errors = $this->pdoEmail->handle($e);
            error_log('Ошибка при сохранении: '.$e->getMessage());

            return $this->response->json([
                'success' => false,
                'errors' => $errors,
                'cnfg' => $e->getMessage(),
            ], 500);
        }
    }


    /**
     * return @param json [code]
     * for testing array methods
     */ 
    public function testArrayManipulation()
    {
        return $this->response->json([
            'success' => true,
            'answer_array_value' => array_keys($this->arrayBox(), 'three', false),
            'answer_array' => array_keys($this->arrayBox()),
            'answer_all' => $this->arrayBox(),
        ], 200);
    }


    /**
     * just array in All Types
     * for checks
     */
    private function arrayBox()
    {
        return  [
            [ // Первый элемент: ассоциативный массив с разными типами данных
                "name" => "Привет",                // строка
                1 => 42,                           // число (ключ — число)
                "isActive" => true,                // boolean
                "score" => 99.5,                   // float
                "tags" => ["php", "array", "data"],// массив
                "details" => [                    // объект (ассоциативный массив)
                    "city" => "Москва",
                    2 => false,
                    "nested" => null
                ]
            ],
            [ // Второй элемент: вложенный массив
                "items" => [
                    "строка1", "строка2", "строка3",   // строки
                    10, 20, 30,                        // числа
                    true, false, true,                 // boolean
                    1.1, 2.2, 3.3,                     // float
                    ["a" => 1], ["b" => 2], ["c" => 3],// объекты
                    [1], [2], [3]                      // массивы
                ]
            ],
            [ // Третий элемент: массив из вложенных ассоциативных массивов
                [
                    "key1" => "value1",
                    100 => 123,
                    "bool" => false,
                    "float" => 6.78,
                    "array" => ["a", "b", "c"],
                    "obj" => ["x" => "y"]
                ],
                [
                    "key2" => "value2",
                    200 => 456,
                    "bool" => true,
                    "float" => 9.01,
                    "array" => [true, false],
                    "obj" => ["z" => 0]
                ],
                [
                    "key3" => "value3",
                    300 => 789,
                    "bool" => false,
                    "float" => 3.14,
                    "array" => [],
                    "obj" => []
                ]
            ]
        ];
    }

}
