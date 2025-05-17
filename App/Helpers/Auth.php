<?php

namespace App\Helpers;

/**
 * verification and setting of rights user
 * access control
 * session destruction
 */
class Auth
{
    public static function check(): bool
    {
        return isset($_SESSION['user']);
    }

    public static function user(): ?array
    {
        return $_SESSION['user'] ?? null;
    }

    public static function isAdmin(): bool
    {
        return self::check() && ($_SESSION['user']['role'] ?? null) === 'admin';
    }

    public static function requireAdmin()
    {
        if(!self::isAdmin()) {
            header("Location: /");
            exit;
        }
    }

    public static function login(array $user): void
    {
        session_regenerate_id(true);
        $_SESSION['user'] = [
            'id' => $user['id'],
            'name' => $user['name'],
            'role' => $user['role']
        ];
    }

    public static function logout(): void
    {
        unset($_SESSION['user']);
    }
}