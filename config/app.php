<?php

// strict mode
declare(strict_types=1);

//sessions
session_start();

// show error
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__DIR__) . '/logs/error.log');
error_reporting(E_ALL);

// root path ...
function base_url($path = '')
{
    return 'http://hastle.test/' . ltrim($path, '/');
}

// debug
function xDump($stuff)
{
    echo '<pre>';
    var_dump($stuff);
    echo '</pre>';
}
