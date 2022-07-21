<?php
$sql = "SELECT * FROM categories WHERE userid = ?";

if ($stmt = mysqli_prepare($link, $sql)) {

    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "s", $userid);
    // Set parameters
    $userid = $_SESSION["id"];

    // Attempt to execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        $categories = $stmt->get_result();
    } else {
        $categories = [];
    }

    // Close statement
    mysqli_stmt_close($stmt);
}


if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["cat"])) {
    $sql = "INSERT INTO categories (icon, cat, content, userid) VALUES (?, ?, ?, ?)";
    if ($stmt = mysqli_prepare($link, $sql)) {

        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "ssss", $icon, $cat, $content, $userid);

        // Set parameters
        $icon = $_POST["icon"];
        $cat = $_POST["cat"];
        $content = $_POST["content"];
        $userid = $_SESSION["id"];

        if (mysqli_stmt_execute($stmt)) {
            $msg = "Успех";
        } else {
            $msg = "Что-то пошло не так. Пожалуйста, повторите попытку позже.";
        }
        $sql = "SELECT * FROM categories WHERE userid = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {

            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $userid);
            // Set parameters
            $userid = $_SESSION["id"];

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                $categories = $stmt->get_result();
            } else {
                $categories = [];
            }
        }
        mysqli_stmt_close($stmt);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["cat_edit"])) {
    //mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);
    $sql = "UPDATE categories SET icon = ?, cat = ?, content = ? WHERE `id` = ?";



    if ($stmt = mysqli_prepare($link, $sql)) {

        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "ssss", $icon, $cat, $content, $id);

        // Set parameters
        $icon = $_POST["icon"];
        $cat = $_POST["cat_edit"];
        $content = $_POST["content"];
        $id = $_POST["id"];


        if (mysqli_stmt_execute($stmt)) {
            $msg = "Успех";
        } else {
            $msg = "Что-то пошло не так. Пожалуйста, повторите попытку позже.";
        }
        $sql = "SELECT * FROM categories WHERE userid = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {

            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $userid);
            // Set parameters
            $userid = $_SESSION["id"];

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                $categories = $stmt->get_result();
            } else {
                $categories = [];
            }
        }
        mysqli_stmt_close($stmt);
    }


    $access = explode(" ", $_POST['access_user']);
    $access = serialize($access);



    mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);

    $sql = "SELECT * FROM user_cat_user WHERE catid = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {

        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $catid);
        // Set parameters
        $catid = $_POST["id"];

        // Attempt to execute the prepared statement
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
    }



    if (mysqli_stmt_num_rows($stmt) == 1) {

        $sql = "SELECT id FROM user_cat_user WHERE catid = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $catid);

            // Set parameters
            $catid = $_POST["id"];

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify secretkey
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $cat_id);
                    mysqli_stmt_fetch($stmt);
                } else {
                }
            } else {
                echo $language["Oops"];
            }
        }


        mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);
        $sql = "UPDATE user_cat_user SET userid = ?, catid = ?, access_userid = ?, edit_pass_access = ?, add_pass_access = ? WHERE `id` = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {

            mysqli_stmt_bind_param($stmt, "ssssss", $userid, $catid, $access_userid, $edit_pass_access, $add_pass_access, $id);

            $userid = $access;
            $catid = $_POST["id"];
            $access_userid = $_SESSION["id"];
            if ($_POST["edit_pass_access"]) {
                $edit_pass_access = $_POST["edit_pass_access"];
            } else {
                $edit_pass_access = 1;
            }
            if ($_POST["add_pass_access"]) {
                $add_pass_access = $_POST["add_pass_access"];
            } else {
                $add_pass_access = 1;
            }

            $id = $cat_id;



            mysqli_stmt_execute($stmt);

            $sql = "SELECT * FROM categories WHERE userid = ?";

            if ($stmt = mysqli_prepare($link, $sql)) {

                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $userid);
                // Set parameters
                $userid = $_SESSION["id"];

                // Attempt to execute the prepared statement
                if (mysqli_stmt_execute($stmt)) {
                    $categories = $stmt->get_result();
                } else {
                    $categories = [];
                }
            }
            mysqli_stmt_close($stmt);
        }
    } else {
        $sql = "INSERT INTO user_cat_user (userid, catid, access_userid, edit_pass_access, add_pass_access) VALUES (?, ?, ?, ?, ?)";
        if ($stmt = mysqli_prepare($link, $sql)) {

            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $userid, $catid, $access_userid, $edit_pass_access, $add_pass_access);

            $userid = $access;
            $catid = $_POST["id"];
            $access_userid = $_SESSION["id"];
            if ($_POST["edit_pass_access"]) {
                $edit_pass_access = $_POST["edit_pass_access"];
            } else {
                $edit_pass_access = 1;
            }
            if ($_POST["add_pass_access"]) {
                $add_pass_access = $_POST["add_pass_access"];
            } else {
                $add_pass_access = 1;
            }

            mysqli_stmt_execute($stmt);

            $sql = "SELECT * FROM categories WHERE userid = ?";

            if ($stmt = mysqli_prepare($link, $sql)) {

                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $userid);
                // Set parameters
                $userid = $_SESSION["id"];

                // Attempt to execute the prepared statement
                if (mysqli_stmt_execute($stmt)) {
                    $categories = $stmt->get_result();
                } else {
                    $categories = [];
                }
            }
            mysqli_stmt_close($stmt);
        }
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["cat_delete"])) {
    //mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);
    $sql = "DELETE FROM passwords WHERE `catid` = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {

        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $id);

        // Set parameters
        $id = $_POST["cat_delete"];

        if (mysqli_stmt_execute($stmt)) {
            $msg = "Успех";
        } else {
            $msg = "Что-то пошло не так. Пожалуйста, повторите попытку позже.";
        }

        mysqli_stmt_close($stmt);
    }

    $sql = "DELETE FROM user_cat_user WHERE `catid` = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {

        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $id);

        // Set parameters
        $id = $_POST["cat_delete"];

        if (mysqli_stmt_execute($stmt)) {
            $msg = "Успех";
        } else {
            $useremail_err = "Что-то пошло не так. Пожалуйста, повторите попытку позже.";
        }
    }

    $sql = "DELETE FROM categories WHERE `id` = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {

        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $id);

        // Set parameters
        $id = $_POST["cat_delete"];

        if (mysqli_stmt_execute($stmt)) {
            $msg = "Успех";
        } else {
            $msg = "Что-то пошло не так. Пожалуйста, повторите попытку позже.";
        }
        $sql = "SELECT * FROM categories WHERE userid = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {

            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $userid);
            // Set parameters
            $userid = $_SESSION["id"];

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                $categories = $stmt->get_result();
            } else {
                $categories = [];
            }
        }
        mysqli_stmt_close($stmt);
    }

    // Close connection

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


$sql = "SELECT * FROM user_cat_user";

if ($stmt = mysqli_prepare($link, $sql)) {

    // Attempt to execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        $user_cat_user = $stmt->get_result();
    } else {
        $user_cat_user = [];
    }

    // Close statement
    mysqli_stmt_close($stmt);
}
