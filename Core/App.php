<?php

namespace Core;

class App
{
    protected static $appContainer;

    public static function setContainer(mixed $container)
    {
        static::$appContainer = $container;
    }

    public static function container()
    {
        return static::$appContainer;
    }
}
