<?php

  check_login();

function check_login(){
  if (isset($_SESSION['user_id']) == false){
    header("Location: signOut");
  }
  else if (isset($_SESSION['user_id']) == true){
    if (str_contains($_SESSION['user_check'], ($_SESSION['user_role'])) == false){
      header("Location: signOut");
    }
  }
}