<?php
require 'class/class.phpmailer.php';
require 'class/class.smtp.php';
$mail = new PHPMailer;
$mail->setFrom('ncfcdaniel0@gmail.com');
$mail->addAddress('ncfcdaniel0@gmail.com');
$mail->Subject = 'Message sent by PHPMailer';
$mail->Body = 'Hello! use PHPMailer to send email using PHP';

$mail->SMTPSecure = 'ssl';
$mail->Host = 'ssl://smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Port = 465;

//Set your existing gmail address as user name
$mail->Username = '<a href="mailto:ncfcdaniel0@gmail.com>ncfcdaniel0@gmail.com</a>';

//Set the password of your gmail address here
$mail->Password = 'password';
if(!$mail->send()) {
  echo 'Email is not sent.';
  echo 'Email error: ' . $mail->ErrorInfo;
} else {
  echo 'Email has been sent.';
}
?>