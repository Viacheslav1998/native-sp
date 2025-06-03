<?php

namespace App\Models\Resources;

use Core\Model;
use App\Helpers\Response;
use App\Services\CrudService;

class PersonResource extends Model
{
    private string $table = 'users';
    private CrudService $crudService;
    protected Response $response;
    
    public function __construct()
    {
        parent::__construct();
        $this->response = new Response();
        $this->crudService = new CrudService(self::staticPDO(), $this->table);
    }

    /**
     * Save Person
     * return response
     */
    public function save(array $data): bool
    {
        try {
            if(!empty($data['password'])) {
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            }

            $saved = $this->crudService->create($data);
            
            return $this->response->json(
                $saved
                  ? ['success' => true, 'message' => 'Пользователь Сохранен!']
                  : ['success' => false, 'message' => 'Ошибка не удалось сохранить пользователя'],
                200
            );
        } catch (\PDOException $e) {
            error_log('Ошибка PDO: ' . $e->getMessage());
            error_log('Входные данные: ' . json_encode($data, JSON_PRETTY_PRINT));

            if($e->getCode() === '23000' && str_contains($e->getMessage(), 'Duplicate entry')) {
                return $this->response->json([
                    'success' => false,
                    'message' => 'Пользователь с такой почтой уже существует !'
                ], 400);
            }

            return $this->response->json([
                'success' => false,
                'message' => 'Ошибка при сохранении',
            ], 500);
        }
    }
}