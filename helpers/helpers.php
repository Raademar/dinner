<?php
function display_errors($errors){
  $display = '<ul class="bg-danger">';
  foreach($errors as $error){
    $display .= '<li class="text-light">'.$error.'</li>';
  }
  $display .= '</ul>';
  return $display;
}

function sanitize($dirty){
  return htmlentities($dirty,ENT_QUOTES,"UTF-8");
}
