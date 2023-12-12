<?php

class memberContr extends memberModel{

  public function createMember($first_name, $last_name, $profile_picture, $date_joined, $user_id){
    $this->setMember($first_name, $last_name, $profile_picture, $date_joined, $user_id);
  }
  // public function createMember($first_name, $last_name, $profile_picture, $date_joined){
  //   $this->setMember($first_name, $last_name, $profile_picture, $date_joined);
  // }
}