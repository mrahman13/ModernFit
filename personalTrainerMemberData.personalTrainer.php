<?php
    session_start();
    include 'includes/autoloader.php';
    include 'includes/checkLogin.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/mobile.css">
  <link rel="stylesheet" media="only screen and (min-width: 720px)" href="css/desktop.css">
  <title>PT Member Profiles</title>
</head>

<body>
  <div id="container" class="container">
    <header id="header" class="header">
      <!-- something for the drop down menu -->
      <div id="logo" class="logo">
        <a href="includes/signOut.php"><img src="" alt="ModernFit Logo"></a>
      </div>
      <nav id="header-nav">
        <ul>
          <li><a href="includes/signOut.php">Sign Out</a></li>
        </ul>
      </nav>
    </header>
    <div id="main">
    <h1>Member Information</h1>
    <?php
$member_id = $_GET['member_id'];
$memberData = new memberDataView();
$memberDataResult = $memberData->showMemberData($member_id);


foreach ($memberDataResult as $row) {
  ?>
  <p id='name'>Name: <?php echo $row['first_name'] . ' ' . $row['last_name'] ?></p>
  <p id='profile_picture'>Profile Picture: <?php echo $row['profile_picture'] ?></p>
  <p id='date_joined'>Date Joined: <?php echo date('Y-m-d', strtotime($row['date_joined'])) ?></p>
  <p id='pin'>PIN: <?php echo $row['pin'] ?></p>
  <?php
}
?>

    </div>
    <footer></footer>
  </div>
</body>

</html>

      <!-- Reference for date format -->
      <!-- https://stackoverflow.com/questions/24094571/formating-date-string-with-strtotime-and-date -->

