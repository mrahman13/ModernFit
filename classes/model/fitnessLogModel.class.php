<?php

class fitnessLogModel extends dbConnection
{
  // protected $first_name;
  // protected $last_name;
  // protected $email;
  // protected $password;
  // protected $user_type;

  // protected function getUser($name, $user_type)
  // {
  //   $query = "SELECT * from $user_type where first_name = '$name'";
  //   $user_data = $this->connect()->query($query);
  //   return $user_data;
  // }
  protected function setMealLog($meal_name,$date_completed,$member_id,$meal_id)
  {
    $query = "INSERT INTO meal_log (meal_name,date_completed,member_id,meal_id) values (?, ?, ?, ?)";
    $stmt = $this->connect()->prepare($query);
    $stmt->execute([$meal_name,$date_completed,$member_id,$meal_id]);
  }
}
