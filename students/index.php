<?php
session_start();
header('Content-Type: application/json; charset=utf-8');

handleRequest($_SERVER['REQUEST_METHOD']);

function handleRequest($method)
{
    $db_server = $_SESSION['db_server'];
    $db_user = $_SESSION['db_user'];
    $db_password = $_SESSION['db_password'];
    $db_database = $_SESSION['database'];
    $db_table = 'students';
    switch ($method) {
        case 'GET':
            $conn = new mysqli($db_server, $db_user, $db_password, $db_database);
            if ($conn) {
                $response = handleGET($conn, $db_table);
                // print_r(json_encode($response));
            } else {
                die(mysqli_error($conn));
            }
            break;

        case 'POST':
            if ($class = json_decode($_POST['class'])) {
                $conn = new mysqli($db_server, $db_user, $db_password, $db_database);
                $response = handlePOST($class, $conn, $db_table);
            }
            break;

        default:
            echo 'METHOD NOT ALLOWED';
            break;
    }
    if (isset($response)) {
        print_r(json_encode($response));
    } else {
        print_r(json_encode((object) ['message' => 'Something went wrong!']));
    }
}

function handleGET($conn, $db_table)
{
    $sql = 'SELECT * FROM `' . $db_table . '`';
    $response = array();
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        unset($row['id']);
        array_push($response, $row);
    }
    return $response;
}

function handlePOST($class, $conn, $db_table)
{
    $response = array();
    foreach ($class as $student) {
        if ($student->Active == 1) {
            $sql = "INSERT INTO " . $db_table . " (`name`, `age`, `school`, `Active`) VALUES ('" . $student->name . "', '" . $student->age . "', '" . $student->school . "', 1);";
            // $sql = "UPDATE INTO {$db_table} SET `name` = '" . $student->name . "', `age` = '" . $student->age . "', `school` = '" . $student->school . "', `Active` = '1' WHERE (`name` = '" . $student->name . "');";
            if ($result = mysqli_query($conn, $sql)) {
                array_push($response, (object) ['name' => $student->name, 'message' => 'success']);
            } else {
                array_push($response, (object) ['name' => $student->name, 'message' => 'failure']);
            }
        } else {
            $sql = "DELETE from " . $db_table . " where id and name='" . $student->name . "';";
            if ($result = mysqli_query($conn, $sql)) {
                array_push($response, (object) ['name' => $student->name, 'message' => 'failure']);
            } else {
                array_push($response, (object) ['name' => $student->name, 'message' => 'failure']);
            }
        }
    }
    return $response;
}


// INSERT INTO `databases`.`students` (`name`, `age`, `school`, `Active`) VALUES ('John Garg', '25', 'Ahlcom Public School', '0');

// CREATE TABLE `students` (
//     `id` int NOT NULL AUTO_INCREMENT,
//     `name` varchar(255) NOT NULL,
//     `age` int NOT NULL,
//     `school` varchar(255) NOT NULL,
//     `Active` tinyint NOT NULL,
//     PRIMARY KEY (`id`)
//   )

?>