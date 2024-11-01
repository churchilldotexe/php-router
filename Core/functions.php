<?php

function dd($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';

    exit();
}

function isUrl(string $url): bool
{
    return $_SERVER['REQUEST_URI'] === $url;
}

function abort(int $code = 404): void
{
    http_response_code($code);
    require base_path("views/{$code}.view.php");
    exit();
}

function authorize(bool $condition, int $status): void
{
    $condition && abort($status);
}


function base_path(string $dir)
{
    return BASE_PATH.$dir;
}

function redirect(string $path)
{

    header("location: {$path}");
    exit();
}

function view(string $dir, array $attributes = [])
{
    extract($attributes);
    require base_path("views/{$dir}");
}
