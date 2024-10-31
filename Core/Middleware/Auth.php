<?php

namespace Core\Middleware;

class Auth
{
    public function redirect()
    {
        if (! isset($_SESSION['user']) ?? false) {
            header('location: /');
            exit();
        }

    }
}
