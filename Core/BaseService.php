<?php

namespace Core;

use PDO;

class BaseService
{

    protected PDO $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo ?? Model::staticPDO();
    }
}