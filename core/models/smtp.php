<?php

// Настройки SMTP
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPDebug = 0;

$mail->CharSet = 'UTF-8';

$mail->Host = 'ssl://' . MAILHOST;
$mail->Port = MAILPORT;
$mail->Username = MAILUSERNAME;
$mail->Password = MAILPASSWORD;

$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

$mail->setFrom(MAILUSERNAME, TITLE);	
$mail->addAddress($useremail, $username);
$mail->Subject = $subject;
$body = $body;
$mail->msgHTML($body);

// Приложение
//$mail->addAttachment(__DIR__ . '/image.jpg');

$mail->send();