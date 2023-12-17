<?php

class workoutLogContr extends workoutLogModel{

  public function createWorkoutLog($date_completed, $exercise, $weight, $reps){
    $this->setWorkoutLog($date_completed, $exercise, $weight, $reps);
  }
}