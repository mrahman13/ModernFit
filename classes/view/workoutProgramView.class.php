<?php

class workoutProgramView extends workoutProgramModel{

  public function showWorkoutProgram(){
    $workoutProgram = $this->getWorkoutProgram();
    return $workoutProgram;
  }
  public function workoutCheck($workout_name, $personal_trainer_id){
    $count = $this->checkWorkoutExists($workout_name, $personal_trainer_id);
    return $count;
  }
}