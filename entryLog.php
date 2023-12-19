<?php
session_start();
include 'includes/autoloader.php';
$_SESSION['user_check'] = "member";
include 'includes/checkLogin.php';
include 'includes/memberHeader.php';

if (isset($_SESSION['meal_id'])) {
  unset($_SESSION['meal_id']);
}
$workoutLogObject = new workoutLogView();
$exercises = $workoutLogObject->showWorkoutLog();
$exerciseArray = [];
foreach ($exercises as $exercise) {
  $exerciseArray[] = $exercise['exercise'];
}
$exerciseArray = array_unique($exerciseArray);

$mealLogObject = new mealLogView();
$macrosArray = array('calories', 'protein', 'carbohydrates', 'fat');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="css/mobile.css">
  <link rel="stylesheet" media="only screen and (min-width: 720px)" href="css/desktop.css"> -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
  <title>Entry Log</title>
</head>

<body>
  <div id="container" class="container">
    <div id="main">
      <div class="logMeals">
        <h1>Log meals</h1>
        <form method="post">
          <input type="date" id="date_completed" name="date_completed" required>
          <input type="text" id="food_name" name="food_name" placeholder="Food name:" required>
          <input type="text" id="calories" name="calories" placeholder="Calories:" required>
          <input type="text" id="protein" name="protein" placeholder="Protein:" required>
          <input type="text" id="carbohydrates" name="carbohydrates" placeholder="Carbohydrates:" required>
          <input type="text" id="fat" name="fat" placeholder="Fat:" required>
          <input id="button" type="submit" value="Submit" name="mealLog"><br><br>
        </form>
        <?php
        if (isset($_POST['mealLog'])) {
          $mealLogObj = new mealLogContr();
          $date_completed = $_POST['date_completed'];
          $food_name = $_POST['food_name'];
          $calories = $_POST['calories'];
          $protein = $_POST['protein'];
          $carbohydrates = $_POST['carbohydrates'];
          $fat = $_POST['fat'];
          $mealLogObj->createMealLog($date_completed, $food_name, $calories, $protein, $carbohydrates, $fat);
        }
        ?>
      </div>
      <div class="logWorkout">
        <h1>Log workout</h1>
        <form method="post">
          <input type="date" id="date_completed" name="date_completed" required>
          <input type="text" id="exercise" name="exercise" placeholder="Exercise:" required>
          <input type="text" id="weight" name="weight" placeholder="Weight:" required>
          <input type="text" id="reps" name="reps" placeholder="Reps:" required>
          <input id="button" type="submit" value="Submit" name="workoutLog"><br><br>
        </form>
        <?php
        if (isset($_POST['workoutLog'])) {
          $workoutLogObj = new workoutLogContr();
          $date_completed = $_POST['date_completed'];
          $exercise = $_POST['exercise'];
          $weight = $_POST['weight'];
          $reps = $_POST['reps'];
          $workoutLogObj->createWorkoutLog($date_completed, $exercise, $weight, $reps);
        }
        ?>

      </div>
      <form method="post">
        <?php
        foreach ($exerciseArray as $result) { ?>
          <input id="button" type="submit" value="<?php echo ucfirst($result) ?>" name="<?php echo $result ?>"><br><br>
        <?php } ?>
      </form>
      <form method="post">
        <input id="button" type="submit" value="Calories" name="calories"><br><br>
        <input id="button" type="submit" value="Protein" name="protein"><br><br>
        <input id="button" type="submit" value="Carbohydrates" name="carbohydrates"><br><br>
        <input id="button" type="submit" value="Fat" name="fat"><br><br>
      </form>
      <div>
        <canvas id="exerciseChart"></canvas>
      </div>
      <div>
        <canvas id="foodChart"></canvas>
      </div>
      <?php
      foreach ($exerciseArray as $result) {
        $exercise = str_replace(' ', '_', $result);
        if (isset($_POST[$exercise])) {
          list($dateArray, $weightArray, $repsArray) = $workoutLogObject->showWorkoutLogByExercise($result); ?>
          <script>
            const ctx = document.getElementById('exerciseChart')
            var dateArray = <?php echo json_encode($dateArray) ?>;
            var weightArray = <?php echo json_encode($weightArray) ?>;
            var repsArray = <?php echo json_encode($repsArray) ?>;

            new Chart(ctx, {
              type: 'line',
              data: {
                labels: dateArray,
                datasets: [{
                  label: '<?php echo ucfirst($result) ?>',
                  data: weightArray,
                  borderWidth: 1,
                  backgroundColor: 'yellow'
                }]
              },
              options: {
                hoverRadius: 20,
                showLine: false,
                scales: {
                  x: {
                    type: 'timeseries',
                    time: {
                      unit: 'day'
                    }
                  },
                  y: {
                    beginAtZero: false
                  },
                },
                plugins: {
                  tooltip: {
                    callbacks: {
                      title: context => {
                        const d = new Date(context[0].parsed.x);
                        const formattedDate = d.toLocaleString([], {
                          month: 'short',
                          day: 'numeric',
                          year: 'numeric',
                        });
                        return formattedDate;
                      },
                      label: ((tooltipItem) => {
                        return weightArray[tooltipItem.dataIndex] + 'kg x ' + repsArray[tooltipItem.dataIndex];
                      })
                    }
                  }
                }
              },
            });
          </script>
        <?php }
      }
      foreach ($macrosArray as $macro) {
        if (isset($_POST[$macro])) {
          list($date_completedArraySorted, $caloriesArraySorted, $proteinArraySorted, $carbohydratesArraySorted, $fatArraySorted) = $mealLogObject->showMealLog(); ?>
          <script>
            const ctx2 = document.getElementById('foodChart')
            var dateObject = <?php echo json_encode($date_completedArraySorted) ?>;
            var caloriesObject = <?php echo json_encode($caloriesArraySorted) ?>;
            var proteinObject = <?php echo json_encode($proteinArraySorted) ?>;
            var carbohydratesObject = <?php echo json_encode($carbohydratesArraySorted) ?>;
            var fatObject = <?php echo json_encode($fatArraySorted) ?>;

            var dateArray2 = Object.values(dateObject);
            var caloriesArray = Object.values(caloriesObject);
            var proteinArray = Object.values(proteinObject);
            var carbohydratesArray = Object.values(carbohydratesObject);
            var fatArray = Object.values(fatObject);

            var macro = <?php echo json_encode($macro) ?>;
            var xData = [];
            if (macro == 'calories') {
              xData = caloriesArray;
            } else if (macro == 'protein') {
              xData = proteinArray;
            } else if (macro == 'carbohydrates') {
              xData = carbohydratesArray;
            } else if (macro == 'fat') {
              xData = fatArray;
            }
            new Chart(ctx2, {
              type: 'line',
              data: {
                labels: dateArray2,
                datasets: [{
                  label: '<?php echo ucfirst($macro) ?>',
                  data: xData,
                  borderWidth: 1,
                  backgroundColor: 'yellow'
                }]
              },
              options: {
                hoverRadius: 20,
                showLine: false,
                scales: {
                  x: {
                    type: 'timeseries',
                    time: {
                      unit: 'day'
                    }
                  },
                  y: {
                    beginAtZero: false
                  },
                },
                plugins: {
                  tooltip: {
                    callbacks: {
                      title: context => {
                        const d = new Date(context[0].parsed.x);
                        const formattedDate = d.toLocaleString([], {
                          month: 'short',
                          day: 'numeric',
                          year: 'numeric',
                        });
                        return formattedDate;
                      },
                      label: ((tooltipItem) => {
                        return caloriesArray[tooltipItem.dataIndex] + 'cal, ' + proteinArray[tooltipItem.dataIndex] + 'g protein, ' + carbohydratesArray[tooltipItem.dataIndex] + 'g carbs, ' + fatArray[tooltipItem.dataIndex] + 'g fat';
                      })
                    }
                  }
                }
              },
            });
          </script>
      <?php }
      } ?>


    </div>
    <footer></footer>
  </div>
  <script>
    //prevents the form resubmitting when the page is refreshed
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
</body>

</html>