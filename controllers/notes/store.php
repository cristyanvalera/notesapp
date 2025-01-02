<?php

use Core\{Database, Validator};

$config = require base_path('config.php');
$db = new Database($config['database']);

$errors = [];

if (! Validator::text($_POST['body'], 3, 1000)) {
    $errors['body'] = 'A body of no more than 1.000 characters and minimum 3 characters is required';
}

if (! empty($errors)) {
    return view('notes/create.view.php', [
        'title' => 'Create Note',
        'errors' => $errors,
    ]);
}

$db->query("INSERT INTO notes (body, user_id) VALUES (:body, :user_id)", [
    'body' => $_POST['body'],
    'user_id' => 1,
]);

header('Location: /notes');
die();
