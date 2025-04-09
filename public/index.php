<?php

require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../vendor/autoload.php';

use Core\Router;
use Core\Migration;
use Core\Model;


// connecting
$pdo = Model::staticPDO();

// create object migration
$migrations = new Migration($pdo);

// run migration
$migrations->run();


// routing...
$routes = require __DIR__ . '/../Core/routes.php';
$router = new Router();


foreach ($routes as $path => $controller) {
    $router->add($path, $controller);
}

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$url = trim($url, '/');

$router->dispatch($url);
