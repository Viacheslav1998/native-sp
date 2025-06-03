<?php

namespace App\Controllers\Generations;

use Core\Migration;
use Core\Model;

/**
 * Checking the status of the production server 
 * generate/create DB/Tables/Columns
 */
class DbSetupController {

    /**
     * generate/create/update/rename Table - Column.
     */
    public function generate()
    {
        try {
            $pdo = Model::staticPDO();
            $migrations = new Migration($pdo);
            $appliedCount = $migrations->run();

            http_response_code(200);

            if($appliedCount > 0) {
                echo json_encode(['Success' => "Успех! Применено миграций: $appliedCount"], JSON_UNESCAPED_UNICODE);
            } else {
                echo json_encode(['Info' => 'Миграции уже применены. Новых таблиц не создано.'], JSON_UNESCAPED_UNICODE);
            }
            
        } catch (\PDOException $e) {
            throw new Exception("возникли проблемы с базой данных");
            httr_response_code(500);
            error_log('Error: ', $e->getMessage());
        }
    }

    public function status()
    {
        http_response_code(200);
        echo json_encode(['success' =>  '200']);
    }

}