<?php

namespace App\Controllers;

class PersonController
{
    public function show($id)
    {
        echo "профиль пользователя #{$id}";
    }
}
