<?php

namespace App\Traits;

use App\Helpers\Auth; 

trait RequireAuth
{
    protected function denyIfGuest(): void
    {
        Auth::denyGuest();
    }
}