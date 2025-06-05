<?php

namespace App\Models\Resources;

use Core\Model;

use App\Helpers\Response;
use App\Helpers\Auth;

class LoginResource extends Model
{

    private string $table = 'users';
    protected Response $response;

    public function __construct()
    {
      $this->response = new Response();
        parend::__construct();
    }

    /**
     * Check and set Person in session
     */
    public function login(array $data): bool
    {
        $user = $this->getUserByEmail($data['email']);

        if(!$user || !password_verify($data['password'], $user['password'])) {
          return $this->response->json(
            ['success' => 'Такого пользователя нет !'],
            404
          );
        }

        Auth::login($data);

        return true;
    }

    /**
     * find a user by id
     */
    private function getUserByEmail(string $email): ?array
    {
        $pdo = $this->pdo();
        $sql = "SELECT id, name, email, password {$this->table} WHERE = :email LIMIT 1";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['email' => $email]);

        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

}