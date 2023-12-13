<?php
require_once __DIR__ . "/classes/connection/dbConnection.class.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Phpmailer/src/Exception.php';
require 'Phpmailer/src/PHPMailer.php';
require 'Phpmailer/src/SMTP.php';

// Instantiate the dbConnection class and get the PDO connection
$dbConnection = new dbConnection();
$pdo = $dbConnection->connect();

$query = $pdo->prepare("SELECT email FROM user");
$query->execute();
$emails = $query->fetchAll(PDO::FETCH_COLUMN);

foreach ($emails as $email) {
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'modernfit09@gmail.com';
    $mail->Password = 'migimlrqhnjlffll';
    $mail->SMTPSecure = 'ssl'; 
    $mail->Port = 465; 

    $mail->setFrom('modernfit09@gmail.com');
    $mail->addAddress($email);  // Use the current email from the loop
    $mail->isHTML(true);

    $mail->Subject = $_POST["subject"];
    $mail->Body = $_POST["message"]; 

    $mail->send();

    echo "
        <script>
        alert('Sent successfully');
        document.location.href = 'sendEmail.manager.php'
        </script>
    ";
}
?>
