<?php
    session_start();
    include 'includes/autoloader.php';
    $_SESSION['user_check'] = "personalTrainer";
    include 'includes/checkLogin.php';
    include 'includes/personalTrainerheader.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/mobile.css">
  <link rel="stylesheet" media="only screen and (min-width: 720px)" href="css/desktop.css">
  <title>Create program - Workout</title>
</head>

<body>
  <div id="container" class="container">
    <div id="main">

    </div>
    <footer></footer>
  </div>
</body>

</html>