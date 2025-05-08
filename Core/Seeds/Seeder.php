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

        for($i = 0; $i < $chanks; $i++) {
            $this->pdo->beginTransaction();

            $sql = "INSERT INTO `$this->table` (name, email, title, date_js, description, assessment) VALUES ";
            $params = [];
            $values = [];
            
            for($j = 0; $j < $this->chunkSize && $inserted < $count; $j++, $inserted++) {
                $values[] = "(?,?,?,?,?,?)";
                $values[] = $this->faker->name;
                $values[] = $this->faker->safeEmail;
                $values[] = $this->faker->jobTitle;
                $values[] = $this->faker->date('Y-m-d');
                $values[] = $this->faker->text(200);
                $values[] = rand(1,5);
            }

            $sql .= implode(", ", $values);
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);

            $this->pdo->commit();

            echo "Вставлено : $inserted\n";
        }
    }
}