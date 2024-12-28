<?php

$config = require('config.php');
$db = new Database($config['database']);

$note = $db->query(
    query: 'select * from notes where id = :id',
    params: [
        'id' => $_GET['id'],
    ],
)->fetch();

if (! $note) {
    abort();
}

$currentUser = 1;

if ($note['user_id'] !== $currentUser) {
    abort(Response::Forbidden);
}

$title = 'Note';

require 'views/note.view.php';
