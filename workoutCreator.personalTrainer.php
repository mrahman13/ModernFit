<?php
    session_start();
    include 'includes/autoloader.php';
    $_SESSION['user_check'] = "personalTrainer";
    include 'includes/checkLogin.php';
    include 'includes/trainerHeader.php';
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

    </div>
    <footer></footer>
  </div>
</body>

</html>