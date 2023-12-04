<?php

class memberDataView extends memberDataModel {
  
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