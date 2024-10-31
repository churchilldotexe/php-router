<?php

namespace Core;

class Validator
{
    public static function string(string $value, int $min = 1, int|float $max = INF): bool
    {
        $trimmedValue = trim($value);

        return strlen($trimmedValue) >= $min && strlen($trimmedValue) <= $max;
    }
}
