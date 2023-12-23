<?php
    session_start();
    include 'includes/autoloader.php';
    include 'includes/checkLogin.php';
    include 'includes/personalTrainerheader.php';

    if (isset($_POST['search'])) {
      $search = $_POST['searchMember']; 
    }
    else
    {
      $search = '';
    }
    $searchMember = new memberContr();
    $members = $searchMember->searchMember($search);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PT Member Profiles</title>
</head>

<body>
  <div id="container" class="container">

    <div id="main">
      <div class="h1 py-2 text-warning">View members profiles</div>
        <form class="input-group" method="post">
          <input type="text" class="form-control border-3 border-end-0" name="searchMember" id="searchMember" placeholder="Search for a member" value="<?php echo $search; ?>">
          <input type="submit" class="btn btn-outline-warning border-3" name="search" id="button">
        </form>

        <div class="mt-2">
          <?php
          
          foreach ($members as $member) {
            echo "<p><a class='none text-warning' href='personalTrainerMembersData?member_id={$member['member_id']}'>{$member['first_name']} {$member['last_name']}</a></p>";
          }
              
          ?>

      </div>
    </div>
    <footer></footer>
  </div>
</body>

</html>

      <!-- search member reference -->
      <!--  https://www.youtube.com/watch?v=9ANd4KVPQtE&t=726s-->

     