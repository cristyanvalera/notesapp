<?php

namespace Core;

class App
{
    protected static Container $container;

    public static function setContainer(Container $container): static
    {
        static::$container = $container;

        return new static();
    }

    public static function container(): Container
    {
        return static::$container;
    }

    public static function bind(string $key, callable $resolver): void
    {
        static::$container->bind($key, $resolver);
    }

    public static function resolve(string $key): mixed
    {
        return static::$container->resolve($key);
    }
}