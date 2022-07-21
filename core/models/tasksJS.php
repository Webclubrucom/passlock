<?php

session_start();
mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);


require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';

/* Попытка подключения к базе данных MySQL */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

/* Проверка подключения */
if ($link === false) {
    die("ОШИБКА: Не удалось подключиться к базе данных. " . mysqli_connect_error());
}
mysqli_set_charset($link, "utf8mb4");



if ($_POST['add-task']) {


    $sql = "INSERT INTO tasks (name, status, color, userid) VALUES (?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "sisi", $name, $status, $color, $userid);

        $name = $_POST["add-task"];
        $status = 1;
        $color = 'light';
        $userid = $_SESSION["id"];
    }
    mysqli_stmt_execute($stmt);

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

        // Close statement
        mysqli_stmt_close($stmt);
    }

    foreach ($tasks as $task) { ?>

        <div class="alert alert-<?= $task['color']; ?> d-flex justify-content-between task-item" role="alert">
            <div class="form-check">
                <input class="form-check-input" data-id="<?= $task['id']; ?>" type="checkbox" id="task-<?= $task['id']; ?>" <?php if ($task['status'] == '2') { ?>checked="" <?php } ?>>
                <label <?php if ($task['status'] == '2') { ?>style="text-decoration: line-through;" <?php } ?> class="form-check-label" for="task-<?= $task['id']; ?>">
                    <?= $task['name']; ?>
                </label>
            </div>
            <div class="delete" data-del="<?= $task['id']; ?>"><i class="fa fa-ban" aria-hidden="true"></i></div>
        </div>

    <?php }
}


if ($_POST['check_task']) {

    $sql = "UPDATE tasks SET status = ? WHERE `id` = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "ii", $status, $id);

        $status = 2;
        $id = $_POST["check_task"];
    }
    mysqli_stmt_execute($stmt);
}

if ($_POST['uncheck_task']) {

    $sql = "UPDATE tasks SET status = ? WHERE `id` = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "ii", $status, $id);

        $status = 1;
        $id = $_POST["uncheck_task"];
    }
    mysqli_stmt_execute($stmt);
}


if ($_POST["delete_task"]) {
    //mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);
    $sql = "DELETE FROM tasks WHERE `id` = ?";



    if ($stmt = mysqli_prepare($link, $sql)) {

        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $id);

        // Set parameters

        $id = $_POST["delete_task"];


        if (mysqli_stmt_execute($stmt)) {
            $msg = "Успех";
        } else {
            $msg = "Что-то пошло не так. Пожалуйста, повторите попытку позже.";
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
        }
        mysqli_stmt_close($stmt);
    }

    foreach ($tasks as $task) { ?>

        <div class="alert alert-<?= $task['color']; ?> d-flex justify-content-between task-item" role="alert">
            <div class="form-check">
                <input class="form-check-input" data-id="<?= $task['id']; ?>" type="checkbox" id="task-<?= $task['id']; ?>" <?php if ($task['status'] == '2') { ?>checked="" <?php } ?>>
                <label <?php if ($task['status'] == '2') { ?>style="text-decoration: line-through;" <?php } ?> class="form-check-label" for="task-<?= $task['id']; ?>">
                    <?= $task['name']; ?>
                </label>
            </div>
            <div data-del="<?= $task['id']; ?>" class="delete"><i class="fa fa-ban" aria-hidden="true"></i></div>
        </div>

<?php }
}
