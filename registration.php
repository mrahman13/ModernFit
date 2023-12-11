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
  <title>Registration</title>
</head>

<body>
  <div id="container" class="container">
    <header id="header" class="header">
      <!-- something for the drop down menu -->
      <div id="logo" class="logo">
        <a href="index"><img src="" alt="ModernFit Logo"></a>
      </div>
      <nav id="header-nav">
        <ul>
          <li><a href="signIn">Sign In</a></li>
        </ul>
      </nav>
    </header>
    <div id="main">
      <h1>Registration</h1>
      <form method="post" enctype="multipart/form-data">
        <input type="text" id="first_name" name="first_name" placeholder="Please enter your first name:" required>
        <input type="text" id="last_name" name="last_name" placeholder="Please enter your last name:" required>
        <input type="email" id="email" name="email" placeholder="Please enter your email:" required>
        <input type="password" id="password" name="password" placeholder="Please enter your password:" required>
        <input type="text" id="goals" name="goals" placeholder="Please enter your goals and determinations:" required>
        <input type="file" id="profile_pic" name="profile_pic" accept="image/*">
         <!-- https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input/file-->
        <!-- The source I used to help me allow the user to upload a file for their profile picture.-->
        <input id="button" type="submit" value="Submit" name="registration"><br><br>
      </form>
      <?php
      if (isset($_POST['registration'])) {
        //gets form data
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
     
        // Process profile picture upload
      $filename = $_FILES['profile_pic']['name'];
      $extension = pathinfo($filename, PATHINFO_EXTENSION);

      $profile_picture = uniqid() . '.' . $extension;

       if (!move_uploaded_file($_FILES['profile_pic']['tmp_name'], __DIR__ . "/Profile_picture/" . $profile_picture)) {
       die("Failed to upload profile picture");
      }

        $date_joined = date("Y-m-d");

        $email = $_POST['email'];
        $password = $_POST['password'];
        $user_role = "member";

        $userRegistrationObj = new usersContr();
        $userRegistrationObj->createUser($email, $password, $user_role);
        
        $userIdObj = new usersView();
        $memberRegistrationObj = new memberContr();
        $memberRegistrationObj->createMember($first_name, $last_name, $profile_picture, $date_joined, $userIdObj->showUserId($email));
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