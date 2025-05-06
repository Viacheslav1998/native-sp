<?php

namespace Core;

class Service
{
    protected PDO $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo ?? Model::staticPDO();
    }
}