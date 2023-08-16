<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

$mail = new PHPMailer(true);

$mail->IsSMTP();
$mail->Host = "mail.ndisone.com.au";

// $from = "rahul@ndisone.com.au";
$from = "ndisonec@ndisone.com.au";
$mail->isHTML(true);

// try{
//     $mail->IsSMTP();
//     $mail->Host = "mail.ndisone.com.au";

//     $from = "rahul@ndisone.com.au";
//     $to = "votivephp.rahulraj@gmail.com";
//     $subject = "Ndisone Message";
//     $message = "Check mail from Ndisone by rahulraj";

//     $mail->SetFrom("$from", "$from");
//     $mail->AddAddress("$to");


//     $mail->Subject = "$subject";
//     $mail->Body = "$message";
//     $checkm = $mail->Send();

//     echo "Mail has been sent successfully!";

// }catch (Exception $e){

//     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

// }

?>