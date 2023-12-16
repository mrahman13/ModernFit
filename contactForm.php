<?php
    session_start();
    include 'includes/autoloader.php';
    $_SESSION['user_check'] = "member";
    include 'includes/checkLogin.php';
    $user_id = $_SESSION['user_id'];
    include 'includes/memberHeader.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Form</title>
  <style>
    .content {
      width: 1000px;
    }
  </style>
</head>

<body>
  <div id="container" class="container">
    <div id="main">
    <div class="display-3 text-center mt-5 p-4 text-warning"><b>Contact Form</b></div>
    <div class="d-flex justify-content-center">
      <form class="content" action="https://formspree.io/f/xgejgrka" method="post">
        <div class="row gy-3 p-0">

          <div class="col-3">
            <label class="text-warning h4">Name: </label>
          </div>
          <div class="col-9">
            <input class="form-control border-3" type="text" placeholder="Name" name="Name">
          </div>

          <div class="col-3">
            <label class="text-warning h4">Phone Number: </label>
          </div>
          <div class="col-9">
            <input class="form-control border-3 h-100" type="text" placeholder="Phone Number" name="Phone">
          </div>

          <div class="col-3">
            <label class="text-warning h4">Email Address:</label>
          </div>
          <div class="col-9">
            <input class="form-control border-3 h-100" type="email" placeholder="Email Address" name="Email">
          </div>

          <div class="col-12">
            <label class="text-warning h4">Message:</label>
          </div>
          <div class="col-12">
            <textarea textarea class="form-control border-3" name="Message" placeholder="Messages" rows="10"></textarea>
          </div>

          <input class="btn btn-warning" type="Submit" value="Submit">
        </div>
      </form>
    </div>
    <!-- The source I used to help me set up a contact form -->
    <!-- https://www.youtube.com/watch?v=Q2dMnVfQgXA&t=22s-->


</form>
    </div>
    <footer></footer>
</body>

</html>