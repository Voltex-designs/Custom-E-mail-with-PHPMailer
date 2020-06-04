<?php

//import PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "PHPMailer/vendor/autoload.php"; 

$mail = new PHPMailer(true);

$recipientArr = array('');
$myUsername = //account username;
$myPassword = //account password;
$bodyHtml = //Body of E-mail;


    $mail->SMTPDebug = 2;
    $mail->isSMTP();
    $mail->Host = 'smtp.live.com' //for outlook;  //For Gmail: smtp.gmail.com
    $mail->SMTPAuth = true;
    $mail->Username = $myUsername;  
    $mail->Password = $myPassword;
    $mail->SMTPSecure = 'tls';
    $mail->Port = '587';
    
    //Recepient
    $mail->setFrom($myUsername, //Sent name);


    if (!empty($recipientArr)) {                          //have mutiple recepients
        foreach ($recipientArr AS $eachAddress) {
            $mail->addAddress($eachAddress);
        } }
    
        $mail->addReplyTo($myUsername);

    
    //Content of Mail
    $mail->isHTML(true);
    $mail->Subject = //subject of E-mail;
    $mail->Body = $bodyHtml;

    //send mail  
    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }

?>
