<?php

declare(strict_types=1);

$config = require base_path('config.php');
$db = new Database($config['database']);

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (! Validator::text($_POST['body'], 3, 1000)) {
        $errors['body'] = 'A body of no more than 1.000 characters and minimum 3 characters is required';
    }

    if (empty($errors)) {
        $db->query("INSERT INTO notes (body, user_id) VALUES (:body, :user_id)", [
            'body' => $_POST['body'],
            'user_id' => 1,
        ]);
    }
}

view('notes/create.view.php', [
    'title' => 'Create Note',
    'errors' => $errors,
]);
