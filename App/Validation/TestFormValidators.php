<?php

namespace App\Validation;

use App\Helpers\ValidationHelper;

class TestFormValidators
{
    /** for testResource  */
    public function validate(array $data): array
    {
        $errors = [];

        if (!ValidationHelper::required($data['name'] ?? '')) {
            $errors['name'] = 'Названия обаязательно';
        }

        if (!ValidationHelper::email($data['email'] ?? '')) {
            $errors['email'] = 'Неверный формат Email';
        }

        if (!ValidationHelper::required($data['description'] ?? '')) {
            $errors['description'] = 'Описание обязательно.';
        }

        if (!ValidationHelper::numeric($data['assessment'] ?? '')) {
            $errors['assessment'] = 'Оценка должна быть числом.';
        }

        return $errors;
    }
}
