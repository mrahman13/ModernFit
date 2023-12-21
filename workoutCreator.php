<?php
    session_start();
    include 'includes/autoloader.php';
    $_SESSION['user_check'] = "personalTrainer";
    include 'includes/checkLogin.php';
    include 'includes/personalTrainerheader.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/mobile.css">
  <link rel="stylesheet" media="only screen and (min-width: 720px)" href="css/desktop.css">
  <title>Create program - Workout</title>
</head>

<body>
  <div id="container" class="container">
    <div id="main">
    <form method="post">
    <h1>Workout plan</h1>
        <input type="text" id="workout_name" name="workout_name" placeholder="Workout Name:" required>
        <input type="text" id="notes" name="notes" placeholder="Notes:" required>
        <input type="text" id="workout_day" name="workout_day" placeholder="Workout Day:" required>
        <input type="text" id="excercises" name="excercises" placeholder="Excercises:" required>
        <input id="button" type="submit" value="Submit" name="Submit"><br><br>
        </form>
    </div>
    <?php
      if (isset($_POST['workout_submit'])) {
        $workout_name = $_POST['workout_name'];
        $notes = $_POST['notes'];
        $workout_day = $_POST['workout_day'];
        $excercises = $_POST['excercises'];

        $workoutProgramObject = new workoutProgramContr();
        $workoutProgramObject->WorkoutProgram($workout_name, $notes, $workout_day, $excercises);
      }

      ?>
    <footer></footer>
  </div>
</body>

</html>