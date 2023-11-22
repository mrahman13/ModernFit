<?php
class usersView extends users{

  public function showUserId($email){
    $user_data = $this->getUserId($email);
    $obj = $user_data->fetch_object();
    return $obj->user_id;
  }
}