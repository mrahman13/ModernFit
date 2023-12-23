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
      echo "Member ID null";
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
  <link rel="stylesheet" href="css/mobile.css">
  <link rel="stylesheet" media="only screen and (min-width: 720px)" href="css/desktop.css">
  <title>Create program - Meal</title>
</head>

<body>
  <div id="container" class="container">

    <div id="main">

               <!-- Meal plan form -->
        <form method="post">
          <h1>Meal plan</h1>
  <label for="food_name">Food Name:</label>
        <input type="text" id="food_name" name="food_name" required>
  <label for="meal_time">Meal Time:</label>
        <input type="time" id="meal_time" name="meal_time" required>
  <label for="notes">Notes:</label>
        <input type="text" id="notes" name="notes"required>
  <label for="ingredients">Ingredients:</label>
        <input type="text" id="ingredients" name="ingredients"required>
  <label for="method">Method:</label>
        <input type="text" id="method" name="method" required>
  <label for="calories">Calories:</label>
        <input type="number" id="calories" name="calories" required>
  <label for="protein">Protein:</label>
        <input type="number" id="protein" name="protein" required>
  <label for="carbohydrates">Carbohydrates:</label>
        <input type="number" id="carbohydrates" name="carbohydrates" placeholder="Carbohydrates:" required>
  <label for="fat">Fat:</label>
        <input type="number" id="fat" name="fat" placeholder="Fat:" required>
        <input id="button" type="submit" name="meal_submit">
        </form>
    </div>
          
    <footer></footer>
  </div>
</body>

</html>

<!-- Reference for how to echo select option values -->
<!-- https://stackoverflow.com/questions/24611803/how-to-echo-select-option-value-in-the-php-page-without-ajax -->
