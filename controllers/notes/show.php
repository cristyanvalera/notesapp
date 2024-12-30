<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$currentUser = 1;

$note = $db->query('select * from notes where id = :id', [
    'id' => $_GET['id'],
])->findOrFail();

authorize($note['user_id'] === $currentUser);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    authorize($note['user_id'] === $currentUser);

    $db->query('delete from notes where id = :id', [
        'id' => $_GET['id'],
    ]);

    header('Location: /notes');
    die();
}

view('notes/show.view.php', [
    'title' => 'Note',
    'note' => $note,
]);
