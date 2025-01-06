<?php

declare(strict_types=1);

namespace Core;

class Validator
{
    public static function text(string $value, int $min = 1, int|float $max = INF): bool
    {
        $value = trim($value);

        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public static function email(string $value): bool
    {
        if (! filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        return true;
    }

    public static function password(string $password, int $min = 7, int|float $max = 255): bool
    {
        return self::text($password, min: $min, max: $max);

        // if (! self::text($password, min: 7, max: 255)) {
        //     return false;
        // }

        // [$hasLower, $hasUpper, $hasNumber, $hasSymbol] = [false, false, false, false];

        // foreach (str_split($password) as $char) {
        //     match (true) {
        //         ctype_lower($char) => $hasLower = true,
        //         ctype_upper($char) => $hasUpper = true,
        //         ctype_digit($char) => $hasNumber = true,
        //         ! ctype_alnum($char) => $hasSymbol = true,
        //     };

        //     if ($hasLower && $hasUpper && $hasNumber && $hasSymbol) {
        //         return true;
        //     }
        // }

        // return $hasLower && $hasUpper && $hasNumber && $hasSymbol;
    }

    // public static function password(string $value): bool
    // {
    //     return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z\d])[\s\S]{8,}$/', $value);
    // }
}
