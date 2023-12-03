<?php

  check_login();

function check_login(){
  if (isset($_SESSION['user_id']) == false){
    header("Location: includes/signOut.php");
  }
  else if (isset($_SESSION['user_id']) == true){
    $url = $_SERVER['REQUEST_URI'];
    if (str_contains($url, ("." . $_SESSION['user_role'])) == false){
      header("Location: includes/signOut.php");
    }
  }
}