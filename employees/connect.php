<?php
include '../db_default.php';
// $db_server = "localhost";
// $db_user = "user";
// $db_password = "password";
// $database = "practice";

$conn = new mysqli($db_server, $db_user, $db_password, $database);
if ($conn) {
    // echo "Connected successfully<br/>";
} else {
    die(mysqli_error($conn));
}
?>

<!-- EMPLOYEE TABLE CREATION QUERY  -->
<!-- 
    CREATE TABLE `practice`.`employees` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `address` VARCHAR(200) NOT NULL,
  `phone` VARCHAR(20) NOT NULL,
  `password` VARCHAR(100) NOT NULL,
  `isDeleted` TINYINT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) VISIBLE);
 -->

<!-- GET ONE EMPLOYEE 
SELECT * FROM practice.employees where id={{int}}; -->

<!-- GET ALL EMPLOYEEs 
SELECT * FROM practice.employees; -->

<!-- CREATE EMPLOYEE 
    INSERT INTO `practice`.`employees` 
    (`name`, `email`, `address`, `phone`, `password`, `isDeleted`) 
    VALUES 
    ('Nancy Davolio', 'nancy.davolio@accweb.com', '507 - 20th Ave. E. Apt. 2A, Seattle, USA', '(206) 555-9857', 'Nancy@507', '0'); -->


<!-- UPDATE EMPLOYEE
UPDATE `practice`.`employees` 
SET `name` = 'Nancy Davolio', 
    `email` = 'nancy.davolio@accweb.org', 
    `address` = '507 - 20th Ave. E.Apt. 2A, Seattle, USA', 
    `password` = 'Nancy@2A507', 
    `isDeleted` = '0' 
WHERE (`id` = '1'); -->

<!-- DELETE EMPLOYEE
DELETE `practice`.`employees` WHERE (`id` = '1'); -->

<!-- DELETE EMPLOYEE (updated)
UPDATE `practice`.`employees` SET `isDeleted` = '1' WHERE (`id` = '1'); -->