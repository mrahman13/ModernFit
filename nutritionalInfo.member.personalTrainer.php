<?php
    session_start();
    include 'includes/autoloader.php';
    $_SESSION['user_check'] = "memberPersonalTrainer";
    include 'includes/checkLogin.php';
    include 'includes/memberHeader.php';
    
    //set key
    if(isset($_POST["search"]))
    {
      $key = $_POST["key"];
    }

    else {
      $key = '';
    }
    $data = new NI_View();
    $integ_data = $data->showIngredients($key);
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/mobile.css">
  <link rel="stylesheet" media="only screen and (min-width: 720px)" href="css/desktop.css">
  <title>Nutritional Info</title>
</head>

<body>
    <div id="main">


      <div class="search-box">
        <form class="" action="" method="post">
          <input type="text" class="" placeholder="Search Ingredient..." name="key" value="<?php isset($_GET['keyword']) ? $_GET['keyword'] : '' ?>">
          <button name="search" type="submit" class="">Search</button>
        </form>
      </div>

      <div class="ingredient-body">
        <div class="ingredient">
          
          <?php
          foreach($integ_data as $row) {?>
            <div class="responsive-row">
              <div class="container set-padding" id="integ">
                <div class="image">
                  <img style="width:500px;height:300px;" class="img-responsive" src="../img/<?php echo $row['image'] ?>">
                </div>

                <div class="info">
                  <p id='ingredient_name'><?php echo "Name: ".$row['ingredient_name'] ?></p>
                  <p id='calorie'><?php echo "Calorie Count: ".$row['calories'] ?></p>
                  <p id='protein'><?php echo "Protein: ".$row['protein'] ?></p>
                  <p id='carbohydrates'><?php echo "Carbohydrates: ".$row['carbohydrates'] ?></p>
                  <p id='fat'><?php echo "Fat: ".$row['fat'] ?></p>
                </div>
              </div>
            </div>
          <?php } ?>

        </div>
      </div>
    </div>
    <footer></footer>
  </div>
</body>

</html>