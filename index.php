<?php
/* Назначение констант */
define('DIR', $_SERVER['DOCUMENT_ROOT']); // Абсолютный путь к корневой директории
define('VR', '1.0'); // Версия скрипта

$config = DIR . "/config.php";

if (!file_exists($config)) {
	header("Location: /install.php");
} else {
	ini_set("display_errors", 0);
	error_reporting(E_ALL);
	/* Подключение файла с соединением с базой данных MySQL */
	require_once DIR . '/core/database/connection.php';
	/* Подключение функции мультиязычности */
	include DIR . '/core/layouts/head-main.php';

	/* Подключение файла core.php */
	require_once DIR . '/core/route.php';
}
