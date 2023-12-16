<?php

class workoutLogView extends workoutLogModel{

  public function showWorkoutLog(){
    $workoutLog = $this->getWorkoutLog();
    return $workoutLog;
  }
  public function showWorkoutLogByExercise($exercise){
    $workoutLog = $this->getWorkoutLogByExercise($exercise);
    return $workoutLog;
  }
}