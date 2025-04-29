<?php

namespace App\Controllers;

use Core\Migration;
use Core\Model;

class DbSetupController {

    public function generate()
    {
      $pdo = Model::staticPDO();
      $migrations = new Migration($pdo);
      $migrations->run();

      echo "ok: 200";
    }

}