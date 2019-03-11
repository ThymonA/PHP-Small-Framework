<?php

namespace Framework;

class Database
{
    private $_connection;
    private $config;

    public function __construct()
    {
        global $container;

        $this->config = $container->get('Config');
        try {
            $this->_connection = new PDO(
                'mysql:host='.$this->config->database->host.';port='.$this->config->database->port.';dbname='.$this->config->database->database.'',
                $this->config->database->username,
                $this->config->database->password);
        } catch (PDOException $exception) {
            ErrorHandler::Error('Cannot connect to database: ' . $exception->getMessage());
        }
    }


    public function execute($statement, $args)
    {
    }
}
