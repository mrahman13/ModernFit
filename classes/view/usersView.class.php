<?php

class usersView extends usersModel{

  public function showUserId($email){
    $user_id = $this->getUserId($email);
    return $user_id;
  }
}