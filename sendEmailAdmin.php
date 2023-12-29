<?php
session_start();
include 'includes/autoloader.php';
$_SESSION['user_check'] = "admin";
include 'includes/checkLogin.php';
include 'includes/adminHeader.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Email</title>
</head>

<body>
    <div id="container" class="mx-sm-4 mx-xl-5 px-2 px-sm-3 px-xl-5">

    <div id="main">
        <div class="h1 text-warning py-2">Send email to all members</div>
        <form class="row content mx-1 gy-2" method="post">
            <input class="form-control border-3" type="text" name="subject" placeholder="Subject:" required>
            <input class="form-control border-3" type="text" name="message" placeholder="Message:" required>
            <input class="btn btn-warning" type="submit" name="send">
        </form>
    <?php
    if (isset($_POST['send'])) {
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        $sendEmail = new emailContr();
        $sendEmail->sendEmails($subject, $message);
    }
    ?>
</body>

</html>