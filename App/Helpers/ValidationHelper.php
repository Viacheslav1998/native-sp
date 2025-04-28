<?php

namespace App\Helpers;

class ValidationHelper {
    
    // required field
    public static function required($value): bool
    {
        return !empty($value);
    }

    // is email
    public static function email($value): bool
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
    }

    // string is min
    public static function minLength($value, $length): bool 
    {
        return strlen($value) >= $length;
    } 

    // string is max
    public static function maxLengh($value, $length): bool
    {
        return strlen($value) <= $length;
    }

    // value is number
    public static function numeric($value): bool 
    {
        return is_numeric($value);
    }

}

