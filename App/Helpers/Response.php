<?php

namespace App\Helpers;

class Response
{
    /**
     * response json
     * header
     */
    public static function json(array $data, int $statusCode = 200): void
    {
        http_response_code($statusCode);
        header('Content-Type: application/json; charset=utf-8');

        echo json_encode(
            $data, 
            JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT
        );
        exit;
    }

    public static function success(array $data, int $statusCode = 200): void
    {
        self::json([
            'status' => 'success',
            'code' => $statusCode,
            'data' => $data,
        ], $statusCode);
    }

    public static function error(string $message, int $statusCode = 500): void
    {
        self::json([
            'status' => 'error', 
            'code' => $statusCode,
            'message' => $message
        ], $statusCode);
    }


}