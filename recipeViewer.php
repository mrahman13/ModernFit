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
  <title>Recipes</title>
</head>

<body>
  <div id="container" class="my-3 mx-sm-4 mx-xl-5 px-2 px-sm-3 px-xl-5">
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
            <div id='food_name' class="h1 text-warning">
              <?php
                if (isset($_GET['date_completed'])) { echo $row['food_name'] . " " . $date_completed; }
                else { echo $row['food_name']; }
              ?>
            </div>
            <div id='meal_time' class="py-2"><b>Meal Time: </b><?php echo date('H:i', strtotime($row['meal_time'])) ?></div>
            <div id='notes' class="py-2"><b>Notes: </b><?php echo $row['notes'] ?></div>
            <div id='ingredients' class="py-2"><b>Ingredients: </b><?php echo $row['ingredients'] ?></div>
            <div id='method' class="py-2"><b>Method: </b><?php echo $row['method'] ?></div>
            <hr class="border border-2">
            <div class="h4 text-warning">Nutritional Information</div>
            <div id='calories' class="py-2"><b>Calories: </b><?php echo $row['calories'] . "cal" ?></div>
            <div id='protein' class="py-2"><b>Protein: </b><?php echo $row['protein'] . "g" ?></div>
            <div id='carbohydrates' class="py-2"><b>Carbohydrates: </b><?php echo $row['carbohydrates'] . "g" ?></div>
            <div id='fat' class="py-2"><b>Fat: </b><?php echo $row['fat'] . "g" ?></div>
          </div>
          <a class="btn btn-outline-warning" onclick="history.back()">< Back</a>
      <?php }
      } ?>
    </div>
    <footer></footer>
  </div>
</body>

</html>