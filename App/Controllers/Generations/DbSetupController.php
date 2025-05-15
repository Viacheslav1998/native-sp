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
          $migrations->run();
          http_response_code(201);
          echo json_encode(['Success' => ' Успех! Создано!']);
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