<?php
session_start();

/**
 * @return bool
 */
function isLoggedIn()
{
    return isset($_SESSION['user_id']);
}