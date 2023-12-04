<?php

class workoutLogContr extends workoutLogModel{

  public function createWorkoutLog($workout_name,$date_completed,$workout_id, $workoutCheck){
    $this->setWorkoutLog($workout_name,$date_completed,$workout_id, $workoutCheck);
  }
}