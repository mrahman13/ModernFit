<?php
    session_start();
    include 'includes/autoloader.php';
    $_SESSION['user_check'] = "manager";
    include 'includes/checkLogin.php';
    include 'includes/managerHeader.php';
    $user_id = $_SESSION['user_id'];
    if (isset($_GET['personal_trainer_id']) && $_GET['personal_trainer_id'] !== '') {
      $personal_trainer_id = $_GET['personal_trainer_id'];
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
  <title>Program Manager</title>
</head>

<body>
  <div id="container" class="container">

    <div id="main">
      <?php
        $personalTrainersMealObject = new mealProgramView();
        $personalTrainersMealData = $personalTrainersMealObject->showMealProgramByPersonalTrainer($personal_trainer_id);
        foreach($personalTrainersMealData as $row){ ?>
          <p id='meal_name'><?php echo $row['meal_name'] ?></p>
          <p id='meal_time'><?php echo date('H:i', strtotime($row['meal_time'])) ?></p>
          <p id='ingredients'><?php echo $row['ingredients'] ?></p>
          <p id='method'><?php echo $row['method'] ?></p>
          <p id='macros'><?php echo $row['macros'] ?></p>
        <?php }
        $personalTrainersWorkoutObject = new workoutProgramView();
        $personalTrainersWorkoutData = $personalTrainersWorkoutObject->showWorkoutProgramByPersonalTrainer($personal_trainer_id);
        foreach($personalTrainersWorkoutData as $row){ ?>
          <p id="workout_day"><?php echo $row['workout_day'] ?></p>
          <p id="workout_name"><?php echo $row['workout_name'] ?></p>
          <p id="exercises"><?php echo $row['exercises'] ?></p>
        <?php }
      ?>
    </div>
    <footer></footer>
  </div>
</body>

</html>