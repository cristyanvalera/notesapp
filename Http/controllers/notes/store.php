<?php

use Core\{App, Database};
use Http\Forms\NoteStoreForm;

$db = App::resolve(Database::class);

$body = $_POST['body'];
$form = new NoteStoreForm();

if (! $form->validate($body)) {
    return view('notes/create.view.php', [
        'title' => 'Create Note',
        'errors' => $form->errors(),
    ]);
}

$db->query("INSERT INTO notes (body, user_id) VALUES (:body, :user_id)", [
    'body' => $_POST['body'],
    'user_id' => 1,
]);

header('Location: /notes');
die();
