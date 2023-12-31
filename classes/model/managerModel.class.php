<?php

class managerModel extends dbConnection
{
  protected function setManager($first_name, $last_name, $user_id)
  {
    $query = "SELECT COUNT(*) FROM manager WHERE user_id = ?";
    $stmt = $this->connect()->prepare($query);
    $stmt->execute([$user_id]);
    $count = $stmt->fetchColumn();
    if ($count == 0) {
      $query = "INSERT INTO manager (first_name,last_name,user_id) values (?, ?, ?)";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([$first_name, $last_name, $user_id]);
    }
  }
}
