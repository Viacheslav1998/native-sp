<?php
// name domain - hastle - [native-space]
require_once __DIR__ . '/../vendor/autoload.php';

use FastRoute\RouteCollector;
use function FastRoute\simpleDispatcher;

// create route
$dispatcher = simpleDispatcher(function (RouteCollector $r) {
    $r->addRoute('GET', '/', ['App/Controllers/HomeController', 'index']);
    $r->addRoute('GET', '/about', ['App/Controllers/HomeController', 'About']);
    $r->addRoute('GET', '/user/{id:\d+}', ['App/Controllers/UserController', 'show']);
    // etc
});

// get URI and method-Request
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// without [params]
$uri = strtok($uri, '?');

// run dispatcher
$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

// checks
switch ($routeInfo[0]) {
  case FastRoute\Dispatcher::NOT_FOUND:
    http_response_code(404);
    echo "404 Not Found";
    break;
  case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
    http_response_code(405);
    echo "405 Method Not Allowed";
    break;
  case FastRoute\Dispatcher::FOUND:
    [$controller, $method] = $routeInfo[1];
    $vars = $routeInfo[2];

    // Автозагрузка классов и вызов метода
    (new $controller)->$method(...array_values($vars));
    break;
}