<?php

return [
    'app' => [
        'name' => 'PHP Template',
        'author' => 'Thymon Arens',
        'version' => '1.0.0'
    ],
    'database' => [
        'host' => '127.0.0.1',
        'username' => 'root',
        'password' => 'root',
        'port' => 3307,
        'database' => 'example'
    ],
    'public' => [
        'css' => DOC_ROOT . '/public/assets/css/',
        'js' => DOC_ROOT . '/public/assets/js/'
    ],
    'error' => [
        'debug' => true,
        'show' => true
    ],
    'sessions' => [
        'name' => ''
    ]
];
