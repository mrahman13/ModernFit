<?php
    session_start();
    include 'includes/autoloader.php';
    $_SESSION['user_check'] = "member";
    include 'includes/checkLogin.php';
    include 'includes/memberHeader.php';
    $user_id = $_SESSION['user_id'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/mobile.css">
  <link rel="stylesheet" media="only screen and (min-width: 720px)" href="css/desktop.css">
  <title>Program</title>
  <style>

    body {
      margin: 0;
      padding: 0;
    }

    .container {
     width: 100%;
     max-width: 100%;
     margin: 0;
     padding: 0;
    }

    .gym-image {
      width: 100%; 
      height: 50vh;
      display: block;
    }

    #titleOverlay-content {
    position: absolute;
    top: 20%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    font-size: 100px;
    text-align: center;
    font-family: 'Roboto', sans-serif;
    background: rgba(0, 0, 0, 0.5);
    padding: 20px;
    width: 40%;
    }

    #infoOverlay-content {
    position: absolute;
    top: 15%;
    left: 10%;
    transform: translate(-50%, -50%);
    color: white;
    font-size: 20px;
    font-family: 'Roboto', sans-serif;
    }

    #aboutOverlay-content {
    position: absolute;
    top: 40%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    font-size: 20px;
    text-align: center;
    font-family: 'Roboto', sans-serif;
    background: rgba(0, 0, 0, 0.5); 
    padding: 10px; 
    }

    
  </style>
</head>

<body>
  <div id="container" class="container">
    <img src="img/Gym.png" class="gym-image">
    <div id="titleOverlay-content">
    <p>ModernFit</p>
    </div>
    <div id="infoOverlay-content">
    <p>Mon-Sat: 9:00-21:00</p>
    <p>Tel: +44 9182 238491</p>
    </div>
    <div id="aboutOverlay-content">
    <p>Here at ModernFit, we provide first-rate facilities, qualified trainers and a welcoming community in order to support you in your fitness objectives. Whether you're just beginning or an experienced fitness lover, we have the resources and programmes to help you succeed on your journey.</p>
    </div>
    <div id="main">
    </div>
    <footer></footer>
  </div>
</body>

</html>

