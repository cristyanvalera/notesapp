<?php

use Core\{App, Database, Validator};

/** @var Database */
$db = App::resolve(Database::class);

$note = $db->query("SELECT * FROM notes WHERE id = :id", [
    'id' => $_POST['id'],
])->findOrFail();

$currentUserId = 1;

authorize($note['user_id'] === $currentUserId);

$errors = [];

if (! Validator::text($_POST['body'], min: 3, max: 1000)) {
    $errors['body'] = 'A body of no more than 1.000 characters and minimum 3 characters is required';
}

if (count($errors)) {
    return view('notes/edit.view.php', [
        'title' => 'Edit Note',
        'errors' => $errors,
        'note' => $note,
    ]);
}

$db->query("UPDATE notes SET body = :body WHERE id = :id", [
    'body' => $_POST['body'],
    'id' => $_POST['id'],
]);

header('Location: /notes');
die();