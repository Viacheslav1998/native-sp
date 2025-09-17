<?php

namespace App\Models\Resources;

use App\Helpers\Auth;
use App\Helpers\Response;
use Core\Model;

class LoginResource extends Model
{
    private string $table = 'users';
    protected Response $response;

    public function __construct()
    {
        $this->response = new Response();
        parent::__construct();
    }

    /**
     * Check and set Person in session
     */
    public function verify(array $data): array
    {
        $user = $this->getUserByEmail($data['email']);

        if (!$user || !password_verify($data['password'], $user['password'])) {
            return $this->response->json([
                'success' => false,
                'message' => 'Пользователь не найден!'
            ], 400);
        }

        // set settion
        Auth::login($user);

        // succes
        return $this->response->json([
            'success' => true,
            'message' => 'Совпадения найдены!'
        ], 200);
    }

    /**
     * find a user by id
     */
    private function getUserByEmail(string $email): ?array
    {
        $pdo = Model::staticPDO();
        $sql = "SELECT id, name, email, password, role FROM {$this->table} WHERE email = :email LIMIT 1";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['email' => $email]);

        return $stmt->fetch() ?: null;
    }
}
