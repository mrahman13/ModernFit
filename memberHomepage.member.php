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
  <title>Program</title>
</head>

<body>
  <div id="container" class="container">
    <div id="main">
      <a href="entryLog.member.php">Entry Log</a>
      <a href="nutritionalInfo.member.php">Nutritional Info</a>
      <a href="tailoredProgram.member.php">Tailored Program</a>
    </div>
    <footer></footer>
  </div>
</body>

</html>