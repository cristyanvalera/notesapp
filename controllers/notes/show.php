<?php

use Core\{App, Database};

$db = App::resolve(Database::class);

$currentUser = 1;

$note = $db->query('select * from notes where id = :id', [
    'id' => $_GET['id'],
])->findOrFail();

authorize($note['user_id'] === $currentUser);

view('notes/show.view.php', [
    'title' => 'Note',
    'note' => $note,
]);
