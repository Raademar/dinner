<?php
  require_once '../core/init.php';
  include 'includes/head.php';
  
 ?>

<div class="row" id="mainBackgroundColor">
  <div class="col-md-4"></div>
  <div class="col-md-4">
      <div class="form-container">
        <form id="login-form" method="post">
          <div class="form-group row">
            <div class="col-sm-12">
              <h1 class="text-center">Sign In</h1>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-1 col-form-label"><i class="fas fa-user-circle fa-2x icon-padding"></i></label>
            <div class="col-sm-11">
              <input type="text" class="form-control" id="inputEmail3" placeholder="Username">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-1 col-form-label"><i class="fas fa-key fa-2x icon-padding"></i></label>
            <div class="col-sm-11">
              <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
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
