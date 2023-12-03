<?php
    session_start();
    include 'includes/autoloader.php';
    include 'includes/checkLogin.php';
    include 'includes/memberHeader.php';

    if (isset($_SESSION['meal_id'])) {
        $unset($_SESSION['meal_id']);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/mobile.css">
  <link rel="stylesheet" media="only screen and (min-width: 720px)" href="css/desktop.css">
  <title>Entry Log</title>
</head>

<body>
  <div id="container" class="container">
    <div id="main">
      <div class="logMeals">
        <h1>Log meals</h1>
        <form method="post">
          <input type="date" id="date_completed" name="date_completed" required>
          <input type="text" id="meal_name" name="meal_name" placeholder="Meal name:" required>
          <input id="button" type="submit" value="Meal log" name="mealLog"><br><br>
        </form>
        <?php
        	if (isset($_POST['mealLog'])) {
            $mealLogObj = new mealLogContr();
            $mealObject = new mealProgramView();
            $data = $mealObject->showMealProgram();
            //gets form data
            $meal_name = $_POST['meal_name'];
            $date_completed = $_POST['date_completed'];

            foreach($data as $row) {
              if($row['meal_name'] == $meal_name){
                $meal_id = $row['meal_id'];
                $personal_trainer_id = $row['personal_trainer_id'];
                $meal_check = $mealObject->mealCheck($meal_name, $personal_trainer_id);
                $mealLogObj->createMealLog($meal_name, $date_completed, $meal_id, $meal_check);
              }
              // else{
              //   echo "Meal does not exist";
              // }
            }
          }
        ?>
      </div>
    </div>
    <footer></footer>
  </div>
</body>

</html>