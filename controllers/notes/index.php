<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$notes = $db->query('select * from notes')->all();

view('notes/index.view.php', [
    'title' => 'My Notes',
    'notes' => $notes,
]);