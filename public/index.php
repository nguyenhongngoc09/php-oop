<?php
// Auto load needed classes
spl_autoload_register(function($class) {
    include './leet-code/'.$class.'.php';
});

// run
$object = new BinarySearch();
$object->execute();