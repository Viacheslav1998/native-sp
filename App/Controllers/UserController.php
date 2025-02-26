<?php

namespace App\Controllers;

class UserController
{
    public function show($id)
    {
        echo "профиль пользователя #{$id}";
    }
}