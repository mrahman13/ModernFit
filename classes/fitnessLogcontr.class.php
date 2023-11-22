<?php

class fitnessLogContr extends fitnessLog{

  public function createMealLog($meal_name,$date_completed,$member_id,$meal_id){
    $this->setMealLog($meal_name,$date_completed,$member_id,$meal_id);
  }
}