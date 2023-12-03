<?php
    session_start();
    include 'includes/autoloader.php';
    include 'includes/checkLogin.php';
    include 'includes/memberHeader.php';
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
            //gets form data
            $meal_name = $_POST['meal_name'];
            $date_completed = $_POST['date_completed'];
            $member_id = 4;
            $meal_id = 8;

            $mealLogObj->createMealLog($meal_name,$date_completed,$member_id,$meal_id);
          }
        ?>
      </div>
    </div>
    <footer></footer>
  </div>
</body>

</html>