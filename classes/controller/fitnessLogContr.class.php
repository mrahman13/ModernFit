<?php

class mealLogContr extends mealLogModel{

  public function createMealLog($meal_name,$date_completed,$member_id,$meal_id){
    $this->setMealLog($meal_name,$date_completed,$member_id,$meal_id);
  }
}