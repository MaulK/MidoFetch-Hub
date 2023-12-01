<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

// Function to sanitize input data
function sanitize_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = sanitize_input($_POST["name"]);
    $email = sanitize_input($_POST["email"]);
    $message = sanitize_input($_POST["message"]);

    // PHPMailer configuration
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'midofetchhub@gmail.com'; // Your Gmail email address
    $mail->Password = 'bpeixxuhjfepgkqk'; // Your Gmail password
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Sender and recipient settings
    $mail->setFrom('midofetchhub@gmail.com', 'MidoFetch Hub');
    $mail->addAddress('maulanakhoirusyifa1@gmail.com', 'User Contact');

    // Email content
    $mail->isHTML(true);
    $mail->Subject = 'New Contact Form Submission';
    $mail->Body = "Name: $name<br>Email: $email<br>Message: $message";

    try {
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Invalid request";
}
?>
