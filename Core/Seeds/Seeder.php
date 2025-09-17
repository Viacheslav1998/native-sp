<?php

namespace Core\Seeds;

use Faker\Factory;
use PDO;

class Seeder
{
    private PDO $pdo;
    private int $chunkSize = 10000;
    private string $table;
    private $faker;

    public function __construct(\PDO $pdo, string $table)
    {
        $this->table = $table;
        $this->pdo = $pdo;
        $this->faker = Factory::create();
    }

    public function seed(int $count): void
    {
        $inserted = 0;
        $chunks = ceil($count / $this->chunkSize);

        for ($i = 0; $i < $chunks; $i++) {
            $this->pdo->beginTransaction();

            $sql = "INSERT INTO `$this->table` (name, email, title, date_js, description, assessment) VALUES ";
            $placeholders = [];
            $params = [];

            for ($j = 0; $j < $this->chunkSize && $inserted < $count; $j++, $inserted++) {
                $placeholders[] = '(?,?,?,?,?,?)';
                $params[] = $this->faker->name;
                $params[] = $this->faker->safeEmail;
                $params[] = $this->faker->jobTitle;
                $params[] = $this->faker->date('Y-m-d');
                $params[] = $this->faker->text(200);
                $params[] = rand(1, 5);
            }

            $sql .= implode(', ', $placeholders);
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);

            $this->pdo->commit();

            echo "Вставлено : $inserted\n";
        }
    }
}
