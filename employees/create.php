<?php
require 'connect.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $get_sql = 'SELECT * FROM ' . $table . ' where email="' . $email . '" ;';
    $get_result = mysqli_query($conn, $get_sql);

    if ($row = mysqli_fetch_assoc($get_result)) {
    } else {
        $sql = "
        INSERT INTO `" . $database . "`.`" . $table . "` (`name`, `email`, `address`, `phone`, `password`, `isDeleted`) 
        VALUES ('$name', '$email', '$address', '$phone', '$password', 0)
        ";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            // echo "<script>window.alert('Employee created successfully')</script>";
            echo `
            if (confirm('Employee created successfully')) {
                header('location:/employees');
            }
            else {
                alert('hello')
            }
            `;
        }
    }
}
?>

<!Doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Create Employee - PRAJ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg+xml" sizes="any" href="https://www.php.net/favicon.svg?v=2">
    <link rel="icon" type="image/png" sizes="196x196" href="https://www.php.net/favicon-196x196.png?v=2">
    <link rel="icon" type="image/png" sizes="32x32" href="https://www.php.net/favicon-32x32.png?v=2">
    <link rel="icon" type="image/png" sizes="16x16" href="https://www.php.net/favicon-16x16.png?v=2">
    <link rel="shortcut icon" href="https://www.php.net/favicon.ico?v=2">
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
                <button type="submit" name="submit"
                    class="border-2 bg-blue-700 p-1 text-white border-gray-300">CREATE</button>
            </div>
        </form>
    </div>

    <!-- HTML structure for the dialog -->
    <div class="fixed inset-0 flex items-center justify-center ease-in-out z-1" id="dialogWrapper"
        style="display: none;">
        <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity"></div>
        <div class="bg-white p-4 rounded-lg shadow-md z-10 px-5" id="dialog">
            <div id="message_title" class="bg-red-200 top-0 text-lg px-5 -mx-6">
                Message
            </div>
            <div id="message_message" class="p-5 flex items-start justify-start">Message Box</div>
            <div class="flex items-start justify-between">
                <button id="message_confirm" onclick="app.closeDialog()"
                    class="mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">OK</button>
                <button id="message_cancel" onclick="app.closeDialog()"
                    class="mt-4 px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Close</button>
            </div>
        </div>
    </div>

    <script>
        window.app = {
            openDialog: (message) => {
                document.getElementById('dialogWrapper').style.display = 'flex';
                console.log(typeof message)
                switch (typeof message) {
                    case 'object':
                        document.getElementById('message_title').innerHTML = message.title ?? 'Message';
                        document.getElementById('message_message').innerHTML = message.message ?? 'This message is not defined!';
                        if (message.button) {
                            Object.keys(message.button).forEach(i => {
                                if (['confirm', 'cancel'].requires(i)) {
                                    document.getElementById('message_' + i).innerText = message.button[i].text ?? i.toUpperCase();
                                    document.getElementById('message_' + i).onclick = message.button[i].onclick ?? app.closeDialog;
                                }
                            })
                        }
                        break
                    case 'string':
                        document.getElementById('message_message').innerHTML = message;
                }
                console.log(message, document.getElementById('message_message'));
            },
            closeDialog: () => {
                document.getElementById('dialogWrapper').style.display = 'none';
                Object.assign([], document.getElementsByTagName('form')).pop().reset()
            }
        }

        <?php

        if (isset($_POST['submit'])) {
            $get_sql = 'SELECT * FROM ' . $table . ' where email="' . $_POST['email'] . '" ;';
            $get_result = mysqli_query($conn, $get_sql);
            if ($row = mysqli_fetch_assoc($get_result)) {
                echo "app.openDialog({
                    title: 'Created successfully',
                    message: 'Employee created successfully', button: {
                        confirm: {
                            text: 'OK',
                            onclick: () => window.location.replace('/employees')
                        },
                    }
                });";
            }
        }
        ?>

    </script>

</body>

</html>