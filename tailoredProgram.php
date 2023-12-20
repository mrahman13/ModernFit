<?php
session_start();
include 'includes/autoloader.php';
$_SESSION['user_check'] = "member";
include 'includes/checkLogin.php';
include 'includes/memberHeader.php';
$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    .table {
      --bs-table-color: var(--txt-color);
      --bs-table-bg: var(--content-color);
      --bs-table-hover-color: var(--txt-color);
      --bs-table-hover-bg: var(--bg-color);
    }
  </style>
  <title>Program</title>
</head>

<body>
  <div id="container" class=" mx-sm-4 mx-xl-5 px-2 px-sm-3 px-xl-5">
    <div id="main">
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
          $mealObject = new mealProgramView();
          $mealData = $mealObject->showMealProgramByMember($_SESSION['member_id']);
          $i = 1;

          foreach ($mealData as $row) { ?>
              <tr onclick="window.location.href='recipeViewer?meal_id=<?php echo $row['meal_id']; ?>'">
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
          $workoutObject = new workoutProgramView();
          $workoutData = $workoutObject->showWorkoutProgramByMember($_SESSION['member_id']);
          $i = 1;

          foreach ($workoutData as $row) { ?>
          
              <tr onclick="window.location.href='workoutViewer?workout_id=<?php echo $row['workout_id']; ?>'">
                <th><?php echo $i++ ?></th>
                <td><?php echo ucfirst($row['workout_name']) ?></td>
                <td><?php echo ucfirst($row['workout_day']) ?></td>
              </tr>
          <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <footer></footer>
  </div>
</body>

</html>