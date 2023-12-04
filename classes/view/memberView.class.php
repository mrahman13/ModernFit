<?php
class memberView extends memberModel{
  
  public function showMemberPin($user_id){
    $member_pin = $this->getMember($user_id);
    $obj = $member_pin->fetch();
    return $obj['pin'];
  }

}