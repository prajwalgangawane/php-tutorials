<?php
include 'connect.php';

if (isset($_GET['id'])) {
// $sql = "delete from employees where id=" . $_GET['id'];
    $sql = "
    UPDATE employees set isDeleted=1 where id=" . $_GET['id'];
    $result = mysqli_query($conn,$sql);
    if($result){
        header('location:/employees');
    }
    else{
        die(mysqli_error($conn));
    }
}

?>