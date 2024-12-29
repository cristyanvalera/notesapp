<?php

declare(strict_types=1);

class Validator
{
    public static function text(string $value, int $min = 1, int|float $max = INF): bool
    {
        $value = trim($value);

        return strlen($value) >= $min && strlen($value) <= $max;
    }
}