<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/dinner/core/init.php';
  include 'includes/head.php';
  include 'includes/navigation.php';

  ?>
<div class="row center-col-spacing">
<div class="col-sm-4"></div>
  <form class="float-center">
    <div class="col-sm-12">
      <div class="row">
        <div class="col-sm-6 form-group">
          <label for="usernameLogin">Username</label>
          <input type="text" placeholder="Enter Username Here.." class="form-control" id="usernameLogin" required>
        </div>
        <div class="col-sm-6 form-group">
          <label for="passwordRegister">Password</label>
          <input type="password" placeholder="Enter Password Here.." class="form-control" id="passwordRegister" required>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6 form-group">
          <label>First Name</label>
          <input type="text" placeholder="Enter First Name Here.." class="form-control" id="firstnameRegister" required>
        </div>
          <div class="col-sm-6 form-group">
            <label>Last Name</label>
            <input type="text" placeholder="Enter Last Name Here.." class="form-control" id="lastnameRegister" required>
          </div>
        </div>
      <div class="form-group">
        <label>Email Address</label>
        <input type="text" placeholder="Enter Email Address Here.." class="form-control" id="emailRegister" required>
      </div>
      <div class="form-group">
        <label>Website</label>
        <input type="text" placeholder="Enter Website Name Here.." class="form-control" id="websiteRegister">
      </div>
      <div class="form-group">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="acceptTermsCheck" required>
          <label class="form-check-label" for="acceptTermsCheck">Agree to terms and conditions.</label>
        </div>
      </div>
      <button type="submit" class="btn btn-info">Submit</button>
    </div>
  </div>
  </form>
