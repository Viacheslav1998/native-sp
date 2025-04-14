<?php

require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../vendor/autoload.php';

use Core\Router;

// routing...
$routes = require __DIR__ . '/../Core/routes.php';
$router = new Router();


foreach ($routes as $path => $controller) {
    $router->add($path, $controller);
}

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$url = trim($url, '/');

$router->dispatch($url);
