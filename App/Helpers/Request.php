<?php

namespace App\Helpers;

/**
 * Helper Request
 * return HTTP protocols
 */
class Request
{
 
    /**
     * get input data
     * return json or regular form
     */
    public static function postJson(): array
    {
        $input = file_get_contents('php://input');
        $json = json_decode($input, true);

        if(json_last_error() === JSON_ERROR_NONE) {
            return $json;
        }

        return $_POST; 
    }

  /**
   * return $_POST
   * or []
   */
    public static function post(string $key = null, $default = [])
    {
        if($key === null) return $_POST;
        return $_POST[$key] ?? $default;
    }

    /**
     * return $_FILE
     * or null
     */
    public static function file(string $name): ?array
    {
        return $_FILES[$name] ?? null;
    }

    /**
     * return $_GET
     * or params
     */
    public static function get(string $key = null, $default = null)
    {
        if($key === null) return $_GET;
        return $_GET[$key] ?? $default;
    }

    /**
     * return $_REQUEST
     */
    public static function all(): array
    {
        return $_REQUEST;
    } 
  
    /**
     * check param
     */
    public static function has(string $key): bool
    {
        return isset($_REQUEST[$key]);
    }

    /**
     * get input
     */
    public static function input(): array
    {
        return $_REQUEST;
    }

    /**
     * return json input data
     */
    public static function json(): array
    {   
        $json = file_get_contents('php://input');
        return json_decode($json, true) ?? [];
    }

    /**
     * GET CURRENT METHOD
     */
    public static function method(): string 
    {
        return $_SERVER['REQUEST_METHOD'] ?? 'GET';
    }

    /**
     * is POST
     */
    public static function isPost(): bool
    {
        return strtoupper(self::method())  === 'POST'; 
    }

    /**
     * is GET
     */
    public static function isGet(): bool
    {
        return strtoupper(self::method()) === 'GET';
    }

    /**
     * IP
     */
    public function ip() : string
    {
        return $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
    }

    /**
     * header http response
     */
    public static function header(string $key): ?string
    {
        $key = strtoupper(str_replace('-', '_', $key));
        $key = 'HTTP_' . $key;
        return $_SERVER[$key] ?? null;
    }
}