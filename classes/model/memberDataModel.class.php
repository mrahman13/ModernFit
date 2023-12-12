<?php

class memberDataModel extends dbConnection
{
  protected function searchMemberName($search)
  {
      $query = "SELECT * FROM member WHERE first_name LIKE ?";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute(["%$search%"]);
      return $stmt;
  }
  
  protected function getMemberData($member_id)
  {
    $query = "SELECT * from member WHERE member_id = ?";
    $stmt = $this->connect()->prepare($query);
    $stmt->execute([$member_id]);
    return $stmt;
  }
}