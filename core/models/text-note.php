<?php
mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';

/* Попытка подключения к базе данных MySQL */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

/* Проверка подключения */
if ($link === false) {
    die("ОШИБКА: Не удалось подключиться к базе данных. " . mysqli_connect_error());
}
mysqli_set_charset($link, "utf8mb4");

if ($_SERVER["REQUEST_METHOD"] == "POST" AND $_POST['note']) {

    $sql = "UPDATE users SET text_note = ? WHERE id = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ss", $text_note, $userid);

        $text_note = $_POST["text_note"];
        $userid = $_SESSION['id'];

        $_SESSION['text_note'] = $text_note;

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    header('Location: /admin');
}