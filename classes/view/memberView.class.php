<?php
class memberView extends memberModel{
  
  public function showMemberPin(){
    $member_pin = $this->getMember($_SESSION['user_id']);
    $obj = $member_pin->fetch();
    return $obj['pin'];
  }
}