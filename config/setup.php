<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Setup</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="setup">
        <h1>Database Setup</h1>
        <p>
            <?php
            // Open this file to setup your database.

            include('../config/database_info.php');

            $database = 'se';

            $connection = new mysqli($host, $username, $password);

            echo 'Selecting database with name "' . $database . '"...<br/>';

            $selectDatabase = mysqli_query($connection, 'use ' . $database);

            if ($selectDatabase) { // if database exists
                echo 'Database exists 👍🏼.<br/>Selected database with name: "' . $database . '"<br/>';
            } else { // if database doesnt exist
                echo 'Database does not exist 👎🏼: ' . mysqli_error($connection) . '.<br/>';

                $createDatabaseQuery = mysqli_query($connection, 'create database ' . $database . ';');

                if ($createDatabaseQuery) { // if new database created
                    echo 'Database exists 👍🏼.<br/>Selected database with name: "' . $database . '"<br/>';

                    if ($selectDatabase) { // if database exists
                        echo 'Database with name "' . $database . '" exists 👍🏼.<br/>';
                    }
                } else {
                    echo 'Failed to create database 👎🏼: ' . mysqli_error($connection) . '<br/>';
                }
            }
            ?>
        </p>
    </div>
</body>

</html>