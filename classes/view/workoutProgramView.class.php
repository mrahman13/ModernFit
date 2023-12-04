<?php

class workoutProgramView extends workoutProgramModel{

  public function showWorkoutProgramByMember(){
    $workoutProgram = $this->getWorkoutProgramByMember();
    return $workoutProgram;
  }
  public function showWorkoutProgramByPersonalTrainer($personal_trainer_id){
    $workoutProgram = $this->getWorkoutProgramByPersonalTrainer($personal_trainer_id);
    return $workoutProgram;
  }
  public function workoutCheck($workout_name, $personal_trainer_id){
    $count = $this->checkWorkoutExists($workout_name, $personal_trainer_id);
    return $count;
  }
}