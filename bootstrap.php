<?php

use Core\{App, Container, Database};

App::setContainer(new Container)::bind(Database::class, function () {
    $config = require base_path('config.php');

    return new Database($config['database']);
});
