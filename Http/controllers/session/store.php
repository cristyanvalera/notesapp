<?php

declare(strict_types=1);

use Core\Session;

$form = new Http\Forms\LoginForm();

$email = $_POST['email'];
$password = $_POST['password'];

if ($form->validate($email, $password)) {
    if (new Core\Authenticator()->attempt($email, $password)) {
        redirect('/');
    }

    $form->addError('email', 'No matching account found for this email.');
}

Session::flash('errors', value: $form->errors());

Session::flash('old', [
    'email' => $email,
]);

return redirect('/login');

