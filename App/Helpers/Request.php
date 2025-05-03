<?php

namespace App\Helpers;

/**
 * Helper Request
 * return HTTP protocols
 */
class Request
{

  /**
   * return $_POST
   * or params
   */
    public static function post(string $key = null, $default = null)
    {
        if($key === null) return $_POST;
        return $_POST[$key] ?? $default;
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
    
}