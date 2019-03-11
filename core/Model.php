<?php

namespace Framework\Core;

use Framework\ErrorHandler;

class Model
{
    public $database;

    public function __construct()
    {
        global $container;

        $config = $container->get('Config');

        try {
            $this->_connection = new PDO(
                'mysql:host='.$config->database->host.';port='.$config->database->port.';dbname='.$config->database->database.'',
                $config->database->username,
                $config->database->password);
        } catch (PDOException $exception) {
            ErrorHandler::Error('Cannot connect to database: ' . $exception->getMessage());
        }
    }
}
