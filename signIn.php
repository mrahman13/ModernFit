<?php
include 'includes/autoloader.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/mobile.css">
  <link rel="stylesheet" media="only screen and (min-width: 720px)" href="css/desktop.css">
  <title>Sign In</title>
</head>

<body>
  <div id="container" class="container">
    <header id="header" class="header">
      <!-- something for the drop down menu -->
      <div id="logo" class="logo">
        <a href="index.php"><img src="" alt="ModernFit Logo"></a>
      </div>
      <nav id="header-nav">
        <ul>
          <li><a href="registration.php">Registration</a></li>
        </ul>
      </nav>
    </header>
    <div id="main">
      <h1>Sign in</h1>
      <form method="post">
        <input type="email" id="email" name="email" placeholder="Please enter your email:" required>
        <input type="password" id="password" name="password" placeholder="Please enter your password:" required>
        <input id="button" type="submit" value="Submit" name="signIn"><br><br>
      </form>
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