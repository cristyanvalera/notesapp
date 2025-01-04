<?php

use Core\{App, Database};

$db = App::resolve(Database::class);

$notes = $db->query('select * from notes')->all();

view('notes/index.view.php', [
    'title' => 'My Notes',
    'notes' => $notes,
]);