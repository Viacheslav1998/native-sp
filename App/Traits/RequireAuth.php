<?php

namespace App\Traits;

use App\Helpers\Auth; 

trait RequireAuth
{
    protected function denyIfGuest(): void
    {
        Auth::denyGuest();
    }

    protected function denyIfAdmin(): void
    {
        if(Auth::hasAnyRole(['admin', 'user'])) {
            header('Location: /');
            exit;
        }
    }
}