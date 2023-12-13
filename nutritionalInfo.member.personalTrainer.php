<?php
    session_start();
    include 'includes/autoloader.php';
    $_SESSION['user_check'] = "memberpersonalTrainer";

    if($_SESSION['user_role'] == 'member'){
    include 'includes/memberHeader.php';
    }
    else{
      include 'includes/personalTrainerHeader.php';
    }
    include 'includes/checkLogin.php';
    
    //set key
    if(isset($_POST["search"]))
    {
      $key = $_POST["key"];
    }

    else {
      $key = '';
    }
    $data = new NI_View();
    $ingre_data = $data->showIngredients($key);
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/desktop.css">
  <title>Nutritional Info</title>
  
</head>

<body>
    <div id="main">


      <div class="container mx-auto my-2 p-0" id="search-box">
        <form class="d-flex" method="post">
          <input type="text" class="form-control w-100 border-3 me-2" placeholder="Search Ingredient..." name="key" value="<?php isset($_GET['keyword']) ? $_GET['keyword'] : '' ?>">
          <button name="search" type="submit" class="btn btn-outline-warning border-3">Search</button>
        </form>
      </div>

      <div class="container p-1 mx-auto" id="ingre-body"> <!-- border -->
        <div class="row mx-auto" id="ingredient-row"> <!-- border -->
          
          <?php

          foreach($ingre_data as $row) {?>
            
            <div class="col-md-6 col-sm-12 p-1 rounded-3" id="ingre"><!-- border border-4 border-danger -->
              <div class="container text-center">
                <div class="row py-2"> <!-- border border-4 border-warning -->
                  <div class="col-xl-6 col-sm-12 m-auto" id="image">
                    <img class="img-responsive" src="../img/<?php echo $row['image'] ?>" draggable="false">
                  </div>

                  <div class="col-xl-6 col-sm-12" id="info">
                    <div class="container px-0 py-1">
                      <p id='ingredient_name'><b>Name: </b><?php echo $row['ingredient_name'] ?></p>
                      <p id='ingredient_type'><b>Type: </b><?php echo $row['food_type'] ?></p>
                      <p id='calorie'><b>Calorie Count: </b><?php echo $row['calories'] ?></p>
                      <p id='protein'><b>Protein: </b><?php echo $row['protein'] ?></p>
                      <p id='carbohydrates'><b>Carbohydrates: </b><?php echo $row['carbohydrates'] ?></p>
                      <p id='fat'><b>Fat: </b><?php echo $row['fat'] ?></p>
                    </div>
                  </div>
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