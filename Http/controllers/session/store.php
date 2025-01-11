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

    $form->addError('email', 'No matching account found for this credentials.');
}

Session::flash('errors', value: $form->errors());

return redirect('/login');

