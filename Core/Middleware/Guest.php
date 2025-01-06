<?php

namespace Core\Middleware;

class Guest extends Middleware
{
    public function handle(): void
    {
        if (isset($_SESSION['user'])) {
            header('Location: /');
            die();
        }
    }
}