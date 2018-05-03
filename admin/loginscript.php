<?php
// require_once '/dinner/core/init.php';
// include_once '/dinner/helpers/helpers.php';


//Start a new session.
// session_start();
//
// if ($_SERVER['REQUEST_METHOD'] == 'POST'){
//   // username and password sent from form
//   $myUsername = mysqli_real_escape_string($db, $_POST['usernameLogin']);
//   $myPassword = mysqli_real_escape_string($db, $_POST['passwordLogin']);
//
//   $sql = "SELECT id FROM user_profile WHERE username = '$myUsername' and password = '$myPassword'";
//   $result = mysqli_query($db, $sql);
//   $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
//   $active = $row['active'];
//
//   $count = mysqli_num_rows($result);
//
//   // If result matched $myUsername and $myPassword, table row must be 1 row
//
//   if($count == 1) {
//     session_register('myUsername');
//     $_SESSION['login_user' = $myUsername];
//     header('Location: dinner/index.php')
//   } else {
//     $errors = "Your username or password is invalid."
//   }
// }
