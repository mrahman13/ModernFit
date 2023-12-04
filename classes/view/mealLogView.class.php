<?php

class mealLogView extends mealLogModel{

  public function showMealLog(){
    $mealLog = $this->getMealLog();
    return $mealLog;
  }
}