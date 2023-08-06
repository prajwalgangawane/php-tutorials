<?php
include '../db_default.php';

$conn = new mysqli($db_server, $db_user, $db_password, $database);
if ($conn) {
    // echo "Connected successfully<br/>";
} else {
    die(mysqli_error($conn));
}
?>