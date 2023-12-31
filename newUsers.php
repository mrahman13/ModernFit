<?php
session_start();
include 'includes/autoloader.php';
$_SESSION['user_check'] = "admin";
include 'includes/checkLogin.php';
include 'includes/adminHeader.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create users</title>
  <style>
    .content {
      width: 500px;
    }
  </style>
</head>

<body>
  <div id="container" class="container">
    <div id="main">
      <div class="display-3 text-center mt-5 p-4 text-warning"><b>Create Users</b></div>

      <div class="dropdown" data-bs-theme="dark">
        <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"> Select User </button>

        <ul class="dropdown-menu">
          <form id="workout" method="post">
            <li>
              <input class="dropdown-item" id="button" type="submit" value="Admin" name="admin">
              <input class="dropdown-item" id="button" type="submit" value="Manager" name="manager">
              <input class="dropdown-item" id="button" type="submit" value="Personal Trainer" name="personalTrainer">
            </li>
          </form>
        </ul>
      </div>

      <?php if (isset($_POST['admin'])) { ?>
        <div class="d-flex justify-content-center w-100">
          <form class="row content mx-1 gy-3" method="post" enctype="multipart/form-data">
            <input class="form-control border-3" type="text" id="first_name" name="first_name" placeholder="First name:" required>
            <input class="form-control border-3" type="text" id="last_name" name="last_name" placeholder="Last name:" required>
            <input class="form-control border-3" type="email" id="email" name="email" placeholder="Email:" required>
            <input class="form-control border-3" type="password" id="password" name="password" placeholder="Password:" required>
            <input class="btn btn-warning" id="button" type="submit" value="Submit" name="register">
          </form>
        </div>
      <?php } else if (isset($_POST['manager'])) { ?>
        <div class="d-flex justify-content-center w-100">
          <form class="row content mx-1 gy-3" method="post" enctype="multipart/form-data">
            <input class="form-control border-3" type="text" id="first_name" name="first_name" placeholder="First name:" required>
            <input class="form-control border-3" type="text" id="last_name" name="last_name" placeholder="Last name:" required>
            <input class="form-control border-3" type="email" id="email" name="email" placeholder="Email:" required>
            <input class="form-control border-3" type="password" id="password" name="password" placeholder="Password:" required>
            <input class="btn btn-warning" id="button" type="submit" value="Submit" name="register">
          </form>
        </div>
      <?php } else if (isset($_POST['personalTrainer'])) { ?>
        <div class="d-flex justify-content-center w-100">
          <form class="row content mx-1 gy-3" method="post" enctype="multipart/form-data">
            <input class="form-control border-3" type="text" id="first_name" name="first_name" placeholder="First name:" required>
            <input class="form-control border-3" type="text" id="last_name" name="last_name" placeholder="Last name:" required>
            <input class="form-control border-3" type="email" id="email" name="email" placeholder="Email:" required>
            <input class="form-control border-3" type="password" id="password" name="password" placeholder="Password:" required>
            <div class="d-flex mt-2 p-0">
              <div class="h5 text-warning text-nowrap my-auto me-2">Upload profile picture:</div>
              <input class="form-control border-3" type="file" id="profile_pic" name="profile_pic" accept="image/*">
            </div>
            <!-- https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input/file-->
            <!-- The source I used to help me allow the user to upload a file for their profile picture.-->
            <input class="btn btn-warning" id="button" type="submit" value="Submit" name="register">
          </form>
        </div>
      <?php } ?>

      <?php
      if (isset($_POST['register'])) {
        echo "r";
        if (isset($_POST['admin']) || isset($_POST['manager'])) {
          echo "a1";
          //gets form data
          $first_name = $_POST['first_name'];
          $last_name = $_POST['last_name'];
          $email = $_POST['email'];
          $password = $_POST['password'];

          if (isset($_POST['admin'])) {
            echo "a";
            $user_role = "admin";
            $userRegistrationObj = new usersContr();
            $userRegistrationObj->createUser($email, $password, $user_role);
            $adminRegistrationObj = new adminContr();
            $userIdObj = new usersView();
            $adminRegistrationObj->createAdmin($first_name, $last_name, $userIdObj->showUserId($email));
          } else if (isset($_POST['manager'])) {
            echo "m";
            $user_role = "manager";
            $userRegistrationObj = new usersContr();
            $userRegistrationObj->createUser($email, $password, $user_role);
            $managerRegistrationObj = new managerContr();
            $userIdObj = new usersView();
            $managerRegistrationObj->createManager($first_name, $last_name, $userIdObj->showUserId($email));
          }
        } else if (isset($_POST['personalTrainer'])) {
          echo "p";
          //gets form data
          $first_name = $_POST['first_name'];
          $last_name = $_POST['last_name'];
          $goals = $_POST['goals'];
          // Process profile picture upload
          $filename = $_FILES['profile_pic']['name'];
          $extension = pathinfo($filename, PATHINFO_EXTENSION);

          $profile_picture = uniqid() . '.' . $extension;

          $date_joined = date("Y-m-d");

          $email = $_POST['email'];
          $password = $_POST['password'];
          $user_role = "member";

          $userRegistrationObj = new usersContr();
          $success = $userRegistrationObj->createUser($email, $password, $user_role);

          $userIdObj = new usersView();
          $personalTrainerRegistrationObj = new personalTrainerContr();
          $personalTrainerRegistrationObj->createPersonalTrainer($first_name, $last_name, $profile_picture, $userIdObj->showUserId($email));

          if ($success) {
            if (!move_uploaded_file($_FILES['profile_pic']['tmp_name'], __DIR__ . "/img/profilePicture/" . $profile_picture)) {
              die("Failed to upload profile picture");
            }
          }
        }
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