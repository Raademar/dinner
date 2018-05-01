<?php
  require_once '../core/init.php';
  include 'includes/head.php';
  if(isset($_GET['success'])):
  include 'includes/navigation.php';
  endif;

  //query database
  $sql = "SELECT * FROM user_profile";
  $results = $db->query($sql);
  $errors = array();

  //If register form is submitted
  if(isset($_POST['submitRegistration'])){
    $username = sanitize($_POST['usernameRegister']);
    $password = filter_input($_POST['passwordRegister'], 'p', FILTER_SANITIZE_STRING);
    if (strlen($password) != 128) {
      // The hashed password should be 128 characters long.
      $errors .= 'Invalid Password.';
    }

    $firstname = sanitize($_POST['firstnameRegister']);
    $lastname = sanitize($_POST['lastnameRegister']);
    $email = filter_var($_POST['emailRegister'], FILTER_VALIDATE_EMAIL);
    if (!filter_var($_POST['emailRegister'], FILTER_VALIDATE_EMAIL)) {
      $errors[] .= "Thats not a valid email. Please try again.";
    }

    // check if user already exsist in database
    $sql = "SELECT * FROM user_profile WHERE username = '$username'";
    $results = $db->query($sql);
    $count = mysqli_num_rows($results);
    if($count > 0){
      $errors[] = $username. ' already exsists as a Username, please choose another.';
    }

    //display errors if any
    if(!empty($errors)){
      echo display_errors($errors);
      header('Location: register.php?failed');
    }else{
      //Add new user to database
      $sql = "INSERT INTO user_profile (username, password, auth_level, date_created, full_name, email, active)
      VALUES ('$username', '$password', '3', NOW(), '$firstname $lastname', '$email', '0')";


    $db->query($sql);
    header('Location: register.php?success=true');

    }
  }
  ?>
<div class="row" id="mainBackgroundColor">
<div class="col-sm-4"></div>
<div class="col-sm-4">
<div class="form-container">
  <form class="float-center" id="reg-form" method="post">
    <div class="form-group row">
      <div class="col-sm-12">
        <h1 class="text-center">Register Account</h1>
      </div>
    </div>
    <?php if(isset($_GET['success'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          Your account was successfully registered. Welcome to our world!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
    <?php endif; ?>
    <?php if(isset($_GET['failed'])): ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Something went wrong... Please try again!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
    <?php endif; ?>
    <div class="col-sm-12">
      <div class="form-group row">
        <div class="col-sm-12">
          <input type="text" class="form-control" id="usernameRegister" name="usernameRegister" placeholder="Username" required>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-12">
          <input type="password" class="form-control" id="passwordRegister" name="passwordRegister" placeholder="Password" required>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-12">
          <input type="text" class="form-control" id="firstnameRegister" name="firstnameRegister" placeholder="First Name" required>
        </div>
      </div>
      <div class="form-group row">
          <div class="col-sm-12">
            <input type="text" class="form-control" id="lastnameRegister" name="lastnameRegister" placeholder="Last Name"required>
          </div>
        </div>
      <div class="form-group row">
        <div class="col-sm-12">
          <input type="text" class="form-control" id="emailRegister" name="emailRegister" placeholder="Email Address" required>
        </div>
      </div>
      <div class="form-group">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="acceptTermsCheck" required>
          <label class="form-check-label" for="acceptTermsCheck">Agree to terms and conditions.</label>
        </div>
      </div>
      <input type="submit" class="btn btn-outline-light" id="submitRegistration" name="submitRegistration" value="Register"></input>
      </div>
    </form>
  </div>
</div>
</div>
