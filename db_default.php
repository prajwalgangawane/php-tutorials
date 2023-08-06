<?php
session_start();

if (!isset($_SESSION['db_server'])) {
    $_SESSION["db_server"] = "localhost";
    $_SESSION["db_user"] = "user";
    $_SESSION["db_password"] = "password";
    $_SESSION["database"] = "practice";
    $_SESSION["table"] = "employees";
}

$db_server = $_SESSION["db_server"];
$db_user = $_SESSION["db_user"];
$db_password = $_SESSION["db_password"];
$database = $_SESSION["database"];
$table = $_SESSION["table"];

?>