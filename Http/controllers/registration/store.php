<?php

use Core\{App, Authenticator, Database, Validator};

/** @var Database */
$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (! Validator::email($email)) {
    $errors['email'] = 'The email address is invalid.';
}

if (! Validator::password($password)) {
    $errors['password'] = 'The password is invalid.';
}

if (! empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors,
    ]);
}

$user = $db->query("select * from users where email = :email", [
    'email' => $email,
])->find();

if ($user) {
    header('location: /');
    die();
} else {
    $db->query("insert into users (email, password) values (:email, :password)", [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT),
    ]);

    $user = $db->query("select * from users where email = :email", [
        'email' => $email,
    ])->find();

    new Authenticator()->login($user);

    header('location: /');
    die();
}
