<?php

class workoutProgramModel extends dbConnection
{
  protected function getWorkoutProgramByMember($member_id)
  {
    $query = "SELECT * from workout_program WHERE member_id = ?";
    $stmt = $this->connect()->prepare($query);
    $stmt->execute([$member_id]);
    return $stmt;
  }
  protected function getWorkoutProgramByPersonalTrainer($personal_trainer_id)
  {
    $query = "SELECT * from workout_program WHERE personal_trainer_id = ?";
    $stmt = $this->connect()->prepare($query);
    $stmt->execute([$personal_trainer_id]);
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
  protected function SaveWorkoutProgram($workout_name, $notes, $workout_day, $excercises)
  {
    $query = "INSERT INTO workout_program (workout_name, notes, workout_day,excercises) VALUES (?, ?, ?, ?)";
    $stmt = $this->connect()->prepare($query);
    $stmt->execute([$workout_name, $notes, $workout_day, $excercises]);
  }

}
