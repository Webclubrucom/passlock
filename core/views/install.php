<?php
ini_set("display_errors",0);
error_reporting(E_ALL);
require "../config.php";
if ($_CONFIG['install'] == '1') {
    header("Location: /admin");
}
if(isset($_GET['step']))$step = $_GET['step']; else $step = 1;

$phpversion = phpversion();

if(isset($_POST['title_site']))$title_site = $_POST['title_site'];

if(isset($_POST['username']))$username = $_POST['username'];

if(isset($_POST['password']))$passwordAdmin = $_POST['password'];

if(isset($title_site) and isset($username) and isset($passwordAdmin))
{
	require "db.php";

}


?>