<?php

namespace Framework;

use \Framework\ErrorHandler as ErrorHandler;

class View
{
    public function __construct()
    {
    }

    public function loadView($name, array $dataset)
    {
        $view_path = DOC_ROOT . '/app/views/'.$name.'.php';

        if (file_exists($view_path)) {
            include_once $view_path;
        } else {
            ErrorHandler::Error("View: ".$name.".php doesnt exists!");
        }
    }
}
