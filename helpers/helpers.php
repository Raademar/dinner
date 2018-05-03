<?php
include_once '/dinner/config.php';

// Secure PHP session

// function sec_session_start(){
//   $session_name = 'sec_session_id'; //Set a custom session name
//   $secure = SECURE;
//   //Stop Javascript being able to access the session id.
//   $httponly = true;
//   //Force the sessions to only use cookies.
//
//   if (ini_set('session.use_only_cookies', 1) === FALSE) {
//     header("Location: ../error.php?err=Could not initiate a safe session (ini_set)");
//     exit();
//   }
//   //Get current cookie params.
//   $cookieParams = sessions_get_cookie_params();
//   sessions_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httponly);
//   //Set session name to the one set above.
//   session_name($session_name);
//   session_start();    //Start the PHP session
//   session_regenerate_id();    //regenerated the session, delete the old one.
// }


function display_errors($errors){
  $display = '<ul class="bg-danger">';
  foreach($errors as $error){
    $display .= '<li class="text-light">'.$error.'</li>';
  }
  $display .= '</ul>';
  return $display;
}

function sanitize($dirty){
  return htmlentities($dirty,ENT_QUOTES,"UTF-8");
}
