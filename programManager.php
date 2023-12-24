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
  header("Location: 404");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Program Manager</title>
</head>

<body>
  <div id="container" class="container">

    <div id="main">
      <?php
      $personalTrainersMealObject = new mealProgramView();
      $personalTrainersMealData = $personalTrainersMealObject->showMealProgramByPersonalTrainer($personal_trainer_id);
      foreach ($personalTrainersMealData as $row) { ?>
        <a href="recipeViewer?meal_id=<?php echo $row['meal_id']; ?>&personal_trainer_id=<?php echo $row['personal_trainer_id']; ?>">
          <p id='food_name'><?php echo $row['food_name'] . " : " . date('H:i', strtotime($row['meal_time'])) ?></p>
        </a>



      <?php }
      $personalTrainersWorkoutObject = new workoutProgramView();
      $personalTrainersWorkoutData = $personalTrainersWorkoutObject->showWorkoutProgramByPersonalTrainer($personal_trainer_id);
      foreach ($personalTrainersWorkoutData as $row) { ?>
        <a href="workoutViewer?workout_id=<?php echo $row['workout_id']; ?>&personal_trainer_id=<?php echo $row['personal_trainer_id']; ?>">
          <p id='workout_name'><?php echo $row['workout_name'] . " : " . $row['workout_day'] ?></p>
        </a>
      <?php }
      ?>
    </div>
    <footer></footer>
  </div>
</body>

</html>