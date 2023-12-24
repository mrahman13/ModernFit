<?php

class memberContr extends memberModel{

  public function createMember($first_name, $last_name, $profile_picture, $goals, $date_joined, $user_id){
    $this->setMember($first_name, $last_name, $profile_picture, $goals, $date_joined, $user_id);
  }
  
  public function searchMember($member) {
    return $this->searchMemberName($member);
  }
}