<?php

use Core\Enums\Response;
use Core\Router;

if (! function_exists('dd')) {
    function dd(mixed $value): never {
        echo "<pre>";
        var_dump($value);
        echo "</pre>";

        die();
    }
}

if (! function_exists('urlIs')) {
    function urlIs(string $value): bool {
        return parse_url($_SERVER['REQUEST_URI'])['path'] === $value;
    }
}

if (! function_exists('authorize')) {
    function authorize(bool $condition, Response $statusCode = Response::Forbidden): void {
        if (! $condition) {
            Router::abort($statusCode);
        }
    }
}

if (! function_exists('base_path')) {
    function base_path(string $path): string {
        return BASE_PATH . $path;
    }
}

if (! function_exists('view')) {
    function view(string $path, array $attributes = []) {
        extract($attributes);

        require base_path('views/' . $path);
    }
}
