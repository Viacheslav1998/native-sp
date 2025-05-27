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
            $saved = $this->crudService->create($data);
            return $this->response->json([
                $saved
                  ? ['sucess' => true, 'message' => 'Пользователь Сохранен!']
                  : ['success' => false, 'message' => 'Ошибка не удалось сохранить пользователя']
            ], 200);
        } catch (\PDOException $e) {
          error_log(json_encode($yourArray));
            return $this->response->json([
                'success' => false,
                'message' => 'Ошибка при сохранении',
                'cnfg' => error_log(json_encode($yourArray)), 
            ], 500);
        }
    }
}