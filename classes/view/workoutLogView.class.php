<?php

class workoutLogView extends workoutLogModel{

  public function showWorkoutLog($member_id){
    $workoutLog = $this->getWorkoutLog($member_id);
    return $workoutLog;
  }
  public function showWorkoutLogByExercise($exercise, $member_id){
    $workoutLog = $this->getWorkoutLogByExercise($exercise, $member_id);
    return $workoutLog;
  }
}