<?php
require_once '/dinner/core/init.php';
include_once '/dinner/helpers/helpers.php';

$user_check = $_SESSION['login_user'];

$ses_sql = mysqli_query($db, "SELECT username FROM user_profile WHERE username = '$user_check'");
$row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);

$login_session = $row['username'];

if (!isset($_SESSION['login_user'])){
  header('Location: dinner/admin/login.php');
}
