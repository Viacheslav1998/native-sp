<?php

namespace App\Helpers;

/**
 * verification and setting of rights user
 * access control
 */
class Auth
{
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
     * but you can too use it getting current User if Exists
     */
    public static function getUserName(): string
    {
        return $_SESSION['user']['name'] ?? null;
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
        if(!self::isGuest()) {
            header('Location: /');
            exit;
        }
    }

    /**
     * universal get/check role
     */
    public static function hasRole(string $role): bool
    {
        return self::check() && ($_SESSION['user']['role'] ?? null) === $role;
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