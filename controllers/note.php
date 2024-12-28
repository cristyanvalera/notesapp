<?php

$config = require('config.php');
$db = new Database($config['database']);

$title = 'Note';
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

require 'views/note.view.php';
