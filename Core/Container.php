<?php

namespace Core;

class Container
{
    protected $container = [];

    public function bind(string $key, callable $resolver): void
    {
        $this->container[$key] = $resolver;
    }

    public function resolve(string $key): mixed
    {
        if (! array_key_exists($key, $this->container)) {
            throw new \Exception("unable to find the value of the {$key}.");
        }

        return call_user_func($this->container[$key]);
    }
}
