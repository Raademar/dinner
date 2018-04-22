<?php
  session_start();
  require_once '../core/init.php';
  include 'includes/head.php';
  include 'includes/navigation.php';


  if (!isset($_SESSION['count'])){
    $_SESSION['count'] = 0;
  } else {
    $_SESSION['count']++;
  }


 ?>
