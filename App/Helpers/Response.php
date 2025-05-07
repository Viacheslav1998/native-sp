<?php

namespace App\Helpers;

class Response
{
    /**
     * Response status
     * format json
     */
    public function json(array $data, int $status = 200): string
    {
        http_response_code($status);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        exit;
    }
}