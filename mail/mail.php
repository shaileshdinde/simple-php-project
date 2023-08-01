<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
require('PHPMailer.php');
require('SMTP.php');
require('Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($to, $subject, $body)
{
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->CharSet = 'UTF-8';
        $mail->SMTPDebug = 0;                                           //Enable verbose debug output
        //Send using SMTP
        $mail->Host       = 'smtp.hostinger.com';                       //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                       //Enable SMTP authentication
        $mail->Username   = 'demo@shdinde.in';                          //SMTP username
        $mail->Password   = 'Demo@777$';                               //SMTP password
        $mail->SMTPSecure = 'ssl';                                      //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('demo@shdinde.in', 'Demo Mail');
        $mail->addAddress($to);     //Add a recipient    
        $mail->addReplyTo('demo@shdinde.in', 'Demo Mail');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $body;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if (!$mail->Send()) {
            return "Fail";
        } else {
            return "Success";
        }
    } catch (Exception $e) {
        // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
