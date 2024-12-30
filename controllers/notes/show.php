<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$currentUser = 1;

$note = $db->query(
    query: 'select * from notes where id = :id',
    params: [
        'id' => $_GET['id'],
    ],
)->findOrFail();

if (! $note) {
    abort();
}

authorize($note['user_id'] === $currentUser);

view('notes/show.view.php', [
    'title' => 'Note',
    'note' => $note,
]);
