<?php
    session_start();
    include 'includes/autoloader.php';
    $_SESSION['user_check'] = "personalTrainer";
    include 'includes/checkLogin.php';
    include 'includes/personalTrainerHeader.php';

    $personal_trainer_id = $_SESSION['personal_trainer_id']; 

    $membersMealObject = new mealProgramView();
    $members = $membersMealObject->showMembers($personal_trainer_id);

    $selected_member_id = isset($_POST['member']) ? $_POST['member'] : $_SESSION['selected_member_id'];
    $_SESSION['selected_member_id'] = $selected_member_id;

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
        $mealProgramObject->MealProgramData($food_name, $meal_time, $notes, $ingredients, $method, $calories, $protein, $carbohydrates, $fat, $selected_member_id,$personal_trainer_id);

        $_SESSION['selected_member_id'] = $selected_member_id;
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
               <!-- Member drop down box -->
        <label for="member">Select Member:</label>
        <form method="post">
<select id="member" name="member">
    <?php
    foreach ($members as $member) {
        $selected = ($member['member_id'] == $_SESSION['selected_member_id']) ? 'selected' : '';
        echo '<option value="' . $member['member_id'] . '" ' . $selected . '>' . $member['first_name'] . ' ' . $member['last_name'] . '</option>';
    }
    ?>
</select>
<button type="submit" name="select_member">Select Member</button>
</form>
               <!-- Meal plan form -->
        <form method="post">
          <h1>Meal plan</h1>
        <input type="text" id="food_name" name="food_name" placeholder="Food Name:" required>
        <input type="time" id="meal_time" name="meal_time" placeholder="Meal Time:" required>
        <input type="text" id="notes" name="notes" placeholder="Notes:" required>
        <input type="text" id="ingredients" name="ingredients" placeholder="Ingredients:" required>
        <input type="text" id="method" name="method" placeholder="Method:" required>
        <input type="number" id="calories" name="calories" placeholder="Calories:" required>
        <input type="number" id="protein" name="protein" placeholder="Protein:" required>
        <input type="number" id="carbohydrates" name="carbohydrates" placeholder="Carbohydrates:" required>
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
