<?php
session_start();
include 'includes/autoloader.php';
include 'includes/checkLogin.php';
include 'includes/memberHeader.php';

if (isset($_SESSION['meal_id'])) {
  $unset($_SESSION['meal_id']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/mobile.css">
  <link rel="stylesheet" media="only screen and (min-width: 720px)" href="css/desktop.css">
  <title>Entry Log</title>
</head>

<body>
  <div id="container" class="container">
    <div id="main">
      <div class="logMeals">
        <h1>Log meals</h1>
        <form method="post">
          <input type="date" id="date_completed" name="date_completed" required>
          <input type="text" id="meal_name" name="meal_name" placeholder="Meal name:" required>
          <input id="button" type="submit" value="Meal log" name="mealLog"><br><br>
        </form>
        <?php
        if (isset($_POST['mealLog'])) {
          $mealExistCount = 0;
          $mealLogObj = new mealLogContr();
          $mealObject = new mealProgramView();
          $mealData = $mealObject->showMealProgramByMember();
          $meal_name = $_POST['meal_name'];
          $date_completed = $_POST['date_completed'];
          foreach ($mealData as $row) {
            if ($row['meal_name'] == $meal_name) {
              $meal_id = $row['meal_id'];
              $personal_trainer_id = $row['personal_trainer_id'];
              $meal_check = $mealObject->mealCheck($meal_name, $personal_trainer_id);
              $mealLogObj->createMealLog($meal_name, $date_completed, $meal_id, $meal_check);
              $mealExistCount++;
            }
          }
          if ($mealExistCount == 0) {
            echo "Meal does not exist";
          }
        }
        ?>
        <form method="post">
          <input type="date" id="date_completed" name="date_completed" required>
          <input type="text" id="workout_name" name="workout_name" placeholder="Workout name: " required>
          <input id="button" type="submit" value="Workout log" name="workoutLog"><br><br>
        </form>
        <?php
        if (isset($_POST['workoutLog'])) {
          $workoutExistCount = 0;
          $workoutLogObj = new workoutLogContr();
          $workoutObject = new workoutProgramView();
          $workoutData = $workoutObject->showWorkoutProgramByMember();
          $workout_name = $_POST['workout_name'];
          $date_completed = $_POST['date_completed'];
          foreach ($workoutData as $row) {
            if ($row['workout_name'] == $workout_name) {
              $workout_id = $row['workout_id'];
              $personal_trainer_id = $row['personal_trainer_id'];
              $workout_check = $workoutObject->workoutCheck($workout_name, $personal_trainer_id);
              $workoutLogObj->createWorkoutLog($workout_name, $date_completed, $workout_id, $workout_check);
              $workoutExistCount++;
            }
          }
          if ($workoutExistCount == 0) {
            echo "Workout does not exist";
          }
        }
        $workoutLogObject = new workoutLogView();
        $workoutLogData = $workoutLogObject->showWorkoutLog();

        foreach($workoutLogData as $row){ ?>
          <a href="workoutViewer.member.php?workout_id=<?php echo $row['workout_id']; ?>&date_completed=<?php echo $row['date_completed']; ?>"><p id='workout_name_date'><?php echo $row['workout_name'] . " " . $row['date_completed'] ?></p></a>
        <?php }
        $mealLogObject = new mealLogView();
        $mealLogData = $mealLogObject->showMealLog();
        foreach($mealLogData as $row){ ?>
            <a href="recipeViewer.member.php?meal_id=<?php echo $row['meal_id']; ?>&date_completed=<?php echo $row['date_completed']; ?>"><p id='meal_name_date'><?php echo $row['meal_name'] . " " . $row['date_completed'] ?></p></a>
        <?php }
        ?>
      </div>
    </div>
    <footer></footer>
  </div>
</body>

</html>