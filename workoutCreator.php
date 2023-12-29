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
      header("Location: 404");
    }
  
  
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create program - Workout</title>
</head>

<body>
  <div id="container" class="mx-sm-4 mx-xl-5 px-2 px-sm-3 px-xl-5">
    <div id="main">
      <div class="h1 text-warning py-2">Workout plan</div>

      <!-- Workout form -->
      <form class="row content mx-1 gy-2" method="post">
        <input class="form-control border-3" type="text" id="workout_name" name="workout_name" placeholder="Workout Name:" required>
        <input class="form-control border-3" type="text" id="notes" name="notes" placeholder="Notes:" required>
        <input class="form-control border-3" type="text" id="workout_day" name="workout_day" placeholder="Workout Day:" required>
        <input class="form-control border-3" type="text" id="excercises" name="excercises" placeholder="Excercises:" required>
        <input class="btn btn-warning" type="submit" value="Submit" name="workout_submit">
        
        <?php 
          if (isset($_POST['workout_submit'])) {
            $workout_name = $_POST['workout_name'];
            $notes = $_POST['notes'];
            $workout_day = $_POST['workout_day'];
            $excercises = $_POST['excercises'];
      
            $workoutProgramObject = new workoutProgramContr();
            $workoutProgramObject->WorkoutProgram($workout_name, $notes, $workout_day, $excercises,$member_id,$personal_trainer_id);
          }
        ?>
      </form>
    </div>
    <footer></footer>
  </div>
</body>

</html>