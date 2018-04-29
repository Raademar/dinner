<?php

require_once '/dinner/core/init.php';
include_once '/dinner/helpers/helpers.php';

//start secure new session.
sec_session_start();

//Unset all session values.
$_SESSION = array();

//get permission parameters.

$params = sessions_get_cookie_params();

//Delete the actual cookie.
setcookie(session_name()),
        '', time() - 42000,
        $params['path'],
        $params['domain'],
        $params['secure'],
        $params['httponly']);

// Destroy session.
session_destroy();
header('Location: login.php');
