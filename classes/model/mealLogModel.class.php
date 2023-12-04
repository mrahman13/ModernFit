<?php

class mealLogModel extends dbConnection
{

  protected function setMealLog($meal_name,$date_completed,$meal_id, $mealCheck)
  {    
    if($mealCheck == 1)
    {
      $query = "INSERT INTO meal_log (meal_name,date_completed,member_id,meal_id) values (?, ?, ?, ?)";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([$meal_name,$date_completed,$_SESSION['member_id'],$meal_id]);
      echo "Meal logged";
    }
  }
  protected function getMealLog()
  {
    $query = "SELECT * from meal_log WHERE member_id = ?";
    $stmt = $this->connect()->prepare($query);
    $stmt->execute([$_SESSION['member_id']]);
    return $stmt;
  }
}
