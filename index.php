<?php

define('ENV', 'develop');

require('config.php');
require('core/functions.php');

if (ENV === 'develop') {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    set_error_handler('showErrorHandler');
}

// Load third party libs

if (file_exists('vendor/autoload.php')) {
    require('vendor/autoload.php');
}

$autoLoads = [
    'Controller',
    'Model',
    'Database',
    'Request',
];

foreach ($autoLoads as $file) {
    require ('core/' . $file . '.php');
}

$request = new Request();

// Create database
$databaseDriverName = $config['database']['driver'].'Driver';
require ('lib/database_drivers/'.$databaseDriverName.'.php');
$database = new $databaseDriverName();

// Create controller
$controllerName = $request->controller;
$actionName = $request->action;

if (!file_exists('controllers/'. $controllerName . '.php')) {
    show404Error();
}

require ('controllers/'. $controllerName . '.php');
$controller = new $controllerName();

if (!method_exists($controller, $actionName)) {
    show404Error();
}

$controller->$actionName();