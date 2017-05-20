<!DOCTYPE html>
<html>
<head>
<title>Thank you!</title>
<?php 

    session_start();
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');
    
    require('stuff/class.phpmailer.php');
    include('stuff/class.smtp.php');
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    $mail = new PHPMailer();
    
    $mail->IsSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPDebug = 1;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "ssl";
    $mail->Port = 465;
    $mail->IsHTML(true);
    $mail->Username = "naturesoapsoapberries@gmail.com";
    $mail->Password = "Soapberry";
    $mail->SetFrom($email);
    $mail->Subject = "From: " . $name;
    $mail->Body = $message . " Reply to: " . $email;
    $mail->AddAddress('spencercousins@outlook.com');
    
    if(!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Message Sent!";
    }
        
?>        
    </head>
    <body>
<h1>Thank you for contacting us!</h1>

        <h3><a href="index.html">Back to Homepage</a></h3>
    </body>
</html>