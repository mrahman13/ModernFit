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
      $data = $mealObject->showMealProgram();
      $obj = $data->fetch();
        if($obj['meal_id'] == $meal_id){
          $meal_name = $obj['meal_name'];
          $meal_time = date('H:i', strtotime($obj['meal_time']));
          $ingredients = $obj['ingredients'];
          $method = $obj['method'];
          $macros = $obj['macros'];
      ?>
        <div class="meal">
          <p id='meal_time'><?php echo $meal_name ?></p>
          <p id='meal_time'><?php echo $meal_time ?></p>
          <p id='meal_time'><?php echo $ingredients ?></p>
          <p id='meal_time'><?php echo $method ?></p>
          <p id='meal_time'><?php echo $macros ?></p>
        </div>
      <?php } ?>


    </div>
    <footer></footer>
  </div>
</body>

</html>