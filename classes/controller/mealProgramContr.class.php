<?php

class mealProgramContr extends mealProgramModel{
    
    public function MealProgramData($food_name,$meal_time,$meal_notes, $ingredients,$method,$calories,$protein, $carbohydrates,$fat,$member_id,$personal_trainer_id ) {
        return $this->saveMealProgram($food_name, $meal_time, $meal_notes, $ingredients, $method, $calories, $protein, $carbohydrates, $fat,$member_id,$personal_trainer_id);
    }
}
