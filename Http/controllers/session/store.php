<?php

use Core\{App, Database};
use Http\Forms\LoginForm;

/** @var Database */
$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if (! $form->validate($email, $password)) {
    return view('session/create.view.php', [
        'errors' => $form->errors(),
    ]);
}

$user = $db->query("select id, email, password from users where email = :email", [
    'email' => $email,
])->find();

if ($user) {
    if (password_verify($password, $user['password'])) {
        login([
            'email' => $user['email'],
        ]);

        header('Location: /');
        die();
    }
}

return view('session/create.view.php', [
    'errors' => [
        'email' => 'No matching account found for this credentials.',
    ],
]);

