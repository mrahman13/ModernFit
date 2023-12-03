<?php

class mealProgramView extends mealProgramModel{

  public function showMealProgram(){
    $mealProgram = $this->getMealProgram();
    return $mealProgram;
  }
}