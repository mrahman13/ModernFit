<?php
    session_start();
    include 'includes/autoloader.php';
    $_SESSION['user_check'] = "personalTrainer";
    include 'includes/checkLogin.php';
    include 'includes/personalTrainerHeader.php';

    $personal_trainer_id = $_SESSION['personal_trainer_id']; 
    if (isset($_GET['member_id']) && $_GET['member_id'] !== '') {
      $member_id = $_GET['member_id'];
    } else {
      header("Location: 404");
    }
   

    if (isset($_POST['meal_submit'])) {
        $food_name = $_POST['food_name'];
        $meal_time = $_POST['meal_time'];
        $notes = $_POST['notes'];
        $ingredients = $_POST['ingredients'];
        $method = $_POST['method'];
        $calories = $_POST['calories'];
        $protein = $_POST['protein'];
        $carbohydrates = $_POST['carbohydrates'];
        $fat = $_POST['fat'];

        $mealProgramObject = new mealProgramContr();
        $mealProgramObject->MealProgramData($food_name, $meal_time, $notes, $ingredients, $method, $calories, $protein, $carbohydrates, $fat, $member_id,$personal_trainer_id);
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create program - Meal</title>
  <style>
      input {
            color-scheme: dark;
      }
  </style>
</head>

<body>
  <div id="container" class="mx-sm-4 mx-xl-5 px-2 px-sm-3 px-xl-5">

    <div id="main">
      <div class="h1 text-warning mb-3">Meal plan</div>

      <!-- Meal plan form -->
        <form class="row content mx-1 gy-2" method="post">
            <input class="form-control border-3" type="text" id="food_name" name="food_name" placeholder="Food Name:" required>
            <input class="form-control border-3" onblur="(this.type='text')" onfocus="(this.type='time')" id="meal_time" name="meal_time" placeholder="Meal time:" required>
            <input class="form-control border-3" type="text" id="notes" name="notes" placeholder="Notes:" required>
            <input class="form-control border-3" type="text" id="ingredients" name="ingredients" placeholder="Ingredients:" required>
            <input class="form-control border-3" type="text" id="method" name="method" placeholder="Method:" required>
            <input class="form-control border-3" type="number" id="calories" name="calories" placeholder="Calories:" required>
            <input class="form-control border-3" type="number" id="protein" name="protein" placeholder="Protein:" required>
            <input class="form-control border-3" type="number" id="carbohydrates" name="carbohydrates" placeholder="Carbohydrates:" required>
            <input class="form-control border-3" type="number" id="fat" name="fat" placeholder="Fat:" required>
            <input class="btn btn-warning" id="button" type="submit" name="meal_submit">
        </form>
    </div>
          
    <footer></footer>
  </div>
</body>

</html>

<!-- Reference for how to echo select option values -->
<!-- https://stackoverflow.com/questions/24611803/how-to-echo-select-option-value-in-the-php-page-without-ajax -->
