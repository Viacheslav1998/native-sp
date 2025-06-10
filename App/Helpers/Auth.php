<?php

namespace App\Helpers;

/**
 * verification and setting of rights user
 * access control
 */
class Auth
{

    const UNKNOWN_USER = 'Неизвестный пользователь';
    
    /**
     * only test Current Data Session
     * don`t use it anywhere
     */
    public static function getSession(): ?array
    {
        return $_SESSION['user'] ?? null;
    }

    /**
     * you can use universan method hasRole
     * but you can too use it getting current User name if exists
     */
    public static function getUser(): string
    {
        return $_SESSION['user']['name'] ?? self::UNKNOWN_USER;
    } 

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

    public static function requireAdmin()
    {
        if(!self::isAdmin()) {
            header('Location: /');
            exit;
        }
    }

     public static function requireUser()
     {
        if(!self::isUser()) {
            header('Location: /');
            exit;
        }
     }

    public static function denyGuest()
    {
        if(self::isGuest()) {
            header('Location: /');
            exit;
        }
    }


    public static function hasRole(string $role): bool
    {
        return self::check() && ($_SESSION['user']['role'] ?? null) === $role;
    }


    public static function hasAnyRole(array $roles): bool
    {
        if(!self::check()) {
            return false;
        }

        return in_array($_SESSION['user']['role'] ?? null, $roles, true);
    }


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