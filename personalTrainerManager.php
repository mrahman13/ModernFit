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
  <title>Personal Trainer Manager</title>
</head>

<body>
  <div id="container" class="container">

    <div id="main">
      <?php
        $personalTrainersObject = new personalTrainerView();
        $personalTrainersData = $personalTrainersObject->showAllPersonalTrainers();
        foreach($personalTrainersData as $row){ ?>
          <a href="programManager?personal_trainer_id=<?php echo $row['personal_trainer_id']; ?>"><p id='personal_trainer_name'><?php echo $row['first_name'] . " " . $row['last_name'] ?></p></a>
        <?php }
      ?>
    </div>
    <footer></footer>
  </div>
</body>

</html>