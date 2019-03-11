<?php

return [
    'Config' => include APP_ROOT . 'config.php',
    \Framework\Application::class => DI\create(),
    \Framework\Session::class => DI\create(),
    \Klein\Klein::class => DI\create()
];