<?php
class memberView extends memberModel{
  
  public function showMemberPin(){
    $member_pin = $this->getMember($_SESSION['user_id']);
    $obj = $member_pin->fetch();
    return $obj['pin'];
  }
    public function showMembers($member){
    $member_data = $this->searchMemberName($member);
    $obj = $member_data->fetchAll();
    return $obj;
  }
  public function showMemberData($member_id) {
      $memberData = $this->getMemberData($member_id);
      return $memberData;
  }
}