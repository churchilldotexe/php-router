<?php

namespace Core\Middleware;

class Guest
{
    public function redirect()
    {
        if ($_SESSION['user'] ?? false) {
            header('location: /');
            exit();
        }
    }
}
