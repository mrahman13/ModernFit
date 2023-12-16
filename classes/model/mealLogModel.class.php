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
    $date_completedArraySorted = [];
    $caloriesArraySorted = [];
    $proteinArraySorted = [];
    $carbohydratesArraySorted = [];
    $fatArraySorted = [];
    foreach ($date_completedArray as $key) {
      $totalCalories = 0;
      $totalProtein = 0;
      $totalCarbohydrates = 0;
      $totalFat = 0;
      for ($i = 0; $i < count($date_completedArray); $i++) {
        if ($date_completedArray[$i] == $key) {
          $totalCalories += $caloriesArray[$i];
          $totalProtein += $proteinArray[$i];
          $totalCarbohydrates += $carbohydratesArray[$i];
          $totalFat += $fatArray[$i];
        }
      }
      $date_completedArraySorted[] = $key;
      $caloriesArraySorted[] = $totalCalories;
      $proteinArraySorted[] = $totalProtein;
      $carbohydratesArraySorted[] = $totalCarbohydrates;
      $fatArraySorted[] = $totalFat;
    }

    $date_completedArraySorted = array_unique($date_completedArraySorted);
    $caloriesArraySorted = array_unique($caloriesArraySorted);
    $proteinArraySorted = array_unique($proteinArraySorted);
    $carbohydratesArraySorted = array_unique($carbohydratesArraySorted);
    $fatArraySorted = array_unique($fatArraySorted);


    return array($date_completedArraySorted, $caloriesArraySorted, $proteinArraySorted, $carbohydratesArraySorted, $fatArraySorted);
  }
}
