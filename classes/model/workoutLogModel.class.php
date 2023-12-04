<?php

class workoutLogModel extends dbConnection
{

  protected function setWorkoutLog($workout_name,$date_completed,$workout_id, $workoutCheck)
  {    
    if($workoutCheck == 1)
    {
      $query = "INSERT INTO workout_log (workout_name,date_completed,member_id,workout_id) values (?, ?, ?, ?)";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([$workout_name,$date_completed,$_SESSION['member_id'],$workout_id]);
      echo "Workout logged";
    }
  }
  protected function getWorkoutLog()
  {
    $query = "SELECT * from workout_log WHERE member_id = ?";
    $stmt = $this->connect()->prepare($query);
    $stmt->execute([$_SESSION['member_id']]);
    return $stmt;
  }
}