<?php
include '../db_default.php';

if (isset($_POST['submit'])) {
    include '../clear.php';
    $_SESSION["db_server"] = $_POST["db_server"];
    $_SESSION["db_user"] = $_POST["db_user"];
    $_SESSION["db_password"] = $_POST["db_password"];
    $_SESSION["database"] = $_POST["database"];
    $_SESSION["table"] = $_POST["table"];
}

if (isset($_POST['reset'])) {
    include '../clear.php';
    $_SESSION["db_server"] = "localhost";
    $_SESSION["db_user"] = "user";
    $_SESSION["db_password"] = "password";
    $_SESSION["database"] = "practice";
    $_SESSION["table"] = "employees";
    include '../setup.php';
}

if (isset($_POST['setup'])) {
    include '../setup.php';
}
?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>PHP TUTORIALS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg+xml" sizes="any" href="https://www.php.net/favicon.svg?v=2">
    <link rel="icon" type="image/png" sizes="196x196" href="https://www.php.net/favicon-196x196.png?v=2">
    <link rel="icon" type="image/png" sizes="32x32" href="https://www.php.net/favicon-32x32.png?v=2">
    <link rel="icon" type="image/png" sizes="16x16" href="https://www.php.net/favicon-16x16.png?v=2">
    <link rel="shortcut icon" href="https://www.php.net/favicon.ico?v=2">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>

<body class="h-screen flex space-y-4 justify-start items-center flex-col bg-sky-300">
    <a href="https://github.com/prajwalgangawane/php-tutorials"
        class="text-xl hover:text-blue-600 text-blue-800 hover:underline self-start flex">
        GITHUB
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-6 h-6 m-1">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
        </svg>
    </a>
    <h1 class="text-3xl font-bold ">
        Welcome to my PHP TUTORIALS
    </h1>
    <h1 class="text-lg font-bold ">
        by Prajwal
    </h1>
    <div class="bg-sky-800 text-white w-1/2 mt-2 flex p-3 hover:opacity-70">
        <!-- <div class="text-6xl rounded-full bg-black-200 m-1 mt-[-35px]"> .</div> -->
        <div class="text-3xl rounded-full bg-black-200 mx-4 mt-[-7px]">
            &larr;
        </div>
        <a href="/" class="text-xl hover:text-gray-200"> GO TO APPLICATION LIST </a>
    </div>

    <form method="post" class="bg-white p-10 w-1/4 flex flex-col space-y-5">
        <div class="w-full justify-between flex">
            <label class="flex justify-center items-center">SERVER</label>
            <input required name="db_server" class="border-2 border-gray-300" placeholder="Enter your Server address"
                value="<?php echo $_SESSION["db_server"] ?>" />
        </div>
        <div class="w-full justify-between flex">
            <label class="flex justify-center items-center">DATABASE NAME</label>
            <input required type="text" name="database" class="border-2 border-gray-300"
                placeholder="Enter your Database name" value="<?php echo $_SESSION["database"] ?>" />
        </div>
        <div class="w-full justify-between flex">
            <label class="flex justify-center items-center">TABLE NAME</label>
            <input required name="table" class="border-2 border-gray-300"
                placeholder="Enter your table name for application" value="<?php echo $_SESSION["table"] ?>" />
        </div>
        <div class="w-full justify-between flex">
            <label class="flex justify-center items-center">USER</label>
            <input required name="db_user" class="border-2 border-gray-300" placeholder="Enter your DB username"
                value="<?php echo $_SESSION["db_user"] ?>" />
        </div>
        <div class="w-full justify-between flex">
            <label class="flex justify-center items-center uppercase">Password</label>
            <input required type="password" name="db_password" class="border-2 border-gray-300"
                placeholder="Enter your DB user's password" value="<?php echo $_SESSION["db_password"] ?>" />
        </div>
        <div class="w-full justify-between flex">
            <button type="submit" name="submit"
                class="border-2 bg-blue-700 p-1 text-white border-gray-300">SAVE</button>
            <a href="/.." class="border-2 bg-red-700 p-1 text-white border-gray-300">CANCEL</a>
            <button type="submit" name="reset" class="border-2 bg-red-700 p-1 text-white border-gray-300">RESET</button>
            <button type="submit" name="setup" class="border-2 bg-red-700 p-1 text-white border-gray-300">SETUP</button>
            <button type="submit" name="clear" class="border-2 bg-red-700 p-1 text-white border-gray-300">CLEAR</button>
        </div>
    </form>
</body>

</html>