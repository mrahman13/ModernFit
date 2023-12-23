<?php
    session_start();
    include 'includes/autoloader.php';
    $_SESSION['user_check'] = "personalTrainer";
    include 'includes/checkLogin.php';
    include 'includes/personalTrainerHeader.php';

    $personal_trainer_id = $_SESSION['personal_trainer_id']; 
    if (isset($_GET['member_id']) && $_GET['member_id'] !== '') {
      $member_id = $_GET['member_id'];
    } else {
      echo "Member ID null";
    }

    if (isset($_POST['workout_submit'])) {
      $workout_name = $_POST['workout_name'];
      $notes = $_POST['notes'];
      $workout_day = $_POST['workout_day'];
      $excercises = $_POST['excercises'];

      $workoutProgramObject = new workoutProgramContr();
      $workoutProgramObject->WorkoutProgram($workout_name, $notes, $workout_day, $excercises,$member_id,$personal_trainer_id);
    }
  
  
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
              
               <!-- Workout form -->
</form>
    <form method="post">
    <h1>Workout plan</h1>
    <label for="workout_name">Workout Name:</label>
        <input type="text" id="workout_name" name="workout_name" required>
    <label for="notes">Notes:</label>
        <input type="text" id="notes" name="notes" required>
    <label for="workout_day">Workout Day:</label>
        <input type="text" id="workout_day" name="workout_day" required>
    <label for="excercises">Excercises:</label>
        <input type="text" id="excercises" name="excercises" required>
        <input id="button" type="submit" value="Submit" name="workout_submit"><br><br>
        </form>
    </div>
    <footer></footer>
  </div>
</body>

</html>