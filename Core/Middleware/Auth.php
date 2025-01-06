<?php

namespace Core\Middleware;

class Auth extends Middleware
{
    public function handle(): void
    {
        if (! isset($_SESSION['user'])) {
            header('Location: /');
            die();
        }
    }
}