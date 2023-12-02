<?php

class workoutProgramModel extends dbConnection
{
  protected function getWorkoutProgram()
  {
    $query = "SELECT * from workout_program WHERE member_id = ?";
    $stmt = $this->connect()->prepare($query);
    $stmt->execute([$_SESSION['member_id']]);
    return $stmt;
  }
}
