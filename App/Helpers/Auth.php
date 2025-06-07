<?php

namespace App\Helpers;

/**
 * verification and setting of rights user
 * access control
 */
class Auth
{
    public static function check(): bool
    {
        return isset($_SESSION['user']);
    }

    public static function isAdmin(): bool
    {
        return self::check() && ($_SESSION['user']['role'] ?? null) === 'admin';
    }

    public static function isUser(): bool
    {
        return self::check() && ($_SESSION['user']['role'] ?? null) === 'user'; 
    }

    public static function isGuest(): bool
    {
        return self::check() && ($_SESSION['user']['role'] ?? null) === 'guest';
    }

    /**
     * check Admin
     */
    public static function requireAdmin()
    {
        if(!self::isAdmin()) {
            header('Location: /');
            exit;
        }
    }

    /**
     * check User
     */
     public static function requireUser()
     {
        if(!self::isUser()) {
            header('Location: /');
            exit;
        }
     }

     /**
     * check Guest
     */
    public static function requireGuest()
    {
        if(!self::isUser()) {
            header('Location: /');
            exit;
        }
    }

    /**
     * Set Person data
     */
    public static function login(array $user): void
    {
        session_regenerate_id(true);

        $_SESSION['user'] = [
            'id' => $user['id'],
            'name' => $user['name'],
            'email'=> $user['email'],
            'role' => $user['role']
        ];
    }
}