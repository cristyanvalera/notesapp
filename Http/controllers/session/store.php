<?php

declare(strict_types=1);

use Core\Authenticator;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = LoginForm::validate(attributes: [
    'email' => $email,
    'password' => $password,
]);

$signedIn = new Authenticator()->attempt($email, $password);

if (! $signedIn) {
    $form->addError(
        key: 'email',
        message: 'No matching account found for this email.',
    )->throw();
}

redirect('/');
