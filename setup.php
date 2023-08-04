<?php
// Replace these with your MySQL server credentials
// include 'db_default.php';

// Connect to MySQL server
$conn = new mysqli($db_server, $db_user, $db_password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->query('DROP DATABASE IF EXISTS ' . $database);
echo "Database '$database' dropped successfully<br>";


// Create a new database named 'practice'
$sql = "CREATE DATABASE IF NOT EXISTS " . $database;
if ($conn->query($sql) === TRUE) {
    echo "Database '$database' created successfully<br>";
} else {
    echo "Error creating database: " . $conn->error . "<br>";
}

// Select the 'practice' database
$conn->select_db($database);

// Create a new table named 'employees'
$sql = "CREATE TABLE IF NOT EXISTS " . $table . " (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    address VARCHAR(200),
    phone VARCHAR(20),
    password VARCHAR(100) NOT NULL,
    isDeleted TINYINT DEFAULT 0
)";
if ($conn->query($sql) === TRUE) {
    echo "Table " . $table . " created successfully<br>";
} else {
    echo "Error creating table: ".$conn->error."<br>";
}

// Insert the provided data into the 'employees' table
$sql = "INSERT INTO " . $table . " (name, email, address, phone, password, isDeleted) VALUES
    ('Nancy Davolio', 'nancy.davolio@accweb.org', '507 - 20th Ave. E. Apt. 2A, Seattle, WA, USA', '(206) 555-9857', '#accweb@5467', 0),
    ('Andrew Fuller', 'andrew.fuller@accweb.org', '908 W. Capital Way, Tacoma, WA, USA', '(206) 555-9482', '#accweb@3457', 0),
    ('Janet Leverling', 'janet.leverling@accweb.org', '722 Moss Bay Blvd., Kirkland, WA, USA', '(206) 555-3412', '#accweb@3355', 0),
    ('Margaret Peacock', 'margaret.peacock@accweb.org', '4110 Old Redmond Rd., Redmond, WA, USA', '(206) 555-8122', '#accweb@5176', 0),
    ('Steven Buchanan', 'steven.buchanan@accweb.org', '14 Garrett Hill, London, , UK', '(71) 555-4848', '#accweb@3453', 0),
    ('Michael Suyama', 'michael.suyama@accweb.org', 'Coventry HouseMiner Rd., London, , UK', '(71) 555-7773', '#accweb@428', 0),
    ('Robert King', 'robert.king@accweb.org', 'Edgeham HollowWinchester Way, London, , UK', '(71) 555-5598', '#accweb@465', 0),
    ('Laura Callahan', 'laura.callahan@accweb.org', '4726 - 11th Ave. N.E., Seattle, WA, USA', '(206) 555-1189', '#accweb@2344', 0),
    ('Anne Dodsworth', 'anne.dodsworth@accweb.org', '7 Houndstooth Rd., London, , UK', '(71) 555-4444', '#accweb@452', 0)";

if ($conn->query($sql) === TRUE) {
    echo "Predefined data inserted successfully<br>";
    time_nanosleep(3,0);
    header('location:/employees');

} else {
    echo "Error inserting data: " . $conn->error . "<br>";
}

// Close the MySQL connection
$conn->close();

?>