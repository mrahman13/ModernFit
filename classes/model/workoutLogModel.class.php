<?php

class workoutLogModel extends dbConnection
{

  protected function setWorkoutLog($date_completed, $exercise, $weight, $reps)
  {
    if (!$this->ValidateInput($date_completed, $exercise, $weight, $reps)) {
      return; 
  }
    $query = "INSERT INTO workout_log (exercise,weight,reps,date_completed,member_id) values (?, ?, ?, ?, ?)";
    $stmt = $this->connect()->prepare($query);
    $stmt->execute([$exercise, $weight, $reps, $date_completed, $_SESSION['member_id']]);
    echo "<div class='fs-5 text-warning text-center p-2'>Workout logged</div>";
  }
  protected function getWorkoutLog($member_id)
  {
    $query = "SELECT * from workout_log WHERE member_id = ?";
    $stmt = $this->connect()->prepare($query);
    $stmt->execute([$member_id]);
    return $stmt;
  }
  protected function getWorkoutLogByExercise($exercise, $member_id)
  {
    $query = "SELECT COUNT(*) from workout_log WHERE member_id = ? AND exercise = ?";
    $stmt = $this->connect()->prepare($query);
    $stmt->execute([$member_id, $exercise]);
    $count = $stmt->fetchColumn();
    if ($count >= 1) {
      $query = "SELECT * from workout_log WHERE member_id = ? AND exercise = ?";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([$member_id, $exercise]);
      foreach ($stmt as $row) {
        $dateArray[] = $row['date_completed'];
        $weightArray[] = $row['weight'];
        $repsArray[] = $row['reps'];
      }
      return array($dateArray, $weightArray, $repsArray);
    } else {
      echo "No workout logs for this exercise";
    }
  }

  protected function ValidateInput($date_completed, $exercise, $weight, $reps)
  {
      $errors = [];
  
      if (!is_numeric($weight)) {
          $errors[] = "Weight should only contain numbers.";
      }
      if (!is_numeric($reps)) {
          $errors[] = "Reps should only contain numbers.";
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

