<?php

error_reporting(E_ALL);
ini_set('display_errors', true);

require_once __DIR__ . '/../vendor/autoload.php';

require_once __DIR__ . '/../core/Router.php';

use Core\Router;

$routes = require __DIR__ . '/../core/routes.php';
$router = new Router();


foreach ($routes as $path => $controller) {
  $router->add($path, $controller);
}

$router->dispatch($_GET['url'] ?? '/');