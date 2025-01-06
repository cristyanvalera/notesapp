<?php

use Core\{App, Database, Validator};

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

/** @var Database */
$db = App::resolve(Database::class);

$user = $db->query("select * from users where email = :email", [
    'email' => $email,
])->find();

if ($user) {
    header('location: /');
    die();
} else {
    $user = $db->query("insert into users (email, password) values (:email, :password)", [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT),
    ]);

    $_SESSION['user'] = ['email' => $email];

    header('location: /');
    die();
}
