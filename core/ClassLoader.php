<?php

namespace Framework\Core;

class ClassLoader
{
    private $config;
    private $classLoaderPaths = array(
        DOC_ROOT.'/app/controllers/',
        DOC_ROOT.'/app/models/'
    );

    public function __construct()
    {
        global $container;

        $this->config = $container->get('Config');
        $this->_load();
    }

    private function _load()
    {
        foreach ($this->classLoaderPaths as $directory) {
            foreach (glob($directory . "*.php") as $class) {
                require_once $class;
            }
        }
    }
}
