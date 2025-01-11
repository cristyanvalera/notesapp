<?php

namespace Core;

class Authenticator
{
    public function attempt(string $email, string $password): bool
    {
        $user = App::resolve(Database::class)->query("select id, email, password from users where email = :email", [
            'email' => $email,
        ])->find();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $this->login([
                    'email' => $user['email'],
                ]);

               return true;
            }
        }

        return false;
    }

    public function login(mixed $user): void
    {
        $_SESSION['user'] = [
            'email' => $user['email'],
        ];

        session_regenerate_id(true);
    }

    public function logout(): void
    {
        session_unset();

        session_destroy();

        session_write_close();

        $params = session_get_cookie_params();

        setcookie('PHPSESSID', expires_or_options: time() - 3600, path: $params['path'], domain: $params['domain']);
    }
}
