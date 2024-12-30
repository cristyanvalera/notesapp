<?php

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . '/core/functions.php';

spl_autoload_register(function (string $class) {
    require base_path("core/{$class}.php");
});

require base_path('core/enums/Response.php');
require base_path('core/router.php');


