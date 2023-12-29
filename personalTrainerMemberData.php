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
    .table {
      --bs-table-color: var(--txt-color);
      --bs-table-bg: var(--content-color);
      --bs-table-hover-color: var(--txt-color);
      --bs-table-hover-bg: var(--bg-color);
    }
    .clickable {
      cursor: pointer;
    }
  </style>
</head>

<body>
  <div id="container" class="mx-sm-4 mx-xl-5 px-2 px-sm-3 px-xl-5">

    <div id="main">
      <div class="h1 py-2 text-warning">View members data</div>
      <?php
      foreach ($memberDataResult as $row) {
      ?>
        <div class="mb-2" id='name'>Name: <?php echo $row['first_name'] . ' ' . $row['last_name'] ?></div>
        <img class="img-responsive" src="../img/profilePicture/<?php echo $row['profile_picture'] ?>" draggable="false" width="200px">
        <div class="my-2" id='date_joined'>Date Joined: <?php echo date('Y-m-d', strtotime($row['date_joined'])) ?></div>
        <div class="my-2" id='pin'>PIN: <?php echo $row['pin'] ?></div>
      <?php
      } ?>

      <div class="row">
        
        <div class="col-md-12 col-lg-6 p-3">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col"><div class="text-warning">No.</div></th>
                <th scope="col"><div class="text-warning">Food Name</div></th>
                <th scope="col"><div class="text-warning">Time<div></th>
              </tr>
            </thead>

            <tbody class="table-group-divider">
              <?php
              $membersMealObject = new mealProgramView();
              $membersMealData = $membersMealObject->showMealProgramByMember($member_id);
              $i = 1;

              foreach ($membersMealData as $row) { ?>

              <tr class="clickable" onclick="window.location.href='recipeViewer?meal_id=<?php echo $row['meal_id']; ?>&personal_trainer_id=<?php echo $row['personal_trainer_id']; ?>'">
                <th><?php echo $i++ ?></th>
                <td><?php echo $row['food_name'] ?></td>
                <td><?php echo date('H:i', strtotime($row['meal_time'])) ?></td>
              </tr>
              
              <?php } ?>
            </tbody>
          </table>
        </div>

        <div class="col-md-12 col-lg-6 p-3">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col"><div class="text-warning">No.</div></th>
                <th scope="col"><div class="text-warning">Workout Name</div></th>
                <th scope="col"><div class="text-warning">Workout Day</div></th>
              </tr>
            </thead>
            
            <tbody class="table-group-divider">
              <?php
              $membersWorkoutObject = new workoutProgramView();
              $membersWorkoutData = $membersWorkoutObject->showWorkoutProgramByMember($member_id);
              $i = 1;

              foreach ($membersWorkoutData as $row) { ?>

              <tr class="clickable" onclick="window.location.href='workoutViewer?workout_id=<?php echo $row['workout_id']; ?>&personal_trainer_id=<?php echo $row['personal_trainer_id']; ?>'">
                <th><?php echo $i++ ?></th>
                <td><?php echo ucfirst($row['workout_name']) ?></td>
                <td><?php echo ucfirst($row['workout_day']) ?></td>
              </tr>
              
              <?php } ?>
            </tbody>
          </table>
        </div>

      </div>


      <div class="row">
        <div class="col-md-12 col-lg-6 p-3">
          
          <div class="d-flex">
            <div class="input-group">
              <button class="btn btn-outline-warning w-50" type="button" onclick="redirectToWorkoutCreator()">Create workout program</button>
              <button class="btn btn-outline-warning w-50" type="button" onclick="redirectToMealCreator()">Create meal program</button>
            </div>
          </div>

        </div>

        <div class="col-md-12 col-lg-6 p-3">
          <a class="btn btn-warning w-100 me-lg-3 me-xl-5" href="entryLog?member_id=<?php echo $member_id?>">Entry Log</a>
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