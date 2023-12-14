<?php
    session_start();
    include 'includes/autoloader.php';
    include 'includes/checkLogin.php';
    include 'includes/personalTrainerheader.php';
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
    <h1>View members profiles</h1>
      <form method="post">
        <input type="text" name="searchMember" id="searchMember" placeholder="Search for a member" required>
        <input type="submit" value="search" id="button"><br><br>
      </form>
      <?php
      if (isset($_POST['searchMember'])) {
      $search = $_POST['searchMember']; 
      $searchMember = new memberDataContr();
      $members = $searchMember->searchMember($search);
  
      foreach ($members as $member) {
        echo "<p><a href='personalTrainerMembersData?member_id={$member['member_id']}' target='_blank'>{$member['first_name']} {$member['last_name']}</a></p>";
      }
      }
          
        ?>
    </div>
    <footer></footer>
  </div>
</body>

</html>

      <!-- search member reference -->
      <!--  https://www.youtube.com/watch?v=9ANd4KVPQtE&t=726s-->

     