<?php

require_once __DIR__ . '/../config/app.php';

require_once __DIR__ . '/../vendor/autoload.php';

require_once __DIR__ . '/../Core/Router.php';

use Core\Router;

$routes = require __DIR__ . '/../Core/routes.php';
$router = new Router();


foreach ($routes as $path => $controller) {
  $router->add($path, $controller);
}

$router->dispatch($_GET['url'] ?? '/');