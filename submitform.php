<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = filter_var($_POST["first-name"], FILTER_SANITIZE_STRING);
    $lastName = filter_var($_POST["last-name"], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $phone = filter_var($_POST["phone"], FILTER_SANITIZE_STRING);
    $department = filter_var($_POST["department"], FILTER_SANITIZE_STRING);
    $message = filter_var($_POST["message"], FILTER_SANITIZE_STRING);

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Handle invalid email
        header("Location: error.html");
        exit();
    }

    $to = "team40nova@gmail.com"; // Replace with the actual email address
    $subject = "NEW Contact Form Submission";
    $body = "Name: $firstName $lastName\n";
    $body .= "Email: $email\n";
    $body .= "Phone: $phone\n";
    $body .= "Department: $department\n";
    $body .= "Message: $message";

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = "team40nova@gmail.com";
        $mail->Password = "fscv dckw sera biwy"; // Replace with your Gmail password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom($email);
        $mail->addAddress($to);

        $mail->Subject = $subject;
        $mail->Body = $body;

        $mail->send();

        // Redirect to a thank you page
        header("Location: ty.html");
        exit();
    } catch (Exception $e) {
        // Handle email sending failure
        error_log("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
        header("Location: contact-page.html");
        exit();
    }
}
?>
