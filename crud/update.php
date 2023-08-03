<?php
include 'connect.php';

if (isset($_POST['submit'])) {

    $sql = "
    UPDATE employees
    SET name = '" . $_POST['name'] . "',
        email = '" . $_POST['email'] . "',
        address = '" . $_POST['address'] . "',
        phone = '" . $_POST['phone'] . "',
        password = '" . $_POST['password'] . "',
        isDeleted = 0
    WHERE id = " . $_GET['id'] . ";
    ";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('location:/crud');
    }
}

if (isset($_GET['id'])) {
    $sql = "select * from employees where id=" . $_GET['id'];
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}
// print_r($row);
?>

<!Doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-screen bg-sky-300">
    <div class="h-full flex flex-col justify-center items-center">
        <div class="flex justify-center items-center">
            <h1 class="text-2xl text-gray-100 text-center">
                Updating Employee Details for <br />
                <?php echo $row['name'] ?> <br />
                (<?php echo $row['email'] ?>)
            </h1>
        </div>
        <form method="post" class="bg-white p-10 w-1/4 flex flex-col space-y-5">
            <div class="w-full justify-between flex">
                <label>Name</label>
                <input required name="name" class="border-2 border-gray-300" placeholder="Enter your Name"
                    value="<?php echo $row['name'] ?>" />
            </div>
            <div class="w-full justify-between flex">
                <label>Email</label>
                <input required type="email" name="email" class="border-2 border-gray-300"
                    placeholder="Enter your Email" value="<?php echo $row['email'] ?>" />
            </div>
            <div class="w-full justify-between flex">
                <label>Address</label>
                <input required name="address" class="border-2 border-gray-300" placeholder="Enter your Address"
                    value="<?php echo $row['address'] ?>" />
            </div>
            <div class="w-full justify-between flex">
                <label>Phone</label>
                <input required name="phone" class="border-2 border-gray-300" placeholder="Enter your Phone"
                    value="<?php echo $row['phone'] ?>" />
            </div>
            <div class="w-full justify-between flex">
                <label>Password</label>
                <input required type="password" name="password" class="border-2 border-gray-300"
                    value="<?php echo $row['password'] ?>" placeholder="Enter your Password" />
            </div>
            <div class="w-full justify-between flex">
                <button type="submit" name="submit"
                    class="border-2 bg-blue-700 p-1 text-white border-gray-300">UPDATE</button>
            </div>
        </form>
    </div>
</body>

</html>