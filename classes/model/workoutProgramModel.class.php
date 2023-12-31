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
  protected function SaveWorkoutProgram($workout_name, $notes, $workout_day, $excercises,$member_id,$personal_trainer_id)
  {
    {
      if (!$this->ValidateInput($workout_name, $notes, $workout_day, $excercises)) {
        return; 
    }

    $query = "INSERT INTO workout_program (workout_name, notes, workout_day,exercises,member_id, personal_trainer_id) VALUES (?, ?, ?, ?,?,?)";
    $stmt = $this->connect()->prepare($query);
    $success = $stmt->execute([$workout_name, $notes, $workout_day, $excercises, $member_id, $personal_trainer_id]);
    if ($success) {
    echo "<div class='fs-5 text-warning text-center p-2'>Form has been submitted successfully!</div>";
  } else {
      echo "<div class='fs-5 text-warning text-center p-2'>Error: form unable to be submitted.</div>";
  }
  }
}

  protected function ValidateInput($workout_name, $notes, $workout_day, $excercises)
  {
    $errors = [];

    if (!preg_match("/^[a-zA-Z]+$/", $workout_day)) {
        $errors[] = "Workout Day should only contain letters.";
      }
  
      if (!empty($errors)) {
          foreach ($errors as $error) {
              echo $error;
          }

          return false; 
      }
  
      return true;
  }
  
}
//https://www.php.net/manual/en/function.ctype-alpha.php
//Reference I used to validate only text is being inputted.
