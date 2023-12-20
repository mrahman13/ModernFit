<?php

class mealLogModel extends dbConnection
{

  protected function setMealLog($date_completed, $food_name, $calories, $protein, $carbohydrates, $fat)
  {
    $query = "INSERT INTO meal_log (food_name,calories,protein,carbohydrates,fat,date_completed,member_id) values (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $this->connect()->prepare($query);
    $stmt->execute([$food_name, $calories, $protein, $carbohydrates, $fat, $date_completed, $_SESSION['member_id']]);
    echo "Meal logged";
  }
  protected function getMealLog()
  {
    $query = "SELECT * from meal_log WHERE member_id = ?";
    $stmt = $this->connect()->prepare($query);
    $stmt->execute([$_SESSION['member_id']]);
    $date_completedArray = [];
    $caloriesArray = [];
    $proteinArray = [];
    $carbohydratesArray = [];
    $fatArray = [];
    foreach ($stmt as $food) {
      $date_completedArray[] = $food['date_completed'];
      $caloriesArray[] = $food['calories'];
      $proteinArray[] = $food['protein'];
      $carbohydratesArray[] = $food['carbohydrates'];
      $fatArray[] = $food['fat'];
    }
    $date_completedArraySum = [];
    $caloriesArraySum = [];
    $proteinArraySum = [];
    $carbohydratesArraySum = [];
    $fatArraySum = [];
    $date_completedArrayCount = count($date_completedArray);
    for ($i = 0; $i < $date_completedArrayCount; $i++) {
      $totalCalories = 0;
      $totalProtein = 0;
      $totalCarbohydrates = 0;
      $totalFat = 0;
      for ($j = 0; $j < $date_completedArrayCount; $j++) {
        if ($date_completedArray[$j] == $date_completedArray[$i]) {
          $totalCalories += $caloriesArray[$j];
          $totalProtein += $proteinArray[$j];
          $totalCarbohydrates += $carbohydratesArray[$j];
          $totalFat += $fatArray[$j];
        }
      }
      $date_completedArraySum[] = $date_completedArray[$i];
      $caloriesArraySum[] = $totalCalories;
      $proteinArraySum[] = $totalProtein;
      $carbohydratesArraySum[] = $totalCarbohydrates;
      $fatArraySum[] = $totalFat;
    }
    $date_completedArraySum = array_unique($date_completedArraySum);
    $date_completedArraySorted = [];
    $caloriesArraySorted = [];
    $proteinArraySorted = [];
    $carbohydratesArraySorted = [];
    $fatArraySorted = [];
    foreach ($date_completedArraySum as $x => $x_value) {
      $date_completedArraySorted[] = $x_value;
      $caloriesArraySorted[] = $caloriesArraySum[$x];
      $proteinArraySorted[] = $proteinArraySum[$x];
      $carbohydratesArraySorted[] = $carbohydratesArraySum[$x];
      $fatArraySorted[] = $fatArraySum[$x];
    }
    return array($date_completedArraySorted, $caloriesArraySorted, $proteinArraySorted, $carbohydratesArraySorted, $fatArraySorted);
  }
}
