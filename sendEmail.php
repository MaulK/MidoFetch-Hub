<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                      // Enable verbose debug output (set to 2 for detailed debug)
        $mail->isSMTP();                            // Set mailer to use SMTP
        $mail->Host       = 'smtp.example.com';    // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                   // Enable SMTP authentication
        $mail->Username   = 'your-email@example.com'; // SMTP username
        $mail->Password   = 'your-smtp-password';  // SMTP password
        $mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 587;                    // TCP port to connect to

        //Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress('your-email@example.com');  // Add a recipient

        // Content
        $mail->isHTML(false);  // Set email format to plain text
        $mail->Subject = 'New Contact Form Submission from ' . $name;
        $mail->Body    = $message;

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>