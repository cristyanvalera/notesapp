<?php

use Core\{App, Database, Validator};

/** @var Database */
$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (! Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address.';
}

if (! Validator::password($password)) {
    $errors['password'] = 'Please provide a valid password.';
}

if (! empty($errors)) {
    return view('session/create.view.php', [
        'errors' => $errors,
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

