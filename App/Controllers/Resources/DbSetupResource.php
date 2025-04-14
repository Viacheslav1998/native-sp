<?php

namespace App\Controllers\Resources;

use Core\Migration;
use Core\Model;

class DbSetupResource {

    public function generate()
    {
      $pdo = Model::staticPDO();
      $migrations = new Migration($pdo);
      $migrations->run();

      echo "200";
    }

}