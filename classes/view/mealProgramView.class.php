<?php

class mealProgramView extends mealProgramModel{

  public function showMealProgramByMember($member_id){
    $mealProgram = $this->getMealProgramByMember($member_id);
    return $mealProgram;
  }
  public function showMealProgramByPersonalTrainer($personal_trainer_id){
    $mealProgram = $this->getMealProgramByPersonalTrainer($personal_trainer_id);
    return $mealProgram;
  }
  public function mealCheck($meal_name, $personal_trainer_id){
    $count = $this->checkMealExists($meal_name, $personal_trainer_id);
    return $count;
  }
  public function showMembers($personal_trainer_id){
    $members = $this->GetMembers($personal_trainer_id);
    return $members;
  }
}