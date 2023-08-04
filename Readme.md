# PHP Tutorials

![PHP Tutorials](https://raw.githubusercontent.com/prajwalgangawane/php-tutorials/main/assets/php_tutorials.png)

## Introduction

Welcome to my PHP Tutorials! This repository contains a series of PHP tutorials created by Prajwal, aimed at helping you learn PHP and its practical implementation in web development. Whether you are a beginner or have some experience with PHP, this project will guide you through the fundamentals and advanced concepts of PHP programming.

## Table of Contents

1. [CRUD Demo - Employees](#crud-demo---employees)
2. [More Applications](#more-applications)
3. [Updating Database Settings](#updating-database-settings)

## CRUD Demo - Employees

In this PHP tutorial, we will be exploring a CRUD (Create, Read, Update, Delete) application featuring employee records. The demo application showcases how to interact with a MySQL database using PHP to perform basic CRUD operations.

### Getting Started

To run the CRUD demo, follow these steps:

1. Clone the repository from [GitHub](https://github.com/prajwalgangawane/php-tutorials).

2. Set up a web server with PHP and MySQL support. You can use popular solutions like XAMPP or WAMP for local development. Make sure the server environment meets the minimum requirements for running PHP.

3. Import the database schema from the `db/employees.sql` file into your MySQL server. This file contains the necessary SQL commands to create the `employees` table and its structure.

4. Update the database credentials in the `db_default.php` file. Open the `db_default.php` file and modify the variables `$db_server` and `$database` to match your MySQL server settings. Save the file as `db.php`.

5. Start the PHP server and navigate to the project's root folder in your web browser.

6. Launch the `index.php` file, which serves as the entry point to the CRUD application.

### Features

The CRUD demo provides the following functionalities:

- **Create**: Add new employees to the database by entering their details such as name, email, address, and phone number.

- **Read**: View the list of all employees and their respective details in a tabular format.

- **Update**: Edit the information of existing employees, including their name, email, address, and phone number.

- **Delete**: Remove employees from the database if they are no longer part of the organization.

## More Applications

This is just the beginning of the PHP Tutorials project! In the future, more exciting applications and tutorials will be added to help you explore different aspects of PHP web development. Keep an eye on this repository for updates and new tutorials.

## Updating Database Settings

The PHP Tutorials project allows you to update the database settings dynamically using a form. To change the database settings:

1. Open the `settings` page by clicking the "Settings" link on the home page.

2. On the Settings page, you will find a form that allows you to update the MySQL server and database name.

3. Enter the new MySQL server name and the desired database name in the respective input fields.

4. Click the "Save Settings" button to apply the changes.

5. The `db.php` file will be updated with the new database settings, and the PHP Tutorials project will use the updated database settings for the CRUD demo and any future applications.

Please note that updating the database settings will only take effect after you save the settings and reload the CRUD Demo - Employees page.

## Technologies Used

The CRUD demo and any future applications in the PHP Tutorials project utilize the following technologies:

- **HTML**: The structure and layout of the web pages.
- **Tailwind CSS**: A utility-first CSS framework for styling.
- **JavaScript**: Enhances interactivity and behavior on the web pages.
- **PHP**: The server-side scripting language for processing form submissions, interacting with the database, handling various applications, and managing the Settings feature.
- **MySQL**: The relational database management system used to store and manage data for different applications.

## Contributions

We welcome contributions to improve this PHP Tutorials repository. If you find any issues or have suggestions for enhancing the CRUD demo, adding new tutorials, developing new applications, or improving the Settings feature, feel free to submit a pull request. Let's learn and grow together!

## Support

For any questions or assistance regarding the PHP Tutorials, the CRUD demo, any future applications, or the Settings feature, please reach out to Prajwal on GitHub.

Happy learning and coding!

**Stay tuned for more exciting PHP tutorials and applications!**