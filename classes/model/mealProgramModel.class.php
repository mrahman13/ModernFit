<?php

class mealProgramModel extends dbConnection
{
  protected function getMealProgramByMember()
  {
    $query = "SELECT * from meal_program WHERE member_id = ?";
    $stmt = $this->connect()->prepare($query);
    $stmt->execute([$_SESSION['member_id']]);
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
}
