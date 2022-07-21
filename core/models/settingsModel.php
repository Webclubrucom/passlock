<?php
mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);


$sql = "SELECT * FROM settings";

if ($stmt = mysqli_prepare($link, $sql)) {

    // Attempt to execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        $settings = $stmt->get_result();
    } else {
        $settings = [];
    }

    // Close statement
    mysqli_stmt_close($stmt);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" and $_POST['title']) {

    $sql = "SELECT value FROM settings WHERE key_field = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "s", $key_field);

        $key_field = 'logo_lite';

        mysqli_stmt_execute($stmt);

        mysqli_stmt_store_result($stmt);

        mysqli_stmt_bind_result($stmt, $current_logo_lite);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);
    }


    $sql = "SELECT value FROM settings WHERE key_field = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "s", $key_field);

        $key_field = 'logo_dark';

        mysqli_stmt_execute($stmt);

        mysqli_stmt_store_result($stmt);

        mysqli_stmt_bind_result($stmt, $current_logo_dark);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);
    }

    $sql = "SELECT value FROM settings WHERE key_field = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "s", $key_field);

        $key_field = 'favicon';

        mysqli_stmt_execute($stmt);

        mysqli_stmt_store_result($stmt);

        mysqli_stmt_bind_result($stmt, $current_favicon);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);
    }

    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["title"];
        $key_field = 'title';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["description"];
        $key_field = 'description';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["check_landing"];
        $key_field = 'check_landing';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["check_register"];
        $key_field = 'check_register';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    $path_logo_lite = pathinfo($_FILES["logo_lite"]["name"]);
    $path_logo_dark = pathinfo($_FILES["logo_dark"]["name"]);
    $path_favicon = pathinfo($_FILES["favicon"]["name"]);



    if (!file_exists($_FILES['logo_lite']['tmp_name']) || !is_uploaded_file($_FILES['logo_lite']['tmp_name'])) {
        $logo_lite = $current_logo_lite;
    } else {
        $logo_lite = uniqid() . '.' . $path_logo_lite['extension'];
        $folder = DIR . "/assets/images/";
        move_uploaded_file($_FILES["logo_lite"]["tmp_name"], $folder . $logo_lite);
    }

    if (!file_exists($_FILES['logo_dark']['tmp_name']) || !is_uploaded_file($_FILES['logo_dark']['tmp_name'])) {
        $logo_dark = $current_logo_dark;
    } else {
        $logo_dark = uniqid() . '.' . $path_logo_dark['extension'];
        $folder = DIR . "/assets/images/";
        move_uploaded_file($_FILES["logo_dark"]["tmp_name"], $folder . $logo_dark);
    }

    if (!file_exists($_FILES['favicon']['tmp_name']) || !is_uploaded_file($_FILES['favicon']['tmp_name'])) {
        $favicon = $current_favicon;
    } else {
        $favicon = uniqid() . '.' . $path_favicon['extension'];
        $folder = DIR . "/assets/images/";
        move_uploaded_file($_FILES["favicon"]["tmp_name"], $folder . $favicon);
    }


    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $logo_lite;
        $key_field = 'logo_lite';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $logo_dark;
        $key_field = 'logo_dark';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $favicon;
        $key_field = 'favicon';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    $sql = "SELECT * FROM settings";

    if ($stmt = mysqli_prepare($link, $sql)) {

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            $settings = $stmt->get_result();
        } else {
            $settings = [];
        }



        // Close statement
        mysqli_stmt_close($stmt);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" and $_POST['menu_1']) {

    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["menu_1"];
        $key_field = 'menu_1';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["menu_2"];
        $key_field = 'menu_2';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["menu_3"];
        $key_field = 'menu_3';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["menu_4"];
        $key_field = 'menu_4';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["btn_login"];
        $key_field = 'btn_login';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }



    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["btn_start"];
        $key_field = 'btn_start';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["title_main_1"];
        $key_field = 'title_main_1';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["title_main_2"];
        $key_field = 'title_main_2';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["sub_title"];
        $key_field = 'sub_title';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["title_form_1"];
        $key_field = 'title_form_1';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["title_form_2"];
        $key_field = 'title_form_2';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["title_form_3"];
        $key_field = 'title_form_3';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    $sql = "SELECT * FROM settings";

    if ($stmt = mysqli_prepare($link, $sql)) {

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            $settings = $stmt->get_result();
        } else {
            $settings = [];
        }



        // Close statement
        mysqli_stmt_close($stmt);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" and $_POST['title_cust_1']) {
    $sql = "SELECT value FROM settings WHERE key_field = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "s", $key_field);

        $key_field = 'cust_url_1';

        mysqli_stmt_execute($stmt);

        mysqli_stmt_store_result($stmt);

        mysqli_stmt_bind_result($stmt, $current_cust_url_1);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);
    }

    $sql = "SELECT value FROM settings WHERE key_field = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "s", $key_field);

        $key_field = 'cust_url_2';

        mysqli_stmt_execute($stmt);

        mysqli_stmt_store_result($stmt);

        mysqli_stmt_bind_result($stmt, $current_cust_url_2);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);
    }

    $sql = "SELECT value FROM settings WHERE key_field = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "s", $key_field);

        $key_field = 'cust_url_3';

        mysqli_stmt_execute($stmt);

        mysqli_stmt_store_result($stmt);

        mysqli_stmt_bind_result($stmt, $current_cust_url_3);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);
    }

    $sql = "SELECT value FROM settings WHERE key_field = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "s", $key_field);

        $key_field = 'cust_url_4';

        mysqli_stmt_execute($stmt);

        mysqli_stmt_store_result($stmt);

        mysqli_stmt_bind_result($stmt, $current_cust_url_4);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);
    }

    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["title_cust_1"];
        $key_field = 'title_cust_1';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["title_cust_2"];
        $key_field = 'title_cust_2';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["title_cust_3"];
        $key_field = 'title_cust_3';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["sub_title_cust"];
        $key_field = 'sub_title_cust';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    $path_cust_url_1 = pathinfo($_FILES["cust_url_1"]["name"]);
    $path_cust_url_2 = pathinfo($_FILES["cust_url_2"]["name"]);
    $path_cust_url_3 = pathinfo($_FILES["cust_url_3"]["name"]);
    $path_cust_url_4 = pathinfo($_FILES["cust_url_4"]["name"]);

    if (!file_exists($_FILES['cust_url_1']['tmp_name']) || !is_uploaded_file($_FILES['cust_url_1']['tmp_name'])) {
        $cust_url_1 = $current_cust_url_1;
    } else {
        $cust_url_1 = uniqid() . '.' . $path_cust_url_1['extension'];
        $folder = DIR . "/assets/images/";
        move_uploaded_file($_FILES["cust_url_1"]["tmp_name"], $folder . $cust_url_1);
    }
    if (!file_exists($_FILES['cust_url_2']['tmp_name']) || !is_uploaded_file($_FILES['cust_url_2']['tmp_name'])) {
        $cust_url_2 = $current_cust_url_2;
    } else {
        $cust_url_2 = uniqid() . '.' . $path_cust_url_2['extension'];
        $folder = DIR . "/assets/images/";
        move_uploaded_file($_FILES["cust_url_2"]["tmp_name"], $folder . $cust_url_2);
    }
    if (!file_exists($_FILES['cust_url_3']['tmp_name']) || !is_uploaded_file($_FILES['cust_url_3']['tmp_name'])) {
        $cust_url_3 = $current_cust_url_3;
    } else {
        $cust_url_3 = uniqid() . '.' . $path_cust_url_3['extension'];
        $folder = DIR . "/assets/images/";
        move_uploaded_file($_FILES["cust_url_3"]["tmp_name"], $folder . $cust_url_3);
    }
    if (!file_exists($_FILES['cust_url_4']['tmp_name']) || !is_uploaded_file($_FILES['cust_url_4']['tmp_name'])) {
        $cust_url_4 = $current_cust_url_4;
    } else {
        $cust_url_4 = uniqid() . '.' . $path_cust_url_4['extension'];
        $folder = DIR . "/assets/images/";
        move_uploaded_file($_FILES["cust_url_4"]["tmp_name"], $folder . $cust_url_4);
    }

    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $cust_url_1;
        $key_field = 'cust_url_1';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }



    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $cust_url_2;
        $key_field = 'cust_url_2';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $cust_url_3;
        $key_field = 'cust_url_3';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $cust_url_4;
        $key_field = 'cust_url_4';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }



    $sql = "SELECT * FROM settings";

    if ($stmt = mysqli_prepare($link, $sql)) {

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            $settings = $stmt->get_result();
        } else {
            $settings = [];
        }



        // Close statement
        mysqli_stmt_close($stmt);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" and $_POST['title_scope_1']) {

    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["title_scope_1"];
        $key_field = 'title_scope_1';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["title_scope_2"];
        $key_field = 'title_scope_2';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["title_scope_3"];
        $key_field = 'title_scope_3';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["title_scope_4"];
        $key_field = 'title_scope_4';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }



    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["desc_scope_1"];
        $key_field = 'desc_scope_1';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }



    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["desc_scope_2"];
        $key_field = 'desc_scope_2';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["desc_scope_3"];
        $key_field = 'desc_scope_3';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["desc_scope_4"];
        $key_field = 'desc_scope_4';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["scope_title_1"];
        $key_field = 'scope_title_1';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["scope_title_2"];
        $key_field = 'scope_title_2';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["sub_title_scope"];
        $key_field = 'sub_title_scope';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }



    $sql = "SELECT * FROM settings";

    if ($stmt = mysqli_prepare($link, $sql)) {

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            $settings = $stmt->get_result();
        } else {
            $settings = [];
        }



        // Close statement
        mysqli_stmt_close($stmt);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" and $_POST['advan_title']) {

    $sql = "SELECT value FROM settings WHERE key_field = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "s", $key_field);

        $key_field = 'img_advan';

        mysqli_stmt_execute($stmt);

        mysqli_stmt_store_result($stmt);

        mysqli_stmt_bind_result($stmt, $current_img_advan);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);
    }

    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["advan_title"];
        $key_field = 'advan_title';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["sub_title_advan"];
        $key_field = 'sub_title_advan';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["desc_advan"];
        $key_field = 'desc_advan';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["title_advan_1"];
        $key_field = 'title_advan_1';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }



    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["title_advan_2"];
        $key_field = 'title_advan_2';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }



    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["title_advan_3"];
        $key_field = 'title_advan_3';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["desc_advan_1"];
        $key_field = 'desc_advan_1';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["desc_advan_2"];
        $key_field = 'desc_advan_2';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["desc_advan_3"];
        $key_field = 'desc_advan_3';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    $path_img_advan = pathinfo($_FILES["img_advan"]["name"]);

    if (!file_exists($_FILES['img_advan']['tmp_name']) || !is_uploaded_file($_FILES['img_advan']['tmp_name'])) {
        $img_advan = $current_img_advan;
    } else {
        $img_advan = uniqid() . '.' . $path_img_advan['extension'];
        $folder = DIR . "/assets/images/";
        move_uploaded_file($_FILES["img_advan"]["tmp_name"], $folder . $img_advan);
    }


    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $img_advan;
        $key_field = 'img_advan';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }




    $sql = "SELECT * FROM settings";

    if ($stmt = mysqli_prepare($link, $sql)) {

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            $settings = $stmt->get_result();
        } else {
            $settings = [];
        }



        // Close statement
        mysqli_stmt_close($stmt);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" and $_POST['question_1']) {

    $sql = "SELECT value FROM settings WHERE key_field = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "s", $key_field);

        $key_field = 'img_video';

        mysqli_stmt_execute($stmt);

        mysqli_stmt_store_result($stmt);

        mysqli_stmt_bind_result($stmt, $current_img_video);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);
    }

    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["question_1"];
        $key_field = 'question_1';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["question_2"];
        $key_field = 'question_2';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["question_3"];
        $key_field = 'question_3';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["question_4"];
        $key_field = 'question_4';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }



    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["answer_1"];
        $key_field = 'answer_1';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }



    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["answer_2"];
        $key_field = 'answer_2';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["answer_3"];
        $key_field = 'answer_3';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["answer_4"];
        $key_field = 'answer_4';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["title_video"];
        $key_field = 'title_video';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["url_video"];
        $key_field = 'url_video';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    $path_img_video = pathinfo($_FILES["img_video"]["name"]);

    if (!file_exists($_FILES['img_video']['tmp_name']) || !is_uploaded_file($_FILES['img_video']['tmp_name'])) {
        $img_video = $current_img_video;
    } else {
        $img_video = uniqid() . '.' . $path_img_video['extension'];
        $folder = DIR . "/assets/images/";
        move_uploaded_file($_FILES["img_video"]["tmp_name"], $folder . $img_video);
    }


    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $img_video;
        $key_field = 'img_video';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }




    $sql = "SELECT * FROM settings";

    if ($stmt = mysqli_prepare($link, $sql)) {

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            $settings = $stmt->get_result();
        } else {
            $settings = [];
        }



        // Close statement
        mysqli_stmt_close($stmt);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" and $_POST['feedback_title_1']) {

    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["feedback_title_1"];
        $key_field = 'feedback_title_1';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["feedback_title_2"];
        $key_field = 'feedback_title_2';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["sub_title_feedback"];
        $key_field = 'sub_title_feedback';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["name_form"];
        $key_field = 'name_form';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["phone"];
        $key_field = 'phone';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }



    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["phone_number"];
        $key_field = 'phone_number';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }



    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["email"];
        $key_field = 'email';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["email_value"];
        $key_field = 'email_value';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["social_network"];
        $key_field = 'social_network';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["vkontakte"];
        $key_field = 'vkontakte';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["odnoklassniki"];
        $key_field = 'odnoklassniki';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["youtube"];
        $key_field = 'youtube';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    $sql = "SELECT * FROM settings";

    if ($stmt = mysqli_prepare($link, $sql)) {

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            $settings = $stmt->get_result();
        } else {
            $settings = [];
        }



        // Close statement
        mysqli_stmt_close($stmt);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" and $_POST['sub_title_footer']) {

    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["sub_title_footer"];
        $key_field = 'sub_title_footer';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["title_widget_1"];
        $key_field = 'title_widget_1';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["title_sub_widget"];
        $key_field = 'title_sub_widget';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["desc_sub_widget"];
        $key_field = 'desc_sub_widget';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }



    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["title_widget_2"];
        $key_field = 'title_widget_2';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }



    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["rules"];
        $key_field = 'rules';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["politics"];
        $key_field = 'politics';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["support"];
        $key_field = 'support';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["coocky"];
        $key_field = 'coocky';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    $sql = "SELECT * FROM settings";

    if ($stmt = mysqli_prepare($link, $sql)) {

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            $settings = $stmt->get_result();
        } else {
            $settings = [];
        }



        // Close statement
        mysqli_stmt_close($stmt);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" and $_POST['reg_user_email']) {

    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["reg_user_email"];
        $key_field = 'reg_user_email';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["reg_user_email_admin"];
        $key_field = 'reg_user_email_admin';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["edit_user_email_admin"];
        $key_field = 'edit_user_email_admin';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["reset_email"];
        $key_field = 'reset_email';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["landing_email"];
        $key_field = 'landing_email';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["theme_landing_email"];
        $key_field = 'theme_landing_email';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["theme_reg_user_email"];
        $key_field = 'theme_reg_user_email';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["theme_reg_user_email_admin"];
        $key_field = 'theme_reg_user_email_admin';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["theme_edit_user_email_admin"];
        $key_field = 'theme_edit_user_email_admin';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["theme_reset_email"];
        $key_field = 'theme_reset_email';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    $sql = "SELECT * FROM settings";

    if ($stmt = mysqli_prepare($link, $sql)) {

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            $settings = $stmt->get_result();
        } else {
            $settings = [];
        }
    }
}



if ($_SERVER["REQUEST_METHOD"] == "POST" and $_POST['reviews_1']) {

    $sql = "SELECT value FROM settings WHERE key_field = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "s", $key_field);

        $key_field = 'image_reviews_1';

        mysqli_stmt_execute($stmt);

        mysqli_stmt_store_result($stmt);

        mysqli_stmt_bind_result($stmt, $current_image_reviews_1);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);
    }

    $sql = "SELECT value FROM settings WHERE key_field = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "s", $key_field);

        $key_field = 'image_reviews_2';

        mysqli_stmt_execute($stmt);

        mysqli_stmt_store_result($stmt);

        mysqli_stmt_bind_result($stmt, $current_image_reviews_2);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);
    }

    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["reviews_1"];
        $key_field = 'reviews_1';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["reviews_2"];
        $key_field = 'reviews_2';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["specialty_1"];
        $key_field = 'specialty_1';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["specialty_2"];
        $key_field = 'specialty_2';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }







    $path_image_reviews_1 = pathinfo($_FILES["image_reviews_1"]["name"]);

    if (!file_exists($_FILES['image_reviews_1']['tmp_name']) || !is_uploaded_file($_FILES['image_reviews_1']['tmp_name'])) {
        $image_reviews_1 = $current_image_reviews_1;
    } else {
        $image_reviews_1 = uniqid() . '.' . $path_image_reviews_1['extension'];
        $folder = DIR . "/assets/images/users/";
        move_uploaded_file($_FILES["image_reviews_1"]["tmp_name"], $folder . $image_reviews_1);
    }


    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $image_reviews_1;
        $key_field = 'image_reviews_1';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }


    $path_image_reviews_2 = pathinfo($_FILES["image_reviews_2"]["name"]);

    if (!file_exists($_FILES['image_reviews_2']['tmp_name']) || !is_uploaded_file($_FILES['image_reviews_2']['tmp_name'])) {
        $image_reviews_2 = $current_image_reviews_2;
    } else {
        $image_reviews_2 = uniqid() . '.' . $path_image_reviews_2['extension'];
        $folder = DIR . "/assets/images/users/";
        move_uploaded_file($_FILES["image_reviews_2"]["tmp_name"], $folder . $image_reviews_2);
    }


    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $image_reviews_2;
        $key_field = 'image_reviews_2';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }




    $sql = "SELECT * FROM settings";

    if ($stmt = mysqli_prepare($link, $sql)) {

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            $settings = $stmt->get_result();
        } else {
            $settings = [];
        }
    }
}





if ($_POST['title_banner_1'] || $_POST['desc_banner_1'] || $_POST['text_button_banner_1'] || $_POST['image_banner_1']) {

    $sql = "SELECT value FROM settings WHERE key_field = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "s", $key_field);

        $key_field = 'image_banner_1';

        mysqli_stmt_execute($stmt);

        mysqli_stmt_store_result($stmt);

        mysqli_stmt_bind_result($stmt, $current_image_reviews_1);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);
    }

    $sql = "SELECT value FROM settings WHERE key_field = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "s", $key_field);

        $key_field = 'image_banner_2';

        mysqli_stmt_execute($stmt);

        mysqli_stmt_store_result($stmt);

        mysqli_stmt_bind_result($stmt, $current_image_reviews_2);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);
    }

    $sql = "SELECT value FROM settings WHERE key_field = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "s", $key_field);

        $key_field = 'image_banner_3';

        mysqli_stmt_execute($stmt);

        mysqli_stmt_store_result($stmt);

        mysqli_stmt_bind_result($stmt, $current_image_reviews_2);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);
    }


    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["block_banners"];
        $key_field = 'block_banners';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }


    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["title_banner_1"];
        $key_field = 'title_banner_1';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["title_banner_2"];
        $key_field = 'title_banner_2';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["title_banner_3"];
        $key_field = 'title_banner_3';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }




    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["desc_banner_1"];
        $key_field = 'desc_banner_1';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["desc_banner_3"];
        $key_field = 'desc_banner_3';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["desc_banner_2"];
        $key_field = 'desc_banner_2';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }



    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["text_button_banner_1"];
        $key_field = 'text_button_banner_1';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }



    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["text_button_banner_2"];
        $key_field = 'text_button_banner_2';



        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }



    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["text_button_banner_3"];
        $key_field = 'text_button_banner_3';



        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }


    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["url_button_banner_1"];
        $key_field = 'url_button_banner_1';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["url_button_banner_2"];
        $key_field = 'url_button_banner_2';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["url_button_banner_3"];
        $key_field = 'url_button_banner_3';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }





    $path_image_banner_1 = pathinfo($_FILES["image_banner_1"]["name"]);

    if (!file_exists($_FILES['image_banner_1']['tmp_name']) || !is_uploaded_file($_FILES['image_banner_1']['tmp_name'])) {
        $image_banner_1 = $current_image_banner_1;
    } else {
        $image_banner_1 = uniqid() . '.' . $path_image_banner_1['extension'];
        $folder = DIR . "/assets/images/ads/";
        $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
        if ($stmt = mysqli_prepare($link, $sql)) {

            mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

            $value = $image_banner_1;
            $key_field = 'image_banner_1';

            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }
        move_uploaded_file($_FILES["image_banner_1"]["tmp_name"], $folder . $image_banner_1);
    }




    $path_image_banner_2 = pathinfo($_FILES["image_banner_2"]["name"]);

    if (!file_exists($_FILES['image_banner_2']['tmp_name']) || !is_uploaded_file($_FILES['image_banner_2']['tmp_name'])) {
        $image_banner_2 = $current_image_banner_2;
    } else {
        $image_banner_2 = uniqid() . '.' . $path_image_banner_2['extension'];
        $folder = DIR . "/assets/images/ads/";

        $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
        if ($stmt = mysqli_prepare($link, $sql)) {

            mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

            $value = $image_banner_2;
            $key_field = 'image_banner_2';

            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }
        move_uploaded_file($_FILES["image_banner_2"]["tmp_name"], $folder . $image_banner_2);
    }




    $path_image_banner_3 = pathinfo($_FILES["image_banner_3"]["name"]);

    if (!file_exists($_FILES['image_banner_3']['tmp_name']) || !is_uploaded_file($_FILES['image_banner_3']['tmp_name'])) {
        $image_banner_3 = $current_image_banner_3;
    } else {
        $image_banner_3 = uniqid() . '.' . $path_image_banner_3['extension'];
        $folder = DIR . "/assets/images/ads/";


        $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
        if ($stmt = mysqli_prepare($link, $sql)) {

            mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

            $value = $image_banner_3;
            $key_field = 'image_banner_3';

            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }


        move_uploaded_file($_FILES["image_banner_3"]["tmp_name"], $folder . $image_banner_3);
    }







    $sql = "SELECT * FROM settings";

    if ($stmt = mysqli_prepare($link, $sql)) {

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            $settings = $stmt->get_result();
        } else {
            $settings = [];
        }
    }
}



if ($_POST['id_page_vk']) {

    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["post_vk"];
        $key_field = 'post_vk';



        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["id_page_vk"];
        $key_field = 'id_page_vk';



        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["token_vk"];
        $key_field = 'token_vk';



        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }



    $sql = "SELECT * FROM settings";

    if ($stmt = mysqli_prepare($link, $sql)) {

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            $settings = $stmt->get_result();
        } else {
            $settings = [];
        }
    }
}

if ($_POST['type_email']) {

    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["type_email"];
        $key_field = 'type_email';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["mailhost"];
        $key_field = 'mailhost';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["mailport"];
        $key_field = 'mailport';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["mailusername"];
        $key_field = 'mailusername';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    $sql = "UPDATE settings SET value = ? WHERE key_field = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

        $value = $_POST["mailpassword"];
        $key_field = 'mailpassword';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }



    $sql = "SELECT * FROM settings";

    if ($stmt = mysqli_prepare($link, $sql)) {

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            $settings = $stmt->get_result();
        } else {
            $settings = [];
        }
    }
}