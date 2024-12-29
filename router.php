<?php

$routes = require('routes.php');

if (! function_exists('abort')) {
    function abort(Response $code = Response::PageNotFound): never {
        http_response_code($code->value);

        require "views/{$code->value}.php";

        die();
    }
}

if (! function_exists('authorize')) {
    function authorize(bool $condition, Response $statusCode = Response::Forbidden): void {
        if (! $condition) {
            abort($statusCode);
        }
    }
}

if (! function_exists('routeToController')) {
    function routeToController(string $uri, array $routes): void {
        array_key_exists($uri, $routes)
            ? require $routes[$uri]
            : abort();
    }
}

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
routeToController($uri, $routes);