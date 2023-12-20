<?php
session_start();
include 'includes/autoloader.php';
include 'includes/checkLogin.php';
include 'includes/personalTrainerheader.php';


if (isset($_GET['member_id']) && $_GET['member_id'] !== '') {
  $member_id = $_GET['member_id'];
} else {
  header("Location: 404");
}

$memberData = new memberView();
$memberDataResult = $memberData->showMemberData($member_id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PT Member Profiles</title>
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
      <?php }
      ?>
    </div>
    <footer></footer>
  </div>
</body>

</html>

<!-- Reference for date format -->
<!-- https://stackoverflow.com/questions/24094571/formating-date-string-with-strtotime-and-date -->