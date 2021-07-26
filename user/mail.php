<?php
ob_start();
session_start();
//在C:\AppServ\php5\php.ini取消註解extension=php_openssl.dll
if($_SESSION['mail'])
{
    require 'PHPMailer/PHPMailerAutoload.php';

    $mail = new PHPMailer;

    //$mail->SMTPDebug = 3;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'gogonukserver@gmail.com';                 // SMTP username
    $mail->Password = 'gogoshop';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    $mail->setFrom('gogonukserver@gmail.com', 'GoGo_Shop');
    $mail->addAddress($_SESSION['mail'],$name);
    $mail->addReplyTo('gogonukserver@gmail.com', 'Information');

    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'GogoShop verify mail:';
    $mail->Body    = 'CAPTCHA :<br><h3>'.$captcha.'</h3><h3>點此<a href="gogoshop.hopto.org/user/captcha.php">連結</a>跳轉</h3>';
    //$mail->Body    = 'CAPTCHA :<br><h3>'.$captcha.'</h3>';

    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } 
    else {
        echo 'Message has been sent';
        $_SESSION['captcha']=$captcha;
        header('Location:captcha.php');
    }
}
else
    header("Location:login.php");
ob_end_flush();
?>