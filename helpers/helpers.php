<?php
function display_errors($errors){
  $display = '<ul class="bg-danger">';
  foreach($errors as $error){
    $display .= '<li class="text-light">'.$error.'</li>';
  }
  $display .= '</ul>';
  return $display;
}
?>
