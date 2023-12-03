<?php

class mealLogContr extends mealLogModel{

  public function createMealLog($meal_name,$date_completed,$meal_id, $meal_check){
    $this->setMealLog($meal_name,$date_completed,$meal_id, $meal_check);
  }
}