<?php

class adminContr extends adminModel{

  public function createAdmin($first_name, $last_name, $user_id){
    $this->setAdmin($first_name, $last_name, $user_id);
  }
}