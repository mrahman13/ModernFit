<?php
    session_start();
    include 'includes/autoloader.php';
    $_SESSION['user_check'] = "manager";
   // include 'includes/checkLogin.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Email</title>
</head>
<body>
    <form class = "" action="" method="post">
    Subject <input type = "text" name ="subject" value = ""> <br>
    Message <input type = "text" name ="message" value = ""> <br>
    <button type = "submit" name = "send"> Send</button>
    </form>
    <?php
        	if (isset($_POST['send'])) {
            $subject = $_POST['subject'];
            $message = $_POST['message'];
            $sendEmail = new emailContr();
            $sendEmail->sendEmails( $subject, $message);
          }
        ?>
</body>
</html>