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
use App\ExceptionHandlers\PDOExceptionEmail;
use App\Services\FileUploadService;

class TestResource extends Model
{
    private string $table = 'test_data';  
    private TestFormValidators $validator;
    private TestService $testService;
    protected Response $response;
    private PDOExceptionEmail $pdoEmail;

    public function __construct(TestFormValidators $validator)
    {
        parent::__construct();
        $this->validator = $validator;
        $this->response = new Response();
        $this->testService = new TestService(self::staticPDO());
        $this->pdoEmail = new PDOExceptionEmail();
    }

    /**
     * save data
     * return response | error validation
     * @param
     */
    public function save(array $data): bool
    {
        $errors = $this->validator->validate($data);
      
        if (!empty($errors)) {
            // error_log('ошибка валидации: '. json_encode($errors, JSON_UNESCAPED_UNICODE));
            return $this->response->json([
                'success' => false,
                'errors' => $errors,
            ], 400);
        }

        if(!empty($data['image'])) {
            try {
                $fileUploader = new FileUploadService();
                $data['image_path'] = $fileUploader->uploadFile($data['image'], __DIR__ . '/../../../public/uploads');
            } catch (\Exception $e) {
                return $this->response->json([
                    'success' => false,
                    'errors' => ['image' => $e->getMessage()],
                ], 400);
            }
        }

        try {
            $saved = $this->testService->save($data);

            return $this->response->json([
                $saved
                  ? ['success' => true, 'message' => 'Данные успешно сохранены']
                  : ['success' => false, 'message' => ['db' => 'Ошибка при создании данных']],
            ], 200);
        } catch (\PDOException $e) {
            $errors = $this->pdoEmail->handle($e);
            
            return $this->response->json([
                'success' => false,
                'errors' => $errors
            ], 500);
        }

    }

}
