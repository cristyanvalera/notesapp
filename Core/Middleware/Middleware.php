<?php

namespace Core\Middleware;

class Middleware
{
    public const array MAP = [
        'auth' => Auth::class,
        'guest' => Guest::class,
    ];

    public static function resolve(?string $key = null): void
    {
        if ($key === null) {
            return;
        }

        $middleware = static::MAP[$key] ?? false;

        if (! $middleware) {
            throw new \Exception("Middleware '{$key}' not found.");
        }

        new $middleware()->handle();
    }
}