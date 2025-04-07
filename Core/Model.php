<?php

namespace Core;

use PDO;
use PDOException;

class Model
{
    protected static $pdo;

    public function __construct()
    {
        if (self::$pdo) {
            $this->connect();
        }
    }

    protected function connect()
    {
        $host = 'localhost';
        $db = 'testDatabase';
        $user = 'root';
        $password = '1914';
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

        $option = [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCETION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
          PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            self::$pdo = new PDO($dsn, $user, $pass, $options);
        } catch (PDOException $e) {
            die('Ошибка подключения: ' . $e->getMessage());
        }
    }

    protected function pdo()
    {
        return self::$pdo;
    }
}
