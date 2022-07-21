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
if ($_SERVER["REQUEST_METHOD"] == "POST" and $_POST['username']) {

    // Validate useremail
    if (empty(trim($_POST["useremail"]))) {
        $useremail_err = "Пожалуйста, введите имя пользователя.";
    } elseif (!filter_var($_POST["useremail"], FILTER_VALIDATE_EMAIL)) {
        $useremail_err = "Неверный формат Email";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE useremail = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_useremail);

            // Set parameters
            $param_useremail = trim($_POST["useremail"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $useremail_err = "Этот Email уже зарегистрирован.";
                } else {
                    $useremail = trim($_POST["useremail"]);
                }
            } else {
                echo "Упс! Что-то пошло не так. Пожалуйста, попробуйте еще раз позже.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }



    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Пожалуйста, введите имя пользователя.";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "Этот логин уже зарегистрирован. Выберите другой.";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Упс! Что-то пошло не так. Пожалуйста, попробуйте еще раз позже.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

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
    if (empty($useremail_err) && empty($username_err) && empty($password_err) && empty($confirm_password_err)) {

        // Prepare an insert statement
        $sql = "INSERT INTO users (useremail, username, password, token, role, status, office_user, photo_user) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssss", $param_useremail, $param_username, $param_password, $param_token, $role, $status, $office_user, $photo_user);

            // Set parameters
            $param_useremail = $useremail;
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_token = bin2hex(random_bytes(50)); // generate unique token
            $role = 'user';
            $status = '1';
            $office_user = '';
            $photo_user = 'default.png';

            $theme_reg_user_email = str_ireplace('[USERPASSWORD]', $password, $theme_reg_user_email);
            $theme_reg_user_email = str_ireplace('[USERNAME]', $username, $theme_reg_user_email);
            $theme_reg_user_email = str_ireplace('[BR]', '<br>', $theme_reg_user_email);
            $theme_reg_user_email = str_ireplace('[DBR]', '<br><br>', $theme_reg_user_email);
            $theme_reg_user_email = str_ireplace('[EMAIL_ADMIN]', EMAIL_VALUE, $theme_reg_user_email);
            $theme_reg_user_email = str_ireplace('[WEBSITE]', '<strong><a href="' . $url_site . '"  target="_blank">' . TITLE . '</a></strong>', $theme_reg_user_email);
            $theme_reg_user_email = str_ireplace('[EMAIL_CONFIRMATION]', '<a href="' . $url_site . 'auth-email-verification?hash=' . $param_token . '&email=' . $useremail . '"  target="_blank" style="color:#fff;background-color:#5156be;border-color:#5156be;box-shadow: 0 2px 6px 0 rgb(81 86 190 / 50%);display: inline-block;font-weight: 400;line-height: 1.5;text-align: center;vertical-align: middle;cursor: pointer;border: 1px solid transparent;padding: 0.47rem 0.75rem;font-size: .875rem;border-radius: 0.25rem;transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;outline: 0!important;text-decoration: none!important;">Подтвердить Email</a>', $theme_reg_user_email);
            $theme_reg_user_email = str_ireplace('[PASSWORD_RESET]', '<a href="' . $url_site . 'auth-reset-password?token=' . $token . '&email=' . $useremail . '"  target="_blank" style="color:#fff;background-color:#5156be;border-color:#5156be;box-shadow: 0 2px 6px 0 rgb(81 86 190 / 50%);display: inline-block;font-weight: 400;line-height: 1.5;text-align: center;vertical-align: middle;cursor: pointer;border: 1px solid transparent;padding: 0.47rem 0.75rem;font-size: .875rem;border-radius: 0.25rem;transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;outline: 0!important;text-decoration: none!important;">Сбросить пароль</a>', $theme_reg_user_email);

            $subject = $theme_reg_user_email;

            $reg_user_email = str_ireplace('[USERNAME]', $username, $reg_user_email);
            $reg_user_email = str_ireplace('[USEREMAIL]', $useremail, $reg_user_email);
            $reg_user_email = str_ireplace('[PHONE]', $phone, $reg_user_email);
            $reg_user_email = str_ireplace('[MESSAGE]', $message, $reg_user_email);
            $reg_user_email = str_ireplace('[BR]', '<br>', $reg_user_email);
            $reg_user_email = str_ireplace('[DBR]', '<br><br>', $reg_user_email);
            $reg_user_email = str_ireplace('[EMAIL_ADMIN]', EMAIL_VALUE, $reg_user_email);
            $reg_user_email = str_ireplace('[WEBSITE]', '<strong><a href="' . $url_site . '"  target="_blank">' . TITLE . '</a></strong>', $reg_user_email);
            $reg_user_email = str_ireplace('[EMAIL_CONFIRMATION]', '<a href="' . $url_site . 'auth-email-verification?hash=' . $param_token . '&email=' . $useremail . '"  target="_blank" style="color:#fff;background-color:#5156be;border-color:#5156be;box-shadow: 0 2px 6px 0 rgb(81 86 190 / 50%);display: inline-block;font-weight: 400;line-height: 1.5;text-align: center;vertical-align: middle;cursor: pointer;border: 1px solid transparent;padding: 0.47rem 0.75rem;font-size: .875rem;border-radius: 0.25rem;transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;outline: 0!important;text-decoration: none!important;">Подтвердить Email</a>', $reg_user_email);
            $reg_user_email = str_ireplace('[PASSWORD_RESET]', '<a href="' . $url_site . 'auth-reset-password?token=' . $token . '&email=' . $useremail . '"  target="_blank" style="color:#fff;background-color:#5156be;border-color:#5156be;box-shadow: 0 2px 6px 0 rgb(81 86 190 / 50%);display: inline-block;font-weight: 400;line-height: 1.5;text-align: center;vertical-align: middle;cursor: pointer;border: 1px solid transparent;padding: 0.47rem 0.75rem;font-size: .875rem;border-radius: 0.25rem;transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;outline: 0!important;text-decoration: none!important;">Сбросить пароль</a>', $reg_user_email);

            $body = $reg_user_email;

            $sender_email = "From: $mailid";

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
            }

            if (mysqli_stmt_execute($stmt)) {

                $msg = "Подтвердите регистрацию по ссылке, отправленную на ваш Email.";
            } else {
                echo "Что-то пошло не так. Пожалуйста, повторите попытку позже.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection

}
