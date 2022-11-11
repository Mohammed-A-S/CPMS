<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'PHPMailer-master/src/Exception.php';
    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/SMTP.php';

function send_mail($recipient,$subject,$message)
{
    $_mail = new PHPMailer();
    $_mail->IsSMTP();

    $_mail->SMTPDebug  = 0;  
    $_mail->SMTPAuth   = TRUE;
    $_mail->SMTPSecure = "tls";
    $_mail->Port       = 587;
    $_mail->Host       = "smtp.gmail.com";
    //$mail->Host       = "smtp.mail.yahoo.com";
    $_mail->Username   = "96j.khalid@gmail.com";
    $_mail->Password   = "bfeobbbeuloazfbo";

    $_mail->IsHTML(true);
    $_mail->AddAddress($recipient, "Dear Customer");
    $_mail->SetFrom("96j.khalid@gmail.com", "CPMS");
    //$mail->AddReplyTo("reply-to-email", "reply-to-name");
    //$mail->AddCC("cc-recipient-email", "cc-recipient-name");
    $_mail->Subject = $subject;
    $content = $message;

    $_mail->MsgHTML($content); 
    if(!$_mail->Send()) 
    {
    //echo "Error while sending Email.";
    //echo "<pre>";
    //var_dump($mail);
    return false;
    } 
    else 
    {
    //echo "Email sent successfully";
    return true;
    }
}