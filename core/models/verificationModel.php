<?php
// Define variables and initialize with empty values
mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);
$useremail_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate useremail
    if (empty(trim($_GET["email"]))) {
        $useremail_err = "Ссылка, по которой вы перешли сюда, не работает. Попробуйте запросить новую ссылку.";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE useremail = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_useremail);

            // Set parameters
            $param_useremail = trim($_GET["email"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) != 1) {
                    $useremail_err = "Ссылка, по которой вы перешли сюда, не работает. Попробуйте запросить новую ссылку.";
                } else {
                    $useremail = trim($_GET["email"]);
                }
            } else {
                echo "Упс! Что-то пошло не так. Пожалуйста, попробуйте еще раз позже.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate token
    if (empty(trim($_GET["hash"]))) {
        $useremail_err = "Ссылка, по которой вы перешли сюда, не работает. Попробуйте запросить новую ссылку.";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE token = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_usertoken);

            // Set parameters
            $param_usertoken = trim($_GET["hash"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) != 1) {
                    $useremail_err = "Ссылка, по которой вы перешли сюда, не работает. Попробуйте запросить новую ссылку.";
                } else {
                    $token = trim($_GET["hash"]);
                }
            } else {
                echo "Упс! Что-то пошло не так. Пожалуйста, попробуйте еще раз позже.";
            }

            if (empty($useremail_err)) {
                $sql = "UPDATE users SET token = ?, status = ? WHERE useremail = ?";

                if ($stmt = mysqli_prepare($link, $sql)) {

                    // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($stmt, "sis", $param_token, $status, $useremail);
                    
                    
                    $param_token = md5(md5($username . time()));
                    $status = 2;
                    $useremail = $useremail;

                    mysqli_stmt_execute($stmt);
                    
                    header("location: /auth-confirm-mail");

                }
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }



}