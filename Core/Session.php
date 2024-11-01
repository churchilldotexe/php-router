<?php

namespace Core;

class Session
{
    public static function put(string $key, mixed $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function get(string $key, $default = null)
    {
        return $_SESSION['_flash'][$key] ?? $_SESSION[$key] ?? $default;
    }

    public static function flash(string $key, mixed $value)
    {
        return $_SESSION['_flash'][$key] = $value;
    }

    public static function unflash()
    {
        unset($_SESSION['_flash']);
    }

    public static function flush()
    {
        return $_SESSION = [];
    }

    public static function login(array $userInfo): void
    {

        $_SESSION['user'] = [
            'email' => $userInfo['email'],
        ];
        session_regenerate_id(true);
    }

    public static function destroy(): void
    {
        static::flush();
        session_destroy();

        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }
}
