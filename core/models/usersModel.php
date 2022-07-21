<?php
mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once $_SERVER['DOCUMENT_ROOT'] . '/core/vendor/phpmailer/src/Exception.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/core/vendor/phpmailer/src/PHPMailer.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/core/vendor/phpmailer/src/SMTP.php';

// passing true in constructor enables exceptions in PHPMailer
$mail = new PHPMailer($phpmailer);
$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri_path);
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/$uri_segments[1]";
$url_site = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/";



// Define variables and initialize with empty values
$useremail = $username =  $password = $confirm_password = "";
$useremail_err = $username_err = $password_err = $confirm_password_err = "";

//mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);
$sql = "SELECT * FROM users";

if ($stmt = mysqli_prepare($link, $sql)) {

    // Attempt to execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        $users = $stmt->get_result();
    } else {
        $users = [];
    }

    // Close statement
    mysqli_stmt_close($stmt);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["username_add"])) {

    // Validate useremail
    if (empty(trim($_POST["useremail"]))) {
        $useremail_err = "Please enter a useremail.";
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
    if (empty(trim($_POST["username_add"]))) {
        $username_err = "Пожалуйста, введите имя пользователя.";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username_add"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "Этот логин уже зарегистрирован. Выберите другой.";
                } else {
                    $username = trim($_POST["username_add"]);
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

    if (empty($useremail_err) && empty($username_err) && empty($password_err) && empty($confirm_password_err)) {
        $sql = "INSERT INTO users (useremail, username, password, token, role, status, office_user, photo_user) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        if ($stmt = mysqli_prepare($link, $sql)) {

            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssss", $param_useremail, $param_username, $password, $token, $role, $status, $office_user, $photo_user);

            $path_parts = pathinfo($_FILES["photo_user"]["name"]);
            // Set parameters
            $useremail = $_POST["useremail"];
            $username = $_POST["username_add"];
            $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
            $token = bin2hex(random_bytes(50)); // generate unique token
            $role = $_POST["role"];
            $status = $_POST["status"];
            $office_user = $_POST["office_user"];
            if (!file_exists($_FILES['photo_user']['tmp_name']) || !is_uploaded_file($_FILES['photo_user']['tmp_name'])) {
                $photo_user = 'default.png';
            } else {
                $photo_user = uniqid() . '.' . $path_parts['extension'];
            }

            if (mysqli_stmt_execute($stmt)) {

                $theme_reg_user_email_admin = str_ireplace('[USERNAME]', $username, $theme_reg_user_email_admin);
                $theme_reg_user_email_admin = str_ireplace('[BR]', '<br>', $theme_reg_user_email_admin);
                $theme_reg_user_email_admin = str_ireplace('[DBR]', '<br><br>', $theme_reg_user_email_admin);
                $theme_reg_user_email_admin = str_ireplace('[EMAIL_ADMIN]', EMAIL_VALUE, $theme_reg_user_email_admin);
                $theme_reg_user_email_admin = str_ireplace('[WEBSITE]', '<strong><a href="' . $url_site . '"  target="_blank">' . TITLE . '</a></strong>', $theme_reg_user_email_admin);
                $theme_reg_user_email_admin = str_ireplace('[EMAIL_CONFIRMATION]', '<a href="' . $url_site . 'auth-email-verification?hash=' . $param_token . '&email=' . $useremail . '"  target="_blank" style="color:#fff;background-color:#5156be;border-color:#5156be;box-shadow: 0 2px 6px 0 rgb(81 86 190 / 50%);display: inline-block;font-weight: 400;line-height: 1.5;text-align: center;vertical-align: middle;cursor: pointer;border: 1px solid transparent;padding: 0.47rem 0.75rem;font-size: .875rem;border-radius: 0.25rem;transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;outline: 0!important;text-decoration: none!important;">Подтвердить Email</a>', $theme_reg_user_email_admin);
                $theme_reg_user_email_admin = str_ireplace('[PASSWORD_RESET]', '<a href="' . $url_site . 'auth-reset-password?token=' . $token . '&email=' . $useremail . '"  target="_blank" style="color:#fff;background-color:#5156be;border-color:#5156be;box-shadow: 0 2px 6px 0 rgb(81 86 190 / 50%);display: inline-block;font-weight: 400;line-height: 1.5;text-align: center;vertical-align: middle;cursor: pointer;border: 1px solid transparent;padding: 0.47rem 0.75rem;font-size: .875rem;border-radius: 0.25rem;transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;outline: 0!important;text-decoration: none!important;">Сбросить пароль</a>', $theme_reg_user_email_admin);

                $subject = $theme_reg_user_email_admin;

                $reg_user_email_admin = str_ireplace('[USERNAME]', $username, $reg_user_email_admin);
                $reg_user_email_admin = str_ireplace('[USEREMAIL]', $useremail, $reg_user_email_admin);
                $reg_user_email_admin = str_ireplace('[PHONE]', $phone, $reg_user_email_admin);
                $reg_user_email_admin = str_ireplace('[MESSAGE]', $message, $reg_user_email_admin);
                $reg_user_email_admin = str_ireplace('[BR]', '<br>', $reg_user_email_admin);
                $reg_user_email_admin = str_ireplace('[DBR]', '<br><br>', $reg_user_email_admin);
                $reg_user_email_admin = str_ireplace('[EMAIL_ADMIN]', EMAIL_VALUE, $reg_user_email_admin);
                $reg_user_email_admin = str_ireplace('[WEBSITE]', '<strong><a href="' . $url_site . '"  target="_blank">' . TITLE . '</a></strong>', $reg_user_email_admin);
                $reg_user_email_admin = str_ireplace('[EMAIL_CONFIRMATION]', '<a href="' . $url_site . 'auth-email-verification?hash=' . $param_token . '&email=' . $useremail . '"  target="_blank" style="color:#fff;background-color:#5156be;border-color:#5156be;box-shadow: 0 2px 6px 0 rgb(81 86 190 / 50%);display: inline-block;font-weight: 400;line-height: 1.5;text-align: center;vertical-align: middle;cursor: pointer;border: 1px solid transparent;padding: 0.47rem 0.75rem;font-size: .875rem;border-radius: 0.25rem;transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;outline: 0!important;text-decoration: none!important;">Подтвердить Email</a>', $reg_user_email_admin);
                $reg_user_email_admin = str_ireplace('[PASSWORD_RESET]', '<a href="' . $url_site . 'auth-reset-password?token=' . $token . '&email=' . $useremail . '"  target="_blank" style="color:#fff;background-color:#5156be;border-color:#5156be;box-shadow: 0 2px 6px 0 rgb(81 86 190 / 50%);display: inline-block;font-weight: 400;line-height: 1.5;text-align: center;vertical-align: middle;cursor: pointer;border: 1px solid transparent;padding: 0.47rem 0.75rem;font-size: .875rem;border-radius: 0.25rem;transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;outline: 0!important;text-decoration: none!important;">Сбросить пароль</a>', $reg_user_email_admin);

                $body = $reg_user_email_admin;

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
                    mail($to,  '=?UTF-8?B?' . base64_encode($subject) . '?=', $message, $headers);
                }
            } else {
                $msg = "Что-то пошло не так. Пожалуйста, повторите попытку позже.";
            }

            $sql = "SELECT * FROM users";

            if ($stmt = mysqli_prepare($link, $sql)) {

                if (mysqli_stmt_execute($stmt)) {
                    $users = $stmt->get_result();
                } else {
                    $users = [];
                }
            }

            mysqli_stmt_close($stmt);
        }

        // Close connection

    }

    $tmp_name = $_FILES["photo_user"]["tmp_name"];
    $folder = DIR . "/assets/images/users/" . $photo_user;

    if (move_uploaded_file($tmp_name, $folder)) {
        $image = 'Загружено';
    } else {
        $image = 'Не загружено';
    }
}












if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["edit_user"])) {



    $sql = "SELECT id, useremail, username, password, role, status, office_user, photo_user FROM users WHERE id = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $id);

        // Set parameters
        $id = $_POST['id'];

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // Store result
            mysqli_stmt_store_result($stmt);

            // Check if username exists, if yes then verify password
            if (mysqli_stmt_num_rows($stmt) == 1) {
                // Bind result variables
                mysqli_stmt_bind_result($stmt, $id, $current_useremail, $current_username, $current_password, $current_role, $current_status, $current_office_user, $current_photo_user);
                mysqli_stmt_fetch($stmt);
            } else {
                // Display an error message if username doesn't exist
                $username_err = $language["No_account_found"];
            }
        } else {
            echo $language["Oops"];
        }
    }

    $sql = "UPDATE users SET useremail = ?, username = ?, password = ?, role = ?, status = ?, office_user = ?, photo_user = ? WHERE `id` = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "ssssssss", $useremail, $username, $password, $role, $status, $office_user, $photo_user, $id);

        $path_parts = pathinfo($_FILES["photo_user"]["name"]);

        // Set parameters
        if (empty($_POST["useremail"])) {
            $useremail = $current_useremail;
        } else {
            $useremail = $_POST["useremail"];
        }
        if (empty($_POST["username_edit"])) {
            $username = $current_username;
        } else {
            $username = $_POST["username_edit"];
        }
        if (empty($_POST["password"])) {
            $password = $current_password;
        } else {
            $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
        }
        if (empty($_POST["role"])) {
            $role = $current_role;
        } else {
            $role = $_POST["role"];
        }
        if (empty($_POST["status"])) {
            $status = $current_status;
        } else {
            $status = $_POST["status"];
        }
        if (empty($_POST["office_user"])) {
            $office_user = $current_office_user;
        } else {
            $office_user = $_POST["office_user"];
        }
        $id = $_POST["id"];

        if (!file_exists($_FILES['photo_user']['tmp_name']) || !is_uploaded_file($_FILES['photo_user']['tmp_name'])) {
            $photo_user = $current_photo_user;
        } else {
            $photo_user = uniqid() . '.' . $path_parts['extension'];
        }

        $folder = DIR . "/assets/images/users/";

        if (move_uploaded_file($_FILES["photo_user"]["tmp_name"], $folder . $photo_user)) {
            $image = 'Загружено';
        }

        if (mysqli_stmt_execute($stmt)) {

            $theme_edit_user_email_admin = str_ireplace('[USERNAME]', $username, $theme_edit_user_email_admin);
            $theme_edit_user_email_admin = str_ireplace('[BR]', '<br>', $theme_edit_user_email_admin);
            $theme_edit_user_email_admin = str_ireplace('[DBR]', '<br><br>', $theme_edit_user_email_admin);
            $theme_edit_user_email_admin = str_ireplace('[EMAIL_ADMIN]', EMAIL_VALUE, $theme_edit_user_email_admin);
            $theme_edit_user_email_admin = str_ireplace('[WEBSITE]', '<strong><a href="' . $url_site . '"  target="_blank">' . TITLE . '</a></strong>', $theme_edit_user_email_admin);
            $theme_edit_user_email_admin = str_ireplace('[EMAIL_CONFIRMATION]', '<a href="' . $url_site . 'auth-email-verification?hash=' . $param_token . '&email=' . $useremail . '"  target="_blank" style="color:#fff;background-color:#5156be;border-color:#5156be;box-shadow: 0 2px 6px 0 rgb(81 86 190 / 50%);display: inline-block;font-weight: 400;line-height: 1.5;text-align: center;vertical-align: middle;cursor: pointer;border: 1px solid transparent;padding: 0.47rem 0.75rem;font-size: .875rem;border-radius: 0.25rem;transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;outline: 0!important;text-decoration: none!important;">Подтвердить Email</a>', $theme_edit_user_email_admin);
            $theme_edit_user_email_admin = str_ireplace('[PASSWORD_RESET]', '<a href="' . $url_site . 'auth-reset-password?token=' . $token . '&email=' . $useremail . '"  target="_blank" style="color:#fff;background-color:#5156be;border-color:#5156be;box-shadow: 0 2px 6px 0 rgb(81 86 190 / 50%);display: inline-block;font-weight: 400;line-height: 1.5;text-align: center;vertical-align: middle;cursor: pointer;border: 1px solid transparent;padding: 0.47rem 0.75rem;font-size: .875rem;border-radius: 0.25rem;transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;outline: 0!important;text-decoration: none!important;">Сбросить пароль</a>', $theme_edit_user_email_admin);

            $subject = $theme_edit_user_email_admin;

            $edit_user_email_admin = str_ireplace('[USERNAME]', $username, $edit_user_email_admin);
            $edit_user_email_admin = str_ireplace('[USEREMAIL]', $useremail, $edit_user_email_admin);
            $edit_user_email_admin = str_ireplace('[PHONE]', $phone, $edit_user_email_admin);
            $edit_user_email_admin = str_ireplace('[MESSAGE]', $message, $edit_user_email_admin);
            $edit_user_email_admin = str_ireplace('[BR]', '<br>', $edit_user_email_admin);
            $edit_user_email_admin = str_ireplace('[DBR]', '<br><br>', $edit_user_email_admin);
            $edit_user_email_admin = str_ireplace('[EMAIL_ADMIN]', EMAIL_VALUE, $edit_user_email_admin);
            $edit_user_email_admin = str_ireplace('[WEBSITE]', '<strong><a href="' . $url_site . '"  target="_blank">' . TITLE . '</a></strong>', $edit_user_email_admin);
            $edit_user_email_admin = str_ireplace('[EMAIL_CONFIRMATION]', '<a href="' . $url_site . 'auth-email-verification?hash=' . $param_token . '&email=' . $useremail . '"  target="_blank" style="color:#fff;background-color:#5156be;border-color:#5156be;box-shadow: 0 2px 6px 0 rgb(81 86 190 / 50%);display: inline-block;font-weight: 400;line-height: 1.5;text-align: center;vertical-align: middle;cursor: pointer;border: 1px solid transparent;padding: 0.47rem 0.75rem;font-size: .875rem;border-radius: 0.25rem;transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;outline: 0!important;text-decoration: none!important;">Подтвердить Email</a>', $edit_user_email_admin);
            $edit_user_email_admin = str_ireplace('[PASSWORD_RESET]', '<a href="' . $url_site . 'auth-reset-password?token=' . $token . '&email=' . $useremail . '"  target="_blank" style="color:#fff;background-color:#5156be;border-color:#5156be;box-shadow: 0 2px 6px 0 rgb(81 86 190 / 50%);display: inline-block;font-weight: 400;line-height: 1.5;text-align: center;vertical-align: middle;cursor: pointer;border: 1px solid transparent;padding: 0.47rem 0.75rem;font-size: .875rem;border-radius: 0.25rem;transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;outline: 0!important;text-decoration: none!important;">Сбросить пароль</a>', $edit_user_email_admin);

            $body = $edit_user_email_admin;

            if (TYPE_EMAIL == 'true') {

                include $_SERVER['DOCUMENT_ROOT'] . '/core/models/smtp.php';
            } else {
                $to      = $useremail;
                $subject = $subject;
                $message = $body;
                $headers = 'MIME-Version: 1.0' . "\r\n" .
                    'Content-type: text/html; charset=utf-8' . "\r\n" .
                    'From: ' . TITLE . ' <' . EMAIL_VALUE . '>' . "\r\n" .
                    'Reply-To: ' . EMAIL_VALUE . "\r\n";

                mail($to, '=?UTF-8?B?' . base64_encode($subject) . '?=', $message, $headers);
            }
        } else {
            $msg = "Что-то пошло не так. Пожалуйста, повторите попытку позже.";
        }

        $sql = "SELECT * FROM users";

        if ($stmt = mysqli_prepare($link, $sql)) {

            if (mysqli_stmt_execute($stmt)) {
                $users = $stmt->get_result();
            } else {
                $users = [];
            }
        }

        mysqli_stmt_close($stmt);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["user_delete"])) {
    //mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);

    $sql = "SELECT id FROM categories WHERE `userid` = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $userid);

        // Set parameters
        $id = $_POST["user_delete"];

        if (mysqli_stmt_execute($stmt)) {
            $idcats = $stmt->get_result();
        } else {
            $idcats = 1;
        }
    }

    if ($idcats != 1) {
        foreach ($idcats as $idcat) {
            $sql = "DELETE FROM passwords WHERE `catid` = ?";

            if ($stmt = mysqli_prepare($link, $sql)) {

                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "i", $id);

                // Set parameters
                $catid = $idcat;

                if (mysqli_stmt_execute($stmt)) {
                    $msg = "Успех";
                } else {
                    $useremail_err = "Что-то пошло не так. Пожалуйста, повторите попытку позже.";
                }
            }
        }
    }



    $sql = "DELETE FROM categories WHERE `userid` = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {

        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $id);

        // Set parameters
        $id = $_POST["user_delete"];

        if (mysqli_stmt_execute($stmt)) {
            $msg = "Успех";
        } else {
            $useremail_err = "Что-то пошло не так. Пожалуйста, повторите попытку позже.";
        }
    }

    $sql = "DELETE FROM user_cat_user WHERE `userid` = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {

        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $id);

        // Set parameters
        $id = $_POST["user_delete"];

        if (mysqli_stmt_execute($stmt)) {
            $msg = "Успех";
        } else {
            $useremail_err = "Что-то пошло не так. Пожалуйста, повторите попытку позже.";
        }
    }



    $sql = "DELETE FROM users WHERE `id` = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {

        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $id);

        // Set parameters
        $id = $_POST["user_delete"];

        if (mysqli_stmt_execute($stmt)) {
            $msg = "Успех";
        } else {
            $useremail_err = "Что-то пошло не так. Пожалуйста, повторите попытку позже.";
        }
        $sql = "SELECT * FROM users";

        if ($stmt = mysqli_prepare($link, $sql)) {

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                $users = $stmt->get_result();
            } else {
                $users = [];
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
}
