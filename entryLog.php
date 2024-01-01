<?php
session_start();
include 'includes/autoloader.php';
$_SESSION['user_check'] = "memberpersonalTrainer";
include 'includes/checkLogin.php';

if ($_SESSION['user_role'] == 'member') {
  $member_id = $_SESSION['member_id'];
  include 'includes/memberHeader.php';
} else if ($_SESSION['user_role'] == 'personalTrainer') {
  include 'includes/personalTrainerHeader.php';
}
if (isset($_GET['member_id']) && $_GET['member_id'] !== '') {
  $member_id = $_GET['member_id'];
}
$workoutLogObject = new workoutLogView();
$exercises = $workoutLogObject->showWorkoutLog($member_id);
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
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
  <title>Entry Log</title>
  <style>
    input {
      color-scheme: dark;
    }

    .graph {
      background-color: white;
      border-radius: 15px;
      display: none;
    }

    .graph.active {
      display: block;
    }
  </style>
  <script>
    function selectWorkout(exercise) {
      document.getElementById('selected_workout').innerHTML = exercise;
    }
  </script>
</head>

<body>
  <div id="container" class="mx-sm-4 mx-xl-5 px-2 px-sm-3 px-xl-5">
    <div id="main">
      

      <?php if ($_SESSION['user_role'] == 'member') { ?>
      <div class="row">
        <div class="logMeals col-md-12 col-lg-6 p-3">
          <div class="h1 text-warning mb-3">Log meals</div>

          <form class="row content mx-1 gy-2" method="post">
            <input class="form-control border-3" onblur="(this.type='text')" onfocus="(this.type='date')" id="date_completed" name="date_completed" placeholder="Date:" required>
            <input class="form-control border-3" type="text" id="food_name" name="food_name" placeholder="Food name:" required>
            <input class="form-control border-3" type="number" id="calories" name="calories" placeholder="Calories:" required>
            <input class="form-control border-3" type="number" id="protein" name="protein" placeholder="Protein:" required>
            <input class="form-control border-3" type="number" id="carbohydrates" name="carbohydrates" placeholder="Carbohydrates:" required>
            <input class="form-control border-3" type="number" id="fat" name="fat" placeholder="Fat:" required>
            <input class="btn btn-warning" id="button" type="submit" value="Submit" name="mealLog">
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

        <div class="logWorkout col-md-12 col-lg-6 p-3">
          <div class="h1 text-warning mb-3">Log workout</div>

          <form class="row content mx-1 gy-2" method="post">
            <input class="form-control border-3" onblur="(this.type='text')" onfocus="(this.type='date')" id="date_completed" name="date_completed" placeholder="Date:" required>
            <input class="form-control border-3" type="text" id="exercise" name="exercise" placeholder="Exercise:" required>
            <input class="form-control border-3" type="number" id="weight" name="weight" placeholder="Weight (kg):" required>
            <input class="form-control border-3" type="number" id="reps" name="reps" placeholder="Reps:" required>
            <input class="btn btn-warning" id="button" type="submit" value="Submit" name="workoutLog">
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
      </div>
      
      <hr class="border border-2">
      <?php } ?>

      
      <div class="row">
        <div class="col-md-12 col-lg-6 p-3">
          <div class="h3 text-warning">Macros</div>

          <form method="post">
            <div class="input-group">
              <input class="btn btn-outline-warning w-25" id="button" type="submit" value="Calories" name="calories">
              <input class="btn btn-outline-warning w-25" id="button" type="submit" value="Protein" name="protein">
              <input class="btn btn-outline-warning w-25" id="button" type="submit" value="Carbohydrates" name="carbohydrates">
              <input class="btn btn-outline-warning w-25" id="button" type="submit" value="Fat" name="fat">
            </div>
          </form>
        </div>

        <div class="col-md-12 col-lg-6 p-3">
          <div class="h3 text-warning">Workouts</div>

          <div class="dropdown" data-bs-theme="dark">
            <button class="btn btn-warning dropdown-toggle" id="selected_workout" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              Select Workout
            </button>

            <ul class="dropdown-menu">
              <form id="workout" method="post">
                <?php
                foreach ($exerciseArray as $result) { ?>
                  <li>
                    <input class="dropdown-item" id="button" type="submit" value="<?php echo ucfirst($result) ?>" name="<?php echo $result ?>">
                  </li>
                <?php } ?>
              </form>
            </ul>
          </div>

        </div>
      </div>
      <div>
        <canvas id="exerciseChart" class="graph w-100 h-100 mb-3 p-3"></canvas>
      </div>
      <div>
        <canvas id="foodChart" class="graph w-100 h-100 mb-3 p-3"></canvas>
      </div>
      <?php
      foreach ($exerciseArray as $result) {
        $exercise = str_replace(' ', '_', $result);
        if (isset($_POST[$exercise])) {
          echo "<script> selectWorkout('".$_POST[$exercise]."')</script>";
          list($dateArray, $weightArray, $repsArray) = $workoutLogObject->showWorkoutLogByExercise($result, $member_id); ?>
          <script>
            const ctx = document.getElementById('exerciseChart');
            ctx.classList.add("active");
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
                  backgroundColor: '#FFD700'
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
          list($date_completedArraySorted, $caloriesArraySorted, $proteinArraySorted, $carbohydratesArraySorted, $fatArraySorted) = $mealLogObject->showMealLog($member_id); ?>
          <script>
            const ctx2 = document.getElementById('foodChart');
            ctx2.classList.add("active");
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
                  backgroundColor: '#FFD700'
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