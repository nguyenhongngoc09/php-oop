<?php

/**
 * @param $errno
 * @param $errstr
 * @param $errfile
 * @param $errline
 */
function showErrorHandler($errno, $errstr, $errfile, $errline)
{
    echo 'Error number: '. $errno;
    echo '<br>Error message: '. $errstr;
    echo '<br>File: '. $errfile;
    echo '<br>Line: '. $errline;
    echo '<br>';
}

/**
 * Show Page not Found
 */
function show404Error()
{
    die('Page not found!');
}