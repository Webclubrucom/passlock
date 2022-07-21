<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" and $_POST['mode']) {
    /* Подключение файла с учетными данными базы данных MySQL */
    require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';

    /* Попытка подключения к базе данных MySQL */
    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    /* Проверка подключения */
    if ($link === false) {
        die("ОШИБКА: Не удалось подключиться к базе данных. " . mysqli_connect_error());
    }
    mysqli_set_charset($link, "utf8mb4");

    $sql = "UPDATE users SET mode = ? WHERE id = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $mode, $id);

        session_start();
        $mode = $_POST["mode"];
        $id = $_SESSION["id"];
        $_SESSION["mode"] = $mode;

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
}
