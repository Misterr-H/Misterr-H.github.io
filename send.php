<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/vendor/phpmailer/src/Exception.php';
require_once __DIR__ . '/vendor/phpmailer/src/PHPMailer.php';
require_once __DIR__ . '/vendor/phpmailer/src/SMTP.php';

// passing true in constructor enables exceptions in PHPMailer
$mail = new PHPMailer(true);

try {
    // Server settings
   // $mail->SMTPDebug = SMTP::DEBUG_SERVER; // for detailed debug output
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->Username = 'mister.h.technologies@gmail.com'; // YOUR gmail email
    $mail->Password = '$Hs913271$gm'; // YOUR gmail password

    // Sender and recipient settings
    $mail->setFrom('mister.h.technologies@gmail.com', 'Sender');
    $mail->addAddress('hs913271@gmail.com', 'Receiver Name');
    $mail->addReplyTo('mister.h.technologies@gmail.com', 'Sender'); // to set the reply to

    // Setting the email content
    $mail->IsHTML(true);
    $mail->Subject = 'PORTFOLIO[' . $_POST['subject'] . ']';
    $mail->Body = 'Name: ' . $_POST['name'] . '<br>' . 'Email: ' . $_POST['email'] . '<br>' . $_POST['message'];
    $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';

    $mail->send();
    echo '<script>alert("Message sent successfully");</script>';
    echo '<script>window.location.replace("https://misterr-h.github.io"); </script>' ;
} catch (Exception $e) {
    echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
}

?>