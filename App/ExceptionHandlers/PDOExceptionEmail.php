<?php

namespace App\ExceptionHandlers;

class PDOExceptionEmail
{
    public function handle(\PDOException $e): array
    {
        if (str_contains($e->getMessage(), '1062')) {
            return ['email' => 'Пользователь с такой почтой уже существует!'];
        }

        return ['db' => 'Ошибка базы данных'];
    }
}
