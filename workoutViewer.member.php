<?php
session_start();
include 'includes/autoloader.php';
$_SESSION['user_check'] = "member";
include 'includes/checkLogin.php';
include 'includes/memberHeader.php';

if (isset($_GET['workout_id']) && $_GET['workout_id'] !== '') {
  $workout_id = $_GET['workout_id'];
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
      $workoutObject = new workoutProgramView();
      $workoutData = $workoutObject->showWorkoutProgramByMember();

      foreach($workoutData as $row){
        if($row['workout_id'] == $workout_id){ ?>
          <div class="workout">
          <?php 
            if (isset($_GET['date_completed'])){ ?>
              <p id='workout_day'><?php echo $row['workout_day'] . " " . $date_completed ?></p>
            <?php }
            else{ ?>
              <p id='workout_day'><?php echo $row['workout_day'] ?></p>
            <?php } ?>
            <p id="workout_name"><?php echo $row['workout_name'] ?></p>
            <p id="exercises"><?php echo $row['exercises'] ?></p>
          </div>
      <?php }
      } 
      ?>  
    </div>
    <footer></footer>
  </div>
</body>

</html>