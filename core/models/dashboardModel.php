<?php
$sql = "SELECT * FROM users WHERE status = ?";

if ($stmt = mysqli_prepare($link, $sql)) {

    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "s", $status);
    // Set parameters
    $status = 2;


    // Attempt to execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {

        mysqli_stmt_store_result($stmt);
        $rows_active_user = mysqli_stmt_num_rows($stmt);
    }

    mysqli_stmt_close($stmt);
}

$sql = "SELECT * FROM users WHERE status = ?";

if ($stmt = mysqli_prepare($link, $sql)) {

    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "s", $status);
    // Set parameters
    $status = 1;


    // Attempt to execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {

        mysqli_stmt_store_result($stmt);
        $rows_noactive_user = mysqli_stmt_num_rows($stmt);
    }

    mysqli_stmt_close($stmt);
}

$sql = "SELECT * FROM passwords WHERE userid = ?";

if ($stmt = mysqli_prepare($link, $sql)) {

    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "s", $userid);
    // Set parameters
    $userid = $_SESSION["id"];

    // Attempt to execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_store_result($stmt);
        $rows_you_psswords = mysqli_stmt_num_rows($stmt);
    }

    mysqli_stmt_close($stmt);
}

$sql = "SELECT * FROM passwords";

if ($stmt = mysqli_prepare($link, $sql)) {

    // Attempt to execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_store_result($stmt);
        $rows_all_passwords = mysqli_stmt_num_rows($stmt);
    }

    mysqli_stmt_close($stmt);
}

$sql = "SELECT * FROM categories WHERE userid = ?";

if ($stmt = mysqli_prepare($link, $sql)) {

    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "s", $userid);
    // Set parameters
    $userid = $_SESSION["id"];

    // Attempt to execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_store_result($stmt);
        $rows_you_categories = mysqli_stmt_num_rows($stmt);
    }

    mysqli_stmt_close($stmt);
}

$sql = "SELECT * FROM categories";

if ($stmt = mysqli_prepare($link, $sql)) {

    // Attempt to execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_store_result($stmt);
        $rows_all_categories = mysqli_stmt_num_rows($stmt);
    }

    mysqli_stmt_close($stmt);
}

$sql = "SELECT * FROM tasks WHERE userid = ?";

if ($stmt = mysqli_prepare($link, $sql)) {

    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "s", $userid);
    // Set parameters
    $userid = $_SESSION["id"];

    // Attempt to execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {

        $tasks = $stmt->get_result();
    } else {
        $tasks = [];
    }

    mysqli_stmt_close($stmt);
}

$sql = "SELECT * FROM tasks WHERE userid = ? AND status = ?";

if ($stmt = mysqli_prepare($link, $sql)) {

    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "ss", $userid, $status);
    // Set parameters
    $userid = $_SESSION["id"];
    $status = 1;

    // Attempt to execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_store_result($stmt);
        $rows_noactive_tasks = mysqli_stmt_num_rows($stmt);
    }

    mysqli_stmt_close($stmt);
}

$sql = "SELECT * FROM tasks WHERE userid = ? AND status = ?";

if ($stmt = mysqli_prepare($link, $sql)) {

    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "ss", $userid, $status);
    // Set parameters
    $userid = $_SESSION["id"];
    $status = 2;

    // Attempt to execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_store_result($stmt);
        $rows_active_tasks = mysqli_stmt_num_rows($stmt);
    }

    mysqli_stmt_close($stmt);
}


// ID нашего сообщества или страницы вконтакте
$wall_id = $id_page_vk;

// Удаляем минус у ID групп, что мы используем выше (понадобится для ссылки).
$group_id = preg_replace("/-/i", "", $wall_id);

// Количество записей, которое нам нужно получить.
$count = "1";

// Токен
$token = $token_vk;

// Получаем информацию, подставив все данные выше.
$api = file_get_contents("https://api.vk.com/api.php?oauth=1&method=wall.get&owner_id={$wall_id}&count=1&v=5.81&access_token={$token}");

// Преобразуем JSON-строку в массив
$wall = json_decode($api);


// Получаем массив
$wall = $wall->response->items;

/*
echo '<pre>'; 
var_dump($wall);
echo '</pre>';

exit;
*/