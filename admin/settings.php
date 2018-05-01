<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/dinner/core/init.php';
  include 'includes/head.php';
  include 'includes/navigation.php';

 ?>
<div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6">
    <div class="accordion" id="accordion">
      <div class="card">
        <div class="card-header text-center" id="headingOne">
          <h5 class="mb-0">
          <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Account
          </button>
          </h5>
        </div>
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
          <div class="card-body">
            <table class="table text-center">
              <thead>
                <tr>
                  <th>Account</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Firstname</td>
                </tr>
                <tr>
                  <td>Lastname</td>
                </tr>
                <tr>
                  <td>Username</td>
                </tr>
                <tr>
                  <td>Password</td>
                </tr>
                <tr>
                  <td>Password again</td>
                </tr>
                <tr>
                  <td>Email</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header text-center" id="headingTwo">
          <h5 class="mb-0">
          <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Profile
          </button>
          </h5>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
          <div class="card-body">

          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header text-center" id="headingThree">
          <h5 class="mb-0">
          <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            Layout
          </button>
          </h5>
        </div>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
          <div class="card-body">

          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-3"></div>
</div>
