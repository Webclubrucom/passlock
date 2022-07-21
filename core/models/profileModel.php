<?php

$sql = "SELECT secretkey FROM users WHERE id = ?";


if ($stmt = mysqli_prepare($link, $sql)) {
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "s", $id);

    // Set parameters
    $id = $_SESSION['id'];

    // Attempt to execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        // Store result
        mysqli_stmt_store_result($stmt);

        // Check if username exists, if yes then verify secretkey
        if (mysqli_stmt_num_rows($stmt) == 1) {
            // Bind result variables
            mysqli_stmt_bind_result($stmt, $current_secretkey);
            mysqli_stmt_fetch($stmt);
        } else {
        }
    } else {
        echo $language["Oops"];
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["useremail"])) {

    $sql = "SELECT password, photo_user FROM users WHERE id = ?";


    if ($stmt = mysqli_prepare($link, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $id);

        // Set parameters
        $id = $_SESSION['id'];

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // Store result
            mysqli_stmt_store_result($stmt);

            // Check if username exists, if yes then verify password
            if (mysqli_stmt_num_rows($stmt) == 1) {
                // Bind result variables
                mysqli_stmt_bind_result($stmt, $current_password, $current_photo_user);
                mysqli_stmt_fetch($stmt);
            } else {
                // Display an error message if username doesn't exist
                $username_err = $language["No_account_found"];
            }
        } else {
            echo $language["Oops"];
        }
    }




    mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);
    $sql = "UPDATE users SET useremail = ?, username = ?, password = ?, office_user = ?, photo_user = ?, secretkey = ? WHERE `id` = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "ssssssi", $useremail, $username, $password, $office_user, $photo_user, $secretkey, $id);

        $path_parts = pathinfo($_FILES["photo_user"]["name"]);


        // Set parameters
        if (empty($_POST["useremail"])) {
            $useremail = $_SESSION["useremail"];
        } else {
            $useremail = $_POST["useremail"];
        }
        if (empty($_POST["username"])) {
            $username = $_SESSION["username"];
        } else {
            $username = $_POST["username"];
        }
        if (empty($_POST["password"])) {
            $password = $current_password;
        } else {
            $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
        }

        
        $office_user = $_POST["office_user"];
        
        if (empty($_POST["secretkey"])) {
            $secretkey = '';
        } else {
            $secretkey = $_POST["secretkey"];
        }
        $id = $_SESSION["id"];


        if (!file_exists($_FILES['photo_user']['tmp_name']) || !is_uploaded_file($_FILES['photo_user']['tmp_name'])) {
            $photo_user = $_SESSION["photo_user"];
        } else {
            $photo_user = uniqid() . '.' . $path_parts['extension'];
        }



        $folder = DIR . "/assets/images/users/";

        if (move_uploaded_file($_FILES["photo_user"]["tmp_name"], $folder . $photo_user)) {
            $image = 'Загружено';
        }

        if (mysqli_stmt_execute($stmt)) {
            $_SESSION["useremail"] = $useremail;
            $_SESSION["username"] = $username;
            $_SESSION["office_user"] = $office_user;
            $_SESSION["photo_user"] = $photo_user;
            $sql = "SELECT secretkey FROM users WHERE id = ?";


            if ($stmt = mysqli_prepare($link, $sql)) {
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $id);

                // Set parameters
                $id = $_SESSION['id'];

                // Attempt to execute the prepared statement
                if (mysqli_stmt_execute($stmt)) {
                    // Store result
                    mysqli_stmt_store_result($stmt);

                    // Check if username exists, if yes then verify secretkey
                    if (mysqli_stmt_num_rows($stmt) == 1) {
                        // Bind result variables
                        mysqli_stmt_bind_result($stmt, $current_secretkey);
                        mysqli_stmt_fetch($stmt);
                    } else {
                    }
                } else {
                    echo $language["Oops"];
                }
            }
        }


        mysqli_stmt_close($stmt);
    }

    // Close connection


}
