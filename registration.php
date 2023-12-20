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
  <title>Registration</title>
  <style>
    .content {
      width: 500px;
    }
  </style>
</head>

<body>
  <div id="container" class="container">
    <div id="main">
      <div class="display-3 text-center mt-5 p-4 text-warning"><b>Registration</b></div>
      <div class="d-flex justify-content-center w-100">
      <form class="row content mx-1 gy-3" method="post" enctype="multipart/form-data">
        <input class="form-control border-3" type="text" id="first_name" name="first_name" placeholder="Please enter your first name:" required>
        <input class="form-control border-3" type="text" id="last_name" name="last_name" placeholder="Please enter your last name:" required>
        <input class="form-control border-3" type="email" id="email" name="email" placeholder="Please enter your email:" required>
        <input class="form-control border-3" type="password" id="password" name="password" placeholder="Please enter your password:" required>
        <input class="form-control border-3" type="text" id="goals" name="goals" placeholder="Please enter your goals and determinations:" required>
        <input class="form-control border-3" type="file" id="profile_pic" name="profile_pic" accept="image/*">
         <!-- https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input/file-->

        <!-- The source I used to help me allow the user to upload a file for their profile picture.-->
        <input class="btn btn-warning" id="button" type="submit" value="Submit" name="registration"><br><br>
      </form>
  </div>
      <?php
      if (isset($_POST['registration'])) {
        //gets form data
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $goals = $_POST['goals'];
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
        $memberRegistrationObj->createMember($first_name, $last_name, $profile_picture, $goals, $date_joined, $userIdObj->showUserId($email));
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