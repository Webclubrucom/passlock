<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once DIR . '/core/vendor/phpmailer/src/Exception.php';
require_once DIR . '/core/vendor/phpmailer/src/PHPMailer.php';
require_once DIR . '/core/vendor/phpmailer/src/SMTP.php';
$useremail_err = $msg = "";
// passing true in constructor enables exceptions in PHPMailer
$mail = new PHPMailer(true);
$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri_path);
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/$uri_segments[1]";
$url_site = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/";
if (isset($_POST['submit'])) {

    $useremail = mysqli_real_escape_string($link, $_POST['useremail']);

    $sql = "SELECT * FROM users WHERE useremail = '$useremail'";
    $query = mysqli_query($link, $sql);
    $emailcount = mysqli_num_rows($query);

    if ($emailcount) {
        $userdata = mysqli_fetch_array($query);
        $username = $userdata['username'];
        $token = $userdata['token'];

        $theme_reset_email = str_ireplace('[USERNAME]', $username, $theme_reset_email);
        $theme_reset_email = str_ireplace('[BR]', '<br>', $theme_reset_email);
        $theme_reset_email = str_ireplace('[DBR]', '<br><br>', $theme_reset_email);
        $theme_reset_email = str_ireplace('[EMAIL_ADMIN]', EMAIL_VALUE, $theme_reset_email);
        $theme_reset_email = str_ireplace('[WEBSITE]', '<strong><a href="' . $url_site . '"  target="_blank">' . TITLE . '</a></strong>', $theme_reset_email);
        $theme_reset_email = str_ireplace('[EMAIL_CONFIRMATION]', '<a href="' . $url_site . 'auth-email-verification?hash=' . $param_token . '&email=' . $useremail . '"  target="_blank" style="color:#fff;background-color:#5156be;border-color:#5156be;box-shadow: 0 2px 6px 0 rgb(81 86 190 / 50%);display: inline-block;font-weight: 400;line-height: 1.5;text-align: center;vertical-align: middle;cursor: pointer;border: 1px solid transparent;padding: 0.47rem 0.75rem;font-size: .875rem;border-radius: 0.25rem;transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;outline: 0!important;text-decoration: none!important;">Подтвердить Email</a>', $theme_reset_email);
        $theme_reset_email = str_ireplace('[PASSWORD_RESET]', '<a href="' . $url_site . 'auth-reset-password?token=' . $token . '&email=' . $useremail . '"  target="_blank" style="color:#fff;background-color:#5156be;border-color:#5156be;box-shadow: 0 2px 6px 0 rgb(81 86 190 / 50%);display: inline-block;font-weight: 400;line-height: 1.5;text-align: center;vertical-align: middle;cursor: pointer;border: 1px solid transparent;padding: 0.47rem 0.75rem;font-size: .875rem;border-radius: 0.25rem;transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;outline: 0!important;text-decoration: none!important;">Сбросить пароль</a>', $theme_reset_email);

        $subject = $theme_reset_email;

        $reset_email = str_ireplace('[USERNAME]', $username, $reset_email);
        $reset_email = str_ireplace('[USEREMAIL]', $useremail, $reset_email);
        $reset_email = str_ireplace('[PHONE]', $phone, $reset_email);
        $reset_email = str_ireplace('[MESSAGE]', $message, $reset_email);
        $reset_email = str_ireplace('[BR]', '<br>', $reset_email);
        $reset_email = str_ireplace('[DBR]', '<br><br>', $reset_email);
        $reset_email = str_ireplace('[EMAIL_ADMIN]', EMAIL_VALUE, $reset_email);
        $reset_email = str_ireplace('[WEBSITE]', '<strong><a href="' . $url_site . '"  target="_blank">' . TITLE . '</a></strong>', $reset_email);
        $reset_email = str_ireplace('[EMAIL_CONFIRMATION]', '<a href="' . $url_site . 'auth-email-verification?hash=' . $param_token . '&email=' . $useremail . '"  target="_blank" style="color:#fff;background-color:#5156be;border-color:#5156be;box-shadow: 0 2px 6px 0 rgb(81 86 190 / 50%);display: inline-block;font-weight: 400;line-height: 1.5;text-align: center;vertical-align: middle;cursor: pointer;border: 1px solid transparent;padding: 0.47rem 0.75rem;font-size: .875rem;border-radius: 0.25rem;transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;outline: 0!important;text-decoration: none!important;">Подтвердить Email</a>', $reset_email);
        $reset_email = str_ireplace('[PASSWORD_RESET]', '<a href="' . $url_site . 'auth-reset-password?token=' . $token . '&email=' . $useremail . '"  target="_blank" style="color:#fff;background-color:#5156be;border-color:#5156be;box-shadow: 0 2px 6px 0 rgb(81 86 190 / 50%);display: inline-block;font-weight: 400;line-height: 1.5;text-align: center;vertical-align: middle;cursor: pointer;border: 1px solid transparent;padding: 0.47rem 0.75rem;font-size: .875rem;border-radius: 0.25rem;transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;outline: 0!important;text-decoration: none!important;">Сбросить пароль</a>', $reset_email);

        $body = $reset_email;

        $sender_email = "From: $gmailid";

        if (TYPE_EMAIL == 'true') {

            include $_SERVER['DOCUMENT_ROOT'] . '/core/models/smtp.php';

        } else {
            $to      = $useremail;
            $subject = $subject;
            $message = $body;
            $headers = 'MIME-Version: 1.0' . "\r\n" .
                'Content-type: text/html; charset=utf-8' . "\r\n" .
                'From: ' . TITLE . ' <' . EMAIL_VALUE . '>' . "\r\n" .
                'Reply-To: ' . EMAIL_VALUE . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
            mail($to, '=?UTF-8?B?' . base64_encode($subject) . '?=', $message, $headers);

            $msg = $language["emailed_password"];
        }
    } else {
        $useremail_err = $language["No_Email_Found"];
    }
}
