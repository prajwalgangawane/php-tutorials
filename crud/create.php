<?php
include 'connect.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $sql = "
    INSERT INTO `practice`.`employees` (`name`, `email`, `address`, `phone`, `password`, `isDeleted`) 
    VALUES ('$name', '$email', '$address', '$phone', '$password', 0)
    ";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        // echo "Employee created successfully";
        header('location:/crud');
    }
}

?>

<!Doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Create Employee - PRAJ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-screen bg-sky-300">
    <div class="h-full flex flex-col justify-center items-center">
        <div class="flex justify-center items-center">
            <h1 class="text-2xl text-gray-100">
                Create New Employee
            </h1>
        </div>
        <form method="post" class="bg-white p-10 w-1/4 flex flex-col space-y-5">
            <div class="w-full justify-between flex">
                <label>Name</label>
                <input required name="name" class="border-2 border-gray-300" placeholder="Enter your Name" />
            </div>
            <div class="w-full justify-between flex">
                <label>Email</label>
                <input required type="email" name="email" class="border-2 border-gray-300"
                    placeholder="Enter your Email" />
            </div>
            <div class="w-full justify-between flex">
                <label>Address</label>
                <input required name="address" class="border-2 border-gray-300" placeholder="Enter your Address" />
            </div>
            <div class="w-full justify-between flex">
                <label>Phone</label>
                <input required name="phone" class="border-2 border-gray-300" placeholder="Enter your Phone" />
            </div>
            <div class="w-full justify-between flex">
                <label>Password</label>
                <input required type="password" name="password" class="border-2 border-gray-300"
                    placeholder="Enter your Password" />
            </div>
            <div class="w-full justify-between flex">
                <button type="submit" name="submit" class="border-2 bg-blue-700 p-1 text-white border-gray-300">CREATE</button>
            </div>
        </form>
    </div>
</body>

</html>