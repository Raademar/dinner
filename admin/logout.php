<?php

require_once '/dinner/core/init.php';
include_once '/dinner/helpers/helpers.php';

session_start();

if(session_destroy()){
  header('Location: dinner/admin/login.php');
}
