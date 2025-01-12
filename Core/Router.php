<?php

declare(strict_types=1);

namespace Core;

use Core\Middleware\Middleware;

class Router
{
    protected iterable $routes = [];

    protected function add(string $method, string $uri, string $controller): self
    {
        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller,
            'middleware' => null,
        ];

        return $this;
    }

    public function get(string $uri, string $controller): self
    {
        return $this->add('GET', $uri, $controller);
    }

    public function post(string $uri, string $controller): self
    {
        return $this->add('POST', $uri, $controller);
    }

    public function delete(string $uri, string $controller): self
    {
        return $this->add('DELETE', $uri, $controller);
    }

    public function put(string $uri, string $controller): self
    {
        return $this->add('PUT', $uri, $controller);
    }

    public function only(string $role): self
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $role;

        return $this;
    }

    public function route(string $uri, string $method): mixed
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                if ($route['middleware']) {
                    Middleware::resolve($route['middleware']);
                }

                return require base_path('Http/controllers/' . $route['controller']);
            }
        }

        abort();
    }

    public function previousUrl(): string
    {
        return $_SERVER['HTTP_REFERER'];
    }
}
