<?php

/**
 * Helper Request
 * return HTTP protocol
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
}