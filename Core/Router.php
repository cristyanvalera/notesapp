<?php declare(strict_types=1);

namespace Core;

use Core\Enums\Response;

class Router
{
    protected iterable $routes = [];

    public function get(string $uri, string $controller): void
    {
        $this->add('GET', $uri, $controller);
    }

    public function post(string $uri, string $controller): void
    {
        $this->add('POST', $uri, $controller);
    }

    public function delete(string $uri, string $controller): void
    {
        $this->add('DELETE', $uri, $controller);
    }

    public function put(string $uri, string $controller): void
    {
        $this->add('PUT', $uri, $controller);
    }

    public function route(string $uri, string $method): mixed
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                return require base_path($route['controller']);
            }
        }

        $this->abort();
    }

    protected function add(string $method, string $uri, string $controller): void
    {
        $this->routes[] = compact('method', 'uri', 'controller');
    }

    public static function abort(Response $code = Response::PageNotFound): never
    {
        $code = $code->value;

        http_response_code($code);

        require base_path("views/{$code}.php");

        die();
    }
}
