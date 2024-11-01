<?php

namespace Core;

use Core\Middleware\Middleware;

class Router
{
    protected $routes = [];

    protected function addRoute(string $path, string $controller, string $method)
    {
        $middleware = null;
        /*$this->routes[] = [*/
        /*    'path' => $path,*/
        /*    'controller' => $controller,*/
        /*    'method' => $method,*/
        /*    'middleware' => null,*/
        /*];*/
        $this->routes[] = compact(['path', 'controller', 'method', 'middleware']);

        return $this;
    }

    protected function abort(int $code = 404): void
    {
        http_response_code($code);
        require base_path("views/{$code}.view.php");
        exit();
    }

    public function get(string $path, string $controller)
    {
        return $this->addRoute($path, $controller, 'GET');
    }

    public function post(string $path, string $controller)
    {
        return $this->addRoute($path, $controller, 'POST');
    }

    public function delete(string $path, string $controller)
    {
        return $this->addRoute($path, $controller, 'DELETE');
    }

    public function patch(string $path, string $controller)
    {
        return $this->addRoute($path, $controller, 'PATCH');
    }

    public function only(string $key)
    {
        return $this->routes[array_key_last($this->routes)]['middleware'] = $key;
    }

    public function route(string $path, string $method)
    {
        foreach ($this->routes as $route) {
            if ($route['path'] === $path && $route['method'] === strtoupper($method)) {

                Middleware::resolve($route['middleware']);

                return require base_path('http/controller/'.$route['controller']);
            }
        }

        $this->abort();

    }
}
