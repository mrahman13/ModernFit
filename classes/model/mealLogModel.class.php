<?php

class mealLogModel extends dbConnection
{

  protected function setMealLog($meal_name,$date_completed,$member_id,$meal_id)
  {
    $query = "INSERT INTO meal_log (meal_name,date_completed,member_id,meal_id) values (?, ?, ?, ?)";
    $stmt = $this->connect()->prepare($query);
    $stmt->execute([$meal_name,$date_completed,$member_id,$meal_id]);
  }
}
