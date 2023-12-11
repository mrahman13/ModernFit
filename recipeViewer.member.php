<?php
session_start();
include 'includes/autoloader.php';
$_SESSION['user_check'] = "member";
include 'includes/checkLogin.php';
include 'includes/memberHeader.php';

if (isset($_GET['meal_id']) && $_GET['meal_id'] !== '') {
  $meal_id = $_GET['meal_id'];
} else {
  echo "failed";
}

if (isset($_GET['date_completed']) && $_GET['date_completed'] !== '') {
  $date_completed = $_GET['date_completed'];
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
      foreach($data as $row) {
        if($row['meal_id'] == $meal_id){ ?>
        <div class="meal">
          <?php 
            if (isset($_GET['date_completed'])){ ?>
              <p id='meal_name'><?php echo $row['meal_name'] . " " . $date_completed ?></p>
            <?php }
            else{ ?>
              <p id='meal_name'><?php echo $row['meal_name'] ?></p>
            <?php } ?>
          <p id='meal_time'><?php echo $row['meal_time'] ?></p>
          <p id='ingredients'><?php echo $row['ingredients'] ?></p>
          <p id='method'><?php echo $row['method'] ?></p>
          <p id='macros'><?php echo $row['macros'] ?></p>
        </div>
        <?php }
      } ?>
    </div>
    <footer></footer>
  </div>
</body>

</html>