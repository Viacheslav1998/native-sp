<?php

namespace App\Services;

class FileUploadService
{
    public function uploadFile(array $file, string $destinationFolder): string
    {
        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg','jpeg','png','gif'];

        if(!in_array($ext, $allowed)) {
            throw new Exception('Неверный формат данных');
        }

        $fileName = uniqid() . '.' . $ext;
        $path = $destinationFolder . '/' . $fileName;

        if(!move_uploaded_file($file['tmp_name'], $path)) {
          throw new Exception('Не удалось сохранить изображение');
        }

        return '/uploads/' . $fileName;
    }

}