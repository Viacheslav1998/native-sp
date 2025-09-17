<?php

namespace App\Services;

use PDO;

/**
 * CRUD Service
 * HTTP/methods
 */
class CrudService
{
    private PDO $pdo;
    private string $table;
    private string $primaryKey;

    public function __construct(PDO $pdo, string $table, string $primaryKey = 'id')
    {
        $this->pdo = $pdo;
        $this->table = $table;
        $this->primaryKey = $primaryKey;
    }

    public function create(array $data): bool
    {
        $columns = implode(', ', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));

        $sql = "INSERT INTO {$this->table} ($columns) VALUES ($placeholders)";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute($data);
    }
}
