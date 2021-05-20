<?php

require_once('config/config.php');

$autoLoads = array('Core', 'Controller', 'Database');
foreach ($autoLoads as $coreFile) {
    require_once('libraries/' . $coreFile . '.php');
}

// Instantiate core
$coreInit = new Core();