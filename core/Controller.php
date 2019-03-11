<?php

namespace Framework;

use Framework\Session as Session;
use Framework\Helper as Helper;
use Framework\Validator as Validator;

abstract class Controller
{
    protected $session;
    protected $helper;
    protected $validator;
    protected $view;
    public function __construct()
    {
        $this->session = new Session();
        $this->helper = new Helper();
        $this->view = new View();
        $this->validator = new Validator();
    }

    abstract public function index();

    protected function model($name)
    {
        $model_path = DOC_ROOT . '/app/models/'.$name.'.php';

        if (file_exists($model_path)) {
            require_once $model_path;

            $namespaced = "\App\Models\\".$name;

            return new $namespaced();
        } else {
            ErrorHandler::Error("Model: ".$name.".php doesnt exists!");
        }
    }

    protected function modelFunction($name, $function, $args)
    {
        $tmp_model = $this->model($name);

        if (method_exists($tmp_model, $function)) {
            return call_user_func_array(array($tmp_model, $function), $args);
        }
    }
}
