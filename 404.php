<?php
session_start();

if(isset($_SESSION['user_role'])){
    $home = "homepage"; 
}
else {
    $home = "home";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/desktop.css">
  <style>
    body {
        width: 100%;
        height: 100vh;
        margin: 0;
    }
    .content{
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100%;
    }
  </style>
  <title>404</title>
</head>
<body>
    <div class="content d-flex flex-column">
        <div class="d-flex">
            <div class="display-1 text-warning px-2 mb-0"><b><b>404</b></b></div>
            <div class="h5 align-self-end">Page not found.</div>
        </div>
        <div class="d-flex">
            <button class="btn btn-link text-warning" onclick="history.back()">Go Back</button>
            <a class="btn btn-link text-warning" href="<?php echo $home; ?>">Go Home</a>
        </div>
    </div>
</body>
</html>