<?php

namespace Core;

class Router
{
    private array $routes = [];

    public function add(string $path, array $controller)
    {
        $path = preg_replace('/\{([\w]+)\}/', '(?P<\1>[^/]+)', $path);
        $this->routes['#^' . $path . '$#'] = $controller;
    }

    public function dispatch(string $url)
    {
        if ($url === '') {
            $url = '/';
        }

        try {

            foreach ($this->routes as $route => [$controller, $method]) {
                if (preg_match($route, $url, $matches)) {
                    $controller = "App\\Controllers\\$controller";

                    if (class_exists($controller)) {
                        $instance = new $controller();

                        if (method_exists($instance, $method)) {
                            array_shift($matches);
                            $instance->$method(...$matches);

                            return;
                        }
                    }
                }
            }

            // if no match or route is found
            $errorController = new \App\Controllers\Errors\ErrorController();

            return $errorController->notFound();
        } catch (\Throwable $e) {
            error_log($e->getMessage());

            $errorController = new \App\Controllers\Errors\ErrorController();

            return $errorController->serverError();
        }
    }
}
