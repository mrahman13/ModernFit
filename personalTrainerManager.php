<?php
session_start();
include 'includes/autoloader.php';
$_SESSION['user_check'] = "manager";
include 'includes/checkLogin.php';
$user_id = $_SESSION['user_id'];
include 'includes/managerHeader.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Tailored Programs</title>
</head>

<body>
  <div id="container" class="container">

    <div id="main">
      <div class="h1 py-2 text-warning">Manage Tailored Programs</div>

      <?php
      $personalTrainersObject = new personalTrainerView();
      $personalTrainersData = $personalTrainersObject->showAllPersonalTrainers();
      foreach ($personalTrainersData as $row) { ?>
      <p id='personal_trainer'>
        <a class='none text-warning' href="programManager?personal_trainer_id=<?php echo $row['personal_trainer_id']; ?>">
          <?php echo $row['first_name'] . " " . $row['last_name'] ?>
        </a>
      </p>
      
      <?php }
      ?>
    </div>
    <footer></footer>
  </div>
</body>

</html>