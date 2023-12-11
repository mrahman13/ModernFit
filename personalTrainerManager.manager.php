<?php
    session_start();
    include 'includes/autoloader.php';
    $_SESSION['user_check'] = "manager";
    include 'includes/checkLogin.php';
    $user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/mobile.css">
  <link rel="stylesheet" media="only screen and (min-width: 720px)" href="css/desktop.css">
  <title>Personal Trainer Manager</title>
</head>

<body>
  <div id="container" class="container">
    <header id="header" class="header">
      <!-- something for the drop down menu -->
      <div id="logo" class="logo">
        <a href="signOut"><img src="" alt="ModernFit Logo"></a>
      </div>
      <nav id="header-nav">
        <ul>
          <li><a href="signOut">Sign Out</a></li>
        </ul>
      </nav>
    </header>
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