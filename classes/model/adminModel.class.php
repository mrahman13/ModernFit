<?php

class adminModel extends dbConnection
{
  protected function setAdmin($first_name, $last_name, $user_id)
  {
    $query = "SELECT COUNT(*) FROM admin WHERE user_id = ?";
    $stmt = $this->connect()->prepare($query);
    $stmt->execute([$user_id]);
    $count = $stmt->fetchColumn();
    if ($count == 0) {
      $query = "INSERT INTO admin (first_name,last_name,user_id) values (?, ?, ?)";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([$first_name, $last_name, $user_id]);
    }
  }
}
