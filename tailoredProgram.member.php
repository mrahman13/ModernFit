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
        $mealData = $mealObject->showMealProgramByMember();

        foreach($mealData as $row) { ?>
              <div class="meal">
                <p id='meal_time'><?php echo date('H:i', strtotime($row['meal_time'])) ?></p>
                <a href="recipeViewer.member.php?meal_id=<?php echo $row['meal_id']; ?>"><p id='meal_name'><?php echo $row['meal_name'] ?></p></a>
              </div>
        <?php }
        $workoutObject = new workoutProgramView();
        $workoutData = $workoutObject->showWorkoutProgramByMember();

        foreach($workoutData as $row){ ?>
          <div class="workout">
            <p id="workout_day"><?php echo $row['workout_day'] ?></p>
            <p id="workout_name"><?php echo $row['workout_name'] ?></p>
            <p id="exercises"><?php echo $row['exercises'] ?></p>
          </div>
        <?php } ?>  

    </div>
    <footer></footer>
  </div>
</body>

</html>