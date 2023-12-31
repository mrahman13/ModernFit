<?php

class mealProgramModel extends dbConnection
{
  protected function getMealProgramByMember($member_id)
  {
    $query = "SELECT * from meal_program WHERE member_id = ?";
    $stmt = $this->connect()->prepare($query);
    $stmt->execute([$member_id]);
    return $stmt;
  }
  protected function getMealProgramByPersonalTrainer($personal_trainer_id)
  {
    $query = "SELECT * from meal_program WHERE personal_trainer_id = ?";
    $stmt = $this->connect()->prepare($query);
    $stmt->execute([$personal_trainer_id]);
    return $stmt;
  }
  protected function checkMealExists($meal_name, $personal_trainer_id)
  {
    $query = "SELECT COUNT(*) from meal_program WHERE meal_name = ? AND member_id = ? AND personal_trainer_id = ?";
    $stmt = $this->connect()->prepare($query);
    $stmt->execute([$meal_name, $_SESSION['member_id'], $personal_trainer_id]);
    $count = $stmt->fetchColumn();
    return $count;
  }

  protected function setMealProgram($meal_name, $personal_trainer_id)
  {
    $query = "SELECT COUNT(*) from meal_program WHERE meal_name = ? AND member_id = ? AND personal_trainer_id = ?";
    $stmt = $this->connect()->prepare($query);
    $stmt->execute([$meal_name, $_SESSION['member_id'], $personal_trainer_id]);
    $count = $stmt->fetchColumn();
    return $count;
  }

  protected function SaveMealProgram($food_name, $meal_time, $notes, $ingredients, $method, $calories, $protein, $carbohydrates, $fat, $member_id,$personal_trainer_id) 
  {
    $this->ValidateInput($food_name, $meal_time, $notes, $ingredients, $method, $calories, $protein, $carbohydrates, $fat);

    $query = "INSERT INTO meal_program (food_name, meal_time, notes, ingredients, method, calories, protein, carbohydrates, fat, member_id, personal_trainer_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)";
    $stmt = $this->connect()->prepare($query);
    $success = $stmt->execute([$food_name, $meal_time, $notes, $ingredients, $method, $calories, $protein, $carbohydrates, $fat, $member_id, $personal_trainer_id]);
    if ($success) {
      echo "<div class='fs-5 text-warning text-center p-2'>Form has been submitted successfully!</div>";
  } else {
      echo "<div class='fs-5 text-warning text-center p-2'>Error: form unable to be submitted.</div>";
  }
}

  protected function ValidateInput($food_name, $meal_time, $notes, $ingredients, $method, $calories, $protein, $carbohydrates, $fat)
  {
    if (empty($_POST["food_name"]) || empty($_POST["meal_time"]) || empty($_POST["notes"]) || empty($_POST["ingredients"]) || empty($_POST["method"]) || empty($_POST["calories"]) || empty($_POST["protein"])|| empty($_POST["carbohydrates"]) || empty($_POST["fat"])){
      die("All fields are required");
  }
}
}


  
