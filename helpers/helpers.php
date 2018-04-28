<?php
include_once '../config.php';

// Secure PHP session

function sec_session_start(){
  $session_name = 'sec_session_id'; //Set a custom session name
  $secure = SECURE;
  //Stop Javascript being able to access the session id.
  $httponly = true;
  //Force the sessions to only use cookies.

  if (ini_set('session.use_only_cookies', 1) === FALSE) {
    header("Location: ../error.php?err=Could not initiate a safe session (ini_set)");
    exit();
  }
  //Get current cookie params.
  $cookieParams = sessions_get_cookie_params();
  sessions_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httponly);
  //Set session name to the one set above.
  session_name($session_name);
  session_start();    //Start the PHP session
  session_regenerate_id();    //regenerated the session, delete the old one.
}

// Login function

function login($email, $password, $mysqli){

  if ($stmt = $mysqli->prepare("SELECT id, username, password FROM user_profile WHERE email = ? LIMIT 1")){
    $stmt->bind_param('s', $email);     // Binds $email to parameter.
    $stmt->execute();     //execute the prepared query
    $stmt->store_result();

    //Get variables from the result
    $stmt->bind_result($user_id, $username, $db_password);
    $stmt->fetch();

    if ($stmt->num_rows == 1) {
      // If the user exist we check if the user account is locked from to many login attempts

      if (checkbrute($user_id, $mysqli) == true) {
        //Account is locked
        // Display error message and ask user to reset password!
        return false;
      } else {
          //Check if the password in the database matches the password submitted with password_verify function
          if (password_verify($password, $db_password)) {
            //password matches
            //get user-agent string of the user.
            $user_browser = $_SERVER['HTTP_USER_AGENT'];
            // XSS protection as we might print this value
            $user_id = preg_replace("/[^0-9]+/", "", $user_id);
            $_SESSION['user_id'] = $user_id;
            // XSS protection as we might print this value
            $username = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username);
            $_SESSION['username'] = $username;
            $_SESSION['login_string'] = hash('sha512', $db_password . $user_browser);
            // Login successfull.
            return true;
          } else {
            // Password is not correct
            // Record this attempt in the database.
            $now = time();
            $mysqli->query("INSERT INTO login_attempt(user_id, time) VALUES ('$user_id', '$now')");
            return false;
          }
        }
      } else {
        // No user exists.
        return false;
    }
  }
}

//Prevent brute force attacks

function checkbrute($user_id, $mysqli) {
  // Get timestamp
  $now = time();

// All login attempts are counte from the past 2 hours.

$valid_attempts = $now - (2 * 60 * 60);

if ($stmt = $mysqli->prepare("SELECT time FROM login_attempts WHERE user_id = ? AND time > '$valid_attempts'")) {
  $stmt->bind_param('i', $user_id);

  //Execute the prepare query
  $stmt->execute();
  $stmt->store_result();

  // If there have been more than 5 failed logins
  if ($stmt->num_rows > 5){
    return true;
  } else {
    return false;
    }
  }
}

//Check logged in status.

function login_check($mysqli) {
  //check if all sessions are set
  if (isset($_SESSION['user_id'], $_SESSION['username'], $_SESSION['login_string'])) {
    $user_id = $_SESSION['user_id'];
    $login_string = $_SESSION['login_string'];
    $username = $_SESSION['username'];

    //Get the user-agent string of the user
    $user_browser = $_SESSION['HTTP_USER_AGENT'];

    if ($stmt = $mysqli->prepare("SELECT password FROM user_profile WHERE id = ? LIMIT 1")) {

      //Bind '$user_id' to parameter.
      $stmt->bind_param('i', $user_id);
      $stmt->execute();   //execute the prepare query.
      $stmt->result();

      if ($stmt->num_rows == 1) {
        //if the user exists get the variables from result.
        $stmt->bind_result($password);
        $stmt->fetch();
        $login_check = hash('sha512', $password . $user_browser);

        if (hash_equals($login_check, $login_string) ) {
          //logged in!
          return true;
        } else {
          // Not logged in.
          return false;
        }
      } else {
        // Not logged in.
        return false;
      }
    } else {
      // Not logged in.
      return false;
    }
  } else {
    // not logged in.
    return false;
  }
}

// Sanitize URL from PHP_SELF

function esc_url($url) {

  if ('' == $url){
    return $url;
  }

  $url = preg_replace('|[^a-z0-9-~+_.?#=!&;,/:%@$\|*\'()\\x80-\\xff]|i', '', $url);

  $strip = array('%0d', '%0a', '%0D', '%0A');
  $url = (string) $url;

  $count = 1;
  while ($count) {
    $url = str_replace($strip, '', $url, $count);
  }

  $url = str_replace(';//', '://', $url);
  $url = htmlentities($url);
  $url = str_replace('&amp', '&#038', $url);
  $url = str_replace("'", '&#039', $url);

  if ($url[0] !== '/') {
    return '';
  } else {
    return $url;
  }
}


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
