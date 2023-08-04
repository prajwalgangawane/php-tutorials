<?php
$conn = new mysqli($db_server, $db_user, $db_password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->query('DROP DATABASE IF EXISTS ' . $database);
// echo "Database '$database' dropped successfully<br>";



?>