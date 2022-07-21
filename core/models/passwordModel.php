<?php
//mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);
$sql = "SELECT * FROM categories";

if ($stmt = mysqli_prepare($link, $sql)) {

    // Attempt to execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        $categories = $stmt->get_result();
    } else {
        $categories = [];
    }

    // Close statement
    mysqli_stmt_close($stmt);
}


$sql = "SELECT * FROM user_cat_user";

if ($stmt = mysqli_prepare($link, $sql)) {

    // Attempt to execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        $access = $stmt->get_result();
    } else {
        $access = [];
    }

    // Close statement
    mysqli_stmt_close($stmt);
}

$sql = "SELECT * FROM passwords";

if ($stmt = mysqli_prepare($link, $sql)) {

    // Attempt to execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        $passwords = $stmt->get_result();
    } else {
        $passwords = [];
    }

    // Close statement
    mysqli_stmt_close($stmt);
}


if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["name_pass"])) {
    $sql = "INSERT INTO passwords (name_pass, site, username, password, catid, userid) VALUES (?, ?, ?, ?, ?, ?)";
    if ($stmt = mysqli_prepare($link, $sql)) {

        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "ssssii", $name_pass, $site, $username, $password, $catid, $userid);

        $hashedPasswort = openssl_encrypt($_POST["password_pass"], "AES-128-ECB", $current_secretkey);


        // Set parameters
        $name_pass = $_POST["name_pass"];
        $site = $_POST["site_pass"];
        $username = $_POST["username_pass"];
        $password = $hashedPasswort;
        $catid = $_POST["catid"];
        $userid = $_SESSION["id"];

        if (mysqli_stmt_execute($stmt)) {
            $sql = "SELECT * FROM passwords";

            if ($stmt = mysqli_prepare($link, $sql)) {

                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $userid);
                // Set parameters
                $userid = $_SESSION["id"];

                // Attempt to execute the prepared statement
                if (mysqli_stmt_execute($stmt)) {
                    $passwords = $stmt->get_result();
                } else {
                    $passwords = [];
                }
            }
        } else {
            $msg = "Что-то пошло не так. Пожалуйста, повторите попытку позже.";
        }

        mysqli_stmt_close($stmt);
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["name_pass_edit"])) {

    $sql = "UPDATE passwords SET name_pass = ?, site = ?, username = ?, password = ?, catid = ?, userid = ? WHERE `id` = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "ssssisi", $name_pass, $site, $username, $password, $catid, $userid, $id);

        $hashedPasswort = openssl_encrypt($_POST["password_pass_edit"], "AES-128-ECB", $current_secretkey);


        // Set parameters
        $name_pass = $_POST["name_pass_edit"];
        $site = $_POST["site_pass_edit"];
        $username = $_POST["username_pass_edit"];
        $password = $hashedPasswort;
        $catid = $_POST["catid_pass_edit"];
        $userid = $_SESSION["id"];
        $id = $_POST["id"];

        if (mysqli_stmt_execute($stmt)) {
            $sql = "SELECT * FROM passwords";

            if ($stmt = mysqli_prepare($link, $sql)) {


                // Attempt to execute the prepared statement
                if (mysqli_stmt_execute($stmt)) {
                    $passwords = $stmt->get_result();
                } else {
                    $passwords = [];
                }
            }
        } else {
            $msg = "Что-то пошло не так. Пожалуйста, повторите попытку позже.";
        }

        mysqli_stmt_close($stmt);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["pass_delete"])) {
    //mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);
    $sql = "DELETE FROM passwords WHERE `id` = ?";



    if ($stmt = mysqli_prepare($link, $sql)) {

        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $id);

        // Set parameters

        $id = $_POST["pass_delete"];


        if (mysqli_stmt_execute($stmt)) {
            $msg = "Успех";
        } else {
            $msg = "Что-то пошло не так. Пожалуйста, повторите попытку позже.";
        }
        $sql = "SELECT * FROM passwords WHERE userid = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {

            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $userid);
            // Set parameters
            $userid = $_SESSION["id"];

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                $passwords = $stmt->get_result();
            } else {
                $passwords = [];
            }
        }

        mysqli_stmt_close($stmt);
    }
}
