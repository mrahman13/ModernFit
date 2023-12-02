<?php

class workoutProgramView extends workoutProgramModel{

  public function showWorkoutProgram(){
    $workoutProgram = $this->getWorkoutProgram();
    foreach($workoutProgram as $row){
      echo "<p>" . $row['workout_day'] . "</p>";
      echo "<p>" . $row['workout_name'] . "</p>";
      echo "<p>" . $row['exercises'] . "</p>";
    }
  }
}