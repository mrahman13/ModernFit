<?php
session_start();
include 'includes/autoloader.php';
include 'includes/checkLogin.php';
$_SESSION['user_check'] = "memberpersonalTrainer";

if ($_SESSION['user_role'] == 'member') {
  include 'includes/memberHeader.php';
} else if ($_SESSION['user_role'] == 'personalTrainer') {
  include 'includes/personalTrainerHeader.php';
}

//set key
if (isset($_POST["search"])) {
  $key = $_POST["key"];
} else {
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
  <style>
    #ingre:hover {
      box-shadow: 0px 0px 5px 5px var(--primary-color);
    }

    #image {
      height: 200px;
    }

    #image img {
      aspect-ratio: 3 / 2;
      height: 100%;
    }

    #info p {
      white-space: nowrap;
      max-height: 20px;
      margin: 10px;
    }
  </style>
  <title>Nutritional Info</title>

</head>

<body>
  <div class="p-2" id="main">
    <div class="container mx-auto my-2" id="search-box">
      <form class="d-flex" method="post">
        <input type="text" class="form-control w-100 border-3 me-2" placeholder="Search Ingredient..." name="key" value="<?php echo $key; ?>">
        <button name="search" type="submit" class="btn btn-outline-warning border-3">Search</button>
      </form>
    </div>

    <div class="container p-1 mx-auto" id="ingre-body"> <!-- border -->
      <div class="row mx-auto" id="ingredient-row"> <!-- border -->

        <?php

        foreach ($ingre_data as $row) { ?>

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
                    <p id='calorie'><b>Calorie Count: </b><?php echo $row['calories'] . "cal" ?></p>
                    <p id='protein'><b>Protein: </b><?php echo $row['protein'] . "g" ?></p>
                    <p id='carbohydrates'><b>Carbohydrates: </b><?php echo $row['carbohydrates'] . "g" ?></p>
                    <p id='fat'><b>Fat: </b><?php echo $row['fat'] . "g" ?></p>
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