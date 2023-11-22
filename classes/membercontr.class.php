<?php

class memberContr extends Member{

  public function createMember($first_name, $last_name, $profile_picture, $date_joined, $pin, $user_id){
    $this->setMember($first_name, $last_name, $profile_picture, $date_joined, $pin, $user_id);
  }
}