<?php
session_start();
include 'includes/autoloader.php';
include 'includes/checkLogin.php';
include 'includes/personalTrainerheader.php';


if (isset($_GET['member_id']) && $_GET['member_id'] !== '') {
  $member_id = $_GET['member_id'];
} else {
  header("Location: 404");
}

$memberData = new memberView();
$memberDataResult = $memberData->showMemberData($member_id);

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
  <title>PT Member Profiles</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
</head>

<body>
  <div id="container" class="container">

    <div id="main">
      <div class="h1 py-2 text-warning">View members profiles</div>
      <?php
      foreach ($memberDataResult as $row) {
      ?>
        <p id='name'>Name: <?php echo $row['first_name'] . ' ' . $row['last_name'] ?></p>
        <img class="img-responsive" src="../img/profilePicture/<?php echo $row['profile_picture'] ?>" draggable="false" width="200px">
        <p id='date_joined'>Date Joined: <?php echo date('Y-m-d', strtotime($row['date_joined'])) ?></p>
        <p id='pin'>PIN: <?php echo $row['pin'] ?></p>
      <?php
      }

      $membersMealObject = new mealProgramView();
      $membersMealData = $membersMealObject->showMealProgramByMember($member_id);
      foreach ($membersMealData as $row) { ?>
        <a href="recipeViewer?meal_id=<?php echo $row['meal_id']; ?>&personal_trainer_id=<?php echo $row['personal_trainer_id']; ?>">
          <p id='food_name'><?php echo $row['food_name'] . " : " . date('H:i', strtotime($row['meal_time'])) ?></p>
        </a>

      <?php }
      $membersWorkoutObject = new workoutProgramView();
      $membersWorkoutData = $membersWorkoutObject->showWorkoutProgramByMember($member_id);
      foreach ($membersWorkoutData as $row) { ?>
        <a href="workoutViewer?workout_id=<?php echo $row['workout_id']; ?>&personal_trainer_id=<?php echo $row['personal_trainer_id']; ?>">
          <p id='workout_name'><?php echo $row['workout_name'] . " : " . $row['workout_day'] ?></p>
        </a>
      <?php } ?>


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
      <button type="button" onclick="redirectToWorkoutCreator()">Create workout program</button>
      <button type="button" onclick="redirectToMealCreator()">Create meal program</button>

<script>
    function redirectToWorkoutCreator() {
    var memberId = <?php echo json_encode($member_id); ?>;
    <?php echo "var memberId = $member_id;"; ?>
    <?php echo "sessionStorage.setItem('member_id', $member_id);"; ?>
    window.location.href = 'workoutCreator?member_id=' + memberId;
  }
  function redirectToMealCreator() {
    window.location.href = 'mealCreator';
  }
</script>

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
          list($dateArray, $weightArray, $repsArray) = $workoutLogObject->showWorkoutLogByExercise($result, $member_id); ?>
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
          list($date_completedArraySorted, $caloriesArraySorted, $proteinArraySorted, $carbohydratesArraySorted, $fatArraySorted) = $mealLogObject->showMealLog($member_id); ?>
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
</body>

</html>

<!-- Reference for date format -->
<!-- https://stackoverflow.com/questions/24094571/formating-date-string-with-strtotime-and-date -->