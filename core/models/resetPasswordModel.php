<?php

//mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once DIR . '/core/vendor/phpmailer/src/Exception.php';
require_once DIR . '/core/vendor/phpmailer/src/PHPMailer.php';
require_once DIR . '/core/vendor/phpmailer/src/SMTP.php';

// passing true in constructor enables exceptions in PHPMailer
$mail = new PHPMailer($phpmailer);
$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri_path);
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/$uri_segments[1]";
$url_site = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/";


// Define variables and initialize with empty values
$useremail_err = $msg = "";
$useremail = $username =  $password = $confirm_password = "";
$useremail_err = $username_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" || $_POST['password']) {


    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Пожалуйста, введите пароль.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Пароль должен содержать не менее 6 символов.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Пожалуйста, введите пароль для подтверждения.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Пароли не совпадают.";
        }
    }

    // Check input errors before inserting in database
    if (empty($password_err) && empty($confirm_password_err)) {

        $sql = "UPDATE users SET password = ? WHERE useremail = ?";
        if ($stmt = mysqli_prepare($link, $sql)) {

            mysqli_stmt_bind_param($stmt, "ss", $param_password, $useremail);

            $param_password = password_hash($password, PASSWORD_DEFAULT);
            $useremail = $_GET["email"];

            if (mysqli_stmt_execute($stmt)) {


                $msg = "Новый пароль успешно вступил в силу. Войдите в свой аккаунт с новым паролем";
            } else {
                echo "Что-то пошло не так. Пожалуйста, повторите попытку позже.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection

}
