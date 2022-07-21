<?php
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if username is empty
    if (empty(trim($_POST["username"]))) {
        $username_err = $language["Please_enter_username"];
    } else {
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = $language["Please_enter_password"];
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if (empty($username_err) && empty($password_err)) {
        // Prepare a select statement
        $sql = "SELECT id, username, useremail, password, role, status, office_user, photo_user, mode, text_note FROM users WHERE username = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $useremail, $hashed_password, $role, $status, $office_user, $photo_user, $mode, $text_note);
                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($password, $hashed_password)) {

                            if ($status === 2) {
                                // Password is correct, so start a new session
                                if (!isset($_SESSION)) session_start();

                                // Store data in session variables
                                $_SESSION["loggedin"] = true;
                                $_SESSION["id"] = $id;
                                $_SESSION["username"] = $username;
                                $_SESSION["useremail"] = $useremail;
                                $_SESSION["role"] = $role;
                                $_SESSION["status"] = $status;
                                $_SESSION["office_user"] = $office_user;
                                $_SESSION["photo_user"] = $photo_user;
                                $_SESSION["mode"] = $mode;
                                $_SESSION["text_note"] = $text_note;
                                

                                // Redirect user to welcome page
                                header("location: /admin");
                            } else {
                                $verification_err = 'Ваш Email не подтвержден, сначала подтвердите, а потом повторите попытку войти.';
                            }
                        } else {
                            // Display an error message if password is not valid
                            $password_err = $language["password_not_valid"];
                        }
                    }
                } else {
                    // Display an error message if username doesn't exist
                    $username_err = $language["No_account_found"];
                }
            } else {
                echo $language["Oops"];
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection

}
