<?php

declare(strict_types=1);

require 'Validator.php';

$config = require('config.php');
$db = new Database($config['database']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];

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

$title = 'Create Note';

require 'views/notes/create.view.php';