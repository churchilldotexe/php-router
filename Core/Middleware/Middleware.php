<?php

namespace Core\Middleware;

class Middleware
{
    protected const MAP = [
        'guest' => Guest::class,
        'auth' => Auth::class,
    ];

    public static function resolve(?string $key)
    {
        if (! $key) {
            return;
        }

        $middleware = static::MAP[$key] ?? false;

        if (! $middleware) {
            throw new \Exception("Unable to find the {$key}");
        }

        (new $middleware)->redirect();

    }
}
