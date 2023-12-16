<?php
session_start();
include 'includes/autoloader.php';
$_SESSION['user_check'] = "member";
include 'includes/checkLogin.php';
include 'includes/memberHeader.php';
$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/mobile.css">
  <link rel="stylesheet" media="only screen and (min-width: 720px)" href="css/desktop.css">
  <title>Program</title>
</head>

<body>
  <div id="container" class="container">
    <div id="main">
      <?php
      $mealObject = new mealProgramView();
      $mealData = $mealObject->showMealProgramByMember($_SESSION['member_id']);

      foreach ($mealData as $row) { ?>
        <div class="meal">
          <a href="recipeViewer?meal_id=<?php echo $row['meal_id']; ?>">
            <p id='food_name'><?php echo $row['food_name'] . " : " . date('H:i', strtotime($row['meal_time'])) ?></p>
          </a>

        </div>
      <?php }
      $workoutObject = new workoutProgramView();
      $workoutData = $workoutObject->showWorkoutProgramByMember($_SESSION['member_id']);

      foreach ($workoutData as $row) { ?>
        <div class="workout">
          <a href="workoutViewer?workout_id=<?php echo $row['workout_id']; ?>">
            <p id='workout_name'><?php echo $row['workout_name'] . " : " . $row['workout_day'] ?></p>
          </a>
        </div>
      <?php } ?>

    </div>
    <footer></footer>
  </div>
</body>

</html>