<?php
session_start();
include 'includes/autoloader.php';
include 'includes/guestHeader.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign In</title>
  <style>
    .content {
      width: 500px;
    }
  </style>
</head>

<body>
  <div id="container" class="container">
    <div id="main">
      <div class="display-3 text-center mt-5 p-4 text-warning"><b>Sign In</b></div>

      <div class="d-flex justify-content-center w-100">
        <form class="row content mx-1 gy-3" method="post">
          <input class="form-control border-3" type="email" id="email" name="email" placeholder="Email Address:" required>
          <input class="form-control border-3" type="password" id="password" name="password" placeholder="Password:" required>
          <input class="btn btn-warning" id="button" type="submit" value="Submit" name="signIn">
        </form>
      </div>

      <?php
        if (isset($_POST['signIn'])) {
          // $mealLogObj = new fitnessLogContr();
          //gets form data
          $email = $_POST['email'];
          $password = $_POST['password'];
          $signIn = new usersContr();
          $signIn->signIn($email, $password);
        }
      ?>
      
    </div>
    <footer></footer>
  </div>
  <script>
		//prevents the form resubmitting when the page is refreshed
		if (window.history.replaceState) {
			window.history.replaceState(null, null, window.location.href);
		}
	</script>
</body>

</html>