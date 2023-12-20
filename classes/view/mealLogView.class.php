<?php

class mealLogView extends mealLogModel{

  public function showMealLog($member_id){
    $mealLog = $this->getMealLog($member_id);
    return $mealLog;
  }
}