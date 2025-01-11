<?php

declare(strict_types=1);

namespace Core;

class Session
{
    public static function has(mixed $key): bool
    {
        return (bool) static::get($key);
    }

    public static function put(mixed $key, mixed $value): void
    {
        $_SESSION[$key] = $value;
    }

    public static function get(string $key, mixed $default = null): mixed
    {
        return $_SESSION['_flash'][$key] ?? $_SESSION[$key] ?? $default;
    }

    public static function flash(string $key, mixed $value): void
    {
        $_SESSION['_flash'][$key] = $value;
    }

    public static function unflash(): void
    {
        unset($_SESSION['_flash']);
    }

    public static function flush(): void
    {
        $_SESSION = [];
    }

    public static function destroy()
    {
        static::flush();

        session_destroy();

        $params = session_get_cookie_params();

        setcookie(
            name: 'PHPSESSID',
            expires_or_options: time() - 3600,
            path: $params['path'],
            domain: $params['domain'],
        );
    }
}