<?php

class workoutLogView extends workoutLogModel{

  public function showWorkoutLog(){
    $workoutLog = $this->getWorkoutLog();
    return $workoutLog;
  }
}