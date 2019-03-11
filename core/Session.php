<?php

namespace Framework;

class Session
{
    private $config;

    public function __construct()
    {
        global $container;

        $this->config = $container->get('Config');
    }

    public function startSession()
    {
        session_start();
    }


    public function addSessionVariable($name, $value)
    {
        $_SESSION[$this->config->sessions->name] = [$name => $value];
    }

    public function setSessionVariable($name, $value)
    {
        $_SESSION[$this->config->sessions->name] = [$name => $value];
    }

    public function getSessionVariable($name)
    {
        return $_SESSION[$this->config->sessions->name][$name];
    }

    public function deleteSessionVariable($name)
    {
        unset($_SESSION[$this->config->sessions->name] [$name]);
    }
}
