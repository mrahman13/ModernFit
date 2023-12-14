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
if (isset($_GET['meal_id']) && $_GET['meal_id'] !== '') {
  $meal_id = $_GET['meal_id'];
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
      $mealObject = new mealProgramView();


      if ($ptCheck == true) {
        $data = $mealObject->showMealProgramByPersonalTrainer($personal_trainer_id);
      } else if ($mCheck == true){
        $data = $mealObject->showMealProgramByMember($member_id);
      }
      foreach ($data as $row) {
        if ($row['meal_id'] == $meal_id) { ?>
          <div class="meal">
            <?php
            if (isset($_GET['date_completed'])) { ?>
              <p id='food_name'><?php echo $row['food_name'] . " " . $date_completed ?></p>
            <?php } else { ?>
              <p id='food_name'><?php echo $row['food_name'] ?></p>
            <?php } ?>
            <p id='meal_time'><?php echo date('H:i', strtotime($row['meal_time'])) ?></p>
            <p id='notes'><?php echo $row['notes'] ?></p>
            <p id='ingredients'><?php echo $row['ingredients'] ?></p>
            <p id='method'><?php echo $row['method'] ?></p>
            <p id='calories'><?php echo "Calories: " . $row['calories'] . "cal" ?></p>
            <p id='protein'><?php echo "Protein: " . $row['protein'] . "g" ?></p>
            <p id='carbohydrates'><?php echo "Carbohydrates: " . $row['carbohydrates'] . "g" ?></p>
            <p id='fat'><?php echo "Fat: " . $row['fat'] . "g" ?></p>
          </div>
      <?php }
      } ?>
    </div>
    <footer></footer>
  </div>
</body>

</html>