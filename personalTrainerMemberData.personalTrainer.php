<?php
    session_start();
    include 'includes/autoloader.php';
    include 'includes/checkLogin.php';
    include 'includes/personalTrainerheader.php';


    if (isset($_GET['member_id']) && $_GET['member_id'] !== '') {
      $member_id = $_GET['member_id'];
    } else {
      echo "Member not found";
    }
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

    <div id="main">
    <h1>Member Information</h1>
    <?php
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

