<?php

class mealProgramView extends mealProgramModel{

  public function showMealProgram(){
    $mealProgram = $this->getMealProgram();
    return $mealProgram;
  }
  public function mealCheck($meal_name, $personal_trainer_id){
    $count = $this->checkMealExists($meal_name, $personal_trainer_id);
    return $count;
  }
}