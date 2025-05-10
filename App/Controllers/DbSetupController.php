<?php

namespace App\Controllers;

use Core\Migration;
use Core\Model;

class DbSetupController {

    public function generate()
    {
      try {
          $pdo = Model::staticPDO();
          $migrations = new Migration($pdo);
          $migrations->run();
          echo json_encode(['Success' => ' Успех! Создано!']);
      } catch (\PDOException $e) {
          throw new Exception("возникли проблемы с базой данных");
          error_log('Error: ', $e->getMessage());
      }
    }

    public function status()
    {
        http_response_code(200);
        echo json_encode(['success' =>  '200']);
    }

}