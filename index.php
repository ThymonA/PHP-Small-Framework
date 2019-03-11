<?php

/** Namespace */
namespace Framework;

/** Uses */
use DI\Container;
use DI\ContainerBuilder;

/** Variables */
define('DS', DIRECTORY_SEPARATOR);
define('DOC_ROOT', dirname(__FILE__) . DS);
define('APP_ROOT', DOC_ROOT . 'app' . DS);
define('CORE_ROOT', DOC_ROOT . 'core' . DS);
define('CONTROLLERS', APP_ROOT . 'controllers' . DS);
define('VIEWS', APP_ROOT . 'views' . DS);

/** Autoload */
require_once 'vendor/autoload.php';

/** @var ContainerBuilder $builder Dependency Injection */
$builder = new ContainerBuilder();
$builder->addDefinitions(APP_ROOT . 'di.php');

try {
    /** @var Container $container Dependency Injection Container */
    $container = $builder->build();

    $application = $container->get(Application::class);
    $session = $container->get(Session::class);

    $session->startSession();
    $application->router->dispatch();
}
catch (\Exception $e)
{
    header("HTTP/1.1 500 Internal Server Error", true, 500);
    echo '500 Internal Server Error';
    die();
}

