<?php

class workoutProgramView extends workoutProgramModel{

  public function showWorkoutProgramByMember($member_id){
    $workoutProgram = $this->getWorkoutProgramByMember($member_id);
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
  public function showMembers($personal_trainer_id){
    $members = $this->GetMembers($personal_trainer_id);
    return $members;
  }
}