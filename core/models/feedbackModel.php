<?php



if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["name_form"])) {


    $username     = $_POST['name_form'];
    $useremail    = $_POST['email_form'];
    $phone     = $_POST['phone_form'];
    $message = $_POST['comments_form'];


    if ($username == NULL) {
        $messdanger = "Вы должны ввести свое имя.";
    } else if ($useremail == NULL) {
        $messdanger = "Вы должны ввести адрес электронной почты.";
    } else if ($phone == NULL) {
        $messdanger = "Пожалуйста, заполните все поля!";
    } else if ($message == NULL) {
        $messdanger = "Напишите свое сообщение нам.";
    }

    if ($messdanger == NULL) {
        $subject = $theme_landing_email;

        $landing_email = str_ireplace('[USERNAME]', $username, $landing_email);
        $landing_email = str_ireplace('[USEREMAIL]', $useremail, $landing_email);
        $landing_email = str_ireplace('[PHONE]', $phone, $landing_email);
        $landing_email = str_ireplace('[MESSAGE]', $message, $landing_email);
        $landing_email = str_ireplace('[BR]', '<br>', $landing_email);
        $landing_email = str_ireplace('[DBR]', '<br><br>', $landing_email);
        $landing_email = str_ireplace('[EMAIL_ADMIN]', EMAIL_VALUE, $landing_email);
        $landing_email = str_ireplace('[WEBSITE]', '<strong><a href="' . $url_site . '"  target="_blank">' . TITLE . '</a></strong>', $landing_email);
        $landing_email = str_ireplace('[EMAIL_CONFIRMATION]', '<a href="' . $url_site . 'auth-email-verification?hash=' . $param_token . '&email=' . $useremail . '"  target="_blank" style="color:#fff;background-color:#5156be;border-color:#5156be;box-shadow: 0 2px 6px 0 rgb(81 86 190 / 50%);display: inline-block;font-weight: 400;line-height: 1.5;text-align: center;vertical-align: middle;cursor: pointer;border: 1px solid transparent;padding: 0.47rem 0.75rem;font-size: .875rem;border-radius: 0.25rem;transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;outline: 0!important;text-decoration: none!important;">Подтвердить Email</a>', $landing_email);
        $landing_email = str_ireplace('[PASSWORD_RESET]', '<a href="' . $url_site . 'auth-reset-password?token=' . $token . '&email=' . $useremail . '"  target="_blank" style="color:#fff;background-color:#5156be;border-color:#5156be;box-shadow: 0 2px 6px 0 rgb(81 86 190 / 50%);display: inline-block;font-weight: 400;line-height: 1.5;text-align: center;vertical-align: middle;cursor: pointer;border: 1px solid transparent;padding: 0.47rem 0.75rem;font-size: .875rem;border-radius: 0.25rem;transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;outline: 0!important;text-decoration: none!important;">Сбросить пароль</a>', $landing_email);

        $body = $landing_email;

        $to      = $useremail;
        $subject = $subject;
        $message = $body;
        $headers = 'MIME-Version: 1.0' . "\r\n" .
            'Content-type: text/html; charset=utf-8' . "\r\n" .
            'From: ' . TITLE . ' <' . EMAIL_VALUE . '>' . "\r\n" .
            'Reply-To: ' . EMAIL_VALUE . "\r\n";;

        if (mail($to, '=?UTF-8?B?' . base64_encode($subject) . '?=', $message, $headers)) {

            // Email has sent successfully, echo a success page.
            $message_success = "<div class='message_success'>Спасибо, <strong>$username</strong>, ваше сообщение было отправлено нам.</div>";
        } else {

            $message_danger = "<div class='message_danger'>$messdanger</div>";
        }
    } else {
        $message_danger = "<div class='message_danger'>$messdanger</div>";
    }
}
