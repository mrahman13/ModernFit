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
  <title>PT Member Profiles</title>
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
          <li><a href="includes/signOut.php">Sign Out</a></li>
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
      $searchMember = new personalTrainerContr();
      $members = $searchMember->searchMember($search);
  
      foreach ($members as $member) {
          echo "<p>{$member['first_name']} {$member['last_name']}</p>";
         }
      }
          
        ?>
    </div>
    <footer></footer>
  </div>
</body>

</html>