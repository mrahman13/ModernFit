<?php
    session_start();
    include 'includes/autoloader.php';
    include 'includes/checkLogin.php';
    include 'includes/trainerHeader.php';
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
        <a href="signOut"><img src="" alt="ModernFit Logo"></a>
      </div>
      <nav id="header-nav">
        <ul>
          <li><a href="signOut">Sign Out</a></li>
        </ul>
      </nav>
    </header>
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
        echo "<p><a href='personalTrainerMemberData.personalTrainer.php?member_id={$member['member_id']}' target='_blank'>{$member['first_name']} {$member['last_name']}</a></p>";
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

     