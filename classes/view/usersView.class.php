<?php

class usersView extends usersModel{

  public function showUserId($email){
    $user_id = $this->getUserId($email);
    $obj = $user_id->fetch();
    return $obj['user_id'];
  }
}