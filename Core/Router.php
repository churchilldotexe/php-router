<?php

namespace Core;

class Router
{
    protected $routes = [];

    protected function addRoute(string $path, string $controller, string  $method): void
    {
        $this->routes[] = [
            'path' => $path,
            'controller' => $controller,
            'method' => $method
        ];

    }
    protected function abort(int $code = 404): void
    {
        http_response_code($code);
        require base_path("views/{$code}.view.php");
        die();
    }

    public function get(string $path, string $controller): void
    {
        $this->addRoute($path, $controller, "GET");
    }

    public function post(string $path, string $controller): void
    {
        $this->addRoute($path, $controller, "POST");
    }
    public function delete(string $path, string $controller): void
    {
        $this->addRoute($path, $controller, "DELETE");
    }
    public function patch(string $path, string $controller): void
    {
        $this->addRoute($path, $controller, "PATCH");
    }

    public function route(string $path, string $method): void
    {
        foreach ($this->routes as $route) {
            if ($route['path'] === $path && $route['method'] === strtoupper($method)) {

                require base_path($route['controller']);
                exit();
            }
        }

        $this->abort();

    }

}
