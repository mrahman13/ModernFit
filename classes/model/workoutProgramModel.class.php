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
  protected function checkWorkoutExists($workout_name, $personal_trainer_id)
  {
    $query = "SELECT COUNT(*) from workout_program WHERE workout_name = ? AND member_id = ? AND personal_trainer_id = ?";
    $stmt = $this->connect()->prepare($query);
    $stmt->execute([$workout_name, $_SESSION['member_id'], $personal_trainer_id]);
    $count = $stmt->fetchColumn();
    return $count;
  }
}
