<?php
/**
 * PDO has Excellent exception mode, auto-detect var
 */
require_once 'includes/config.php';
require_once 'includes/Databases.php';

$object = new Database();
echo $object->connect();