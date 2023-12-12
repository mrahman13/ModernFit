<?php
    session_start();
    include 'includes/autoloader.php';
    $_SESSION['user_check'] = "member";
    include 'includes/checkLogin.php';
    include 'includes/memberHeader.php';
    $user_id = $_SESSION['user_id'];
    $memberObject = new memberView();
    $pin = $memberObject->showMemberPin();
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
      <a href="entryLog">Entry Log</a>
      <a href="nutrition">Nutritional Info</a>
      <a href="tailoredProgram">Tailored Program</a>
      <p><?php echo $pin ?> </p>
    </div>
    <footer></footer>
  </div>
</body>

</html>