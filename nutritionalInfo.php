<?php
    include 'includes/autoloader.php';
    include 'includes/memberHeader.php';
    //might need get method or direct connection
    
    $data = new NI_View();
    $integ_data = $data->showIngredients();
    
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
        <form class="" action="nutritionalInfo.php">
          <input type="text" class="" placeholder="Search Ingredient..." name="key" value="<?php isset($_GET['keyword']) ? $_GET['keyword'] : '' ?>">
          <button type="submit" class="">Search</button>
        </form>
      </div>

      <div class="ingredient-body">
        <div class="ingredient">
          
          <?php
          
          foreach($integ_data as $row) {?>
            <div class="responsive-row">
              <div class="container set-padding" id="integ">

                <div class="image">
                  <img class="img-responsive" src="/img/<?php $row['image'] ?>">
                </div>

                <div class="info">
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