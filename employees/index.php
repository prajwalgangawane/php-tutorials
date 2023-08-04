<?php
include 'connect.php';

?>

<!Doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>PRAJ CRUD APP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-screen bg-sky-300 flex flex-col justify-start items-center">
    <div class="flex justify-between p-5 w-full text-2xl">
        <a class="uppercase flex items-center text-3xl justify-center text-white" href="/"> &larr; </a>
        <h3 class="uppercase flex items-center justify-center text-gray-600"> Employees Table</h3>
        <a class="uppercase bg-blue-500 flex items-center text-base p-2 justify-center text-white"
            href="employees/create.php"> Create </a>
    </div>
    <table class="py-3 bg-white w-full px-6 bg-white border border-gray-300 text-left ">
        <thead class="w-full relative">
            <tr class="border-b-2 sticky absolute top-0">
                <th class="py-3 border-x-2 px-6 bg-[#1d8fbd] text-white font-medium uppercase tracking-wider">
                    Sr
                </th>
                <th class="py-3 border-x-2 px-6 bg-[#1d8fbd] text-white font-medium uppercase tracking-wider">
                    Name
                </th>
                <th class="py-3 border-x-2 px-6 bg-[#1d8fbd] text-white font-medium uppercase tracking-wider">
                    Email
                </th>
                <th class="py-3 border-x-2 px-6 bg-[#1d8fbd] text-white font-medium uppercase tracking-wider">
                    Phone
                </th>
                <th class="py-3 border-x-2 px-6 bg-[#1d8fbd] text-white font-medium uppercase tracking-wider">
                    Address
                </th>
                <th
                    class="text-center py-3 border-x-2 px-6 bg-[#1d8fbd] text-white font-medium uppercase tracking-wider">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = 'SELECT * FROM ' . $table . ';';
            $result = mysqli_query($conn, $sql);
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $_id = $row['id'];
                    $_name = $row['name'];
                    $_email = $row['email'];
                    $_phone = $row['phone'];
                    $_address = $row['address'];
                    $_isDeleted = $row['isDeleted'];
                    if (!$_isDeleted) {
                        echo '
                    <tr class="cursor-pointer hover:opacity-80 overflow-y-auto">
                    <td class="py-2 border-x-2 px-6 bg-blue-400 text-white font-medium">
                        ' . $_id . '
                    </td>
                    <td class="py-2 border-x-2 px-6 bg-blue-400 text-white font-medium">
                        ' . $_name . '
                    </td>
                    <td class="py-2 border-x-2 px-6 bg-blue-400 text-white font-medium">
                        ' . $_email . '
                    </td>
                    <td class="py-2 border-x-2 px-6 bg-blue-400 text-white font-medium">
                        ' . $_phone . '
                    </td>
                    <td class="py-2 border-x-2 px-6 bg-blue-400 text-white font-medium">
                        ' . $_address . '
                    </td>
                    <td class="py-2 border-x-2 px-6 flex bg-blue-400 text-white font-medium text-center">
                        <a class="uppercase bg-green-500 self-end m-1 p-1 text-white" href="employees/update.php?id=' . $_id . '"> UPDATE </a>
                        <a class="uppercase bg-red-500 self-end m-1 p-1 text-white" href="employees/delete.php?id=' . $_id . '"> DELETE </a>
                    </td>
                    </tr>
                    ';
                    }
                }
            }
            ?>
        </tbody>
    </table>
    <a class="w-full pb-1 pt-5 justify-start flex" href='https://services.odata.org/northwind/northwind.svc/Employees'
        target="_blank">
        <div class="px-10"> Initial Data is fetch from Northwind ODATA Service</div>
    </a>
</body>

</html>