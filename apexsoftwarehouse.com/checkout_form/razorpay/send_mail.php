<?php

$email= $_POST['email'];
$name = $_POST['name'];
$phoneno = $_POST['phoneno'];
$amount=$_POST['amount']/100;
$plan=$_POST['plan'];
$payment_id=$_POST['payment_id'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/SMTP.php';


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'heetp0101@gmail.com';                     //SMTP username
    $mail->Password   = 'fyjnuzagsfbntfhg';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('heetp0101@gmail.com', 'Apex Software House');
    $mail->addAddress($email, 'Joe User');     //Add a recipient
 //   $mail->addAddress('ellen@example.com');               //Name is optional
    $mail->addReplyTo($email, 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Payment Report';
    $mail->Body    = 'Name = '.$name."<br>"."Email = ".$email."<br>"."Phoneno = ".$phoneno."<br>"."Payment id = ".$payment_id."<br>".
                      "Amount Debited = ".$amount."<br>"."Plan Selected = ".$plan;
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
exit;
?>