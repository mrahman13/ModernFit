<?php
session_start();
include 'includes/autoloader.php';
$_SESSION['user_check'] = "membermanagerpersonalTrainer";
include 'includes/checkLogin.php';
if ($_SESSION['user_role'] == 'member') {
  include 'includes/memberHeader.php';
  $member_id = $_SESSION['member_id'];
} else if ($_SESSION['user_role'] == 'personalTrainer') {
  include 'includes/personalTrainerHeader.php';
} else if ($_SESSION['user_role'] == 'manager') {
  include 'includes/managerHeader.php';
}
$mCheck = false;
if (isset($_GET['workout_id']) && $_GET['workout_id'] !== '') {
  $workout_id = $_GET['workout_id'];
  $mCheck = true;
} else {
  header("Location: 404");
}
if (isset($_GET['member_id']) && $_GET['member_id'] !== '') {
  $member_id = $_GET['member_id'];
  $mCheck = true;
}
$ptCheck = false;
if (isset($_GET['personal_trainer_id']) && $_GET['personal_trainer_id'] !== '') {
  $personal_trainer_id = $_GET['personal_trainer_id'];
  $ptCheck = true;
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
  <title>Recipes</title>
</head>

<body>
  <div id="container" class="my-3 mx-sm-4 mx-xl-5 px-2 px-sm-3 px-xl-5">
    <div id="main">
      <?php
      $workoutObject = new workoutProgramView();
      if ($ptCheck == true) {
        $workoutData = $workoutObject->showWorkoutProgramByPersonalTrainer($personal_trainer_id);
      } else if ($mCheck == true){
        $workoutData = $workoutObject->showWorkoutProgramByMember($member_id);
      }
      foreach ($workoutData as $row) {
        if ($row['workout_id'] == $workout_id) { ?>
          <div class="workout">
            <div id="workout_name" class="h1 text-warning">Workout Name: <?php echo $row['workout_name'] ?></div>
            <?php
            if (isset($_GET['date_completed'])) { ?>
              <div id='workout_day' class="py-2">Completed Date: <?php echo $row['workout_day'] . " " . $date_completed ?></div>
            <?php } else { ?>
              <div id='workout_day' class="py-2"><b>Assigned Date: </b><?php echo $row['workout_day'] ?></div>
            <?php } ?>
            
            <div id="notes" class="py-2"><b>Note: </b><?php echo $row['notes'] ?></div>
            <div id="exercises" class="py-2"><b>Exercises: </b><?php echo $row['exercises'] ?></div>

          </div>
          <a class="btn btn-outline-warning" onclick="history.back()">< Back</a>
      <?php }
      }
      ?>
    </div>
    <footer></footer>
  </div>
</body>

</html>