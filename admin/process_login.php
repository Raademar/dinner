<?php
require_once '../core/init.php';
include_once '../helpers/helpers.php';


//Start a new secure session.
sec_session_start();


if (isset($_POST['email'], $_POST['p'])) {
  $email = $_POST['email'];
  $password = $_POST['p']; //Hashed password.

  if (login($email, $password, $mysqli == true)) {
    // Login success
    header('Location: protected_page.php');
  } else {
    // Login faled.
    header('Location: index.php?error=1');
  }
} else {
  // The correct POST variables were not sent to this page.
  echo 'Invalid Request';
}
