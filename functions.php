<?php

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}


function isUrl(string $url): bool
{
    return $_SERVER['REQUEST_URI'] === $url;
}

function authorize(bool $condition, int $status): void
{
    $condition && abort($status);
}
