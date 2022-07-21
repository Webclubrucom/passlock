<?php
$sql = "SELECT * FROM routings";

function rgp($url) { // remove GET-parameters from URL
    return preg_replace('/^([^?]+)(\?.*?)?(#.*)?$/', '$1$3', $url);
}

$url_no_get = rgp($_SERVER['REQUEST_URI']);

if ($stmt = mysqli_prepare($link, $sql)) {

    if (mysqli_stmt_execute($stmt)) {
        $routings = $stmt->get_result();
        foreach ($routings as $routing) {
            if ($routing['url'] === $url_no_get) {
                if ($url_no_get === '/logout') {
                     if (!isset($_SESSION)) session_start ();
                    $_SESSION = array();
                    session_destroy();
                    header("location: /login");
                    exit;
                } else {
                    $title = $routing['title'];
                    include DIR . '/core/views/' . $routing['file'] . '.php';
                }
            }
            /*if ($_SERVER['REQUEST_URI'] != $routing['url']) {
                $title = 'Страница не найдена';
                include DIR . '/core/views/pages-404.php';
                header("HTTP/1.1 404 Not Found");
                exit;
            }*/
        }
    }
}
//
