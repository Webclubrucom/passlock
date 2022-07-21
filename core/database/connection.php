<?php

/* Подключение файла с учетными данными базы данных MySQL */
require_once DIR . '/config.php';

/* Попытка подключения к базе данных MySQL */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

/* Проверка подключения */
if ($link === false) {
    die("ОШИБКА: Не удалось подключиться к базе данных. " . mysqli_connect_error());
}
mysqli_set_charset($link, "utf8mb4");