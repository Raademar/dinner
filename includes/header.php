<?php
require_once 'core/init.php';
session_start();

$sql3 = "SELECT id FROM user_profile ";
$activeUser = $db->query($sql3);


 ?>

<header>
    <div id="wrapper">
      <!-- Sidebar -->
      <div id="sidebar-wrapper">
          <ul class="sidebar-nav">
              <li class="sidebar-brand">
                  <a href="#"></a>
              </li>
              <li>
                  <a href="#">Dashboard</a>
              </li>
              <li>
                  <a href="#">Overview</a>
              </li>
              <li>
                  <a href="#">Events</a>
              </li>
          </ul>
      </div>
      <!-- /#sidebar-wrapper -->

      <!-- Page Content -->
      <div class="container-fluid" id="page-content-wrapper">
        <div class="row">
          <div class="col-md-10">
            <div id="menu-toggle">
              <div class="bar1"></div>
              <div class="bar2"></div>
              <div class="bar3"></div>
            </div>
          </div>
          <div class="col-md-2">
            <div id="login-nav">
              <span class="login-nav-class profile-text"><a href="#"><i class="fas fa-user"></i></a></span>
              <span class="login-nav-class notification-text"><a href="#"><i class="fas fa-comments"></i></a></span>
              <span class="login-nav-class login-text"><a href="#"><i class="fas fa-sign-in-alt"></i></a></span>
              <span class="login-nav-class register-text"><a href="admin/logout.php">Logout?</a></span>
              <div class="">
                <?php while($user = mysqli_fetch_assoc($activeUser)) : ?>
                <p><?=$user['full_name']; ?></p>
              <?php endwhile; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
<div class="container-fluid">
