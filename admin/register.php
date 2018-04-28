<?php
  require_once '../core/init.php';
  include 'includes/head.php';
  include 'includes/navigation.php';

  //query database
  $sql = "SELECT * FROM user_profile";
  $results = $db->query($sql);
  $errors = array();

  //If register form is submitted
  if(isset($_POST['submitRegistration'])){
    $username = sanitize($_POST['usernameRegister']);
    $password = sanitize($_POST['passwordRegister']);
    $firstname = sanitize($_POST['firstnameRegister']);
    $lastname = sanitize($_POST['lastnameRegister']);
    $email = $_POST['emailRegister'];

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
<div class="row center-col-spacing" id="form-content">
<div class="col-sm-4"></div>
  <form class="float-center" id="reg-form" method="post">
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
      <div class="row">
        <div class="col-sm-6 form-group">
          <label for="usernameLogin">Username</label>
          <input type="text" class="form-control" id="usernameRegister" name="usernameRegister" required>
        </div>
        <div class="col-sm-6 form-group">
          <label for="passwordRegister">Password</label>
          <input type="password" class="form-control" id="passwordRegister" name="passwordRegister" required>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6 form-group">
          <label>First Name</label>
          <input type="text" class="form-control" id="firstnameRegister" name="firstnameRegister" required>
        </div>
          <div class="col-sm-6 form-group">
            <label>Last Name</label>
            <input type="text" class="form-control" id="lastnameRegister" name="lastnameRegister" required>
          </div>
        </div>
      <div class="form-group">
        <label>Email Address</label>
        <input type="text" class="form-control" id="emailRegister" name="emailRegister" required>
      </div>
      <div class="form-group">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="acceptTermsCheck" required>
          <label class="form-check-label" for="acceptTermsCheck">Agree to terms and conditions.</label>
        </div>
      </div>
      <input type="submit" class="btn btn-info" id="submitRegistration" name="submitRegistration" value="Submit"></input>

    </div>
  </div>
  </form>
