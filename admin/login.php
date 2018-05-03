<?php
  require_once '../core/init.php';
  include 'includes/head.php';

  session_start();

  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    // username and password sent from form
    $myUsername = mysqli_real_escape_string($db, $_POST['usernameLogin']);
    $myPassword = mysqli_real_escape_string($db, $_POST['passwordLogin']);

    $sql = "SELECT id FROM user_profile WHERE username = '$myUsername' and password = '$myPassword'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);


    $count = mysqli_num_rows($result);

    // If result matched $myUsername and $myPassword, table row must be 1 row

    if($count == 1) {
      $_SESSION['login_user'] = $myUsername;
      header('Location: /dinner/index.php');
    } else {
      $errors = "Your username or password is invalid.";
    }
  }

 ?>

<div class="row" id="mainBackgroundColor">
  <div class="col-md-4"></div>
  <div class="col-md-4">
      <div class="form-container">
        <form id="login-form" method="post" action="">
          <div class="form-group row">
            <div class="col-sm-12">
              <h1 class="text-center">Sign In</h1>
            </div>
          </div>
          <div class="form-group row">
            <label for="usernameLogin" class="col-sm-1 col-form-label"><i class="fas fa-user-circle fa-2x icon-padding"></i></label>
            <div class="col-sm-11">
              <input type="text" class="form-control" id="usernameLogin" name="usernameLogin" placeholder="Username">
            </div>
          </div>
          <div class="form-group row">
            <label for="passwordLogin" class="col-sm-1 col-form-label"><i class="fas fa-key fa-2x icon-padding"></i></label>
            <div class="col-sm-11">
              <input type="password" class="form-control" id="passwordLogin" name="passwordLogin" placeholder="Password">
            </div>
          </div>
            <div class="form-group row">
              <div class="col-sm-1"></div>
              <div class="col-sm-5">
                <button type="submit" class="btn btn-outline-light align-left">Sign In</button>
              </div>
              <div class="col-sm-6">
                <a href="/dinner/admin/register.php" class=""><p class="text-right">Register?</p></a>
              </div>
            </div>
          </form>
        </div>
      </div>
  <div class="col-md-4"></div>
</div>
