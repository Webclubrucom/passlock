<?php
/*  Менеджер паролей PassLock
	Автор: Михаил Абрамов
	Группа ВК: https://vk.com/webcreature
	Сайт: https://webcreature.site/
*/
define('DIR', $_SERVER['DOCUMENT_ROOT']); // Абсолютный путь к корневой директории

if (isset($_POST["server_bd"]) and isset($_POST["name_bd"]) and isset($_POST["username_bd"]) and isset($_POST["password_bd"]) and isset($_POST["name_site"]) and isset($_POST["email_admin"]) and isset($_POST["username_admin"]) and isset($_POST["password_admin"])) {

	/* Записываем в переменные данные из формы. Функция trim() убирает пробелы с начала и конца строки */
	$server_bd = trim($_POST["server_bd"]);
	$name_bd = trim($_POST["name_bd"]);
	$username_bd = trim($_POST["username_bd"]);
	$password_bd = trim($_POST["password_bd"]);
	$name_site = trim($_POST["name_site"]);
	$email_admin = trim($_POST["email_admin"]);
	$username_admin = trim($_POST["username_admin"]);
	$password_admin = trim($_POST["password_admin"]);

	/* Попытка подключения к базе данных MySQL */
	$link = mysqli_connect($server_bd, $username_bd, $password_bd, $name_bd);

	/* Устанавливаем кодировку по-умолчанию UTF8 */
	mysqli_set_charset($link, "utf8mb4");

	/* Проверка подключения */
	if ($link === false) {
		die("ОШИБКА: Не удалось подключиться к базе данных. " . mysqli_connect_error());
	} else {
		
		/* Записываем в переменную содержание конфигурационного файла */
		$dbNEW = "<?php
		define('DB_SERVER', '" . $server_bd . "');
		define('DB_USERNAME', '" . $username_bd . "');
		define('DB_PASSWORD', '" . $password_bd . "');
		define('DB_NAME', '" . $name_bd . "');
		?>";

		/* Записываем в переменную конфигурационный файл - полный путь */
		$url_path = DIR . "/config.php";

		/* Проверка наличия файла, если отсутствует создаем */
		if (!file_exists($url_path)) {
			file_put_contents($url_path, $dbNEW);
		}

		/* Записываем в переменную содержание файла .htaccess */
		$body_htaccess = "RewriteEngine On
		RewriteCond %{REQUEST_FILENAME} !-d
		RewriteCond %{REQUEST_FILENAME} !-f
		RewriteCond %{REQUEST_FILENAME} !-l
		RewriteRule (.*) index.php?$1 [QSA,L]";

		/* Записываем в переменную файл .htaccess - полный путь */
		$htaccess = DIR . "/.htaccess";

		/* Проверка наличия файла, если отсутствует создаем */
		if (!file_exists($htaccess)) {
			file_put_contents($htaccess, $body_htaccess);
		}
		
		/* Назначаем переменную с дампом базы данных - полный путь */
		$filename = DIR . '/passlock.sql';

		/* Выбираем базу данных для закачки в нее дампа базы данных */
		mysqli_select_db($link, $name_bd);

		/* Заливаем дамп базы данных */
		$templine = '';
		$lines = file($filename);
		foreach ($lines as $line) {
			if (substr($line, 0, 2) == '--' || $line == '')
				continue;
			$templine .= $line;
			if (substr(trim($line), -1, 1) == ';') {
				mysqli_query($link, $templine);
				$templine = '';
			}
		}

		/* Отображение ошики в SQL запросе при ее наличии */
		mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);

		/* Обновление таблицы users в базе данных */
		$sql = "UPDATE users SET useremail = ?, username = ?, password = ? WHERE `id` = ?";
		if ($stmt = mysqli_prepare($link, $sql)) {

			// Привязываем переменные к подготовленному оператору в качестве параметров
			mysqli_stmt_bind_param($stmt, "sssi", $useremail, $username, $password, $id);

			// Устанавливаем параметры
			$useremail = $email_admin;
			$username = $username_admin;
			$password = password_hash($password_admin, PASSWORD_DEFAULT);
			$id = 1;

			mysqli_stmt_execute($stmt);
			mysqli_stmt_close($stmt);
		}

		/* Обновление таблицы settings в базе данных */
		$sql = "UPDATE settings SET value = ? WHERE key_field = ?";
		if ($stmt = mysqli_prepare($link, $sql)) {

			// Привязываем переменные к подготовленному оператору в качестве параметров
			mysqli_stmt_bind_param($stmt, "ss", $value, $key_field);

			// Устанавливаем параметры
			$value = $name_site;
			$key_field = 'title';

			mysqli_stmt_execute($stmt);
			mysqli_stmt_close($stmt);
		}

		echo 1;
	}
}
