<?php

namespace Core;

use PDO;
use PDOException;

class Model
{
    protected static $pdo;

    public function __construct()
    {
        if (!self::$pdo) {
            $this->connect();
        }
    }

    protected function connect()
    {
        $host = 'localhost';
        $db = 'hastle';
        $user = 'root';
        $pass = '1914';
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

        $options = [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
          PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            self::$pdo = new PDO($dsn, $user, $pass, $options);
        } catch (PDOException $e) {
            die('Ошибка подключения: ' . $e->getMessage());
        }
    }

    // used always
    protected function pdo()
    {
        return self::$pdo;
    }

    // use for migration in singleton
    public static function staticPDO()
    {
        if (!self::$pdo) {
            // run __construct -> connect
            new self();
        }
        return self::$pdo;
    }
}
