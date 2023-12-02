<?php

class mealProgramView extends mealProgramModel{

  public function showMealProgram(){
    $mealProgram = $this->getMealProgram();
    foreach($mealProgram as $row){
      echo "<p>" . $row['meal_name'] . "</p>";
      echo "<p>" . $row['meal_time'] . "</p>";
      echo "<p>" . $row['ingredients'] . "</p>";
      echo "<p>" . $row['method'] . "</p>";
      echo "<p>" . $row['macros'] . "</p>";
    }
  }
}