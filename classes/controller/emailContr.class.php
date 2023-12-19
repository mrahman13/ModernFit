<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Phpmailer/src/Exception.php';
require 'Phpmailer/src/PHPMailer.php';
require 'Phpmailer/src/SMTP.php';

class emailContr extends emailModel
{
    public function sendEmails($subject, $message)
    {
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
            $mail->addAddress($email);  
            $mail->isHTML(true);

            $mail->Subject = $subject;
            $mail->Body = $message; 

            $mail->send();

            echo "
                <script>
                alert('Sent successfully');
                document.location.href = 'sendEmail.manager.php'
                </script>
            ";
        }
    }
}

//https://www.youtube.com/watch?v=9tD8lA9foxw&t=51s
//Reference I used to help me send emails to members.