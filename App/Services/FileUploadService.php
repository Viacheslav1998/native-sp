<?php

namespace App\Services;

use Exception;

class FileUploadService
{
    public function uploadFile(array $file, string $destinationFolder): string
    {
        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg','jpeg','png','gif'];

        if(!in_array($ext, $allowed)) {
            throw new Exception('Неверный формат данных', $ext);
        }

        // create folder if not exists
        if(!is_dir($destinationFolder)) {
            if(!mkdir($destinationFolder, 0755, true)) {
                throw new Exception('Не удалось создать папку для загрузки');   
            }
        }

        $fileName = uniqid() . '.' . $ext;
        $path = rtrim($destinationFolder, '/') . '/' . $fileName;

        if(!move_uploaded_file($file['tmp_name'], $path)) {
            throw new Exception('Не удалось сохранить изображение');
        }

        return '/uploads/' . $fileName;
    }

}