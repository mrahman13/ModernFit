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
  <title>Contact Form</title>
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
    <h1>Contact Form</h1>
    <form action="https://formspree.io/f/xgejgrka" method = "POST">
    <label>Name:</label>
    <input type="text" placeholder="Name" name="Name">
    <label>Phone Number:</label>
    <input type="text" placeholder="Phone Number" name="Phone">
    <label>Email Address:</label>
    <input type="text" placeholder="Email Address" name="Email">
    <label>Message:</label>
    <textarea name="Message" placeholder="Messages" rows="10"></textarea>
    <input type="Submit" value="Submit">
    <!-- The source I used to help me set up a contact form -->
    <!-- https://www.youtube.com/watch?v=Q2dMnVfQgXA&t=22s-->


</form>
    </div>
    <footer></footer>
</body>

</html>