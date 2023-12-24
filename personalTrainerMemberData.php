<?php
session_start();
include 'includes/autoloader.php';
$_SESSION['user_check'] = "personalTrainer";
include 'includes/checkLogin.php';
include 'includes/personalTrainerheader.php';


if (isset($_GET['member_id']) && $_GET['member_id'] !== '') {
  $member_id = $_GET['member_id'];
} else {
  header("Location: 404");
}

$memberData = new memberView();
$memberDataResult = $memberData->showMemberData($member_id);

$workoutLogObject = new workoutLogView();
$exercises = $workoutLogObject->showWorkoutLog($member_id);
$exerciseArray = [];
foreach ($exercises as $exercise) {
  $exerciseArray[] = $exercise['exercise'];
}
$exerciseArray = array_unique($exerciseArray);

$mealLogObject = new mealLogView();
$macrosArray = array('calories', 'protein', 'carbohydrates', 'fat');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PT Member Profiles</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
  <style>
    .graph {
      background-color: white;
      border-radius: 15px;
      display: none;
    }

    .graph.active {
      display: block;
    }
  </style>
</head>

<body>
  <div id="container" class="container">

    <div id="main">
      <div class="h1 py-2 text-warning">View members profiles</div>
      <?php
      foreach ($memberDataResult as $row) {
      ?>
        <p id='name'>Name: <?php echo $row['first_name'] . ' ' . $row['last_name'] ?></p>
        <img class="img-responsive" src="../img/profilePicture/<?php echo $row['profile_picture'] ?>" draggable="false" width="200px">
        <p id='date_joined'>Date Joined: <?php echo date('Y-m-d', strtotime($row['date_joined'])) ?></p>
        <p id='pin'>PIN: <?php echo $row['pin'] ?></p>
      <?php
      }

      $membersMealObject = new mealProgramView();
      $membersMealData = $membersMealObject->showMealProgramByMember($member_id);
      foreach ($membersMealData as $row) { ?>
        <a href="recipeViewer?meal_id=<?php echo $row['meal_id']; ?>&personal_trainer_id=<?php echo $row['personal_trainer_id']; ?>">
          <p id='food_name'><?php echo $row['food_name'] . " : " . date('H:i', strtotime($row['meal_time'])) ?></p>
        </a>

      <?php }
      $membersWorkoutObject = new workoutProgramView();
      $membersWorkoutData = $membersWorkoutObject->showWorkoutProgramByMember($member_id);
      foreach ($membersWorkoutData as $row) { ?>
        <a href="workoutViewer?workout_id=<?php echo $row['workout_id']; ?>&personal_trainer_id=<?php echo $row['personal_trainer_id']; ?>">
          <p id='workout_name'><?php echo $row['workout_name'] . " : " . $row['workout_day'] ?></p>
        </a>
      <?php } ?>



      <div class="row">
        <!-- <div class="col-md-12 col-lg-6 p-3">
          <div class="h3 text-warning">Macros</div>

          <form method="post">
            <div class="input-group">
              <input class="btn btn-outline-warning w-25" id="button" type="submit" value="Calories" name="calories">
              <input class="btn btn-outline-warning w-25" id="button" type="submit" value="Protein" name="protein">
              <input class="btn btn-outline-warning w-25" id="button" type="submit" value="Carbohydrates" name="carbohydrates">
              <input class="btn btn-outline-warning w-25" id="button" type="submit" value="Fat" name="fat">
            </div>
          </form>
        </div> -->

        <div class="col-md-12 col-lg-6 p-3">

          <div class="d-flex">
            <div class="input-group px-3">
              <button class="btn btn-outline-warning w-50" type="button" onclick="redirectToWorkoutCreator()">Create workout program</button>
              <button class="btn btn-outline-warning w-50" type="button" onclick="redirectToMealCreator()">Create meal program</button>
            </div>
          </div>

          <a class="none btn btn-outline-warning me-lg-3 me-xl-5" href="entryLog?member_id=<?php echo $member_id?>">Entry Log</a>


        </div>
      </div>



      <script>
        function redirectToWorkoutCreator() {
          var memberId = <?php echo json_encode($member_id); ?>;
          <?php echo "var memberId = $member_id;"; ?>
          <?php echo "sessionStorage.setItem('member_id', $member_id);"; ?>
          window.location.href = 'workoutCreator?member_id=' + memberId;
        }

        function redirectToMealCreator() {
          var memberId = <?php echo json_encode($member_id); ?>;
          <?php echo "var memberId = $member_id;"; ?>
          <?php echo "sessionStorage.setItem('member_id', $member_id);"; ?>
          window.location.href = 'mealCreator?member_id=' + memberId;
        }
      </script>
    </div>

    <footer></footer>
  </div>
</body>

</html>

<!-- Reference for date format -->
<!-- https://stackoverflow.com/questions/24094571/formating-date-string-with-strtotime-and-date -->