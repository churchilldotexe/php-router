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

function login(array $userInfo)
{

    $_SESSION['user'] = [
        'email' => $userInfo['email'],
    ];
    session_regenerate_id(true);
}

function logout()
{
    $_SESSION = [];
    session_destroy();

    $params = session_get_cookie_params();
    setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
}

function base_path(string $dir)
{
    return BASE_PATH.$dir;
}

function view(string $dir, array $attributes = [])
{
    extract($attributes);
    require base_path("views/{$dir}");
}
