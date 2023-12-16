<?php

class mealLogContr extends mealLogModel{

  public function createMealLog($date_completed, $food_name, $calories, $protein, $carbohydrates, $fat){
    $this->setMealLog($date_completed, $food_name, $calories, $protein, $carbohydrates, $fat);
  }
}