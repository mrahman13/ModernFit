<?php
    session_start();
    include 'includes/autoloader.php';
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
        $mealData = $mealObject->showMealProgram();

        foreach($mealData as $row) {
          $meal_time = date('H:i', strtotime($row['meal_time']));          
          $meal_name = $row['meal_name'];
          $meal_id = $row['meal_id'];
          ?>
              <div class="meal">
                <p id='meal_time'><?php echo $meal_time ?></p>
                <a href="recipeViewer.member.php?meal_id=<?php echo $meal_id; ?>"><p id='meal_name'><?php echo $meal_name ?></p></a>
              </div>
        <?php }
        $workoutObject = new workoutProgramView();
        $workoutData = $workoutObject->showWorkoutProgram();

        foreach($workoutData as $row){ ?>
          <p><?php echo $row['workout_day'] ?></p>
          <p><?php echo $row['workout_name'] ?></p>
          <p><?php echo $row['exercises'] ?></p>
        <?php } ?>  

    </div>
    <footer></footer>
  </div>
</body>

</html>