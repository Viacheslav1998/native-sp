<?php

namespace App\Models\Resources;

use Core\Model;
use Core\Helpers\Response;
use Core\Service\CrudService;

class TestResouce extends Model
{
    private string $table = 'users';
    
    public function __construct()
    {
        parent::__construct();
        $this->response = new Response();
        $this->crudService = new CrudService(self::staticPDO, $this->table);
    }

    /**
     * Save Person
     * return response
     */
    public function save(array $data): bool
    {
        try {
            $saved = $this->crudService->create($data);
            return $this->response->json([
                $saved
                  ? ['sucess' => true, 'message' => 'Пользователь Сохранен!']
                  : ['success' => false, 'message' => 'Ошибка не удалось сохранить пользователя']
            
            ], 200);
        } catch (\PDOException $e) {
            error_log('Ошибка сохранения' . $e->getMessage());
            return $this->response->json([
                'success' => false,
                'message' => 'Ошибка при сохранении',
                'cnfg' => $e->getMessage() 
            ], 500);
        }
    }
}