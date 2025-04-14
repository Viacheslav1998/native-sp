<?php

namespace App\Controllers\Resources;

class UserResource
{
    public function show($id)
    {
        echo "профиль пользователя #{$id}";
    }
}
