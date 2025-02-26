<?php

namespace Core;

class Router {
  private array $routes = [];

  public function add(string $path, array $controller) {
    $this->routes[$path] = $controller;
  }

  public function dispatch(string $url) {
    $url = trim($url, '/');

    if (isset($this->routes[$url])) {
      [$controller, $method] = $this->routes[$url];
      $controller = "App\\Controllers\\$controller";

      if (class_exists($controller)) {
        $instance = new $controller();
        if (method_exists($instance, $method)) {
          $instance->$method();
          return;
        }
      }
    }

    http_response_code(404);
    echo '404 - Not Found';
  }
}
