<?php

namespace App\Helpers;

class Session
{
    /**
     * begin session
     */
    public static function start(): void
    {
      if(session_status === PHP_SESSION_NONE) {
          session_start();
      }
    }
    
    /**
     * set Default Session
     */
    public static function initUser(): void 
    {
        if(!isset($_SESSION['user'])) {
            $_SESSION['user'] = [
                'id' => null,
                'name' => 'Guest',
                'email' => null,
                'role' => 'Guest',
            ];
        }
    }

    /**
     * destroy the session
     */
    public static function destroyUser(): void
    {
        unset($_SESSION['user']);
        header('Location: /');
        exit();
    }

}