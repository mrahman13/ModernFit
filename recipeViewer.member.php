<?php
session_start();
include 'includes/autoloader.php';
include 'includes/checkLogin.php';
include 'includes/memberHeader.php';

if (isset($_GET['meal_id']) && $_GET['meal_id'] !== '') {
  $meal_id = $_GET['meal_id'];
} else {
  echo "failed";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/mobile.css">
  <link rel="stylesheet" media="only screen and (min-width: 720px)" href="css/desktop.css">
  <title>Recipes</title>
</head>

<body>
  <div id="container" class="container">
    <div id="main">
      <?php
      $mealObject = new mealProgramView();
      $data = $mealObject->showMealProgramByMember();
      $meal_name = "";
      $meal_time = "";
      $ingredients = "";
      $method = "";
      $macros = "";
      foreach($data as $row) {
        if($row['meal_id'] == $meal_id){
          $meal_name = $row['meal_name'];
          $meal_time = date('H:i', strtotime($row['meal_time']));
          $ingredients = $row['ingredients'];
          $method = $row['method'];
          $macros = $row['macros'];
        }
      } ?>
        <div class="meal">
          <p id='meal_name'><?php echo $meal_name ?></p>
          <p id='meal_time'><?php echo $meal_time ?></p>
          <p id='ingredients'><?php echo $ingredients ?></p>
          <p id='method'><?php echo $method ?></p>
          <p id='macros'><?php echo $macros ?></p>
        </div>
    </div>
    <footer></footer>
  </div>
</body>

</html>