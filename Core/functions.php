<?php

use Core\Enums\Response;

if (! function_exists('dd')) {
    function dd(mixed $value): never {
        echo "<pre>";
        var_dump($value);
        echo "</pre>";

        die();
    }
}

if (! function_exists('abort')) {
    function abort(Response $code = Response::PageNotFound): never {
        $code = $code->value;

        http_response_code($code);

        require base_path("views/{$code}.php");

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
            abort($statusCode);
        }
    }
}

if (! function_exists('base_path')) {
    function base_path(string $path): string {
        return BASE_PATH . $path;
    }
}

if (! function_exists('view')) {
    function view(string $path, array $attributes = []): void {
        extract($attributes);

        require base_path('views/' . $path);
    }
}

if (! function_exists('login')) {
    function login(mixed $user): void {
        $_SESSION['user'] = [
            'email' => $user['email'],
        ];

        session_regenerate_id(true);
    }
}

if (! function_exists('logout')) {
    function logout(): void {
        session_unset();

        session_destroy();

        session_write_close();

        $params = session_get_cookie_params();

        setcookie('PHPSESSID', expires_or_options: time() - 3600, path: $params['path'], domain: $params['domain']);
    }
}
