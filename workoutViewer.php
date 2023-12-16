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
  <link rel="stylesheet" href="css/mobile.css">
  <link rel="stylesheet" media="only screen and (min-width: 720px)" href="css/desktop.css">
  <title>Recipes</title>
</head>

<body>
  <div id="container" class="container">
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
            <?php
            if (isset($_GET['date_completed'])) { ?>
              <p id='workout_day'><?php echo $row['workout_day'] . " " . $date_completed ?></p>
            <?php } else { ?>
              <p id='workout_day'><?php echo $row['workout_day'] ?></p>
            <?php } ?>
            <p id="workout_name"><?php echo $row['workout_name'] ?></p>
            <p id="notes"><?php echo $row['notes'] ?></p>
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